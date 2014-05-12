<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model {

	function getAllArticles(){
		return $this->db->get('articles')->result_array();
	}

	

}

/* End of file article_model.php */
/* Location: ./application/models/docs/article_model.php */