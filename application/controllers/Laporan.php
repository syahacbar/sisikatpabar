<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Laporan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
    } 

    /*
     * Listing of laporan
     */
    function index()
    {
        $infrastruktur = $this->Laporan_model->get_list_infrastruktur();
        $get_kab = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 5 AND kode LIKE '92%' ORDER BY kode ASC");

        $optinfrastruktur = array('' => '- Semua Jenis Infrastruktur -');
        foreach ($infrastruktur as $i) {
            $optinfrastruktur[$i] = $i;
        }
        
        $data['form_infrastruktur'] = form_dropdown('',$optinfrastruktur,'','id="infrastruktur" class="form-control"');
        $data['form_kab'] = $get_kab->result();
        $data['laporan'] = $this->Laporan_model->get_all_laporan('dokumentasi',1000,0);
        
        $data['_view'] = 'laporan/index';
        $this->load->view('laporan',$data);
    }

    function add_ajax_kec($id)
    {
        $query = $this->db->query("SELECT * FROM wilayah_2020 WHERE LENGTH(kode) = 8 AND LEFT(kode,5) = '$id' ORDER BY kode ASC");
        $data = "<option value='0'> - Semua Kecamatan/Distrik - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->kode."'>".$value->nama."</option>";
        }
        echo $data;
    }

    public function ajax_list()
    {
        $list = $this->Laporan_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $lap) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = "<img width='300' src='".base_url('upload/dokumentasi/').$lap->nama_file."'>";
            $row[] = word_limiter($lap->pengaduan,30);
            $row[] = $lap->lokasi_namajalan."<br>".$lap->lokasidistrik."<br>".$lap->lokasikabkota;
            $row[] = $lap->tgl_laporan;
            $row[] = "<button id='btn_lapdetail' class='btn btn-success fas' data-toggle='modal' data-target='#report-detail' data-lokasi_namajalan='".$lap->lokasi_namajalan."' data-lokasi_kabkota='".$lap->lokasikabkota."' data-lokasi_distrik='".$lap->lokasidistrik."' data-lokasi_koordinat='".$lap->latitude.", ".$lap->longitude."' data-pengaduan='".$lap->pengaduan."'><i class='fa fa-search'></i></button>";
      
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Laporan_model->count_all(),
                        "recordsFiltered" => $this->Laporan_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    /*
     * Adding a new laporan
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nama_pelapor','Nama Pelapor','required');
		$this->form_validation->set_rules('no_ktp','No Ktp','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('foto_ktp','Foto Ktp','required');
		$this->form_validation->set_rules('infrastruktur','Infrastruktur','required');
		$this->form_validation->set_rules('lokasi_namajalan','Lokasi Namajalan','required');
		$this->form_validation->set_rules('pengaduan','Pengaduan','required');
		$this->form_validation->set_rules('dokumentasi','Dokumentasi','required');
		$this->form_validation->set_rules('lokasi_koordinat','Lokasi Koordinat','required');
		$this->form_validation->set_rules('lokasi_distrik','Lokasi Distrik','required');
		$this->form_validation->set_rules('lokasi_kabkota','Lokasi Kabkota','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'infrastruktur' => $this->input->post('infrastruktur'),
				'tgl_laporan' => $this->input->post('tgl_laporan'),
				'nama_pelapor' => $this->input->post('nama_pelapor'),
				'no_ktp' => $this->input->post('no_ktp'),
				'foto_ktp' => $this->input->post('foto_ktp'),
				'lokasi_namajalan' => $this->input->post('lokasi_namajalan'),
				'lokasi_kabkota' => $this->input->post('lokasi_kabkota'),
				'lokasi_distrik' => $this->input->post('lokasi_distrik'),
				'lokasi_koordinat' => $this->input->post('lokasi_koordinat'),
				'dokumentasi' => $this->input->post('dokumentasi'),
				'alamat' => $this->input->post('alamat'),
				'pengaduan' => $this->input->post('pengaduan'),
            );
            
            $laporan_id = $this->Laporan_model->add_laporan($params);
            redirect('laporan/index');
        }
        else
        {            
            $data['_view'] = 'laporan/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a laporan
     */
    function edit($id)
    {   
        // check if the laporan exists before trying to edit it
        $data['laporan'] = $this->Laporan_model->get_laporan($id);
        
        if(isset($data['laporan']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nama_pelapor','Nama Pelapor','required');
			$this->form_validation->set_rules('no_ktp','No Ktp','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('foto_ktp','Foto Ktp','required');
			$this->form_validation->set_rules('infrastruktur','Infrastruktur','required');
			$this->form_validation->set_rules('lokasi_namajalan','Lokasi Namajalan','required');
			$this->form_validation->set_rules('pengaduan','Pengaduan','required');
			$this->form_validation->set_rules('dokumentasi','Dokumentasi','required');
			$this->form_validation->set_rules('lokasi_koordinat','Lokasi Koordinat','required');
			$this->form_validation->set_rules('lokasi_distrik','Lokasi Distrik','required');
			$this->form_validation->set_rules('lokasi_kabkota','Lokasi Kabkota','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'infrastruktur' => $this->input->post('infrastruktur'),
					'tgl_laporan' => $this->input->post('tgl_laporan'),
					'nama_pelapor' => $this->input->post('nama_pelapor'),
					'no_ktp' => $this->input->post('no_ktp'),
					'foto_ktp' => $this->input->post('foto_ktp'),
					'lokasi_namajalan' => $this->input->post('lokasi_namajalan'),
					'lokasi_kabkota' => $this->input->post('lokasi_kabkota'),
					'lokasi_distrik' => $this->input->post('lokasi_distrik'),
					'lokasi_koordinat' => $this->input->post('lokasi_koordinat'),
					'dokumentasi' => $this->input->post('dokumentasi'),
					'alamat' => $this->input->post('alamat'),
					'pengaduan' => $this->input->post('pengaduan'),
                );

                $this->Laporan_model->update_laporan($id,$params);            
                redirect('laporan/index');
            }
            else
            {
                $data['_view'] = 'laporan/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The laporan you are trying to edit does not exist.');
    } 

    /*
     * Deleting laporan
     */
    function remove($id)
    {
        $laporan = $this->Laporan_model->get_laporan($id);

        // check if the laporan exists before trying to delete it
        if(isset($laporan['id']))
        {
            $this->Laporan_model->delete_laporan($id);
            redirect('laporan/index');
        }
        else
            show_error('The laporan you are trying to delete does not exist.');
    }
    
}
