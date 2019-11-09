<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Six_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('pages/product-six');
	}
}