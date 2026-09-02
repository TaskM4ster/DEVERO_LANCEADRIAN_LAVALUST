<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller
{
    public function index()
    {
        // Connect to the configured database
        $this->call->database();

        // Load UsersModel
        $this->call->model('UsersModel');

        // Retrieve all records from the users table
        $data['users'] = $this->UsersModel->all();

        // Pass the records to the users view
        $this->call->view('users', $data);
    }
}