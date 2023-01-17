<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Transaksi extends CI_Controller {

	function __construct() {   	
		parent::__construct();		
      $this->load->helper('url');
      $this->load->library('form_validation');	
      $this->load->Model('Perusahaan_m','COMP');
      $this->load->Model('Modul_m');	
	 //$this->isLoggedIn(FALSE);
  }

  public function index()
  {		
     $data['menus']  = $this->Modul_m->menus();
    $data['content'] = 'transaksi/dashboardtransaksi';    
    $this->load->view('include/template', $data); 
}




}