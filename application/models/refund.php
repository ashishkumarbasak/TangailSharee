<?php

class Refund extends DataMapper {
    
    var $prefix = "tbl_";
    var $table="refund";
    
    
    //var $auto_populate_has_many = TRUE;
	var $auto_populate_has_one = TRUE;
    
    
       
    var $has_one=array('order');
    
    
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    
    function change_refund_status_to_accept($order_id=NULL,$product_sku=NULL)
	{
		if($order_id!=NULL && $product_sku!=NULL)
		{
			$this->db->set('status','Payment Refunded');
			$this->db->where('order_id',$order_id);
			$this->db->where('product_sku',$product_id);
			$this->db->update('tbl_refund');
		}
	}
	
	function change_refund_status_to_reject($order_id=NULL,$product_sku=NULL)
	{
		if($order_id!=NULL && $product_sku!=NULL)
		{
			$this->db->set('status','Refund Request Rejected');
			$this->db->where('order_id',$order_id);
			$this->db->where('product_sku',$product_id);
			$this->db->update('tbl_refund');
		}
	}
	
	function change_refund_status_to_awaiting($order_id=NULL,$product_sku=NULL)
	{
		if($order_id!=NULL && $product_sku!=NULL)
		{
			$this->db->set('status','Awaiting for Pack');
			$this->db->where('order_id',$order_id);
			$this->db->where('product_sku',$product_id);
			$this->db->update('tbl_refund');
		}
	}
    
    
    
  /*  var $validation = array(
        'name' => array(
            'label' => 'Name',
            'rules' => array('required', 'trim', 'min_length' => 3),
        ),
        'price' => array(
            'label' => 'Price',
            'rules' => array('required'),
        ),
        'original_value' => array(
            'label' => 'Original price',
            'rules' => array('required'),
        )
    );

*/
}
/* End of file user.php */
/* Location: ./application/models/user.php */
