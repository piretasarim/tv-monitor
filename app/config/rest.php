<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| CONFIGURATION FOR REST CLIENT
|--------------------------------------------------------------------------
| 
 */
// $config['rest_monitor']	= 'http://simrspersahabatan.co.id/ekspedisi/api/ekspedisi/';

if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == '192.168.132.2'){
    $config['rest_monitor']	= 'http://192.168.132.2/ekspedisi/api/ekspedisi/';
}else{
    $config['rest_monitor']	= 'http://simrspersahabatan.co.id/ekspedisi/api/ekspedisi/';
}

/* End of file config.php */
/* Location: ./system/application/config/rest.php */