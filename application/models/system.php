<?php
class System extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="system";
    
    var $has_many=array();
    var $has_one=array();
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    
   
    
    /*var $validation = array(
        'content' => array(
            'label' => 'Content',
            'rules' => array('required'),
        ),
        'content' => array(
            'label' => 'Content',
            'rules' => array('required'),
        ),
        'content' => array(
            'label' => 'Content',
            'rules' => array('required'),
        ),
        'content' => array(
            'label' => 'Content',
            'rules' => array('required'),
        ),
        'content' => array(
            'label' => 'Content',
            'rules' => array('required'),
        ),
        
    );
	*/
    
    
}
