<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
	
	function __construct(){
        parent::__construct();		
		$this->load->model('M_user','user');
		if(!$this->session->userdata('islogin')){ 
           redirect('portal/log');
        }			
    }

	public function index()	{		
		$this->template->display('v_user');
	}		
	
	public function ajax_list()
    {
        $list = $this->user->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $no;            
            $row[] = $user->nama;
            $row[] = $user->username;            
 
            //add html for action
            $row[] = '
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Preview" onclick="view_users('."'".$user->id."'".')"><i class="glyphicon glyphicon-list-alt"></i>View</a>					
					<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_users('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i>Edit</a>
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_users('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i>Hapus</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->user->count_all(),
                        "recordsFiltered" => $this->user->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->user->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $data = array(                
                'nama' => $this->input->post('nama'),
                'password' => ($this->input->post('password')),
                'username' => $this->input->post('username'),                
            );
        $insert = $this->user->save($data);		
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $data = array(
                'nama' => $this->input->post('nama'),
                'password' => ($this->input->post('password')),
                'username' => $this->input->post('username'),
            );
        $this->user->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->user->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
	
}

