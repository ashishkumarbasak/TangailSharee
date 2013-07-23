<?php


class Order_product extends DataMapper {

	var $prefix = "tbl_";
    var $table="order_product";

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
	
	function reject_refund_request($order_id=NULL,$product_id=NULL)
	{
		if($order_id!=NULL && $product_id!=NULL)
		{
			$this->db->set('request_refund','Refund Request Rejected');
			$this->db->where('order_id',$order_id);
			$this->db->where('product_id',$product_id);
			$this->db->update('tbl_order_product');
		}
	}
	
	function awaiting_for_pack_refund_request($order_id=NULL,$product_id=NULL)
	{
		if($order_id!=NULL && $product_id!=NULL)
		{
			$this->db->set('request_refund','Awaiting for Pack');
			$this->db->where('order_id',$order_id);
			$this->db->where('product_id',$product_id);
			$this->db->update('tbl_order_product');
		}
	}
	
	function accept_refund_request($order_id=NULL,$product_id=NULL)
	{
		if($order_id!=NULL && $product_id!=NULL)
		{
			$this->db->set('request_refund','Payment Refunded');
			$this->db->where('order_id',$order_id);
			$this->db->where('product_id',$product_id);
			$this->db->update('tbl_order_product');
		}
	}
	
	function get_product_sales_price($order_id=NULL,$product_id=NULL)
	{
		if($order_id!=NULL && $product_id!=NULL)
		{
			$this->db->select('prize');
			$this->db->from('tbl_order_product');
			$this->db->where('order_id',$order_id);
			$this->db->where('product_id',$product_id);
			
			$query = $this->db->get();
			if($query->num_rows()>0)
			{
				$result = $query->result();
				return $result[0]->prize;
			}
			else
				return 0;
		}
		else
			return 0;
	}
	
	
	function get_num_of_request($order_id=NULL,$product_id=NULL)
	{
		if($order_id!=NULL)
		{
			$this->db->select('*');
			$this->db->from('tbl_order_product');
			$this->db->where('order_id',$order_id);
			$this->db->where('request_refund',"Refund Processing");
			
			$query = $this->db->get();
			return $query->num_rows();
		}
	}
}

/* End of file order_product.php */
/* Location: ./application/models/country.php */
