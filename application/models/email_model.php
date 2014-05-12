<?php

class Email_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getInactiveUsers(){

    	// 1 day = 86400 secs

    	$data = array();

    	$query = $this->db->select('fname, lname, gender, email, last_seen')->get('users');

    	foreach ($query->result_array() as $user) {

    		// var_dump($user);

    		if((time() - $user['last_seen']) > $this->config->item('inactive_period')){
    			$data[] = $user;
    		}
    		
    	}

    	return $data;
    }

    function getRegisteredMembers(){

    	$data = $this->db->select('fname, lname, gender, email, last_seen')->get('users');

    	return $data->result_array();
    }

    function getSubscribers(){

    	$data = $this->db->get('subscribers');

    	var_dump($data->result_array());
    }

    function listQueue(){

        $data = $this->db->get('email_queue');

        return $data->result_array();

    }

    function processQueue(){

       $query = $this->db->limit($this->config->item('num_emails_per_pop'))->get('email_queue');

       return $query->result_array();


    }
}