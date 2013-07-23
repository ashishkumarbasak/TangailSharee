<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" >
<meta http-equiv="X-UA-Compatible" content="IE=8" >
<title>
<?php echo lang('checkout_step2');?>
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
<?php //$this->load->view("currencyconverter.php"); ?>
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
        <li class="tab-memu-select-prev"><a href="<?php echo base_url();?>cart/checkout">1. SHIPPING &amp; BILLING INFO</a></li>
        <li class="tab-memu-select"><a href="javascript:void(0);">2. SHIPPING METHOD</a></li>
        <li>3. PAYMENT METHOD</li>
        <li>4. REVIEW AND PLACE ORDER</li>
      </ul>
      <div class="clear"></div>
    </div>
   <div class="tabbertab" id="#sf2">
   <form class="cmxform" id="cmaForm" method="post" action="<?php echo base_url();?>cart/checkout_detail" >
      <div class="single_product_down_tab" style="padding-bottom:15px;">
        <div class="shipping_box">
          <div class="shipping_box_left">
            <div class="shipping_heading">CHOOSE A SHIPPING METHOD</div>
          <div class="billing_box" style="width:auto;">
                <?php $it = 0; foreach ($shipping as $ship){
                	if($it == 0 && !isset($ship_pr)){ $ship_pr = $ship;
					?>
                			<input name="shipmethod" id="shipmethod<?php echo $ship->id; ?>" value="<?php echo $ship->id; ?>"  alt="<?php echo $ship->price; ?>" type="radio" checked="checked"/>
                			<span class="billing_text"><label class="checkbox_bil" style="left: 4px; top: -4px;" for="shipmethod<?php echo $ship->id; ?>"><?php echo $ship->type;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                	<?php }
                	else {
							if(isset($ship_pr))
							{
							?>
                            <input name="shipmethod" id="shipmethod<?php echo $ship->id; ?>" value="<?php echo $ship->id; ?>"  alt="<?php echo $ship->price; ?>"  type="radio" <?php if($ship->id==$ship_pr->id) echo "checked"; ?> />
                            <span class="billing_text"><label class="checkbox_bil" style="left: 4px; top: -4px;" for="shipmethod<?php echo $ship->id; ?>"><?php echo $ship->type;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php
							}
							else{
					?>
                    		
                			<input name="shipmethod<?php echo $ship->id; ?>" id="shipmethod" value="<?php echo $ship->id; ?>"  alt="<?php echo $ship->price; ?>"  type="radio" />
                			<span class="billing_text"><label class="checkbox_bil" style="left: 4px; top: -4px;" for="shipmethod<?php echo $ship->id; ?>"><?php echo $ship->type;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                	<?php }
						} $it++;?>
                	
                	<?php 
					//echo $ship->price;
												if($pref_currency_type=="USD")
                                                {
                                                    $product_currency = currency("GBP","USD",($ship->price));
                                                    echo ($product_currency).'$';
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    $product_currency = currency("GBP","EUR",($ship->price));
                                                    echo ($product_currency).'&euro;';
                                                }
                                                else
                                                {
                                                    echo ($ship->price).'&pound;';
                                                }
					?></label></span>
                    <div class="clear" style="height:10px;"></div>
				<?php }?>
				</div><br/><br/>
                
                <div class="clear"></div>
                
                <input type="submit" class="payment_method_button open2" name="payment_method_submit" value="&nbsp;" />
                <div class="clear"></div>
              </div>
              <div class="shipping_box_right">
                <h1 class="order_summary_box">ORDER SUMMARY<span><a href="<?php echo base_url();?>cart/viewCart">(edit)</a></span></h1>
                <div class="shipping_box_items">Items</div>
				<?php $total = 0;
				foreach ($this->cart->contents() as $items)
				{
					$options=$this->cart->product_options($items['rowid']);
					?>
						<div class="order_summary_box2">
						<div style="float:left">
							<?php echo $items['name'];?><br />
							<small><?php echo $items['qty'];?>, <?php echo $options['size'];?></small> 
                        </div>
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
												$convert_price =  ($p - $rdmval);
																								if($pref_currency_type=="USD")
                                                                                                {
                                                                                                    $product_currency = $convert_price;
                                                                                                    echo ($product_currency).'$';
                                                                                                    $total += $product_currency;
                                                                                                }
                                                                                                else if($pref_currency_type=="EUR")
                                                                                                {   
                                                                                                    $product_currency = $convert_price;
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
	 									
									}
									else
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
												$convert_price = ($converted_item_price*$items['qty']);
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
										
									}
							?>
						</div>
						<div class="clear"></div>
					</div>
			<?php 
			}
			?>
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
				//echo '-'.number_format($discount,2).' &pound;';
				
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
                                                                                                    $total -= $discount;
                                                                                                } 
				
				?></span></div>
            <?php }?>

            <?php if(isset($tax) && !empty($tax)){
            	$aptax = $total*$tax->rate/100; //$total += $aptax; ?>
                         	<div class="shipping_box_items">Tax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='float:right;'><?php 
							//echo number_format($aptax,2).' &pound;';
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
                      <?php 
				
				  
                if (isset($ship_pr)){ ?>
            	<div class="shipping_box_items">Shipping &amp; handling &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='float:right;'><?php 
					//echo number_format($ship_pr->price,2)."  &pound;"; 
												if($pref_currency_type=="USD")
                                                                                                {
                                                                                                    $product_currency = currency("GBP","USD",($ship_pr->price));
                                                                                                    echo ($product_currency).'$';
                                                                                                    $total += $product_currency;
                                                                                                }
                                                                                                else if($pref_currency_type=="EUR")
                                                                                                {   
                                                                                                    $product_currency = currency("GBP","EUR",($ship_pr->price));
                                                                                                    echo ($product_currency).'&euro;';
                                                                                                    $total += $product_currency;
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                    echo ($ship_pr->price).'&pound;';
                                                                                                    $total += $ship_pr->price;
                                                                                                } 
					
					?></span></div>
            	<?php }else{?>    
            	<div class="shipping_box_items">Shipping &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='float:right;'><small>(To be updated) </small></span></div>
            	<?php }?>
            
                <div class="order_summary_box3">
                  <div style="float:left">TOTAL </div>
                  <div style="float:right"> <?php 
				  	//echo number_format($total,2).' &pound;';
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
					?></div>
                  <div class="clear"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
    <div class="clear"></div>
  </div>
  <?php $this->load->view("footer.php"); ?>
  <div class="clear"></div>
</div>
</body>
</html>
