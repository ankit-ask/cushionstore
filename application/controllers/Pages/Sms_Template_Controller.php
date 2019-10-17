<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_Template_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('Pages/sms-template');
	}
}