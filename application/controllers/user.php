<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		$this->load->model('user_model');
	}

	public function login()	{

		if($this->session->userdata('email')){
			redirect(base_url('index'));
		}

		$data['title'] = 'Login';

		$this->form_validation->set_rules('email', 'email address', 'trim|required|valid_emailxxxxxx|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

		$this->form_validation->set_error_delimiters('<div class="form-error text-danger">', '</div>');


		if(!$this->form_validation->run()){
			$this->template->inject('user/login', $data);
		} else {

			// Login user
			$loginStatus = $this->user_model->authenticate($this->input->post());

			if($loginStatus){

				// Setup session
				$userdata = array(
					'names' => $loginStatus['names'],
					'email' => $loginStatus['email'],
					'token' => $loginStatus['token'],
				);

				$this->session->set_userdata($userdata);

				redirect(base_url('book/all'));

			} else {

				$data['msgBox'] = $this->arena->renderMsgBox('Please enter your correct email and password', 'Access Denied');
				$this->template->inject('user/login', $data);

			}
		}
		
	}

	/*Logout user*/
	public function logout(){

		$this->session->sess_destroy();

		redirect(base_url('user/login?status=logged_out'));
		
	}

	/*Create new user*/
	public function create(){

		$data['title'] = 'New User';

		$this->form_validation->set_rules('names', 'full name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('gender', 'gender', 'required|trim|xss_clean');
		// $this->form_validation->set_rules('email', 'email address', 'required|trim|xss_clean|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
		$this->form_validation->set_rules('confirm_password', 'confirm password', 'required|trim|xss_clean|matches[password]');

		$this->form_validation->set_error_delimiters('<div class="form-error text-danger">', '</div>');


		if(!$this->form_validation->run()){
			$this->template->inject('user/create', $data);
		} else {
			// Save user

			if($this->user_model->createNewUser($this->input->post())){

				redirect('user/login?status=account_created');

			} else {
				$data['msgBox'] = $this->arena->msgBox('An error occured while creating your account. Please try again later', 'Database Error');
				$this->template->inject('user/create', $data);
			}
		}
	}



}

/* End of file user.php */
/* Location: ./application/controllers/user.php */