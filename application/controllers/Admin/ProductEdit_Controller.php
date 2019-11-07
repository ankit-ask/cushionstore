<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductEdit_Controller extends CI_Controller {

	public function index()
	{
	}

	public function getData($id) {
		$data['id'] = $id;
		$this->load->view('Admin/ProductEdit', $data);
	}
}
