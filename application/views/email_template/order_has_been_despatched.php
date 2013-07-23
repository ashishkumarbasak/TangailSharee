<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
	New Order Notification at Twinne!
</title>
</head>
<body>
Dear <?php if(isset($profile_name)) echo $profile_name; ?>,
<br><br>
Your online order with Twinne has been despatched. The following products are on their way to you:
<br><br>
Your order ID is <?php echo $order->SKU; ?>
<br><br>
Order details:
<br><br>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="order-product-table" style="margin-bottom: 20px;border: 1px solid #d2d2d2;border-right:0px;">
  <tr>
    <th style="padding: 5px 0 5px 5px;text-align: left;border: 1px solid #d2d2d2;background:#d2d2d2;">Product ID</th>
    <th style="padding: 5px 0 5px 5px;text-align: left;border: 1px solid #d2d2d2;background:#d2d2d2;">Item</th>
    <th style="padding: 5px 0 5px 5px;text-align: left;border: 1px solid #d2d2d2;background:#d2d2d2;">Product Image</th>
    <th style="padding: 5px 0 5px 5px;text-align: left;border: 1px solid #d2d2d2;background:#d2d2d2;text-align:center !important;">Size</th>
    <th style="padding: 5px 0 5px 5px;text-align: left;border: 1px solid #d2d2d2;background:#d2d2d2;text-align:center !important;">Genre</th>
    <th style="padding: 5px 0 5px 5px;text-align: left;border: 1px solid #d2d2d2;background:#d2d2d2;text-align:center !important;">Quantity</th>
    <th style="padding: 5px 0 5px 5px;text-align: left;border: 1px solid #d2d2d2;background:#d2d2d2;text-align:center !important;">Total</th>
  </tr>
  <?php $sub_total = 0; $i=0; 
    		 	foreach($order->product as $prod){ 
				?>
  <?php if($i%2!='0'){
	    			$style="style=\"background: #ececec;\"";
	    		}else{
	    			$style="";
	    		}
	    		?>
  <tr <?php echo $style; ?>>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;"><?php echo $prod->SKU; ?></td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;"><?php echo $prod->name; ?></td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;"><img src="<?php echo base_url(); ?>images/product_image/short_image/<?php if($prod->size_catagory=="man") echo $prod->man->filename; elseif($prod->size_catagory=="woman") echo $prod->woman->filename; ?>" alt="" /></td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:center !important;"><?php echo $prod->size_name; ?></td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:center !important;"><?php echo $prod->size_catagory; ?></td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:center !important;"><?php echo $prod->join_quantity; ?></td>
    <?php $quantity = $prod->join_quantity - $prod->join_rdm_quantity;?>
    <?php if($prod->join_request_refund!="Payment Refunded") $sub_total += $quantity * $prod->join_prize; ?>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:right;padding-right:5px;"><?php echo $quantity * $prod->join_prize; ?>&nbsp;&pound;</td>
  </tr>
  <?php $i++; } ?>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;" colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;" colspan="5" rowspan="6">&nbsp;</td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">Sub Total :</td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:right;padding-right:5px;"><?php echo $sub_total;?>&nbsp;&pound;</td>
  </tr>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">Discount : </td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:right;padding-right:5px;"><?php if(isset($discount))
							 {
							
								if($discount->type == 'Percentage' )
								{
									echo $aptax = $sub_total*$discount->discount/100;
									echo '&nbsp;&pound;';
									$sub_total -= $aptax;
								}
								if($discount->type == 'Fixed' )
								{
									echo $aptax = $discount->discount;
									echo '&nbsp;&pound;';
									$sub_total -= $aptax;
								}
								if($discount->type == 'Free shipping' )
									echo 'Free shipping';
							}
							else
								echo "0&nbsp;&pound;";?>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">Shipping :</td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:right;padding-right:5px;"><?php 
								if($order->shipping_amount != null){
									echo $order->shipping_amount."&nbsp;&pound;"; 
									$sub_total += $order->shipping_amount;
								}
								else
									echo "0&nbsp;&pound;";
								
								?>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">Tax :</td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:right;padding-right:5px;"><?php 
							if($order->tax!=null)
							{
								echo $order->tax."&nbsp;&pound;";
								$sub_total += $order->tax;
							}
							else
								echo "0&nbsp;&pound;";
							?>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">&nbsp;</td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">Total :</td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:right;padding-right:5px;"><?php echo $sub_total;?>&nbsp;&pound;</td>
  </tr>
</table>
<?php if(isset($tracking_number) && $tracking_number!=NULL){ ?>
If your delivery option include a tracking number, you can go to www.royalmail.com/, select the option "tracking" and enter the tracking number to locate your items.
<br>
<br>
TRACKING NUMBER: <?php echo $tracking_number; ?>
<br>
<br>
<?php } ?>
We are working right now to ship your order the soonest possible. You will receive a confirmation by email once the order is delivered to you. 
<br>
<br>
In case you need help, feel free to contact our customer service through the <a href="https://twinne.tenderapp.com">support system</a> or the <a href="<?php echo base_url();?>pages/contact_us">contact page</a>.
<br>
<br>
Again, thank you for choosing to buy from Twinne!
<br>
<br>
Hoping to see you soon
<br>
<br>
Best,<br>
The Twinne Team<br>
http://twinne.com<br>
</body>
</html>