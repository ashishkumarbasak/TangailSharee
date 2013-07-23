<?php
class Pcategory extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="pcatagory";
    
    var $has_one=array();
    var $has_many=array('post');
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    
    
    
    
    var $validation = array(
        'name' => array(
            'label' => 'Name',
            'rules' => array('required'),
        ),
        'description' => array(
            'label' => 'Description',
            'rules' => array('required'),
        )
        
    );
    
}

