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

					$response = ['message' => 'Invalid Token', 'status' => $status];

					$this->response($response, $status);

                } else {

                    return TRUE;

                }
            } catch (Exception $e) {

                $status = parent::HTTP_UNAUTHORIZED;

				$response = ['message' => 'Invalid Token', 'status' => $status];

				$this->response($response, $status);
                return FALSE;
                /*$response = ['status' => $status, 'msg' => 'Unauthorized Access! '];
                $this->response($response, $status);*/
            }
        }else{

            return FALSE;
        }
	    

	}
	private function generateToken($data){

		$token = AUTHORIZATION::generateToken($data);

		// $today=date('Y-m-d');

		$expiryDate=Date('Y-m-d', strtotime("+15 days"));
        // Set HTTP status code
        $status = parent::HTTP_OK;
        // REST_Controller provide this method to send responses

        $returnData = array('token' => $token, 'expiryDate' => $expiryDate);

        return $returnData;

	}



	public function login_post()
    {
    	if($this->Api_model->checkLogin($this->post('username'), $this->post('password'))){

            $userData = $this->generateToken($this->post('username'));

			$result = $this->Api_model->userDetails($this->post('username'));
			
			$message = 'User authenticated failed!';

        	if($result){

				$message = 'User authenticated successfully';

				$status = parent::HTTP_OK;

			}else{

				$message = 'User authenticated failed!';

				$status = parent::HTTP_OK;
			}
			
			if($result[0]->logged_in == 1){

				$message = 'User is already logged in from different device!';

				$status = parent::HTTP_FORBIDDEN;
				
				$response = ['body' => '', 'message' => $message, 'status' => $status];

			}else{
				
				$response = ['body' => array_merge($userData,$result), 'message' => $message, 'status' => $status];

			}


	        $this->response($response,$status);
    	}else{

    		$status = parent::HTTP_UNAUTHORIZED;

        	$result = ['status' => $status, 'message' => 'Invalid credentials!'];

        	$this->response($result,$status);
    	}
                
    }

    public function employeeAdd_post()
    {
    	# code...
    	if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->employeeAdd($data);
			
			$message = "User creation failed try again!";

    		if($result){

				$message = 'User created successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "User creation failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $data, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
        }
    	
	}
	
	public function getActiveEmployee_post(){

		if($this->verify_token()){
			if($this->input->post('customData[isFilter]') == 'false'){
				$list = $this->Api_model->getEmployee('ACTIVE');
			}else{
				$list = $this->Api_model->getEmployeeFilterData('ACTIVE');
			}
			// $data = array();
			// $no = $_POST['start'];
			// foreach ($list as $employee) {
			// 	$no++;
			// 	$row = array();
			// 	$row[] = $no;
			// 	$row[] = $employee->emp_id;
			// 	$row[] = $employee->name;
			// 	$row[] = $employee->designation;
			// 	$row[] = $employee->user_type;
			// 	$row[] = $employee->managed_by_name;
			// 	$row[] = $employee->managed_by_id;
			// 	$row[] = $employee->joining_date;
			// 	$row[] = $employee->mobile;
			// 	$row[] = $employee->email;
			// 	$row[] = $employee->address;
			// 	$row[] = $employee->lead_capacity;
			// 	$row[] = $employee->username;
			// 	$row[] = $employee->password;

			// 	$row[] = "<button  class='btn btn-warning btn-xs editActiveEmp jsr-cmd-btn'>Edit</button>
			// 	<button  class='btn btn-danger btn-xs inactiveActiveEmp jsr-cmd-btn'>InActive</button>
			// 	<button  class='btn btn-info btn-xs viewActiveEmpStats jsr-cmd-btn'>View Stats</button>";
	
			// 	$data[] = $row;
			// }
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getEmployeeAllCount(),
							"recordsFiltered" => $this->Api_model->getEmployeeCountFiltered('ACTIVE'),
							"data" => $list,
					);
			//output to json format
			echo json_encode($output);
		
        }
		
	}

	public function getInActiveEmployee_post(){

		if($this->verify_token()){
			if($this->input->post('customData[isFilter]') == 'false'){
				$list = $this->Api_model->getEmployee('INACTIVE');
			}else{
				$list = $this->Api_model->getEmployeeFilterData('INACTIVE');
			}
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $employee) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $employee->emp_id;
				$row[] = $employee->name;
				$row[] = $employee->designation;
				$row[] = $employee->user_type;
				$row[] = $employee->managed_by_name;
				$row[] = $employee->managed_by_id;
				$row[] = $employee->joining_date;
				$row[] = $employee->mobile;
				$row[] = $employee->email;
				$row[] = $employee->address;
				$row[] = $employee->lead_capacity;
				$row[] = $employee->username;
				$row[] = $employee->password;
				$row[] = "<button  class='btn btn-danger btn-xs deleteInActiveEmp jsr-cmd-btn'>Delete</button>";
				$data[] = $row;
			}
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getEmployeeAllCount(),
							"recordsFiltered" => $this->Api_model->getEmployeeCountFiltered('INACTIVE'),
							"data" => $data,
					);
			//output to json format
			echo json_encode($output);
		
        }
		
	}

    public function editActiveEmployee_post(){

		if($this->verify_token()){

			$data = $this->input->post();
          
			$result = $this->Api_model->globalEdit($data, 'employee');
			
			$message = "User updation failed try again!";

    		if($result){

				$message = 'User updated successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "User updation failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $data, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);

		}
		
	}

	public function editStatusEmployee_post($empId){

		if($this->verify_token()){

			$data = $this->input->post();
          
			$result = $this->Api_model->editStatusEmployee($empId,$data);
			
			$message = "User updation failed try again!";

    		if($result){

				$message = 'User updated successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "User updation failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $data, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);

		}
		
	}

    public function getDropdown_get($userType)
    {
    	# code...
    	if($this->verify_token()){
          
			$result = $this->Api_model->getDropdown($userType);
			
			$message = "User fetched failed try again!";

    		if($result == FALSE){

				$message = "No user found try again!";

    			$status = parent::HTTP_OK;		

    		}else{

				$message = 'User fetched successfully';

    			$status = parent::HTTP_OK;
				
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
		}
    }

    public function getNestedDropdown_get($userType, $empId)
    {
    	# code...
    	if($this->verify_token()){
          
			$result = $this->Api_model->getNestedDropdown($userType, $empId);
			
			$message = "User fetched failed try again!";

    		if($result == FALSE){

				$message = "No user found try again!";

    			$status = parent::HTTP_OK;		

    		}else{

				$message = 'User fetched successfully';

    			$status = parent::HTTP_OK;
				
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
		}
    }

    public function leadAdd_post(){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->leadAdd($data);
			
			$message = "Lead creation failed try again!";

    		if($result){

				$message = 'Lead created successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Lead creation failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $data, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
		
	}

	public function getAllLeads_post(){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){

				$list = $this->Api_model->getLeads('','');

			}else{

				$list = $this->Api_model->getLeadsFilterData('','');
			}
			
			$data = array();

			$no = $_POST['start'];			
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getLeadsCount(),
							"recordsFiltered" => $this->Api_model->getLeadsCountFiltered('',''),
							"data" => $list,
					);

			//output to json format
			echo json_encode($output);
		
		}
		
	}

	public function getLeadsByStatus_post($status){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){

				$list = $this->Api_model->getLeads($status,'');

			}else{

				$list = $this->Api_model->getLeadsFilterData($status,'');
			}
			
			$data = array();

			$no = $_POST['start'];			
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getLeadsCount(),
							"recordsFiltered" => $this->Api_model->getLeadsCountFiltered($status, ''),
							"data" => $list,
					);

			//output to json format
			echo json_encode($output);
		
		}
		
	}

	public function getLeadsByType_post($leadType){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){

				$list = $this->Api_model->getLeads('',$leadType);

			}else{

				$list = $this->Api_model->getLeadsFilterData('',$leadType);
			}
			
			$data = array();

			$no = $_POST['start'];			
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getLeadsCount(),
							"recordsFiltered" => $this->Api_model->getLeadsCountFiltered('', $leadType),
							"data" => $list,
					);

			//output to json format
			echo json_encode($output);
		
		}
		
	}

	public function getSmsCategory_post(){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){
				
				$list = $this->Api_model->getSmsCategory();

			}else{

				$list = $this->Api_model->getSmsCategoryFilterData();
			}
			
			$data = array();

			$no = $_POST['start'];	
			
			foreach ($list as $category) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $category->cat_id;
				$row[] = $category->category;
				$row[] = "<button  class='btn btn-warning btn-xs editSMSCategory jsr-cmd-btn'>Edit</button>
				<button  class='btn btn-danger btn-xs delSMSCategory jsr-cmd-btn'>Delete</button>";
	
				$data[] = $row;
			}
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getSmsCategoryCount(),
							"recordsFiltered" => $this->Api_model->getSmsCategoryCountFiltered(),
							"data" => $data,
					);

			//output to json format
			echo json_encode($output);
		
		}
		
	}

	public function getSmsTemplate_post(){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){
				
				$list = $this->Api_model->getSmsTemplate();

			}else{

				$list = $this->Api_model->getSmsTemplateFilterData();
			}
			
			// $data = array();

			// $no = $_POST['start'];	
			
			// foreach ($list as $template) {
			// 	$no++;
			// 	$row = array();
			// 	$row[] = $no;
			// 	$row[] = $template->smstemp_id;
			// 	$row[] = $template->category;
			// 	$row[] = $template->template_name;
			// 	$row[] = $template->content;
			// 	$row[] = "<button  class='btn btn-warning btn-xs editSmsTemplate jsr-cmd-btn'>Edit</button>
			// 	<button  class='btn btn-danger btn-xs delSmsTemplate jsr-cmd-btn'>Delete</button>";
	
			// 	$data[] = $row;
			// }
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getSmsTemplateCount(),
							"recordsFiltered" => $this->Api_model->getSmsTemplateCountFiltered(),
							"data" => $list,
					);

			//output to json format
			echo json_encode($output);
		
		}

	}

	public function getMailCategory_post(){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){
				
				$list = $this->Api_model->getMailCategory();

			}else{

				$list = $this->Api_model->getMailCategoryFilterData();
			}
			
			$data = array();

			$no = $_POST['start'];	
			
			foreach ($list as $category) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $category->cat_id;
				$row[] = $category->category;
				$row[] = "<button  class='btn btn-warning btn-xs editMailCategory jsr-cmd-btn'>Edit</button>
				<button  class='btn btn-danger btn-xs delMailCategory jsr-cmd-btn'>Delete</button>";
	
				$data[] = $row;
			}
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getMailCategoryCount(),
							"recordsFiltered" => $this->Api_model->getMailCategoryCountFiltered(),
							"data" => $data,
					);

			//output to json format
			echo json_encode($output);
		
		}


	}

	public function getMailTemplate_post(){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){
				
				$list = $this->Api_model->getMailTemplate();

			}else{

				$list = $this->Api_model->getMailTemplateFilterData();
			}
			
			// $data = array();

			// $no = $_POST['start'];	
			
			// foreach ($list as $template) {
			// 	$no++;
			// 	$row = array();
			// 	$row[] = $no;
			// 	$row[] = $template->mailtemp_id;
			// 	$row[] = $template->category;
			// 	$row[] = $template->template_name;
			// 	$row[] = $template->mail_head;
			// 	$row[] = $template->content;
			// 	$row[] = "<button  class='btn btn-warning btn-xs editMailTemplate jsr-cmd-btn'>Edit</button>
			// 	<button  class='btn btn-danger btn-xs delMailTemplate jsr-cmd-btn'>Delete</button>";
	
			// 	$data[] = $row;
			// }
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getMailTemplateCount(),
							"recordsFiltered" => $this->Api_model->getMailTemplateCountFiltered(),
							"data" => $list,
					);

			//output to json format
			echo json_encode($output);
		
		}

	}

	public function uploadCSV_post(){

		$this->load->library('csvimport');

		if($this->verify_token()){
			
			$file_data = $this->csvimport->get_array($_FILES["file"]["tmp_name"]);

			$time = new DateTime();

			$time->setTimezone(new DateTimeZone('Asia/Kolkata'));

			foreach($file_data as $row)
			{
				$row['mobile'] = preg_replace('/\s+/', '', $row['mobile']);

				$row['alternate_mobile'] = preg_replace('/\s+/', '', $row['alternate_mobile']);

				$data[] = array(
					'lead_id' 	=>	"LD-".strtoupper(uniqid()),
					'creation_date'	=>	$time->format("Y/m/d"),
					'last_update'	=>	$time->format("Y-m-d H:i:s"),
					'lead_type' =>	$this->input->post('lead_type'),
					'name'		=>	$row["name"],
					'mobile'	=>	$row["mobile"],
					'alternate_mobile'	=>	$row["alternate_mobile"],
					'segment'	=>	$row["segment"],
					'investment'=>	$row["investment"],
					'email'		=>	$row["email"],
					'country'	=>	$row["country"],
					'state'		=>	$row["state"],
					'city'		=>	$row["city"],
					'address'	=>	$row["address"],
					'pan_num'	=>	$row["pan_num"],
					'aadhar_num'=>	$row["aadhar_num"],
					'dob'		=>	$row["dob"],
					'lead_added_by_id' => $this->input->post('lead_added_by_id'),
					'lead_added_by_name' => $this->input->post('lead_added_by_name')
				);

				// $data['lead_id'] = 'LD'.$time->format("YmdHisu");
				
				// $data['creation_date'] = $time->format("d/m/Y");

				// $data['last_update'] = $time->format("Y-m-d H:i:s");
			}

			$result = $this->Api_model->uploadCSV($data);

			if($result){

				$message = 'Imported successfully';

				$status = parent::HTTP_OK;
				
			}else{

				$message = "Lead Import Failed again!";

    			$status = parent::HTTP_OK;
			}

			$response = ['message' => $message , 'status' => $status, 'ExtraMessage' => $result];

    		$this->response($response, $status);
		
		}
		
	}

	public function assignLeads_post(){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->assignLeads($data);
			
			$message = "Lead assigned process failed try again!";

    		if($result){

				$message = 'Lead assigned successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Lead assigned failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}

	}

	public function calculateIdealLeads_post(){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->calculateIdealLeads();
			
			$message = "Lead calculate process failed try again!";

    		if($result){

				$message = 'Lead calculated successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "No follow up lead found!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}

	}

	public function updateLeadStatus_post($status){
		
		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->updateLeadStatus($data, $status);
			
			$message = "Lead status updation failed try again!";

    		if($result){

				$message = 'Lead updated successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Lead updation failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function updateLead_post($leadId){
		
		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->updateLead($data, $leadId);
			
			$message = "Lead updation failed try again!";

    		if($result){

				$message = 'Lead updated successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Lead updation failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function convertLead_post($leadId){
		
		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->convertLead($data, $leadId);

			$status = parent::HTTP_OK;
    		
    		$response = ['body' => $result, 'status' => $status];

    		$this->response($response, $status);
            
		}
	}


	public function addLeadDesc_post($leadId){
		
		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->addLeadDesc($data, $leadId);
			
			$message = "Lead add description failed try again!";

    		if($result){

				$message = 'Lead add description successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Lead add description failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function bookFreeTrail_post($leadId){
		
		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->bookFreeTrail($data, $leadId);
			
			$message = "Lead free trial failed try again!";

    		if($result){

				$message = 'Lead free trial added successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Lead free trial failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function addSmsTemplate_post(){
		
		if($this->verify_token()){

			$data = $this->input->post();
			
			$data['smstemp_id'] = "SMST-".strtoupper(uniqid());
          
			$result = $this->Api_model->addSmsTemplate($data);
			
			$message = "SMS Template failed try again!";

    		if($result){

				$message = 'SMS Template added successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "SMS Template failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function addMailTemplate_post(){
		
		if($this->verify_token()){

			$data = $this->input->post();
			
			$data['mailtemp_id'] = "MAILT-".strtoupper(uniqid());
          
			$result = $this->Api_model->addMailTemplate($data);
			
			$message = "Mail Template failed try again!";

    		if($result){

				$message = 'Mail Template added successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Mail Template failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function addSmsCategory_post(){
		
		if($this->verify_token()){

			$data = $this->input->post();
			
			$data['cat_id'] = "SMS_CAT-".strtoupper(uniqid());
          
			$result = $this->Api_model->addSmsCategory($data);
			
			$message = "SMS Category failed try again!";

    		if($result){

				$message = 'SMS Category added successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "SMS Category failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function addMailCategory_post(){
		
		if($this->verify_token()){

			$data = $this->input->post();
			
			$data['cat_id'] = "MAIL_CAT-".strtoupper(uniqid());
          
			$result = $this->Api_model->addMailCategory($data);
			
			$message = "Mail Category failed try again!";

    		if($result){

				$message = 'Mail Category added successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Mail Category failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function editSmsTemplate_post($smsTempId){
		
		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->editSmsTemplate($data, $smsTempId);
			
			$message = "SMS Template updation failed try again!";

    		if($result){

				$message = 'SMS Template updated successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "SMS Template updation failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function editSmsCategory_post($catId){
		
		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->editSmsCategory($data, $catId);
			
			$message = "SMS Category updation failed try again!";

    		if($result){

				$message = 'SMS Category updated successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "SMS Category updation failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function editMailTemplate_post($mailTempId){
		
		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->editMailTemplate($data, $mailTempId);
			
			$message = "Mail Template updation failed try again!";

    		if($result){

				$message = 'Mail Template updated successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Mail Template updation failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function updateMailCategory_post($catId){
		
		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->updateMailCategory($data, $catId);
			
			$message = "Mail Category updation failed try again!";

    		if($result){

				$message = 'Mail Category updated successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Mail Category updation failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function delGlobal_post($tableName){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->delGlobal($data, $tableName);
			
			$message = "Delete process failed try again!";

    		if($result){

				$message = 'Delete process done successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Delete process failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}

	}

	public function fetchGlobal_get($tableName){

		if($this->verify_token()){
          
			$result = $this->Api_model->fetchGlobal($tableName);
			
			$message = "Fetch process failed try again!";

    		if($result){

				$message = 'Fetch process done successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Fetch process failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}

	}

	public function fetchGlobalWhere_post($tableName){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->fetchGlobalWhere($data, $tableName);
			
			$message = "Fetch process failed try again!";

    		if($result){

				$message = 'Fetch process done successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Fetch process failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}

	}

	public function getServices_post(){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){
				
				$list = $this->Api_model->getServices();

			}else{

				$list = $this->Api_model->getServicesFilterData();
			}
			
			$data = array();

			$no = $_POST['start'];	
			
			foreach ($list as $serivce) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $serivce->service_id;
				$row[] = $serivce->service_name;
				$row[] = $serivce->package_monthly;
				$row[] = $serivce->package_quaterly;
				$row[] = $serivce->package_halfyearly;
				$row[] = $serivce->package_yearly;	
				$data[] = $row;
			}
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getServicesCount(),
							"recordsFiltered" => $this->Api_model->getServicesCountFiltered(),
							"data" => $data,
					);

			//output to json format
			echo json_encode($output);
		
		}

	}

	public function addTarget_post(){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->addTarget($data);
			
			$message = "Target add failed try again!";

    		if($result){

				$message = 'Target add done successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Target add failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}

	}

	public function getTarget_post(){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){
				
				$list = $this->Api_model->getTarget('');

			}else{

				$list = $this->Api_model->getTargetFilterData('');
			}
			
			$data = array();

			$no = $_POST['start'];	
			
			// foreach ($list as $target) {
			// 	$no++;
			// 	$row = array();
			// 	$row[] = $no;
			// 	$row[] = $target->emp_name;
			// 	$row[] = $target->emp_fk;
			// 	$row[] = $target->target_assigned;
			// 	$row[] = $target->assigned_by;
			// 	$row[] = $target->month;
			// 	$row[] = $target->achieved_percent;
			// 	$row[] = $target->achieved_value;	
			// 	$data[] = $row;
			// }
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getTargetCount(),
							"recordsFiltered" => $this->Api_model->getTargetCountFiltered(''),
							"data" => $list,
					);

			//output to json format
			echo json_encode($output);
		
		}
	}

	public function getSingleTarget_post(){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){
				
				$list = $this->Api_model->getTarget('single');

			}else{

				$list = $this->Api_model->getTargetFilterData('single');
			}
			
			$data = array();

			$no = $_POST['start'];	
			
			// foreach ($list as $target) {
			// 	$no++;
			// 	$row = array();
			// 	$row[] = $no;
			// 	$row[] = $target->emp_name;
			// 	$row[] = $target->emp_fk;
			// 	$row[] = $target->target_assigned;
			// 	$row[] = $target->assigned_by;
			// 	$row[] = $target->month;
			// 	$row[] = $target->achieved_percent;
			// 	$row[] = $target->achieved_value;	
			// 	$data[] = $row;
			// }
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getTargetCount(),
							"recordsFiltered" => $this->Api_model->getTargetCountFiltered('single'),
							"data" => $list,
					);

			//output to json format
			echo json_encode($output);
		
		}
	}

	public function addSalesOrder_post(){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->addSalesOrder($data);
			
			$message = "Salesorder add failed try again!";

    		if($result){

				$message = 'Salesorder added successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Salesorder add failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function updateSalesOrder_post($salesId){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->updateSalesOrder($data, $salesId);
			
			$message = "Salesorder update failed try again!";

    		if($result){

				$message = 'Salesorder update done successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Salesorder update failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function getSalesOrder_post(){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){
				
				$list = $this->Api_model->getSalesOrder('');

			}else{

				$list = $this->Api_model->getSalesOrderFilterData('');
			}
			
			$data = array();

			$no = $_POST['start'];	
			
			// foreach ($list as $salesOrder) {
			// 	$no++;
			// 	$row = array();
			// 	$row[] = $no;
			// 	$row[] = $salesOrder->lead_fk;
			// 	$row[] = $salesOrder->lead_name;
			// 	$row[] = $salesOrder->service_name;
			// 	$row[] = $salesOrder->package_name;
			// 	$row[] = $salesOrder->package_amt;
			// 	$row[] = $salesOrder->recieved_amt;	
			// 	$row[] = $salesOrder->service_start_date;	
			// 	$row[] = $salesOrder->service_end_date;	
			// 	$row[] = $salesOrder->total_days;	
			// 	$row[] = $salesOrder->remark;	
			// 	$row[] = $salesOrder->payment_date;	
			// 	$row[] = $salesOrder->payment_timestamp;	
			// 	$row[] = $salesOrder->payment_mode;	
			// 	$row[] = $salesOrder->payment_acc;	
			// 	$row[] = $salesOrder->reference_num;	
			// 	$row[] = $salesOrder->order_status;	
			// 	$row[] = $salesOrder->booked_by_id;	
			// 	$row[] = $salesOrder->booked_by_name;	
			// 	$row[] = $salesOrder->admin_comment;	
			// 	$data[] = $row;
			// }
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getSalesOrderCount(),
							"recordsFiltered" => $this->Api_model->getSalesOrderCountFiltered(''),
							"data" => $list,
					);

			//output to json format
			echo json_encode($output);
		
		}
	}

	public function getSalesOrderByStatus_post($status){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){
				
				$list = $this->Api_model->getSalesOrder($status);

			}else{

				$list = $this->Api_model->getSalesOrderFilterData($status);
			}
			
			$data = array();

			$no = $_POST['start'];	
			
			// foreach ($list as $salesOrder) {
			// 	$no++;
			// 	$row = array();
			// 	$row[] = $no;
			// 	$row[] = $salesOrder->lead_fk;
			// 	$row[] = $salesOrder->lead_name;
			// 	$row[] = $salesOrder->service_name;
			// 	$row[] = $salesOrder->package_name;
			// 	$row[] = $salesOrder->package_amt;
			// 	$row[] = $salesOrder->recieved_amt;	
			// 	$row[] = $salesOrder->service_start_date;	
			// 	$row[] = $salesOrder->service_end_date;	
			// 	$row[] = $salesOrder->total_days;	
			// 	$row[] = $salesOrder->remark;	
			// 	$row[] = $salesOrder->payment_date;	
			// 	$row[] = $salesOrder->payment_timestamp;	
			// 	$row[] = $salesOrder->payment_mode;	
			// 	$row[] = $salesOrder->payment_acc;	
			// 	$row[] = $salesOrder->reference_num;	
			// 	$row[] = $salesOrder->order_status;	
			// 	$row[] = $salesOrder->booked_by_id;	
			// 	$row[] = $salesOrder->booked_by_name;	
			// 	$row[] = $salesOrder->admin_comment;	
			// 	$data[] = $row;
			// }
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getSalesOrderCount(),
							"recordsFiltered" => $this->Api_model->getSalesOrderCountFiltered($status),
							"data" => $list,
					);

			//output to json format
			echo json_encode($output);
		
		}

	}

	public function getFreeTrial_post($status){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){
				
				$list = $this->Api_model->getFreeTrial($status);

			}else{

				$list = $this->Api_model->getFreeTrialFilterData($status);
			}
			
			$data = array();

			$no = $_POST['start'];	
			
			foreach ($list as $freeTrial) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $freeTrial->lead_fk;
				$row[] = $freeTrial->lead_name;
				$row[] = $freeTrial->service_name;
				$row[] = $freeTrial->start_date;
				$row[] = $freeTrial->end_date;
				$row[] = $freeTrial->days;
				$row[] = $freeTrial->booked_by;	
				$data[] = $row;
			}
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getFreeTrialCount(),
							"recordsFiltered" => $this->Api_model->getFreeTrialCountFiltered($status),
							"data" => $data,
					);

			//output to json format
			echo json_encode($output);
		
		}
	}

	public function getBank_post(){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){
				
				$list = $this->Api_model->getBank();

			}else{

				$list = $this->Api_model->getBankFilterData();
			}
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getBankCount(),
							"recordsFiltered" => $this->Api_model->getBankCountFiltered(),
							"data" => $list,
					);

			//output to json format
			echo json_encode($output);
		}
	}

	public function addBank_post(){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->addBank($data);
			
			$message = "Bank add failed try again!";

    		if($result){

				$message = 'Bank added successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Bank add failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}

	}

	public function updateBank_post($accId){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->updateBank($data, $accId);
			
			$message = "Bank updation failed try again!";

    		if($result){

				$message = 'Bank updated successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Bank updation failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function sendSms_post(){

		if($this->verify_token()){
          
			$result = $this->Api_model->sendSms();
			
			$message = "SMS Send Process failed try again!";

    		if($result){

				$message = 'SMS sent successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "SMS Send Process failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}
	}

	public function sendEmail_post(){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->sendEmail($data);
			
			$message = "Email Send Process failed try again!";

    		if($result){

				$message = 'Email sent successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Email Send Process failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}

	}

	public function getEmployeeDropDown_post(){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->getEmployeeDropDown($data);
			
			$message = "Employee fetch process failed try again!";

    		if($result){

				$message = 'Employee fetched successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Employee fetch process failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}

	}

	public function getLeadsDesc_get($leadId){
		
		if($this->verify_token()){
          
			$result = $this->Api_model->getLeadsDesc($leadId);
			
			$message = "Lead fetch process failed try again!";

    		if($result){

				$message = 'Lead fetched successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Lead fetch process failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}

	}

	public function getCountReport_post($tableName){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->getCountReport($data, $tableName);
			
			$message = "Process failed try again!";

    		if($result){

				$message = 'Process done successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Process failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}

	}

	public function assignLeadsToSelf_post(){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->assignLeadsToSelf($data);
			
			$message = "Process failed try again!";

    		if($result){

				$message = 'Process done successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Process failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}

	}

	public function getLeadsDesc_post(){

		if($this->verify_token()){
			
			if($this->input->post('customData[isFilter]') == 'false'){
				
				$list = $this->Api_model->getLeadsDescFull();

			}else{

				$list = $this->Api_model->getLeadsDescFullFilterData();
			}
			
			$data = array();

			$no = $_POST['start'];	
			
			foreach ($list as $leadsDesc) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $leadsDesc->emp_fk;
				$row[] = $leadsDesc->mobile;
				$row[] = $leadsDesc->lead_fk;
				$row[] = $leadsDesc->calling_time;
				$row[] = $leadsDesc->call_status;
				$row[] = $leadsDesc->description;
				$row[] = $leadsDesc->callback_date;	
				$row[] = $leadsDesc->callback_time;	
				$data[] = $row;
			}
	
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->Api_model->getLeadsDescFullCount(),
							"recordsFiltered" => $this->Api_model->getLeadsDescFullCountFiltered(),
							"data" => $data,
					);

			//output to json format
			echo json_encode($output);
		
		}

	}

	public function getUploadLeadsReport_post(){

		if($this->verify_token()){

    		$data = $this->input->post();
          
			$result = $this->Api_model->getUploadLeadsReport($data);
			
			$message = "Process failed try again!";

    		if($result){

				$message = 'Process done successfully';

    			$status = parent::HTTP_OK;

    		}else{

				$message = "Process failed try again!";

    			$status = parent::HTTP_OK;
    		}

    		$response = ['body' => $result, 'message' => $message , 'status' => $status];

    		$this->response($response, $status);
            
		}

	}

	public function test_post(){

		$result=$this->Api_model->test();

		$this->response($result, '200');
	}
}
?>
