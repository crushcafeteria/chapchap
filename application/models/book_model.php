<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

	function getAllBooks(){

		$query = $this->db->get('books');

		return $query->result_array();

	}


	function addNewBook($data){

		return $this->db->insert('books', array('name'=>$data['name'], 'description'=>$data['description'], 'created_on'=>$this->arena->formatDate()));

	}

	function findBook($bookID){
		$query = $this->db->get_where('books', array('id'=>$bookID));

		return $query->row_array();
	}

	function editBook($data){
		return $this->db->where('id', $data['book_id'])->update('books', array('name'=>$data['name'], 'description'=>$data['description'], 'last_update'=>$this->arena->formatDate()));
	}

	function deleteBook($bookID){

		// Get book
		$data['book'] = $this->db->get_where('books', array('id'=>$bookID))->row_array();

		// Get chapters
		$data['chapters'] = $this->db->get_where('chapters', array('book_id'=>$bookID))->result_array();

		// var_dump($data);

		if(count($data['chapters'])!=0){

			// Delete articles for each chapter
			foreach ($data['chapters'] as $key => $chapter) {
				$this->db->delete('articles', array('chapter_id'=>$chapter['id']));
			}
		}

		return $this->db->delete('books', array('id'=>$bookID));
	}

	

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */