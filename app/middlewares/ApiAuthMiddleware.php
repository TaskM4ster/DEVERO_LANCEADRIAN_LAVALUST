<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiAuthMiddleware
{
    public function handle(Closure $next)
    {
        $lava = lava_instance();

        // Load the database before the API library captures this instance.
        $lava->call->database();
        $lava->call->library('api');

        $payload = $lava->api->require_jwt();

        if (($payload['type'] ?? '') === 'refresh') {
            $lava->api->respond_error(
                'An access token is required.',
                401
            );
        }

        return $next();
    }
}