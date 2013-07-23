<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TWINNE</title>
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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>
<!--Select Box Js End-->
<!--LightBox Js-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
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
			$("a[rel='example18']").colorbox();
	        $(".example19").colorbox({width:"580px", inline:true, height:"auto", href:"#inline_example18"});
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
<!--cufon Js-->
<script type="text/javascript" src="js/cufon_min.js"></script>
<script type="text/javascript" src="js/Oswald_400.font.js"></script>
<script type="text/javascript">
        Cufon.replace('.nav_box'); // Works without a selector engine
	
		Cufon.replace('.footer_menu_1 h1 ,.footer_menu_2 h1 ,.footer_menu_3 h1 ,.footer_menu_4 h1'); // Works without a selector engine
</script>
</head>
<body>
<div id="top"></div>
<div id="wrapper">
  <!--Header Start-->
 <?php $this->load->view('header');?>
  <!--Header End-->
  <?php $this->load->view('top_banner');?>
  <div class="bottem_border"></div>
  <!--Home Page Content Start-->
  <div id="mid_content">
    <div class="mid_content_top">
      <h1><?php echo $content->title; ?>! </h1>
      <div class="clear"></div>
    </div>
    
    <div class="comment_box" style="padding:0;">
      <div class="left">
      <?php foreach($content as $c){?>
        <p><?php echo $c->content;?>
</p> 
<?php }?>        
        
        <div class="clear"></div>
        
      </div>
      <div class="comment_box_right">
        <div class="facebook_like_box">
          <div class="facebook_like_box_top">Find us on Facebook</div>
          <div style="padding:8px;"><img src="<?php echo base_url();?>images/facebook_platform.jpg" alt="facebook" /></div>
        </div>
        <div class="clear" style="height:15px;"></div>
        <h3>LAST VIDEO </h3>
        <div class="lastvideo_box"> <img src="<?php echo base_url();?>images/last_video.jpg" alt="last_video" />
          <p class="go_to"> <a href="#">go to the video channel </a> </p>
        </div>
        <div class="clear" style="height:15px;"></div>
        <h3>FLICKR </h3>
        <div class="flickr_image_box">
          <div class="flickr_image"><img src="<?php echo base_url();?>images/tour_image.jpg" alt="flickr" /></div>
          <div class="flickr_image"><img src="<?php echo base_url();?>images/tour_image.jpg" alt="flickr" /></div>
          <div class="flickr_image_2"><img src="<?php echo base_url();?>images/tour_image.jpg" alt="flickr" /></div>
          <div class="clear" style="height:29px;"></div>
          <div class="flickr_image"><img src="<?php echo base_url();?>images/tour_image.jpg" alt="flickr" /></div>
          <div class="flickr_image"><img src="<?php echo base_url();?>images/tour_image.jpg" alt="flickr" /></div>
          <div class="flickr_image_2"><img src="<?php echo base_url();?>images/tour_image.jpg" alt="flickr" /></div>
          <div class="clear"></div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <!--Home Page Content End-->
  <!--Footer Start -->
 <?php $this->load->view('footer');?>
  <!--Footer End -->
  <div class="clear"></div>
</div>
</body>
</html>
