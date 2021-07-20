<?php     
    function get_wilayah($kode)
    {
        return $this->db->get_where('wilayah_2020',array('kode'=>$kode))->row_array();
    }