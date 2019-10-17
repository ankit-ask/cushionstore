<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salesorder_Rejected_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('Pages/salesorder-rejected');
	}
}