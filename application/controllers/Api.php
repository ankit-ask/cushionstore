<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Api extends REST_Controller{

		
	public function __construct(){

		parent::__construct();

		if (isset($_SERVER['HTTP_ORIGIN'])) {
		    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
		    header('Access-Control-Allow-Credentials: true');
		    header('Access-Control-Max-Age: 86400');    // cache for 1 day
		}
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
		 
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
		        header("Access-Control-Allow-Methods: POST, POST, OPTIONS");         
		 
		    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
		        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
		 
		    exit(0);
		}
		
        $this->load->helper(['jwt_helper', 'authorization_helper']);    

        $this->load->model('Api_model');

	}

	private function verify_token(){
	    // Get all the headers
	    $headers = $this->input->request_headers();

	    // Extract the token
        if (isset($headers['Authorization'])) {

            # code...
            $token = $headers['Authorization'];

            // Use try-catch
            // JWT library throws exception if the token is not valid
            try {
                $data = AUTHORIZATION::validateToken($token);
                if ($data === false) {

                    $status = parent::HTTP_UNAUTHORIZED;

					$response = ['message' => 'UnAuthorized User', 'status' => $status];

					$this->response($response, $status);

                } else {

                    return TRUE;

                }
            } catch (Exception $e) {

                $status = parent::HTTP_UNAUTHORIZED;

				$response = ['message' => 'Invalid Token', 'status' => $status];

				$this->response($response, $status);
                return FALSE;
            }
        }else{
            return FALSE;
        }
	    

	}
	private function generateToken($data){

		$token = AUTHORIZATION::generateToken($data);

		// $today=date('Y-m-d');

		$expiryDate=Date('Y-m-d', strtotime("+30 days"));
        // Set HTTP status code
		$status = parent::HTTP_OK;
		// REST_Controller provide this method to send responses

		$returnData = array('token' => $token, 'expiryDate' => $expiryDate);

		return $returnData;

	}



	public function login_post()
    {
    	if($this->Api_model->checkLogin($this->post('userId'), $this->post('password'))){

            $userData = $this->generateToken($this->post('userId'));

			$result = $this->Api_model->userDetails($this->post('userId'));
			
			$message = 'User authenticated failed!';

        	if($result){

				$message = 'User authenticated successfully';

				$status = parent::HTTP_OK;

			}else{

				$message = 'User authenticated failed!';

				$status = parent::HTTP_OK;
			}
							
			$response = ['body' => array_merge($userData,$result), 'message' => $message, 'status' => $status];


	        $this->response($response,$status);
    	}else{

    		$status = parent::HTTP_UNAUTHORIZED;

        	$result = ['status' => $status, 'message' => 'Invalid credentials!'];

        	$this->response($result,$status);
    	}
                
	}
	
	public function fetchProductDetail_get($id)
    {
    	# code...
    	// $token = $this->verify_token();

    	$result = $this->Api_model->fetchProductDetail($id);

    	$status = parent::HTTP_OK;

    	$response = ['body' => $result, 'message' => 'Product Detail Fetched Successfully', 'status' => $status];

    	$this->response($response, $status);

    }


	
	
}
?>
