<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_arsip extends Model
{
    public function all_data()
    {
        return $this->db->table('tabel_arsip')
        ->join('tabel_unit', 'tabel_unit.id_unit = tabel_arsip.id_unit', 'left')
        ->join('tabel_klasifikasi', 'tabel_klasifikasi.id_klasifikasi = tabel_arsip.id_klasifikasi', 'left')
        ->join('tabel_user', 'tabel_user.id_user = tabel_arsip.id_user', 'left')
        ->orderBy('id_arsip')
        ->get()->getResultArray();
    }
    public function detail_data($id_arsip)
    {
        return $this->db->table('tabel_arsip')
        ->join('tabel_unit', 'tabel_unit.id_unit = tabel_arsip.id_unit', 'left')
        ->join('tabel_klasifikasi', 'tabel_klasifikasi.id_klasifikasi = tabel_arsip.id_klasifikasi', 'left')
        ->join('tabel_user', 'tabel_user.id_user = tabel_arsip.id_user', 'left')
        ->where('id_arsip', $id_arsip)
        ->get()->getRowArray();
    }

    public function add($data)
    {
    	return $this->db->table('tabel_arsip')->insert($data);
    }

    public function edit($data){
        $this->db->table('tabel_arsip')->where('id_arsip',$data['id_arsip'])->update($data);
    }
    public function remove($data){
        $this->db->table('tabel_arsip')->where('id_arsip',$data['id_arsip'])->delete($data);
    }

}