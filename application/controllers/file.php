<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File extends CI_Controller {

	public function upload(){

		if ($_FILES['upload']["error"] > 0) {
			$response['status'] = 'File error';
		} else {

			if (file_exists('assets/resources/'.$_FILES['upload']["name"])) {
				$response['status'] = 'File already exists';
			} else {
				move_uploaded_file($_FILES['upload']["tmp_name"], "assets/resources/".$_FILES['upload']["name"]);
				$response['status'] = 'Upload successful';
			}
		}

		echo json_encode($response);
	}

}

/* End of file file.php */
/* Location: ./application/controllers/file.php */