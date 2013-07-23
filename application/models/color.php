<?php

class Color extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="color";
    
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';

    
    var $auto_populate_has_many = TRUE;
    var $auto_populate_has_one = TRUE;
    
    
    var $has_many=array("product");
            
    function __construct($id = NULL) {
        parent::__construct($id);
    }

    
    var $validation = array(
        'name' => array(
            'label' => 'Name',
            'rules' => array('required', 'trim','alpha_dash'),
        )
    );

}

