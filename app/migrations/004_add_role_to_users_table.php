<?php

class Add_role_to_users_table
{
    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->dbforge();
        $this->_lava->call->database();
    }

    public function up()
    {
        if (!$this->_lava->dbforge->table_exists('users')) {
            throw new RuntimeException('The users table must exist before adding its role column.');
        }

        if (!$this->_lava->dbforge->column_exists('users', 'role')) {
            $this->_lava->dbforge->add_column('users', [
                'role' => [
                    'type'       => 'ENUM',
                    'constraint' => "'admin','moderator','user'",
                    'null'       => FALSE,
                    'default'    => 'user',
                ],
            ]);
        }

        $this->_lava->db->table('users')
            ->where('username', 'admin')
            ->update(['role' => 'admin']);
    }

    public function down()
    {
        if (
            $this->_lava->dbforge->table_exists('users') &&
            $this->_lava->dbforge->column_exists('users', 'role')
        ) {
            $this->_lava->dbforge->drop_column('users', 'role');
        }
    }
}