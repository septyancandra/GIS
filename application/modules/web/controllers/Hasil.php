<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hasil extends MY_Controller {
	
	function __construct(){
        parent::__construct();		
		$this->load->model('M_pmi','cobatabel');
		/* if(!$this->session->userdata('islogin')){ 
           redirect('portal/log');
        } */			
    }

	public function index()	{		
		$this->template->display('v_hasil');
	}		
		
	function mining_first(){
		echo "
				<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='1'>Total</td>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Total</td>
					<td style=' text-align:center; vertical-align:middle;'>1081</td>
					<td style=' text-align:center; vertical-align:middle;'>811</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0.8109113685709428</td>
				</tr>
				<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='2'>Average</td>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Alfa</td>
					<td style=' text-align:center; vertical-align:middle;'>430</td>
					<td style=' text-align:center; vertical-align:middle;'>160</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0.9522656260148713</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.43211930688311</td>
					<td style='text-align:center; vertical-align:middle;' rowspan='2'>0.9696370564294161</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.4456505699919716</td>
				</tr>
				<tr>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Omega</td>
					<td style=' text-align:center; vertical-align:middle;'>651</td>
					<td style=' text-align:center; vertical-align:middle;'>651</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
				</tr>
				<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='2'>Maximum</td>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Kurang</td>
					<td style=' text-align:center; vertical-align:middle;'>680</td>
					<td style=' text-align:center; vertical-align:middle;'>680</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle; background-color: yellow;' rowspan='2'>0.47278722039727</td>
					<td style=' text-align:center; vertical-align:middle; background-color: yellow;' rowspan='2'>0.9514008862493213</td>
					<td style=' text-align:center; vertical-align:middle; background-color: yellow;' rowspan='2'>0.4969379650896972</td>
				</tr>
				<tr>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Lebih</td>
					<td style=' text-align:center; vertical-align:middle;'>401</td>
					<td style=' text-align:center; vertical-align:middle;'>131</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0.9115017571834846</td>
				</tr>
					<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='2'>Uplink</td>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>No</td>
					<td style=' text-align:center; vertical-align:middle;'>678</td>
					<td style=' text-align:center; vertical-align:middle;'>678</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.46981465799595</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.9527999928860813</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.493088435667231</td>
				</tr>
				<tr>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Yes</td>
					<td style=' text-align:center; vertical-align:middle;'>403</td>
					<td style=' text-align:center; vertical-align:middle;'>133</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0.9149517229557302</td>
				</tr>
				<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='2'>Downlink</td>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Red</td>
					<td style=' text-align:center; vertical-align:middle;'>414</td>
					<td style=' text-align:center; vertical-align:middle;'>144</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0.9321115675752378</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.45393247072745</td>
					<td style='text-align:center; vertical-align:middle;' rowspan='2'>0.9601186631102294</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.4727878835903171</td>
				</tr>
				<tr>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Save</td>
					<td style=' text-align:center; vertical-align:middle;'>667</td>
					<td style=' text-align:center; vertical-align:middle;'>667</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
				</tr>



			
				
			";
	}
	
	function mining_second(){
		echo "
				<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='1'>Total</td>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Total</td>
					<td style=' text-align:center; vertical-align:middle;'>401</td>
					<td style=' text-align:center; vertical-align:middle;'>131</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0.9115017571834846</td>
				</tr>
				<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='2'>Average</td>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Alfa</td>
					<td style=' text-align:center; vertical-align:middle;'>313</td>
					<td style=' text-align:center; vertical-align:middle;'>43</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0.577336432088359</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.4608625972225</td>
					<td style='text-align:center; vertical-align:middle;' rowspan='2'>0.7591644575920556</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.6070655608460397</td>
				</tr>
				<tr>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Omega</td>
					<td style=' text-align:center; vertical-align:middle;'>88</td>
					<td style=' text-align:center; vertical-align:middle;'>88</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
				</tr>
				</tr>
					<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='2'>Uplink</td>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>No</td>
					<td style=' text-align:center; vertical-align:middle;'>105</td>
					<td style=' text-align:center; vertical-align:middle;'>105</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.594677438428</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.8295183379307163</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.7168948668590717</td>
				</tr>
				<tr>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Yes</td>
					<td style=' text-align:center; vertical-align:middle;'>296</td>
					<td style=' text-align:center; vertical-align:middle;'>26</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0.4292113239905816</td>
				</tr>
				<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='2'>Downlink</td>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Red</td>
					<td style=' text-align:center; vertical-align:middle;'>292</td>
					<td style=' text-align:center; vertical-align:middle;'>22</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0.3855515889440549</td>
					<td style=' text-align:center; vertical-align:middle; background-color: yellow;' rowspan='2'>0.63075097425887</td>
					<td style=' text-align:center; vertical-align:middle; background-color: yellow;' rowspan='2'>0.8440647538886913</td>
					<td style=' text-align:center; vertical-align:middle; background-color: yellow;' rowspan='2'>0.7472779444384248</td>
				</tr>
				<tr>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Save</td>
					<td style=' text-align:center; vertical-align:middle;'>109</td>
					<td style=' text-align:center; vertical-align:middle;'>109</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
				</tr>
			";
	}
	
	function mining_third(){ 
		echo "
				<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='1'>Total</td>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Total</td>
					<td style=' text-align:center; vertical-align:middle;'>292</td>
					<td style=' text-align:center; vertical-align:middle;'>22</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0.3855515889440549</td>
				</tr>
				<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='2'>Average</td>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Alfa</td>
					<td style=' text-align:center; vertical-align:middle;'>281</td>
					<td style=' text-align:center; vertical-align:middle;'>11</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0.23836240835744565</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.15616858641028</td>
					<td style='text-align:center; vertical-align:middle;' rowspan='2'>0.23151105004851552</td>
					<td style=' text-align:center; vertical-align:middle;' rowspan='2'>0.6745621272831556</td>
				</tr>
				<tr>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Omega</td>
					<td style=' text-align:center; vertical-align:middle;'>11</td>
					<td style=' text-align:center; vertical-align:middle;'>11</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
				</tr>
				</tr>
					<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='2'>Uplink</td>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>No</td>
					<td style=' text-align:center; vertical-align:middle;'>14</td>
					<td style=' text-align:center; vertical-align:middle;'>14</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle; background-color: yellow;' rowspan='2'>0.20635499036444</td>
					<td style=' text-align:center; vertical-align:middle; background-color: yellow;' rowspan='2'>0.27760336939715896</td>
					<td style=' text-align:center; vertical-align:middle; background-color: yellow;' rowspan='2'>0.7433446892685567</td>
				</tr>
				<tr>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Yes</td>
					<td style=' text-align:center; vertical-align:middle;'>278</td>
					<td style=' text-align:center; vertical-align:middle;'>8</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0.1882208878196347</td>
				</tr>
			";
	}
	
	function mining_fourth(){ 
		echo "
				<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='1'>Total</td>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Total</td>
					<td style=' text-align:center; vertical-align:middle;'>278</td>
					<td style=' text-align:center; vertical-align:middle;'>8</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0.3855515889440549</td>
				</tr>
				<tr>
					<td style='text-align:center; vertical-align:middle; background-color: #ecf0f2;' rowspan='2'>Average</td>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Alfa</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle;'>270</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle; background-color: yellow;' rowspan='2'>0.18822088781963</td>
					<td style=' text-align:center; vertical-align:middle; background-color: yellow;' rowspan='2'>0.1882208878196347</td>
					<td style=' text-align:center; vertical-align:middle; background-color: yellow;' rowspan='2'>1</td>
				</tr>
				<tr>
					<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>Omega</td>
					<td style=' text-align:center; vertical-align:middle;'>8</td>
					<td style=' text-align:center; vertical-align:middle;'>8</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
					<td style=' text-align:center; vertical-align:middle;'>0</td>
				</tr>
			";
	}
		
	
}

