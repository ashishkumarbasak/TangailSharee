<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/example-2.css" TYPE="text/css" MEDIA="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/example-3.css" TYPE="text/css" MEDIA="screen" />
<!--Select Box Js Start-->
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

<!--Select Box Js End-->
<!--LightBox Js-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorbox.js"></script>
<script>
$(document).ready(function(){
        //Examples of how to assign the ColorBox event to elements
        
        $(".toggle_container").hide();
	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
	});
        
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
	$("a[rel='example18']").colorbox();
	        $(".example19").colorbox({width:"580px", inline:true, height:"auto", href:"#inline_example18"});
        //Example of preserving a JavaScript event for inline calls.
        $("#click").click(function(){ 
                $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                return false;
        });
        
        
        
       


});
	</script>
<!--cufon Js-->
<script src="<?php echo base_url(); ?>js/cufon_min.js"></script>
<script src="<?php echo base_url(); ?>js/Oswald_400.font.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>
<script type="text/javascript">
        Cufon.replace('.nav_box'); // Works without a selector engine
		Cufon.replace('.shop_box'); // Works without a selector engine
		Cufon.replace('.profile_box_text h2'); // Works without a selector engine
		Cufon.replace('.footer_menu_1 h2 ,.footer_menu_2 h2 ,.footer_menu_3 h2 ,.footer_menu_4 h2'); // Works without a selector engine
</script>
<!--tab Js-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/tabber.js"></script>
<!--slider Js-->
</head>
<body>
<div id="top"></div>
<div id="wrapper">
  <!--Header Start-->
  <?php $this->load->view("header"); ?>
  <!--Header End-->
  <?php $this->load->view('top_banner'); ?>
   <!--Page Content Start-->
  <div id="mid_content">
    
	<div class="top-menu">
      <ul>
        <li><a href="#">1. LOGIN/REGISTER</li></a>
        <li class="tab-memu-select"><a href="<?php echo base_url(); ?>new_contest">2. READ THE GUIDELINES</a></li>
        <li><a href="#">3. SUBMIT YOUR DESIGN</a></li>
        
      </ul>
      <div class="clear"></div>
    </div>
        
        <div class="tabbertab">
            <?php echo form_open('new_contest/submitDesign'); ?>
           <div class="login_taber_box">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In et nunc quis neque iaculis elementum. Phasellus in purus eget augue semper porttitor. Aliquam erat volutpat. Suspendisse in risus urna. Sed consequat ante vitae nulla aliquet lacinia. Aliquam auctor ultricies lacinia. Vivamus fringilla, quam quis commodo congue, dolor urna tincidunt ipsum, in viverra ipsum mauris facilisis enim. Maecenas bibendum, erat in porttitor aliquam, turpis lacus dignissim est, in cursus lectus enim et ipsum. Aenean lorem erat, accumsan ac venenatis a, porta at urna. Donec quam justo, fermentum ac pretium eget, dictum vel enim. Praesent eleifend aliquet ligula, ac tempor enim pellentesque sit amet. Fusce risus mi, aliquam at convallis non, aliquet eget arcu. Curabitur tempor posuere varius. Quisque feugiat facilisis condimentum.</p>
            <div class="t-shirt">
             <div class="templeat_image"><img src="<?php echo base_url(); ?>images/T-shirt_template.png" alt="image34" /></div>
            <input class="submit_your_desigen" type="submit" value="" />
            </div>
            <?php echo form_close(); ?>
            <div class="clear"></div>
           </div>
        </div>
      
        
        <!--tabber -3 End-->
  
   
    <div class="clear"></div>
  </div>
    <?php $this->load->view("footer"); ?>
  <!--Footer End -->
  <div class="clear"></div>
</div>
</body>
</html>