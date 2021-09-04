<?php

namespace App\Controllers;

use App\Models\Model_home;

class Home extends BaseController
{
	public function __construct()
	{
		// code...
		$this->Model_home = new Model_home();
	}
	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'total_arsip'  => $this->Model_home->total_arsip(),
			'total_klasifikasi'  => $this->Model_home->total_klasifikasi(),
			'total_user'  => $this->Model_home->total_user(),
			'total_unit'  => $this->Model_home->total_unit(),
			'konten' => 'v_home',
		);
		return view('layout/v_wrapper', $data);
	}
}
