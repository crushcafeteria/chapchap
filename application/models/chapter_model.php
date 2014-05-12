<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chapter_model extends CI_Model {

	function getAllChapters($bookID){
		return $this->db->get('chapters')->result_array();
	}

	function addnewChapter($data){

		return $this->db->insert('chapters', array('book_id'=>$data['bookID'], 'name'=>$data['name'], 'description'=>$data['description']));

	}

	function findChapter($chapterID){
		return $this->db->get_where('chapters', array('id'=>$chapterID))->row_array();
	}

}

/* End of file chapter_model.php */
/* Location: ./application/models/docs/chapter_model.php */