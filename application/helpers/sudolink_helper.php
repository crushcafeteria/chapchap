<?php


/**
 * Function Name
 *
 * Function description
 *
 * @access	public
 * @param	type	name
 * @return	type	
 */
 
if (! function_exists('decode_sudolink')){

	function decode_sudolink($string){
		$pattern = '|[\[](\w+):([0-9]+):([\w\s]+)\]|';
		return preg_replace_callback($pattern, 
			function($matches){
				if(strtolower($matches[1]) == 'article'){
					return '<a href="'.base_url('document/'.$matches[2]).'">'.$matches[3].'</a>';
				} else if(strtolower($matches[1]) == 'chapter'){
					return '<a href="'.base_url('chapter/'.$matches[2]).'">'.$matches[3].'</a>';
				} else if(strtolower($matches[1]) == 'book'){
					return '<a href="'.base_url('book/'.$matches[2]).'">'.$matches[3].'</a>';
				}
			}, 
			$string);
	}

	
}