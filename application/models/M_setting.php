<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_setting extends CI_Model {

	public function list_setting()
	{
		$query=$this->db->get('tbl_setting');
		return $query->row();
	}

	public function edit($data)
    {
       $this->db->where('id_setting',$data['id_setting']);
       $this->db->update('tbl_setting',$data);
    }

    public function get_wilayah($kode)
    {
    	$query = $this->db->get_where('wilayah_2020', array('kode' => $kode));
    	return $query->row();
    }
	

}

/* End of file M_setting.php */
/* Location: ./application/models/M_setting.php */