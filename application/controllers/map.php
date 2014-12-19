<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		lockdown();
		$this->load->model('book_model');
		$this->load->model('chapter_model');
		$this->load->model('article_model');
	}

	public function index()
	{
		$data['title'] = 'Book Hosting Map';

		/*get all books*/
		$data['map'] = $this->book_model->getAllBooks();

		/*get all chapters for each book*/
		foreach ($data['map'] as $key => $book) {
			$data['map'][$key]['chapters'] = $this->chapter_model->getAllChapters($book['id']);
		}

		$this->template->inject('map', $data);

		// var_dump($data);
	}

}

/* End of file map.php */
/* Location: ./application/controllers/map.php */