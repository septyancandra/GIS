<?php
class Template {
	protected $_ci;

	function __construct()
	{
		$this->_ci =&get_instance();
	}

	function display($template,$data=null)
	{
		if(!$this->is_ajax())
		{
		$data['_content']=$this->_ci->load->view($template,$data, true);
		$data['_header']=$this->_ci->load->view('template/header',$data, true);		
		$data['_sidebar']=$this->_ci->load->view('template/sidebar',$data, true);
		$this->_ci->load->view('/adminlte245.php',$data);
		}
		else
		{
			$this->_ci->load->view($template,$data);
		}
	}

	function is_ajax()
	{
		return (
			$this->_ci->input->server('HTTP_X_REQUESTED_WITH')&&
			($this->_ci->input->server('HTTP_X_REQUESTED_WITH')=='XMLHttpRequest'));
	}
}