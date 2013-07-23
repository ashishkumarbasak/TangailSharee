<?php
class Currency extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="currency";
    
    var $has_many=array('user');
    var $has_one=array();
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    
    
    
    
    var $validation = array(
        'short_name' => array(
            'label' => 'Short name',
            'rules' => array('required'),
        ),
        'name' => array(
            'label' => 'Name',
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


