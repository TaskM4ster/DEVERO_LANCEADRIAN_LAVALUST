<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    private function loadProductModel()
    {
        $this->call->database();
        $this->call->model('ProductModel');
    }

    private function getProductInput()
    {
        return [
            'product_name' => trim((string) $this->io->post('product_name')),
            'description'  => trim((string) $this->io->post('description')),
            'price'        => trim((string) $this->io->post('price')),
            'quantity'     => trim((string) $this->io->post('quantity'))
        ];
    }

    private function validateProduct($product)
    {
        $errors = [];

        if ($product['product_name'] === '') {
            $errors[] = 'Product name is required.';
        } elseif (strlen($product['product_name']) > 100) {
            $errors[] = 'Product name must not exceed 100 characters.';
        }

        if (!is_numeric($product['price']) || (float) $product['price'] < 0) {
            $errors[] = 'Price must be a valid non-negative number.';
        }

        if (
            filter_var($product['quantity'], FILTER_VALIDATE_INT) === false ||
            (int) $product['quantity'] < 0
        ) {
            $errors[] = 'Quantity must be a non-negative whole number.';
        }

        return $errors;
    }

    public function index()
    {
        $this->loadProductModel();

        $data['products'] = $this->ProductModel->all();
        $data['success'] = $_SESSION['success'] ?? null;

        unset($_SESSION['success']);

        $this->call->view('products/index', $data);
    }

    public function create()
    {
        $this->call->view('products/create', [
            'product' => [],
            'errors'  => []
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('products/create');
        }

        $product = $this->getProductInput();
        $errors = $this->validateProduct($product);

        if (!empty($errors)) {
            $this->call->view('products/create', [
                'product' => $product,
                'errors'  => $errors
            ]);
            return;
        }

        $product['price'] = number_format(
            (float) $product['price'],
            2,
            '.',
            ''
        );

        $product['quantity'] = (int) $product['quantity'];

        $this->loadProductModel();
        $this->ProductModel->insert($product);

        $_SESSION['success'] = 'Cargo added to the trading manifest!';

        redirect('products');
    }

    public function edit($id)
    {
        $this->loadProductModel();

        $product = $this->ProductModel->find((int) $id);

        if (!$product) {
            $_SESSION['success'] = 'That trade good could not be found.';
            redirect('products');
        }

        $this->call->view('products/edit', [
            'product' => $product,
            'errors'  => []
        ]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('products');
        }

        $product = $this->getProductInput();
        $errors = $this->validateProduct($product);

        if (!empty($errors)) {
            $product['id'] = (int) $id;

            $this->call->view('products/edit', [
                'product' => $product,
                'errors'  => $errors
            ]);
            return;
        }

        $product['price'] = number_format(
            (float) $product['price'],
            2,
            '.',
            ''
        );

        $product['quantity'] = (int) $product['quantity'];

        $this->loadProductModel();
        $this->ProductModel->update((int) $id, $product);

        $_SESSION['success'] = 'Trade goods successfully updated!';

        redirect('products');
    }

    public function delete($id)
    {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('products');
        }

        $this->loadProductModel();

        $product = $this->ProductModel->find((int) $id);

        if (!$product) {
            $_SESSION['success'] = 'That trade good could not be found.';
            redirect('products');
        }

        $this->ProductModel->soft_delete((int) $id);


        $_SESSION['success'] = 'Cargo moved to the lost-at-sea records!';

        redirect('products');
        }
}