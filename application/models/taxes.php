<?php

class Taxes extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="taxes";
    
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
        'name' => array(
            'label' => 'Name',
            'rules' => array('required', 'trim', 'min_length' => 3),
        ),
        'apply_to' => array(
            'label' => 'Apply to',
            'rules' => array('required'),
        ),
        'rate' => array(
            'label' => 'Rate',
            'rules' => array('required','tax_rate'),
        ),
    );

   

    // Validation prepping function to encrypt passwords
    // If you look at the $validation array, you will see the password field will use this function
    function _tax_rate($field)
    {
        // Don't encrypt an empty string
        if (!empty($this->{$field}))
        {
            // Generate a random salt if empty
            	if($this->{$field}>=100){
            		return false;
            	}
            return true;
            
        }
    }
    
}

/* End of file user.php */
/* Location: ./application/models/user.php */
