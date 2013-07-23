<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" type="text/css" media="screen" />
<link href="<?php echo base_url();?>css/example-4.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/global.css type="text/css" /">
<link rel="stylesheet" href="<?php echo base_url();?>adm/css/screen.css type="text/css" /">
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
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=244291812276034";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
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
<script type="text/javascript" src="<?php echo base_url();?>js/cufon_min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Oswald_400.font.js"></script>
<script type="text/javascript">
        Cufon.replace('.nav_box'); // Works without a selector engine
		Cufon.replace('.shop_box'); // Works without a selector engine
		Cufon.replace('.profile_box_text h2'); // Works without a selector engine
		Cufon.replace('.footer_menu_1 h1 ,.footer_menu_2 h1 ,.footer_menu_3 h1 ,.footer_menu_4 h1'); // Works without a selector engine
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
<?php $this->load->view('top_banner');?>
  <div class="bottem_border"></div>
  <!--Page Content Start-->
  <div id="mid_content">
    <div class="mid_content_top">
      <p><a href="<?php echo base_url();?>twilab">Twilab</a> >  <a href="<?php echo base_url();?>upcoming_designs">Upcoming </a>> <?php echo $design->title;?> </p>
    </div>
    <div class="single_product_box">
      <div class="single_product_box_slider"><img src="<?php echo base_url();?>images/upcoming_images/full_image/<?php echo $design->file->filename;?>" alt="upcomming" />
        <div class="clear" style="height:10px;"></div>
        <div class="footer_top"></div>
        <div class="clear" style="height:10px;"></div>
        <div class="comment_box_left">
       <div class="comment_title"><?php $i=0; foreach ($design->comment as $c){ $i++; }echo $i;?> Comments </div>
           <?php $i=1; foreach ($design->comment as $c){?>
          <div class="comment_in_box">
            <div class="user_image">
            <?php if(isset($img[$i-1])){ ?>
            <img alt="comment_image" src="<?php echo base_url(); ?>images/profile_image/short_image/<?php echo $img[$i-1]; ?>">
            <?php }
            else {?>
            <img alt="comment_image" src="<?php echo base_url(); ?>images/no_image_48.jpg">
            <?php }?>
            </div>
            <div class="comment_in_box_right">
              <h3><?php echo $uname[$i-1];?><span>
              <?php 
			 	$format = 'DATE_RFC1123';
				$date=explode('+',standard_date($format, $c->date));
				echo $date[0];
				 ?>
	 </span></h3>
              <p><?php echo $c->content;?></p>
            </div>
            <div class="clear"></div>
          </div>
			<?php $i++;}?>
          <div class="comment_in_box2">
            <div class="user_image">
            <?php if ($this->session->userdata('user_id')){
            	if (isset($loged_user->image->filename)){
            	?>
            <img alt="comment_image" src="<?php echo base_url(); ?>images/profile_image/short_image/<?php echo $loged_user->image->filename; ?>">
            <?php
            	}
            	else  {?>
		            <img alt="" src="<?php echo base_url(); ?>images/no_image_48.jpg">
		            <?php }
            	} else  {?>
            <img alt="" src="<?php echo base_url(); ?>images/no_image_48.jpg">
            <?php }?>
            </div>
            <div class="comment_in_box_right">
              <h4>LEAVE A COMMENT...</h4>
            </div>
            <div class="clear"></div>
          </div>
          <?php echo form_open('upcoming_designs/saveComment/'.$design->id);?>
          <textarea class="comment_textarea" name='comment'></textarea>
           <div class="clear"></div>
          <input type="submit" class="post_comment_button">
          <?php echo form_close();?>
        </div>
      </div>
      <!--Right Tab Start-->
      <div class="single_product_box_right">
        <div class="matrimonial">
          <div class="tabber">
            <div class="tabbertab">
              <div class="single_product_down_tab">
                <h1><?php echo $design->title;?></h1>
              </div>
              <div class="single_product_select_box">
                <p>Want to be the first in wearing this 
                  awesome t-shirt? We will notify you as soon as it will be in stock </p>
                  <?php if($this->input->get('email')){?>
                  <div class="update_error">Check your email & notify yourself for <?php echo $design->title.'.'; ?></div>
                  <?php }?>
                  <?php  $attr = array( 'id' => 'notify');
		  echo form_open('upcoming_designs/notifyEmail',$attr);?>
                  <input type="hidden"  value='<?php echo $design->id;?>' name="design_id">
                <input type="text" class="t-shirt_input" name="email_notify" id="email_notify">
                <div class="clear"></div>
              </div>
              <input type="submit" class="notify_button" />
              <?php echo form_close();?>
	      
	<script>
		$(document).ready(function(){
		    function validateEmail(elementValue){
		      var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		       return emailPattern.test(elementValue);
		    }
		    $('#notify').submit(function() {
		      var email = $('#email_notify').val();
		      if(!validateEmail(email)){
			  alert("Please enter a valid email address!!");
			  return false;
		      }
		      else {
			 $("#notify").submit();
		      }
		  });
	      });
	</script>
	      
              <div class="like_faceboob_box">
                <p>SHARE TEE-ART</p>
                 <div class="like_faceboob_box_image">
            <fb:like href="<?php echo base_url(); ?>single_design?&amp;id=<?php echo $design->id ?>" send="false" layout="button_count" width="100" show_faces="false"></fb:like>
          </div><div class="clear"></div>
              </div>
              <div class="clear"></div>
              <div class="single_product_arrow_box">
                <a href="<?php echo base_url(); ?>profile/index/<?php echo $design->user->id; ?>">
		<div class="single_product_arrow_box_text">DESIGNED BY:<br />
                  <span><?php echo $design->user->first_name.' '.$design->user->last_name;?></span></div>
		</a>
                <div class="single_product_arrow_box_arrow"><img src="<?php echo base_url();?>images/twinne_final_arrowpng.png" alt="arrow" /></div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
        <div class="clear" style="height:10px;"></div>
        <div class="new_title">New arrivals / popular</div>
	<?php $i=1; foreach($product as $p){ ?>
	 <?php if($i == 3) { ?>
		<div class="clear" style="height:10px;"></div>
	<?php } ?>
        <div <?php if($i==1 || $i==3) { echo "style='margin:0px;'".' '."class='single_product-imagebox'"; } else { echo "class='single_product-imagebox3'"; }?>>
          <a href="<?php echo base_url(); ?>single_product?id=<?php echo $p->id; ?>">
	  <div class="single_product-image"><img alt="ijmage" src="<?php echo base_url();?>images/product_image/feature_image/<?php echo $p->file->filename; ?>"></div>
	  </a>
          <div class="price_box"><?php echo $p->price."&pound;"; ?></div>
        </div>
	<?php $i++; } ?>
        <div class="clear" style="height:10px;"></div>
        <?php $this->load->view('bottom_banner');?>
      </div>
      <!--Right Tab End-->
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <!--Home Page Content End-->
  <!--Footer Start -->
  <?php $this->load->view('footer');?>
  <!--Footer End -->
  <div class="clear"></div>
</div>
</body>
</html>
