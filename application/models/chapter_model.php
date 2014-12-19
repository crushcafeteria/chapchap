<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chapter_model extends CI_Model {

	function getAllChapters($bookID){
		return $this->db->get_where('chapters', array('book_id'=>$bookID))->result_array();
	}

	function addnewChapter($data){

		return $this->db->insert('chapters', array('book_id'=>$data['bookID'], 'name'=>$data['name'], 'description'=>$data['description'], 'created_on'=>$this->arena->formatDate()));

	}

	function findChapter($chapterID){
		return $this->db->get_where('chapters', array('id'=>$chapterID))->row_array();
	}

	function editChapter($data){
		return $this->db->where('id', $data['chapter_id'])->update('chapters', array('name'=>$data['name'], 'description'=>$data['description'], 'last_update'=>$this->arena->formatDate()));
	}

	function deleteChapter($chapterID){
		/*Get chapter ID*/
		$chapter = $this->findChapter($chapterID);

		/*Delete all articles in chapter*/
		$articles = $this->article_model->getChapterArticles($chapterID);

		foreach ($articles as $key => $article) {
			$this->article_model->deleteArticle($article['id']);
		}

		/*Chapter itself*/
		return $this->db->delete('chapters', array('id'=>$chapterID));
	}

	/**
	* Gets all chapters and their articles
	*
	* @access public
	* @param $bookID
	* @return array
	*/
	

	/**
	* Returns chapters that match slug
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
		return $this->db->query("SELECT * FROM chapters WHERE name LIKE '$term' OR description LIKE '$term' LIMIT 0, $limit")->result_array();
	}


	public function summary($bookID){
		$data['total_chapters'] = $this->db->get_where('chapters', array('book_id'=>$bookID))->num_rows();
		return $data;
	}

}

/* End of file chapter_model.php */
/* Location: ./application/models/docs/chapter_model.php */