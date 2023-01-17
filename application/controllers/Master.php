<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Master extends CI_Controller 
{

	function __construct() 
    {   	
		parent::__construct();		
      $this->load->helper('url');
      $this->load->library('form_validation');	
      $this->load->Model('Perusahaan_m','COMP');
      $this->load->model('Jabatan_m','JABAT');	
      $this->load->Model('Bank_m','BANK');
      $this->load->Model('Branchbank_m','BRANCHBANK');
      $this->load->model('Rekeningbranchbank_m','REKENING');	      
      $this->load->model('Jeniskendaraan_m','JENISKENDARAAN');	
      $this->load->model('Brand_m','BRAND');	
      $this->load->model('Marketing_m','MARKETING');	
      $this->load->model('Customer_m','CUSTOMER');	
      $this->load->Model('Modul_m');	
	 //$this->isLoggedIn(FALSE);
    }

  public function index()
  {		
    $data['menus'] = $this->Modul_m->menus();
    $data['submenus']  = $this->Modul_m->submenus();
    $data['content'] = 'master/dashboardmaster';    
    $this->load->view('include/template', $data); 
    }

public function mstrperusahaan()
{		
    $data['menus'] = $this->Modul_m->menus();
    $data['jabatan']  = $this->JABAT->getall();   
    $data['content'] = 'master/master_perusahaan';
    $this->load->view('include/template', $data);	
}	


public function mstrjabatan()
{		
    $data['menus'] = $this->Modul_m->menus();
    $data['content'] = 'master/master_jabatan';
    $this->load->view('include/template', $data);	
}	


public function mstrbank()
{		
    $data['menus'] = $this->Modul_m->menus();
    $data['content'] = 'master/master_bank';
    $this->load->view('include/template', $data);	
}	

public function mstrbranchbank()
{		
    $data['menus'] = $this->Modul_m->menus();
    $data['bank']  = $this->BANK->getall();    
    $data['content'] = 'master/master_branchbank';
    $this->load->view('include/template', $data);	
}	


public function mstrrekbank()
{		
    $data['menus'] = $this->Modul_m->menus();
    $data['branch']  = $this->BRANCHBANK->getall();    
    $data['content'] = 'master/master_rekeningbranchbank';
    $this->load->view('include/template', $data);	
}	


public function mstrrekbankcomp()
{		
    $data['menus'] = $this->Modul_m->menus();
    $data['perusahaan']  = $this->COMP->getall();    
    $data['rekening']  = $this->REKENING->getall_withinfo();    
    $data['content'] = 'master/master_rekeningperusahaan';
    $this->load->view('include/template', $data);	
}	


public function mstrmarketing()
{		
    $data['menus'] = $this->Modul_m->menus();
    $data['jabatan']  = $this->JABAT->getall(); 
    $data['content'] = 'master/master_marketing';
    $this->load->view('include/template', $data);	
}	



public function mstrjeniskendaraan()
{		
    $data['menus'] = $this->Modul_m->menus();
    $data['content'] = 'master/master_jeniskendaraan';
    $this->load->view('include/template', $data);	
}	


public function mstrbrand()
{		
    $data['menus'] = $this->Modul_m->menus();
    $data['jeniskendaraan']  = $this->JENISKENDARAAN->getall(); 
    $data['content'] = 'master/master_brand';
    $this->load->view('include/template', $data);	
}	

public function mstrmcode()
{		
    $data['menus'] = $this->Modul_m->menus();
    $data['content'] = 'master/master_mcode';
    $this->load->view('include/template', $data);	
}	

public function mstrcustomer()
{		
    $data['menus'] = $this->Modul_m->menus();
    $data['jabatan']  = $this->JABAT->getall(); 
    $data['brand']  = $this->BRAND->getallinfo(); 
    $data['content'] = 'master/master_customer';
    $this->load->view('include/template', $data);	
}	


public function mstrmarketingcustomer()
{		
    $data['menus'] = $this->Modul_m->menus();
    $data['customer']  = $this->CUSTOMER->getall(); 
    $data['marketing']  = $this->MARKETING->getall(); 
    $data['content'] = 'master/master_marketingcustomer';
    $this->load->view('include/template', $data);	
}	



}