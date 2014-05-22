<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('book_model');
		$this->load->model('chapter_model');
		$this->load->model('article_model');
		$this->load->library('form_validation');
	}

	public function index($chapterID){

		var_dump($chapterID);
	}


	/*Add new chapter*/
	public function write($chapterID){

		$data['title'] = 'New Article';
		$data['chapter'] = $this->chapter_model->findChapter($chapterID);

		$this->form_validation->set_rules('title', 'title', 'required|trim');
		$this->form_validation->set_rules('content', 'content', 'required|trim');

		$this->form_validation->set_error_delimiters('<div class="form-error text-danger">', '</div>');


		if(!$this->form_validation->run()){
			$this->template->inject('article/write', $data);
		} else {
			// Save article

			if($this->article_model->createNewArticle($this->input->post())){
				redirect('article/view/'.$chapterID.'?status=article_created');
			} else {
				$data['msgBox'] = $this->arena->renderMsgBox('An error occured while saving this article. Please try again later', 'Database Error');
				$this->template->inject('article/write', $data);
			}

			// var_dump($this->input->post());

		}
	}


	/*View chapters*/
	public function view($chapterID){

		$data['chapter'] = $this->chapter_model->findChapter($chapterID);
		$data['title'] = $this->arena->titleCase($data['chapter']['name']);
		$data['articles'] = $this->article_model->getAllArticles();

		$this->template->inject('article/view', $data);

		// var_dump($book);
		
	}


	/*Displays an article*/
	public function read($articleID){

		$data['article'] = $this->article_model->findArticle($articleID);
		$data['title'] = $data['article']['title'];

		$this->template->inject('article/read', $data);

	}


	/*Edit an article*/
	public function edit($articleID){

		$data['title'] = 'Edit Article';
		$data['article'] = $this->article_model->findArticle($articleID);

		$this->form_validation->set_rules('title', 'title', 'required|trim');
		$this->form_validation->set_rules('content', 'content', 'required|trim');

		$this->form_validation->set_error_delimiters('<div class="form-error text-danger">', '</div>');


		if(!$this->form_validation->run()){
			$this->template->inject('article/edit', $data);
		} else {
			// Save edited article

			// var_dump($this->input->post());

			// exit();

			if($this->article_model->editArticle($this->input->post())){
				redirect('article/read/'.$this->input->post('article_id').'?status=article_edited');
			} else {
				$data['msgBox'] = $this->arena->renderMsgBox('An error occured while saving this article. Please try again later', 'Database Error');
				$this->template->inject('article/edit', $data);
			}

			// var_dump($this->input->post());

		}
	}


	/*Delete an article*/

	function delete($articleID){

		$chapterID = $this->article_model->deleteArticle($articleID);

		if(!$chapterID){
			// redirect('article/view/'.$) DO SOMETHING HERE TODO
		} else {
			redirect(base_url('article/view/'.$chapterID.'?status=article_deleted'));
		}
	}

}

/* End of file chapter.php */
/* Location: ./application/controllers/docs/chapter.php */