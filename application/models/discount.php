<?php

class Discount extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="discount";
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';
    
    
    //var $auto_populate_has_many = TRUE;
    var $auto_populate_has_one = TRUE;
    
    
    var $has_many=array();
    var $has_one=array('product');
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
     
    
    var $validation = array(
        'quantity' => array(
            'label' => 'Name',
            'rules' => array('required', 'trim','number'),
        ),
        'price' => array(
            'label' => 'Price',
            'rules' => array('required', 'number'),
        ),
        'start_date' => array(
            'label' => 'Start Date',
            'rules' => array('required'),
        ),
        'end_date' => array(
            'label' => 'End Date',
            'rules' => array('required'),
        )
    );

   

    // Validation prepping function to encrypt passwords
    // If you look at the $validation array, you will see the password field will use this function
}

/* End of file user.php */
/* Location: ./application/models/user.php */
