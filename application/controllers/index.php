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
		
		$data['title'] = 'Welcome';
		$data['books'] = $this->book_model->getAllBooks();

		$this->template->inject('home/index', $data);
	}

}

/* End of file index.php */
/* Location: ./application/controllers/docs/index.php */