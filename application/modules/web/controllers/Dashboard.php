<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('ambildata');
		$this->load->model('M_pmi','cobatabel');				
		if(!$this->session->userdata('islogin')){ 
           redirect('portal/log');
        }	
    }

	public function index()	{	
		$data['query_maps'] = $this->ambildata->querymap()->result();

		//$data['gabungan_fix'] = $this->m_data->tampil_data()->result();
		//$this->load->view('v_dashboard',$data);
		$this->template->display('v_dashboard',$data);
 
	}

	
/*public function ajax_add()
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
    }*/

        
        function tabel($rtpo){
        
        

        /*================================ CLUSTER =======================================================*/    
        echo "
            <div class='box-body chart-responsive'>
            <div class='table-responsive'>
                <table class='table table-bordered table-hover table-striped'> 
                    <thead>
                        <tr>
                            <th style=' text-align:center;' BGCOLOR='#0000CD'><center><font color='#F8F8FF';>NO</center></font></th>
                            <th style=' text-align:center;' BGCOLOR='#0000CD'><center><font color='#F8F8FF';>SITEID</center></font></th>
                            <th style=' text-align:center;' BGCOLOR='#0000CD'><center><font color='#F8F8FF';>SITE NAME</center></font></th>
                            <th style=' text-align:center;' BGCOLOR='#0000CD'><center><font color='#F8F8FF';>CELL NAME</center></font></th>
                            <th style=' text-align:center;' BGCOLOR='#0000CD'><center><font color='#F8F8FF';>Average_User</center></font></th>
                            <th style=' text-align:center;' BGCOLOR='#0000CD'><center><font color='#F8F8FF';>Maximum_User</center></font></th>
                            <th style=' text-align:center;' BGCOLOR='#0000CD'><center><font color='#F8F8FF';>Downlink_Traffic (GB)</center></font></th>
                            <th style=' text-align:center;' BGCOLOR='#0000CD'><center><font color='#F8F8FF';>Uplink_Traffic (GB)</center></font></th>
                        </tr>
                    </thead>
                <tbody>";
        
        ///$this->db->query("set @tgl:=(select max(tgl) from dbdump.d4g_kpi)");        
        

        $query=" select u.SITEID,u.SITENAME,u.CELLNAME,i.Average_User_Number,i.Maximum_User_Number,i.Uplink_Traffic_Volume_OK,i.Downlink_Traffic_Volume_OK,u.POI_NAME FROM celllist_poi AS u INNER JOIN d4g_kpi AS i on u.SITEID=i.siteid 
        WHERE u.TYPE_BAND='4G' AND u.BAND='L2100' AND i.TGL='2020-01-01' AND u.POI_NAME='SIMPANG 5 SEMARANG'  AND u.SITEID='$rtpo';
                    ";  

        //echo $qbranch;
        $sql = $this->db->query($query);
        $no=1;
        foreach ($sql->result_array() as $row){ 
                 if ($no<=100){
                $no=$no;                
            } else {
                $no='';
            }
                  echo "<tr> 
                            <th><p align='center'>$no<p></th>
                            <th><p align='left'>$row[SITEID]<p></th>
                            <th><p align='left'>$row[SITENAME]<p></th>
                            <th><p align='left'>$row[CELLNAME]<p></th>
                            <th>$row[Average_User_Number]</th>
                            <th>$row[Maximum_User_Number]</th>
                              <th>$row[Downlink_Traffic_Volume_OK]</th>
                                <th>$row[Uplink_Traffic_Volume_OK]</th>
                             ";
                    
                    echo " </tr>"; 
                    $no++;
            }

                echo "
                </tbody>    
            </table>
        ";
        echo "</div>";
    }           

}



