<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export_model extends CI_Model {

	function export(){

		$books = $this->book_model->getAllBooks();

		/*Get chapters*/
		foreach ($books as $bKey => $book) {
			$books[$bKey]['chapters'] = $this->chapter_model->getAllChapters($book['id']);

			/*Get all articles in each chapter*/
			foreach($books[$bKey]['chapters'] as $cKey => $chapter){
				$books[$bKey]['chapters'][$cKey]['articles'] = $this->article_model->getChapterArticles($chapter['id']);
			}

			/*Get all articles in each chapter*/
			foreach($books[$bKey]['chapters'] as $cKey => $chapter){
				$books[$bKey]['chapters'][$cKey]['articles'] = $this->article_model->getChapterArticles($chapter['id']);
			}
		}

		/*Sign this file with hash*/
		$books['signature'] = $this->createDocumentSignature($books);

		// var_dump($books);

		return $books;
	}

	/**
	* Creates a document signature
	*
	* Calculates the hash of the serialized 
	* export array. Minus the signature
	*/
	private function createDocumentSignature($seedData){
		$signature = hash('sha512', serialize($seedData));
		return $signature;
	}

	public function verifyDocumentSignature($data, $documentSignature){
		$calculatedSignature = hash('sha512', serialize($data));

		if($calculatedSignature == $documentSignature){
			return true;
		} else {
			return true;
		}
	}

	/*Returns the file name*/
	function backupDatabase(){

		$data = $this->export();
		$data = json_encode($data, JSON_PRETTY_PRINT);
		// var_dump($data);

		/*Write to file*/
		$fileName = $this->config->item('database_backup_location').'/'.$this->config->item('database_file_name').' - '.$this->arena->formatDate().'.json';

		$handle = fopen($fileName, 'w');

		if(fwrite($handle, $data)){
			return $fileName;
		} else {
			return false;
		}

	}

	/*Empty all tables in database*/
	function truncateDatabase(){
		$this->db->truncate('books');
		$this->db->truncate('chapters');
		$this->db->truncate('articles');
		return true;
	}


	/*Import data to db*/
	function import($data){

		// var_dump($data);

		foreach ($data as $key => $book) {
			/*Insert book*/
			$_book = $book;
			unset($_book['chapters']);

			if($this->db->insert('books', $_book)){

				foreach ($book['chapters'] as $key => $chapter) {
					$_chapter = $chapter;
					unset($_chapter['articles']);

					if($this->db->insert('chapters', $_chapter)){

						/*Insert articles*/
						foreach ($chapter['articles'] as $key => $article) {
							// var_dump($article);
							if(!$this->db->insert('articles', $article)){
								/*Rollback*/
								$this->rollBack();
							}
						}
					} else {
						/*Rollback*/
						$this->rollBack();
					}
				}
			} else {
				/*Rollback*/
				$this->rollBack();
			}
		}

		redirect(base_url('book/all?status=import_success'));
	}


	/*restore most recent chapchap database*/
	function rollback(){

		// Empty database
		$this->truncateDatabase();

		/*Get most recent backup*/
		$recent = $this->negotiateMostRecentDatabase();

		/*Read-in file*/
		$backupDB = json_decode(file_get_contents($this->config->item('database_backup_location').'/'.$recent), true);
		unset($backupDB['signature']);

		$this->import($backupDB);

		redirect(base_url('sync/import?status=rollback'));

	}


	function negotiateMostRecentDatabase(){
		$databases = scandir($this->config->item('database_backup_location'));

		/* Evade file system lock */
		sleep($this->config->item('fs_wait'));
		return array_pop($databases);
	}



}

/* End of file export_model.php */
/* Location: ./application/models/export_model.php */