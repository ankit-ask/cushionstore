<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Four_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('pages/product-four');
	}
}