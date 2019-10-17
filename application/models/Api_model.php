<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Api_model extends CI_Model {

	var $order = array('id' => 'asc');
	
	public function __construct() {

		parent::__construct();

	}

	public function formateDateFilter($oldDate){

		$arr = explode('/', $oldDate);
		return $arr[2].'/'.$arr[1].'/'.$arr[0];

	}


	
  public function userDetails($username) {

    $this->db->trans_begin();

    $this->db->select('*');

    $conditions = array('username' => $username);

    $this->db->where($conditions);

    $query = $this->db->get('employee');

    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      return FALSE;
    }
 
       

    if ($query->num_rows() == 1) {

		$result = $query->result();
		
		$conditions = array('username' => $username);
		
		$this->db->where($conditions);
		
		$this->db->update('employee', array(
			'logged_in' => 1
		));

		$this->db->trans_commit(); 

        return $result;
	}
		
		$this->db->trans_commit(); 

    return FALSE;
  }

  public function checkLogin($username, $password) {

    $this->db->trans_begin();

    $this->db->select('*');

    $this->db->from('employee');

    $conditions = array('username' => $username, 'password' => $password);

    $this->db->where($conditions);

    $query = $this->db->get();

    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      return FALSE;
    }

    if ($query->num_rows() == 1) {

				$result = $query->result();
		
				$this->db->trans_commit();

        return TRUE;

		}
		
		$this->db->trans_commit();

      return FALSE;
  }


  public function employeeAdd($data)
  {
    # code...
    $this->db->trans_begin();

    $time = new DateTime();

    $time->setTimezone(new DateTimeZone('Asia/Kolkata'));

    $data['emp_id'] = 'E'.$time->format("YmdHis");

    if($this->db->insert('employee', $data)){
		
		if($data['user_type'] == 'TELECALLER'){

			$this->db->select('managed_by_id');

			$this->db->where(array('emp_id' => $data['managed_by_id']));

			$this->db->from('employee');

			$dshId = $this->db->get()->row_array();

			$this->db->insert('dsh_role', array('dsh_id' => $dshId['managed_by_id'], 'mgr_id' => $data['managed_by_id'], 'tel_id' => $data['emp_id']));

		}

		if($data['user_type'] == 'MANAGER'){

			$this->db->select('managed_by_id');

			$this->db->where(array('emp_id' => $data['managed_by_id']));

			$this->db->from('employee');

			$dshId = $this->db->get()->row_array();

			$this->db->insert('dsh_role', array('dsh_id' => $dshId['managed_by_id'], 'mgr_id' => $data['emp_id'], 'tel_id' => 'NA'));

		}

		$this->db->trans_commit();
		
		return TRUE;

    }

    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      return FALSE;
    }

	$this->db->trans_commit();

}
// only works for the condition where updation is done by column emp_id
	public function globalEdit($data, $tablename)
  {
    # code...
    $this->db->trans_begin();

    $this->db->where('emp_id', $data['emp_id']);

    if ($this->db->update($tablename, $data)) {

      $this->db->trans_commit();
      
      return TRUE;

    }

    if ($this->db->trans_status() === FALSE)
    {
			$this->db->trans_rollback();
			
			$this->db->trans_commit();

			return FALSE;
			
    }
	}
	
	public function editStatusEmployee($empId, $data){

		$this->db->trans_begin();

		$this->db->where('emp_id', $empId);

		if ($this->db->update('employee', $data)) {

		$this->db->trans_commit();
		
		return TRUE;

		}

		if ($this->db->trans_status() === FALSE)
		{
				$this->db->trans_rollback();
				
				$this->db->trans_commit();

				return FALSE;
				
		}
	}

	public function leadAdd($data)
	{
    # code...
		$this->db->trans_begin();

		$time = new DateTime();

		$time->setTimezone(new DateTimeZone('Asia/Kolkata'));

		$data['lead_id'] = 'LD'.$time->format("YmdHisu");
		
		$data['creation_date'] = $time->format("Y/m/d");

		$data['last_update'] = $time->format("Y-m-d H:i:s");

		if($this->db->insert('leads', $data)){

		$this->db->trans_commit();
		
		return TRUE;

		}

		if ($this->db->trans_status() === FALSE)
		{
		$this->db->trans_rollback();

		return FALSE;
		}

		$this->db->trans_commit();
	}

	public function getBank(){

		$column_order = array(null, 'acc_id','bank_name','branch','acc_num', 'ifsc'); //set column field database for datatable orderable

		$this->db->select('*');

		$this->db->from('company_accounts');

		if($_POST['length'] != -1)
				$this->db->limit($_POST['length'], $_POST['start']);
				
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		$query = $this->db->get();
		
        return $query->result();
	}

	public function getBankFilterData(){

		$this->getFilteredBankQuery();

		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']); 
		
		$query = $this->db->get();
		
		return $query->result();
	}

	public function getFilteredBankQuery(){

		$column_order = array(null, 'acc_id','bank_name','branch','acc_num', 'ifsc'); //set column field database for datatable orderable
		//set column field database for datatable orderable

		if($this->input->post('customData[name]'))
		{
				$this->db->like('name', $this->input->post('customData[name]'));
		}
		

		$this->db->from('company_accounts');
		$i = 0;
			
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}

	}

	public function getBankCount(){

		return $this->db->count_all_results();

	}

	public function getBankCountFiltered(){

		$this->getFilteredBankQuery();

		$query = $this->db->get();
		
		return $query->num_rows();

	}
	
	public function getEmployee($status){

		$column_order = array(null, 'emp_id','name','designation','user_type', 'managed_by_id' ,'managed_by_name', 'joining_date', 
		'mobile', 'email','address', 'lead_capacity', 'username', 'password'); //set column field database for datatable orderable

		if($this->input->post('customData[userType]') == 'DSH'){

			$empIds ='';
	
			$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");			
			
			$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");
	
			foreach($query->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}
	
			foreach($query2->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}
	
			$this->db->where_in('emp_id' , explode(',', $empIds));
	
		}else if($this->input->post('customData[userType]') == 'MANAGER'){
	
			$query = $this->db->query("SELECT DISTINCT emp_id as emp_fk FROM employee WHERE managed_by_id = '" .$this->input->post('customData[empId]')."'");			
	
			$empIds = $this->input->post('customData[empId]');
	
			foreach($query->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}
	
			$this->db->where_in('emp_id' , explode(',', $empIds));
	
		}else if($this->input->post('customData[userType]') == 'TELECALLER'){
	
			$this->db->where('emp_id' , $this->input->post('customData[empId]'));
	
		}

		$this->db->select('*');

		$this->db->where('status', $status);

		$this->db->from('employee');

		if($_POST['length'] != -1)
				$this->db->limit($_POST['length'], $_POST['start']);
				
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		$query = $this->db->get();
		
        return $query->result();

	}

	public function getFilteredEmployeeQuery($status){

		$column_order = array(null, 'emp_id','name','designation','user_type', 'managed_by_id' ,'managed_by_name', 'joining_date',
		 'mobile', 'email', 'address', 'lead_capacity', 'username', 'password'); //set column field database for datatable orderable
    $column_search = array('emp_id','name','designation','user_type','managed_by_name'); //set column field database for datatable searchable 
		 
		$this->db->where('status', $status);

		if($this->input->post('customData[userType]') == 'DSH'){

			$empIds ='';
	
			$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");			
			
			$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");
	
			foreach($query->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}
	
			foreach($query2->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}
	
			$this->db->where_in('emp_id' , explode(',', $empIds));
	
		}else if($this->input->post('customData[userType]') == 'MANAGER'){
	
			$query = $this->db->query("SELECT DISTINCT emp_id as emp_fk FROM employee WHERE managed_by_id = '" .$this->input->post('customData[empId]')."'");			
	
			$empIds = $this->input->post('customData[empId]');
	
			foreach($query->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}
	
			$this->db->where_in('emp_id' , explode(',', $empIds));
	
		}else if($this->input->post('customData[userType]') == 'TELECALLER'){
	
			$this->db->where('emp_id' , $this->input->post('customData[empId]'));
	
		}


		if($this->input->post('customData[startDate]') && $this->input->post('customData[endDate]')){
			$this->db->where('joining_date >=',$this->input->post('customData[startDate]'));
			$this->db->where('joining_date <=',$this->input->post('customData[endDate]'));
		}

		if($this->input->post('customData[name]'))
		{
				$this->db->like('name', $this->input->post('customData[name]'));
		}
		if($this->input->post('customData[designation]'))
		{
				$this->db->like('designation', $this->input->post('customData[designation]'));
		}
		if($this->input->post('customData[managed_by_name]'))
		{
				$this->db->like('managed_by_name', $this->input->post('customData[managed_by_name]'));
		}
		if($this->input->post('customData[user_type]'))
		{
				$this->db->like('user_type', $this->input->post('customData[user_type]'));
		}

		$this->db->from('employee');
		$i = 0;
	
		foreach ($column_search as $item) // loop column 
		{
				if($_POST['search']['value']) // if datatable send POST for search
				{
							
						if($i===0) // first loop
						{
								$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
								$this->db->like($item, $_POST['search']['value']);
						}
						else
						{
								$this->db->or_like($item, $_POST['search']['value']);
						}

						if(count($column_search) - 1 == $i) //last loop
								$this->db->group_end(); //close bracket
				}
				$i++;
		}
			
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}

	}

	public function getEmployeeFilterData($status)
	{
			$this->getFilteredEmployeeQuery($status);
			if($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']); 
			$query = $this->db->get();
			return $query->result();
	}

	public function getEmployeeCountFiltered($status)
	{
		$this->getFilteredEmployeeQuery($status);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getEmployeeAllCount()
	{
			// $this->db->from('employee');
			return $this->db->count_all_results();
	}

	
		
  public function getDropdown($userType)
  {
    # code...

	$this->db->trans_begin();

	$this->db->select('*');

    $query = $this->db->get_where('employee', array('user_type' => $userType));

    if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			
			$this->db->trans_commit();

			return;
		}

		$result = $query->result();

		$this->db->trans_commit();

    return $result;
	}
	
	public function getNestedDropdown($userType, $empId)
	{
	# code...

		$this->db->trans_begin();

		$this->db->select('*');

		if($userType === 'ADMIN'){

			$query = $this->db->where( array('user_type!=' => 'ADMIN'));			

		}else if($userType === 'DSH'){

			$query = $this->db->where( array('user_type!=' => 'DSH'));

		}else{

			$query = $this->db->get_where('employee', array('user_type' => 'TELECALLER', 'managed_by_id' => $empId));

		}

		$query = $this->db->get('employee');

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			
			$this->db->trans_commit();

			return;
		}

		$result = $query->result();

		$this->db->trans_commit();

		return $result;
  }	

  public function getFreeTrial($status){

	$column_order = array(null,'lead_fk' ,'lead_name', 'service_name', 'start_date', 'end_date', 'days', 'booked_by'); //set column field database for datatable orderable

	$this->db->select('*');

	$this->db->from('freetrials');

	if($this->input->post('customData[userType]') == 'DSH'){

		$empIds ='';

		$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");			
		
		$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		foreach($query2->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('emp_fk' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'MANAGER'){

		$query = $this->db->query("SELECT DISTINCT emp_id as emp_fk FROM employee WHERE managed_by_id = '" .$this->input->post('customData[empId]')."'");			

		$empIds = $this->input->post('customData[empId]');

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('emp_fk' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'TELECALLER'){

		$this->db->where('emp_fk' , $this->input->post('customData[empId]'));

	}
	$time = new DateTime();

	$time->setTimezone(new DateTimeZone('Asia/Kolkata'));
		
	$today = $time->format("Y/m/d");

	if($status == 'ACTIVE'){

		$this->db->where('end_date >=' , $today);

	}else if($status == 'PAST'){

		$this->db->where('end_date <=' , $today);

	}

	if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	}

	$query = $this->db->get();

	return $query->result();
}

public function getFreeTrialFilterData($status){

	$this->getFilteredFreeTrialQuery($status);

	if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']); 

	$query = $this->db->get();

	return $query->result();

}

public function getFilteredFreeTrialQuery($status){

	$column_order = array(null,'lead_fk' ,'lead_name', 'service_name', 'start_date', 'end_date', 'days', 'booked_by'); //set column field database for datatable orderable

	if($this->input->post('customData[userType]') == 'DSH'){

		$empIds ='';

		$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");			
		
		$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		foreach($query2->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('emp_fk' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'MANAGER'){

		$query = $this->db->query("SELECT DISTINCT emp_id as emp_fk FROM employee WHERE managed_by_id = '" .$this->input->post('customData[empId]')."'");			

		$empIds = $this->input->post('customData[empId]');

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('emp_fk' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'TELECALLER'){

		$this->db->where('emp_fk' , $this->input->post('customData[empId]'));

	}
	$time = new DateTime();

	$time->setTimezone(new DateTimeZone('Asia/Kolkata'));
		
	$today = $time->format("Y/m/d");

	if($status == 'ACTIVE'){

		$this->db->where('end_date >=' , $today);

	}else if($status == 'PAST'){

		$this->db->where('end_date <=' , $today);

	}

	if($this->input->post('customData[service_name]'))
	{
			$this->db->like('service_name', $this->input->post('customData[service_name]'));
	}
	if($this->input->post('customData[booked_by]'))
	{
			$this->db->like('booked_by', $this->input->post('customData[booked_by]'));
	}

	$this->db->from('freetrials');
		
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	} 
	else if(isset($this->order))
	{
		$order = $this->order;
		$this->db->order_by(key($order), $order[key($order)]);
	}
}

public function getFreeTrialCount(){

	return $this->db->count_all_results();

}

public function getFreeTrialCountFiltered($status){

	$this->getFilteredFreeTrialQuery($status);
	
	$query = $this->db->get();
	
	return $query->num_rows();

}

public function getLeadsDescFull(){

	$column_order = array(null, 'emp_fk', 'mobile', 'lead_fk', 'calling time', 'call_status', 'description', 'callback_date', 'callback_time'); //set column field database for datatable orderable

	$this->db->select('*');

	$this->db->from('lead_desc');

	if($this->input->post('customData[userType]') == 'DSH'){

		$empIds ='';

		$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");			
		
		$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		foreach($query2->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('emp_fk' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'MANAGER'){

		$query = $this->db->query("SELECT DISTINCT emp_id as emp_fk FROM employee WHERE managed_by_id = '" .$this->input->post('customData[empId]')."'");			

		$empIds = $this->input->post('customData[empId]');

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('emp_fk' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'TELECALLER'){

		$this->db->where('emp_fk' , $this->input->post('customData[empId]'));

	}


	if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	}

	$query = $this->db->get();

	return $query->result();

}

public function getLeadsDescFullFilterData(){

	$this->getFilteredLeadsDescFullQuery();
	if($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']); 
	$query = $this->db->get();
	return $query->result();

}

public function getFilteredLeadsDescFullQuery(){

	$column_order = array(null, 'emp_fk', 'mobile', 'lead_fk', 'calling_time', 'call_status', 'description', 'callback_date', 'callback_time'); //set column field database for datatable orderable

	$this->db->select('*');

	$this->db->from('lead_desc');

	if($this->input->post('customData[userType]') == 'DSH'){

		$empIds ='';

		$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");			
		
		$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		foreach($query2->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('emp_fk' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'MANAGER'){

		$query = $this->db->query("SELECT DISTINCT emp_id as emp_fk FROM employee WHERE managed_by_id = '" .$this->input->post('customData[empId]')."'");			

		$empIds = $this->input->post('customData[empId]');

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('emp_fk' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'TELECALLER'){

		$this->db->where('emp_fk' , $this->input->post('customData[empId]'));

	}

	
	if($this->input->post('customData[startDate]') && $this->input->post('customData[endDate]')){

		$this->db->where('calling_time >=',$this->input->post('customData[startDate]'));

		$this->db->where('calling_time <=',$this->input->post('customData[endDate]'));

	}

	if($this->input->post('customData[mobile]'))
	{
			$this->db->like('mobile', $this->input->post('customData[mobile]'));
	}
	if($this->input->post('customData[callback_date]'))
	{
			$this->db->like('callback_date', $this->input->post('customData[callback_date]'));
	}
	if($this->input->post('customData[call_status]'))
	{
			$this->db->like('call_status', $this->input->post('customData[call_status]'));
	}
			
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	} 
	else if(isset($this->order))
	{
		$order = $this->order;
		$this->db->order_by(key($order), $order[key($order)]);
	}


}

public function getLeadsDescFullCount(){

	return $this->db->count_all_results();

}
 
public function getLeadsDescFullCountFiltered(){

	$this->getFilteredLeadsDescFullQuery();
	
	$query = $this->db->get();
	
	return $query->num_rows();

}

  public function getSalesOrder($status){

	$column_order = array(null, 'lead_fk', 'lead_name', 'service_name', 'package', 'package_amt', 'recieved_amt', 'service_start_date', 'service_end_date',
		'total_days', 'remark', 'payment_date', 'payment_timestamp', 'payment_mode', 'payment_acc', 'reference_num', 'order_status',
		'booked_by_id', 'booked_by_name', 'admin_comment'); //set column field database for datatable orderable

	$this->db->select('*');

	$this->db->from('sales_order');

	if($this->input->post('customData[userType]') == 'DSH'){

		$empIds ='';

		$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");			
		
		$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		foreach($query2->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('booked_by_id' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'MANAGER'){

		$query = $this->db->query("SELECT DISTINCT emp_id as emp_fk FROM employee WHERE managed_by_id = '" .$this->input->post('customData[empId]')."'");			

		$empIds = $this->input->post('customData[empId]');

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('booked_by_id' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'TELECALLER'){

		$this->db->where('booked_by_id' , $this->input->post('customData[empId]'));

	}

	if($status != ''){

		$this->db->where('order_status' ,$status);

	}


	if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	}

	$query = $this->db->get();

	return $query->result();
  }

  public function getSalesOrderFilterData($status){

	$this->getFilteredSalesOrderQuery($status);

	if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']); 
	
	$query = $this->db->get();
	
	return $query->result();
  }

  public function getFilteredSalesOrderQuery($status){

	$column_order = array(null, 'lead_fk', 'lead_name', 'service_name', 'package', 'package_amt', 'recieved_amt', 'service_start_date', 'service_end_date',
	'total_days', 'remark', 'payment_date', 'payment_timestamp', 'payment_mode', 'payment_acc', 'reference_num', 'order_status',
	'booked_by_id', 'booked_by_name', 'admin_comment');

	if($this->input->post('customData[userType]') == 'DSH'){

		$empIds ='';

		$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");			
		
		$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		foreach($query2->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('booked_by_id' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'MANAGER'){

		$query = $this->db->query("SELECT DISTINCT emp_id as emp_fk FROM employee WHERE managed_by_id = '" .$this->input->post('customData[empId]')."'");			

		$empIds = $this->input->post('customData[empId]');

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('booked_by_id' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'TELECALLER'){

		$this->db->where('booked_by_id' , $this->input->post('customData[empId]'));

	}

	if($status != ''){

		$this->db->where('order_status' , $status);
		
	}

	if($this->input->post('customData[lead_name]'))
	{
			$this->db->like('lead_name', $this->input->post('customData[lead_name]'));
	}
	if($this->input->post('customData[payment_date]'))
	{
			$this->db->like('payment_date', $this->input->post('customData[payment_date]'));
	}
	if($this->input->post('customData[order_status]'))
	{
			$this->db->like('order_status', $this->input->post('customData[order_status]'));
	}

	$this->db->from('sales_order');
		
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	} 
	else if(isset($this->order))
	{
		$order = $this->order;
		$this->db->order_by(key($order), $order[key($order)]);
	}
  }

  public function getSalesOrderCount(){

	return $this->db->count_all_results();

  }

  public function getSalesOrderCountFiltered($status){

	$this->getFilteredSalesOrderQuery($status);
	
	$query = $this->db->get();
	
	return $query->num_rows();
  }

  public function getTarget($check){

	$column_order = array(null, 'target_id', 'emp_name', 'emp_fk', 'target_assigned', 'assigned_by_name', 'month', 'achieved_percent', 'achieved_value', ); //set column field database for datatable orderable

	$this->db->select('*');

	$this->db->from('target');

	if($check == 'single'){

		$this->db->where('emp_fk', $this->input->post('customData[empId]'));

	}else if($this->input->post('customData[userType]') == 'DSH'){

		$empIds ='';

		$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");			
		
		$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		foreach($query2->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('emp_fk' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'MANAGER'){

		$query = $this->db->query("SELECT DISTINCT emp_id as emp_fk FROM employee WHERE managed_by_id = '" .$this->input->post('customData[empId]')."'");			

		$empIds = $this->input->post('customData[empId]');

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('emp_fk' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'TELECALLER'){

		$this->db->where('emp_fk' , $this->input->post('customData[empId]'));

	}

	if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	}

	$query = $this->db->get();

	return $query->result();

  }

  public function getTargetFilterData($check){

	$this->getFilteredTargetQuery($check);

	if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']); 
	
	$query = $this->db->get();
	
	return $query->result();

  }

  public function getFilteredTargetQuery($check){

	$column_order = array('target_id', 'emp_name', 'emp_fk', 'target_assigned', 'assigned_by_name', 'month', 'achieved_percent', 'achieved_value', ); //set column field database for datatable orderable
	
	if($check == 'single'){

		$this->db->where('emp_fk', $this->input->post('customData[empId]'));

	}else if($this->input->post('customData[userType]') == 'DSH'){

		$empIds ='';

		$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");			
		
		$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		foreach($query2->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('emp_fk' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'MANAGER'){

		$query = $this->db->query("SELECT DISTINCT emp_id as emp_fk FROM employee WHERE managed_by_id = '" .$this->input->post('customData[empId]')."'");			

		$empIds = $this->input->post('customData[empId]');

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('emp_fk' , explode(',', $empIds));

	}else if($this->input->post('customData[userType]') == 'TELECALLER'){

		$this->db->where('emp_fk' , $this->input->post('customData[empId]'));

	}

	if($this->input->post('customData[month]'))
	{
			$this->db->like('month', $this->input->post('customData[month]'));
	}
	if($this->input->post('customData[emp_name]'))
	{
			$this->db->like('emp_name', $this->input->post('customData[emp_name]'));
	}
	if($this->input->post('customData[assigned_by_name]'))
	{
			$this->db->like('assigned_by_name', $this->input->post('customData[assigned_by_name]'));
	}

	$this->db->from('target');
		
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	} 
	else if(isset($this->order))
	{
		$order = $this->order;
		$this->db->order_by(key($order), $order[key($order)]);
	}
  }

  public function getTargetCount(){

	return $this->db->count_all_results();

  }

  public function getTargetCountFiltered($check){

	$this->getFilteredTargetQuery($check);
	
	$query = $this->db->get();
	
	return $query->num_rows();
  }

  public function getServices(){

	$column_order = array(null ,'service_id', 'service_name', 'package_monthly', 'package_quaterly', 'package_halfyearly', 'package_yearly'); //set column field database for datatable orderable

	$this->db->select('*');

	$this->db->from('services');

	if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	}

	$query = $this->db->get();

	return $query->result();
  }

  public function getServicesFilterData(){

	$this->getFilteredServiceQuery();

	if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']); 
	
	$query = $this->db->get();
	
	return $query->result();
  }

  public function getFilteredServiceQuery(){

	$column_order = array(null, 'service_id', 'service_name', 'package_monthly', 'package_quaterly', 'package_halfyearly', 'package_yearly'); //set column field database for datatable orderable
	
	if($this->input->post('customData[service_name]'))
	{
			$this->db->like('service_name', $this->input->post('customData[service_name]'));
	}

	$this->db->from('services');
		
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	} 
	else if(isset($this->order))
	{
		$order = $this->order;
		$this->db->order_by(key($order), $order[key($order)]);
	}
  }

  public function getServicesCount(){

	return $this->db->count_all_results();

  }

  public function getServicesCountFiltered(){

	$this->getFilteredServiceQuery();
	
	$query = $this->db->get();
	
	return $query->num_rows();
  }

  public function getMailTemplate(){

	$column_order = array(null ,'mailtemp_id', 'category', 'template_name', 'sms_head', 'content'); //set column field database for datatable orderable

	$this->db->select('*');

	$this->db->from('mail_template');

	if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	}

	$query = $this->db->get();

	return $query->result();
  }

  public function getMailTemplateFilterData(){

	$this->getFilteredMailTemplateQuery();

	if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']); 
	
	$query = $this->db->get();
	
	return $query->result();

  }

  public function getFilteredMailTemplateQuery(){

	$column_order = array(null, 'mailtemp_id', 'category', 'template_name', 'content'); //set column field database for datatable orderable
	
	$column_search = array(); //set column field database for datatable searchable 

	if($this->input->post('customData[category]'))
	{
			$this->db->like('category', $this->input->post('customData[category]'));
	}
	if($this->input->post('customData[template_name]'))
	{
			$this->db->like('template_name', $this->input->post('customData[template_name]'));
	}

	$this->db->from('mail_template');
		
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	} 
	else if(isset($this->order))
	{
		$order = $this->order;
		$this->db->order_by(key($order), $order[key($order)]);
	}
  }

  public function getMailTemplateCount(){
	  
	return $this->db->count_all_results();

  }

  public function getMailTemplateCountFiltered(){

	$this->getFilteredMailTemplateQuery();
	
	$query = $this->db->get();
	
	return $query->num_rows();
  }

  public function getSmsTemplate(){

	$column_order = array(null, 'smstemp_id', 'category', 'template_name', 'sms_head', 'content'); //set column field database for datatable orderable

	$this->db->select('*');

	$this->db->from('sms_template');

	if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	}

	$query = $this->db->get();

	return $query->result();

  }

  public function getSmsTemplateFilterData(){

	$this->getFilteredSmsTemplateQuery();

	if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']); 
	
	$query = $this->db->get();
	
	return $query->result();

  }

  public function getSmsTemplateCount(){

	return $this->db->count_all_results();

  }

  public function getSmsTemplateCountFiltered(){

	$this->getFilteredSmsTemplateQuery();
	
	$query = $this->db->get();
	
	return $query->num_rows();

  }

  public function getFilteredSmsTemplateQuery(){

	$column_order = array(null, 'smstemp_id', 'category', 'template_name', 'content'); //set column field database for datatable orderable
	
	$column_search = array(); //set column field database for datatable searchable 

	if($this->input->post('customData[category]'))
	{
			$this->db->like('category', $this->input->post('customData[category]'));
	}
	if($this->input->post('customData[template_name]'))
	{
			$this->db->like('template_name', $this->input->post('customData[template_name]'));
	}

	$this->db->from('sms_template');
		
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	} 
	else if(isset($this->order))
	{
		$order = $this->order;
		$this->db->order_by(key($order), $order[key($order)]);
	}

  }

  public function getMailCategory(){

	$column_order = array(null, 'category', 'cat_id'); //set column field database for datatable orderable

	$this->db->select('*');

	$this->db->from('mail_category');

	if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	}

	$query = $this->db->get();

	return $query->result();
  }

  public function getMailCategoryFilterData(){

	$this->getFilteredMailCategoryQuery();

	if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']); 
	
	$query = $this->db->get();
	
	return $query->result();

  }

  public function getFilteredMailCategoryQuery(){

	$column_order = array(null, 'category', 'cat_id'); //set column field database for datatable orderable

	$column_search = array(); //set column field database for datatable searchable 

	if($this->input->post('customData[category]'))
	{
			$this->db->like('category', $this->input->post('customData[category]'));
	}

	$this->db->from('mail_category');
		
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	} 
	else if(isset($this->order))
	{
		$order = $this->order;
		$this->db->order_by(key($order), $order[key($order)]);
	}

  }

  public function getMailCategoryCount(){

	return $this->db->count_all_results();

  }

  public function getMailCategoryCountFiltered(){

	$this->getFilteredMailCategoryQuery();
	
	$query = $this->db->get();
	
	return $query->num_rows();

  }

  public function getSmsCategory(){

	$column_order = array(null, 'category', 'cat_id'); //set column field database for datatable orderable

	$this->db->select('*');

	$this->db->from('sms_category');

	if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	}

	$query = $this->db->get();

	return $query->result();

  }

  public function getSmsCategoryCount(){
	  
	return $this->db->count_all_results();

  }

  public function getSmsCategoryCountFiltered(){

	$this->getFilteredSmsCategoryQuery();
	
	$query = $this->db->get();
	
	return $query->num_rows();

  }

  public function getFilteredSmsCategoryQuery(){

	$column_order = array(null, 'category', 'cat_id'); //set column field database for datatable orderable

	$column_search = array(); //set column field database for datatable searchable 

	if($this->input->post('customData[category]'))
	{
			$this->db->like('category', $this->input->post('customData[category]'));
	}

	$this->db->from('sms_category');
		
	if(isset($_POST['order'])) // here order processing
	{
		$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	} 
	else if(isset($this->order))
	{
		$order = $this->order;
		$this->db->order_by(key($order), $order[key($order)]);
	}

  }

  public function getSmsCategoryFilterData(){

	$this->getFilteredSmsCategoryQuery();

	if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']); 
	
	$query = $this->db->get();
	
	return $query->result();

  }
  

	public function getLeads($status, $leadType){

		$column_order = array(null ,'lead_id', 'lead_type', 'name','mobile','alternate_mobile','segment', 'investment' ,'lastCallStatus', 'lastCallTime', 
		'email', 'country','state', 'city', 'address', 'pan_num', 'aadhar_num', 'dob', 'creation_date', 'assigned_to', 'assigning_date', 'lead_added_by_id'); //set column field database for datatable orderable

		$this->db->select('*');

		$this->db->from('leads');

		if($status == 'ACCOUNT'){

			$this->db->where(array('contact_account' => 'YES'));

		}else{

			$this->db->where(array('contact_account' => NULL));

		}

		if($this->input->post('customData[userType]') == 'DSH'){

			$empIds ='';

			$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");			
			
			$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");
	
			foreach($query->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}
	
			foreach($query2->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}

			$this->db->where_in('emp_fk' , explode(',', $empIds));

		}else if($this->input->post('customData[userType]') == 'MANAGER'){

			$query = $this->db->query("SELECT DISTINCT emp_id as emp_fk FROM employee WHERE managed_by_id = '" .$this->input->post('customData[empId]')."'");			

			$empIds = $this->input->post('customData[empId]');

			foreach($query->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}

			$this->db->where_in('emp_fk' , explode(',', $empIds));

		}else if($this->input->post('customData[userType]') == 'TELECALLER'){

			$this->db->where('emp_fk' , $this->input->post('customData[empId]'));

		}

		if($status != '' && $status!= 'ACCOUNT'){
			
			if($status == 'FRESH'){
				
				$this->db->where(array('status' => 'ASSIGNED', 'lastCallTime' => NULL));

			}else if($status == 'FOLLOWUP'){

				$this->db->where(array('status' => 'ASSIGNED', 'lastCallTime !=' => NULL));
			
			}else if($status == 'IDLE'){

				$this->db->where(array('status' => 'ASSIGNED', 'idle_data_status' => 'yes'));
				
			}else{

				$this->db->where(array('status' => $status));

			}

		}

		if($leadType != '')
			$this->db->where(array('lead_type' => $leadType));

		if($_POST['length'] != -1)
				$this->db->limit($_POST['length'], $_POST['start']);
				
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}

		$query = $this->db->get();

		return $query->result();

	}

	public function getFilteredLeadsQuery($status, $leadType){

		$column_order = array(null, 'lead_id', 'lead_type', 'name','mobile','alternate_mobile','segment', 'investment' ,'lastCallStatus',
		 'lastCallTime', 'email', 'country','state', 'city', 'address', 'pan_num', 'aadhar_num', 'dob', 'creation_date', 
		 'assigned_to', 'assigning_date', 'lead_added_by_id');

		$column_search = array(); //set column field database for datatable searchable, MAybe this is used for simple whole table search
		 
		
		if($status === 'ACCOUNT'){

			$this->db->where(array('contact_account' => 'YES'));

		}else{

			$this->db->where(array('contact_account' => NULL));

		}

		$empIds ='';

		if($this->input->post('customData[userType]') == 'DSH'){


			$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");			
			
			$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('customData[empId]')."'");
	
			foreach($query->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}
	
			foreach($query2->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}

			$this->db->where_in('emp_fk' , explode(',', $empIds));

		}else if($this->input->post('customData[userType]') == 'MANAGER'){

			$query = $this->db->query("SELECT DISTINCT emp_id as emp_fk FROM employee WHERE managed_by_id = '" .$this->input->post('customData[empId]')."'");			

			$empIds = $this->input->post('customData[empId]');
			
			foreach($query->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}

			$this->db->where_in('emp_fk' , explode(',', $empIds));

		}else if($this->input->post('customData[userType]') == 'TELECALLER'){

			$this->db->where('emp_fk' , $this->input->post('customData[empId]'));

		}

		if($status != '' && $status!= 'ACCOUNT'){

			
			if($status == 'FRESH'){
				
				$this->db->where(array('status' => 'ASSIGNED', 'lastCallTime' => NULL));

			}else if($status == 'FOLLOWUP'){

				$this->db->where(array('status' => 'ASSIGNED', 'lastCallTime !=' => NULL));
			
			}else if($status == 'IDLE'){

				$this->db->where(array('status' => 'ASSIGNED', 'idle_data_status' => 'yes'));

			}
			else{

				$this->db->where(array('status' => $status));

			}

		}

		if($leadType != '')
			$this->db->where(array('lead_type' => $leadType));

		if($this->input->post('customData[startDate]') && $this->input->post('customData[endDate]')){

			$this->db->where('creation_date >=',$this->input->post('customData[startDate]'));

			$this->db->where('creation_date <=',$this->input->post('customData[endDate]'));

		}

		if($this->input->post('customData[lastCallStartTime]') && $this->input->post('customData[lastCallEndTime]')){

			$this->db->where('lastCallTime >=',$this->input->post('customData[lastCallStartTime]'));

			$this->db->where('lastCallTime <=',$this->input->post('customData[lastCallEndTime]'));

		}

		if($this->input->post('customData[lead_type]'))
		{
				$this->db->like('lead_type', $this->input->post('customData[lead_type]'));
		}
		if($this->input->post('customData[name]'))
		{
				$this->db->like('name', $this->input->post('customData[name]'));
		}
		if($this->input->post('customData[mobile]'))
		{
				$this->db->like('mobile', $this->input->post('customData[mobile]'));
		}
		if($this->input->post('customData[assigned_to]'))
		{
				$this->db->like('assigned_to', $this->input->post('customData[assigned_to]'));
		}
		if($this->input->post('customData[status]'))
		{
				$this->db->like('status', $this->input->post('customData[status]'));
		}
		if($this->input->post('customData[city]'))
		{
				$this->db->like('city', $this->input->post('customData[city]'));
		}
		if($this->input->post('customData[state]'))
		{
				$this->db->like('state', $this->input->post('customData[state]'));
		}

		$this->db->from('leads');

		$i = 0;
	
		foreach ($column_search as $item) // loop column 
		{
				if($_POST['search']['value']) // if datatable send POST for search
				{
							
						if($i===0) // first loop
						{
								$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
								$this->db->like($item, $_POST['search']['value']);
						}
						else
						{
								$this->db->or_like($item, $_POST['search']['value']);
						}

						if(count($column_search) - 1 == $i) //last loop
								$this->db->group_end(); //close bracket
				}
				$i++;
		}
			
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}

	}

	public function getLeadsFilterData($status, $leadType)
	{
			$this->getFilteredLeadsQuery($status, $leadType);
			if($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']); 
			$query = $this->db->get();
			return $query->result();
	}

	public function getLeadsCount()
	{
			// $this->db->from('employee');
			return $this->db->count_all_results();
	}

	public function getLeadsCountFiltered($status, $leadType)
	{
			$this->getFilteredLeadsQuery($status, $leadType);
			$query = $this->db->get();
			return $query->num_rows();
	}

	public function uploadCSV($data){

		$result = array();

		$successCount = 0;

		$failedCount = 0;
		
		$this->db->trans_begin();

		foreach( $data as $insertData ){

			try{
				
				if($this->db->insert('leads', $insertData)){
					
					$successCount++;
					// return TRUE;

				}else{
					
					$db_error = $this->db->error();

					$failedCount++;

					$result[] = "Mobile Number - ".$insertData['mobile']." Error Message - ".$db_error['message'];
					
					// return $db_error;
				}
			}catch(Exception $e){
				
				$db_error = $this->db->error();

				$failedCount++;

				$result[] = $insertData['mobile'];

			}
		}

			$this->db->trans_commit();

		return array_merge($result, array('successCount'=> $successCount , 'failureCount' => $failedCount, 'totalCount' => $successCount + $failedCount));

	}

	public function assignLeads($data){

		$result = array();

		$successCount = 0;

		$failedCount = 0;
		
		$this->db->trans_begin();

		$leadIdS = explode(",", $data['leadIds']);

		$time = new DateTime();

		$time->setTimezone(new DateTimeZone('Asia/Kolkata'));
		
		$data['assigning_date'] = $time->format("Y/m/d");

		$data['last_update'] = $time->format("Y-m-d H:i:s");

		foreach( $leadIdS as $singleLeadId ){

			try{
				
				$this->db->where(array('lead_id' => $singleLeadId));

				if($this->db->update('leads', array(
					'emp_fk' => $data['emp_id'],
					'assigning_date' => $data['assigning_date'] ,
					'assigned_by' => $data['assigned_by'],
					'assigned_by_id' => $data['assigned_by_id'],
					'assigned_to' => $data['assigned_to'],
					'status' => 'ASSIGNED',
					'last_update' => $data['last_update']
					))){
					
					$successCount++;
					// return TRUE;

				}else{
					
					$db_error = $this->db->error();

					$failedCount++;

					$result[] = "Lead Id - ".$singleLeadId." Error Message - ".$db_error['message'];
					
					// return $db_error;
				}
			}catch(Exception $e){
				
				$db_error = $this->db->error();

				$failedCount++;

				$result[] = "Lead Id - ".$singleLeadId." Error Message - ".$db_error['message'];

			}
		}

		$this->db->insert('leads_log',  array('type' => 'ASSIGNLEAD','datetime' => $data['last_update'], 'message' => 'Lead assigned By -'.$data['assigned_by'].' Employee Id - '.$data['assigned_by_id'].'. Assigned to - '.$data['assigned_to'].', assigned to user id - '.$data['emp_id'].'. Lead Count - '.($successCount + $failedCount).', failed Count - '.$failedCount.', success count - '.$successCount));

		$this->db->trans_commit();

		return array_merge($result, array('successCount'=> $successCount , 'failureCount' => $failedCount, 'totalCount' => $successCount + $failedCount));
	
	}

	public function calculateIdealLeads(){

		$this->db->trans_begin();

		$this->db->select('*');

		$this->db->from('leads');

		$time = new DateTime();
		
		$time->setTimezone(new DateTimeZone('Asia/Kolkata'));

		$now = $time->format("Y-m-d H:i:s");

		$this->load->helper('date');
		
		// $this->db->where("DATEDIFF( last_update ,".$now.") >= 10 ");
		$this->db->where("DATEDIFF(NOW(), last_update) >= 10");         

		// $this->db->where('last_update>=', $now." + INTERVAL 0 DAY");

		$resultArray = $this->db->get()->result_array();;

		$db_error = $this->db->error();

		foreach( $resultArray as $singleResult){

			$this->db->where(array('lead_id' => $singleResult['lead_id']));

			$this->db->update('leads', array('idle_data_status' => 'yes'));

		}

		$this->db->trans_commit();

		return $resultArray;
	}


  public function updateLeadStatus($data, $status){

	  $time = new DateTime();
	  
	  $time->setTimezone(new DateTimeZone('Asia/Kolkata'));
	  
	  $now = $time->format("Y-m-d H:i:s");

	  $this->db->trans_begin();

	  $this->db->where(array('lead_id' => $data['lead_id']));

	  if($this->db->update('leads', array('status' => $status, 'last_update' => $now, 'status_changed_by' => $data['status_changed_by']))){

		$result = 'Lead updated';

	  }else{

		$result = 'Lead updation failed';

	  }

	  $this->db->trans_commit();

	  return $result;
  }

  public function addLeadDesc($data, $leadId){

	$this->db->trans_begin();

    $time = new DateTime();

    $time->setTimezone(new DateTimeZone('Asia/Kolkata'));

	$now = $time->format("Y-m-d H:i:s");
	
	$this->db->where(array('lead_fk' => $leadId));
	
	$this->db->update('lead_desc', array('latest' => 0));

    if($this->db->insert('lead_desc', $data)){
		
		$this->db->where(array('lead_id' => $leadId));

		$this->db->update('leads', array('last_update' => $now, 'lastCallStatus' => $data['call_status'] , 'lastCallTime' => $data['calling_time']));      
		
    }

    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      return FALSE;
    }

	$this->db->trans_commit();

	return TRUE;

  }

  public function updateLead($data, $leadId){

	$this->db->trans_begin();

    $time = new DateTime();

    $time->setTimezone(new DateTimeZone('Asia/Kolkata'));

	$now = $time->format("Y-m-d H:i:s");

	$data['last_update'] = $now;
	
	$this->db->where(array('lead_id' => $leadId));
	
    if($this->db->update('leads', $data)){
		
		$this->db->trans_commit();

		return TRUE;     
		
    }

    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      return FALSE;
    }

	$this->db->trans_commit();

	return TRUE;

  }

  public function convertLead($data, $leadId){

	$this->db->trans_begin();

    $time = new DateTime();

    $time->setTimezone(new DateTimeZone('Asia/Kolkata'));

	$now = $time->format("Y-m-d H:i:s");

	$data['last_update'] = $now;
	
	$this->db->where(array('lead_id' => $leadId));

	if($data['name'] === '' || $data['mobile'] === ''|| $data['email'] === '' || $data['country'] === '' || $data['state'] === ''
	|| $data['state'] === '' || $data['city'] === '' || $data['address'] === '' || $data['pan_num'] === '' || $data['aadhar_num'] === ''
	){
		return 'All fileds is required to convert a lead into contact';
	}

	$data['account_since'] = $now;

	$data['contact_account'] = 'YES';
	
    if($this->db->update('leads', $data)){
		
		$this->db->trans_commit();

		return 'Lead successfully converted!';     
		
    }

    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      return 'Lead updation failed try again!';
    }

  }

  public function bookFreeTrail($data, $leadId){

	$this->db->trans_begin();

    $time = new DateTime();

    $time->setTimezone(new DateTimeZone('Asia/Kolkata'));

	$now = $time->format("Y-m-d H:i:s");

	if($this->db->insert('freetrials', $data)){
		
		$this->db->where(array('lead_id' => $leadId));

		$this->db->update('leads', array('last_update' => $now));

		$this->db->trans_commit();

		return TRUE;
	}

	// if($this->db->error()){

	// 	return $this->db->error();

	// }

    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      return FALSE;
    }

  }

  public function addSmsTemplate($data){

	$this->db->trans_begin();

    if($this->db->insert('sms_template', $data)){
		
		$this->db->trans_commit();

		return TRUE;
		
    }

    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      return FALSE;
    }

  }

  public function addMailTemplate($data){

	$this->db->trans_begin();

    if($this->db->insert('mail_template', $data)){
		
		$this->db->trans_commit();

		return TRUE;
		
    }

    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      return FALSE;
	}
}
	
	public function addSmsCategory($data){

		$this->db->trans_begin();
	
		if($this->db->insert('sms_category', $data)){
			
			$this->db->trans_commit();
	
			return TRUE;
			
		}
	
		if ($this->db->trans_status() === FALSE)
		{
		  $this->db->trans_rollback();
	
		  return FALSE;
		}

  }

  public function addMailCategory($data){

	$this->db->trans_begin();

	if($this->db->insert('mail_category', $data)){
		
		$this->db->trans_commit();

		return TRUE;
		
	}

	if ($this->db->trans_status() === FALSE)
	{
	  $this->db->trans_rollback();

	  return FALSE;
	}

}

	public function editSmsTemplate($data, $smsTempId){

		$this->db->trans_begin();

		$this->db->where(array('smstemp_id' => $smsTempId));

		if($this->db->update('sms_template', $data)){
			
			$this->db->trans_commit();

			return TRUE;
			
		}

		if ($this->db->trans_status() === FALSE)
		{
		$this->db->trans_rollback();

		return FALSE;
		}

	}

	public function editSmsCategory($data, $catId){

		$this->db->trans_begin();

		$this->db->where(array('cat_id' => $catId));

		if($this->db->update('sms_category', $data)){
			
			$this->db->trans_commit();

			return TRUE;
			
		}

		if ($this->db->trans_status() === FALSE)
		{
		$this->db->trans_rollback();

		return FALSE;
		}

	}

	public function editMailTemplate($data, $mailTempId){

		$this->db->trans_begin();

		$this->db->where(array('mailtemp_id' => $mailTempId));

		if($this->db->update('mail_template', $data)){
			
			$this->db->trans_commit();

			return TRUE;
			
		}

		if ($this->db->trans_status() === FALSE)
		{
		$this->db->trans_rollback();

		return FALSE;
		}

	}

	public function updateMailCategory($data, $catId){

		$this->db->trans_begin();

		$this->db->where(array('cat_id' => $catId));

		if($this->db->update('mail_category', $data)){
			
			$this->db->trans_commit();

			return TRUE;
			
		}

		if ($this->db->trans_status() === FALSE)
		{
		$this->db->trans_rollback();

		return FALSE;
		}

	}

	public function delGlobal($data, $tableName){

		$this->db->trans_begin();

		$this->db->where($data);

		if($this->db->delete($tableName)){
			
			$this->db->trans_commit();

			return TRUE;
			
		}

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			return FALSE;
		}

	}

	public function fetchGlobal($tableName){

		$this->db->trans_begin();

		$this->db->select('*');

		$result = $this->db->get($tableName);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			return FALSE;
		}

		$this->db->trans_commit();

		return $result->result();

	}

	public function fetchGlobalWhere($data, $tableName){

		$this->db->trans_begin();

		$this->db->select('*');

		$this->db->where($data);

		$result = $this->db->get($tableName);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			return FALSE;
		}

		$this->db->trans_commit();

		return $result->result();

	}

	public function test(){

		$empIds ='';

		$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('empId')."'");

		
		
		$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('empId')."'");

		// return join(',', $query->result());

		// if($this->db->error()){

		// 	return $this->db->error();
		// }

		foreach($query->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		foreach($query2->result() as $id){

			if($empIds == '')
				$empIds = $id->emp_fk;
			else
				$empIds = $empIds.",".$id->emp_fk;
		}

		$this->db->where_in('emp_fk' , explode(',', $empIds));

		$result = $this->db->get('leads');

		return $result->result();

		// return $empIds;

	}

	public function addTarget($data){

		$this->db->trans_begin();

		$time = new DateTime();

		$time->setTimezone(new DateTimeZone('Asia/Kolkata'));

		$data['target_id'] = 'T-'.$time->format("YmdHis");

		if($this->db->insert('target', $data)){
			
			$this->db->trans_commit();
			
			return TRUE;
		}

		// if($this->db->error()){

		// 	return $this->db->error();
		// }

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			return FALSE;
		}

	}

	public function addSalesOrder($data){

		$this->db->trans_begin();

		$time = new DateTime();

		$time->setTimezone(new DateTimeZone('Asia/Kolkata'));

		$now = $time->format("Y-m-d H:i:s");

		$data['sales_order_id'] = 'SO-'.$time->format("YmdHis");

		if($this->db->insert('sales_order', $data)){

			$this->db->where(array('lead_id' => $data['lead_fk']));

			$this->db->update('leads', array('last_update' => $now));	
			
		}

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			return FALSE;
		}

		$this->db->trans_commit();
			
		return TRUE;

	}

	public function updateSalesOrder($data, $salesId){

		$this->db->trans_begin();

		if($data['status'] == 'ACCEPTED'){

			$this->db->where(array('sales_order_id' => $salesId));

			if($this->db->update('sales_order', array('order_status' => $data['status']))){

				$this->db->select('*');
	
				$this->db->where(array('emp_fk' => $data['booked_by_id'], 'month' => $data['month']));
	
				$this->db->from('target');
	
				$result = $this->db->get();
	
				if ($result->num_rows() == 1) {
	
					$dataResult = $result->result();
				
					$achieved_value = $dataResult->achieved_value + $data['recieved_amt'];
	
					$achieved_precent = ($achieved_value/$dataResult['target_assigned'])*100;
	
					$this->db->where(array('emp_fk' => $data['booked_by_id'], 'month' => $data['month']));
				
					if($this->db->update('target', array(
						'achieved_precent' => $achieved_precent,
						'achieved_value' -> $achieved_value
					))){
				
					}
			}

			$this->db->trans_commit();
	
			return TRUE;
		}		
	}else if($data['status'] == 'REJECTED'){

			$this->db->where(array('sales_order_id' => $salesId));

			if($this->db->update('sales_order', array('order_status' => $data['status'], 'admin_comment' => $data['admin_comment']))){

				$this->db->trans_commit();

				return TRUE;
			}
		}

		// if($this->db->error()){
		// 	return $this->db->error();
		// }

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			return FALSE;
		}
	}

	public function addBank($data){

		$this->db->trans_begin();

		$time = new DateTime();

		$time->setTimezone(new DateTimeZone('Asia/Kolkata'));

		$data['acc_id'] = 'ACC-'.$time->format("YmdHis");

		if($this->db->insert('company_accounts', $data)){
			
			$this->db->trans_commit();
			
			return TRUE;
		}

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			return FALSE;
		}
	}

	public function updateBank($data, $accId){

		$this->db->trans_begin();

		$this->db->where('acc_id', $accId);

		if($this->db->update('company_accounts', $data)){
			
			$this->db->trans_commit();
			
			return TRUE;
		}

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			return FALSE;
		}

	}

	public function sendSms(){

		$senderId="JSRGIB";
		$serverUrl="msg.msgclub.net";

		//put the auth key;
		$authKey="e25ec34943e42051d1b43ea7cf9565f6";
		$routeId="1";

		$getData = 'mobileNos='.$this->input->post('mobile').'&message='.urlencode($this->input->post('message')).
			'&senderId='.$senderId.'&routeId='.$routeId;

		//API URL 
		$url="http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey."&".$getData;

		// init the resource
		$ch = curl_init();
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0
		));
		// //get response
		// $output = curl_exec($ch);
		// //Print error if any
		// if(curl_errno($ch))
		// {
		//     echo 'error:' . curl_error($ch);
		// }
		// curl_close($ch);
		// return $output;

		$result = json_decode(curl_exec($ch));       
		curl_close($ch);

		return $result;
		// if(!$result || $result->responseCode!=3001)
		// 	return $result;
		// else echo "SUCCESS";
		
	}

	public function sendEmail($data){

		$time = new DateTime();

		$time->setTimezone(new DateTimeZone('Asia/Kolkata'));

		$now = $time->format("Y-m-d H:i:s");

		$this->db->insert('leads_log',  array('type' => 'EMAIL','datetime' => $now, 'message' => 'Email send by  -'.$data['empId'].'/'.$data['userType'].'. To address - '.$data['name'].'('.$data['email_to'].' ) , subject is - '.$data['subject'].' with body - '.$data['body']));
		
		$email_config = Array(
			'protocol'  => 'smtp',
			'smtp_crypto'	=>	'tls',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_port' => 587,
			'wordwrap'  => TRUE,
			'smtp_user' => 'jsrglobalresearch1008@gmail.com',
			'smtp_pass' => 'jsr@1008',
			'mailtype'  => 'html',
			'starttls'  => true,
			'newline'   => "\r\n",
			'mailtype'  => 'html', 
			'charset'   => 'utf-8',
			'validate'	=>	FALSE,
			'bcc_batch_mode'	=>	FALSE
		);

		$from_email = "jsrglobalresearch1008@gmail.com";
		// $to_email= "aniketmodker24@gmail.com";

		$this->load->library('email',$email_config);

		$this->email->from($from_email, $data['name']);
		$this->email->to($data['email_to']);
		$this->email->subject($data['subject']);
		$this->email->message($data['body']);
		// $this->email->priority(3);

		if ($this->email->send()) {
		# code...
			return TRUE;
		}else{
			
			return $this->email->print_debugger();
		}
				
		
	}

	public function getEmployeeDropDown($data){
		
		$this->db->trans_begin();

		$this->db->select('*');
		
		if($this->input->post('userType') == 'DSH'){

			$empIds ='';
	
			$query = $this->db->query("SELECT DISTINCT mgr_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('empId')."'");			
			
			$query2 = $this->db->query("SELECT DISTINCT tel_id as emp_fk FROM dsh_role WHERE dsh_id = '" .$this->input->post('empId')."'");
	
			foreach($query->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}
	
			foreach($query2->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}
	
			$this->db->where_in('emp_id' , explode(',', $empIds));
	
		}else if($this->input->post('userType') == 'MANAGER'){
	
			$query = $this->db->query("SELECT DISTINCT emp_id as emp_fk FROM employee WHERE managed_by_id = '" .$this->input->post('empId')."'");			
	
			$empIds = $this->input->post('empId');
	
			foreach($query->result() as $id){
	
				if($empIds == '')
					$empIds = $id->emp_fk;
				else
					$empIds = $empIds.",".$id->emp_fk;
			}
	
			$this->db->where_in('emp_id' , explode(',', $empIds));
	
		}else if($this->input->post('userType') == 'TELECALLER'){
	
			$this->db->where('emp_id' , $this->input->post('empId'));
	
		}

		$this->db->where('status' , 'ACTIVE');
		
		$query = $this->db->get('employee');
		
		$this->db->trans_commit();

		return $query->result();


		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			return FALSE;
		}
	}

	public function getLeadsDesc($leadId){

		$this->db->trans_begin();

		$this->db->select('*');

		$this->db->where('lead_fk', $leadId);

		$query = $this->db->get('lead_desc');
		
		$this->db->trans_commit();

		return $query->result();

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			return FALSE;
		}
	}

	public function getCountReport($data,$tableName){

		$this->db->trans_begin();

		$this->db->select('*');

		$this->db->from($tableName);

		$this->db->where($data);

		$num_results = $this->db->count_all_results();
		
		$this->db->trans_commit();

		return $num_results;

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			return FALSE;
		}


	}
	
	public function assignLeadsToSelf($data){

		$result = array();

		$time = new DateTime();

		$time->setTimezone(new DateTimeZone('Asia/Kolkata'));
		
		$data['assigning_date'] = $time->format("Y/m/d");
		
		$this->db->trans_begin();

		$query = $this->db->query("SELECT * FROM self_leads_log WHERE emp_id = '".$data['emp_id']."'AND date = '".$data['assigning_date']."' AND type = '".$data['lead_type']."'");			

		if ($query->num_rows() >= 1) {

			return 'You have already fetched your today lead';
		}

		$query = $this->db->query("SELECT * FROM employee WHERE emp_id = '" .$data['emp_id']."'");

		$empDetails = $query->result_array();

		$leadCapacity = $empDetails[0]['lead_capacity'];

		$query = $this->db->query("SELECT * FROM leads WHERE lead_type = '".$data['lead_type']."' AND emp_fk = '".$data['emp_id']."' AND status = 'ASSIGNED' AND lastCallTime != NULL");

		$leadAvailaible = $query->num_rows();

		$leadSpace = $leadCapacity - $leadAvailaible;

		if($leadSpace < $data['lead_count']){

			return "Lead Capacity Overflow .  Your lead capacity is -".$leadCapacity.' and you already have -'.$leadAvailaible;

		}

		$query = $this->db->query("SELECT * FROM leads WHERE lead_type = '".$data['lead_type']."'AND status = 'UNASSIGNED'");			

		$leadAvailaible = $query->num_rows();

		if($leadAvailaible < $data['lead_count']){

			return "Not enough leads are availaible!";

		}

		$data['last_update'] = $time->format("Y-m-d H:i:s");

		$query = $this->db->query("UPDATE leads SET emp_fk = '".$data['emp_id']."', assigning_date = '".$data['assigning_date']."', assigned_by = '".$data['assigned_by']."', assigned_by_id = '".$data['emp_id']."', assigned_to = '".$data['assigned_to']."', status = 'ASSIGNED' , last_update = '".$data['last_update']."' WHERE lead_type = '".$data['lead_type']."' AND status = 'UNASSIGNED' ORDER BY id ASC LIMIT ".$data['lead_count']);

		if($query){

			$message = 'Self lead assigned by '.$data['assigned_by'].' ( '.$data['emp_id'].' )';

			$query = $this->db->query("INSERT INTO self_leads_log (date, message, emp_id, type) VALUES ('".$data['assigning_date']."', '".$message."', '".$data['emp_id']."', '".$data['lead_type']."')");

			
			if($query)
			{
				$this->db->trans_commit();

				return 'Leads asssigned successfully!';
				
			}
			else
				return 'Insertion and updation error ';

		}else{
			
			$db_error = $this->db->error();
			
			return $db_error;
		}

		$this->db->trans_commit();

		return $result;
	
	}

	public function getUploadLeadsReport($data){

		$this->db->trans_begin();

		$result;

		if($data['startDate'] && $data['endDate']){
			
			$query = $this->db->query("SELECT DISTINCT lead_added_by_id, lead_added_by_name FROM leads WHERE creation_date >= '" .$data['startDate']."' AND creation_date <= '".$data['endDate']."'");			

			foreach($query->result() as $id){

				$query = $this->db->query("SELECT COUNT(*) FROM leads WHERE lead_added_by_id = '" .$id->lead_added_by_id."'");			

				$tempArray['lead_added_by_id'] = $id->lead_added_by_id;
				$tempArray['lead_added_by_name'] = $id->lead_added_by_name;
				$tempArray['total'] = $query->result();
				
				$result[] =$tempArray;
				
			}
		
		}

		if(($data['startDate'] && $data['endDate']) && $data['lead_added_by_id']){

			$query = $this->db->query("SELECT DISTINCT lead_added_by_id, lead_added_by_name, COUNT(lead_added_by_id) as total FROM leads WHERE lead_added_by_id '".$data['lead_added_by_id']."' AND creation_date >= '" .$data['startDate']."' AND creation_date <= '".$data['endDate']."'");			

		}

		

		$this->db->trans_commit();

		return $result;

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			return FALSE;
		}

	}
}
?>
