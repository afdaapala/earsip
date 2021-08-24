<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_auth extends Model
{
    public function login($email, $password)
    {
        return $this->db->table('tabel_user')->where([
            'email' => $email,
            'password' => $password,
        
        ])->get()->getRowArray();
    }
}