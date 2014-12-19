<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

	function getAllBooks(){

		$query = $this->db->get('books');

		return $query->result_array();

	}


	function addNewBook($data){
		return $this->db->insert('books', array('name'=>$data['name'], 'description'=>$data['description'], 'created_by'=>$this->session->userdata('id'), 'created_on'=>$this->arena->formatDate(), 'last_update'=>$this->arena->formatDate()));
	}

	function find($bookID){
		$book = $this->db->get_where('books', array('id'=>$bookID))->row_array();
		$book['created_by'] = $this->user_model->find($book['created_by']);
		return $book;
	}

	function editBook($data){
		return $this->db->where('id', $data['book_id'])->update('books', array('name'=>$data['name'], 'description'=>$data['description'], 'last_update'=>$this->arena->formatDate()));
	}

	function deleteBook($bookID){
		# Delete articles first
		$this->db->delete('articles', array('book_id'=>$bookID));

		# Delete book
		return $this->db->delete('books', array('id'=>$bookID));
	}

	/**
	* Returns books that match slug
	*
	* This feature is specifically designed for 
	* the reference panel to aid authors in 
	* finding content related to articles they 
	* are authoring.
	*
	* @access public
	* @param $term specifies the slug to search
	* @return array
	*/
	public function skimSlugs($term){
		$term = '%'.$term.'%';
		$limit = $this->config->item('max_slugs');
		return $this->db->query("SELECT * FROM books WHERE name LIKE '$term' OR description LIKE '$term' LIMIT 0, $limit")->result_array();
	}


	function getMap($bookID){
		$books = $this->db->get('books')->result_array();

		foreach ($books as $key => $book) {
			# Get articles
			$books[$key]['articles'] = $this->article_model->getBookArticles($book['id'], 'book_id');
		}

		return $books;
	}
	

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */