<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiInfoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('api');
    }

    /**
     * GET /
     * Returns API info when visiting the root URL in browser
     */
    public function index()
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'success'     => true,
            'name'        => 'Product Management API',
            'description' => 'LavaLust REST API for Lab 6 — CRUD with Authentication',
            'version'     => '1.0.0',
            'author'      => 'Digno Jay Berocil',
            'frontend'    => 'https://digno-jay-frontend.onrender.com',
            'endpoints'   => [
                'POST   /api/login'           => 'Authenticate and receive JWT token',
                'POST   /api/logout'          => 'Revoke refresh token',
                'POST   /api/refresh'         => 'Refresh access token',
                'GET    /api/me'              => 'Get current authenticated user [Auth Required]',
                'GET    /api/products'        => 'List all products [Auth Required]',
                'GET    /api/products/{id}'   => 'Get a single product [Auth Required]',
                'POST   /api/products'        => 'Create a product [Auth Required]',
                'PUT    /api/products/{id}'   => 'Update a product [Auth Required]',
                'DELETE /api/products/{id}'   => 'Delete a product [Auth Required]',
            ],
            'note'        => 'All product endpoints require: Authorization: Bearer <token>',
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit;
    }
}
