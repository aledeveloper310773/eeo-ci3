<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Marketing extends CI_Controller 
{

	function __construct() 
    {   	
		parent::__construct();		
	 $this->load->helper('url');
	 $this->load->library('form_validation');	
	 $this->load->model('Bank_m','BANK');	
	 $this->load->model('Branchbank_m','BRANCHBANK');	
	 $this->load->model('Rekeningbranchbank_m','REKENING');	
     $this->load->model('Marketing_m','MARKETING');	
     $this->load->model(array('Modul_m'));  
	 //$this->isLoggedIn(FALSE);
     }
 
    public function index()
    {		
        $data['menus']  = $this->Modul_m->menus();
        $data['content'] = 'master/master_marketing';
        $this->load->view('include/template', $data);	
    }
    
   
	function ajax_list()
    {
        header('Content-Type: application/json');
        $list = $this->MARKETING->get_datatables();
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
            $row[] = $value->kode_marketing;
            $row[] = $value->nama_marketing;
            $row[] = $value->nama_jabatan;
            $row[] = $value->no_hp;
            $row[] = $value->email;            
            $row[] = "<div>".$action."</div>";
            $data[] = $row;
        }
         $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->MARKETING->count_all(),
                        "recordsFiltered" => $this->MARKETING->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function getdata_byid($id){
        $query = $this->MARKETING->get_by_id($id);
        if($query){
            echo json_encode($query);
        }
    }
    function data_update($id){
        $data = array(
            'kode_marketing'=>$this->input->post('kode_marketing'),
            'nama_marketing'=>$this->input->post('nama_marketing'),
            'id_jabatan'=>$this->input->post('id_jabatan'),
            'no_hp'=>$this->input->post('no_hp'),                        
            'email'=>$this->input->post('email')                        
        );
        $update = $this->MARKETING->data_update(array('id'=>$id),$data);
        if($update){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
    }
    
    function data_add(){
        $data = array(
            'id'=>'',
            'kode_marketing'=>$this->input->post('kode_marketing'),
            'nama_marketing'=>$this->input->post('nama_marketing'),
            'id_jabatan'=>$this->input->post('id_jabatan'),
            'no_hp'=>$this->input->post('no_hp'),                        
            'email'=>$this->input->post('email')                        
        );
        $add = $this->MARKETING->data_add($data);
        if($add){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
    }
    
    function data_delete($id)
	{
		$del = $this->MARKETING->data_delete($id);
        if($del){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
	}
}