 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /* andhika 
  12-26-2019 comparasi data vlr dan payload region */
class Dynamic_chart extends MY_Controller {
  
  function __construct(){
        parent::__construct();        
    /* if(!$this->session->userdata('islogin')){
           redirect('portal/log'); 
        }  */ 
    }
  
  public function index()
  {
    $data['title']='Productivity VLR';
    $this->template->display('dynamic_chart',$data);
  }

  public function query_regiondod() 
    {
    
        $case=array('Average_2019','Average_2020','Average_Delta');        
        $case_alias=$case;
    $case1=array('line','line','column');        
        $case2=array(0,1,0);
        $query = "SELECT DATE_FORMAT(TGL, '%d-%m') as TGL,Average_2019,Average_2020,Average_Delta FROM average_tabel;
          ";
        $sql  = $this->db->query($query);   

        //echo $query; 
        $result = array();
        $myVar = array();
        $j = 0;
        
        foreach ($sql->result_array() as $row) {

        //$result[] = $row;
            if($j == 0){
                $myVar1['name'] = "'".'TGL'."'"; //declare tanggal
        
                $i=0;
                foreach ($case as $name){
                   $myVar[$i]['name']=$name;                   
           $i++;
                }
        $i=0;
                foreach ($case1 as $name){
                   $myVar[$i]['type']=$name;
           $i++;
                }
        $i=0;
                foreach ($case2 as $name){
                   $myVar[$i]['yAxis']=$name;
           $i++;
                }            
            }                 
            
            $myVar1['data'][] = $row['TGL'];
            $i=0;     
            foreach ($case_alias as $name){
               if ($row[$name] == 0){
                   $myVar[$i]['data'][]=null;                   
               } else {
                   $myVar[$i]['data'][]=$row[$name]*1;           
               }                      
               $i++;
            }
      $j++;
        }

        array_push($result,$myVar1);    
        $i=0;
        foreach ($case as $name){
           array_push($result,$myVar[$i]);
           $i++;
        }

        $json['meta']=array('status'=>200,'message'=>'sukses di load');
    $json['result']=$result;            
    $this->output->set_content_type('application/json')->set_output(json_encode($json));    
    }

    public function query_regionvlr() 
    {
    
        $case=array('Downlink_2019','Downlink_2020','Downlink_Delta');        
        $case_alias=$case;
    $case1=array('line','line','column');        
        $case2=array(0,0,1);
        $query = "SELECT DATE_FORMAT(TGL, '%d-%m') as TGL,Downlink_2019,Downlink_2020,Downlink_Delta FROM average_tabel;
          ";
        $sql  = $this->db->query($query);   

        //echo $query; 
        $result = array();
        $myVar = array();
        $j = 0;
        
        foreach ($sql->result_array() as $row) {

        //$result[] = $row;
            if($j == 0){
                $myVar1['name'] = "'".'TGL'."'"; //declare tanggal
        
                $i=0;
                foreach ($case as $name){
                   $myVar[$i]['name']=$name;                   
           $i++;
                }
        $i=0;
                foreach ($case1 as $name){
                   $myVar[$i]['type']=$name;
           $i++;
                }
        $i=0;
                foreach ($case2 as $name){
                   $myVar[$i]['yAxis']=$name;
           $i++;
                }            
            }                 
            
            $myVar1['data'][] = $row['TGL'];
            $i=0;     
            foreach ($case_alias as $name){
               if ($row[$name] == 0){
                   $myVar[$i]['data'][]=null;                   
               } else {
                   $myVar[$i]['data'][]=$row[$name]*1;           
               }                      
               $i++;
            }
      $j++;
        }

        array_push($result,$myVar1);    
        $i=0;
        foreach ($case as $name){
           array_push($result,$myVar[$i]);
           $i++;
        }

        $json['meta']=array('status'=>200,'message'=>'sukses di load');
    $json['result']=$result;            
    $this->output->set_content_type('application/json')->set_output(json_encode($json));    
    }
  
    public function query_vlrpy() 
    {
    
        $case=array('Uplink_2019','Uplink_2020');        
        $case_alias=$case;
    $case1=array('line','line');        
        $case2=array(1,0);
        $query = "SELECT DATE_FORMAT(TGL, '%d-%m') as TGL,Uplink_2019,Uplink_2020 FROM average_tabel;
          ";
        $sql  = $this->db->query($query);   

        //echo $query; 
        $result = array();
        $myVar = array();
        $j = 0;
        
        foreach ($sql->result_array() as $row) {

        //$result[] = $row;
            if($j == 0){
                $myVar1['name'] = "'".'TGL'."'"; //declare tanggal
        
                $i=0;
                foreach ($case as $name){
                   $myVar[$i]['name']=$name;                   
           $i++;
                }
        $i=0;
                foreach ($case1 as $name){
                   $myVar[$i]['type']=$name;
           $i++;
                }
        $i=0;
                foreach ($case2 as $name){
                   $myVar[$i]['yAxis']=$name;
           $i++;
                }            
            }                 
            
            $myVar1['data'][] = $row['TGL'];
            $i=0;     
            foreach ($case_alias as $name){
               if ($row[$name] == 0){
                   $myVar[$i]['data'][]=null;                   
               } else {
                   $myVar[$i]['data'][]=$row[$name]*1;           
               }                      
               $i++;
            }
      $j++;
        }

        array_push($result,$myVar1);    
        $i=0;
        foreach ($case as $name){
           array_push($result,$myVar[$i]);
           $i++;
        }

        $json['meta']=array('status'=>200,'message'=>'sukses di load');
    $json['result']=$result;            
    $this->output->set_content_type('application/json')->set_output(json_encode($json));    
    }

}

