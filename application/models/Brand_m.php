<?php
class Brand_m extends CI_Model{

	var $table = 'tbl_mstr_brand';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    var $column_order = array(null,  'tbl_mstr_brand.kode_brand','tbl_mstr_brand.nama_brand',
    'tbl_mstr_jnskendaraan.nama_jenis');        
    var $column_search = array('tbl_mstr_brand.kode_brand','tbl_mstr_brand.nama_brand',
    'tbl_mstr_jnskendaraan.nama_jenis');
    var $order = array('tbl_mstr_brand.nama_brand' => 'asc');
       
    private function _get_datatables_query()
    {
        // SELECT tbl_mstr_brand.id, tbl_mstr_brand.kode_brand , tbl_mstr_brand.nama_brand , 
        // tbl_mstr_brand.id_jnskendaraan  , tbl_mstr_jnskendaraan.nama_jenis
        // FROM  tbl_mstr_brand
        // INNER JOIN tbl_mstr_jnskendaraan ON tbl_mstr_brand.id_jnskendaraan = tbl_mstr_jnskendaraan.id
        $this->db->select('tbl_mstr_brand.id, tbl_mstr_brand.kode_brand , tbl_mstr_brand.nama_brand , 
        tbl_mstr_brand.id_jnskendaraan  , tbl_mstr_jnskendaraan.nama_jenis');        
        $this->db->join('tbl_mstr_jnskendaraan','tbl_mstr_brand.id_jnskendaraan= tbl_mstr_jnskendaraan.id');          
        $this->db->from('tbl_mstr_brand');
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
	public function getall()
	{
	$this->db->from($this->table);
	$query=$this->db->get();
	return $query->result();
	}

	public function getallinfo()
	{
    $this->db->select('tbl_mstr_brand.id, tbl_mstr_brand.kode_brand , tbl_mstr_brand.nama_brand , 
    tbl_mstr_brand.id_jnskendaraan  , tbl_mstr_jnskendaraan.nama_jenis');        
    $this->db->join('tbl_mstr_jnskendaraan','tbl_mstr_brand.id_jnskendaraan= tbl_mstr_jnskendaraan.id');          
    $this->db->from($this->table);
	$query=$this->db->get();
	return $query->result();
	}



	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function data_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function data_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function data_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

}