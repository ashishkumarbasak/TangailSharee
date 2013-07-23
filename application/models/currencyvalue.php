<?php
class Currencyvalue extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="currency_value";
    
    var $has_many=array();
    var $has_one=array(
            'base_currency'=>array(
                'class'=>'currency',
                'other_field'=>'base_currency_value',
                'self_join_as'=>'currency_value_id',
                'other_join_as'=>'base_currency_id',
                'join_table'=>'tbl_currency_currency_value',
            ),
            'top_currency'=>array(
                'class'=>'currency',
                'other_field'=>'top_currency_value',
                'self_join_as'=>'currency_value_id',
                'other_join_as'=>'base_currency_id',
                'join_table'=>'tbl_currency_currency_value',
            )
           
        );
    
    
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


