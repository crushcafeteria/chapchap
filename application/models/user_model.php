<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function authenticate($data){

		$query = $this->db->get_where('users', array('email'=>$data['email'], 'password'=>hash('sha512', $data['password'])));

		if($query->num_rows() !== 1){
			return false;
		} else {
			return $query->row_array();
		}
	}

	

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */