<?php
class Refund_history extends DataMapper {

	var $prefix = "tbl_";
    var $table="refund_history";
    
    var $auto_populate_has_one = TRUE;
    
    
    var $has_one=array('order');
	
	
	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}

/* End of file order_product.php */
/* Location: ./application/models/country.php */
