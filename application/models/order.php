<?php

class Order extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="order";
    
    
    var $auto_populate_has_many = TRUE;
	var $auto_populate_has_one = TRUE;
    
    
    var $has_many=array( "ordaddress"=>array( 
    					'class'=>'ordaddress',
                        'other_field'=>'order',
                        'join_table'=>'tbl_order_ordaddress',
    		),
            "product"=>array(
	                'class'=>'product',
	                'other_field'=>'order',
	            	'self_join_as'=>'order_id',
	                'other_join_as'=>'product_id',
	                'join_table'=>'tbl_order_product',
            	),'order_history'
        );
       
    var $has_one=array('user','refund');
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
	
	function get_order_id_fromSKU($sku=NULL)
	{
		if($sku!=NULL)
		{
			$this->db->select('*');
			$this->db->from('tbl_order');
			$this->db->where('SKU',$sku);
			$query = $this->db->get();
		
			if($query->num_rows()>0)
			{
				$result=$query->result();
				return $result[0]->SKU;
			}
			else
				return NULL;
		}
	}
	
	function get_orderID_from_orderSKU($sku=NULL)
	{
		if($sku!=NULL)
		{
			$this->db->select('*');
			$this->db->from('tbl_order');
			$this->db->where('SKU',$sku);
			$query = $this->db->get();
		
			if($query->num_rows()>0)
			{
				$result=$query->result();
				return $result[0]->id;
			}
			else
				return NULL;
		}
	}
	
	function process_refund_product($order_id=NULL,$product_id=NULL)
	{
		if($order_id!=NULL)
		{
			$this->db->set('request_refund','Refund Processing');
			$this->db->where('order_id',$order_id);
			if($product_id!=NULL)
			$this->db->where('product_id',$product_id);
			
			$this->db->update('tbl_order_product');
		}
	}
	
	function cancel_order_product($order_id=NULL,$product_id=NULL)
	{
		if($order_id!=NULL)
		{
			$this->db->set('request_refund','Order Canceled');
			$this->db->where('order_id',$order_id);
			if($product_id!=NULL)
			$this->db->where('product_id',$product_id);
			
			$this->db->update('tbl_order_product');
		}
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
   

    // Validation prepping function to encrypt passwords
    // If you look at the $validation array, you will see the password field will use this function
    function _encrypt($field)
    {
        // Don't encrypt an empty string
        if (!empty($this->{$field}))
        {
            // Generate a random salt if empty
            if (empty($this->salt))
            {
                $this->salt = md5(uniqid(rand(), true));
            }
            $this->{$field} = sha1($this->salt . $this->{$field});
        }
    }
    
}

/* End of file user.php */
/* Location: ./application/models/user.php */
