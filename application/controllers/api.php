<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_model');
		$this->load->model('chapter_model');
		$this->load->model('book_model');

		// This is a JSON API
		$this->output->set_content_type('application/json');
	}

	/*Gets a help article from database*/
	function document($articleID){
		$data = $this->article_model->findArticle($articleID);

		$response = array();

		if(empty($data)){
			$response['status'] = 404;
			$response['msg'] = 'The document you have requested does not exist in this API';
		} else {
			$response = $data;
			unset($response['chapter_id']);
		}
		
		echo json_encode($response, JSON_PRETTY_PRINT);
	}

	function books(){

	}


}

/* End of file api.php */
/* Location: ./application/controllers/api/v1/api.php */