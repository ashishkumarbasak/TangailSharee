<?php

class Email extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="email";
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';
    
    
    //var $auto_populate_has_many = TRUE;
    var $auto_populate_has_one = TRUE;
    
    
    var $has_many=array();
    var $has_one=array();
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
     
    
    var $validation = array(
    
        're_email' => array(
            'label' => 'Reply to email',
            'rules' => array('required'),
        ),
    );

   

    // Validation prepping function to encrypt passwords
    // If you look at the $validation array, you will see the password field will use this function
    
    
}

/* End of file user.php */
/* Location: ./application/models/user.php */
