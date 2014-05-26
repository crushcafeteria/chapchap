<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('book_model');
		$this->load->model('chapter_model');

		$this->form_validation->set_error_delimiters('<div class="form-error text-danger">', '</div>');
	}


	public function index(){
		$this->all();
	}

	
	public function add(){

		// Breadcrumbs
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Books', base_url('book/index')); // this will be a link
		$this->breadcrumb->add_crumb('Add New', base_url('book/add')); // this will be a link
		$data['bread'] = $this->breadcrumb->output();

		$data['title'] = 'Add new book';

		// Form rules
		$this->form_validation->set_rules('name', 'book name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'book description', 'trim|required|xss_clean');

		if(!$this->form_validation->run()){
			$this->template->inject('book/add', $data);
		} else {
			
			if($this->book_model->addNewBook($this->input->post())){
				redirect(base_url('book/all?status=success'));
			} else {
				$this->template->inject('book/add', $data);
			}
		}
	}

	/*Shows all books in db*/
	public function all(){

		// Breadcrumbs
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('All Books', base_url('book/index')); // this will be a link
		$data['bread'] = $this->breadcrumb->output();


		$data['title'] = 'My Books';
		$data['books'] = $this->book_model->getAllBooks();

		$this->template->inject('book/list', $data);
	}

	public function edit($bookID){

		$data['title'] = 'Edit Book';
		$data['book'] = $this->book_model->findBook($bookID);


		// Breadcrumbs
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Books', base_url('book/index'));
		$this->breadcrumb->add_crumb($data['book']['name'], base_url('book/index'));
		$this->breadcrumb->add_crumb('Edit', '#');
		$data['bread'] = $this->breadcrumb->output();
		

		$this->form_validation->set_rules('name', 'book name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'book description', 'trim|required|xss_clean');

		if(!$this->form_validation->run()){
			$this->template->inject('book/edit', $data);
		} else {
			// Save book
			if($this->book_model->editBook($this->input->post())){
				redirect(base_url('book/all?status=success'));
			} else {
				redirect(base_url('book/all?status=failed'));
			}
		}
	}

	public function delete($bookID){
		if($this->book_model->deleteBook($bookID)){
			redirect(base_url('book/all?status=success'));
		} else {
			redirect(base_url('book/all?status=failed'));
		}
	}

}

/* End of file book.php */
/* Location: ./application/controllers/docs/book.php */