<?php
class Ambildata extends CI_Model{
	function __construct(){
		$this->load->database(); // Berfungsi untuk memanggil database
	}
 
	function ambildata($tabel) {
		return $this->db->query("SELECT * FROM ".$tabel);
	}

	/*function queryindex1() {
		return $this->db->query("SELECT DISTINCT u.SITEID FROM celllist_poi AS u INNER JOIN d4g_kpi AS i on u.SITEID=i.siteid WHERE u.TYPE_BAND='4G' AND u.BAND='L2100' AND i.TGL='2020-01-01' AND u.POI_NAME='SIMPANG 5 SEMARANG'");
	}

	function queryindex2() {
		return $this->db->query("SELECT * FROM users");
	}
*/
	function querymap() {
		return $this->db->query("SELECT * FROM celllist_poi AS u INNER JOIN d4g_kpi AS i on u.SITEID=i.siteid WHERE u.TYPE_BAND='4G' AND u.BAND='L2100' AND i.TGL='2020-01-01' AND u.POI_NAME='SIMPANG 5 SEMARANG'");
	}
}