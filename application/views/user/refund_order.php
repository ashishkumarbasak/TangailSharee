<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
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
        <li class="home"><a href="<?php echo base_url();?>user/member_profile">PROFILE</a></li>
	<?php if(isset($designers) && in_array($user->id,$designers)){ ?>
	<li class="earning"><a href="<?php echo base_url();?>user/manage_design/viewEarnings">EARNINGS</a></li>
	<li class="my_desigen"><a href="<?php echo base_url();?>user/manage_design/viewProducts">MY PRODUCTS</a></li>
        <li class="my_desigen"><a href="<?php echo base_url();?>user/manage_design/viewDesigns">MY DESIGNS</a></li>
        <li class="add_desigen"><a href="<?php echo base_url();?>user/manage_design/addDesign">ADD DESIGN</a></li>
	<?php } ?>
        <li class="support selected"><a href="<?php echo base_url();?>/user/member_order">MY ORDERS</a></li>
        <li class="wishlist"><a href="<?php echo base_url();?>user/member_wishlist">WISH-LIST</a></li>
        <?php if(isset($new_event)){ ?>
	<li class="support1"><a href="<?php echo base_url();?>new_contest">NEW EVENT!</a></li>
	<?php }  ?>
      </ul>
      <div style="display: block;">
        <div class="top_button_box">
          <div class="top_button"><a href="<?php echo base_url();?>user/member_order">Orders</a></div>
          <div class="point">:</div>
          <div class="shipping_in_button order_selected"><a href="<?php echo base_url();?>user/refund_order">Refunds</a></div>
        </div>
       
        <div class="tab_mid_box1">
         <?php if(count($orders->all)!=0){?>
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="top_font">
            <tr class="top_font">
              <td style="width:104px;">ORDER NUMBER</td>
              <td style="width:150px;">DATE</td>
              <td style="width:168px;">STATUS</td>
              <td style="width:180px;">REASON</td>
              
            </tr>
            <tr>
              <td></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              
            </tr>
            <?php
            	foreach($orders as $order){ 
            		//if ($user->id==$order->user->id){          	
            ?>
            <tr>
              <td style="width:104px;"><?php echo $order->order_id;?></td>
              <td style="width:150px;"><?php echo $order->created;?></td>
              <td style="width:168px;"><?php echo $order->status;?></td>
              <td style="width:180px;"><?php echo $order->reason;?></td>
            </tr>
            
            
            
            <tr>
              <td></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
             <?php 		
          		//	}
            	}
          	?>
          </table>
      <?php }else{?>    
      <h2>No Record Found </h2><?php }?>
          <div class="clear"></div>
          <!--Page Navi Start-->
  		 <?php $this->load->view('pagination');?>
    		<!--Page Navi End-->
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
</body>
</html>
