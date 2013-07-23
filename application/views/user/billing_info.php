<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
	$profile_name = $user->first_name." ".$user->last_name;
	echo str_replace("{profile_name}",$profile_name,lang('billing_info'));
?>
</title>
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/global.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/member.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>
<!--Select Box Js Start-->
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
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

<script type="text/javascript">
var baseurl="<?php echo base_url();?>";
$(document).ready(function(){
	//global vars
	var form = $("#billinginfoForm");
	var address_line = $("#address_line1");
	var address_line_error = $("#address_line1_error");
	var city = $("#city");
	var city_error = $("#city_error");
	var country = $("#country");
	var country_error = $("#country_error");
	
	var check1 = false;
	var check2 = false;
	var check3 = false;
	//On blur
	address_line.blur(validateAddressLine);
	city.blur(validateCity);
	country.blur(validateCountry);
	//On Submitting
	form.submit(function(){
		check1=validateAddressLine();
		check2=validateCity();
		check1=validateCountry();
		if( check1 && check2)
			return true;
		else
			return false;
	});
	
	function validateAddressLine()
	{
		var address_line = $("#address_line1");
		var address_line_error = $("#address_line1_error");
		if(address_line.val().length < 1){
			
			address_line_error.text("Please input billing address");
			return false;
		}
		//if it's valid
		else{
			//name.removeClass("error");
			address_line_error.text("");
			return true;
		}
	}
	
	function validateCity()
	{
		var city = $("#city");
		var city_error = $("#city_error");
		if(city.val().length < 1){
			
			city_error.text("Please input billing city");
			return false;
		}
		//if it's valid
		else{
			//name.removeClass("error");
			city_error.text("");
			return true;
		}
	}
	
	function validateCountry()
	{
		var country = $("#country");
		var country_error = $("#country_error");
		if(country.val().length < 1){
			
			country_error.text("Please input billing country");
			return false;
		}
		//if it's valid
		else{
			//name.removeClass("error");
			country_error.text("");
			return true;
		}
	}
	
});	
</script>

<!--Select Box Js End-->
<!--LightBox Js-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.colorbox.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$("a[rel='example1']").colorbox();
			$("a[rel='example2']").colorbox({transition:"fade"});
			$("a[rel='example3']").colorbox({transition:"none", width:"75%"});
			$("a[rel='example4']").colorbox({slideshow:true});
			$(".example5").colorbox();
			$(".example6").colorbox({iframe:true, innerWidth:425,});
			$(".example7").colorbox({width:"580px", inline:true, height:"100%", href:"#inline_example2"});
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

</head>
<body>
<?php //$this->load->view("currencyconverter.php"); ?>
<div id="top"></div>
<div id="wrapper">
  <!--Header Start-->
  <?php $this->load->view('header'); ?>
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
          <span><?php if ($user->address->city != "") { echo $user->address->city.', '.$user->address->country; }?></span></h3>
        <div class="clear"></div>
      </div>
      <div class="logout_button"><a href="<?php echo base_url(); ?>user/logout/"><img src="<?php echo base_url(); ?>images/logout_button.png" alt="logout" /></a></div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!--Member taber Start-->
    <div id="vtab">
      <ul>
        <li class="home selected"><a href="<?php echo base_url();?>user/member_profile/index">PROFILE</a></li>
	<?php if(isset($designers) && in_array($user->id,$designers)){ ?>
	<li class="earning"><a href="<?php echo base_url();?>user/manage_design/viewEarnings">EARNINGS</a></li>
	<li class="my_desigen"><a href="<?php echo base_url();?>user/manage_design/viewProducts">MY PRODUCTS</a></li>
        <li class="my_desigen"><a href="<?php echo base_url();?>user/manage_design/viewDesigns">MY DESIGNS</a></li>
        <li class="add_desigen"><a href="<?php echo base_url();?>user/manage_design/addDesign">ADD DESIGN</a></li>
	<?php } ?>
        <li class="support"><a href="<?php echo base_url();?>/user/member_order">MY ORDERS</a></li>
        <li class="wishlist"><a href="<?php echo base_url();?>user/member_wishlist">WISH-LIST</a></li>
        <?php if(isset($new_event)){ ?>
	<li class="support1"><a href="<?php echo base_url();?>new_contest">NEW EVENT!</a></li>
	<?php }  ?>
      </ul>
      <div style="display: block;">
        <div class="top_button_box">
          <div class="top_button"><a href="<?php echo base_url();?>user/member_profile">Edit profile</a></div>
          <div class="point">:</div>
          <div class="shipping_in_button"><a href="<?php echo base_url();?>user/shipping_info">Shipping info</a></div>
          <div class="point">:</div>
          <div class="shipping_in_button select1"><a href="<?php echo base_url();?>user/billing_info">Billing info</a></div>
          <div class="point">:</div>
          <div class="shipping_in_button"><a href="<?php echo base_url();?>user/change_password">Password</a></div>
        </div>

<script type="text/javascript">
function same_as_billing_info()
{
	if($("#same_as_shipping").attr("checked")==true)
	{
		var address_line1="<?php echo $shipping_address->address->address_line1; ?>";
		var address_line2="<?php echo $shipping_address->address->address_line2; ?>";
		var address_line3="<?php echo $shipping_address->address->address_line3; ?>";
		var city="<?php echo $shipping_address->address->city; ?>";
		var state="<?php echo $shipping_address->address->state; ?>";
		var country="<?php echo $shipping_address->address->country; ?>";
		var post_code="<?php echo $shipping_address->address->postcode; ?>";
		$("#address_line1").val(address_line1);
		$("#address_line2").val(address_line2);
		$("#address_line3").val(address_line3);
		$("#city").val(city);
		$("#state").val(state);
		$("#post_code").val(post_code);
		$("#country").val(country);
		
	}	
	else
	{
		var address_line1="<?php echo $user->address->address_line1; ?>";
		var address_line2="<?php echo $user->address->address_line2; ?>";
		var address_line3="<?php echo $user->address->address_line3; ?>";
		var city="<?php echo $user->address->city; ?>";
		var state="<?php echo $user->address->state; ?>";
		var country="<?php echo $user->address->country; ?>";
		var post_code="<?php echo $user->address->postcode; ?>";
		$("#address_line1").val(address_line1);
		$("#address_line2").val(address_line2);
		$("#address_line3").val(address_line3);
		$("#city").val(city);
		$("#state").val(state);
		$("#post_code").val(post_code);
		$("#country").val(country);
	}
}
</script>
        
        <?php 
			$attributes = array('name'=>'billinginfoForm','id'=>'billinginfoForm');
			echo form_open_multipart("user/billing_info/saveBillingInfo",$attributes); 
		?>
        <?php if(isset($user)){?>
				<input type="hidden" value='<?php echo $user->id;?>' name='user_id' />
			<?php }?>
            
        <div class="tab_mid_box">
        	
            <div class="tab_left_box">
            
            	<input type="checkbox" class="tab_check_box" name="same_as_shipping" id="same_as_shipping" onclick="same_as_billing_info();" <?php if($this->input->post('save') && $this->input->post('same_as_shipping')) echo "checked"; elseif(isset($user) && $user->address->is_bill_same_as_ship == "1") echo "checked"; ?> />
            	<label>Same as shipping info</label>
            	<div class="clear"></div>
                
                <div class="gap"></div>
                <label>Address Line 1</label>
            	<input type="text" name="address_line1" id="address_line1" class="email_input" tabindex="1" value="<?php if($this->input->post('save')) echo $this->input->post('address_line1'); elseif(isset($user)) echo $user->address->address_line1; ?>" />
                <div class="clear"></div>
                <?php if(isset($errors) && array_key_exists('address_line1',$errors)){?>
                	<div id="address_line1_error" class="error">Please input billing address.</div>
                <?php }else{ ?>
                	<div id="address_line1_error" class="error"></div>
                <?php } ?>  
                
            	<div class="gap"></div>
                <label>Address Line 2</label>
            	<input type="text" name="address_line2" id="address_line2" class="email_input" tabindex="2" value="<?php if($this->input->post('save')) echo $this->input->post('address_line2'); elseif(isset($user)) echo $user->address->address_line2;?>" />
                <div class="clear"></div>
                
            	<div class="gap"></div>
                <label>Address Line 3</label>
            	<input type="text" name="address_line3" id="address_line3" class="email_input" tabindex="3" value="<?php if($this->input->post('save')) echo $this->input->post('address_line3'); elseif(isset($user)) echo $user->address->address_line3;?>" />
                <div class="clear"></div>
                
            	<div class="left_input_box">
                      <div class="gap"></div>
                      <label>City</label>
                      <input type="text" name="city" id="city" tabindex="4" value="<?php if($this->input->post('save')) echo $this->input->post('city'); elseif(isset($user)) echo $user->address->city; ?>" />
                      <div class="clear"></div>
                      <?php if(isset($errors) && array_key_exists('city',$errors)){?>
                		<div class="error">Please input billing city.</div>
                	  <?php }else{ ?>
                		<div id="city_error" class="error"></div>
               		<?php } ?> 
                      
                      	<div class="gap"></div>
					  	<label>State</label>
              		  	<input type="text" name="state" id="state" tabindex="5" value="<?php if($this->input->post('save')) echo $this->input->post('state'); elseif(isset($user)) echo $user->address->state; ?>" />
                      
                      
	            </div>
            	
                <div class="right_input_box">

					<div class="gap"></div>
            		<label>Zip/Postal</label>
              		<input type="text" name="post_code" id="post_code" tabindex="5" value="<?php if($this->input->post('save')) echo $this->input->post('post_code'); elseif (isset($user))  echo $user->address->postcode; ?>" />
                    
					  
                      <div class="gap"></div>
                      <label>Country</label>
                      <?php 
						if($this->input->post('save')) 
							$selected_country = $this->input->post('country');
						elseif (isset($user))  
							$selected_country = $user->address->country;
						else
							$selected_country = "United Kingdom";
						
						echo "<select name=\"country\" id=\"country\" class=\"taber_select_box\">";
						foreach($list_of_countries as $c)
							{
								echo "<option value=\"".$c->country_name."\"";
								if($c->country_name==$selected_country) echo " selected ";
								echo ">".$c->country_name."</option>";
							}
						echo "</select>";
						 ?>
                      <div class="clear"></div>
                      <?php if(isset($errors) && array_key_exists('country',$errors)){?>
                		<div class="error">Please input billing country.</div>
                	  <?php }else{ ?>
                		<div id="country_error" class="error"></div>
               		<?php } ?>
            	</div>
            	<div class="clear"></div>
            	<input type="submit" name="save" value="&nbsp;" class="save_button" />
                
          </div>
          <div class="clear"></div>
        </div>
        <?php form_close(); ?>
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
</body>
</html>
