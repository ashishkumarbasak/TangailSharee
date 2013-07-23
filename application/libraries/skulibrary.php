<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------
class Skulibrary
{
   function Skulibrary()
    {
		$this->obj =& get_instance();
		$this->obj->load->helper(array('string'));
    }
   
   
   public function generate_order_sku($orderid=NULL)
   {
   		if($orderid!=NULL)
		{
			$sku_month=date("m");
			$sku_day=date("d");
			$random_number = $this->generate_random_number();
			$sku_orderid = str_pad($orderid,3, "0",STR_PAD_LEFT);
			$OrderSKU = $sku_month.$sku_day.$random_number.$sku_orderid;
			return $OrderSKU;
		}
		else
			return NULL;
   }
   
   public function generate_random_number()
   {
   		$random_string = random_string('alnum', 6);
		return strtoupper($random_string);
   }
   
    public function generate_product_sku($product_id=NULL)
   {
   		if($product_id!=NULL)
		{
			$sku_month=date("m");
			$sku_day=date("d");
			$random_number = $this->generate_random_number();
			$sku_productid = str_pad($product_id,3, "0",STR_PAD_LEFT);
			$ProductSKU = $sku_month.$sku_day.$random_number.$sku_productid;
			return $ProductSKU;
		}
		else
			return NULL;
   }

	
}
?>