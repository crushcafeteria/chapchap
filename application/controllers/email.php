<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('email_model');
	}

	public function index(){
		$this->process();
	}

	public function view($filter){

		if(strtolower($filter)=='inactive'){

			$data['title'] = 'Inactive Users';

			$data['data'] = $this->email_model->getInactiveUsers();

			$this->template->inject('email/inactive', $data);

		} else if(strtolower($filter)=='registered'){

			$data['title'] = 'Registered Users';

			$data['data'] = $this->email_model->getRegisteredMembers();

			$this->template->inject('email/registered', $data);
		}
	}



	public function queue(){

		$data['title'] = 'Email Queue';

		$data['queue'] = $this->email_model->listQueue();

		$this->template->inject('email/queue', $data);;
		
	}


	/*Process the email queue*/
	public function process(){

		$this->load->library('email');

		// get emails msgs from queue
		$emailsMsgs = $this->email_model->processQueue();

		// var_dump($emailsMsgs);

		foreach ($emailsMsgs as $key => $msg) {

			// Format recipients
			$msg['recipients'] = json_decode($msg['recipients'], true);
			$emailAddresses = '';

			// Extract email addresses
			foreach ($msg['recipients'] as $msg) {
				$emailAddresses[] = $msg['recipient_email'];
			}

			// Build and send email msg
			$this->email->from($this->config->item('from_email'), $this->config->item('from_name'));
			
			$this->email->to(implode(',', $emailAddresses));
			
			$this->email->subject($emailsMsgs[$key]['title']);
			$this->email->message($emailsMsgs[$key]['body']);

			$this->email->set_alt_message($emailsMsgs[$key]['alt_body']);
			
			if($this->email->send()){
				// Delete email from queue
			} else {
				// Ignore mail, record failed attempt for later
			}
			
			echo $this->email->print_debugger().'<hr>';

			$this->email->clear();
			
		}

		// var_dump($emails);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */