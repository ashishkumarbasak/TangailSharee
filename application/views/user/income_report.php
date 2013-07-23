<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Your income | Twinne.com</title>
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/global.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/member.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/file_style.css" type="text/css" />

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
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fileinput.js"></script>
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
  <?php $this->load->view('header'); ?>
  <!--Header End-->
  <?php $this->load->view('top_banner'); ?>
  
  <!--Page Content Start-->
  <div id="mid_content">
    <div class="mid_content_top">
      <div class="member_area_top_left">
        <div class="member_area_top_left_image">
        <?php if ($designer->image->filename){?>
          <img src="<?php echo base_url(); ?>images/profile_image/short_image/<?php echo $designer->image->filename; ?>" alt="profilr-image" />
          <?php }
          else {?>
          <img src="<?php echo base_url(); ?>images/no_image_48.jpg" alt="profilr-image" />
          <?php }?>
          </div>
        <h3><?php echo $designer->display_name;?><br />
          <span><?php if ($designer->address->city != "") { echo $designer->address->city.', '.$designer->address->country; }?></span></h3>
          
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
	<?php if(isset($designers) && in_array($designer->id,$designers)){ ?>
	<li class="earning selected"><a href="<?php echo base_url();?>user/manage_design/viewEarnings">EARNINGS</a></li>
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
          <div class="top_button"><a href="<?php echo base_url();?>user/manage_design/viewEarnings">Dashboard</a></div>
          <div class="point">:</div>
          <div class="shipping_in_button select1"><a style="background: #eee;" href="<?php echo base_url();?>user/manage_design/incomeReport">Income report</a></div>
          <div class="point">:</div>
          <div class="shipping_in_button"><a href="<?php echo base_url();?>user/manage_design/refundReport">Refund Report</a></div>
          <div class="point">:</div>
          <div class="shipping_in_button"><a style="width:auto; padding-left:5px; padding-right:5px;" href="<?php echo base_url();?>user/manage_design/paymentSetting">Payment settings</a></div>
        </div>
        <div class="tab_mid_box1">
          <div class="earning_box_left">
		<?php
		if(isset($no_record)){ ?>
			<h1>No Record Found</h1>	
		<?php }
		foreach($result as $reslt) {
			
			?>
           <h1><?php echo $reslt['date']; ?></h1>
	   <?php if($reslt['total_sales'] > 0) { ?>
           <p><?php echo $reslt['total_sales']; ?> Sales<span><?php if($reslt['payment']=='Payment pending') { ?><img src="<?php echo base_url(); ?>images/watch.png" /><?php } elseif($reslt['payment']=='Payment processed') { ?><img src="<?php echo base_url(); ?>images/right_icon.png" /><?php } echo $reslt['payment']; ?></span></p></p>
	   <?php $m = 0; foreach($reslt['product'] as $res) { $m++;
			if($m==1){
				$class = "earning_product";
			}
			else{
				$class = "earning_product1";
			}
	   ?>
			<div class="<?php echo $class; ?>"><?php echo $res['name'].', '.$res['qty'].' sales'; ?></div>
			
	   <?php }
	   } else {
	?>
	<p>No sales in this month</p>
	<?php } ?>
           <!--<div class="last_week_box">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="top_font2">
            <tr>
              <td class="last_week_text">Day</td>
              <td class="last_week_text">Sales</td>
              <td class="last_week_text">Revenue</td>
            </tr>
	    <?php //foreach($results as $result) { ?>
            <tr>
              <td><?php //$result['date']=explode('-',$result['date']); echo $result['date'][2].'/'.$result['date'][1].'/'.$result['date'][0]; ?></td>
              <td style=" padding:3px 0 3px 15px;"><?php //echo $result['total_sales']; ?></td>
              <td style=" padding:0 0 0 10px;"><?php //echo $result['total_revenue'].'&pound'; ?></td>
            </tr>
	    <?php  //} ?>
          </table>           
        </div> -->
        <div class="clear" style="height:15px;"></div>
	<?php } ?>
        </div>
       <div class="earning_box_right">
         <h1>HOW CAN I GET PAID?</h1>
         <p>Payments are automatically performed on a monthly basis. You will receive the income of a month during the first week of the following month. For example you will receive the income of March during the first week of April.<br />
          
          <br />Be sure to update you payment<br /> 
          settings.</p>
            
            </div>
          
          
          
         
          <div class="clear"></div>
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