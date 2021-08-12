<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminkab extends CI_Controller{
    function __construct()
    {
        parent::__construct();  
        $this->load->model('Laporan_model');
        $this->load->model('M_setting');
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
        
        $user = $this->ion_auth->user()->row();
        $user_groups = $this->ion_auth->get_users_groups($user->id)->row();
        $data['updatelaporan'] = $this->Laporan_model->get_all_laporan_bykabkota($user_groups->kode_kab,'5',NULL,NULL,'tgl_laporan','DESC','0');
        $data['maxmingguan'] = $maxmingguan->row();
        $data['lapharian'] = $lapharian->result();
        $data['lapbulanan'] = $lapbulanan->result();
        $data['kabupaten'] = ucwords(strtolower($this->M_setting->get_wilayah($user_groups->kode_kab)));
        $data['_view'] = 'adminkab/dashboard';
        $this->load->view('adminkab/layout',$data);
    }

    function infrastruktur($q=NULL)
    {
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        
        $user = $this->ion_auth->user()->row();
        $user_groups = $this->ion_auth->get_users_groups($user->id)->row();
        
        $get_kec = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 8 AND kode LIKE '$user_groups->kode_kab%' ORDER BY kode ASC");        

        if($this->input->post('btnFilter', TRUE))
        {
            $kodekec = $this->input->post('lokasi_distrik', TRUE);
            $status = $this->input->post('status', TRUE);
            
            $data['kodekec'] = $kodekec;
            $data['status'] = $status;
            $data['laporan'] = $this->Laporan_model->get_all_laporan_bykabkota_filter($user_groups->kode_kab,NULL,NULL,NULL,$kodekec,$status);
            $data['infrastruktur'] = 'Infrastruktur '.ucwords(strtolower($this->M_setting->get_wilayah($user_groups->kode_kab)));
        }
        else
        {
            $data['kodekec'] = '';
            $data['status'] = '';

        
            if($q=='jalan')
            {
                $data['laporan'] = $this->Laporan_model->get_all_laporan_bykabkota($user_groups->kode_kab,NULL,NULL,'jalan');
                $data['infrastruktur'] = 'Infrastruktur Jalan '.ucwords(strtolower($this->M_setting->get_wilayah($user_groups->kode_kab)));
            } 
            elseif($q=='drainase')
            {
                $data['laporan'] = $this->Laporan_model->get_all_laporan_bykabkota($user_groups->kode_kab,NULL,NULL,'drainase');
                $data['infrastruktur'] = 'Infrastruktur Drainase '.ucwords(strtolower($this->M_setting->get_wilayah($user_groups->kode_kab)));
            }
            else
            {
                $data['laporan'] = $this->Laporan_model->get_all_laporan_bykabkota($user_groups->kode_kab,NULL,NULL,NULL);
                $data['infrastruktur'] = 'Semua Infrastruktur '.ucwords(strtolower($this->M_setting->get_wilayah($user_groups->kode_kab)));
            }
        }

        

        $data['form_kec'] = $get_kec->result();
        $data['kabupaten'] = $get_kab->result();
        $data['_view'] = 'adminkab/infrastruktur';
        $this->load->view('adminkab/layout',$data);
    }

    function proseslaporan($idlap)
    {
        $status = $this->input->post('status');
        $this->Laporan_model->proseslaporan($idlap,$status);
    }
}
