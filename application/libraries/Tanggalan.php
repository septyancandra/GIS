<?php
class Tanggalan {
	protected $_ci;
	public $now_b_7th_date;
	function __construct()
	{
		$this->_ci =&get_instance();
	}

	public function tanggal($now)
	{		
		$mydate = $now;
        $tgl = date('Y-m-d',strtotime($mydate . ' - 7 day')); //tgl kemaren di bulan lalu
        $tgl1 = date('Y-m-d',strtotime($mydate . ' - 1 month')); //tgl kemaren di bulan lalu
        $tgl2 = date('Y-m-d',strtotime($mydate . ' - 1 year')); //tgl kemaren di tahun kemaren
        $now_m_1st_date=date('Y-m-01',strtotime($mydate . ' - 0 day')); //tanggal pertama di bulan ini
        $prev_m_1st_date=date('Y-m-d',strtotime($mydate.' first day of last month'));//tgl kemaren di bulan lalu
        $prev_y_1st_date=date('Y-01-d',strtotime($mydate.' first day of this year'));//tgl kemaren di tahun lalu
		
		$now_b_1st_date=date('Y-m-d',strtotime($now . ' - 1 day'));// 2hari yg lalu
		$now_b_7th_date=date('Y-m-d',strtotime($now . ' - 6 day'));// seminggu yg lalu
		$week_b_1st_date=date('Y-m-d',strtotime($now_b_7th_date . ' - 1 day'));// minggu kemarin
		$week_b_7th_date=date('Y-m-d',strtotime($week_b_1st_date . ' - 6 day'));// dua minggu yg lalu

        $dsplastmonth=date('d',strtotime($prev_m_1st_date)).'-'.date('d',strtotime($mydate)).date('My',strtotime($prev_m_1st_date));//header 01-08Jan15
        $dspnowmonth=date('d',strtotime($now_m_1st_date)).'-'.date('d',strtotime($mydate)).date('My',strtotime($now_m_1st_date));//header 01-08Feb15
        $yearmonth = date('Y-m-d',strtotime($now_m_1st_date . ' - 1 year')); //tgl pertama bln ini di tahun kemaren
        $yearmonth1 = date('Y-m-d',strtotime($prev_m_1st_date . ' - 1 year')); //tgl pertama bln lalu di tahun kemaren
        $yearmonth1jan = date('Y-01-d',strtotime($prev_m_1st_date . ' - 1 year')); //tgl pertama bln lalu di tahun kemaren     
		//echo $yearmonth1jan; 	
	
		if (date('m',strtotime($yearmonth1jan))=='01') {
			$yearmonth1jan=date('Y-01-d',strtotime($yearmonth1jan. ' + 1 year'));
		} else { 
			$yearmonth1jan=$yearmonth1jan;
		}		
		//echo $yearmonth1jan; 	
        $yearmonth2 = date('Y-m-d',strtotime($mydate . ' - 1 year')); //tgl pertama bln lalu di tahun kemaren
		
        //$dsplastmonth1=date('dM',strtotime($prev_m_1st_date)).'-'.date('d',strtotime($mydate)).date('My',strtotime($yearmonth2));//ytd before
        //$dsplastmonth2=date('dM',strtotime($prev_m_1st_date)).'-'.date('d',strtotime($mydate)).date('My',strtotime($mydate));//ytd after
		$dsplastmonth1=date('dM',strtotime($prev_y_1st_date)).'-'.date('d',strtotime($mydate)).date('My',strtotime($yearmonth2));//ytd before
        $dsplastmonth2=date('dM',strtotime($prev_y_1st_date)).'-'.date('d',strtotime($mydate)).date('My',strtotime($mydate));//ytd after
		//ytd di ubah menjadi perbandingan antara 1 Januari - now 2016 dan 1 Januari - now 2017 req by dhimas, mod junis 2017-07-06 09:17
		
		
		$dsplastyoy1=date('d',strtotime($yearmonth)).'-'.date('d',strtotime($mydate)).date('My',strtotime($yearmonth2));//yoy before
        $dsplastyoy2=date('d',strtotime($now_m_1st_date)).'-'.date('d',strtotime($mydate)).date('My',strtotime($mydate)); // yoy after
		
		$dsplastwow1=date('d',strtotime($week_b_7th_date)).'-'.date('d',strtotime($week_b_1st_date)).date('My',strtotime($week_b_1st_date));//wow before
        $dsplastwow2=date('d',strtotime($now_b_7th_date)).'-'.date('d',strtotime($mydate)).date('My',strtotime($mydate)); // wow after
        $dsplnow=date('d',strtotime($mydate))." ".date('My',strtotime($mydate));
        $dspltgl=date('d',strtotime($tgl))." ".date('My',strtotime($tgl));
		
		$data=array('tgl'=>$tgl,'tgl1'=>$tgl1,'tgl2'=>$tgl2,'now_m_1st_date'=>$now_m_1st_date,'prev_m_1st_date'=>$prev_m_1st_date,
					'now_b_1st_date'=>$now_b_1st_date,'now_b_7th_date'=>$now_b_7th_date,'dsplastmonth'=>$dsplastmonth,'week_b_7th_date'=>$week_b_7th_date,
					'week_b_1st_date'=>$week_b_1st_date,'mydate'=>$mydate,
					'dspnowmonth'=>$dspnowmonth,'yearmonth'=>$yearmonth,'yearmonth1'=>$yearmonth1,'yearmonth2'=>$yearmonth2,
					'dsplastmonth1'=>$dsplastmonth1,'dsplastmonth2'=>$dsplastmonth2,'dsplastyoy1'=>$dsplastyoy1,
					'dsplastyoy2'=>$dsplastyoy2,'dsplastwow1'=>$dsplastwow1,'dsplastwow2'=>$dsplastwow2,'dsplnow'=>$dsplnow,
					'dspltgl'=>$dspltgl,'yearmonth1jan'=>$yearmonth1jan,'prev_y_1st_date'=>$prev_y_1st_date);
		
		return $data;
	}	
}