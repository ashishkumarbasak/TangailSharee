<?php
class Video extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="video";
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';
    
    
    var $auto_populate_has_many = TRUE;
    var $auto_populate_has_one = TRUE;
    
    
    var $has_many=array(
            "comment"=>array(
                'class'=>'comment',
                'other_field'=>'video',
                'self_join_as'=>'video_id',
                'other_join_as'=>'comment_id',
                'join_table'=>'tbl_video_comment',
            )
        );
    var $has_one=array('user');
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    
    
    
    
    var $validation = array(
     		'title' => array(
            'label' => 'Title',
            'rules' => array('required', 'trim', 'alpha_dash', 'min_length' => 3),
        ),
        'link' => array(
            'label' => 'Link',
            'rules' => array('required', 'trim', 'unique')
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

