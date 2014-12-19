<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		lockdown();
		$this->load->model('book_model');
		$this->load->model('chapter_model');
		$this->load->model('article_model');
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->helper('text');
		$this->form_validation->set_error_delimiters('<div class="form-error text-danger">', '</div>');

	}

	public function index($bookID){

		$data['title'] = 'All Articles';
		$data['articles'] = $this->article_model->getBookArticles($bookID);

		$data['book'] = $this->book_model->find($bookID);

		if(count($data['articles']) > 5){
			$this->template->inject('article/list-mini', $data);
		} else {
			$this->template->inject('article/list', $data);
		}


		// var_dump($data);
	}


	/*Add new chapter*/
	public function write($bookID){


		$this->form_validation->set_rules('title', 'title', 'required|trim');
		$this->form_validation->set_rules('content', 'content', 'trim');

		if(!$this->form_validation->run()){
			$data['title'] = 'Create new article';
			$data['book'] = $this->book_model->find($bookID);
			$this->template->inject('article/write', $data);
		} else {
			// Save article
			if($this->article_model->createNewArticle($this->input->post())){
				redirect(base_url('articles/'.$bookID.'?status=article_created'));
			} else {
				$data['msgBox'] = $this->arena->renderMsgBox('An error occured while saving this article. Please try again later', 'Database Error');
				$this->template->inject('article/write', $data);
			}

			// var_dump($this->input->post());

		}
	}


	/*View chapters*/
	public function view($bookID){

		
		$data['chapter'] = $this->chapter_model->findChapter($bookID);
		$data['book'] = $this->book_model->findBook($data['chapter']['book_id']);

		$data['title'] = $this->arena->titleCase($data['chapter']['name']);
		$data['articles'] = $this->article_model->getChapterArticles($bookID);

		// var_dump($data['articles']);

		$this->template->inject('article/list', $data);

		// var_dump($book);
		
	}


	/*Displays an article*/
	public function read($articleID){

		$data['article'] = $this->article_model->findArticle($articleID);
		$data['book'] = $this->book_model->find($data['article']['book_id']);

		$data['title'] = $data['article']['title'];

		$this->template->inject('article/read', $data);

	}


	/*Edit an article*/
	public function edit($articleID, $method=null){
	
		$data['title'] = 'Edit Article';
		$data['article'] = $this->article_model->findArticle($articleID);
		$data['book'] = $this->book_model->find($data['article']['book_id']);

		$this->form_validation->set_rules('title', 'title', 'required|trim');
		$this->form_validation->set_rules('content', 'content', 'trim');

		if(!$this->form_validation->run()){
			$this->template->inject('article/edit', $data);
		} else {
			// Save edited article

			var_dump($this->input->post());

			// exit();

			if($this->article_model->editArticle($this->input->post())){
				if($method=='ajax'){
					echo json_encode(array('status'=>'SUCCESS', 'timestamp'=>$this->arena->formatDate()));
				} else {
					redirect(base_url('article/read/'.$this->input->post('article_id').'?status=article_edited'));
				}
				
			} else {

				if($method=='ajax'){
					echo json_encode(array('status'=>'FAIL'));
				} else {
					$data['msgBox'] = $this->arena->renderMsgBox('An error occured while saving this article. Please try again later', 'Database Error');
					$this->template->inject('article/edit', $data);
				}
			}

			// var_dump($this->input->post());

		}
	}


	/*Delete an article*/

	function delete($articleID){

		$bookID = $this->article_model->deleteArticle($articleID);

		if(!$bookID){
			// redirect('article/list/'.$) DO SOMETHING HERE TODO
		} else {
			redirect(base_url('article/list/'.$bookID.'?status=article_deleted'));
		}
	}

	

}

/* End of file chapter.php */
/* Location: ./application/controllers/docs/chapter.php */