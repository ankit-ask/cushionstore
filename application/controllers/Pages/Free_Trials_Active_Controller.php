<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Trials_Active_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('Pages/free-trials-active');
	}
}