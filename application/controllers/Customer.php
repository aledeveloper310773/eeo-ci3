<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Customer extends CI_Controller 
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
     $this->load->model(array('Modul_m'));  
	 //$this->isLoggedIn(FALSE);
     }
 
    public function index()
    {		
        $data['menus']  = $this->Modul_m->menus();
        $data['content'] = 'master/master_customer';
        $this->load->view('include/template', $data);	
    }
   
   
	function ajax_list()
    {
        header('Content-Type: application/json');
        $list = $this->CUSTOMER->get_datatables();
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
            $row[] = $value->kode_customer;
            $row[] = $value->nama_customer;
            $row[] = $value->nama_alias;
            $row[] = $value->alamat_customer;
            $row[] = $value->no_telp;
            $row[] = $value->NPWP;
            $row[] = $value->alamat_NPWP;
            $row[] = $value->nama_pic;
            $row[] = $value->no_hp_pic;
            $row[] = $value->nama_jabatan;
            $row[] = $value->email_pic;
            $row[] = $value->up_surat;
            $row[] = $value->nama_jabatan_up_surat;
            $row[] = $value->email_up_surat;                                                                                                            
            $row[] = $value->nama_brand;                                                                                                            
            $row[] = "<div>".$action."</div>";
            $data[] = $row;
        }
         $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->CUSTOMER->count_all(),
                        "recordsFiltered" => $this->CUSTOMER->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    function getdata_byid($id){
        $query = $this->CUSTOMER->get_by_id($id);
        if($query){
            echo json_encode($query);
        }
    }
    function data_update($id){
        $data = array(
            'kode_customer'=>$this->input->post('kode_customer'),
            'nama_customer'=>$this->input->post('nama_customer'),
            'nama_alias'=>$this->input->post('nama_alias'),
            'alamat_customer'=>$this->input->post('alamat_customer'),
            'no_telp'=>$this->input->post('no_telp'),
            'NPWP'=>$this->input->post('NPWP'),
            'alamat_NPWP'=>$this->input->post('alamat_NPWP'),
            'nama_pic'=>$this->input->post('nama_pic'),
            'no_hp_pic'=>$this->input->post('no_hp_pic'),
            'id_jabatan'=>$this->input->post('id_jabatan'),
            'email_pic'=>$this->input->post('email_pic'),
            'up_surat'=>$this->input->post('up_surat'),
            'jabatan_up_surat'=>$this->input->post('jabatan_up_surat'),
            'email_up_surat'=>$this->input->post('email_up_surat') ,
            'id_brand'=>$this->input->post('id_brand')                                                                                                                                               
        );
        $update = $this->CUSTOMER->data_update(array('id'=>$id),$data);
        if($update){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
    }
    
    function data_add(){
        $data = array(
            'id'=>'',
            'kode_customer'=>$this->input->post('kode_customer'),
            'nama_customer'=>$this->input->post('nama_customer'),
            'nama_alias'=>$this->input->post('nama_alias'),
            'alamat_customer'=>$this->input->post('alamat_customer'),
            'no_telp'=>$this->input->post('no_telp'),
            'NPWP'=>$this->input->post('NPWP'),
            'alamat_NPWP'=>$this->input->post('alamat_NPWP'),
            'nama_pic'=>$this->input->post('nama_pic'),
            'no_hp_pic'=>$this->input->post('no_hp_pic'),
            'id_jabatan'=>$this->input->post('id_jabatan'),
            'email_pic'=>$this->input->post('email_pic'),
            'up_surat'=>$this->input->post('up_surat'),
            'jabatan_up_surat'=>$this->input->post('jabatan_up_surat'),
            'email_up_surat'=>$this->input->post('email_up_surat') ,
            'id_brand'=>$this->input->post('id_brand')                               
        );
        $add = $this->CUSTOMER->data_add($data);
        if($add){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
    }
    
    function data_delete($id)
	{
		$del = $this->CUSTOMER->data_delete($id);
        if($del){
            echo json_encode(TRUE);
        }else{
            echo json_encode(FALSE);
        }
	}
}