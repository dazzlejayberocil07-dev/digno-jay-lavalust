<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class MigrationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('migration');
    }

    public function create_migration($migration_class)
    {
        $this->migration->create_migration($migration_class);
    }

    public function migrate()
    {
        $this->migration->migrate();
        $this->seed();
    }

    public function seed()
    {
        $this->call->database();
        
        // Ensure admin user exists with password admin123
        $admin = $this->db->table('users')->where('username', 'admin')->get();
        if (!$admin) {
            $this->db->table('users')->insert([
                'username'  => 'admin',
                'email'     => 'admin@example.com',
                'password'  => password_hash('admin123', PASSWORD_DEFAULT),
                'role'      => 'admin',
                'is_active' => 1
            ]);
            $msg = "Admin user created (admin / admin123). ";
        } else {
            $this->db->table('users')->where('username', 'admin')->update([
                'password'  => password_hash('admin123', PASSWORD_DEFAULT),
                'is_active' => 1
            ]);
            $msg = "Admin password set to admin123. ";
        }

        // Check products table
        $count = $this->db->table('products')->count();
        if ($count == 0) {
            $initial_products = [
                [
                    'product_name' => 'Wireless Gaming Mouse',
                    'description'  => 'Ergonomic 16000 DPI RGB gaming mouse with ultra-fast sensor.',
                    'price'        => 1499.00,
                    'quantity'     => 25
                ],
                [
                    'product_name' => 'Mechanical Keyboard',
                    'description'  => 'Compact 75% hot-swappable keyboard with tactile switches.',
                    'price'        => 2999.00,
                    'quantity'     => 12
                ],
                [
                    'product_name' => 'Curved Gaming Monitor 27"',
                    'description'  => '165Hz 1ms QHD Curved Display with HDR support.',
                    'price'        => 12499.00,
                    'quantity'     => 5
                ]
            ];
            foreach ($initial_products as $product) {
                $this->db->table('products')->insert($product);
            }
        }

        echo "SUCCESS: " . $msg . "Database is ready!";
    }

    public function rollback()
    {
        $this->migration->rollback();
    }

    public function rollback_all()
    {
        $this->migration->rollback_all();
    }

    public function refresh()
    {
        $this->migration->refresh();
        $this->seed();
    }

    public function status()
    {
        $this->migration->status();
    }
}