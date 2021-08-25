<?php

namespace App\Controllers;

use App\Models\Model_unit;

class Unit extends BaseController
{
	public function __construct()
    {
    	helper('form');
        $this->Model_unit= new Model_unit();
    }
	public function index()
	{
		$data = array(
			'title' => 'Unit', 
			'unit' => $this->Model_unit->all_data(),
			'konten' => 'v_unit',
		);
		return view('layout/v_wrapper', $data);
	}
	public function add()
	{
		$data = array(
			'nama_unit' => $this->request->getPost('nama_unit'),
		);
			
		$this->Model_unit->add($data);
		session()->setFlashdata('pesan','Unit Berhasil Ditambahkan');
		return redirect()->to(base_url('unit'));
		

	}
	public function edit($id_unit)
	{
		$data = array(
			'id_unit' => $id_unit,
			'nama_unit' => $this->request->getPost('nama_unit'),
		);
			
		$this->Model_unit->edit($data);
		session()->setFlashdata('pesan','Data Berhasil Diubah');
		return redirect()->to(base_url('unit'));
	}

	public function remove($id_unit)
	{
		$data = array(
			'id_unit' => $id_unit,
		);
			
		$this->Model_unit->remove($data);
		session()->setFlashdata('pesan','Data Terhapus');
		return redirect()->to(base_url('unit'));
	}
}
