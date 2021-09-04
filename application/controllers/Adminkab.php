<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminkab extends CI_Controller{
    function __construct()
    {
        parent::__construct();  
        $this->load->model('Laporan_model');
        $this->load->model('M_setting');
        $this->load->model("M_laporan");
        $user = $this->ion_auth->user()->row();
        $user_groups = $this->ion_auth->get_users_groups($user->id)->row();
        if (!$this->ion_auth->logged_in() || $user_groups->kode_kab == '')
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
        $data['kode_kab'] = $user_groups->kode_kab;
        $data['countlapall'] = $this->Laporan_model->count_all_laporan(NULL,$user_groups->kode_kab);
        $data['countlapmenunggu'] = $this->Laporan_model->count_all_laporan('Menunggu',$user_groups->kode_kab);
        $data['countlapsetuju'] = $this->Laporan_model->count_all_laporan('Diterima',$user_groups->kode_kab);
        $data['countlaptolak'] = $this->Laporan_model->count_all_laporan('Ditolak',$user_groups->kode_kab);

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
    
        if($q=='jalan')
        {
            $data['infrastruktur'] = 'Infrastruktur Jalan '.ucwords(strtolower($this->M_setting->get_wilayah($user_groups->kode_kab)));
            $data['kodeinf'] = 'jalan';
        } 
        elseif($q=='drainase')
        {
            $data['infrastruktur'] = 'Infrastruktur Drainase '.ucwords(strtolower($this->M_setting->get_wilayah($user_groups->kode_kab)));
            $data['kodeinf'] = 'drainase';
        }
        else
        {
            $data['infrastruktur'] = 'Semua Infrastruktur '.ucwords(strtolower($this->M_setting->get_wilayah($user_groups->kode_kab)));
            $data['kodeinf'] = '';
        }

        $data['kode_kab'] = $user_groups->kode_kab;
        $data['form_kec'] = $get_kec->result();
        $data['kabupaten'] = $get_kab->result();
        $data['_view'] = 'adminkab/infrastruktur';
        $this->load->view('adminkab/layout',$data);
    }

    function proseslaporan($idlap)
    {
        $param = array('status' => $this->input->post('status'));
        $this->Laporan_model->update_laporan($idlap,$param);
    } 

    function infrastruktur_list()
    {
        $user = $this->ion_auth->user()->row();
        $user_groups = $this->ion_auth->get_users_groups($user->id)->row();
        header('Content-Type: application/json');
        $list = $this->M_laporan->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        //looping data mahasiswa
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
        $user = $this->ion_auth->user()->row();
        $user_groups = $this->ion_auth->get_users_groups($user->id)->row();
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
            $row[] = $laporan->lokasinamadistrik;
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
