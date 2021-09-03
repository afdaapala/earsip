<?php

namespace App\Controllers;
use App\Models\Model_user;
use App\Models\Model_unit;

class User extends BaseController
{
	public function __construct()
    {
    	helper('form');
        $this->Model_user= new Model_user();
        $this->Model_unit= new Model_unit();
    }
	public function index()
	{
		$data = array(
			'title' => 'Index', 
			'user' => $this->Model_user->all_data(),
			'konten' => 'user/v_index'
		);
		return view('layout/v_wrapper', $data);
	}

	public function add(){
		$data = array(
			'title' => 'Add User',
			'unit' => $this->Model_unit->all_data(),
			'konten' => 'user/v_add'
		);
		return view('layout/v_wrapper', $data);
	}

	public function insert(){
		 if ($this->validate([
            'nama_user' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|is_unique[tabel_user.email]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                    'is_unique' => '{field} Sudah Terdaftar !',
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'id_unit' => [
                'label'  => 'Unit',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                	'uploaded' => ' {field} Wajib Diisi !',
                    'max_size' => 'Ukuran {field} Max 1024 KB !',
                    'mime_in' => 'Format {field} wajib PNG, JPG, JPEG dan GIF !',
                ]
            ],
        ])) {
        	$foto = $this->request->getFile('foto');
        	$namaFoto = $foto->getRandomName();

        	//jika valid
        	$data = array(
			'nama_user' => $this->request->getPost('nama_user'),
			'email' => $this->request->getPost('email'),
			'password' => $this->request->getPost('password'),
			'level' => $this->request->getPost('level'),
			'id_unit' => $this->request->getPost('id_unit'),
			'foto' => $namaFoto,
			
		);

        $foto->move('assets', $namaFoto);
			
		$this->Model_user->add($data);
		session()->setFlashdata('pesan','Data Berhasil Ditambahkan');
		return redirect()->to(base_url('user'));

		 } else {
		 	session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/add'));
		 }
	}
	public function edit($id_user){
		$data = array(
			'title' => 'Edit User',
			'unit' => $this->Model_unit->all_data(),
			'user' => $this->Model_user->detail_data($id_user),
			'konten' => 'user/v_edit'
		);
		return view('layout/v_wrapper', $data);
	}
	
	public function update($id_user){
		if ($this->validate([
            'nama_user' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'id_unit' => [
                'label'  => 'Unit',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !',
                ]
            ],
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 1024 KB !',
                    'mime_in' => 'Format {field} wajib PNG, JPG, JPEG dan GIF !',
                ]
            ],
            
        ])) {
        	$foto = $this->request->getFile('foto');
        	
        	if ($foto->getError() == 4) {
        		$data = array(
        		'id_user' => $id_user,
				'nama_user' => $this->request->getPost('nama_user'),
				// 'email' => $this->request->getPost('email'),
				'password' => $this->request->getPost('password'),
				'level' => $this->request->getPost('level'),
				'id_unit' => $this->request->getPost('id_unit'),
				// 'foto' => $namaFoto,
		);
		$this->Model_user->edit($data);
        	} else{
        		$user = $this->Model_user->detail_data($id_user);
        		if ($user['foto']!=""){
        			unlink('assets/'.$user['foto']);
        		}
        		$namaFoto = $foto->getRandomName();
        		$data = array(
	        		'id_user' => $id_user,
					'nama_user' => $this->request->getPost('nama_user'),
					// 'email' => $this->request->getPost('email'),
					'password' => $this->request->getPost('password'),
					'level' => $this->request->getPost('level'),
					'id_unit' => $this->request->getPost('id_unit'),
					'foto' => $namaFoto,
					);

		        $foto->move('assets', $namaFoto);					
				$this->Model_user->edit($data);
        	}

        	// $namaFoto = $foto->getRandomName();


        	//jika valid
        	
		session()->setFlashdata('pesan','Data Berhasil Diubah');
		return redirect()->to(base_url('user'));

		 } else {
		 	session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/edit/' . $id_user));
		 }
	}
	public function remove($id_user)
	{
		$user = $this->Model_user->detail_data($id_user);
        		if ($user['foto']!=""){
        			unlink('assets/'.$user['foto']);
        		}
		$data = array(
			'id_user' => $id_user,
		);
			
		$this->Model_user->remove($data);
		session()->setFlashdata('pesan','User Terhapus');
		return redirect()->to(base_url('user'));
	}

}
