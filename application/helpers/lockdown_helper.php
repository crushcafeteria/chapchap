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
 
if (! function_exists('lockdown'))
{
	function lockdown($encode=true)
	{
		// load CI object
		$CI =& get_instance();
		/*Build query string from config array*/
		$qs = '';
		$config_qs = $CI->config->item('lockdown_querystring');

		if(count($config_qs) > 0 ){
			$qs .= '&';
			foreach ($config_qs as $key => $value) {
				$config_qs[$key] = $key.'='.$value;
			}
			$qs .= implode('&', $config_qs);
		} else {
			$qs = '';
		}

		if($encode){
			$nextUrl = urlencode(uri_string());
		} else {
			$nextUrl = uri_string();
		}

		if(!$CI->session->userdata('privilege')){
			redirect(base_url($CI->config->item('lockdown_login_url').'?next='.$nextUrl.$qs));
		}
		
	}
}