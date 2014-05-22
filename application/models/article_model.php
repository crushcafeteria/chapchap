<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model {

	function getAllArticles(){
		return $this->db->get('articles')->result_array();
	}

	function createNewArticle($data){
		$data['created_on'] = $this->arena->formatDate();
		return $this->db->insert('articles', array('chapter_id'=>$data['chapter_id'], 'title'=>$data['title'], 'content'=>$data['content'], 'created_on'=>$data['created_on']));
	}

	function findArticle($articleID){
		return $this->db->get_where('articles', array('id'=>$articleID))->row_array();
	}

	function editArticle($data){
		$data['created_on'] = $this->arena->formatDate();
		return $this->db->where('id', $data['article_id'])->update('articles', array('title'=>$data['title'], 'content'=>$data['content']));
	}

	function deleteArticle($articleID){

		$data = $this->db->get_where('articles', array('id'=>$articleID))->row_array();

		if($this->db->where('id', $articleID)->delete('articles')){
			return $data['chapter_id'];
		} else {
			return false;
		}
	}

	

}

/* End of file article_model.php */
/* Location: ./application/models/docs/article_model.php */