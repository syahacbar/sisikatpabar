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


   
}