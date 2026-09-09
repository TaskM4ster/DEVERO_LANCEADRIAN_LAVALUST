<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Already logged in
        if (!empty($_SESSION['logged_in'])) {
            redirect('products');
        }

        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($this->io->post('username'));
            $password = $this->io->post('password');

            $this->call->database();
            $this->call->model('AccountModel');

            $account = $this->AccountModel->findByUsername($username);

            if (
                $account &&
                password_verify($password, $account['password_hash'])
            ) {
                session_regenerate_id(true);

                $_SESSION['account_id'] = $account['id'];
                $_SESSION['username'] = $account['username'];
                $_SESSION['logged_in'] = true;

                redirect('products');
            }

            $data['error'] = 'Invalid username or password.';
        }

        $this->call->view('auth/login', $data);
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];
        session_destroy();

        redirect('login');
    }
}