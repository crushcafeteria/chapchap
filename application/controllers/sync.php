<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sync extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		lockdown();
		$this->load->model('book_model');
		$this->load->model('chapter_model');
		$this->load->model('article_model');
		$this->load->model('export_model');
		$this->load->library('form_validation');
	}

	public function export(){
		header('Content-disposition: attachment; filename=Chapchap Dump.json');
		header('Content-type: application/json');
		$this->output->set_output(json_encode($this->export_model->export(), JSON_PRETTY_PRINT));
	}

	public function import(){

		// var_dump($_POST);

		$data['title'] = 'Import new Chapchap Database';
		$this->form_validation->set_error_delimiters('<div class="form-error text-danger">', '</div>');


		if(!isset($_POST['import_auth'])){

			/*Show form*/
			$this->template->inject('import', $data);

		} else {

			// var_dump($_FILES);

			/*Check file extension*/
			$ext = strtolower(pathinfo($_FILES['import_file']['name'], PATHINFO_EXTENSION));
			$allowedExt = array('json');

			// var_dump($ext);

			if(!in_array($ext, $allowedExt)){
				// redirect(base_url('sync/import?status=bad_extension'));
			} else {

				/*Read-in file*/
				$data = json_decode(file_get_contents($_FILES['import_file']['tmp_name']), true);


				/*Check signature*/
				$signature = $data['signature'];
				unset($data['signature']);

				if($this->export_model->verifyDocumentSignature($data, $signature)){

					/*Backup current database*/
					$backupFile = $this->export_model->backupDatabase();

					/*Truncate all table*/
					$this->export_model->truncateDatabase();
					
					/*Import new database database*/
					$this->export_model->import($data);

				} else {
					redirect(base_url('sync/import?status=invalid_signature'));
				}
				// var_dump($data);

				exit();

				
			}
		}
	}

}

/* End of file sync.php */
/* Location: ./application/controllers/sync.php */