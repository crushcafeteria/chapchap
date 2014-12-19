<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="form-error text-danger"><i class="icon-exclamation-sign"></i>', '</div>');
		$this->load->model('user_model');
	}

	public function login()	{

		/*redirect to homepage if logged in*/
		if($this->session->userdata('token')){
			redirect(base_url('home'));
		}

		$data['title'] = 'Login to Chapchap';

		/*Set rules*/
		$this->form_validation->set_rules('email', 'email address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');


		if(!$this->form_validation->run()){
			$this->template->inject('user/login', $data);
		} else {

			/*Login user*/
			$userdata = $this->user_model->login($this->input->post());

			// var_dump($userdata);
			// exit();

			/*Setup session*/
			if($userdata){

				// var_dump($userdata['privilege']);


				# Check if user can write help content
				if($userdata['privilege'] != 'AUTHOR' && $userdata['privilege'] != 'ROOT'){
					show_error('Sorry! Your privilege level does not allow you to write/edit help content. Please apply to The Arena Team at hello@arena.co.ke if you wish to become our author', 404, 'Access Denied - Insufficient Privileges');
				}

				unset($userdata['password']);

				$this->session->set_userdata($userdata);

				/*Redirect to next url if set*/
	            if($this->input->post('next')){
	                redirect(base_url(urldecode($this->input->post('next'))));
	            } else {
	                redirect(base_url('book/all'));
	            }
				
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

		show_error('Please create your account in '.anchor('http://www.arena.co.ke/user/register', 'Arena Metrics').' then request for authorship permissions at hello@arena.co.ke', 404, 'Hello, human!');

		$data['title'] = 'New User';

		$this->form_validation->set_rules('names', 'full name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('gender', 'gender', 'required|trim|xss_clean');
		$this->form_validation->set_rules('email', 'email address', 'required|trim|xss_clean|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
		$this->form_validation->set_rules('confirm_password', 'confirm password', 'required|trim|xss_clean|matches[password]');


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