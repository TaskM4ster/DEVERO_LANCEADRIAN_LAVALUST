<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->library('api');
        $this->call->model('ApiProductModel');
    }

    public function index()
    {
        $this->api->require_method('GET');

        $products = $this->ApiProductModel->all();

        $this->api->respond([
            'success' => TRUE,
            'data' => $products ?: []
        ], 200);
    }

    public function store()
{
    $this->api->require_method('POST');

    $input = json_decode(file_get_contents('php://input'), TRUE);

    if (!is_array($input)) {
        $this->api->respond_error('A valid JSON body is required.', 400);
    }

    $name = $input['product_name'] ?? '';
    $description = $input['description'] ?? '';
    $price = $input['price'] ?? null;
    $quantity = $input['quantity'] ?? null;

    if (!is_string($name) || trim($name) === '') {
        $this->api->respond_error('Product name is required.', 422);
    }

    $name = trim($name);

    if (strlen($name) > 100) {
        $this->api->respond_error(
            'Product name must not exceed 100 bytes.',
            422
        );
    }

    if (!is_string($description) || strlen($description) > 65535) {
        $this->api->respond_error('Description is invalid or too long.', 422);
    }

    // Match DECIMAL(10,2): up to 8 whole digits and 2 decimal places.
    if (
        !(is_string($price) || is_int($price) || is_float($price)) ||
        !preg_match('/^\d{1,8}(?:\.\d{1,2})?$/D', (string) $price)
    ) {
        $this->api->respond_error(
            'Price must be between 0 and 99999999.99, with up to 2 decimal places.',
            422
        );
    }

    if (!(is_int($quantity) || is_string($quantity))) {
        $this->api->respond_error(
            'Quantity must be a non-negative whole number.',
            422
        );
    }

    $quantity = filter_var($quantity, FILTER_VALIDATE_INT, [
        'options' => [
            'min_range' => 0,
            'max_range' => 2147483647
        ]
    ]);

    if ($quantity === FALSE) {
        $this->api->respond_error(
            'Quantity must be a whole number between 0 and 2147483647.',
            422
        );
    }

    $id = $this->ApiProductModel->insert([
        'product_name' => $name,
        'description' => trim($description),
        'price' => (string) $price,
        'quantity' => $quantity
    ]);

    if (!$id) {
        $this->api->respond_error('Unable to create product.', 500);
    }

    $this->api->respond([
        'success' => TRUE,
        'message' => 'Product added to the trading post.',
        'data' => $this->ApiProductModel->find($id)
    ], 201);
}

public function show($id)
{
    $this->api->require_method('GET');

    if (!ctype_digit((string) $id) || (int) $id < 1) {
        $this->api->respond_error('Invalid product ID.', 422);
    }

    $product = $this->ApiProductModel->find((int) $id);

    if (!$product) {
        $this->api->respond_error('Product not found.', 404);
    }

    $this->api->respond([
        'success' => TRUE,
        'data' => $product
    ], 200);
}

public function update($id)
{
    $this->api->require_method('PUT');

    if (!ctype_digit((string) $id) || (int) $id < 1) {
        $this->api->respond_error('Invalid product ID.', 422);
    }

    $id = (int) $id;

    if (!$this->ApiProductModel->find($id)) {
        $this->api->respond_error('Product not found.', 404);
    }

    $input = json_decode(file_get_contents('php://input'), TRUE);

    if (!is_array($input)) {
        $this->api->respond_error('A valid JSON body is required.', 400);
    }

    $name = $input['product_name'] ?? '';
    $description = $input['description'] ?? '';
    $price = $input['price'] ?? null;
    $quantity = $input['quantity'] ?? null;

    if (!is_string($name) || trim($name) === '') {
        $this->api->respond_error('Product name is required.', 422);
    }

    $name = trim($name);

    if (strlen($name) > 100) {
        $this->api->respond_error(
            'Product name must not exceed 100 bytes.',
            422
        );
    }

    if (!is_string($description) || strlen($description) > 65535) {
        $this->api->respond_error('Description is invalid or too long.', 422);
    }

    if (
        !(is_string($price) || is_int($price) || is_float($price)) ||
        !preg_match('/^\d{1,8}(?:\.\d{1,2})?$/D', (string) $price)
    ) {
        $this->api->respond_error(
            'Price must be between 0 and 99999999.99, with up to 2 decimal places.',
            422
        );
    }

    if (!(is_int($quantity) || is_string($quantity))) {
        $this->api->respond_error(
            'Quantity must be a non-negative whole number.',
            422
        );
    }

    $quantity = filter_var($quantity, FILTER_VALIDATE_INT, [
        'options' => [
            'min_range' => 0,
            'max_range' => 2147483647
        ]
    ]);

    if ($quantity === FALSE) {
        $this->api->respond_error(
            'Quantity must be a whole number between 0 and 2147483647.',
            422
        );
    }

    $updated = $this->ApiProductModel->update($id, [
        'product_name' => $name,
        'description' => trim($description),
        'price' => (string) $price,
        'quantity' => $quantity
    ]);

    if ($updated === FALSE) {
        $this->api->respond_error('Unable to update product.', 500);
    }

    $this->api->respond([
        'success' => TRUE,
        'message' => 'Product updated successfully.',
        'data' => $this->ApiProductModel->find($id)
    ], 200);
}
public function destroy($id)
{
    $this->api->require_method('DELETE');

    if (!ctype_digit((string) $id) || (int) $id < 1) {
        $this->api->respond_error('Invalid product ID.', 422);
    }

    $id = (int) $id;

    if (!$this->ApiProductModel->find($id)) {
        $this->api->respond_error('Product not found.', 404);
    }

    $deleted = $this->ApiProductModel->delete($id);

    if ($deleted === FALSE) {
        $this->api->respond_error('Unable to delete product.', 500);
    }

    $this->api->respond([
        'success' => TRUE,
        'message' => 'Product removed from the trading post.'
    ], 200);
}
}