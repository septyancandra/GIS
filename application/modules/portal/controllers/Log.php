<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log extends MY_Controller {
	
	function __construct() {
		parent::__construct();			
    }
	
	public function index()
	{		
		// Include the google api php libraries		
		$this->load->view('portal/v_login');
	}
	
	//untuk login dengan akun & pwd biasa
	function in(){
		$usr=$this->input->post('username');
		$pwd=$this->input->post('password');				
		$cek = $this->db->query("select * from user where username='$usr' and password='$pwd'");
		if ($cek->num_rows()>0){
			$userProfile=$cek->row_array();			
			$userData['username'] = $userProfile['username'];
			$userData['nama'] = $userProfile['nama'];			
			// Insert or update user data			
			$data['userData'] = $userData;
			$this->session->set_userdata('islogin','yes');
			$this->session->set_userdata('userData',$userData);			
			echo base_url('web/dashboard');
			//redirect ('web/dashboard');
		} else {
			echo 0;
			//redirect('portal/log');
		}
	}
	
	//untuk logout
	public function out(){
		$this->session->unset_userdata('token');
		$this->session->unset_userdata('islogin');
		$this->session->unset_userdata('userData');
        $this->session->sess_destroy();
		redirect('portal/log');
	}
}