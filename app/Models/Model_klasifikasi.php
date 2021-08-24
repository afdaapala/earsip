<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_klasifikasi extends Model
{
    public function all_data()
    {
        return $this->db->table('tabel_klasifikasi')
        ->orderBy('id_klasifikasi')
        ->get()->getResultArray();
    }

    public function add($data)
    {
    	return $this->db->table('tabel_klasifikasi')->insert($data);
    }
}