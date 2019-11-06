<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Api_model extends CI_Model {
	
	public function __construct() {

		parent::__construct();

	}

	public function formateDateFilter($oldDate){

		$arr = explode('/', $oldDate);
		return $arr[2].'/'.$arr[1].'/'.$arr[0];

	}


	
	public function userDetails($userId) {

	    $this->db->trans_begin();

	    $this->db->select('*');

	    $conditions = array('userId' => $userId);

	    $this->db->where($conditions);

	    $query = $this->db->get('user');

	    if ($this->db->trans_status() === FALSE)
	    {
	      $this->db->trans_rollback();

	      return FALSE;
	    }
       

	    if ($query->num_rows() == 1) {

			$result = $query->result();

			$this->db->trans_commit(); 

		return $result;
	    }
		  
	  $this->db->trans_commit(); 
	  
	  return FALSE;
  }

  public function checkLogin($userId, $password) {

    $this->db->trans_begin();

    $this->db->select('*');

    $this->db->from('user');

    $conditions = array('userId' => $userId, 'password' => $password);

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

  public function fetchProductDetail($id)
  {
    # code...
	$this->db->select('*');
	
	$result;

	$j = 0;

    $query = $this->db->get_where('item', array('id' => $id));

	$itemDetail = $query->result_array();
	
	$query = $this->db->get_where('shape', array('itemFK' => $itemDetail[0]['id']));

	$shapeDetail = $query->result();
	
	foreach ($shapeDetail as $shape) {

		$query = $this->db->get_where('structure', array('shapeFK' => $shape->id));

		$structureDetail = $query->result();

		$midResult;

		$i = 0;

		foreach ($structureDetail as $structure) {

			$query = $this->db->where_in('id', explode(',',$structure->fillFK));
			
			$query = $this->db->get('fill');

			$fillDetail = $query->result();

			$query = $this->db->get_where('size', array('structureFK' => $structure->id));

			$sizeDetail = $query->result();

			$midResult[$i] = array(
				'structure' => array(
					'detail' => $structure,
					'fill' => $fillDetail,
					'size' => $sizeDetail
				),
			);

			$i++;
			
		}
		
		$result[$j] = array(
			'shape' => array(
				'detail' => $shape,
				'structure' => $midResult
			),
		);
		
		$j++;
	}

    return array_merge($result, array('item' => $itemDetail));
  }


}
?>
