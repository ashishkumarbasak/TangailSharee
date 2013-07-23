<?php
class Post extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="post";
    
    var $has_many=array('pcategory');
    var $has_one=array(
            "user"=>array(
                'class'=>'user',
                'other_field'=>'post',
                'self_join_as'=>'post_id',
                'other_join_as'=>'user_id',
                'join_table'=>'tbl_user_post',
            )
           
        );
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    
    
    
    
    var $validation = array(
        'title' => array(
            'label' => 'title',
            'rules' => array('required'),
        ),
        'description' => array(
            'label' => 'description',
            'rules' => array('required'),
        )
    );

    
}

