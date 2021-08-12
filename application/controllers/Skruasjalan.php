<?php
 
class Skruasjalan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->model('m_setting');
        $this->load->library('session');
        $this->load->model('M_skruasjalan');
    } 


    /*
     * Listing of laporan
     */
    function index ()
    {
        $data['_view'] = 'public/skruasjalan';
        $data['title'] = 'SI-SIKAT | SK Ruas Jalan';
        $data['skruasjalan'] = $this->M_skruasjalan->get_all_skruasjalan();
        $this->load->view('public/layout',$data);
    }


    public function do_upload()
    {
            $config['upload_path']          = './upload/skruasjalan/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload_form', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    $this->load->view('upload_success', $data);
            }
    }
}