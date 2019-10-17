<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_Inactive_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('Pages/employee-inactive');
	}
}
