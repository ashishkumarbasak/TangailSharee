<?php
class Designer_payment extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="designer_payment";
    
    var $has_many=array();
    var $has_one=array('user');
    
   
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
}