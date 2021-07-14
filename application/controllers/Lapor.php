<?php
 
class Lapor extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->model('m_setting');
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

        $get_kab = $this->db->select('*')->from('regencies')->get();
        $data['laporan'] = $this->Laporan_model->get_all_laporan();
        $data['kabupaten'] = $get_kab->result();
           
        $data['_view'] = 'home';
        $this->load->view('home',$data);
    }

    function add_ajax_kab($id_prov)
    {
        $query = $this->db->get_where('regencies',array('province_id'=>$id_prov));
        $data = "<option value=''>- Pilih Kabupaten/Kota -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->name."</option>";
        }
        echo $data;
    }
  
    function add_ajax_kec($id_kab)
    {
        $query = $this->db->get_where('districts',array('regency_id'=>$id_kab));
        $data = "<option value=''> - Pilih Kecamatan/Distrik - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->name."</option>";
        }
        echo $data;
    }
  
    function add_ajax_des($id_kec)
    {
        $query = $this->db->get_where('villages',array('district_id'=>$id_kec));
        $data = "<option value=''> - Pilih Kelurahan/Desa - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->name."</option>";
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
                'tgl_laporan' => date("Y-m-d"),
                'nama_pelapor' => $this->input->post('nama_pelapor'),
                'nik' => $this->input->post('nik'),
                'alamat_pelapor' => $this->input->post('alamat_pelapor'),
                'kab_pelapor' => $this->input->post('kab_pelapor'),
                'kec_pelapor' => $this->input->post('kec_pelapor'),
                'des_pelapor' => $this->input->post('des_pelapor'),
                'no_hp' => $this->input->post('no_hp'),
                'email' => $this->input->post('email'),
                'foto_ktp' => $this->input->post('foto_ktp'),
                'pengaduan' => $this->input->post('pengaduan'),
                'infrastruktur' => $this->input->post('infrastruktur'),
                'lokasi_namajalan' => $this->input->post('lokasi_namajalan'),
                'lokasi_kabkota' => $this->input->post('lokasi_kabkota'),
                'lokasi_distrik' => $this->input->post('lokasi_distrik'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'dokumentasi' => $this->input->post('dokumentasi'),
            );
            
            $laporan_id = $this->Laporan_model->add_laporan($params);
            redirect('laporan/index');
        }
        else
        {            
            redirect('lapor');
        }
    }  





}