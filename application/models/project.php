<?php

class Project extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="project";
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';
    
    
    //var $auto_populate_has_many = TRUE;
    var $auto_populate_has_one = TRUE;
    
    
    var $has_many=array(
            "comment"=>array(
                'class'=>'comment',
                'other_field'=>'project',
                'self_join_as'=>'project_id',
                'other_join_as'=>'comment_id',
                'join_table'=>'tbl_project_comment',
            ),
            "file"=>array(
                'class'=>'file',
                'other_field'=>'project',
            	'self_join_as'=>'project_id',
                'other_join_as'=>'file_id',
                'join_table'=>'tbl_project_file',
            )
        );
    var $has_one=array('user');
    
    
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