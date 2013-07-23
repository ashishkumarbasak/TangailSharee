<?php

class Paymentmethod extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="paymentmethod";
    
    
    //var $auto_populate_has_many = TRUE;
	//var $auto_populate_has_one = TRUE;
    var $has_one=array('user','refund');
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
} 
?>