<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Jeniskendaraan extends CI_Controller 
{

	function __construct() 
    {   	
		parent::__construct();		
	 $this->load->helper('url');
	 $this->load->library('form_validation');	
	//  $this->load->model('Perusahaan_m','COMP');	
	//  $this->load->model('Jabatan_m','JABAT');	
	 $this->load->model('Jeniskendaraan_m','JENISKENDARAAN');	
     $this->load->model(array('Modul_m'));  
	 //$this->isLoggedIn(FALSE);
     }
 
    public function index()
    {		
        $data['modul'] = $this->Modul_m->getall();
        $data['menu'] = $this->Modul_m->getall_menu(3);
        $data['content'] = 'master_jeniskendaraan';
        $this->load->view('include/template', $data);	
    }
    
   
	function ajax_list()
    {
        header('Content-Type: application/json');
        $list = $this->JENISKENDARAAN->get_datatables();

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
            $row[] = $value->kode_jenis;
            $row[] = $value->nama_jenis;
            $row[] = "<div>".$action."</div>";
            $data[] = $row;
        }
         $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->JENISKENDARAAN->count_all(),
                        "recordsFiltered" => $this->JENISKENDARAAN->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    function getdata_byid($id){
        $query = $this->JENISKENDARAAN->get_by_id($id);
        if($query){
            echo json_encode($query);
        }
    }


    function data_update($id){
        $data = array(
            'kode_jenis'=>$this->input->post('kode_jenis'),
            'nama_jenis'=>$this->input->post('nama_jenis')              
        );
        $update = $this->JENISKENDARAAN->data_update(array('id'=>$id),$data);
        if($update){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
    }
    
    function data_add(){
        $data = array(
            'id'=>'',
            'kode_jenis'=>$this->input->post('kode_jenis'),
            'nama_jenis'=>$this->input->post('nama_jenis')             
        );
        $add = $this->JENISKENDARAAN->data_add($data);
        if($add){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
    }
    
    function data_delete($id)
	{
		$del = $this->JENISKENDARAAN->data_delete($id);
        if($del){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
	}
}