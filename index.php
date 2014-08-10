<?php   
    /* 
    Plugin Name: Adbience
    Plugin URI: http://www.adbience.com
    Description: The Premier Business Network for Wordpress
    Author: Adbience
    Version: 0.1
    Author URI: http://www.adbience.com
    */  
    

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

DEFINE('ADBIENCE_DIRECTORY', plugin_dir_path( __FILE__ ));


include('widget.php');

include('backend.php');

include('frontend.php');

$adbackend = new AdbienceBackend(); 

$abdfrontend = new AdbienceFrontend();
