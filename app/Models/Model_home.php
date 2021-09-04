<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_home extends Model
{
    public function total_arsip()
    {
        // code...
        return $this->db->table('tabel_arsip')->countAll();
    }
    public function total_klasifikasi()
    {
        // code...
        return $this->db->table('tabel_klasifikasi')->countAll();
    }
    public function total_user()
    {
        // code...
        return $this->db->table('tabel_user')->countAll();
    }
    public function total_unit()
    {
        // code...
        return $this->db->table('tabel_unit')->countAll();
    }



}

?>