<?php
class Cms extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="cms";
    
    var $error_prefix = '<span>';
    var $error_suffix = '</span>';
    
    
    var $has_many=array(
    		'user'=>array(
    			'class'=>'user',
    			'other_field'=>'cms',
    			'join_table'=>'tbl_user_cms'
    		)
    	);
    var $has_one=array();
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    
   
    
    var $validation = array(
        'title' => array(
            'label' => 'Title',
            'rules' => array('required', 'trim', 'min_length' => 3),
        ),
        'content' => array(
            'label' => 'Content',
            'rules' => array('required'),
        ),
        
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
