<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model {

	function getAllArticles(){
		return $this->db->get('articles')->result_array();
	}

	function createNewArticle($data){
		$data['created_on'] = $this->arena->formatDate();
		return $this->db->insert('articles', array('book_id'=>$data['book_id'], 'title'=>$data['title'], 'content'=>$data['content'], 'created_on'=>$data['created_on']));
	}

	function findArticle($articleID){
		return $this->db->get_where('articles', array('id'=>$articleID))->row_array();
	}

	function editArticle($data){
		$data['created_on'] = $this->arena->formatDate();
		return $this->db->update('articles', 
			array(
				'title'=>$data['title'], 
				'content'=>$data['content'], 
				'last_update'=>$this->arena->formatDate()
			), 
			array(
				'id'=>$data['article_id']
			)
		);
	}

	function deleteArticle($articleID){

		$data = $this->db->get_where('articles', array('id'=>$articleID))->row_array();

		if($this->db->where('id', $articleID)->delete('articles')){
			return $data['book_id'];
		} else {
			return false;
		}
	}

	function getBookArticles($bookID){
		return $this->db->get_where('articles', array('book_id'=>$bookID))->result_array();
	}

	function similarReads($chapterID){
		return $this->db->limit(10)->get_where('articles', array('book_id'=>$chapterID))->result_array();
	}

	/**
	* Returns articles that match slug
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
		return $this->db->query("SELECT * FROM articles WHERE title LIKE '$term' OR content LIKE '$term' LIMIT 0, $limit")->result_array();
	}
}

/* End of file article_model.php */
/* Location: ./application/models/docs/article_model.php */