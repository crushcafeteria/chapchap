<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('docs/book_model');
		$this->load->model('docs/chapter_model');
		$this->load->model('docs/article_model');
		$this->load->library('form_validation');
	}

	public function index($chapterID){

		var_dump($chapterID);
	}


	/*Add new chapter*/
	public function write($chapterID){

		$data['title'] = 'New Article';
		$data['chapterID'] = $chapterID;

		if(!$this->form_validation->run()){
			$this->template->inject('docs/article/write', $data);
		}
	}


	/*View chapters*/
	public function view($chapterID){

		$data['chapter'] = $this->chapter_model->findChapter($chapterID);
		$data['title'] = $this->arena->titleCase($data['chapter']['name']);
		$data['articles'] = $this->article_model->getAllArticles();

		$this->template->inject('docs/article/view', $data);

		// var_dump($book);
		
	}

}

/* End of file chapter.php */
/* Location: ./application/controllers/docs/chapter.php */