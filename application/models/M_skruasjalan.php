<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_skruasjalan extends CI_Model {

    public function get_all_skruasjalan()
	{
		$query = $this->db->get('skruasjalan');  
		return $query->result_array();
	}
    

    public function get_skruasjalan($id)
    {
       $query = $this->db->get_where('skruasjalan',array('id'=>$id));
       return $query->row();
   }
}

