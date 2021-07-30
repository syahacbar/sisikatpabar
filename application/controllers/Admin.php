<?php
 
class Admin extends MY_Controller{
    function __construct()
    {
        parent::__construct(); 

        $this->load->model('Laporan_model');
        
    }

    function index()
    {
        
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();

        $data['_view'] = 'admin/dashboard';
        $this->load->view('admin/layout',$data);
    }

    function infrastruktur($q=NULL)
    {
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();

        if($q=='jalan')
        {
            $data['laporan'] = $this->Laporan_model->get_all_laporan('jalan');
        } 
        elseif($q=='drainase')
        {
            $data['laporan'] = $this->Laporan_model->get_all_laporan('drainase');
        }
        else
        {
            $data['laporan'] = $this->Laporan_model->get_all_laporan(NULL);
        }

        $data['_view'] = 'admin/jalan';
        $this->load->view('admin/layout',$data);
    }

    function jalan()
    {
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();
        $data['laporan'] = $this->Laporan_model->get_all_laporan('jalan');
        $data['_view'] = 'admin/jalan';
        $this->load->view('admin/layout',$data);
    }

    function drainase()
    {
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();
        $data['laporan'] = $this->Laporan_model->get_all_laporan('drainase');
        $data['_view'] = 'admin/drainase';
        $this->load->view('admin/layout',$data);
    }

    function kabkota($kabkota=NULL)
    {
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();
        $data['laporan'] = $this->Laporan_model->get_all_laporan_bykabkota($kabkota);
        if ($kabkota==NULL)
        {
            $data['kabkota'] = 'Semua Kab/Kota';
        } else {
            $data['kabkota'] = $this->Laporan_model->get_kabkota($kabkota)->nama;
        }
                
        $data['_view'] = 'admin/kabupaten';
        $this->load->view('admin/layout',$data);
    }
}
