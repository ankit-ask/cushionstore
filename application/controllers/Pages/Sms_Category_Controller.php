<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_Category_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('Pages/sms-category');
	}
}