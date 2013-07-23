<?php
class Banner extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="banner";
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';
    
    
    var $has_many=array(
    				'file'=>array(
		                'class'=>'file',
		                'other_field'=>'banner',
		                'join_table'=>'tbl_banner_file'
           			 )
    			);
    var $has_one=array();
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
}
