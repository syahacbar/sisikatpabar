<?php
 
class Lapor extends CI_Controller{
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
        $data['laporan'] = $this->Laporan_model->get_all_laporan();
        
        $data['_view'] = 'home';
        $this->load->view('home',$data);
    }
}