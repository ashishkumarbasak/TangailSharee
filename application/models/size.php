<?php

class Size extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="size";
    
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';

    
    var $auto_populate_has_many = TRUE;
    var $auto_populate_has_one = TRUE;
    
    
    var $has_many=array(
            "product"=>array(
                'class'=>'product',
                'other_field'=>'size',
                'join_table'=>'tbl_product_size',
            ),
            
        );
    function __construct($id = NULL) {
        parent::__construct($id);
    }

    
    var $validation = array(
        'name' => array(
            'label' => 'Name',
            'rules' => array('required', 'trim','alpha_dash'),
        ),
        'description' => array(
            'label' => 'Description',
            'rules' => array('required')
        )
    );

}

