<?php 
/**
 * 
 */
class Ajax_Controller extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->database();
	}

	public function insert_enquiry()
	{
		# code...

		$data=array(
			'mobile'=>$this->input->post('mobile_post'),
			'category'=>'Project_Enquiry'
		);

		$this->load->model('Ajax_Modal');
		//$this->Ajax_Modal->insert_enquiry($data);
		if($this->Ajax_Modal->insert_enquiry($data) == TRUE){
			echo 'We will contact you ASAP';
		}else{
			echo 'Oops! Network error Please try again!';
		}
	}

	public function insert_support()
	{
		# code...

		$data=array(
			'mobile'=>$this->input->post('mobile_post'),
			'email'=>$this->input->post('email_post'),
			'category'=>'Support_Us'
		);

		$this->load->model('Ajax_Modal');
		//$this->Ajax_Modal->insert_enquiry($data);
		if($this->Ajax_Modal->insert_support($data) == TRUE){
			echo 'We will contact you ASAP';
		}else{
			echo 'Oops! Network error Please try again!';
		}
	}

	public function insert_contact()
	{
		# code...

		$data=array(
			'mobile'=>$this->input->post('mobile_post'),
			'email'=>$this->input->post('email_post'),
			'name'=>$this->input->post('name_post'),
			'message'=>$this->input->post('message_post'),
			'category'=>'Contact_Us'
		);

		$this->load->model('Ajax_Modal');
		//$this->Ajax_Modal->insert_enquiry($data);
		if($this->Ajax_Modal->insert_contact($data) == TRUE){
			echo 'We will contact you ASAP';
		}else{
			echo 'Oops! Network error Please try again!';
		}
	}
}
?>