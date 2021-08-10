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
    	return $query->row()->nama;
    }

    public function get_image($kodelap)
    {
    	$query = $this->db->get_where('upload', array('kodelap' => $kodelap, 'kategori' => 'dokumentasi1'));
    	return $query->row()->nama_file;
    }

    public function get_nowa_kabid($kodekab)
    {
      $query = $this->db->query("SELECT u.* FROM users u, users_groups ug, groups s WHERE u.id=ug.user_id AND g.id=ug.group_id AND g.kode_kab='$kodekab'")
      return $query->row();
    }
	

}

/* End of file M_setting.php */
/* Location: ./application/models/M_setting.php */