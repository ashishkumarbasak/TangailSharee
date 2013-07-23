<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/example-2.css" TYPE="text/css" MEDIA="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/example-3.css" TYPE="text/css" MEDIA="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/file_style.css" TYPE="text/css" MEDIA="screen" />
<!--Select Box Js Start-->
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

<!--Select Box Js End-->
<!--LightBox Js-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorbox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>
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
  <div class="bottem_border"></div>
   <!--Page Content Start-->
  <div id="mid_content">
    
	<div class="top-menu">
      <ul>
        <li><a href="#">1. LOGIN/REGISTER</a></li>
        <li><a href="<?php echo base_url(); ?>new_contest/readGuide">2. READ THE GUIDELINES</a></li>
        <li class="tab-memu-select"><a href="<?php echo base_url(); ?>new_contest/submitDesign">3. SUBMIT YOUR DESIGN</a></li>
        
      </ul>
      <div class="clear"></div>
    </div>
	
         <div class="tabbertab">
         
           <div class="login_taber_box">
            <div class="gray_box_left"></div>
            <div class="submission_mid">
            <h1 class="register_heading">TAKE PART TO THE COMPETITION!</h1>
             <div class="clear"></div>
             <div class="submission_mid_text">Put some info here about the design (i.e. max size is 
              3000x4000px at 300 dpi)<br /><br /><a href="#">Put some info here about the design (i.e. max size is 
              3000x4000px at 300 dpi)</a>  </div>
              <div style="margin: 10px 0px 0px 30px;" class="terms-conditions">T-shirt template</div>
             <div class="clear" style="height:20px;"></div>
	     <?php 
	     if(isset($gerror)){
		echo "<div class='update_error'>You have already submitted your graphic.</div>";
	     }
	     ?>
	     <?php echo form_open_multipart('new_contest/saveDesign');?>
	     <?php echo form_error('title', '<div class="update_error">', '</div>'); ?>
             <label>Title</label>
              <input type="text" name='title' value="" />
               <div class="clear" style="height:20px;"></div>
             <label>Brief description/Additional info</label>
              <textarea  rows="3" cols="10" class="description_textarea" name='description'></textarea>
             <div class="clear" style="height:20px;"></div>
	     <?php if(isset($errors))	{
			foreach ($errors as $key =>$value){
				if ($key == 'file_id' && trim($value)=='<p>required</p>'){
					echo "<div class='update_error'>".' Please upload a graphic for contest.'."</div>";
				}
			}
		}
		?>
             <div class="select_file_box">
             <div style="float: left;"><img alt="image" src="<?php echo base_url(); ?>images/select_icon.png" /></div>
              <div style="float: left;">
                <span class="file-wrapper">
  			<input type="file" name="design" id="userfile" />
  			<span class="button"></span>
			</span>
              </div>
               <label>No file selected</label>
             <div class="clear"></div><p>JPG, GIF or PNG.  Max size is 2MB.</p>
            </div>
             <input type="submit" class="post_this_design_button" value="" />
	     <?php echo form_close();?>
	     
	     
	     <script>
			$(document).ready(function() {
			$(".button").click(function() {
			    var filename = $("#userfile").val();
			    $.ajax({ 
			    type: "POST",
			       enctype: 'multipart/form-data',
			       data: {file: filename},
			      success: function(){
				   alert( "Data Uploaded: ");
				}
			    });     
			});
		    });

	     </script>
	     
	     
            </div>
            <div class="gray_box_right"></div>
            <div class="clear"></div>
           </div>
           <div class="clear"></div>
        </div>
         
         <?php $this->load->view("footer"); ?>
  <!--Footer End -->
  <div class="clear"></div>
</div>
</body>
</html>