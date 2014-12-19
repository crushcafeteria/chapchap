<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['inactive_period'] = 864;

$config['num_emails_per_pop'] = 1; // Number of emails to send per pop

$config['from_email'] = 'support@arena.co.ke';
$config['from_name'] = 'The Arena Team';

$config['appName'] = 'Chapchap';

$config['api_root_link'] = 'http://api.arena.co.ke';
$config['help_root_link'] = 'http://127.0.0.1/chapchap';

$config['helpAppName'] = 'Arena Help';

/*Number of slugs to load per page*/
$config['max_slugs'] = 10;

/*Database storage - relative to siteroot*/
$config['database_backup_location'] = 'database_backups';
$config['database_file_name'] = 'Chapchap Dump';

/**
* Evade FS file locks
* 
* File systems lock files 
* when writing to them. As a result,the system 
* lists stale files. This item sets in seconds 
* the system has to wait before initiating a 
* directory listing.
* 
* @return true;
*/
$config['fs_wait'] = 1;


/*Autosave interval(ms)*/
$config['autosave_interval'] = 10000;

$config['article_teaser_length'] = 60;
