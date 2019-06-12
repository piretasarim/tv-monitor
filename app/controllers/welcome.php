<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	protected $allows = array('index');

	function __construct() {
		parent::__construct();

		$this->load->helper(array('url','form','string','text','security','html','debug'));
		$this->load->config('rest');
		$this->load->config('akses');

		// Load the rest client
		$this->load->spark('restclient/2.0.0');
		
		/* CONFIG DEFAULT DARI SERVICE */
		$config = array(
			'server' => $this->config->item('rest_monitor'),
			'http_auth'   => 'basic',
			'http_user'   => $this->config->item('http_user'),
			'http_pass'   => $this->config->item('http_pass'),
		);
		$this->rest->initialize($config);
	}

	// buat view data page 1
	function page()
	{
		$view = "welcome/page";
		$kueri = $this->rest->get('infobed_satu/format/json'); //exit(dump($data_bed));
		$bed['data'] = $kueri;
		// render
		show($view,$bed);
	}

	// buat ajax data 1
	function data_bed()
	{
		$kueri = $this->rest->get('infobed_satu/format/json'); //exit(dump($kueri));
		header('Content-Type: application/json; charset=utf-8' );
		echo json_encode($kueri);
	}


	// buat view data page 2
	function page_dua()
	{
		$view = "welcome/page_2";
		$kueri = $this->rest->get('infobed_dua/format/json'); //exit(dump($kueri));
		$kuepi = $this->rest->get('infobed_pie_chart/format/json'); //exit(dump($kuepi));
		$bed['data'] = $kueri;
		$bed['kueh'] = $kuepi;
		// render
		show_2($view,$bed);
	}

	// halaman tv monitor
	function page_tiga()
	{
		$view = "welcome/page_3";
		$kueri = $this->rest->get('infobed_dua/format/json'); //exit(dump($kueri));
		$kuepi = $this->rest->get('infobed_pie_chart/format/json'); //exit(dump($kuepi));
		$bed['data'] = $kueri;
		$bed['kueh'] = $kuepi;
		// render
		show_2($view,$bed);
	}

	// buat ajax data 2
	function data_bed_dua()
	{
		$kueri = $this->rest->get('infobed_dua/format/json'); //exit(dump($kueri));
		header('Content-Type: application/json; charset=utf-8' );
		echo json_encode($kueri);
	}

	function data_pie_chart()
	{
		$kueri = $this->rest->get('infobed_pie_chart/format/json'); //exit(dump($kueri));
		header('Content-Type: application/json; charset=utf-8' );
		echo json_encode($data_bed);
	}

	function pesan_error()
	{
		$this->render('pesan_error');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */