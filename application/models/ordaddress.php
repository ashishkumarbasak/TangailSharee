<?php
class Ordaddress extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="ordaddress";
    
    var $has_many=array();
    var $has_one=array(
    			"order"=>array(
                    'class'=>'order',
                    'other_field'=>'ordaddress',
                    'join_table'=>'tbl_order_ordaddress',
    			)
    );
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    
   
    
    var $validation = array(
        'address_line1' => array(
            'label' => 'Address Line1',
            'rules' => array('required', 'trim', 'min_length' => 3),
        ),
        'city' => array(
            'label' => 'City',
            'rules' => array('required'),
        ),
        'country' => array(
            'label' => 'Country',
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


