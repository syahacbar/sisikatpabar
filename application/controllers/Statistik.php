<?php
 
class Statistik extends CI_Controller{
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
        $this->load->view('statistik');
    }
}