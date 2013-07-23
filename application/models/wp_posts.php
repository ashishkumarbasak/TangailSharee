<?php

class Wp_posts extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="wp_posts";
   
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
}