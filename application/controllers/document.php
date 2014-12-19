<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Document extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_model');
		$this->load->model('book_model');
	}

	public function index($id, $json = false){
		if(!isset($id)){
			// Show error
		} else {

			/*Get article*/
			$data['article'] = $this->article_model->findArticle($id);
			$data['title'] = $data['article']['title'];
			$data['similar'] = $this->article_model->similarReads($data['article']['book_id']);
			$data['map'] = $this->book_model->getMap($data['article']['book_id']);

			$this->load->view('inc/help-header', $data);
			$this->load->view('help/read', $data);

			// var_dump($data['map']);
		}
	}

}

/* End of file document.php */
/* Location: ./application/controllers/document.php */