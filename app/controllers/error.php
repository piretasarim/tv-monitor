<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends MY_Controller {

	protected $allows = array('index');

	function __construct() {
		parent::__construct();
		// $this->directory = 'master/';
		$this->name = 'welcome'; // default folder view
		$this->load->model(array('InfoBedModel'));
		$this->load->library(array('curl','pagination'));
		$this->perPage = 1;
	}

	public function index()
	{
		$this->title = "Aplikasi Support - Antrian Bersuara";
		$this->render('welcome_message');
	}

	function page()
	{
		$data_bed = $this->InfoBedModel->info_bed_today(); // exit(dump($data_bed));
		$this->set('data',$data_bed);
		$this->render('page');
	}

	function data_bed()
	{
		$data_bed = $this->InfoBedModel->info_bed_today(); // exit(dump($data_bed));
		header('Content-Type: application/json; charset=utf-8' );
		echo json_encode($data_bed);
		// $data = array(
		// 	'data' => $data_bed
		// );
		// $this->load->view('welcome/page',$data);
	}

	function pesan_error()
	{
		$this->render('pesan_error');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */