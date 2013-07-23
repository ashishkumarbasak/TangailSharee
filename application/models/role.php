<?php

class Role extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="role";
    
    var $has_many=array('user');
    var $has_one=array();
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';
   
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    var $validation = array(
        'name' => array(
            'label' => 'Name',
            'rules' => array('required', 'trim', 'unique', 'alpha_dash', 'min_length' => 3, 'max_length' => 50),
        ),
     );
}
