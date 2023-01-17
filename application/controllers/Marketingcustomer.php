<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Marketingcustomer extends CI_Controller 
{

	function __construct() 
    {   	
		parent::__construct();		
	 $this->load->helper('url');
	 $this->load->library('form_validation');	
	 $this->load->model('Bank_m','BANK');	
	 $this->load->model('Branchbank_m','BRANCHBANK');	
	 $this->load->model('Rekeningbranchbank_m','REKENING');	
	 $this->load->model('Customer_m','CUSTOMER');	
	 $this->load->model('Marketingcustomer_m','MARKETINGCUSTOMER');	
     $this->load->model(array('Modul_m'));  
	 //$this->isLoggedIn(FALSE);
     }
 
    public function index()
    {		
        $data['menus']  = $this->Modul_m->menus();
        $data['content'] = 'master/master_marketingcustomer';
        $this->load->view('include/template', $data);	
    }
   
   
	function ajax_list()
    {
        header('Content-Type: application/json');
        $list = $this->MARKETINGCUSTOMER->get_datatables();
        // print_r($this->db->last_query());
        // exit();
        $data = array();
        $no = $_POST['start'];
        $action = "";
        foreach ($list as $value) {
            $no++;
            $row = array();
            //row pertama akan kita gunakan untuk btn edit dan delete
            $action =  '<a href="#" class="btn-action" onclick="edit_data('.$value->id.')"><i class="fa fa-pencil"></i></a>';
            $action .=  '<a href="#" class="btn-action" onclick="delete_data('.$value->id.')"><i class="fa fa-trash"></i></a>';
            $row[] = $no;
            $row[] = $value->nama_customer;
            $row[] = $value->nama_alias;
            $row[] = $value->kode_marketing;
            $row[] = $value->nama_marketing;
            $row[] = $value->no_hp;
            $row[] = $value->email;
            $row[] = $value->nama_jabatan;
            $row[] = "<div>".$action."</div>";
            $data[] = $row;
        }
         $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->MARKETINGCUSTOMER->count_all(),
                        "recordsFiltered" => $this->MARKETINGCUSTOMER->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function getdata_byid($id){
        $query = $this->MARKETINGCUSTOMER->get_by_id($id);
        if($query){
            echo json_encode($query);
        }
    }
    function data_update($id){
        $data = array(
            'id_customer'=>$this->input->post('id_customer'),
            'id_marketing'=>$this->input->post('id_marketing')                                                                                                                                             
        );
        $update = $this->MARKETINGCUSTOMER->data_update(array('id'=>$id),$data);
        if($update){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
    }
    
    function data_add(){
        $data = array(
            'id'=>'',
            'id_customer'=>$this->input->post('id_customer'),
            'id_marketing'=>$this->input->post('id_marketing')                           
        );
        $add = $this->MARKETINGCUSTOMER->data_add($data);
        if($add){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
    }
    
    function data_delete($id)
	{
		$del = $this->MARKETINGCUSTOMER->data_delete($id);
        if($del){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
	}
}