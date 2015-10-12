<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" >
<meta http-equiv="X-UA-Compatible" content="IE=8" >
<title>
<?php echo lang('checkout_step3');?>
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

<script>
	$(document).ready(function(){
		var test = $("input[name$='pmtmethod']").val();
			/*
			if(test == 'opt2')
			{
				$('#creditcarddtl').hide();
			}
			
			*/
			
			$("input[name$='pmtmethod']").click(function() {
				var test = $(this).val();
				if(test=="opt1"){
					$("#creditcarddtl").show();
					$('#creditcarddtl input').addClass('pageRequired');
					$('#creditcarddtl select').addClass('pageRequired');
					
				}else{
					$('#creditcarddtl input').removeClass('pageRequired');
					$('#creditcarddtl select').removeClass('pageRequired');
					$("#creditcarddtl").hide();
				}
			});
	});
</script>
<script>
$(document).ready(function()
{
	// add * to required field labels
    $('label.required').append('&nbsp;<strong>*</strong>&nbsp;');

    var current = 0;
    $.validator.addMethod("pageRequired", function(value, element){
        										var $element = $(element)
        										function match(index) 
												{
            										return current == index && $(element).parents("#sf" + (index + 1)).length;
            									}
        										if(match(0) || match(1) || match(2) || match(3) || match(4)) 
												{
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
        <?php if(isset($applied_discount) && $applied_discount->type=='Free shipping'){?>
        <li>2. SHIPPING METHOD</li>
		<?php }else{?>
        <li class="tab-memu-select-prev"><a href="<?php echo base_url();?>cart/checkout_shipping">2. SHIPPING METHOD</a></li>
        <?php }?>
        <li class="tab-memu-select"><a href="javascript:void(0);">3. PAYMENT METHOD</a></li>
        <li>4. REVIEW AND PLACE ORDER</li>
      </ul>
      <div class="clear"></div>
    </div>
   <div class="tabbertab  " id="sf1">
   	<form class="cmxform" id="cmaForm" method="post" action="<?php echo base_url();?>cart/review_order" />
      
      <div class="single_product_down_tab" style="padding-bottom:15px;">
        <div class="shipping_box">
          <div class="shipping_box_left">
            <div class="shipping_heading">CHOOSE A PAYMENT METHOD</div>
            <div class="billing_box">
				<?php foreach($payment as $method){?>
					<?php if($method->id==1){?>
                	<input id="credit_card_payment_here" name="pmtmethod" value="opt1" type="radio" />
                	<div class="nocredit"><img src="<?php echo base_url();?>images/no_credit.jpg"></div>
                	<span class="billing_text" id="billing_text_place"><label for="credit_card_payment_here" class="checkbox_bil"><?php echo $method->name; ?></label></span>
                    <div class="clear" style="height:5px;"></div>
					<?php }
					if($method->id==2){?>
					<input id="paypal_payment_here" name="pmtmethod" value="opt2" type="radio" checked="checked" />
					<span class="billing_text"><label for="paypal_payment_here" class="checkbox_bil"><?php echo $method->name; ?></label></span>
				<?php } }?>	
                </div><br/><br/>
                
                <div class="clear"></div>
				<?php foreach($payment as $method){?>
				
				<?php if($method->id==1){ ?>
                <div id="creditcarddtl">
                	<div class="clear" style="height:8px;"></div>
                    
                    <?php 
						if($this->session->userdata('credit_card_invalid')=="true" && !$this->input->post('payment_method_submit'))
						{
							$this->session->unset_userdata('credit_card_invalid');
						?>
						    <div class="credit_card_error"><?php echo $this->session->userdata('receive_error');?></div>
					<?php } ?>
                   
                    
                	<div class="billing_title">Card Holder's Name:</div>
                	<input class="payment_input pageRequired" name="ccard[name]" id="ccname" type="text" />
                	<div class="clear" style="height: 15px;"></div>
                	<div class="billing_title">Card Number:</div>
                	<input class="payment_input pageRequired creditcard" name="ccard[ccno]" type="text" id="ccno" />
                	<div class="clear" style="height: 15px;"></div>
                	<div class="billing_title">Expiry Date:</div>
	                <select class="month_select_box pageRequired" name="ccard[month]" id="ccmonth" style="width:90px; margin-left:22px;">
	                  <option value="">Month</option>
	                  <option value="01">January</option>
	                  <option value="02">February</option>
	                  <option value="03">March</option>
	                  <option value="04">April</option>
	                  <option value="05">May</option>
	                  <option value="06">June</option>
	                  <option value="07">July</option>
	                  <option value="08">August</option>
	                  <option value="09">September</option>
	                  <option value="10">October</option>
	                  <option value="11">November</option>
	                  <option value="12">December</option>
	                </select>
	                <select class="year_select_box pageRequired" name="ccard[year]" id="ccyear" >
	                  <option value="">Year</option>	
	                  <option value="2012">2012</option>
	                  <option value="2013">2013</option>
	                  <option value="2014">2014</option>
	                  <option value="2015">2015</option>
	                  <option value="2016">2016</option>
	                  <option value="2017">2017</option>
	                  <option value="2018">2018</option>
	                  <option value="2019">2019</option>
	                  <option value="2020">2020</option>
	                </select>
                	<div class="billing_title2" style="margin-left:0px;">Security Code:</div>
                	<input type="text" class="code_input pageRequired" name="ccard[cvv]" id="cccvv" value="" />
                	
                <div class="clear"></div>
                
                <div class="info_image"></div>
                </div>
				<?php } } ?>
				<?php if(count($payment->all)>0){?>
                <input type="submit" class="review_button open1" value="" style="margin-top:213px;"/>
				<?php }?>
                <div class="clear"></div>
              </div>
              <div class="shipping_box_right">
                <h1 class="order_summary_box">ORDER SUMMARY<span><a href="<?php echo base_url();?>cart/viewCart">(edit)</a></span></h1>
                <div class="shipping_box_items">Items</div>
				<?php 
					$total = 0;
					foreach ($this->cart->contents() as $items)
					{
					$options=$this->cart->product_options($items['rowid']);
					?>
						<div class="order_summary_box2">
							<div style="float:left"><?php echo $items['name'];?><br />
							<small>Quantity - <?php echo $items['qty'];?></small> 
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
											$convert_price =($p-$rdmval);
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
				//echo number_format($discount,2)." &pound;";
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
                <?php if(isset($shipping)){?>         
                <div class="shipping_box_items">Shipping &amp; handling &nbsp;&nbsp;&nbsp;&nbsp;<span style='float:right;'><?php 
					//echo number_format($shipping->price,2).' &pound;'; 
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
                <?php }?>
                
                <div class="order_summary_box3">
                  <div style="float:left">TOTAL </div>
                  <div style="float:right"> 
				  	<?php 
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
					?>
                    <input type="hidden" name="toal_amount_charge" id="toal_amount_charge"  value="<?php 
					//echo number_format($total,2); 
												if($pref_currency_type=="USD")
                                                {
                                                    //$product_currency = currency("GBP","USD",($total));
                                                    echo ($total);
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    //$product_currency = currency("GBP","EUR",($total));
                                                    echo ($total);
                                                }
                                                else
                                                {
                                                    echo ($total);
                                                }
					?>">
                    <input type="hidden" name="toal_amount_charge_currency" id="toal_amount_charge_currency"  value="<?php 
												if($pref_currency_type=="USD")
                                                {
                                                    echo 'USD';
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    echo 'EUR';
                                                }
                                                else
                                                {
                                                    echo 'GBP';
                                                }
					?>" />
                  </div>
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
      </form>
  <?php $this->load->view("footer.php"); ?>
  <div class="clear"></div>
</div>
</body>
</html>
