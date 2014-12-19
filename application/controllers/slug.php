<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slug extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('book_model');
		$this->load->model('chapter_model');
		$this->load->model('article_model');
	}

	function search(){

		if(!$this->input->get('q')){
			$response['status'] = 'MISSING_DATA';
			$response['msgBox'] = $this->arena->renderMiniBox('Please enter a keyword','alert-danger');
		} else {

			if($_GET['t']=='ARTICLES'){
				$results = $this->article_model->skimSlugs($_GET['q']);
			} else if($_GET['t']=='BOOKS'){
				$results = $this->book_model->skimSlugs($_GET['q']);
			} else {
				$results = array();
			}

			// var_dump($results);

			if(count($results)==0){
				$response['status'] = 'EMPTY';
				$response['msgBox'] = '<div class="text-center text-danger"><i class="icon-exclamation-sign"></i> No hits match "'.$_GET['q'].'"</div>';
			} else {
				$response['status'] = 'OK';
				$response['total'] = count($results);

				/*Create html response*/
				$response['html'] = $this->load->view('slug/results', array('results'=>$results), true);
				// $response['data'] = $results;
			}
		}

		echo json_encode($response);
	}


	public function preview($type, $id){

		if($type=='articles'){
			$item = $this->article_model->findArticle($id);
		} else if($type=='chapters'){
			$item = $this->chapter_model->findChapter($id);
		} else if($type=='books'){
			$item = $this->book_model->findBook($id);
		}

		$item['type'] = $type;

		$this->load->view('slug/preview', array('item'=>$item));

		// var_dump($item);

	}

}

/* End of file slug.php */
/* Location: ./application/controllers/slug.php */