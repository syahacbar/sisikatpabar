<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminkab extends CI_Controller{
    function __construct()
    {
        parent::__construct(); 
        $this->load->model('Laporan_model');
        if (!$this->ion_auth->logged_in())
          {
             // redirect them to the login page
             redirect('auth/login', 'refresh');
          }
        
    }

    function index()
    {
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
        $data['_view'] = 'adminkab/dashboard';
        $this->load->view('adminkab/layout',$data);
    }

    function infrastruktur($q=NULL)
    {
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();
        $user = $this->ion_auth->user()->row();

        if($q=='jalan')
        {
            $data['laporan'] = $this->Laporan_model->get_all_laporan_bykabkota($user->kode_kab,NULL,NULL,'jalan');
            $data['infrastruktur'] = 'Jalan';
        } 
        elseif($q=='drainase')
        {
            $data['laporan'] = $this->Laporan_model->get_all_laporan_bykabkota($user->kode_kab,NULL,NULL,'drainase');
            $data['infrastruktur'] = 'Drainase';
        }
        else
        {
            $data['laporan'] = $this->Laporan_model->get_all_laporan_bykabkota($user->kode_kab,NULL,NULL,NULL);
            $data['infrastruktur'] = 'Semua Infrastruktur';
        }

        $data['_view'] = 'adminkab/infrastruktur';
        $this->load->view('adminkab/layout',$data);
    }
}
