<?php
class Contest extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="contest";
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';
    
    
    var $has_many=array('graphic');
    var $has_one=array();
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    
    
    
    
    var $validation = array(
        'name' => array(
            'label' => 'Name',
            'rules' => array('required'),
        ),
        'start_date' => array(
            'label' => 'Start date',
            'rules' => array('required'),
        )
    );
    
    
    
}

