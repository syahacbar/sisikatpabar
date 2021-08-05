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

    function download()
    {
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();
        $data['_view'] = 'admin/download';
        $this->load->view('admin/layout',$data);
    }

    function cetak()
    {
        $this->load->library('Pdf');
        $infrastruktur = $this->input->post('RBInfrastruktur', TRUE);
        $kabupaten = $this->input->post('kabupaten', TRUE);
        $startdate = $this->input->post('startdate', TRUE);
        $todate = $this->input->post('todate', TRUE);

        if ($startdate != NULL && $todate != NULL)
        {
            $range = strtoupper(date_indo($startdate))." S.D. ".strtoupper(date_indo($todate));
        } else {
            $range = "TAHUN 2021";
        }
        

        $data['laporan'] = $this->Laporan_model->get_cetak_laporan($infrastruktur,$kabupaten,$startdate,$todate,NULL,NULL,NULL,'tgl_laporan','DESC');
        if($infrastruktur != NULL && $kabupaten != NULL)
        {
            if ($infrastruktur == 'semua' && $kabupaten == 'semua')
            {
                $data['range'] = $range;
                $this->load->view('admin/cetakpdfsemuainfsemuakab',$data);
            } elseif ($infrastruktur == 'semua' && $kabupaten != 'semua') {
                $data['kabupaten'] = $this->Laporan_model->get_kabkota($kabupaten)->nama;
                $data['range'] = $range;
                $this->load->view('admin/cetakpdfsemuainfkab',$data);
            } elseif ($infrastruktur != 'semua' && $kabupaten == 'semua') {
                $data['infrastruktur'] = $infrastruktur;
                $data['range'] = $range;
                $this->load->view('admin/cetakpdfinfsemuakab',$data);
            } elseif ($infrastruktur != 'semua' && $kabupaten != 'semua') {
                $data['infrastruktur'] = $infrastruktur;
                $data['kabupaten'] = $this->Laporan_model->get_kabkota($kabupaten)->nama;
                $data['range'] = $range;
                $this->load->view('admin/cetakpdfinfkab',$data);
            } 
        }

                    
    }

    function cetakword()
    {
        $data['laporan'] = $this->Laporan_model->get_all_laporan(NULL,NULL,NULL,NULL,'tgl_Laporan','DESC');
                      
        $data['_view'] = 'admin/cetakword';
        $this->load->view('admin/cetakword',$data);
    }

}