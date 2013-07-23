<?php
class Graphic extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="graphic";
    
    var $has_many=array();
    var $has_one=array('user','file','contest');
    
    
     
    //var $auto_populate_has_many = TRUE;
    var $auto_populate_has_one = TRUE;
    
    
    
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    
    
    
    
    var $validation = array(
        'file_id' => array(
            'label' => 'Image',
            'rules' => array('required'),
        )
    );
    
    
    
}

