<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiAuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->library('api');
        $this->call->model('ApiUserModel');
    }

    public function login()
    {
        $this->api->require_method('POST');
        $this->api->rate_limit();

        // Read JSON directly to preserve the exact password characters.
        $input = json_decode(file_get_contents('php://input'), TRUE);

        if (!is_array($input)) {
            $this->api->respond_error('A valid JSON body is required.', 400);
        }

        $username = $input['username'] ?? '';
        $password = $input['password'] ?? '';

        if (!is_string($username) || !is_string($password)) {
            $this->api->respond_error(
                'Username and password must be text.',
                422
            );
        }

        $username = trim($username);

        if ($username === '' || $password === '') {
            $this->api->respond_error(
                'Username and password are required.',
                422
            );
        }

        $user = $this->ApiUserModel->find_by('username', $username);

        if (
            !$user ||
            !password_verify($password, $user['password']) ||
            (int) $user['is_active'] !== 1
        ) {
            $this->api->respond_error(
                'Invalid username or password.',
                401
            );
        }

        $tokens = $this->api->issue_tokens([
            'id' => $user['id'],
            'role' => $user['role'],
            'scopes' => ['read', 'write']
        ]);

        $this->api->respond([
            'success' => TRUE,
            'message' => 'Welcome to KALAKAL 1521.',
            'user' => [
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role']
            ],
            'tokens' => $tokens
        ], 200);
    }
    public function logout()
{
    $this->api->require_method('POST');

    $accessPayload = $this->api->require_jwt();

    $input = json_decode(file_get_contents('php://input'), TRUE);

    if (!is_array($input)) {
        $this->api->respond_error('A valid JSON body is required.', 400);
    }

    $refreshToken = $input['refresh_token'] ?? '';

    if (!is_string($refreshToken) || $refreshToken === '') {
        $this->api->respond_error('Refresh token is required.', 422);
    }

    $refreshPayload = $this->api->validate_jwt($refreshToken);

    if (
        !$refreshPayload ||
        ($refreshPayload['type'] ?? '') !== 'refresh' ||
        (string) $refreshPayload['sub'] !== (string) $accessPayload['sub']
    ) {
        $this->api->respond_error('Invalid refresh token.', 401);
    }

    $this->api->revoke_refresh_token($refreshToken);

    $this->api->respond([
        'success' => TRUE,
        'message' => 'Logged out successfully.'
    ], 200);
}
public function refresh()
{
    $this->api->require_method('POST');
    $this->api->rate_limit();

    $input = json_decode(file_get_contents('php://input'), TRUE);

    if (!is_array($input)) {
        $this->api->respond_error('A valid JSON body is required.', 400);
    }

    $refreshToken = $input['refresh_token'] ?? '';

    if (!is_string($refreshToken) || $refreshToken === '') {
        $this->api->respond_error('Refresh token is required.', 422);
    }

    $this->api->refresh_access_token($refreshToken);
}
}