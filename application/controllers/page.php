<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index($slug) {
		$slug = strtolower($slug);

		if($slug=='about'){
			$this->template->inject('pages/about', $data);
		}
	}

}

/* End of file page.php */
/* Location: ./application/controllers/page.php */