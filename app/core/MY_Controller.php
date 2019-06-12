<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public $savedContent=array();
	public function render()
	{
		$args = func_get_args();
		return call_user_func_array(array($this->load, 'view'), $args);
	}
	public function beginContent()
	{
		ob_start();
		$level = ob_get_level();
		$this->savedContent[$level] = func_get_args();
		return null;
	}
	public function endContent()
	{
		$level = ob_get_level();
		$content = ob_get_clean();
		$config = $this->savedContent[$level];
		$data['content'] = $content;
		return call_user_func_array(array($this, 'render'),$config);
	}
}
