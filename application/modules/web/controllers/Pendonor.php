<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendonor extends MY_Controller {
	
	function __construct(){
        parent::__construct();		
		$this->load->model('M_pmi','cobatabel');
		/* if(!$this->session->userdata('islogin')){ 
           redirect('portal/log');
        } */			
    }

	public function index()	{		
		$this->template->display('v_pendonor');
	}		
	
	public function ajax_list()
    {
        $list = $this->cobatabel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $cobatabel) {
            $no++;
            $row = array();
            $row[] = $no;            
            $row[] = $cobatabel->id;
            $row[] = $cobatabel->SITEID;
            $row[] = $cobatabel->SITENAME;
            $row[] = $cobatabel->Average_User_Number;
			$row[] = $cobatabel->Maximum_User_Number;
            $row[] = $cobatabel->Uplink_Traffic_Volume_OK;
            $row[] = $cobatabel->Downlink_Traffic_Volume_OK;
            $row[] = $cobatabel->status_kelayakan;
 
            //add html for action
            $row[] = '
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Preview" onclick="view_pendonor('."'".$cobatabel->id."'".')"><i class="glyphicon glyphicon-list-alt"></i></a>
					<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Print" onclick="print_pendonor('."'".$cobatabel->id."'".')"><i class="glyphicon glyphicon-print"></i></a>
					<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_pendonor('."'".$cobatabel->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pendonor('."'".$cobatabel->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->cobatabel->count_all(),
                        "recordsFiltered" => $this->cobatabel->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->cobatabel->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $data = array(
                'SITEID' => $this->input->post('SITEID'),
                'SITENAME' => $this->input->post('SITENAME'),
                'Average_User_Number' => $this->input->post('Average_User_Number'),
                'Maximum_User_Number' => $this->input->post('Maximum_User_Number'),
                'Uplink_Traffic_Volume_OK' => $this->input->post('Uplink_Traffic_Volume_OK'),
                'Downlink_Traffic_Volume_OK' => $this->input->post('Downlink_Traffic_Volume_OK'),
                'aksi_average' => $this->input->post('aksi_average'),
                'aksi_maximum' => $this->input->post('aksi_maximum'),
                'aksi_uplink' => $this->input->post('aksi_uplink'),
                'aksi_downlink' => $this->input->post('aksi_downlink'),
                'status_kelayakan' => $this->input->post('kelayakan')				
            );
        $insert = $this->cobatabel->save($data);		
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $data = array(
                'SITEID' => $this->input->post('SITEID'),
                'SITENAME' => $this->input->post('SITENAME'),
                'Average_User_Number' => $this->input->post('Average_User_Number'),
                'Maximum_User_Number' => $this->input->post('Maximum_User_Number'),
                'Uplink_Traffic_Volume_OK' => $this->input->post('Uplink_Traffic_Volume_OK'),
                'Downlink_Traffic_Volume_OK' => $this->input->post('Downlink_Traffic_Volume_OK'),
                'aksi_average' => $this->input->post('aksi_average'),
                'aksi_maximum' => $this->input->post('aksi_maximum'),
                'aksi_uplink' => $this->input->post('aksi_uplink'),
                'aksi_downlink' => $this->input->post('aksi_downlink'),
                'status_kelayakan' => $this->input->post('kelayakan')               
            );
        $this->cobatabel->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->cobatabel->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
	
}

