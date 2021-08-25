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

    public function edit($data){
        $this->db->table('tabel_klasifikasi')->where('id_klasifikasi',$data['id_klasifikasi'])->update($data);
    }
    public function remove($data){
        $this->db->table('tabel_klasifikasi')->where('id_klasifikasi',$data['id_klasifikasi'])->delete($data);
    }

}