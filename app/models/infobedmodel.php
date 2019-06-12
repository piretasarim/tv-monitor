<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InfoBedModel extends MY_Model {
   // protected $tableName = 'antrian';
   // protected $primaryKey = 'ID_ANTRIAN';
   // protected $resultMode = 'object';

	function info_bed_today()
	{
		return $this->db->query("SELECT mg.id_gedung, mg.nama_gedung, mrr.id, mrr.nama_ruang, mrr.jml_bed as jml_kamar_sk, 
				                        mrr.kelas_cost_center,
				                        COUNT(mnk.id_ruang) AS jml_kamar_rs,
				                        COUNT(IF(mnk.flag_status='primer' AND mnk.status_kamar IN('Isi','iddle'),1,NULL)) AS isi_inti,
				                        COUNT(IF(mnk.flag_status='sekunder' AND mnk.status_kamar IN('Isi','iddle'),1,NULL)) AS isi_cadangan,
										mrr.jml_bed - COUNT(IF(mnk.flag_status='primer' AND mnk.status_kamar IN('Isi','iddle'),1,NULL)) AS isi_kosong 
		                        FROM 
		                        mastercr_no_kamar mnk, mastercr_ruang_rawat mrr, master_gedung mg
		                        WHERE 
		                        mnk.id_ruang=mrr.id
		                        AND mrr.jml_bed IS NOT NULL
		                        AND mrr.id_gedung=mg.id_gedung
		                        AND mrr.status='Aktif'
		                        GROUP BY mrr.id, mrr.nama_ruang, mrr.jml_tempat_tidur, mrr.jml_bed
		                        ORDER BY mg.nama_gedung, mrr.nama_ruang, mrr.kelas_cost_center DESC")->result_array();
	}

}