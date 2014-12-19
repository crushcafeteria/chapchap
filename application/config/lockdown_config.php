<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* Route to your login page
*
* Use relative path to the resource i.e
* the controller name and the method name
*
* @default user/login
*/
$config['lockdown_login_url'] = 'user/login';

/**
* Urlencode() the value in $_GET['next']
*
* If this isset to true, you will have to run urldecode()
* on your $_GET['next'] to decode it back to text
*/
$config['lockdown_encode'] = FALSE;

/*Querystring with additional parameters to append to the URL*/
$config['lockdown_querystring'] = array('status'=>'access_denied');
