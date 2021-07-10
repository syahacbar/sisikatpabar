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
        $data = "<option value=''>- Pilih Kabupaten -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->name."</option>";
        }
        echo $data;
    }
  
    function add_ajax_kec($id_kab)
    {
        $query = $this->db->get_where('districts',array('regency_id'=>$id_kab));
        $data = "<option value=''> - Pilih Kecamatan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->name."</option>";
        }
        echo $data;
    }




}