<?php

namespace App\Controllers;

use App\Models\Model_arsip;
use App\Models\Model_klasifikasi;
use App\Models\Model_unit;
use App\Models\Model_user;

class Arsip extends BaseController
{
	public function __construct()
    {
    	helper('form');
        $this->Model_arsip= new Model_arsip();
        $this->Model_unit= new Model_unit();
        $this->Model_user= new Model_user();
        $this->Model_klasifikasi= new Model_klasifikasi();
    }
	public function index()
	{
		$data = array(
			'title' => 'Arsip', 
			'arsip' => $this->Model_arsip->all_data(),
			'konten' => 'arsip/v_index'
		);
		return view('layout/v_wrapper', $data);
	}
	public function add()
	{
		$data = array(
			'title' => 'Tambah Arsip',
			'arsip' => $this->Model_arsip->all_data(),
			'unit' => $this->Model_unit->all_data(),
			'klasifikasi' => $this->Model_klasifikasi->all_data(),
			'konten' => 'arsip/v_add'
		);
		return view('layout/v_wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
            'no_arsip' => [
                'label'  => 'Nomor Arsip',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
             ],
            'id_klasifikasi' => [
                'label'  => 'Klasifikasi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'tgl_arsip' => [
                'label'  => 'Tanggal Arsip',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'nama_pengirim' => [
                'label'  => 'Pengirim',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'perihal' => [
                'label'  => 'Perihal',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            // 'id_unit' => [
            //     'label'  => 'Unit',
            //     'rules'  => 'required',
            //     'errors' => [
            //         'required' => '{field} Wajib Diisi !',
            //     ]
            // ],
            'file_arsip' => [
                'label'  => 'File Arsip',
                'rules'  => 'uploaded[file_arsip]|max_size[file_arsip,20480]|ext_in[file_arsip,pdf,png,jpg]',
                'errors' => [
                	'uploaded' => ' {field} Wajib Diisi !',
                    'max_size' => 'Ukuran {field} Max 20 MB !',
                    'ext_in' => 'Format {field} wajib PDF !',
                ]
            ],
        ])) {
        	$file_arsip = $this->request->getFile('file_arsip');
        	$namaFile = $file_arsip->getRandomName();
        	$filesize = $file_arsip->getSizeByUnit('mb');

        	$tgl_arsip = $this->request->getPost('tgl_arsip');
        	$tgl_arsipstamp =strtotime($tgl_arsip);
        	$tgl_arsip_new = date('Y-m-d', $tgl_arsipstamp);
        	//jika valid
        	$data = array(
			'id_klasifikasi' => $this->request->getPost('id_klasifikasi'),
			'tgl_arsip' => $tgl_arsip_new,
			'no_arsip' => $this->request->getPost('no_arsip'),
			'nama_pengirim' => $this->request->getPost('nama_pengirim'),
			'tgl_upload' => date('Y-m-d'),
			'tgl_update' => date('Y-m-d'),
			'perihal' => $this->request->getPost('perihal'),
			'id_unit' => session()->get('id_unit'),
			'id_user' => session()->get('id_user'),
			'file_arsip' => $namaFile,
			'filesize' => $filesize,
		);

        $file_arsip->move('files', $namaFile);
		$this->Model_arsip->add($data);
		session()->setFlashdata('pesan','Data Berhasil Diarsipkan');
		return redirect()->to(base_url('arsip'));

		 } else {
		 	session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('arsip/add'));
		 }
	}
	public function remove($id_arsip)
	{
		$arsip = $this->Model_arsip->detail_data($id_arsip);
        		if ($arsip['file_arsip']!=""){
        			unlink('files/'.$arsip['file_arsip']);
        		}
		$data = array(
			'id_arsip' => $id_arsip,
		);
			
		$this->Model_arsip->remove($data);
		session()->setFlashdata('pesan','Arsip Terhapus');
		return redirect()->to(base_url('arsip'));
	}

	public function edit($id_arsip)
	{
		$data = array(
			'title' => 'Edit User',
			'klasifikasi' => $this->Model_klasifikasi->all_data(),
			'user' => $this->Model_user->all_data(),
			'arsip' => $this->Model_arsip->detail_data($id_arsip),
			'konten' => 'arsip/v_edit'
		);
		return view('layout/v_wrapper', $data);
	}

	public function update($id_arsip)
	{
		if ($this->validate([
            'id_klasifikasi' => [
                'label'  => 'Klasifikasi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'nama_pengirim' => [
                'label'  => 'Pengirim',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'perihal' => [
                'label'  => 'Perihal',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],            
            'file_arsip' => [
                'label'  => 'File Arsip',
                'rules'  => 'max_size[file_arsip,20480]|ext_in[file_arsip,pdf,png,jpg]',
                'errors' => [                	
                    'max_size' => 'Ukuran {field} Max 20 MB !',
                    'ext_in' => 'Format {field} wajib PDF !',
                ]
            ],
        ])) {
        	$file_arsip = $this->request->getFile('file_arsip');
        	if ($file_arsip->getError() == 4) {
        		$data = array(
        			// nothing happen
        			'id_arsip' => $id_arsip,
					'id_klasifikasi' => $this->request->getPost('id_klasifikasi'),			
					'nama_pengirim' => $this->request->getPost('nama_pengirim'),					
					'tgl_update' => date('Y-m-d'),
					'perihal' => $this->request->getPost('perihal'),
					'id_unit' => session()->get('id_unit'),
					'id_user' => session()->get('id_user'),
					);
        		$this->Model_arsip->edit($data);
        	}else{        		
        			//kalo happening
        		$arsip = $this->Model_arsip->detail_data($id_arsip);
        		if ($arsip['file_arsip']!=""){
        			unlink('files/'.$arsip['file_arsip']);
        		}
        		$namaFile = $file_arsip->getRandomName();
        		$filesize = $file_arsip->getSizeByUnit('mb');
        		$data = array(
        			'id_arsip' => $id_arsip,
					'id_klasifikasi' => $this->request->getPost('id_klasifikasi'),
					// 'tgl_arsip' => $tgl_arsip_new,
					// 'no_arsip' => $this->request->getPost('no_arsip'),
					'nama_pengirim' => $this->request->getPost('nama_pengirim'),
					// 'tgl_upload' => date('Y-m-d'),
					'tgl_update' => date('Y-m-d'),
					'perihal' => $this->request->getPost('perihal'),
					'id_unit' => session()->get('id_unit'),
					'id_user' => session()->get('id_user'),
					'file_arsip' => $namaFile,
					'filesize' => $filesize,
				);

		        $file_arsip->move('files', $namaFile);
				$this->Model_arsip->edit($data);
        	}
        	session()->setFlashdata('pesan','Arsip berhasil diubah');
			return redirect()->to(base_url('arsip'));

		} else {
			//kalo ga bener
			session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
	        return redirect()->to(base_url('arsip/edit/' . $id_arsip));
			}
	}

	public function viewpdf($id_arsip)
	{
		// code...
		$data = array(
			'title' => 'Lihat Arsip', 
			'arsip' => $this->Model_arsip->detail_data($id_arsip),
			'konten' => 'arsip/v_viewpdf',
		);
		return view('layout/v_wrapper', $data);
	}
}
