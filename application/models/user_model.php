<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function login($data){

		$blackPayDB = $this->load->database('blackpay', true);

		$password = hash('sha512', $data['password']);


		/*Check auth method*/
		$data = $blackPayDB->query(
					"SELECT * FROM users 
					WHERE email='$data[email]' AND password='$password'"
				);

		if($data->num_rows()==0 || $data->num_rows()>1){
			return false;
		} else {
			return $data->row_array();
		}
	}

	function find($userID){
		$blackPayDB = $this->load->database('blackpay', true);
		$user = $blackPayDB->get_where('users', array('id'=>$userID))->row_array();
		unset($user['password']);
		return $user;
	}

	

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */