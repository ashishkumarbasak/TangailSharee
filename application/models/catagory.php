<?php
class Catagory extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="catagory";
    
    var $has_many=array(
    		'product'=>array(
                'class'=>'product',
                'other_field'=>'catagory',
                'join_table'=>'tbl_product_catagory',
            ),
            'coupon'=>array(
                'class'=>'coupon',
                'other_field'=>'catagory',
                'join_table'=>'tbl_coupon_catagory',
            )
        );
    var $has_one=array();
    
    
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
        ),
        
    );
    
}

