<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Mcode extends CI_Controller 
{

	function __construct() 
    {   	
		parent::__construct();		
	 $this->load->helper('url');
	 $this->load->library('form_validation');	
	//  $this->load->model('Perusahaan_m','COMP');	
	//  $this->load->model('Jabatan_m','JABAT');	
	 $this->load->model('Jeniskendaraan_m','JENISKENDARAAN');	
	 $this->load->model('Mcode_m','MCODE');	     
     $this->load->model(array('Modul_m'));  
	 //$this->isLoggedIn(FALSE);
     }
 
    public function index()
    {		
        $data['modul'] = $this->Modul_m->getall();
        $data['menu'] = $this->Modul_m->getall_menu(3);
        $data['content'] = 'master_mcode';
        $this->load->view('include/template', $data);	
    }
    
   
	function ajax_list()
    {
        header('Content-Type: application/json');
        $list = $this->MCODE->get_datatables();

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
            $row[] = $value->kode_mcode;
            $row[] = $value->nama_mcode;
            $row[] = "<div>".$action."</div>";
            $data[] = $row;
        }
         $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->MCODE->count_all(),
                        "recordsFiltered" => $this->MCODE->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    function getdata_byid($id){
        $query = $this->MCODE->get_by_id($id);
        if($query){
            echo json_encode($query);
        }
    }


    function data_update($id){
        $data = array(
            'kode_mcode'=>$this->input->post('kode_mcode'),
            'nama_mcode'=>$this->input->post('nama_mcode')              
        );
        $update = $this->MCODE->data_update(array('id'=>$id),$data);
        if($update){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
    }
    
    function data_add(){
        $data = array(
            'id'=>'',
            'kode_mcode'=>$this->input->post('kode_mcode'),
            'nama_mcode'=>$this->input->post('nama_mcode')             
        );
        $add = $this->MCODE->data_add($data);
        if($add){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
    }
    
    function data_delete($id)
	{
		$del = $this->MCODE->data_delete($id);
        if($del){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
	}
}