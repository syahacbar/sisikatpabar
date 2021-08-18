<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH."third_party/PhpWord/Autoloader.php");

use PhpOffice\PhpWord\Autoloader;
Autoloader::register();


class Admin extends MY_Controller{

    function __construct()
    {
        parent::__construct(); 
        $this->load->model('Laporan_model');
        $this->load->model('M_skruasjalan');
        $this->load->model("M_laporan");
        
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

        $data['countlapall'] = $this->Laporan_model->count_all_laporan();
        $data['countlapmenunggu'] = $this->Laporan_model->count_all_laporan('Menunggu');
        $data['countlapsetuju'] = $this->Laporan_model->count_all_laporan('Diterima');
        $data['countlaptolak'] = $this->Laporan_model->count_all_laporan('Ditolak');

        $data['updatelaporan'] = $this->Laporan_model->get_all_laporan(NULL,'5',NULL,NULL,'tgl_Laporan','DESC','1');
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
                $data['laporan'] = $this->Laporan_model->get_all_laporan('jalan',NULL,NULL,NULL,'tgl_laporan','DESC','1');
                $data['infrastruktur'] = 'Infrastruktur Jalan';
                $data['kodeinf'] = 'Jalan';
            } 
            elseif($q=='drainase')
            {
                $data['laporan'] = $this->Laporan_model->get_all_laporan('drainase',NULL,NULL,NULL,'tgl_laporan','DESC','1');
                $data['infrastruktur'] = 'Infrastruktur Drainase';
                $data['kodeinf'] = 'Drainase';
            }
            else
            {
                $data['laporan'] = $this->Laporan_model->get_all_laporan(NULL,NULL,NULL,NULL,'tgl_laporan','DESC','1'); 
                $data['infrastruktur'] = 'Semua Infrastruktur';
                $data['kodeinf'] = '';
            }
        
        
        $data['_view'] = 'admin/infrastruktur';
        $this->load->view('admin/layout',$data);
    }

    
    function kabkota($kabkota=NULL)
    {
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        
        $data['laporan'] = $this->Laporan_model->get_all_laporan_bykabkota($kabkota,NULL,NULL,NULL,NULL,NULL,'1');
        $data['status'] = '1';

        if ($kabkota==NULL)
        {
            $data['kabkota'] = 'Semua Kab/Kota';
            $data['kodekab'] = '';
        } else {
            $data['kabkota'] = $this->Laporan_model->get_kabkota($kabkota)->nama;
            $data['kodekab'] = $kabkota;
        }
            
        $data['_view'] = 'admin/kabupaten';
        $data['kabupaten'] = $get_kab->result();
        $this->load->view('admin/layout',$data);
    }

    function download()
    {
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();
        $data['_view'] = 'admin/download';
        $this->load->view('admin/layout',$data);
    }

    function users()
    {
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();
        $data['title'] = $this->lang->line('index_heading');    
        $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $data['users'] = $this->ion_auth->users()->result();
        foreach ($data['users'] as $k => $user)
        {
            $data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }
        $data['_view'] = 'auth/index';
        $this->load->view('admin/layout',$data);

    }

    function cetak()
    {
        $this->load->library('Pdf');
        $infrastruktur = $this->input->post('RBInfrastruktur', TRUE);
        $kabupaten = $this->input->post('kabupaten', TRUE);
        $startdate = $this->input->post('startdate', TRUE);
        $todate = $this->input->post('todate', TRUE);
        $formatcetak = $this->input->post('RBFormatCetak',TRUE);
        $Statuslap = $this->input->post('RBStatuslap',TRUE);
        if ($formatcetak == 'cetakword')
        {
            $this->docx();
        } elseif ($formatcetak == 'cetakpdf')
        {
            if ($startdate != NULL && $todate != NULL)
            {
                $range = strtoupper(date_indo($startdate))." S.D. ".strtoupper(date_indo($todate));
            } else {
                $range = "TAHUN 2021";
            }
            

            $data['laporan'] = $this->Laporan_model->get_cetak_laporan($infrastruktur,$kabupaten,$startdate,$todate,NULL,NULL,NULL,'tgl_laporan','DESC',$Statuslap);
            if($infrastruktur != NULL && $kabupaten != NULL && $Statuslap != NULL)
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

        
    }

    function cetakexcel()
    {
       
    }

    

    function skruasjalan()
    {        
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['kabupaten'] = $get_kab->result();
        $data['skruasjalan'] = $this->M_skruasjalan->get_all_skruasjalan();

        $data['_view'] = 'admin/skruasjalan';
        $this->load->view('admin/layout',$data);
    }

    // Upload SK Ruas Jalan
    function uploadsk()
    {
        $config['upload_path']   = FCPATH.'/upload/skruasjalan/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('fileskruasjalan')){
            $filesk=$this->upload->data('file_name');
            $namask=$this->input->post('namask');
            $token=$this->input->post('token_skruasjalan');
            $uploaded_on=date("Y-m-d H:i:s");
            $this->db->insert('skruasjalan',array('namask'=>$namask,'filesk'=>$filesk,'token'=>$token,'uploaded_on'=>$uploaded_on));
        }

    }


    function proseslaporan($idlap)
    {
        $status = $this->input->post('status');
        $this->Laporan_model->proseslaporan($idlap,$status);
    }

    function infrastruktur_list()
    {
        $user = $this->ion_auth->user()->row();
        $user_groups = $this->ion_auth->get_users_groups($user->id)->row();
        header('Content-Type: application/json');
        $list = $this->M_laporan->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        
        foreach ($list as $laporan) {
            if($laporan->status=="Diterima"){ $classbtnTerima = "disabled"; $classbtnTolak = ""; } elseif($laporan->status=="Ditolak") { $classbtnTerima = ""; $classbtnTolak = "disabled";} elseif($laporan->status=="Menunggu") { $classbtnTerima = ""; $classbtnTolak = ""; }
            $no++;
            $row = array();
            //row pertama akan kita gunakan untuk btn edit dan delete
            $row[] = $no;
            $row[] = $laporan->tgl_laporan;
            $row[] = $laporan->kodelap;
            $row[] = $laporan->pengaduan;
            $row[] = $laporan->lokasi_namajalan;
            $row[] = $laporan->lokasinamadistrik;
            $row[] = $laporan->lokasinamakab;
            $row[] = $laporan->status;
            $row[] = '<button data-bs-target="#modal_lapdetail" data-bs-toggle="modal" id="btnDetail" class="btn btn-sm btn-primary view_lapdetail" data-idlap="'.$laporan->id.'">Detail</button>&nbsp;<button class="btn btn-sm btn-info btnTerima '.$classbtnTerima.'" id="'.$laporan->kodelap.'" value="'.$laporan->id.'">Terima</button>&nbsp;<button class="btn btn-sm btn-danger btnTolak '.$classbtnTolak.'" id="'.$laporan->kodelap.'" value="'.$laporan->id.'">Tolak</button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->M_laporan->count_all(),
            "recordsFiltered" => $this->M_laporan->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));

    }

    function infrastrukturkab_list()
    {
        $user = $this->ion_auth->user()->row();
        $user_groups = $this->ion_auth->get_users_groups($user->id)->row();
        header('Content-Type: application/json');
        $list = $this->M_laporan->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        
        foreach ($list as $laporan) {
            if($laporan->status=="Diterima"){ $classbtnTerima = "disabled"; $classbtnTolak = ""; } elseif($laporan->status=="Ditolak") { $classbtnTerima = ""; $classbtnTolak = "disabled";} elseif($laporan->status=="Menunggu") { $classbtnTerima = ""; $classbtnTolak = ""; }

            $no++;
            $row = array();
            //row pertama akan kita gunakan untuk btn edit dan delete
            $row[] = $no;
            $row[] = $laporan->tgl_laporan;
            $row[] = $laporan->kodelap;
            $row[] = $laporan->infrastruktur;
            $row[] = $laporan->pengaduan;
            $row[] = $laporan->lokasi_namajalan;
            $row[] = $laporan->lokasinamadistrik;
            $row[] = $laporan->status;
            $row[] = '<button data-bs-target="#modal_lapdetail" data-bs-toggle="modal" id="btnDetail" class="btn btn-sm btn-primary view_lapdetail" data-idlap="'.$laporan->id.'">Detail</button>&nbsp;<button class="btn btn-sm btn-info btnTerima '.$classbtnTerima.'" id="'.$laporan->kodelap.'" value="'.$laporan->id.'">Terima</button>&nbsp;<button class="btn btn-sm btn-danger btnTolak '.$classbtnTolak.'" id="'.$laporan->kodelap.'" value="'.$laporan->id.'">Tolak</button>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->M_laporan->count_all(),
            "recordsFiltered" => $this->M_laporan->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));

    }

    public function detail_laporan()
    {
        $id = $this->input->get('idlap');
        $get_laporan = $this->M_laporan->get_laporan_by_id($id);
        echo json_encode($get_laporan); 
        exit();
    }

    function dashboard_table_list()
    {
        header('Content-Type: application/json');
        $list = $this->M_laporan->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
        foreach ($list as $laporan) {

            $no++;
            $row = array();
            //row pertama akan kita gunakan untuk btn edit dan delete
            $row[] = $no;
            $row[] = $laporan->tgl_laporan;
            $row[] = $laporan->kodelap;
            $row[] = $laporan->infrastruktur;
            $row[] = $laporan->pengaduan;
            $row[] = $laporan->lokasi_namajalan;
            $row[] = $laporan->lokasinamakab;
            $row[] = $laporan->nama_pelapor;
            $row[] = $laporan->status;
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->M_laporan->count_all(),
            "recordsFiltered" => $this->M_laporan->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $this->output->set_output(json_encode($output));

    }

}