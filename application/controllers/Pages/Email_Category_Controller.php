<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_Category_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('Pages/email-category');
	}
}