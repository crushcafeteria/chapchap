<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('book_model');
		$this->load->model('chapter_model');
	}


	public function index(){
		$this->all();
	}

	
	public function add(){

		$data['title'] = 'Add new book';

		// Form rules
		$this->form_validation->set_rules('name', 'book name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'book description', 'trim|required|xss_clean');

		$this->form_validation->set_error_delimiters('<div class="form-error text-danger">', '</div>');

		if(!$this->form_validation->run()){
			$this->template->inject('docs/book/add', $data);
		} else {
			
			if($this->book_model->addNewBook($this->input->post())){
				redirect(base_url('docs/index?status=success'));
			} else {
				$this->template->inject('docs/book/add', $data);
			}
		}
	}

	/*Shows all books in db*/
	public function all(){

		$data['title'] = 'My Books';
		$data['books'] = $this->book_model->getAllBooks();

		$this->template->inject('home/index', $data);

	}

}

/* End of file book.php */
/* Location: ./application/controllers/docs/book.php */