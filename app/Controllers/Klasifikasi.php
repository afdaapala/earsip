<?php

namespace App\Controllers;

use App\Models\Model_klasifikasi;

class Klasifikasi extends BaseController
{
	public function __construct()
    {
    	helper('form');
        $this->Model_klasifikasi= new Model_klasifikasi();
    }
	public function index()
	{
		$data = array(
			'title' => 'Klasifikasi', 
			'klasifikasi' => $this->Model_klasifikasi->all_data(),
			'konten' => 'v_klasifikasi',
		);
		return view('layout/v_wrapper', $data);
	}
	public function add()
	{
		$data = array(
			'kode_klasifikasi' => $this->request->getPost('kode_klasifikasi'),
			'nama_klasifikasi' => $this->request->getPost('nama_klasifikasi'),
		);
			
		$this->Model_klasifikasi->add($data);
		session()->setFlashdata('pesan','Data Berhasil Ditambahkan');
		return redirect()->to(base_url('klasifikasi'));
		

	}
}
