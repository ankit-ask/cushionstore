<?php
/**
 * 
 */
class Email_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		# code...
	}
	public function LFC_Enquiry()
	{

	$email_config = Array(
        'protocol'  => 'smtp',
        'smtp_crypto'	=>	'tls',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 587,
        'wordwrap'  => TRUE,
        'smtp_user' => 'jaiswaltanu199@gmail.com',
        'smtp_pass' => 'Aniket@Modker2498',
        'mailtype'  => 'html',
        'starttls'  => true,
        'newline'   => "\r\n",
        'mailtype'  => 'html', 
		'charset'   => 'utf-8',
		'validate'	=>	FALSE,
		'bcc_batch_mode'	=>	FALSE
    );
	$from_email = "jaiswaltanu199@gmail.com";
	$to_email= "industriesmeera@gmail.com";

	$this->load->library('email',$email_config);
	$subject = "Product enquiry for ".$_POST["product"];
	$this->email->from($from_email, "Technomize");
	$this->email->to($to_email); 
	$this->email->subject($subject);
	$this->email->message($_POST["name"].' filled up the enquiry from on your website for the product ( '.$_POST["product"].' )
		 and the required quantity is '.$_POST["qty"].'. You can contact the user on this, mobile- '.$_POST["number"].' email- '.$_POST["email"]);

	if ($this->email->send()) {
	# code...
		echo TRUE;
	}else{
		
		echo FALSE;
	}
}

public function LFC_Contact()
	{

		$email_config = Array(
	        'protocol'  => 'smtp',
	        'smtp_crypto'	=>	'tls',
	        'smtp_host' => 'smtp.gmail.com',
	        'smtp_port' => 587,
	        'wordwrap'  => TRUE,
	        'smtp_user' => 'jaiswaltanu199@gmail.com',
	        'smtp_pass' => 'Aniket@Modker2498',
	        'mailtype'  => 'html',
	        'starttls'  => true,
	        'newline'   => "\r\n",
	        'mailtype'  => 'html', 
			'charset'   => 'utf-8',
			'validate'	=>	FALSE,
			'bcc_batch_mode'	=>	FALSE
	    );
		$from_email = "jaiswaltanu199@gmail.com";
		$to_email= "industriesmeera@gmail.com";

		$this->load->library('email',$email_config);
		$this->email->from($from_email, "Technomize");
		$this->email->to($to_email); 
		$this->email->subject($_POST['subject']);
		$this->email->message('User name- '.$_POST['name'].' User message-'.$_POST["message"]. ' You can contact this user on '.$_POST["email"]);

		if ($this->email->send()) {
		# code...
			echo TRUE;
		}else{
			
			echo FALSE;
		}
}

}
?>