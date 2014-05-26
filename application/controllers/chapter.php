<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chapter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('book_model');
		$this->load->model('chapter_model');
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="form-error text-danger">', '</div>');
	}

	public function index($chapterID){

		var_dump($chapterID);
	}


	/*Add new chapter*/
	public function add($bookID){

		$book = $this->book_model->findBook($bookID);

		// Breadcrumbs
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Home', base_url());
		$this->breadcrumb->add_crumb($book['name'], base_url('book/index')); 
		$this->breadcrumb->add_crumb('New Chapter', '#'); 
		$data['bread'] = $this->breadcrumb->output();

		$data['title'] = 'New Chapter';
		$data['bookID'] = $bookID;

		// var_dump($this->input->post());

		$this->form_validation->set_rules('name', 'chapter name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'chapter summary', 'trim|required|xss_clean');

		if(!$this->form_validation->run()){
			$this->template->inject('chapter/add', $data);
		} else {

			// Save chapter
			if($this->chapter_model->addnewChapter($this->input->post())){
				redirect(base_url('chapter/view/'.$bookID.'?status=success'));
			} else {
				$data['msgBox'] = $this->arena->renderMsgBox('Chapter cannot be saved at the moment. Please try again later.','System Error');
				$this->template->inject('chapter/add', $data);
			}
		}


	}


	/*View chapters*/
	public function view($bookID){

		$data['book'] = $this->book_model->findBook($bookID);
		$data['title'] = $this->arena->titleCase($data['book']['name']);
		$data['chapters'] = $this->chapter_model->getAllChapters($bookID);

		// Breadcrumbs
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Home', base_url());
		$this->breadcrumb->add_crumb($data['book']['name'], base_url('book/index')); 
		$this->breadcrumb->add_crumb('All Chapters', '#'); 
		$data['bread'] = $this->breadcrumb->output();

		$this->config->set_item('replacer_embed', array('view'=>$data['book']['name'], 'chapter'=>''));

		// var_dump($data);

		$this->template->inject('chapter/view', $data);

		// var_dump($book);
		
	}


	/*Edit chapter*/
	public function edit($chapterID){

		$data['title'] = 'Edit chapter';
		$data['chapter'] = $this->chapter_model->findChapter($chapterID);

		$data['book'] = $this->book_model->findBook($data['chapter']['id']);

		// Breadcrumbs
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Home', base_url());
		$this->breadcrumb->add_crumb($data['book']['name'], base_url('book/index')); 
		$this->breadcrumb->add_crumb($data['chapter']['name'], base_url('chapter/view/'.$chapterID)); 
		$this->breadcrumb->add_crumb('Edit Chapter', '#'); 
		$data['bread'] = $this->breadcrumb->output();

		$this->form_validation->set_rules('name', 'chapter name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'chapter summary', 'trim|required|xss_clean');

		if(!$this->form_validation->run()){
			$this->template->inject('chapter/edit', $data);
		} else {
			// Save changes

			if($this->chapter_model->editChapter($this->input->post())){
				redirect(base_url('chapter/view/'.$this->input->post('book_id').'?status=success'));
			} else {
				redirect(base_url('chapter/view/'.$this->input->post('book_id').'?status=failed'));
			}
		}
	}

	public function delete($bookID, $chapterID){
		if($this->chapter_model->deleteChapter($chapterID)){
			redirect(base_url('chapter/view/'.$bookID.'?status=success'));
		} else {
			redirect(base_url('chapter/view/'.$bookID.'?status=failed'));
		}
	}

}

/* End of file chapter.php */
/* Location: ./application/controllers/docs/chapter.php */