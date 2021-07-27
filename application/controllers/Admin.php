<?php
 
class Admin extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
    }

    function index()
    {
        
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();

        $data['_view'] = 'admin/dashboard';
        $this->load->view('admin/layout',$data);
    }

    function jalan()
    {
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();

        $data['_view'] = 'admin/jalan';
        $this->load->view('admin/layout',$data);
    }

        function drainase()
    {
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();

        $data['_view'] = 'admin/drainase';
        $this->load->view('admin/layout',$data);
    }
}
