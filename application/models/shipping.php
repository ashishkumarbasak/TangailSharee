<?php

class Shipping extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="shipping";
    
    
    //var $auto_populate_has_many = TRUE;
	//var $auto_populate_has_one = TRUE;
    var $has_one=array('user','refund');
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    function get_shipping_name($shipping_id=NULL)
	{
		if($shipping_id!=NULL)
		{
			$this->db->select('*');
			$this->db->from('tbl_shipping');
			$this->db->where('id',$shipping_id);
			$query = $this->db->get();
			if($query->num_rows()>0)
				{
					$result = $query->result();
					return $result[0]->type;
				}
			else
				return NULL;
		}
		else
			return NULL;
	}
	
	function get_shipping_price($shipping_id=NULL)
	{
		if($shipping_id!=NULL)
		{
			$this->db->select('*');
			$this->db->from('tbl_shipping');
			$this->db->where('id',$shipping_id);
			$query = $this->db->get();
			if($query->num_rows()>0)
				{
					$result = $query->result();
					return $result[0]->price;
				}
			else
				return NULL;
		}
		else
			return NULL;
	}
    
    
    
  /*  var $validation = array(
        'name' => array(
            'label' => 'Name',
            'rules' => array('required', 'trim', 'min_length' => 3),
        ),
        'price' => array(
            'label' => 'Price',
            'rules' => array('required'),
        ),
        'original_value' => array(
            'label' => 'Original price',
            'rules' => array('required'),
        )
    );
*/
} 
?>