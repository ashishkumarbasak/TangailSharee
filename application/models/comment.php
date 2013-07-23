<?php
class Comment extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="comment";
    
    var $has_many=array();
    var $has_one=array(
            'user',
            "product"=>array(
                'class'=>'product',
                'other_field'=>'comment',
                'self_join_as'=>'comment_id',
                'other_join_as'=>'product_id',
                'join_table'=>'tbl_product_comment',
            ),
            "project"=>array(
                'class'=>'project',
                'other_field'=>'comment',
                'self_join_as'=>'comment_id',
                'other_join_as'=>'project_id',
                'join_table'=>'tbl_project_comment',
            ),
            "upcoming_design"=>array(
                'class'=>'upcoming_design',
                'other_field'=>'comment',
                'self_join_as'=>'comment_id',
                'other_join_as'=>'upcoming_design_id',
                'join_table'=>'tbl_upcoming_design_comment',
            ),
            "video"=>array(
                'class'=>'video',
                'other_field'=>'comment',
                'self_join_as'=>'comment_id',
                'other_join_as'=>'video_id',
                'join_table'=>'tbl_video_comment',
            )
        );
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    
    
    
    
    var $validation = array(
        'content' => array(
            'label' => 'Content',
            'rules' => array('required'),
        )
    );

    

    
    function _encrypt($field)
    {
        // Don't encrypt an empty string
        if (!empty($this->{$field}))
        {
            // Generate a random salt if empty
            if (empty($this->salt))
            {
                $this->salt = md5(uniqid(rand(), true));
            }
            $this->{$field} = sha1($this->salt . $this->{$field});
        }
    }
    
}

