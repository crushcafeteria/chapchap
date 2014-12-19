<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arena
{


	public function msgBox($msg, $title='Error!', $class='alert-error',$close=true){

		/*IMAGE HACK*/
		if($class=='alert-error'){
			$icon = 'icon-remove-sign';
			$class = 'alert-error alert-danger'; //BS3 hack
		} else if($class=='alert-info') {
			$icon = 'icon-info-sign';
		} else if($class=='alert-success') {
			$icon = 'icon-ok-sign';
		} else if($class=='alert-warning') {
			$icon = 'icon-exclamation-sign';
		} else if($class=='alert-danger') { //BS 3 icon hack
			$icon = 'icon-remove-sign';
		}

		
		echo '<div class="alert '.$class.'">';
			if($close=='TRUE'){
				echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			}
		echo '<strong><i class="'.$icon.'"></i> '.$title.'</strong><br>
				'.$msg.'
				</div>';
	}

	/**
	* Render msgBox HTML. Good for rendering msgBoxes JSON responses
	* Was actually built for this purpose
	* @param $msg, $title, $class, $close
	*/
	public function renderMsgBox($msg, $title='Error!', $class='alert-error',$close=true){

		/*IMAGE HACK*/
		if($class=='alert-error'){
			$class = 'alert-error alert-danger';
			$icon = 'icon-remove-sign';
		} else if($class=='alert-info') {
			$icon = 'icon-info-sign';
		} else if($class=='alert-success') {
			$icon = 'icon-ok-sign';
		} else if($class=='alert-warning') {
			$icon = 'icon-exclamation-sign';
		}

		$html = '';
		
		$html .= '<div class="alert '.$class.'">';
		if($close=='TRUE'){
			$html .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		}
		$html .= '<strong><i class="'.$icon.'"></i> '.$title.'</strong><br>
				'.$msg.'
				</div>';

		return $html;
	}

	/*Draw a mini message box*/
	public function miniBox($msg, $class='alert-error',$close=true){

		/*IMAGE HACK*/
		if($class=='alert-error'){
			$icon = 'icon-remove-sign';
		} else if($class=='alert-info') {
			$icon = 'icon-info-sign';
		} else if($class=='alert-success') {
			$icon = 'icon-ok-sign';
		} else if($class=='alert-warning') {
			$icon = 'icon-exclamation-sign';
		}
		
		echo '<div class="alert '.$class.' text-center">';
			if($close=='TRUE'){
				echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			}
		echo '<strong><i class="'.$icon.'"></i></strong>
				'.$msg.'
				</div>';
	}

	public function renderMiniBox($msg, $class='alert-error',$close=true){

		/*IMAGE HACK*/
		if($class=='alert-error' || $class=='alert-danger'){
			$icon = 'icon-remove-sign';
		} else if($class=='alert-info') {
			$icon = 'icon-info-sign';
		} else if($class=='alert-success') {
			$icon = 'icon-ok-sign';
		} else if($class=='alert-warning') {
			$icon = 'icon-exclamation-sign';
		}
		
		$html = '<div class="alert '.$class.' text-center">';
			if($close=='TRUE'){
				$html .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			}
		$html .= '<strong><i class="'.$icon.'"></i></strong>
				'.$msg.'
				</div>';

		return $html;
	}

	/*
	* Seeds a number of specified length.
	* CONFIG NOTES
	* 	The length of the seed is determined by the value in config file
	* Returns $seed
	*/
	public function seed($image=false){
		
		$seed = '';
		$index = 1;

		while($index <= 20){
			$generator = rand(0,9);
			$seed .= $generator;
			$index ++;
		}


		return $seed;
	}

	/* 
	* Hashes a term with a specified algorithm.
	* Default is SHA512
	* CONFIG NOTES
	* 	Algorithm is determined by the value in the config file
	* Return $hash.
	* @deprecated NOTE!!!! [THIS METHOD IS FLAWED] !!!!NOTE
	*/
	public function hash($term){
		$hash = hash($this->defaultHashAlgorithm, $term);
		return $hash;
	}

	
	
	public function formatTime(){
		return date('Y-m-d H:i:s');
	}



	public function titleCase($string){
		$names = explode(' ', $string);

		// Array of words to ignore while changing case
		$prepositions = array(
			'a','an','the','their','our'
		);

		// require 'semantics/prepositions.php'; 

	    foreach ($names as $key => $value) {
	    	if(!in_array($value, $prepositions)){
	    		$names[$key] = ucfirst(strtolower($value));
	    	}	        
	    }

	    return implode(' ', $names);
	}


	/*
	* Returns MySQL format of current time
	*/
	public function formatDate($format='TIMESTAMP',$time=''){

		/*Create time*/
		if(empty($time)){
			$time = date('Y-m-d H:i:s');
		}

		/*Format time*/

		if($format == 'TIMESTAMP'){
			$time = date('Y-m-d H:i:s', strtotime($time));
		} else if($format == 'READABLE') {
			$time = date('M j, Y', strtotime($time));
		} else if($format == 'PROFILE') {
			$time = date('l, jS F Y', strtotime($time));

		}  else if($format == 'BLOG') {
			$time = date('F j, Y', strtotime($time));
		}

		return $time;
	}




	// DISPLAYS COMMENT POST TIME AS "1 year, 1 week ago" or "5 minutes, 7 seconds ago", etc...
	function fbTime($date,$granularity=1) {
	    $date = strtotime($date);
	    $difference = time() - $date;

	    // var_dump($date);

	    $periods = array('decade' => 315360000,
	        'yr' => 31536000,
	        'mon' => 2628000,
	        'wk' => 604800, 
	        'day' => 86400,
	        'hr' => 3600,
	        'min' => 60,
	        'sec' => 1);

	    $retval = '';

	    if ($difference < 5) { // less than 5 seconds ago, let's say "just now"
	        $retval = "just now";
	    } else {

	        foreach ($periods as $key => $value) {

	            if ($difference >= $value) {
	                $time = floor($difference/$value);
	                $difference %= $value;
	                $retval .= ($retval ? ' ' : '').$time.' ';
	                $retval .= (($time > 1) ? $key.'s' : $key);
	                $granularity--;
	            }           

	            if ($granularity == '0') { break; }
	        }

	        /*Add ago*/
            // $retval = $retval.' ago';

        }        
        return $retval;      
	}



	/*
	* removes artifacts that destroy language syntax
	*
	* A good example is the string [I don't] know in 
	* a Javascript codebase is converted to [I Dont Know] string*/
	public function safeCase($string){
		/*
		* Find apostrophes
		*/
		$string = str_replace("'",'',$string);

		/*
		* Find double quotes
		*/
		$string = str_replace('"','',$string);



		return $string;
	}



	/*Sentence case*/
	function sentenceCase($string){

	    $names = explode(' ', $string);

	    foreach ($names as $key => $value) {
	        $names[$key] = strtolower($value);
	    }

	    $names[0] = ucfirst($names[0]);

	    return implode(' ', $names);
	}

}
