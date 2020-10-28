<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mining extends MY_Controller {
	
	function __construct(){
        parent::__construct();				
		if(!$this->session->userdata('islogin')){ 
           redirect('portal/log');
        }			
    }

	public function index()	{		
		$this->template->display('v_mining');
	}		
	
	function first(){
		$this->entropy('first',null);
	}
	
	function second($param){
		$this->entropy('second',$param);
	}
	
	function third($param){
		$this->entropy('third',$param);
	}
	
	function fourth($param){
		$this->entropy('fourth',$param);
	}
	
	function entropy($tahap,$param){	
		$action = $_GET['action'];						
		$kempat = $_GET['kempat'];				
		
		switch(urldecode($kempat)){
			case 'Average': $whr4=" and aksi_average='Alfa' "; break;				
			case 'Maximum': $whr4=" and aksi_maximum='Lebih' "; break;
			case 'Uplink': $whr4=" and aksi_uplink='Yes' "; break;
			case 'Downlink': $whr4=" and aksi_downlink='Red' "; break;
			default: $whr4="";
		}
		
		switch(urldecode($action)){
			case 'Average': $whrad=" and aksi_average='Alfa' $whr4 "; break;				
			case 'Maximum': $whrad=" and aksi_maximum='Lebih' $whr4 "; break;
			case 'Uplink': $whrad=" and aksi_uplink='Yes' $whr4 "; break;
			case 'Downlink': $whrad=" and aksi_downlink='Red' $whr4 "; break;
			default: $whrad="";
		}
		
		switch(urldecode($param)){
			case 'Average': $whr=" where aksi_average='Alfa' $whrad "; break;				
			case 'Maximum': $whr=" where aksi_maximum='Lebih' $whrad "; break;
			case 'Uplink': $whr=" where aksi_uplink='Yes' $whrad "; break;
			case 'Downlink': $whr=" where aksi_downlink='Red' $whrad "; break;
			default: $whr="";
		}
		
		$qtotal="select
				'Total' grup,'Total' param,count(*) total,
				count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end) tidak_boleh,
				count(case when status_kelayakan='Boleh' THEN status_kelayakan end) boleh,
				((-(count(case when status_kelayakan='Boleh' THEN status_kelayakan end)/(count(*)))) 
				* (log2 ((count(case when status_kelayakan='Boleh' THEN status_kelayakan end))/(count(*))))) 
				+ ((-((count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end))/(count(*)))) * (log2 ((count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end))/(count(*))))) entropy
				from cobatabel $whr";
		$qusia="union all
				select
				'Average',aksi_average param,count(*) total,
				count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end) tidak_boleh,
				count(case when status_kelayakan='Boleh' THEN status_kelayakan end) boleh,
				((-(count(case when status_kelayakan='Boleh' THEN status_kelayakan end)/(count(*)))) 
				* (log2 ((count(case when status_kelayakan='Boleh' THEN status_kelayakan end))/(count(*))))) 
				+ ((-((count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end))/(count(*)))) * (log2 ((count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end))/(count(*))))) entropy
				from cobatabel $whr
				GROUP BY aksi_average";
		$qbb="	union all
				SELECT
				'Maximum',aksi_maximum param,count(*) total,
				count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end) tidak_boleh,
				count(case when status_kelayakan='Boleh' THEN status_kelayakan end) boleh,
				((-(count(case when status_kelayakan='Boleh' THEN status_kelayakan end)/(count(*)))) 
				* (log2 ((count(case when status_kelayakan='Boleh' THEN status_kelayakan end))/(count(*))))) 
				+ ((-((count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end))/(count(*)))) * (log2 ((count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end))/(count(*))))) entropy
				from cobatabel $whr
				GROUP BY aksi_maximum";
		$qhb="	union all
				SELECT
				'Uplink',aksi_uplink param,count(*) total,
				count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end) tidak_boleh,
				count(case when status_kelayakan='Boleh' THEN status_kelayakan end) boleh,
				((-(count(case when status_kelayakan='Boleh' THEN status_kelayakan end)/(count(*)))) 
				* (log2 ((count(case when status_kelayakan='Boleh' THEN status_kelayakan end))/(count(*))))) 
				+ ((-((count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end))/(count(*)))) * (log2 ((count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end))/(count(*))))) entropy
				from cobatabel $whr
				GROUP BY aksi_uplink";
		$qsis="	union all
				SELECT
				'Downlink',aksi_downlink param,count(*) total,
				count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end) tidak_boleh,
				count(case when status_kelayakan='Boleh' THEN status_kelayakan end) boleh,((-(count(case when status_kelayakan='Boleh' THEN status_kelayakan end)/(count(*)))) 
				* (log2 ((count(case when status_kelayakan='Boleh' THEN status_kelayakan end))/(count(*))))) 
				+ ((-((count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end))/(count(*)))) * (log2 ((count(case when status_kelayakan='Tidak Boleh' THEN status_kelayakan end))/(count(*))))) entropy
				from cobatabel $whr
				GROUP BY aksi_downlink";
		$qentropy="$qtotal $qusia $qbb $qhb $qsis";
		
		
		
		$query="select t1.*,ifnull(entropy,0) entropys,(SELECT COUNT(t2.grup) FROM ($qentropy) t2 WHERE t2.grup=t1.grup) jumlah from ($qentropy) t1";		
		
		$data=$this->db->query($query)->result_array();
		$datatot=$this->db->query($query)->row(0);
		//var_dump($datatot);
		$no = 1;
		$jum = 1;
		$gain = 1;
		$setjum=1;
		$total_gain = $data[0]["total"];
		$total_entropys = $data[0]["entropys"];
		//jenis_kelamin			
		
		$panjang=count($data);
		$nop=0;
		foreach ($data as $dt){	
			if($setjum <= 1) {		
				if ($dt['grup']<>"Total"){
					$grupgain=$dt['grup'];
					//echo $dt['grup']."|".$dt['jumlah'].'</br>';	
					for ($x = 1; $x <= $dt['jumlah']; $x++) {
						$n=$x+$nop;
						switch($x){
							case 1: $a=$n; break;
							case 2: $b=$n; break;
							case 3: $c=$n; break;
							case 4: $d=$n; break;
						}						
					} 
					//echo $a."|".$b."</br>";
					switch ($dt['jumlah']){
						case 2: $hsl[$grupgain]=$this->setC45_2($total_gain,$total_entropys,$data[$a]['total'],$data[$a]['entropys'],$data[$b]['total'],$data[$b]['entropys']);	break;
						case 3: $hsl[$grupgain]=$this->setC45_3($total_gain,$total_entropys,$data[$a]['total'],$data[$a]['entropys'],$data[$b]['total'],$data[$b]['entropys'],$data[$c]['total'],$data[$c]['entropys']);	break;
						case 4: $hsl[$grupgain]=$this->setC45_4($total_gain,$total_entropys,$data[$a]['total'],$data[$a]['entropys'],$data[$b]['total'],$data[$b]['entropys'],$data[$c]['total'],$data[$c]['entropys'],$data[$d]['total'],$data[$d]['entropys']);
					}				
					$nop=$n;
				}	
				
				$setjum = $dt['jumlah'];       				                    
			} else {
				$setjum = $setjum - 1;
			}
		}
		
		//echo "|";
		//var_dump($hsl);
		$max_x = max( array_column( $hsl, 'gain_ratio' ) );
		//echo $max_x."|";				
		foreach ($data as $dt){
			//echo $param."||".$dt['param'];
			if ($param<>$dt['grup']){
				if (($action<>$dt['grup'])){
					echo "<tr>";
					if($jum <= 1) {				
						echo '<td style=" text-align:center; vertical-align:middle; background-color: #ecf0f2;" rowspan="'.$dt['jumlah'].'">'.$dt['grup'].'</td>';  
						$jum = $dt['jumlah'];       				                    
					} else {
						$jum = $jum - 1;
					}			
					echo "<td style=' text-align:center; vertical-align:middle; background-color: #ecf0f2;'>".$dt['param'].'</td>';
					echo "<td style=' text-align:center; vertical-align:middle;'>".$dt['total'].'</td>';
					echo "<td style=' text-align:center; vertical-align:middle;'>".$dt['tidak_boleh'].'</td>';
					echo "<td style=' text-align:center; vertical-align:middle;'>".$dt['boleh'].'</td>';			
					echo "<td style=' text-align:center; vertical-align:middle;'>".$dt['entropys'].'</td>';
					if($gain <= 1) {				
						if ($no<>1){
							$swgrup=$dt['grup'];
							$gains=$hsl[$swgrup]['gain']; $split_info=$hsl[$swgrup]['split_ratio']; $gain_ratio=$hsl[$swgrup]['gain_ratio'];
							/* switch ($swgrup){
								case "Usia": $gains=$hsl[$swgrup]['gain']; $split_info=$hsl['usia']['split_ratio']; $gain_ratio=$hsl['usia']['gain_ratio']; break;
								case "Berat Badan": $gains=$hsl[$swgrup]['gain']; $split_info=$hsl['bb']['split_ratio']; $gain_ratio=$hsl['bb']['gain_ratio']; break;
								case "HB": $gains=$hsl['hb']['gain']; $split_info=$hsl['hb']['split_ratio']; $gain_ratio=$hsl['hb']['gain_ratio']; break;
								case "Sistolik": $gains=$hsl['sis']['gain']; $split_info=$hsl['sis']['split_ratio']; $gain_ratio=$hsl['sis']['gain_ratio']; break;
								case "Diastolik": $gains=$hsl['dis']['gain']; $split_info=$hsl['dis']['split_ratio']; $gain_ratio=$hsl['dis']['gain_ratio']; break;
								case "Jenis Kelamin": $gains=$hsl['jk']['gain']; $split_info=$hsl['jk']['split_ratio']; $gain_ratio=$hsl['jk']['gain_ratio']; break;
								case "Gol Darah": $gains=$hsl['gd']['gain']; $split_info=$hsl['gd']['split_ratio']; $gain_ratio=$hsl['gd']['gain_ratio']; break;						
								default: $gains=0; $split_info=0; $gain_ratio=0;
							} */
							if ($max_x==$gain_ratio){
								echo '<td style=" text-align:center; vertical-align:middle; background-color: yellow;" rowspan="'.$dt['jumlah'].'">'.abs($gains).'</td>';								
								echo '<td style=" text-align:center; vertical-align:middle; background-color: yellow;" rowspan="'.$dt['jumlah'].'">'.$split_info.'</td>';								
								echo '<td style=" text-align:center; vertical-align:middle; background-color: yellow;" rowspan="'.$dt['jumlah'].'">'.$gain_ratio.'</td>';						
								$lanjut=$swgrup;
							} else {
								echo '<td style=" text-align:center; vertical-align:middle;" rowspan="'.$dt['jumlah'].'">'.abs($gains).'</td>';								
								echo '<td style=" text-align:center; vertical-align:middle;" rowspan="'.$dt['jumlah'].'">'.$split_info.'</td>';								
								echo '<td style=" text-align:center; vertical-align:middle;" rowspan="'.$dt['jumlah'].'">'.$gain_ratio.'</td>';
							}
							
						}
						$gain = $dt['jumlah'];      
						$no++;
					} else {
						$gain = $gain - 1;
					}
					echo "</tr>";
				}
			}
		}
		echo "|".$lanjut;
		
	}
	
	function setC45_2 ($total_gain,$total_entropys,$kasus1,$ent1,$kasus2,$ent2){
		$q=$this->db->query("
				SELECT 
				-- total
				@kasus_t := $total_gain AS kasus,			
				@entropyt := $total_entropys AS entropy_total,
				-- atribut kasus 1 contoh kecil, pria
				@kasus_1 := $kasus1 AS kasus1,			
				@entropy1 := $ent1  AS entropy_1,
				-- atribut kasus 2 contoh besar, wanita
				@kasus_2 := $kasus2 AS kasus2,			
				@entropy2 := $ent2  AS entropy_2,		
				-- cari gain
				(
					SELECT -(IFNULL((entropy_total-((kasus1/kasus) * entropy_1)-((kasus2/kasus) * entropy_2)),0))
				) AS result_gain,

				-- cari split info
				(
					SELECT -(IFNULL(((kasus1/kasus)*(LOG2(kasus1/kasus)) + (kasus2/kasus)*(LOG2(kasus2/kasus))),0))
				) AS result_split_info,

				-- cari gain ratio
				(
					SELECT -(IFNULL((result_gain/result_split_info),0))
				) AS result_gain_ratio
		")->result_array();			
		echo "SELECT 
				-- total
				@kasus_t := $total_gain AS kasus,			
				@entropyt := $total_entropys AS entropy_total,
				-- atribut kasus 1 contoh kecil, pria
				@kasus_1 := $kasus1 AS kasus1,			
				@entropy1 := $ent1  AS entropy_1,
				-- atribut kasus 2 contoh besar, wanita
				@kasus_2 := $kasus2 AS kasus2,			
				@entropy2 := $ent2  AS entropy_2,		
				-- cari gain
				(
					SELECT -(IFNULL((entropy_total-((kasus1/kasus) * entropy_1)-((kasus2/kasus) * entropy_2)),0))
				) AS result_gain,

				-- cari split info
				(
					SELECT -(IFNULL(((kasus1/kasus)*(LOG2(kasus1/kasus)) + (kasus2/kasus)*(LOG2(kasus2/kasus))),0))
				) AS result_split_info,

				-- cari gain ratio
				(
					SELECT -(IFNULL((result_gain/result_split_info),0))
				) AS result_gain_ratio";
		//var_dump($q);
		return array(					
					'gain' => $q[0]['result_gain'],
					'split_ratio' => $q[0]['result_split_info'],
					'gain_ratio' => $q[0]['result_gain_ratio']										
				);
	}
	
	function setC45_3 ($total_gain,$total_entropys,$kasus1,$ent1,$kasus2,$ent2,$kasus3,$ent3){
		$q=$this->db->query("
				SELECT 
				-- total
				@kasus_t := $total_gain AS kasus,			
				@entropyt := $total_entropys AS entropy_total,
				-- atribut kasus 1 
				@kasus_1 := $kasus1 AS kasus1,			
				@entropy1 := $ent1  AS entropy_1,
				-- atribut kasus 2 
				@kasus_2 := $kasus2 AS kasus2,			
				@entropy2 := $ent2  AS entropy_2,
				-- atribut kasus 3
				@kasus_3 := $kasus3 AS kasus3,			
				@entropy3 := $ent3  AS entropy_3,		
				-- cari gain
				( 
					SELECT -(IFNULL((entropy_total-((kasus1/kasus) * entropy_1)-((kasus2/kasus) * entropy_2)-((kasus3/kasus) * entropy_3)),0))
				) AS result_gain,

				-- cari split info
				(
					SELECT -(IFNULL(((kasus1/kasus)*(LOG2(kasus1/kasus)) + (kasus2/kasus)*(LOG2(kasus2/kasus)) + (kasus3/kasus)*(LOG2(kasus3/kasus))),0))
				) AS result_split_info,

				-- cari gain ratio
				(
					SELECT -(IFNULL((result_gain/result_split_info),0))
				) AS result_gain_ratio
		")->result_array();			
		//var_dump($q);
		return array(					
					'gain' => $q[0]['result_gain'],
					'split_ratio' => $q[0]['result_split_info'],
					'gain_ratio' => $q[0]['result_gain_ratio']																			
				);
	}
	
	function setC45_4 ($total_gain,$total_entropys,$kasus1,$ent1,$kasus2,$ent2,$kasus3,$ent3,$kasus4,$ent4){
		$q=$this->db->query("
				SELECT 
				-- total
				@kasus_t := $total_gain AS kasus,			
				@entropyt := $total_entropys AS entropy_total,
				-- atribut kasus 1 
				@kasus_1 := $kasus1 AS kasus1,			
				@entropy1 := $ent1  AS entropy_1,
				-- atribut kasus 2 
				@kasus_2 := $kasus2 AS kasus2,			
				@entropy2 := $ent2  AS entropy_2,
				-- atribut kasus 3
				@kasus_3 := $kasus3 AS kasus3,			
				@entropy3 := $ent3  AS entropy_3,		
				-- atribut kasus 3
				@kasus_4 := $kasus4 AS kasus4,			
				@entropy4 := $ent4  AS entropy_4,		
				-- cari gain
				(
					SELECT -(IFNULL((entropy_total-((kasus1/kasus) * entropy_1)-((kasus2/kasus) * entropy_2)-((kasus3/kasus) * entropy_3)-((kasus4/kasus) * entropy_4)),0))
				) AS result_gain,

				-- cari split info
				(
					SELECT -(IFNULL(((kasus1/kasus)*(LOG2(kasus1/kasus)) + (kasus2/kasus)*(LOG2(kasus2/kasus)) + (kasus3/kasus)*(LOG2(kasus3/kasus))+ (kasus4/kasus)*(LOG2(kasus4/kasus))),0))
				) AS result_split_info,

				-- cari gain ratio
				(
					SELECT -(IFNULL((result_gain/result_split_info),0))
				) AS result_gain_ratio
		")->result_array();		
		//var_dump($q);
		return array(					
					'gain' => $q[0]['result_gain'],
					'split_ratio' => $q[0]['result_split_info'],
					'gain_ratio' => $q[0]['result_gain_ratio']																			
				);
	}
}

