<?php
 
class Lapor extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->model('m_setting');
        $this->load->library('session');
    } 

    /*
     * Listing of laporan
     */
    function index()
    {
        $setting=$this->m_setting->list_setting();
        $this->load->library('googlemaps');
        $config['center'] = "$setting->latitude, $setting->longitude";
        $config['zoom'] = "$setting->zoom";
        $config['apiKey'] = "$setting->apikey";
        $this->googlemaps->initialize($config);

        $marker['position'] = "$setting->latitude, $setting->longitude";
        $marker['draggable'] = true;
        $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);

        $map=$this->googlemaps->create_map();
        $data['map'] = $map;

        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");
        $data['laporan1'] = $this->Laporan_model->get_all_laporan(3,0);
        $data['laporan2'] = $this->Laporan_model->get_all_laporan(3,3);
        $data['kabupaten'] = $get_kab->result();

        $last_idlap = $this->Laporan_model->get_lastrow();
        if($last_idlap->num_rows>0)
        {
            $idlap = (int)$last_idlap->row()->id+1;            
        } else {
            $idlap = 1;
        }
        $kodelap = date("YmdHis").$idlap;

        $data['jum_lap_drainase'] = $this->Laporan_model->get_infrastruktur('drainase')->num_rows();
        $data['jum_lap_jalan'] = $this->Laporan_model->get_infrastruktur('jalan')->num_rows();
        $data['kodelap'] = $kodelap;
        $data['_view'] = 'home';
        $this->load->view('home',$data);

    }
  
    function add_ajax_kec($id)
    {
        $query = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 8 AND LEFT(kode,5) = '$id' ORDER BY kode ASC");
        $data = "<option value=''> - Pilih Kecamatan/Distrik - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->kode."'>".$value->nama."</option>";
        }
        echo $data;
    }
  
    function add_ajax_des($id)
    {
        $query = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 13 AND LEFT(kode,8) = '$id' ORDER BY kode ASC");
        $data = "<option value=''> - Pilih Kelurahan/Desa - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->kode."'>".$value->nama."</option>";
        }
        echo $data;
    }

    function add()
    {          

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik','NIK','required');
        
        if($this->form_validation->run())     
        {   
            $params = array(
                'tgl_laporan' => date("Y-m-d H:i:s"),
                'nama_pelapor' => $this->input->post('nama_pelapor'),
                'nik' => $this->input->post('nik'),
                'alamat_pelapor' => $this->input->post('alamat_pelapor'),
                'kab_pelapor' => $this->input->post('kab_pelapor'),
                'kec_pelapor' => $this->input->post('kec_pelapor'),
                'des_pelapor' => $this->input->post('des_pelapor'),
                'no_hp' => $this->input->post('no_hp'),
                'email' => $this->input->post('email'),
                'infrastruktur' => $this->input->post('infrastruktur'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'pengaduan' => $this->input->post('pengaduan'),
                'lokasi_namajalan' => $this->input->post('lokasi_namajalan'),
                'lokasi_kabkota' => $this->input->post('lokasi_kabkota'),
                'lokasi_distrik' => $this->input->post('lokasi_distrik'),
                'kodelap' => $this->input->post('kodelap'),
            );
            
            $laporan_id = $this->Laporan_model->add_laporan($params);


            
        }        
    }

    function uploadktp()
    {
            $config['upload_path']   = FCPATH.'/upload/ktp/';
            $config['allowed_types'] = 'gif|jpg|png|ico';
            $this->load->library('upload',$config);

            if($this->upload->do_upload('filektp')){
                $token=$this->input->post('token_foto');
                $kodelap=$this->input->post('kodelap');
                $nama=$this->upload->data('file_name');
                $kategori='ktp';
                $uploaded_on=date("Y-m-d H:i:s");
                $this->db->insert('upload',array('nama_file'=>$nama,'token'=>$token,'kategori'=>$kategori,'uploaded_on'=>$uploaded_on,'kodelap'=>$kodelap));
            }

    }

    function uploaddokumentasi()
    {
            $config['upload_path']   = FCPATH.'/upload/dokumentasi/';
            $config['allowed_types'] = 'gif|jpg|png|ico';
            $this->load->library('upload',$config);

            if($this->upload->do_upload('filedokumentasi')){
                $token=$this->input->post('token_dokumentasi');
                $kodelap=$this->input->post('kodelap');
                $nama=$this->upload->data('file_name');
                $kategori='dokumentasi';
                $uploaded_on=date("Y-m-d H:i:s");
                $this->db->insert('upload',array('nama_file'=>$nama,'token'=>$token,'kategori'=>$kategori,'uploaded_on'=>$uploaded_on,'kodelap'=>$kodelap));
            }

    }


}