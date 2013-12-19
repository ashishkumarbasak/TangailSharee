<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" >
<meta http-equiv="X-UA-Compatible" content="IE=8" >
<title>Gallery</title>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/example-1.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" type="text/css" media="screen" />
<!--Select Box Js Start-->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>
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
		$(".tabberlive ul li:eq(0)").removeClass('tabberactive');
		$(".tabberlive ul li:eq(1)").addClass('tabberactive');
		$('#sf1').addClass('tabbertabhide');
		$('#sf2').removeClass('tabbertabhide');
		current = 1;
		return false; //Prevent the browser jump to the link anchor
      }
    });
    $(".open2").click(function() {
        if(v.form())
  	  {
        var shipping = $('input:radio[name=shipmethod]:checked').val();
        var ajax_load = '<div class=\"loading\"><img src=\"http://192.168.1.53/twinne/img/fb_large_loading.gif\" /></div>';
        var loadUrl ="<?php echo base_url();?>cart/shippingadd/"+shipping;
        $("#shippingprice").html(ajax_load).load(loadUrl);
        $("#shippingprice1").html(ajax_load).load(loadUrl);
		//alert(loadUrl);	
  		$(".tabberlive ul li:eq(1)").removeClass('tabberactive');
  		$(".tabberlive ul li:eq(2)").addClass('tabberactive');
  		$('#sf2').addClass('tabbertabhide');
  		$('#sf3').removeClass('tabbertabhide');
  		current = 2;
  		return false; //Prevent the browser jump to the link anchor
        }
      });
    $(".open3").click(function() {
        if(v.form())
  	  	{
			var ccno =$('#ccno').val();
			var str_array = ccno.split('');

		    for( var i = 4;  i < 12; i++ ) {
		        str_array[ i ] = 'X';
		    }

		    foo = str_array.join('');

		    var ccinfo = $('#ccname').val()+'<br/>'+foo+'<br/>'+$('#ccmonth').val()+'/'+$('#ccyear').val();
	  		$('#ccinfo').html(ccinfo);
			
      		$(".tabberlive ul li:eq(2)").removeClass('tabberactive');
	  		$(".tabberlive ul li:eq(3)").addClass('tabberactive');
	  		$('#sf3').addClass('tabbertabhide');
	  		$('#sf4').removeClass('tabbertabhide');
	  		var shipping = $('#sfname').val()+' '+$('#slname').val()+'<br/>'+$('#sadd1').val()+'<br/>'+$('#sadd2').val()+'<br/>'+$('#sadd3').val()+'<br/>'+$('#scity').val()+' '+$('#sstate').val()+'<br/>'+$('#scountry').val()+' '+$('#spocode').val();
	  		$('#shippingadd').html(shipping);
	  		var billingto = $('input:radio[name=group1]:checked').val();
	  		
	  		if(billingto == 'same')
	  	  		var billing = shipping;
	  		else{
	  			var billing = $('#bfname').val()+' '+$('#blname').val()+'<br/>'+$('#badd1').val()+'<br/>'+$('#badd2').val()+'<br/>'+$('#badd3').val()+'<br/>'+$('#bcity').val()+' '+$('#bstate').val()+'<br/>'+$('#bcountry').val()+' '+$('#bpocode').val();
	  		}
	  		$('#billingadd').html(billing);
	
			var ccno = $('#ccno').val();
	  		current = 3;
	  		return false; //Prevent the browser jump to the link anchor
        }
      });
    $(".open4").click(function() {
        if(v.form())
  	  	{
        	return true;
  	  	}
    });
	
 
});

</script>
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
<div id="top"></div>
<div id="wrapper">
  <!--Header Start-->
  <?php $this->load->view('header');?>
  <!--Header End-->
  <!-- <div id="top_banner"><img src="images/top_banner.jpg" alt="Banner" /></div>-->
  <!--Page Content Start-->
  <div id="mid_content">
  <form class="cmxform" id="cmaForm" method="post" action="<?php echo base_url();?>cart/processorder">
    <div class="matrimonial">
      <div class="tabber">
        <!--tabber -1 Start-->
        
        <div class="tabbertab" id ="sf1">
          <h2 >1. SHIPPING  BILLING INFO</h2>
          <div class="single_product_down_tab">
            <div class="shipping_box">
              <div class="shipping_box_left" style="border:solid red 1px;">
              
                <h1 class="shipping_heading">SHIPPING TO </h1>
                <label>First name:</label>
                <input id='sfname' type="text" name="data[shipping][first_name]" class="name_input pageRequired" value="<?php if (!empty($shipadd)){ echo $shipadd['first_name']; }?>" />
                <label style="margin:0 0 0 44px;">Last name:</label>
                <input id='slname' type="text" name="data[shipping][last_name]" class="name_input pageRequired" value="<?php if (!empty($shipadd)){ echo $shipadd['last_name']; }?>" />
                <div class="clear" style="height:15px;"></div>
                <label>Address 1:</label>
                <input id='sadd1' type="text" name="data[shipping][address_line1]" class="add_input pageRequired" value="<?php if (!empty($shipadd)){ echo $shipadd['address_line1']; }?>" />
                <div class="clear" style="height:15px;"></div>
                <label>Address 2:</label>
                <input id='sadd2' type="text" name="data[shipping][address_line2]" class="add_input pageRequired" value="<?php if (!empty($shipadd)){ echo $shipadd['address_line2']; }?>" />
                <div class="clear" style="height:15px;"></div>
                
                <label>Address 3:</label>
                <input id='sadd3' type="text" name="data[shipping][address_line3]" class="add_input pageRequired" value="<?php if (!empty($shipadd)){ echo $shipadd['address_line3']; }?>" />
                <div class="clear" style="height:15px;"></div>
                
                <label >City</label>
                <input id='scity' type="text" name="data[shipping][city]" class="name_input pageRequired" value="<?php if (!empty($shipadd)){ echo $shipadd['city']; }?>" />
                <label style="margin:0 0 0 44px;">State/Prov:</label>
                <input id='sstate' type="text" name="data[shipping][state]" class="name_input pageRequired" value="<?php if (!empty($shipadd)){ echo $shipadd['state']; }?>"/>
                <div class="clear" style="height:15px;"></div>
                
                <label>Country:</label>
                <input id='scountry' type="text" name="data[shipping][country]" class="name_input pageRequired" value="<?php if (!empty($shipadd)){ echo $shipadd['country']; }?>"/>
                <label style="margin:0 0 0 44px;">Zip/Postal</label>
                <input id='spocode' type="text" name="data[shipping][postcode]" class="name_input pageRequired" value="<?php if (!empty($shipadd)){ echo $shipadd['postcode']; }?>" />
                <div class="clear" style="height:15px;"></div>
                
                <div class="clear"></div>
                
                
                
                <h1 class="shipping_heading">BILLING TO</h1>
                <div class="billing_box">
                	<input name="group1" id="billingto" value="same" type="radio" checked="checked"  />
                	<div class="billing_text">Same of shipping info</div>
                    <br/><br/>
					<input name="group1" id="billingto" value="diff" type="radio" />
					<div class="billing_text">Add billing information</div>
                </div><br/><br/>
                <div class="clear"></div>
                <div id="billing_info" style="display:none;">
                
	                <label>First name:</label>
	                <input id='bfname' type="text" name="data[billing][first_name]" class="name_input" value="<?php if (!empty($billadd)){ echo $billadd['first_name']; }?>" />
	                <label style="margin:0 0 0 44px;">Last name:</label>
	                <input id='blname' type="text" name="data[billing][last_name]" class="name_input" value="<?php if (!empty($billadd)){ echo $billadd['last_name']; }?>" />
	                <div class="clear" style="height:15px;"></div>
	                <label>Address 1:</label>
	                <input id='badd1' type="text" name="data[billing][address_line1]" class="add_input" value="<?php if (!empty($billadd)){ echo $billadd['address_line1']; }?>" />
	                <div class="clear" style="height:15px;"></div>
	                <label>Address 2:</label>
	                <input id='badd2' type="text" name="data[billing][address_line2]" class="add_input" value="<?php if (!empty($billadd)){ echo $billadd['address_line2']; }?>" />
	                <div class="clear" style="height:15px;"></div>
	               
	               <label>Address 3:</label>
	                <input id='badd3' type="text" name="data[billing][address_line3]" class="add_input" value="<?php if (!empty($billadd)){ echo $billadd['address_line3']; }?>" />
	                <div class="clear" style="height:15px;"></div>
	                
	                <label >City:</label>
	                <input id='bcity' type="text" name="data[billing][city]" class="name_input" value="<?php if (!empty($billadd)){ echo $billadd['city']; }?>" />
	                <label style="margin:0 0 0 44px;">State/Prov:</label>
	                <input id='bstate' type="text" name="data[billing][state]" class="name_input" value="<?php if (!empty($billadd)){ echo $billadd['state']; }?>"/>
	                <div class="clear" style="height:15px;"></div>
	                
	                <label >Country:</label>
	                <input id='bcountry' type="text" name="data[billing][country]" class="name_input" value="<?php if (!empty($billadd)){ echo $billadd['country']; }?>"/>
	                
	                <label style="margin:0 0 0 44px;">Zip/Postal</label>
	                <input id='bpocode' type="text" name="data[billing][postcode]" class="name_input " value="<?php if (!empty($billadd)){ echo $billadd['postcode']; }?>" />
	                <div class="clear"></div>
	            </div>
	            
	            <h1 class="shipping_heading">COUPON / GIFT CARD</h1>
	            <input class="name_input2" type="text" value="" />
	            <input type="button" class="apply_button" value="" />
	            <input type="button" class="shipping_method_button open1" value="" />
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
				<small><?php echo $items['qty'];?> X <?php echo $options['size'];?></small> </div>
				<div style="float:right">$<?php echo ($items['price']*$items['qty']); $total=$total+($items['price']*$items['qty']);?></div>
				<div class="clear"></div>
				</div>
				<?php }?>
                <!-- <div class="order_summary_box2">
                  <div style="float:left">T-shirt Title<br />
                    <small>1x (Men���s Medium)</small> </div>
                  <div style="float:right">$21</div>
                  <div class="clear"></div>
                </div>
                <div class="order_summary_box2">
                  <div style="float:left">T-shirt Title<br />
                    <small>1x (Men���s Medium)</small> </div>
                  <div style="float:right">$21</div>
                  <div class="clear"></div>
                </div>-->
                <div class="clear" style="height:10px;"></div>
                <div class="shipping_box_items">Shipping &amp; Taxes</div>
                <div class="order_summary_box2">
                  <div style="float:left"><small>(To be updated) </small> </div>
                  <div style="float:right"><small>----</small></div>
                  <div class="clear"></div>
                </div>
                <div class="order_summary_box3">
                  <div style="float:left">TOTAL </div>
                  <div style="float:right"> $<?php echo $total;?></div>
                  <div class="clear"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
        <!--tabber -1 End-->
        <!--tabber -2 Start-->
        <div class="tabbertab" id="sf2">
          <h2>2. SHIPPING METHOD</h2>
          <div class="single_product_down_tab">
            <div class="shipping_box">
              <div class="shipping_box_left">
                <h1 class="shipping_heading">CHOOSE A SHIPPING METHOD</h1>
                
                
                
                <div class="billing_box">
                <?php foreach ($shipping as $ship){
                	if($ship->id ==1){?>
                		<input name="shipmethod" value="<?php echo $ship->id; ?>" type="radio" checked="checked"/>
                	<?php }
                	else {?>
                		<input name="shipmethod" value="<?php echo $ship->id; ?>" type="radio" />
                	<?php }?>
                	
                	<div class="billing_text"><?php echo $ship->type;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo $ship->price;?></div>
                    <div class="clear" style="height:10px;"></div>
				<?php }?>
				</div><br/><br/>
                
                <div class="clear"></div>
                
                <input type="button" class="payment_method_button open2" value="" />
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
				<small><?php echo $items['qty'];?> X <?php echo $options['size'];?></small> </div>
				<div style="float:right">$<?php echo ($items['price']*$items['qty']); $total=$total+($items['price']*$items['qty']);?></div>
				<div class="clear"></div>
				</div>
				<?php }?>
                <div class="clear" style="height:10px;"></div>
                <div class="shipping_box_items">Shipping &amp; Taxes</div>
                <div class="order_summary_box2">
                  <div style="float:left"><small>(To be updated) </small> </div>
                  <div style="float:right"><small>----</small></div>
                  <div class="clear"></div>
                </div>
                <div class="order_summary_box3">
                  <div style="float:left">TOTAL </div>
                  <div style="float:right"> $<?php echo $total;?></div>
                  <div class="clear"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
        <!--tabber -2 End-->
        <!--tabber -3 Start-->
        <div class="tabbertab" id='sf3'>
          <h2>3. PAYMENT METHOD</h2>
          <div class="single_product_down_tab">
            <div class="shipping_box">
              <div class="shipping_box_left">
                <h1 class="shipping_heading">CHOOSE A PAYMENT METHOD</h1>
<!--                 <div class="billing_box"> -->
<!--                   <input type="checkbox" value="" /> -->
<!--                   <div class="billing_text">Credit card (Visa, Maestro, Mastercard...)</div> -->
                  <div class="clear" style="height:10px;"></div>
<!--                   <input type="checkbox" value="" /> -->
<!--                   <div class="billing_text">Paypal</div> -->
<!--                 </div> -->
				<div class="billing_box">
                	<input name="pmtmethod" value="opt1" type="radio" checked="checked"  />
                	<div class="billing_text">Credit card (Visa, Maestro, Mastercard...)</div>
                    <div class="clear" style="height:10px;"></div>
					
					<input name="pmtmethod" value="opt2" type="radio" />
					<div class="billing_text">Paypal</div>
                </div><br/><br/>
                
                <div class="clear"></div>
                <div class="clear" style="height: 15px;"></div>
                <div class="billing_title">Name complete:</div>
                <input class="payment_input pageRequired" name="ccard[name]" id="ccname" type="text" />
                <div class="clear" style="height: 15px;"></div>
                <div class="billing_title">Credit card number:</div>
                <input class="payment_input pageRequired creditcard" name="ccard[ccno]" type="text" id="ccno" />
                <div class="clear" style="height: 15px;"></div>
                <div class="billing_title">Credit card number:</div>
                <select class="month_select_box pageRequired" name="ccard[month]" id="ccmonth">
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
                  <option value="12">2012</option>
                  <option value="13">2013</option>
                  <option value="14">2014</option>
                  <option value="15">2015</option>
                  <option value="16">2016</option>
                  <option value="17">2017</option>
                  <option value="18">2018</option>
                  <option value="19">2019</option>
                  <option value="20">2020</option>
                </select>
                <div class="billing_title2">Security code:</div>
                <input type="password" class="code_input pageRequired" name="ccard[cvv]" id="cccvv" value="" />
                <input type="button" class="review_button open3" value="" />
                <div class="clear"></div>
              </div>
              <div id='shippingprice' class="shipping_box_right">
                <h1 class="order_summary_box">ORDER SUMMARY<span><a href="<?php echo base_url();?>cart/viewCart">(edit)</a></span></h1>
                <div class="shipping_box_items">Items</div>
                <?php $total = 0;
				foreach ($this->cart->contents() as $items){
					$options=$this->cart->product_options($items['rowid']);
				?>
				<div class="order_summary_box2">
				<div style="float:left"><?php echo $items['name'];?><br />
				<small><?php echo $items['qty'];?> X <?php echo $options['size'];?></small> </div>
				<div style="float:right">$<?php echo ($items['price']*$items['qty']); $total=$total+($items['price']*$items['qty']);?></div>
				<div class="clear"></div>
				</div>
				<?php }?>
                <!-- <div class="order_summary_box2">
                  <div style="float:left">T-shirt Title<br />
                    <small>1x (Men���s Medium)</small> </div>
                  <div style="float:right">$21</div>
                  <div class="clear"></div>
                </div>
                <div class="order_summary_box2">
                  <div style="float:left">T-shirt Title<br />
                    <small>1x (Men���s Medium)</small> </div>
                  <div style="float:right">$21</div>
                  <div class="clear"></div>
                </div>-->
                <div class="clear" style="height:10px;"></div>
                <div class="shipping_box_items">Shipping &amp; Taxes</div>
                <div class="order_summary_box2">
                  <div style="float:left"><small>(To be updated) </small> </div>
                  <div style="float:right"><small>----</small></div>
                  <div class="clear"></div>
                </div>
                <div class="order_summary_box3">
                  <div style="float:left">TOTAL </div>
                  <div style="float:right"> $<?php echo $total;?></div>
                  <div class="clear"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
        <!--tabber -3 End-->
        <!--tabber -4 Start-->
        <div class="tabbertab" id='sf4'>
          <h2>4. REVIEW AND PLACE ORDER</h2>
          <div class="single_product_down_tab">
            <div class="shipping_box">
              <div class="shipping_box_left">
                <div class="review_place_order_left">
                  <h1 class="review_title">SHIPPING TO</h1>
                  <div class="review_place_order_text" id = 'shippingadd'></div>
                  <h1 class="review_title">CREDIT CARD INFO</h1>
                  <div class="review_place_order_text" id="ccinfo"></div>
                </div>
                <div class="review_place_order_right">
                  <h1 class="review_title">BILLING TO</h1>
                  <div class="review_place_order_text" id="billingadd"></div>
                  <h1 class="review_title">E-MAIL</h1>
                  <div class="review_place_order_text"><?php echo $user->email;?></div>
                </div>
                <input type="submit" class="place_the_order_button open4" value="" />
                <div class="clear"></div>
              </div>
              <div id='shippingprice1' class="shipping_box_right">
                <h1 class="order_summary_box">ORDER SUMMARY<span><a href="<?php echo base_url();?>cart/viewCart">(edit)</a></span></h1>
                <div class="shipping_box_items">Items</div>
                <?php $total = 0;
				foreach ($this->cart->contents() as $items){
					$options=$this->cart->product_options($items['rowid']);
				?>
				<div class="order_summary_box2">
				<div style="float:left"><?php echo $items['name'];?><br />
				<small><?php echo $items['qty'];?> X <?php echo $options['size'];?></small> </div>
				<div style="float:right">$<?php echo ($items['price']*$items['qty']); $total=$total+($items['price']*$items['qty']);?></div>
				<div class="clear"></div>
				</div>
				<?php }?>
                <!-- <div class="order_summary_box2">
                  <div style="float:left">T-shirt Title<br />
                    <small>1x (Men���s Medium)</small> </div>
                  <div style="float:right">$21</div>
                  <div class="clear"></div>
                </div>
                <div class="order_summary_box2">
                  <div style="float:left">T-shirt Title<br />
                    <small>1x (Men���s Medium)</small> </div>
                  <div style="float:right">$21</div>
                  <div class="clear"></div>
                </div>-->
                <div class="clear" style="height:10px;"></div>
                <div class="shipping_box_items">Shipping &amp; Taxes</div>
                <div class="order_summary_box2">
                  <div style="float:left"><small>(To be updated) </small> </div>
                  <div style="float:right"><small>----</small></div>
                  <div class="clear"></div>
                </div>
                <div class="order_summary_box3">
                  <div style="float:left">TOTAL </div>
                  <div style="float:right"> $<?php echo $total;?></div>
                  <div class="clear"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
        <!--tabber -4 End-->
      </div>
    </div>
    <div class="clear"></div></form>
  </div>
  <!--Home Page Content End-->
  <?php $this->load->view("footer.php"); ?>
  <div class="clear"></div>
</div>
</body>
</html>
