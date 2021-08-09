<?php
 
class Lapor extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->model('M_setting');
        $this->load->library('session');
    } 


    /*
     * Listing of laporan
     */
    function index()
    {
        $setting=$this->M_setting->list_setting();
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
        $data['kabupaten'] = $get_kab->result();
        $data['laporan1'] = $this->Laporan_model->get_all_laporan(NULL,3,0,NULL,'tgl_Laporan','DESC'); 
        $data['laporan2'] = $this->Laporan_model->get_all_laporan(NULL,3,3,NULL,'tgl_Laporan','DESC');
        

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
        $data['_view'] = 'public/home';
        $data['title'] = 'SI-SIKAT | Beranda';
        $this->load->view('public/layout',$data);

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

            $namapelapor = $this->input->post('nama_pelapor');
            $nowapelapor = $this->input->post('no_hp');
            $nowakabid = '085244146207';
            $kodelap = $this->input->post('kodelap');
            $distrik = $this->M_setting->get_wilayah($this->input->post('lokasi_distrik'));
            $kabupaten = $this->M_setting->get_wilayah($this->input->post('lokasi_kabkota'));
            $image = $this->M_setting->get_image($kodelap);
            $imageurl = base_url().'upload/dokumentasi/'.$image;
            $imagelink = "$imageurl";
            $infrastruktur = $this->input->post('infrastruktur');

            #$this->wasendpelapor($nowapelapor,$namapelapor,$infrastruktur,$distrik,$kabupaten);
            $this->wasendkabid($nowakabid,$kodelap,$infrastruktur,$kabupaten,$distrik,$imageurl);

            //redirect('lapor');
            
        }        
    }

    function uploadktp()
    {
            $config['upload_path']   = FCPATH.'/upload/ktp/';
            $config['allowed_types'] = '*';
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

    function uploaddokumentasi1()
    {
            $config['upload_path']   = FCPATH.'/upload/dokumentasi/';
            $config['allowed_types'] = '*';
            $this->load->library('upload',$config);

            if($this->upload->do_upload('filedokumentasi1')){
                $token=$this->input->post('token_dokumentasi');
                $kodelap=$this->input->post('kodelap');
                $nama=$this->upload->data('file_name');
                $kategori='dokumentasi1';
                $uploaded_on=date("Y-m-d H:i:s");
                $this->db->insert('upload',array('nama_file'=>$nama,'token'=>$token,'kategori'=>$kategori,'uploaded_on'=>$uploaded_on,'kodelap'=>$kodelap));
            }

    }

    function uploaddokumentasi2()
    {
            $config['upload_path']   = FCPATH.'/upload/dokumentasi/';
            $config['allowed_types'] = '*';
            $this->load->library('upload',$config);

            if($this->upload->do_upload('filedokumentasi2')){
                $token=$this->input->post('token_dokumentasi');
                $kodelap=$this->input->post('kodelap');
                $nama=$this->upload->data('file_name');
                $kategori='dokumentasi2';
                $uploaded_on=date("Y-m-d H:i:s");
                $this->db->insert('upload',array('nama_file'=>$nama,'token'=>$token,'kategori'=>$kategori,'uploaded_on'=>$uploaded_on,'kodelap'=>$kodelap));
            }

    }

    function uploaddokumentasi3()
    {
            $config['upload_path']   = FCPATH.'/upload/dokumentasi/';
            $config['allowed_types'] = '*';
            $this->load->library('upload',$config);

            if($this->upload->do_upload('filedokumentasi3')){
                $token=$this->input->post('token_dokumentasi');
                $kodelap=$this->input->post('kodelap');
                $nama=$this->upload->data('file_name');
                $kategori='dokumentasi3';
                $uploaded_on=date("Y-m-d H:i:s");
                $this->db->insert('upload',array('nama_file'=>$nama,'token'=>$token,'kategori'=>$kategori,'uploaded_on'=>$uploaded_on,'kodelap'=>$kodelap));
            }

    }

    function wasendpelapor($nowapelapor,$nama,$infrastruktur,$distrik,$kabupaten)
    {
        $setting=$this->M_setting->list_setting();
        $userkey = $setting->userkey;
        $passkey = $setting->passkey;
        $telepon = $nowapelapor;
        $message = 'Hai *'.$nama.'*, '.PHP_EOL.'Laporan Anda Tentang Infrastruktur *'.strtoupper($infrastruktur).'* di Distrik *'.strtoupper($distrik).' '.$kabupaten.'* telah kami terima dan akan diverifikasi lebih lanjut. '.PHP_EOL.' '.PHP_EOL.'Terima Kasih. | Sisikat.com'.PHP_EOL.' '.PHP_EOL.'*-Don\'t Reply!-*';;
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
                         
    }

    function wasendkabid($nowakabid,$kodelap,$infrastruktur,$kabupaten,$distrik,$imageurl)
    {
        $setting=$this->M_setting->list_setting();
        $userkey = $setting->userkey;
        $passkey = $setting->passkey;
        $telepon = $nowakabid;
        $image_link =  $imageurl;
        $caption  = 'Yth. Kabid. Bina Marga *'.$kabupaten.'* '.PHP_EOL.' '.PHP_EOL.'Anda mendapatkan 1 laporan tentang Infrastruktur *'.strtoupper($infrastruktur).'* dari Distrik *'.strtoupper($distrik).'*.'.PHP_EOL.'Silahkan masuk ke Sistem Informasi SISIKAT untuk melihat detail laporan.'.PHP_EOL.'Kode: *'.$kodelap.'* '.PHP_EOL.' '.PHP_EOL.'Terima Kasih. | Sisikat.com'.PHP_EOL.' '.PHP_EOL.'*-Don\'t Reply!-*';
        $url = 'https://console.zenziva.net/wareguler/api/sendWAFile/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'link' => $image_link,
            'caption' => $caption
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);   
                         
    }


}