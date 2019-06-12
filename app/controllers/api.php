<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// require_once "welcome.php";

class Api extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('InfoBedModel');
		$this->load->helper('debug');
	}
	function info_bed()
	{
		$data_service = $this->InfoBedModel->info_bed_today();
		header('Content-Type: application/json; charset=utf-8' );
		echo json_encode($data_service);
	}

}