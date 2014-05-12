<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chapter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('docs/book_model');
		$this->load->model('docs/chapter_model');
		$this->load->library('form_validation');
	}

	public function index($chapterID){

		var_dump($chapterID);
	}


	/*Add new chapter*/
	public function add($bookID){

		$data['title'] = 'New Chapter';
		$data['bookID'] = $bookID;

		var_dump($this->input->post());

		$this->form_validation->set_rules('name', 'chapter name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'chapter summary', 'trim|required|xss_clean');

		$this->form_validation->set_error_delimiters('<div class="form-error text-danger">', '</div>');

		if(!$this->form_validation->run()){
			$this->template->inject('docs/chapter/add', $data);
		} else {

			// Save chapter
			if($this->chapter_model->addnewChapter($this->input->post())){
				redirect('docs/book/view/'.$bookID.'?status=success');
			} else {
				$data['msgBox'] = $this->arena->renderMsgBox('Chapter cannot be saved at the moment. Please try again later.','System Error');
				$this->template->inject('docs/chapter/add', $data);
			}
		}


	}


	/*View chapters*/
	public function view($bookID){

		$data['book'] = $this->book_model->findBook($bookID);
		$data['title'] = $this->arena->titleCase($data['book']['name']);
		$data['chapters'] = $this->chapter_model->getAllChapters($bookID);

		$this->template->inject('docs/chapter/view', $data);

		// var_dump($book);
		
	}

}

/* End of file chapter.php */
/* Location: ./application/controllers/docs/chapter.php */