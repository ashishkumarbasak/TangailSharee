<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
	$profile_name = $user->first_name." ".$user->last_name;
	echo str_replace("{profile_name}",$profile_name,lang('change_passowrd'));
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
		$(this).toggleClass("active").next().slideToggle("fast");
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
      <div class="logout_button"><a href="<?php echo base_url();?>user/logout/"><img src="<?php echo base_url(); ?>images/logout_button.png" alt="logout" /></a></div>
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
          <div class="shipping_in_button"><a href="<?php echo base_url();?>user/billing_info">Billing info</a></div>
          <div class="point">:</div>
          <div class="shipping_in_button select1"><a href="<?php echo base_url();?>user/change_password">Password</a></div>
        </div>
        <?php echo form_open("user/change_password/saveNewpassword"); ?>
          
          <?php
                    if($this->session->userdata('display_message')=="yes" )
                        {
                            echo "<div class='inline_notification'>".$this->session->userdata('success_message')."</div>";
                            $this->session->unset_userdata('display_message');
                            $this->session->unset_userdata('success_message');
                            
                        }
		?>
          
          
        <div class="tab_mid_box">
		<?php if(isset($errors)){
			foreach($errors as $k=>$v){
				echo "<div class='update_error1'>".$k.' is '.$v."</div>";
			}
		} ?>
        <div class="tab_left_box">
            
            <?php if((isset($display_old_pass_field) && $display_old_pass_field=="no") || $this->input->post('display_old_pass_field')=="no") { ?>
            	<input type="hidden" name="old_password" class="email_input" value="<?php echo $user->password; ?>" />
                <input type="hidden" name="display_old_pass_field" id="display_old_pass_field" value="no">
                
            <?php }else{?>
                    <label>Old Password</label>
                    <input type="password" name="old_password" class="email_input" value="" />
                    <div class="clear"></div>
                    <?php if(isset($old_pass_invalid) && $old_pass_invalid=="yes") { ?><div class="error">Old password is not valid</div><?php }else{ ?>
                    	<?php echo form_error('old_password', '<div class="error">', '</div>'); ?>
                    <?php } ?>
            <?php } ?>
            
            <div class="gap"></div>
            <label>New Password</label>
            <input type="password" name="new_password" class="email_input" value="" />
            <div class="clear"></div>
            <?php echo form_error('new_password', '<div class="error">', '</div>'); ?>
            
            <div class="gap"></div>
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="email_input" value="" />
            <div class="clear"></div>
   	     	<?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>
            
            <div class="clear"></div>
            <input type="submit" value="" class="save_button" />
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
