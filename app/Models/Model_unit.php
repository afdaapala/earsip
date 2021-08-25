<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_unit extends Model
{
    public function all_data()
    {
        return $this->db->table('tabel_unit')
        ->orderBy('id_unit')
        ->get()->getResultArray();
    }

    public function add($data)
    {
    	return $this->db->table('tabel_unit')->insert($data);
    }

    public function edit($data){
        $this->db->table('tabel_unit')->where('id_unit',$data['id_unit'])->update($data);
    }
    public function remove($data){
        $this->db->table('tabel_unit')->where('id_unit',$data['id_unit'])->delete($data);
    }

}