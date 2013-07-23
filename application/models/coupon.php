<?php

class Coupon extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="coupon";
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';
    
    
    //var $auto_populate_has_many = TRUE;
    var $auto_populate_has_one = TRUE;
    
    
    var $has_many=array(
            "user"=>array(
                'class'=>'user',
                'other_field'=>'coupon',
                'join_table'=>'tbl_user_coupon',
            ),
   			"product"=>array(
		         'class'=>'product',
		         'other_field'=>'coupon',
		          'join_table'=>'tbl_product_coupon',
		    )
        );
    var $has_one=array();
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
     
    
    var $validation = array(
        'name' => array(
            'label' => 'Name',
            'rules' => array('required', 'trim', 'min_length' => 3),
        ),
        'code' => array(
            'label' => 'Code',
            'rules' => array('required', 'unique'),
        ),
        'discount' => array(
            'label' => 'Discount',
            'rules' => array('required','discount'),
        ),
    );

   

    // Validation prepping function to encrypt passwords
    // If you look at the $validation array, you will see the password field will use this function
    function _discount($field)
    {
        // Don't encrypt an empty string
        if (!empty($this->{$field}))
        {
            // Generate a random salt if empty
            if (empty($this->type))
            {
                $this->type = 'fixed';
            }
            if($this->type=='percentage'){
            	if($this->{$field}>=100){
            		return false;
            	}
            }
            return true;
            
        }
    }
    
}

/* End of file user.php */
/* Location: ./application/models/user.php */
