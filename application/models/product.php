<?php

class Product extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="product";
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';
    
    
    //var $auto_populate_has_many = TRUE;
    var $auto_populate_has_one = TRUE;
    
    
    var $has_many=array(
    		"discount",
            "comment"=>array(
                'class'=>'comment',
                'other_field'=>'product',
                'self_join_as'=>'product_id',
                'other_join_as'=>'comment_id',
                'join_table'=>'tbl_product_comment',
            ),
            "file"=>array(
                'class'=>'file',
                'other_field'=>'product',
                'join_table'=>'tbl_product_file',
            ),
            "size"=>array(
                'class'=>'size',
                'other_field'=>'product',
                'join_table'=>'tbl_product_size',
            ),
            "wishlist"=>array(
                'class'=>'wishlist',
                'other_field'=>'product',
                'join_table'=>'tbl_product_wishlist',
            ),
   			"catagory"=>array(
                'class'=>'catagory',
                'other_field'=>'product',
                'join_table'=>'tbl_product_catagory',
   	    ),
	    "order"=>array(
		 'class'=>'order',
		 'other_field'=>'product',
		  'join_table'=>'tbl_order_product',
	    ),
	     "coupon"=>array(
		 'class'=>'coupon',
		 'other_field'=>'product',
		  'join_table'=>'tbl_product_coupon',
	    )
        );
    var $has_one=array('user','color');
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
     
    
    var $validation = array(
        'name' => array(
            'label' => 'Name',
            'rules' => array('required', 'trim', 'min_length' => 3),
        )
    );

   
   function get_productID_from_productSKU($sku=NULL)
	{
		if($sku!=NULL)
		{
			$this->db->select('*');
			$this->db->from('tbl_product');
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
