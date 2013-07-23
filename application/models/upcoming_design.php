<?php

class Upcoming_design extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="upcoming_design";
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';
    
    
    //var $auto_populate_has_many = TRUE;
    var $auto_populate_has_one = TRUE;
    
    
    var $has_many=array(
            "comment"=>array(
                'class'=>'comment',
                'other_field'=>'upcoming_design',
                'self_join_as'=>'upcoming_design_id',
                'other_join_as'=>'comment_id',
                'join_table'=>'tbl_upcoming_design_comment',
            )
            
        );
    var $has_one=array(
    			'user',
    			"file"=>array(
	                'class'=>'file',
	                'other_field'=>'upcoming_design',
	            	'self_join_as'=>'upcoming_design_id',
	                'other_join_as'=>'file_id',
	                'join_table'=>'tbl_upcoming_design_file',
            	)
    	);
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
     
    
    var $validation = array(
        'title' => array(
            'label' => 'Title',
            'rules' => array('required'),
        ),
        'date_added' => array(
            'label' => 'Date Added',
            'rules' => array('required'),
        )
    );

}