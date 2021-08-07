<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {

  public function __construct() {

    parent::__construct();

    // load base_url
    $this->load->helper('url');
  }

  public function index()
  {
    $data['heading'] = 'tes';
    $data['message'] = 'error';
    $this->load->view('errors/cli/error_404',$data);
 
  }

}