<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

	private $db;

	public function __construct()
	{
		parent::__construct();
		
		$this->db = $this->load->database('docs', true);
	}

	function getAllBooks(){

		$query = $this->db->get('books');

		return $query->result_array();

	}


	function addNewBook($data){

		return $this->db->insert('books', array('name'=>$data['name'], 'description'=>$data['description']));

	}

	function findBook($bookID){
		$query = $this->db->get_where('books', array('id'=>$bookID));

		return $query->row_array();
	}

	

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */