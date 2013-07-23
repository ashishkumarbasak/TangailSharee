<?php
class product_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function insertProduct($data){
        if($this->db->insert("tbl_product",$data))
            return true;
        else
            return false;
    }
    
    
    function updateProduct($data){
        $this->db->where(array("product_id"=>$data['product_id']));
        if($this->db->update("tbl_product",$data))
            return true;
        else
            return false;
    }
    
    
    function deleteProduct($product_id){
        $this->db->where(array("product_id"=>$product_id));
        if($this->db->update(array("is_active"=>"0")))
            return true;
        else
            return false;
    }
    
    
    function getProdect($product_id){
        $this->db->where(array("product_id"=>$product_id));
        $q=$this->db->get("tbl_product");
        if($q->num_rows==1){
            return $q->row();
        }  else {
            return false;
        }
    }
	
	function update_product_processing_order($product_id=NULL,$product_size=NULL,$product_quantity=NULL)
	{
		if($product_id!=NULL && $product_size!=NULL && $product_quantity!=NULL)
		{
			$this->db->select('sold_in_process');
			$this->db->from('tbl_product_size');
			$this->db->where('product_id',$product_id);
			$this->db->where('size_id',$product_size);
			$query = $this->db->get();
			if($query->num_rows() > 0)
			{
				$result = $query->result();
				$current_t = $result[0]->sold_in_process;
			}
			else
				$current_t = 0;
				
			$this->db->set('sold_in_process',($current_t+$product_quantity));
			$this->db->where('product_id',$product_id);
			$this->db->where('size_id',$product_size);
			$this->db->update('tbl_product_size');
		}
		else
			return NULL;
	}
    
    
    function getProductByCatagory($catagory_id){
        
    }
}