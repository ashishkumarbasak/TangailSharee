<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" >
<meta http-equiv="X-UA-Compatible" content="IE=8" >
<title>
<?php echo lang('checkout_step1');?>
</title>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/example-1.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" type="text/css" media="screen" />
<!--Select Box Js Start-->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".toggle_container").hide();
	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("fast");
	});
});
</script>
<!--Select Box Js End-->
<script>
$(document).ready(function(){
	// add * to required field labels
    $('label.required').append('&nbsp;<strong>*</strong>&nbsp;');

    var current = 0;
    $.validator.addMethod("pageRequired", function(value, element) {
        var $element = $(element)
        function match(index) {
            return current == index && $(element).parents("#sf" + (index + 1)).length;
            
        }
        if (match(0) || match(1) || match(2) || match(3) || match(4)) {
            return !this.optional(element);
        }
        return "dependency-mismatch";
    }, $.validator.messages.required)
    
	
	var v = $("#cmaForm").validate({
		
		errorClass: "warning",
        onkeyup: false,
        onblur: false,
        submitHandler: function() {
			document.cmaForm.submit();
        }
    });
    
    $(".open1").click(function() {
        if(v.form())
  	  	{
        	return true;
  	  	}
    });
	
 
});

</script>

<!--LightBox Js-->
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
	<script>
				    $(document).ready(function(){
					    $("input[name$='group1']").click(function() {
					        var test = $(this).val();
							if(test=="diff"){
					        	$("#billing_info").show();
				        		$('#billing_info input').addClass('pageRequired');
								$('#badd2').removeClass('pageRequired');
								$('#badd3').removeClass('pageRequired');
							}
							else{
								$('#billing_info input').removeClass('pageRequired');
								$("#billing_info").hide();
							}
					    });
					});
				</script>

<!--tab Js-->
<script type="text/javascript" src="<?php echo base_url();?>js/tabber.js"></script>
<!--slider Js-->
</head>
<body>
<div id="top"></div>
<div id="wrapper">
  <!--Header Start-->
  <?php $this->load->view('header');?>
  <!--Header End-->
  <!-- <div id="top_banner"><img src="images/top_banner.jpg" alt="Banner" /></div>-->
  <!--Page Content Start-->
  <div id="mid_content">
    <div class="top-menu">
      <ul>
        <li class="tab-memu-select"><a href="javascript:void(0);">1. SHIPPING &amp; BILLING INFO</a></li>
        <li>2. SHIPPING METHOD</li>
        <li>3. PAYMENT METHOD</li>
        <li>4. REVIEW AND PLACE ORDER</li>
      </ul>
      <div class="clear"></div>
    </div>
    <div class="tabbertab" id="sf1">
     <form class="cmxform" id="cmaForm" method="post" action="<?php echo base_url();?>cart/checkout_shipping" />
      <div class="single_product_down_tab">
        <div class="shipping_box">
          <div class="shipping_box_left">
          
		  	<?php if(validation_errors()){?>
			<div class="validation_errors">
				<?php echo validation_errors(); ?>
			</div>
			<?php } ?>
            
            <div class="shipping_heading">SHIPPING TO </div>
            <?php
            	if(isset($shipadd['id'])){ 	?>
            	<input id='bfname' type="hidden" name="data[shipping][id]" class="name_input" value="<?php if (isset($shipadd['id'])) { echo $shipadd['id']; } ?>" />
            	<?php }?>
            	<label>First name:</label>
            	<input id='sfname' type="text" name="data[shipping][first_name]" class="name_input pageRequired" value="<?php if (isset($shipadd['first_name'])){ echo $shipadd['first_name']; }?>" />
            	<label style="margin:0 0 0 44px;">Last name:</label>
            	<input id='slname' type="text" name="data[shipping][last_name]" class="name_input pageRequired" value="<?php if (isset($shipadd['last_name'])){ echo $shipadd['last_name']; }?>" />
            	<div class="clear" style="height:15px;"></div>
            	<label>Address 1:</label>
            	<input id='sadd1' type="text" name="data[shipping][address_line1]" class="add_input pageRequired" value="<?php if (isset($shipadd['address_line1'])){ echo $shipadd['address_line1']; }?>" />
            	<div class="clear" style="height:15px;"></div>
            	<label>Address 2:</label>
            	<input id='sadd2' type="text" name="data[shipping][address_line2]" class="add_input" value="<?php if (isset($shipadd['address_line2'])){ echo $shipadd['address_line2']; }?>" />
            	<div class="clear" style="height:15px;"></div>
                
            	<label>Address 3:</label>
            	<input id='sadd3' type="text" name="data[shipping][address_line3]" class="add_input" value="<?php if (isset($shipadd['address_line3'])){ echo $shipadd['address_line3']; }?>" />
            	<div class="clear" style="height:15px;"></div>
               
            	<label >Town/City:</label>
            	<input id='scity' type="text" name="data[shipping][city]" class="name_input pageRequired" value="<?php if (isset($shipadd['city'])){ echo $shipadd['city']; }?>" />
            	<label style="margin:0 0 0 44px;">State/Prov:</label>
            	<input id='sstate' type="text" name="data[shipping][state]" class="name_input pageRequired" value="<?php if (isset($shipadd['state'])){ echo $shipadd['state']; }?>"/>
            	<div class="clear" style="height:15px;"></div>
                
            <label>Country:</label>
            <?php 
					if($shipadd['country']) 
						$selected_country = $shipadd['country'];
					else
						$selected_country = "United Kingdom";
						
					echo "<select name=\"data[shipping][country]\" id=\"scountry\" class=\"name_input pageRequired\">";
					foreach($list_of_countries as $c)
						{
							echo "<option value=\"".$c->country_name."\"";
							if($c->country_name==$selected_country) echo " selected ";
							echo ">".$c->country_name."</option>";
						}
					echo "</select>";
			?>
            
            <label style="margin:0 0 0 44px; width: 77px;">Zip/Postcode:</label>
            <input id='spocode' type="text" name="data[shipping][postcode]" class="name_input pageRequired" value="<?php if (isset($shipadd['postcode'])){ echo $shipadd['postcode']; }?>" />
            <div class="clear" style="height:15px;"></div>
                
            <div class="clear"></div>
                
                
                
            <h1 class="shipping_heading">BILLING TO</h1>
            
            <div class="billing_box">
              		<input name="group1" id="billingto1" value="same" type="radio" checked="checked"  />
               		<label class="checkbox_bil" for="billingto1"><span class="billing_text">Same as Shipping info</span></label>
                	<br/>
					<input name="group1" id="billingto2" value="diff" type="radio" />
					<label class="checkbox_bil" for="billingto2"><span class="billing_text">Add Billing Information</span></label>
            </div>
            <div class="clear"></div>
            <div id="billing_info" style="display:none;">
            	<?php 
            	if(isset($billadd['id'])){ 	?>
            		<input id='bfname' type="hidden" name="data[billing][id]" class="name_input" value="<?php if (isset($billadd['id'])) echo $billadd['id']; ?>" />
            	<?php }?>
            		<label>First name:</label>
	            	<input id='bfname' type="text" name="data[billing][first_name]" class="name_input" value="<?php if (isset($billadd['first_name'])){ echo $billadd['first_name']; }?>" />
	            	<label style="margin:0 0 0 44px;">Last name:</label>
	            	<input id='blname' type="text" name="data[billing][last_name]" class="name_input" value="<?php if (isset($billadd['last_name'])){ echo $billadd['last_name']; }?>" />
	            	<div class="clear" style="height:15px;"></div>
	            	<label>Address 1:</label>
	            	<input id='badd1' type="text" name="data[billing][address_line1]" class="add_input" value="<?php if (isset($billadd['address_line1'])){ echo $billadd['address_line1']; }?>" />
	            	<div class="clear" style="height:15px;"></div>
	            	<label>Address 2:</label>
	            	<input id='badd2' type="text" name="data[billing][address_line2]" class="add_input" value="<?php if (isset($billadd['address_line2'])){ echo $billadd['address_line2']; }?>" />
	            	<div class="clear" style="height:15px;"></div>
	            
	            	<label>Address 3:</label>
	            	<input id='badd3' type="text" name="data[billing][address_line3]" class="add_input" value="<?php if (isset($billadd['address_line3'])){ echo $billadd['address_line3']; }?>" />
	            	<div class="clear" style="height:15px;"></div>
	              
	            	<label >Town/City:</label>
	            	<input id='bcity' type="text" name="data[billing][city]" class="name_input" value="<?php if (isset($billadd['city'])){ echo $billadd['city']; }?>" />
	            	<label style="margin:0 0 0 44px;">State/Prov:</label>
	            	<input id='bstate' type="text" name="data[billing][state]" class="name_input" value="<?php if (isset($billadd['state'])){ echo $billadd['state']; }?>"/>
	            	<div class="clear" style="height:15px;"></div>
	              
	            	<label >Country:</label>
                <?php 
					if($billadd['country']) 
						$selected_country = $billadd['country'];
					else
						$selected_country = "United Kingdom";
					
					echo "<select name=\"data[billing][country]\" id=\"bcountry\" class=\"name_input\">";
					foreach($list_of_countries as $c)
						{
							echo "<option value=\"".$c->country_name."\"";
							if($c->country_name==$selected_country) echo " selected ";
							echo ">".$c->country_name."</option>";
						}
					echo "</select>";
				?>
	               
	            <label style="margin:0 0 0 44px;">Zip/Postcode:</label>
	            <input id='bpocode' type="text" name="data[billing][postcode]" class="name_input " value="<?php if (isset($billadd['postcode'])){ echo $billadd['postcode']; }?>" />
	            <div class="clear"></div>
	        </div>
	            
<!-- 	        <h1 class="shipping_heading">COUPON / GIFT CARD</h1> -->
<!-- 	        <input class="name_input2" type="text" value="" /> -->
<!-- 	        <input type="button" class="apply_button" value="" /> -->
	        <input type="submit" class="shipping_method_button open1" value="" />
	        <div class="clear"></div>
        </div>
              
        <div class="shipping_box_right">
            <h1 class="order_summary_box">ORDER SUMMARY<span><a href="<?php echo base_url();?>cart/viewCart">(edit)</a></span></h1>
            <div class="shipping_box_items">Items</div>
            <?php $total = 0;
			foreach ($this->cart->contents() as $items){
				$options=$this->cart->product_options($items['rowid']);
				?>
				<div class="order_summary_box2">
					<div style="float:left"><?php echo $items['name'];?><br />
						<small>Quantity - <?php echo $items['qty'];?></small> </div>
					<div style="float:right">
						<?php if(isset($options['redeem']) && $options['redeem']!=0)
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
								$convert_price =  $p - $rdmval;
																								if($pref_currency_type=="USD")
                                                                                                {
                                                                                                    //$product_currency = currency("GBP","USD",($convert_price));
                                                                                                    echo ($product_currency).'$';
                                                                                                    $total += $product_currency;
                                                                                                }
                                                                                                else if($pref_currency_type=="EUR")
                                                                                                {   
                                                                                                    //$product_currency = currency("GBP","EUR",($convert_price));
                                                                                                    echo ($product_currency).'&euro;';
                                                                                                     $total += $product_currency;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                    echo ($convert_price).'&pound;';
                                                                                                     $total += $convert_price;
                                                                                                }
							}
							else
							{
								echo 'Redeemed';
							} 
	 						
						}else{?>
						<?php 
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
							$convert_price = $converted_item_price*$items['qty']; 
																								if($pref_currency_type=="USD")
                                                                                                {
                                                                                                    $product_currency = $convert_price;
                                                                                                    echo ($product_currency).'$';
                                                                                                    $total=$total+$product_currency;
                                                                                                }
                                                                                                else if($pref_currency_type=="EUR")
                                                                                                {   
                                                                                                    $product_currency = $convert_price;
                                                                                                    echo ($product_currency).'&euro;';
                                                                                                    $total=$total+$product_currency;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                    echo ($convert_price).'&pound;';
                                                                                                     $total=$total+$convert_price;
                                                                                                }
							
						}?>
					</div>
					<div class="clear"></div>
				</div>
			<?php }?>
            <div class="clear" style="height:10px;"></div>

           <?php if(isset($applied_discount) && !empty($applied_discount)){
           	      	if($applied_discount->type=='Percentage'){
            			$discount = $total*$applied_discount->discount / 100;
            			//$total -= $discount;
            		}elseif($applied_discount->type=='Fixed'){
            			$discount = $applied_discount->discount;
            			//$total -= $discount;
            		}else{
            			$discount='Free Shipping';
            		}?>
            <div class="shipping_box_items">Discount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='float:right;'><?php 
				echo '-';
                                                if($pref_currency_type=="USD")
                                                {
                                                    $product_currency = $discount;
                                                    echo ($product_currency).'$';
                                                    $total -= $product_currency;
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    $product_currency = $discount;
                                                    echo ($product_currency).'&euro;';
                                                    $total -= $product_currency;
                                                }
                                                else
                                                {
                                                    echo ($discount).'&pound;';
                                                }
				?></span></div>
            <?php }?>

            <?php if(isset($tax) && !empty($tax)){
            	$aptax = $total*$tax->rate/100; //$total += $aptax; ?>
                         	<div class="shipping_box_items">Tax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='float:right;'><?php 
								//echo $aptax.'&pound;';
																								if($pref_currency_type=="USD")
                                                                                                {
                                                                                                    $product_currency = $aptax;
                                                                                                    echo ($product_currency).'$';
                                                                                                    $total += $product_currency;
                                                                                                }
                                                                                                else if($pref_currency_type=="EUR")
                                                                                                {   
                                                                                                    $product_currency = $aptax;
                                                                                                    echo ($product_currency).'&euro;';
                                                                                                    $total += $product_currency;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                    echo ($aptax).'&pound;';
                                                                                                    $total += $aptax;
                                                                                                }
								?></span></div>
                         <?php }?>	            
                        
            
             <?php if (isset($shipping)){?>
            <div class="shipping_box_items">Shipping &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='float:right;'><?php 
				//echo $shipping->price; 
																								if($pref_currency_type=="USD")
                                                                                                {
                                                                                                    $product_currency = currency("GBP","USD",($shipping->price));
                                                                                                    echo ($product_currency).'$';
                                                                                                    $total += $product_currency;
                                                                                                }
                                                                                                else if($pref_currency_type=="EUR")
                                                                                                {   
                                                                                                    $product_currency = currency("GBP","EUR",($shipping->price));
                                                                                                    echo ($product_currency).'&euro;';
                                                                                                    $total += $product_currency;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                    echo ($shipping->price).'&pound;';
                                                                                                    $total += $shipping->price;
                                                                                                }
				
			?></span></div>
            <?php }else{?>    
            <div class="shipping_box_items">Shipping &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='float:right;'><small>(To be updated)</small></span></div>
            <?php }?>
                <div class="clear"></div>
            <div class="order_summary_box3">
            	<div style="float:left">TOTAL </div>
                <div style="float:right"> <?php 
				echo $total;
																								if($pref_currency_type=="USD")
                                                                                                {
                                                                                                    //$product_currency = currency("GBP","USD",($total));
                                                                                                    //echo ($product_currency).'$';
                                                                                                    echo "$";
                                                                                                }
                                                                                                else if($pref_currency_type=="EUR")
                                                                                                {   
                                                                                                    //$product_currency = currency("GBP","EUR",($total));
                                                                                                    //echo ($product_currency).'&euro;';
                                                                                                    echo "&euro;";
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                    //echo ($total).'&pound;';
                                                                                                    echo "&pound;";
                                                                                                }
				?></div>
                <div class="clear"></div>
            </div>
            
            <div class="clear"></div>
            
          <a class="coupon_mes" href="<?php echo base_url(); ?>cart/viewCart">Got a <strong style="color: #fff">coupon</strong>? Go to the cart and validate</a>
          </div>
          <div class="clear"></div>
          
        </div>
      </div>
    </div>
    <!--tabber -1 End-->
    <div class="clear"></div>
  </div>
  <?php $this->load->view("footer.php"); ?>
  <div class="clear"></div>
</div>
</body>
</html>