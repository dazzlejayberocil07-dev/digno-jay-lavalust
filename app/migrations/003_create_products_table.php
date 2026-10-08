<?php

class Create_products_table {

    private $_lava;
    protected $dbforge;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->dbforge();
        $this->_lava->call->database();
    }

    public function up()
    {
        if (!$this->_lava->dbforge->table_exists('products')) {
            $this->_lava->dbforge
                ->add_field([
                    'id' => [
                        'type'           => 'INT',
                        'constraint'     => 11,
                        'unsigned'       => TRUE,
                        'auto_increment' => TRUE,
                        'null'           => FALSE,
                    ],
                    'product_name' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 100,
                        'null'       => FALSE,
                    ],
                    'description' => [
                        'type' => 'TEXT',
                        'null' => TRUE,
                    ],
                    'price' => [
                        'type'       => 'DECIMAL',
                        'constraint' => '10,2',
                        'null'       => FALSE,
                        'default'    => '0.00',
                    ],
                    'quantity' => [
                        'type'       => 'INT',
                        'constraint' => 11,
                        'null'       => FALSE,
                        'default'    => 0,
                    ],
                    'created_at' => [
                        'type'    => 'TIMESTAMP',
                        'null'    => FALSE,
                        'default' => 'CURRENT_TIMESTAMP',
                    ],
                ])
                ->add_key('id', primary: TRUE)
                ->create_table('products');
        }

        // Seed initial products if table is empty
        $count = $this->_lava->db->table('products')->count();
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
                $this->_lava->db->table('products')->insert($product);
            }
        }
    }

    public function down()
    {
        $this->_lava->dbforge->drop_table('products');
    }
}