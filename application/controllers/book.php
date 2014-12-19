<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		lockdown();
		$this->load->library('form_validation');
		$this->load->model('chapter_model');
		$this->load->model('article_model');
		$this->load->model('user_model');
		$this->load->model('book_model');
		

		$this->form_validation->set_error_delimiters('<div class="form-error text-danger">', '</div>');
	}


	public function index(){
		$data['title'] = 'My Books';
		$data['books'] = $this->book_model->getAllBooks();
		$this->template->inject('book/list', $data);
	}

	
	public function add(){

		$data['title'] = 'Add new book';

		// Form rules
		$this->form_validation->set_rules('name', 'book name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'book description', 'trim|xss_clean');

		if(!$this->form_validation->run()){
			$this->template->inject('book/add', $data);
		} else {
			
			if($this->book_model->addNewBook($this->input->post())){
				redirect(base_url('book?status=book_added'));
			} else {
				$data['msgBox'] = $this->arena->renderMsgBox('An error occured while creating this book. Please try again later', 'Ooops...');
				$this->template->inject('book/add', $data);
			}
		}
	}


	public function edit($bookID){

		$data['title'] = 'Edit Book';
		$data['book'] = $this->book_model->find($bookID);


		$this->form_validation->set_rules('name', 'book name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'book description', 'trim|xss_clean');

		if(!$this->form_validation->run()){
			$this->template->inject('book/edit', $data);
		} else {
			// Save book
			if($this->book_model->editBook($this->input->post())){
				redirect(base_url('books?status=edited'));
			} else {
				redirect(base_url('books?status=edit_failed'));
			}
		}
	}

	public function delete($bookID){

		if(!$this->input->post('posted')){
			$data['title'] = 'Confirm Action';
			$data['book'] = $this->book_model->find($bookID);
			$this->template->inject('book/confirm-delete', $data);
		} else {

			// var_dump($_POST);

			// exit();

			if($this->input->post('confirm_action')==true){
				if($this->book_model->deleteBook($bookID)){
					redirect(base_url('books?status=deleted'));
				} else {
					redirect(base_url('books?status=delete_failed'));
				}
			} else {
				redirect(base_url('books?status=delete_cancelled'));
			}
 
		}

	}

	public function download($bookID){

		$data['book'] = $this->book_model->findBook($bookID);

		$chapters = $this->chapter_model->getAllChapters($bookID);
		foreach ($chapters as $key => $chapter) {
			$chapters[$key]['articles'] = $this->article_model->getChapterArticles($chapter['id']);
		}


		$data['book']['chapters'] = $chapters;

		$this->load->view('book/export', $data);

	}

}

/* End of file book.php */
/* Location: ./application/controllers/docs/book.php */