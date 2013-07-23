<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
	echo lang('add_design');
?>
</title>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/file_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>css/global.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/member.css" type="text/css" />
<!--Select Box Js Start-->
<script  type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
var baseurl="<?php echo base_url();?>";	
$(document).ready(function(){
	//global vars
	var form = $("#AddDesignForm");
	var designtitle = $("#designtitle");
	var designdescription = $("#designdescription");
	
	var check1 = false;
	var check2 = false;
	//On blur
	designtitle.blur(validateTitle);
	designdescription.blur(validateDescription);
	
	form.submit(function(){
		check1=validateTitle();
		var check2=validateDescription();
		if( check1 && check2)
			return true;
		else
			return false;
	});
	
	function validateTitle(){
		var designtitle = $("#designtitle");
		//if it's NOT valid
		if(designtitle.val().length < 1){
			
			designtitle.css("border","solid red 1px");
			return false;
		}
		//if it's valid
		else{
			//name.removeClass("error");
			designtitle.css("border","1px #CCCCCC solid;");
			return true;
		}
	}
	
	function validateDescription(){
		var designdescription = $("#designdescription");
		//if it's NOT valid
		if(designdescription.val().length < 1){
			
			designdescription.css("border","solid red 1px");
			return false;
		}
		//if it's valid
		else{
			//name.removeClass("error");
			designdescription.css("border","solid #CCCCCC 1px");
			return true;
		}
	}
	
	
	
});	
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
<!--Select Box Js End-->
<!--LightBox Js-->
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
			
			$('input[type=file]').change(function(e){
				$in=$(this);
				$('#tem_filename').text($in.val());
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
<?php $this->load->view('top_banner');?>
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
      <div class="logout_button"><a href="<?php echo base_url(); ?>logout"><img src="<?php echo base_url(); ?>images/logout_button.png" alt="logout" /></a></div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!--Member taber Start-->
    <div id="vtab">
      <ul>
        <li class="home"><a href="<?php echo base_url();?>user/member_profile">PROFILE</a></li>
	<?php if(isset($designers) && in_array($designer->id,$designers)){ ?>
	<li class="earning"><a href="<?php echo base_url();?>user/manage_design/viewEarnings">EARNINGS</a></li>
	<li class="my_desigen"><a href="<?php echo base_url();?>user/manage_design/viewProducts">MY PRODUCTS</a></li>
        <li class="my_desigen"><a href="<?php echo base_url();?>user/manage_design/viewDesigns">MY DESIGNS</a></li>
        <li class="add_desigen selected"><a href="<?php echo base_url();?>user/manage_design/addDesign">ADD DESIGN</a></li>
	<?php } ?>
        <li class="support"><a href="<?php echo base_url();?>/user/member_order">MY ORDERS</a></li>
        <li class="wishlist"><a href="<?php echo base_url();?>user/member_wishlist">WISH-LIST</a></li>
        <?php if(isset($new_event)){ ?>
	<li class="support1"><a href="<?php echo base_url();?>new_contest">NEW EVENT!</a></li>
	<?php }  ?>
      </ul>
      <div style="display: block;">
        <div class="top_button_box">
          <div class="open_button"><?php if($designer->status=='1'){ echo "Open"; } else { echo "Closed"; }?></div>
        </div>
	
        <div class="tab_mid_box3">
        <?php if($designer->status=='1'){ ?>
        <div class="earning_box_left">
            <h1>ADD A NEW DESIGN</h1>
            <p>Put some info here about the design (i.e. max size is 
              3000x4000px at 300 dpi) </p>
            <p><a href="javascript:void(0);">Once your concept will accepted,you will be able to submit the source file destined to printing.</a> </p>
            <div class="terms-conditions" style="margin:0 0 0 30px;">T-shirt template</div>
            <div class="clear" style="height:15px;"></div>
	
    
    	<div class="select-box">
		<?php 
		$attributes = array('name'=>'AddDesignForm','id'=>'AddDesignForm');
		echo form_open_multipart('user/manage_design/saveDesign',$attributes);
		?>
	 	<h3 style="padding: 15px 0pt;">Title</h3><br />
	 	<input type="text" value="" name="title" id="designtitle" />
        <div class="clear"></div>
        <?php echo form_error('title','<div class="error">','</div>'); ?> 
        
        
	  	<h3 style="padding: 10px 0pt;">Brief description/Additional Info</h3><br />
	 	<textarea class="textarea" name="description" id="designdescription"></textarea>
        <div class="clear"></div>
		<?php echo form_error('description','<div class="error">','</div>'); ?> 
    
	</div>
	<h3 style="padding: 15px 0pt;">ATTACH THE PREVIEW OF YOUR DESIGN</h3>
	<div class="select_file_box">
	<div style="float: left;"><img alt="image" src="<?php echo base_url();?>images/select_icon.png"></div>
	<div style="float: left;">
              
             <span class="file-wrapper">
  				<input type="file" name="design" id="userfile" />
  				<span class="button"></span>
			</span> 
			    
              </div>
              <label id="tem_filename" style="margin-left:10px; font:12px/23px Arial, Helvetica, sans-serif;">No file selected.</label>
              <div class="clear"></div>
              <p>JPG, GIF or PNG.  Max size is 2MB.</p>
            </div>
            <input type="submit" value="&nbsp;" name="submit" id="submit" class="post-this-button">
            <?php echo form_close();?>
			<p style="padding: 0px; font-size: 10px;">(Once your design will be approved, it will be printed too!)</p>
          </div>
	<?php } else { ?>
         <div class="tab_mid_box3">
        <div class="earning_box_left">
            <p>Your status is closed,you can not add designs anymore. Please contact the adminstrator.</p>
	</div>
        <?php } ?>
            
          
          <div class="earning_box_right">
            <h1>SUBMISSION PROCESS</h1>
            <p>1) Download the T-shirt template and create your design</p>
            <p>2) Submit your design preview for 
              approval, eventually chat with an admin about improvements/modifications.</p>
            <p>3) Upload the high-res source of your design </p>
            <p>4) Done! Now just wait to see your art in store.</p>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <!--Member taber Start-->
  </div>
  <!--Home Page Content End-->
  <!--Footer Start -->
  <?php $this->load->view('footer');?>
  <!--Footer End -->
  <div class="clear"></div>
</div>
</body>
</html>
