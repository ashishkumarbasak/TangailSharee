<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" type="text/css" media="screen" />
<!--Select Box Js Start-->
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".toggle_container").hide();
	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
	});
});
</script>
<!--Select Box Js End-->
<!--LightBox Js-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.colorbox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>
<script type="text/javascript"src="<?php echo base_url(); ?>js/wishlist.js"></script>
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
		base_url="<?php echo base_url(); ?>";
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
		$("a[rel='example14']").colorbox();
        $(".example15").colorbox({width:"400px", inline:true, height:"auto", href:"#inline_example14"});
		//Example of preserving a JavaScript event for inline calls.
		$("#click").click(function(){ 
			$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
			return false;
		});
	});
</script>
<!--cufon Js-->
<script type="text/javascript" src="<?php echo base_url();?>js/cufon_min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Oswald_400.font.js"></script>
<script type="text/javascript">
        Cufon.replace('.nav_box'); // Works without a selector engine
		Cufon.replace('.shop_box'); // Works without a selector engine
		Cufon.replace('.footer_menu_1 h1 ,.footer_menu_2 h1 ,.footer_menu_3 h1 ,.footer_menu_4 h1'); // Works without a selector engine
</script>
</head>
<body>
<div id="top"></div>
<div id="wrapper">
	<!--Header Start-->
	<?php $this->load->view("header"); ?>
	<!--Header End-->
	<!--Top banner Start-->
	<?php $this->load->view("top_banner"); ?>
	<!--Top banner End-->
	<div class="bottem_border"></div>
	<!--Home Page Content Start-->
	<div id="mid_content">
		<div class="mid_content_top">
			<h3>Credit Card Details</h3>
			<?php if (validation_errors()){?>
			<div class="validation_errors">
				<?php echo validation_errors(); ?>
			</div>
			<br/><br/><br/>
			<?php } elseif (isset($payment_error)){ ?>
			<div class="validation_errors">
			<?php echo $payment_error; }?>
			</div>
			<?php echo form_open("cart/authorize"); ?>
	 		<div class="register_content">
	        	<?php echo form_open("register"); ?>
	         	<table cellpadding='0' cellspacing='0' border='0'>             
		            <tr>
		            	<td><label>First Name</label></td>
		            	<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		            	<td><input type="text" value="<?php echo set_value('first_name'); ?>" name="first_name" /></td>
		            </tr>
		            <tr>
		            	<td><label>Last Name</label></td>
		            	<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		            	<td><input type="text" value="<?php echo set_value('last_name'); ?>" name="last_name" /></td>
		            </tr>
	                <tr>
		            	<td><label>Address</label></td>
		            	<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		            	<td><input type="text" value="" name="address" /></td>
		            </tr>
	                <tr>
		            	<td><label>state</label></td>
		            	<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		            	<td><input type="text" value="" name="state" /></td>
		            </tr>
	                <tr>
		            	<td><label>Zip</label></td>
		            	<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		            	<td><input type="text" value="" name="zip" /></td>
		            </tr>      
	                <tr>
		            	<td><label>Card No</label></td>
		            	<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		            	<td><input type="text" value="" name="card_no" /></td>
		            </tr>         
	                <tr>
		            	<td><label>Exp.Date</label></td>
		            	<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		            	<td><input type="text" value="" name="exp_date" /></td>
		            </tr>
		            <tr>
		            	<td><label>Amount</label></td>
		            	<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		            	<td><input type='text' value="<?php echo $amount;?>" disabled="disabled" /></td>
		            	<input type='hidden' name="amount" value="<?php echo $amount;?>" />
		            </tr>       
	                <tr>
		            	<td></td>
		            	<td><input class="join_commiti" value="Submit" type="submit" name="user_register" /></td>
		            </tr>      
	                      <?php echo form_close(); ?>
	            </table>
	        </div>
        	<!-- <input type="submit" value='' class="item_proceed_button"  />-->
		</div>
		<div class="clear"></div>
	    <div class="mid_content_top_right">
	    	<h3>Stay tuned!</h3>
	        <div class="facebook">
	          	<img alt="facebook" src="<?php echo base_url();?>images/facebook_like.jpg" />
	        </div>
		</div>
    	<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<!--Home Page Content End-->
<!--Footer Start -->
<?php $this->load->view("footer.php"); ?>
<!--Footer End -->
<div class="clear"></div>
</div>
</body>
</html>
