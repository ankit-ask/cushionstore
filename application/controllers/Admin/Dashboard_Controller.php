<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('Admin/Dashboard');
	}
}
