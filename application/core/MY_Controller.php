<?php
class MY_Controller extends CI_Controller {
   public function __construct() {
      parent::__construct();
      
      if (!$this->ion_auth->is_admin())
      {
         // redirect them to the login page
         redirect('auth/login', 'refresh');
      }
   }
}