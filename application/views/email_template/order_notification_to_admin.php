<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
	New Order Notification at Twinne!
</title>
</head>
<body>
Dear Administration,
<br><br>
A new order has been placed at Twinne!
<br><br>
Order ID is <?php echo $order->SKU; ?>
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
    <?php if($prod->join_request_refund!="Payment Refunded") $sub_total += $quantity * $prod->join_converted_price; ?>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:right;padding-right:5px;">
        <?php echo $quantity * $prod->join_converted_price; ?>&nbsp;
        <?php if($order->paid_currency=="USD")
                            echo "$";
                        elseif($order->paid_currency=="EUR")
                            echo "&euro;";
                        elseif($order->paid_currency=="GBP")
                            echo "&pound;";
                        ?>
    
    </td>
  </tr>
  <?php $i++; } ?>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;" colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;" colspan="5" rowspan="6">&nbsp;</td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">Sub Total :</td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:right;padding-right:5px;">
           <?php echo $sub_total;?>&nbsp;
            <?php if($order->paid_currency=="USD")
                            echo "$";
                        elseif($order->paid_currency=="EUR")
                            echo "&euro;";
                        elseif($order->paid_currency=="GBP")
                            echo "&pound;";
                        ?>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">Discount : </td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:right;padding-right:5px;"><?php if(isset($discount))
							 {
							
								if($discount->type == 'Percentage' )
								{
									echo $aptax = $sub_total*$discount->discount/100;
									echo '&nbsp;';
									$sub_total -= $aptax;
								}
								if($discount->type == 'Fixed' )
								{
									echo $aptax = $discount->discount;
									echo '&nbsp;';
									$sub_total -= $aptax;
								}
								if($discount->type == 'Free shipping' )
									echo 'Free shipping';
							}
							else
								echo "0&nbsp;";?>
                                                        <?php if($order->paid_currency=="USD")
                                                                            echo "$";
                                                                        elseif($order->paid_currency=="EUR")
                                                                            echo "&euro;";
                                                                        elseif($order->paid_currency=="GBP")
                                                                            echo "&pound;";
                                                                        ?>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">Shipping :</td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:right;padding-right:5px;"><?php 
								if($order->shipping_amount != null){
									echo $order->shipping_amount."&nbsp;"; 
									$sub_total += $order->shipping_amount;
								}
								else
									echo "0&nbsp;";
								
								?>
        
                                                                <?php if($order->paid_currency=="USD")
                                                                                    echo "$";
                                                                                elseif($order->paid_currency=="EUR")
                                                                                    echo "&euro;";
                                                                                elseif($order->paid_currency=="GBP")
                                                                                    echo "&pound;";
                                                                                ?>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">Tax :</td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:right;padding-right:5px;"><?php 
							if($order->tax!=null)
							{
								echo $order->tax."&nbsp;";
								$sub_total += $order->tax;
							}
							else
								echo "0&nbsp;";
							?>
                                                        <?php if($order->paid_currency=="USD")
                                                                echo "$";
                                                            elseif($order->paid_currency=="EUR")
                                                                echo "&euro;";
                                                            elseif($order->paid_currency=="GBP")
                                                                echo "&pound;";
                                                            ?>
    </td>
  </tr>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">&nbsp;</td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">&nbsp;</td>
  </tr>
  <tr>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;">Total :</td>
    <td style="border: 1px solid #d2d2d2;padding: 5px 0 5px 5px;border-left:0px;border-bottom:0px;text-align:right;padding-right:5px;">
           <?php echo $sub_total;?>&nbsp;
           <?php if($order->paid_currency=="USD")
                            echo "$";
                        elseif($order->paid_currency=="EUR")
                            echo "&euro;";
                        elseif($order->paid_currency=="GBP")
                            echo "&pound;";
                        ?>
    </td>
  </tr>
</table>

<br>
<br>
Best,<br>
The Twinne Team<br>
http://twinne.com<br>
</body>
</html>