<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		$this->load->model('user_model');
	}

	public function login()
	{
		$data['title'] = 'Login';

		$this->form_validation->set_rules('email', 'email address', 'trim|required|valid_email|xss_clean');
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

				var_dump($loginStatus);
				
				$this->session->set_userdata($userdata);

				// redirect(base_url('index'));
			} else {
				$data['msgBox'] = $this->arena->renderMsgBox('Please enter your correct email and password', 'Access Denied');
				$this->template->inject('user/login', $data);

				var_dump($loginStatus);
			}
		}
		
	}



}

/* End of file user.php */
/* Location: ./application/controllers/user.php */