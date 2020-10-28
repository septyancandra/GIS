<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Septyangisci extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('ambildata');
	}

	public function index() {
	/*	$data['web_title'] = $this->ambildata->ambildata('settings')->row()->web_title;
		$data['web_description'] = $this->ambildata->ambildata('settings')->row()->web_description;
		$data['queryindex1'] = $this->ambildata->queryindex1()->num_rows();
		$data['queryindex2'] = $this->ambildata->queryindex2()->num_rows();
		$data['a'] = 'active';
		$data['b'] = '';*/
		$this->load->view('user/index',$data);
	}


	public function maps() {
		/*$data['web_title'] = $this->ambildata->ambildata('settings')->row()->web_title;
		$data['web_description'] = $this->ambildata->ambildata('settings')->row()->web_description;

		$data['map_zoom'] = $this->ambildata->ambildata('settings')->row()->map_zoom;*/
		$data['query_maps'] = $this->ambildata->querymap()->result();
		/*
		$data['a'] = '';
		$data['b'] = 'active';*/
		
		$this->load->view('v_dashboard',$data);
	}
}
