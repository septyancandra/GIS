<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('ambildata');
	}

	public function index() {
		/*$data['web_title'] = $this->ambildata->ambildata('settings')->row()->web_title;
		$data['web_description'] = $this->ambildata->ambildata('settings')->row()->web_description;

		$data['map_zoom'] = $this->ambildata->ambildata('settings')->row()->map_zoom;*/
		$data['query_maps'] = $this->ambildata->querymap()->result();

		/*$data['a'] = '';
		$data['b'] = 'active';
		*/
		$this->load->view('v_maps',$data);
	}
}
