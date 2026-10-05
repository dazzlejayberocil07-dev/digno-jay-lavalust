<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primary_key = 'id';
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'is_active'
    ];

    public function find_by_username($username)
    {
        return $this->db->table($this->table)
            ->where('username', $username)
            ->get();
    }

    public function find_by_email($email)
    {
        return $this->db->table($this->table)
            ->where('email', $email)
            ->get();
    }
}