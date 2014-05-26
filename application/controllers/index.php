<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('book_model');
	}

	public function index()
	{	

		if($this->session->userdata('email')){

			// // Show all books
			// $data['title'] = 'Welcome';
			// $data['books'] = $this->book_model->getAllBooks();

			// $this->template->inject('book/list', $data);

			redirect(base_url('book/index'));

		} else {

			// Show home page
			$this->template->inject('index');
		}
		
			
	}

}

/* End of file index.php */
/* Location: ./application/controllers/docs/index.php */