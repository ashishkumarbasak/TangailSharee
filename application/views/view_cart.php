<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php echo lang('my_cart');?>
</title>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/example.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" type="text/css" media="screen" />
<!--Select Box Js Start-->
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">
	
</script>



<script type="text/javascript">
$(document).ready(function(){
	$(".toggle_container").hide();
	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
	});
	
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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>
<!--Select Box Js End-->
<!--LightBox Js-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.colorbox.js"></script>
<script>
		$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$("a[rel='example1']").colorbox();
			$("a[rel='example2']").colorbox({transition:"fade"});
			$("a[rel='example3']").colorbox({transition:"none", width:"75%", height:"75%"});
			$("a[rel='example4']").colorbox({slideshow:true});
			$(".example5").colorbox();
			$(".example7").colorbox({width:"580px", inline:true, height:"auto", href:"#inline_example2"});
			$(".example8").colorbox({width:"580px", inline:true, height:"auto", href:"#inline_example1"});
			$(".example9").colorbox({
				onOpen:function(){ alert('onOpen: colorbox is about to open'); },
				onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
				onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
				onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
				onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
			});
			
			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
	</script>

<script type="text/javascript">
		$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$("a[rel='example1']").colorbox();
			$("a[rel='example2']").colorbox({transition:"fade"});
			$("a[rel='example3']").colorbox({transition:"none", width:"75%"});
			$("a[rel='example4']").colorbox({slideshow:true});
			$(".example5").colorbox();
			$(".example6").colorbox({iframe:true, innerWidth:425,});
			$(".example7").colorbox({width:"580px", transition:"none", inline:true, height:"auto", href:"#inline_example2"});
			$(".example8").colorbox({width:"580px", transition:"none", inline:true, height:"auto", href:"#inline_example1"});
			$(".example9").colorbox({
				onOpen:function(){ alert('onOpen: colorbox is about to open'); },
				onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
				onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
				onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
				onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
			});
			
			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
	</script>
<style type="text/css">    
.cuponbox input[type="text"]{
    border-color: #CCCCCC #F5F5F5 #F5F5F5 #CCCCCC;
    border-style: solid;
    border-width: 1px;
    color: #444444;
    font-size: 12px;
    margin:0px;
	margin-top:13px;
    padding: 6px 10px;
    width: 200px;
}	
.cuponbox input[type="text"]:focus{
	
	background:#fff;border: 1px solid #c9c9c9;
    box-shadow: 0 0 4px #CCCCCC;
	
}
</style>
</head>
<body>
<div id="top"></div>
<div id="wrapper">
  <!--Header Start-->
  <?php $this->load->view('header');?>
  <!--Header End-->
 <?php $this->load->view('top_banner');?>
  <!--Page Content Start-->
  <div id="mid_content">
  <?php if (isset($update_error)){?><div class="update_error"><?php echo $update_error;?></div><?php }?>
    <?php $item = $this->cart->contents();
        if(count($item)>0){
         ?>
        
    <h1>My order</h1>
    <!--item box Start-->
    <?php echo form_open("cart/updateOrder"); ?>
    <div class="item_box">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="font_size">
          <td style="width:548px; padding:0 0 0 10px;">ITEMS</td>
          <td style="width:100px;">PRICE</td>
          <td style="width:100px;">QTY</td>
          <td>TOTAL</td>
          <!--<td>Redeem Points</td>-->
        </tr>
        <?php 
			$total=0; 
			foreach ($this->cart->contents() as $items)
				{
        			$options=$this->cart->product_options($items['rowid']); 
        ?>
        	<tr class="color">
          	<td style="width:558px;">
            	<div class="item_image">
					<?php if($options['image']!=null){?>
                    	<a href='<?php echo base_url(); ?>single_product?type=<?php echo $options['type'];?>&id=<?php echo $items['id'];?>'>
                        	<img src="<?php echo base_url(); ?>images/product_image/short_image/<?php echo $options['image']; ?>" alt="item_image" />
                        </a><?php }?>
                 </div>
            	 <div class="item_title" style="float: left; width: 400px; text-align: left !important; padding-top:20px !important;">
                 	<a href='<?php echo base_url(); ?>single_product?type=<?php echo $options['type'];?>&id=<?php echo $items['id'];?>'>
						<?php echo $items['name'];?><br />
              			<span>by <?php echo $options['designer'];?></span>
                    </a>
                 </div>
            	 <div class="clear"></div>
            </td>
          	<td style="width:100px;" class="price_image">
	 			<?php 
				//echo $items['price'].'&pound;'; 
												if($pref_currency_type=="USD")
                                                {
                                                    $product_currency = currency("GBP","USD",($items['price']));
                                                    echo ($product_currency).'$';
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    $product_currency = currency("GBP","EUR",($items['price']));
                                                    echo ($product_currency).'&euro;';
                                                }
                                                else
                                                {
                                                    echo ($items['price']).'&pound;';
                                                }
				?>
            </td>
          	<td style="width:100px;">
          		<input type="text" id='prodqty' class="box_price" name='qty[<?php echo $items['rowid']?>]' value='<?php echo $items['qty'];?>'/>
            	<div class="box_image"><img src="<?php echo base_url();?>images/Untitled-2.png" alt="image" /></div>
            	<div class="clear"></div>
            </td>
          	<td class="total_imagef" >
	 			<?php 
					if(isset($options['redeem']) && $options['redeem']!=0)
					{ 
	 											if($pref_currency_type=="USD")
                                                {
                                                    $converted_item_price = currency("GBP","USD",($items['price']));
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    $converted_item_price = currency("GBP","EUR",($items['price']));
                                                }
                                                else
                                                {
                                                    $converted_item_price =  $items['price'];
                                                }
						
						$rdmval = $converted_item_price*$options['rdmqty'];
	 					$p = $converted_item_price*$items['qty'];
	 					if($p - $rdmval>0)
						{
							$convert_currency = $p - $rdmval;
												if($pref_currency_type=="USD")
                                                {
                                                    //$product_currency = currency("GBP","USD",$convert_currency);
                                                    echo ($convert_currency).'$';
													$total += $convert_currency;
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                   // $product_currency = currency("GBP","EUR",$convert_currency);
                                                    echo ($convert_currency).'&euro;';
													$total += $convert_currency;
                                                }
                                                else
                                                {
                                                    echo $convert_currency.'&pound;';
													$total += $convert_currency;
                                                }
							
						}
						else
						{
							echo 'Redeemed';
						} 
	 					
			 		} else
					{
						//echo ($items['price']*$items['qty']).'&pound;';
												if($pref_currency_type=="USD")
                                                {
                                                    $converted_item_price = currency("GBP","USD",($items['price']));
													$product_currency = ($converted_item_price*$items['qty']);
                                                    echo ($product_currency).'$';
													$total=$total+$product_currency;
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    $converted_item_price = currency("GBP","EUR",($items['price']));
													$product_currency = ($converted_item_price*$items['qty']);
                                                    echo ($product_currency).'&euro;';
													$total=$total+$product_currency;
                                                }
                                                else
                                                {
                                                    echo ($items['price']*$items['qty']).'&pound;';
													$total=$total+($items['price']*$items['qty']);
                                                }
						
				  		
					}
				?>
            </td>
          	<!--<td>
            	<input type="checkbox" name='redeem'<?php if(isset($options['redeem'])&& $options['redeem']>0){?> checked='checked'<?php }?> id='redeem_<?php echo $items['rowid'];?>'>
           </td>-->
          	<td class="total_image" >
            	<a href="<?php echo base_url();?>cart/deleteItemCartPage/<?php echo $items['rowid'];?>" id="">
                	<img src="<?php echo base_url();?>images/Edit_btn.png" alt="" />
                </a>
			</td>
        </tr>
       
        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php }?>
       
      </table>
    </div>
    
    <!--item box End-->
    <div class="item_button_box">
      <div class="continue_shopping_button"><a href="<?php echo base_url();?>home"><img src="<?php echo base_url();?>images/continue_shopping_btn.png" alt="continue" /></a></div>
      <input type='submit' class='update_order_btn' value='' />
      <div class="clear"></div>
    </div>
    
    <?php echo form_close(); ?>
   
    <div class="clear"></div>
    <div class="item_down_box">
      <div class="item_down_box_left">
        <h3>Discount Coupon <small>(validate before proceeding with the checkout)</small></h3>
        <div class="cuponbox">
		<?php if(isset($msg['cval']) && !empty($msg['cval'])){?>
        <input type='text' id='couponval' class="item_select_box" value="<?php echo $msg['cval'];?>"/>
		<?php }else{?>
		<input type='text' id='couponval' class="item_select_box" />
		<?php } ?>
        <input type="button" class="validate_coupon_button" id="validate_coupon" />
        </div>
        <div class="clear"></div>
		<?php if(isset($msg['msg']) && !empty($msg['msg'])){?>
        <?php if($msg['msg']==1){?>
		<div id='coupon_success' class='coupon_success'>Coupon Successfully applied</div>
		<?php }if($msg['msg']==2){?>
		<div id='coupon_failure' class='coupon_failure'>invalid coupon or not validated</div>
		<?php }}?>
      </div>
      <div id='coupon_loader'></div>
      
      <div class="item_down_box_right">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="size">
          <tr style="height:20px;">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td style="width:185px; text-align:right;">SUB TOTAL</td>
            <td style="width:60px; text-align:center;"><img src="<?php echo base_url();?>images/Untitled-2.png" alt="image1" /></td>
            <td align="right">
				<?php 
				//echo $total."&nbsp;&pound;";
												if($pref_currency_type=="USD")
                                                {
                                                    //$product_currency = currency("GBP","USD",($total));
                                                    //echo ($product_currency).'$';
													echo $total.'$';
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    //$product_currency = currency("GBP","EUR",($total));
                                                    //echo ($product_currency).'&euro;';
													echo $total.'&euro;';
                                                }
                                                else
                                                {
                                                    echo $total.'&pound;';
                                                }
				?>
                
                </td>
          </tr>

         <?php if(isset($applied_discount) && !empty($applied_discount)){
          //$aptax = $total*$tax->rate/100; $total += $aptax;?>
          <tr>
            <td style="width:185px; text-align:right;">Discount</td>
            <td style="width:60px; text-align:center;"><img src="<?php echo base_url();?>images/Untitled-2.png" alt="image1" /></td>
            <?php if($applied_discount->type=='Percentage'){?>
            <td align="right">
			<?php $discount = $total*$applied_discount->discount/100; //$total -= $discount;
            									if($pref_currency_type=="USD")
                                                {
                                                    $product_currency = currency("GBP","USD",($discount));
                                                    echo ($product_currency).'$';
													$total -= $product_currency;
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    $product_currency = currency("GBP","EUR",($discount));
                                                    echo ($product_currency).'&euro;';
													$total -= $product_currency;
                                                }
                                                else
                                                {
                                                    echo ($discount).'&pound;';
													$total -= $discount;
                                                }
			?>
            </td>
            <?php }elseif($applied_discount->type=='Fixed'){?>
            <td align="right"><?php 
			
			$discount = $applied_discount->discount; //$total -= $discount;
            									if($pref_currency_type=="USD")
                                                {
                                                    $product_currency = currency("GBP","USD",($discount));
                                                    echo ($product_currency).'$';
													$total -= $product_currency;
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    $product_currency = currency("GBP","EUR",($discount));
                                                    echo ($product_currency).'&euro;';
													$total -= $product_currency;
                                                }
                                                else
                                                {
                                                    echo ($discount).'&pound;';
													$total -= $discount;
                                                }
                                                ?>
            
            </td>
            
            <?php }else{?>
            <td><?php echo 'Free Shipping'?></td>
            <?php }?>
          </tr>
          <?php }?>

           <?php if(isset($tax) && !empty($tax)){
          $aptax = $total*$tax->rate/100; //$total += $aptax; ?>
          <tr>
            <td style="width:185px; text-align:right;">Tax</td>
            <td style="width:60px; text-align:center;"><img src="<?php echo base_url();?>images/Untitled-2.png" alt="image1" /></td>
            <td align="right"><?php 
			//echo $aptax;
												if($pref_currency_type=="USD")
                                                {
                                                    $product_currency = currency("GBP","USD",($aptax));
                                                    echo ($product_currency).'$';
													$total += $product_currency;
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    $product_currency = currency("GBP","EUR",($aptax));
                                                    echo ($product_currency).'&euro;';
													$total += $product_currency;
                                                }
                                                else
                                                {
                                                    echo ($aptax).'&pound;';
													$total += $aptax;
                                                }
			?></td>
          </tr>
          <?php }?>
          <tr>
          	<?php if(isset($applied_discount) && !empty($applied_discount)){?>
          	<?php if($applied_discount->type=='Free shipping'){?>
          	<td style="width:185px; text-align:right;">TOTAL</td>
            <?php }else{?>
            	<td style="width:185px; text-align:right;">TOTAL (free standard shipping)</td>
            	<?php }}else{?>
            	<td style="width:185px; text-align:right;">TOTAL (free standard shipping)</td>
            	<?php }?>
            <td style="width:60px; text-align:center;"><img src="<?php echo base_url();?>images/Untitled-2.png" alt="image1" /></td>
            <td align="right"><?php 
			//echo $total;
												if($pref_currency_type=="USD")
                                                {
                                                    //$product_currency = currency("GBP","USD",($total));
                                                    //echo ($product_currency).'$';
													echo ($total).'$';
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    //$product_currency = currency("GBP","EUR",($total));
                                                    //echo ($product_currency).'&euro;';
													echo ($total).'&euro;';
                                                }
                                                else
                                                {
                                                    echo ($total).'&pound;';
                                                }
			
			
			?></td>
          </tr>
          
<!--           <tr>
            <td style="width:185px; text-align:right;">Shipping</td>
            <td style="width:60px;  text-align:center;"><img src="<?php echo base_url();?>images/Untitled-2.png" alt="image1" /></td>
            <td>$ <?php echo $ship=10.00; ?></td>
          </tr>
          <tr style="height:20px;">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td style="width:185px; text-align:right;">GRAND TOTAL</td>
            <td style="width:60px;  text-align:center;"><img src="<?php echo base_url();?>images/Untitled-2.png" alt="image1" /></td>
            <td>$ <?php echo $total + $ship;?></td>
          </tr>-->
          <tr style="height:20px;">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr style="display:none;">
          	<td style="width:185px; text-align:right;"><div style="display:none;">Select Currency</div></td>
            <td style="width:60px; text-align:center;">
            	<div style="display:none;">
                <select class="dollar_select_box" id='select_cur'>
        			<option></option>
        			<option value =1>$</option>
        			<option value =2>&euro;</option>
        			
      			</select>
            	</div> 
            </td>
            <div id="loading"></div>
            <td><div id="curr_val"></div></td>
          </tr>
          
          <script>
          	$("#select_cur").change(function () {
        		var cur_id = $("#select_cur").val();
					cur = '';
					if(cur_id==1){
						cur = 'USD';
					}
					if(cur_id==2){
						cur = 'EUR'
					}
					$('#loading').addClass('loadingImg');
	        		$.ajax({ url: '<?php echo base_url();?>cart/curr',
	      		         data: {to_cur:cur,total:<?php echo $total;?>},
	      		         type: 'post',
	      		         success: function(output) {
	      		        	 //window.location.reload()
	      		                    //  alert(output);
	      		                    $('#curr_val').html(output);
	      		                  $('#loading').removeClass('loadingImg');
	      		                  }
	      				});
				   	
        	})
      	</script>
        <script>
        $("#validate_coupon").click(function () {
  		var cur_id = $("#couponval").val();
  		$('#coupon_loader').addClass('loadingImg');
		 	$.ajax({ url: '<?php echo base_url();?>cart/val_coupon',
    		         data: {couponval:cur_id},
    		         type: 'post',
    		         success: function(output) {
        		        var test =  jQuery.parseJSON( output )
    		        	var usable = test.usable;
    		        	switch (usable) {
    		        	   case 0:
    		        		   $('#coupon_loader').removeClass('loadingImg');
    		        		   window.location="<?php echo base_url();?>cart/viewCart?msg=2&cval="+cur_id;
    		        		  break;
    		        	   case 1:
    		        		   $('#coupon_loader').removeClass('loadingImg');
    		        		   window.location="<?php echo base_url();?>cart/viewCart?msg=1&cval="+cur_id;
    		        		   location.reload(true);
     		        	      break;
    		        	   case 2:
    		        		   window.location="<?php echo base_url();?>login";
     		        	      break;
    		        	}
    		        	
    		         }
    			}); 
		});
      </script>
		 <script>
      	// Add onclick handler to checkbox w/id checkme
    	   $("#redeem_<?php echo $items['rowid']?>").click(function(){
    		// If checked
    		if ($("#redeem_<?php echo $items['rowid'];?>").is(":checked"))
    		{
        		
				
    			$.ajax({ url: '<?php echo base_url();?>cart/redeempoint',
    		         data: {row_id: '<?php echo $items['rowid']?>'},
    		         type: 'post',
    		         success: function(output) {
        		         if(output){
    		        	  alert(output);
						   window.location="<?php echo base_url();?>cart/viewCart";
    		        	  }
    		         else{
    		        	 window.location="<?php echo base_url();?>login";
    		         }
    		         }
    			});
	
    		}
    		else
    		{
    			$.ajax({ url: '<?php echo base_url();?>cart/redeemback',
   		         data: {row_id: '<?php echo $items['rowid']?>'},
   		         type: 'post',
   		         success: function(output) {
   		        	 window.location.reload()
   		        //              alert(output);
   		                  }
   				});
    		}
    		
    	  });
    	  </script>
          <tr style="height:20px;">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <input type="button" class="item_check_box_button" value="" id="checkout_btn" onClick="location.href='<?php echo base_url();?>cart/checkout'" />
	  </div>
      <div class="clear"></div>
    </div>
     <?php }else{ echo '<h1>Cart is empty</h1>';}?>
    <div class="clear"></div>
    
  </div>
  <!--Home Page Content End-->
  <!--Footer Start -->
 <?php $this->load->view('footer');?>
  <!--Footer End -->
  <div class="clear"></div>
</div>
</body>
</html>