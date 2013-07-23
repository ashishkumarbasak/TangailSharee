<?php

class Wp_users extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="wp_users";
   
    function __construct($id = NULL) {
        parent::__construct($id);
    }
}

/* End of file user.php */
/* Location: ./application/models/user.php */