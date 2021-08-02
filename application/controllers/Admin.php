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

        $lapharian = $this->db->query("SELECT COUNT(*) total, 
                                        DATE_FORMAT(r.tgl_laporan, '%d %b') tanggal,
                                        MONTH(r.tgl_laporan) bulan,
                                        DATE_FORMAT(r.tgl_laporan, '%a') hari
                                        FROM laporan r
                                        WHERE YEARWEEK(r.tgl_laporan, 1) = YEARWEEK(NOW(), 1)
                                        GROUP BY DATE(r.tgl_laporan)
                                        ORDER BY DATE(r.tgl_laporan) ASC");
        $lapbulanan = $this->db->query("SELECT COUNT(*) total,
                                        MONTHNAME(r.tgl_laporan) bulan
                                        FROM laporan r
                                        GROUP BY MONTH(r.tgl_laporan)
                                        ORDER BY DATE(r.tgl_laporan) ASC");
        $maxmingguan = $this->db->query("SELECT COUNT(*) total, 
                                        DAYOFMONTH(r.tgl_laporan) tanggal,
                                        MONTH(r.tgl_laporan) bulan,
                                        DATE_FORMAT(r.tgl_laporan, '%a') hari
                                        FROM laporan r
                                        WHERE YEARWEEK(r.tgl_laporan, 1) = YEARWEEK(NOW(), 1)");
        
        $data['updatelaporan'] = $this->Laporan_model->get_all_laporan(NULL,NULL,NULL,NULL,'tgl_Laporan','DESC');
        $data['maxmingguan'] = $maxmingguan->row();
        $data['lapharian'] = $lapharian->result();
        $data['lapbulanan'] = $lapbulanan->result();

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
            $data['infrastruktur'] = 'Jalan';
        } 
        elseif($q=='drainase')
        {
            $data['laporan'] = $this->Laporan_model->get_all_laporan('drainase');
            $data['infrastruktur'] = 'Drainase';
        }
        else
        {
            $data['laporan'] = $this->Laporan_model->get_all_laporan(NULL);
            $data['infrastruktur'] = 'Semua Infrastruktur';
        }

        $data['_view'] = 'admin/infrastruktur';
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

    function download($format)
    {
        $data['_view'] = 'admin/download';
        $this->load->view('admin/layout',$data);
    }

    function print()
    {
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();
        $data['laporan'] = $this->Laporan_model->get_all_laporan(NULL,NULL,NULL,NULL,'tgl_Laporan','DESC');
                      
        $data['_view'] = 'admin/print';
        $this->load->view('admin/print',$data);
    }
}
