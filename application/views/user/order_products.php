<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
	$profile_name=$user->first_name." ".$user->last_name;
	echo str_replace("{profile_name}",$profile_name,lang('member_orders'));
?>
</title>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>css/global.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/member.css" type="text/css"/>
<!--Select Box Js Start-->
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$(".toggle_container").hide();
	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
	});

});


$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
	});



function cart_refresh(){
	$(".toggle_container").show()
	setTimeout('$(".toggle_container").hide()',4000);
	$('body').after('<div class="inline_notification">You cart has been updated</div>');
	setTimeout("$('.inline_notification').slideUp(400)", 6500);
	//$(".toggle_container").hide();
	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("fast");
	});
}
</script>
<!--Select Box Js End-->
<!--LightBox Js-->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.colorbox.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$("a[rel='example1']").colorbox();
			$("a[rel='example2']").colorbox({transition:"fade"});
			$("a[rel='example3']").colorbox({transition:"none", width:"75%"});
			$("a[rel='example4']").colorbox({slideshow:true});
			$(".example5").colorbox();
			$(".example6").colorbox({iframe:true, innerWidth:425,});
			$(".example7").colorbox({width:"580px", inline:true, height:"auto", href:"#inline_example2"});
			$(".example8").colorbox({width:"580px", inline:true, height:"auto", href:"#inline_example1"});
			$(".example9").colorbox({
				onOpen:function(){ alert('onOpen: colorbox is about to open'); },
				onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
				onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
				onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
				onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
			});
			
			//$("a[rel='example16']").colorbox();
			
			
			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
	</script>

</head>
<body>
<div id="top"></div>
<div id="wrapper">
  <!--Header Start-->
  <?php $this->load->view('header');?>
  <!--Header End-->
  <?php $this->load->view('top_banner'); ?>
  
  <!--Page Content Start-->
  <div id="mid_content">
  <div class="mid_content_top">
      <div class="member_area_top_left">
        <div class="member_area_top_left_image">
        <?php if ($user->image->filename){?>
          <img src="<?php echo base_url(); ?>images/profile_image/short_image/<?php echo $user->image->filename; ?>" alt="profilr-image" />
          <?php }
          else {?>
          <img src="<?php echo base_url(); ?>images/no_image_48.jpg" alt="profilr-image" />
          <?php }?>
          </div>
        <h3><?php echo $user->display_name;?><br />
          <span>
				<?php if ($user->address->city != "") { echo $user->address->city.', '.$user->address->country; }?>
            </span></h3>
        <div class="clear"></div>
      </div>
      <div class="logout_button"><a href="<?php echo base_url(); ?>user/logout/"><img src="<?php echo base_url(); ?>images/logout_button.png" alt="logout" /></a></div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!--Member taber Start-->
    <div id="vtab">
      <ul>
	<li class="home"><a href="<?php echo base_url();?>user/member_profile">PROFILE</a></li>
        <?php if(isset($designers) && in_array($user->id,$designers)){ ?>
	<li class="earning"><a href="<?php echo base_url();?>user/manage_design/viewEarnings">EARNINGS</a></li>
	<li class="my_desigen"><a href="<?php echo base_url();?>user/manage_design/viewProducts">MY PRODUCTS</a></li>
        <li class="my_desigen"><a href="<?php echo base_url();?>user/manage_design/viewDesigns">MY DESIGNS</a></li>
        <li class="add_desigen"><a href="<?php echo base_url();?>user/manage_design/addDesign">ADD DESIGN</a></li>
	<?php } ?>
        <li class="support selected"><a href="<?php echo base_url();?>user/member_order">MY ORDERS</a></li>
        <li class="wishlist"><a href="<?php echo base_url();?>user/member_wishlist">WISH-LIST</a></li>
        <?php if(isset($new_event)){ ?>
	<li class="support1"><a href="<?php echo base_url();?>new_contest">NEW EVENT!</a></li>
	<?php }  ?>
      </ul>
      <div style="display: block;">
        <div class="top_button_box">
          <div class="top_button order_selected"><a href="<?php echo base_url();?>user/member_order">Orders</a></div>
          <div class="point">:</div>
          <div class="shipping_in_button"><a href="<?php echo base_url();?>user/refund_order">Refunds</a></div>
        </div>
        
        <div class="tab_mid_box1">









<?php if($order->status=="completed" && false) { ?>
<div style=" text-align:right; padding:7px;"><a href="">Request Refund for total order</a></div>
<?php } ?>
        
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="order-product-table">
				<tr>
					<th>ID</th>
					<th>Item</th>
					<th>Product Image</th>
					<th class="center_align">Size</th>
					<th class="center_align">Genre</th>
					<th class="center_align">Quantity</th>
					<th class="right_align">Total</th>
					<th class="center_align">Action</th>
				</tr>
				<?php $sub_total = 0; $i=0; 
    		 	foreach($order->product as $prod){ 
				?>
	    		<?php if($i%2!='0'){
	    			$class="alternate-row";
	    		}else{
	    			$class="";
	    		}
	    		?>
				<tr class="<?php echo $class;?>">
					<td><?php echo $prod->SKU; ?></td>
					<td><?php echo $prod->name; ?></td>
					<td><img src="<?php echo base_url(); ?>images/product_image/short_image/<?php if($prod->size_catagory=="man") echo $prod->man->filename; elseif($prod->size_catagory=="woman") echo $prod->woman->filename; ?>" alt="" /></td>
					<td class="center_align"><?php echo $prod->size_name; ?></td>
					<td class="center_align"><?php echo $prod->size_catagory; ?></td>
					<td class="center_align"><?php echo $prod->join_quantity; ?></td>
					<?php $quantity = $prod->join_quantity - $prod->join_rdm_quantity;?>
					<?php if($prod->join_request_refund!="Payment Refunded") $sub_total += $quantity * $prod->join_converted_price; ?>
					<td class="right_align">
                                            <?php   echo $quantity * $prod->join_converted_price; ?>&nbsp;
                                            <?php   if($order->paid_currency=="USD")
                                                        echo "$";
                                                    elseif($order->paid_currency=="EUR")
                                                        echo "&euro;";
                                                    elseif($order->paid_currency=="GBP")
                                                        echo "&pound;";
                                                    ?>
                                        </td>
					<td class="center_align">
						<?php if(($order->status=="completed" || $order->status=="Refund Processing") && $prod->join_request_refund==NULL){  ?> 
								<a id="<?php echo $prod->SKU; ?>" href="javascript:void(0);" class='example17' title="Request for refund">Request Refund</a>
                             	<script>
									$("#<?php echo $prod->SKU;?>").colorbox({width:"580px", inline:true, height:"auto", href:"#inline_<?php echo $prod->SKU;?>"});
								</script>
                                <div style='display:none' class="login_page">
                                    <div id='inline_<?php echo $prod->SKU;?>' class='refund_order_box' style='padding:20px; background:#fff;'>
                                    <?php echo form_open('user/member_order/ProductRefundRequest'); ?>
                                    <input type="hidden" name="product_sku" id="product_sku" value='<?php echo $prod->SKU;?>'/>
                                    <input type="hidden" name="order_sku" id="order_sku" value='<?php echo $order->SKU; ?>'/>
                                    <h2>REFUND REQUEST</h2>
                                    <div class="refund_text">
                                    Sorry to hear that you weren't completely happy with your purchase! Before proceeding with the refund request, be sure to read the instructions about how to request a refund and how to send back the products your not satisfied with. You will find these instructions in our Delivery and Returns page.
<br /><br />
IMPORTANT: download and print the refund label. It must be included into the packet you will send back to us.

If you want to include further information, for example the reason that caused your dissatisfaction, please use the form below:    
                                     </div>
                                    <div class="login_content" style="padding:0px; margin:0px;">
                                        <div class="login_content_left">
                                            <label>Please enter here refund reason :</label>
                                            <textarea name="refund_reason" class="refund_request_textarea">Product SKU: <?php echo $prod->SKU; ?></textarea>
                                            <div class="clear"></div>
                                        </div>
                                        <br/>
                                        <div class="refund-box">
                                        	<input type="hidden" value="<?php echo $prod->SKU; ?>" name="refund_product_sku" id="refund_product_sku" />
                                            <input type="submit" value="&nbsp;" name="user_login" id="user_login" />
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>        
                                    </div>
                                </div>
                            <?php }else{ 
                            		echo $prod->join_request_refund;
									if($prod->join_request_refund=="Payment Refunded") echo " <span style=\"color:red\">***</span>";
                            	 } ?>    
					</td>
				</tr>
			<?php $i++; } ?>
				<tr><td colspan="8">&nbsp;</td></tr>
                
                
                <tr>
                	<td colspan="5" rowspan="6">&nbsp;</td>
                    <td>Sub Total :</td>
                    <td class="right_align">
                            <?php echo $sub_total;?>&nbsp;
                            <?php 
                                if($order->paid_currency=="USD")
                                   echo "$";
                                elseif($order->paid_currency=="EUR")
                                   echo "&euro;";
                                elseif($order->paid_currency=="GBP")
                                   echo "&pound;";                
                                ?>
                            
                    </td>
                    <td>&nbsp;</td>
                </tr>
				
                		<tr>
							<td>Discount : </td>
							<td class="right_align">
							 <?php if(isset($discount))
							 {
							
								if($discount->type == 'Percentage' )
								{
									echo $aptax = $sub_total*$discount->discount/100;
									echo '&nbsp;';
                                                                        if($order->paid_currency=="USD")
                                                                            echo "$";
                                                                        elseif($order->paid_currency=="EUR")
                                                                            echo "&euro;";
                                                                        elseif($order->paid_currency=="GBP")
                                                                            echo "&pound;"; 
									$sub_total -= $aptax;
								}
								if($discount->type == 'Fixed' )
								{
									echo $aptax = $discount->discount;
									echo '&nbsp;';
                                                                        if($order->paid_currency=="USD")
                                                                            echo "$";
                                                                        elseif($order->paid_currency=="EUR")
                                                                            echo "&euro;";
                                                                        elseif($order->paid_currency=="GBP")
                                                                            echo "&pound;"; 
									$sub_total -= $aptax;
								}
								if($discount->type == 'Free shipping' )
									echo 'Free shipping';
							}
							else
								echo "0&nbsp;";
                                                                if($order->paid_currency=="USD")
                                                                  echo "$";
                                                                elseif($order->paid_currency=="EUR")
                                                                  echo "&euro;";
                                                                elseif($order->paid_currency=="GBP")
                                                                  echo "&pound;"; 
                                                             ?>
							</td>
                            <td>&nbsp;</td>
	        	       	</tr>
						
                        
						<tr>
                            <td>Shipping :</td>
							<td class="right_align">
								<?php 
								if($order->shipping_amount != null){
									echo $order->shipping_amount."&nbsp;";
									$sub_total += $order->shipping_amount;
								}
								else
									echo "0&nbsp;";
                                                                
                                                                        if($order->paid_currency=="USD")
                                                                            echo "$";
                                                                        elseif($order->paid_currency=="EUR")
                                                                            echo "&euro;";
                                                                        elseif($order->paid_currency=="GBP")
                                                                            echo "&pound;";
								
								?>
                            </td>
                            <td>&nbsp;</td>
						</tr>
                        
						<tr>
                            <td>Tax :</td>
							<td class="right_align">
							<?php 
							if($order->tax!=null)
							{
								echo $order->tax."&nbsp;";
                                                                
								$sub_total += $order->tax;
							}
							else
								echo "0&nbsp;&pound;";
                                                        
                                                                        if($order->paid_currency=="USD")
                                                                            echo "$";
                                                                        elseif($order->paid_currency=="EUR")
                                                                            echo "&euro;";
                                                                        elseif($order->paid_currency=="GBP")
                                                                            echo "&pound;";
							?>
                            </td>
                            <td>&nbsp;</td>
						</tr>

                		
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        
                        <tr>
                            <td>Total :</td>
							<td class="right_align"><?php echo $sub_total;?>&nbsp;
                                                                        <?php
                                                                        if($order->paid_currency=="USD")
                                                                            echo "$";
                                                                        elseif($order->paid_currency=="EUR")
                                                                            echo "&euro;";
                                                                        elseif($order->paid_currency=="GBP")
                                                                            echo "&pound;";
                                                                        ?>
                                                        </td>
                            <td>&nbsp;</td>
						</tr>
                
                </table>
				
				
					
				








        </div>
      </div>
    </div>
    
    <!--Member taber Start-->
    <div class="clear"></div>
  </div>
  <!--Home Page Content End-->
  <!--Footer Start -->
   <?php $this->load->view('footer')?>
  <!--Footer End -->
  <div class="clear"></div>
</div>
  
<script>
function confirmCancel(delUrl) {
  if (confirm("Are you sure cancel the order")) {
    document.location = delUrl;
  }
}
function confirmRefund(delUrl) {
  if (confirm("Are you sure for request a refund")) {
    document.location = delUrl;
  }
}
</script>
</body>
</html>
