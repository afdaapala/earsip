<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_user extends Model
{
    public function all_data()
    {
        return $this->db->table('tabel_user')
        ->join('tabel_unit', 'tabel_unit.id_unit = tabel_user.id_unit', 'left')
        ->orderBy('id_user')
        ->get()->getResultArray();
    }
    public function detail_data($id_user)
    {
        return $this->db->table('tabel_user')
        ->join('tabel_unit', 'tabel_unit.id_unit = tabel_user.id_unit', 'left')
        ->where('id_user', $id_user)
        ->get()->getRowArray();
    }

    public function add($data)
    {
    	return $this->db->table('tabel_user')->insert($data);
    }

    public function edit($data){
        $this->db->table('tabel_user')->where('id_user',$data['id_user'])->update($data);
    }
    public function remove($data){
        $this->db->table('tabel_user')->where('id_user',$data['id_user'])->delete($data);
    }

}