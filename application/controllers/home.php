<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('book_model');
	}

	public function index()
	{	
		if($this->session->userdata('id')){
			redirect(base_url('book/index'));
		} else {
			$data['title'] = 'Welcome to Arena Wiki';
			$this->template->inject('home', $data);
		}
		
	}

}

/* End of file index.php */
/* Location: ./application/controllers/docs/index.php */