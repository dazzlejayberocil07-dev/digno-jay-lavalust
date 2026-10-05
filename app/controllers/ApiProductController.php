<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('api');
        $this->call->database();
        $this->call->model('ProductModel');
    }

    /**
     * Validate JWT on every request and return payload
     */
    private function require_auth()
    {
        return $this->api->require_jwt();
    }

    /**
     * GET /api/products
     * Returns all products
     */
    public function index()
    {
        $this->require_auth();

        $products = $this->db->table('products')
            ->order_by('created_at', 'DESC')
            ->get_all();

        $this->api->respond([
            'success' => true,
            'message' => 'Products retrieved successfully.',
            'data'    => $products ?: [],
        ]);
    }

    /**
     * GET /api/products/{id}
     * Returns a single product
     */
    public function show($id)
    {
        $this->require_auth();

        $product = $this->db->table('products')
            ->where('id', (int) $id)
            ->get();

        if (!$product) {
            $this->api->respond([
                'success' => false,
                'message' => 'Product not found.',
            ], 404);
        }

        $this->api->respond([
            'success' => true,
            'data'    => $product,
        ]);
    }

    /**
     * POST /api/products
     * Create a new product
     */
    public function store()
    {
        $this->require_auth();

        $body = $this->api->body();

        $product_name = trim($body['product_name'] ?? '');
        $description  = trim($body['description'] ?? '');
        $price        = $body['price'] ?? null;
        $quantity     = $body['quantity'] ?? null;

        // Validation
        $errors = [];

        if (empty($product_name)) {
            $errors[] = 'product_name is required.';
        }

        if ($price === null || !is_numeric($price) || (float) $price < 0) {
            $errors[] = 'price must be a non-negative number.';
        }

        if ($quantity === null || !is_numeric($quantity) || (int) $quantity < 0 || floor($quantity) != $quantity) {
            $errors[] = 'quantity must be a non-negative integer.';
        }

        if (!empty($errors)) {
            $this->api->respond([
                'success' => false,
                'message' => 'Validation failed.',
                'errors'  => $errors,
            ], 422);
        }

        $data = [
            'product_name' => $product_name,
            'description'  => $description,
            'price'        => number_format((float) $price, 2, '.', ''),
            'quantity'     => (int) $quantity,
        ];

        $id = $this->db->table('products')->insert($data);

        $product = $this->db->table('products')->where('id', $id)->get();

        $this->api->respond([
            'success' => true,
            'message' => 'Product created successfully.',
            'data'    => $product,
        ], 201);
    }

    /**
     * PUT /api/products/{id}
     * Update an existing product
     */
    public function update($id)
    {
        $this->require_auth();

        $product = $this->db->table('products')->where('id', (int) $id)->get();

        if (!$product) {
            $this->api->respond([
                'success' => false,
                'message' => 'Product not found.',
            ], 404);
        }

        $body = $this->api->body();

        $product_name = isset($body['product_name']) ? trim($body['product_name']) : $product['product_name'];
        $description  = isset($body['description'])  ? trim($body['description'])  : $product['description'];
        $price        = $body['price']    ?? $product['price'];
        $quantity     = $body['quantity'] ?? $product['quantity'];

        // Validation
        $errors = [];

        if (empty($product_name)) {
            $errors[] = 'product_name is required.';
        }

        if (!is_numeric($price) || (float) $price < 0) {
            $errors[] = 'price must be a non-negative number.';
        }

        if (!is_numeric($quantity) || (int) $quantity < 0 || floor($quantity) != $quantity) {
            $errors[] = 'quantity must be a non-negative integer.';
        }

        if (!empty($errors)) {
            $this->api->respond([
                'success' => false,
                'message' => 'Validation failed.',
                'errors'  => $errors,
            ], 422);
        }

        $data = [
            'product_name' => $product_name,
            'description'  => $description,
            'price'        => number_format((float) $price, 2, '.', ''),
            'quantity'     => (int) $quantity,
        ];

        $this->db->table('products')->where('id', (int) $id)->update($data);

        $updated = $this->db->table('products')->where('id', (int) $id)->get();

        $this->api->respond([
            'success' => true,
            'message' => 'Product updated successfully.',
            'data'    => $updated,
        ]);
    }

    /**
     * DELETE /api/products/{id}
     * Delete a product
     */
    public function destroy($id)
    {
        $this->require_auth();

        $product = $this->db->table('products')->where('id', (int) $id)->get();

        if (!$product) {
            $this->api->respond([
                'success' => false,
                'message' => 'Product not found.',
            ], 404);
        }

        $this->db->table('products')->where('id', (int) $id)->delete();

        $this->api->respond([
            'success' => true,
            'message' => 'Product deleted successfully.',
        ]);
    }
}
