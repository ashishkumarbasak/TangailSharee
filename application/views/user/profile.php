<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" type="text/css" media="screen" />
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorbox.js"></script>
<script src="ja/jquery.colorbox-min.js"></script>
<script>
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
<?php $this->load->view("header"); ?>
<!--Header End-->

<!--Top banner Start-->
  <?php $this->load->view("top_banner"); ?>
  <!--Top banner End-->
  
<!--Page Content Start-->
<div id="mid_content">
  <!--Profile Box Start-->
  <div class="mid_content_top">
    <div class="profile_box">
      <div class="profile_box_left">
        <div class="profile_box_image"><img src="<?php echo base_url(); ?>images/profile_image1.jpg" alt="Profile Image" /></div>
        <div class="profile_box_text">
          <h2><?php echo $user->first_name.' '.$user->last_name;?></h2>
          <p><?php echo $user->about_me; ?></p>
        </div>
        <div class="clear"></div>
      </div>
      <div class="profile_box_right">
        <p><?php echo 'from '.$user->address->city.', '.$user->address->country; ?></p>
        <br />
        <p><?php echo '@'.$user->username;?></p>
        <br />
        <p><?php echo $user->email;?></p>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <!--Profile Box End-->
  <div class="clear"></div>
  <!--Product Image  Start-->
  <div class="image_gallery2">
    <div class="image_gallery">
      <div class="product_image_box"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_1.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p><?php echo 'by '.$user->first_name.' '.$user->last_name;?></p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="product_image_box"> <a href="single_product.html" class="hoverClass active">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_2.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="product_image_box"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_3.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="product_image_box2"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_4.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="clear" style="height:11px;"></div>
      <div class="product_image_box"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_5.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="product_image_box"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_6.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="product_image_box"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_7.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="product_image_box2"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_8.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p></p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="clear" style="height:11px;"></div>
      <div class="product_image_box"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_1.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="product_image_box"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_2.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="product_image_box"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_3.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="product_image_box2"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_4.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="clear" style="height:11px;"></div>
      <div class="product_image_box"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_5.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="product_image_box"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_6.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="product_image_box"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_7.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="product_image_box2"> <a href="single_product.html" class="hoverClass">
        <div class="star"></div>
        <div class="add_wish"></div>
        <div class="new_tag"></div>
        <div class="product_image"><img src="<?php echo base_url(); ?>images/product_image_8.jpg" alt="Product 1" /></div>
        <div class="title">
          <h2>T-shirt title here</h2>
          <p>by Sebastiano Guerriero</p>
        </div>
        <div class="price_box">$36</div>
        </a> </div>
      <div class="clear"></div>
    </div>
    <!--Product Image  end-->
    <div class="clear"></div>
    <!--Page Navi Start-->
    <div class="page_navi">
      <ul>
        <li><a href="#"><img src="<?php echo base_url(); ?>images/number_arrow_left.jpg" alt="Left" /></a></li>
        <li><a href="#"><img src="<?php echo base_url(); ?>images/number_1.jpg" alt="Left" /></a></li>
        <li><a href="#"><img src="<?php echo base_url(); ?>images/number_2.jpg" alt="Left" /></a></li>
        <li><a href="#"><img src="<?php echo base_url(); ?>images/number_3.jpg" alt="Left" /></a></li>
        <li><a href="#"><img src="<?php echo base_url(); ?>images/number_arrow_right.jpg" alt="Left" /></a></li>
      </ul>
    </div>
    <!--Page Navi End-->
    <div class="shop_box2">
      <ul>
        <li class="shop_inactive"><a href="#">SHOP WOMEN</a></li>
      </ul>
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
