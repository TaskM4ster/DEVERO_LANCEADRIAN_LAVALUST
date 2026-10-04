<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiHealthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('api');
    }

    public function index()
    {
        $this->api->respond([
            'success' => true,
            'message' => 'KALAKAL 1521 API is running.'
        ], 200);
    }
}