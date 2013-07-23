<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $user->first_name.' '.$user->last_name;?> for Twinne</title>

<meta property="og:description" content="Unique t-shirts designed by <?php echo $user->first_name.' '.$user->last_name;?> for Twinne" />
<meta name="description" content="Unique t-shirts designed by <?php echo $user->first_name.' '.$user->last_name;?> for Twinne">
<meta name="keywords" content="<?php echo $user->first_name.', '.$user->last_name;?>, browse, twinne, catalog, collection, unique, men&#039;s, women&#039;s, salethreadless, t-shirts, tee shirts, tshirts, clothing, design, art" />
<meta name="copyright" content="(c) 2012 Twinne Ltd" />
<meta name="author" content="Twinne Ltd" />
<meta property="fb:app_id" content="203991176319853"/>
<meta property="og:type" content="product"/>
<meta property="og:url" content="<?php echo current_url(); ?>" />
<meta property="og:title" content="<?php echo $user->first_name.' '.$user->last_name;?> for Twinne" />
<meta property="og:site_name" content="Twinne T-shirts Store" />
<link rel="canonical" href="<?php echo current_url(); ?>" />

<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" type="text/css" media="screen" />
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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.colorbox.js"></script>
<script type="text/javascript"src="<?php echo base_url(); ?>js/wishlist.js"></script>
<script>
		$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$("a[rel='example1']").colorbox();
			$("a[rel='example2']").colorbox({transition:"fade"});
			$("a[rel='example3']").colorbox({transition:"none", width:"75%", height:"75%"});
			$("a[rel='example4']").colorbox({slideshow:true});
			$(".example5").colorbox();
			 $(".example6").colorbox({iframe:true, innerWidth:425});
        $(".example7").colorbox({transition:"none", width:"580px", inline:true, height:"auto", href:"#inline_example2"});
        $(".example8").colorbox({transition:"none", width:"580px", inline:true, height:"auto", href:"#inline_example1"});
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
			base_url="<?php echo base_url(); ?>";
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
<div id="mid_content" style="padding-top: 16px;">
  <!--Profile Box Start-->
  <div class="mid_content_top">
    <div class="profile_box">
      <div class="profile_box_left">
        <div class="profile_box_image">
		 <?php if ($user->image->filename){?>
			<img src="<?php echo base_url(); ?>images/profile_image/main_image/<?php echo $user->image->filename; ?>" alt="profilr-image" />
			 <?php }
			else {?>
			<img src="<?php echo base_url(); ?>images/no_image_108.jpg" alt="profilr-image" />
		<?php }?>
	</div>
        <div class="profile_box_text">
          <h2><?php echo $user->first_name.' '.$user->last_name;?></h2>
          <p><?php echo $user->profile; ?></p>
        </div>
        <div class="clear"></div>
      </div>
      <!--<div class="profile_box_right">
      	<?php if($user->address->city != '' || $user->address->country!= '') { ?>
        <p><?php echo 'from '.$user->address->city.', '.$user->address->country; ?></p>
        <?php } ?>
        <br />
        <p><a href="http://twitter.com/<?php echo $user->username;?>"><?php echo '@'.$user->username;?></a></p>
        <br />
        <p><?php echo $user->email;?></p>
      </div>-->
      <div class="clear"></div>
    </div>
  </div>
  <!--Profile Box End-->
  <div class="clear"></div>
  <!--Product Image  Start-->
  <div class="image_gallery2">
    <div class="image_gallery">
    
    <?php $i=1; foreach ($products as $product){ 
    	 //if($product->stock){
    	 ?>
        <div class="<?php if($i%4==0){ echo "product_image_box2";}else{echo "product_image_box";}$i++; ?>">
        <div class="star" id='star_<?php echo $product->id; ?>'>
        
        	<?php if(in_array($product->id, $wishlist)){?>
        	<a href="<?php echo base_url();?>show_product/removeFromWishlist/<?php echo $product->id;?>" onclick='return false;'><img src='<?php echo base_url();?>images/star-hover.png' /></a>
        	<?php }else{ ?>
        	<a href="<?php echo base_url();?>show_product/addToWishList?id=<?php echo $product->id;?>"  onclick='return false;'><img src='<?php echo base_url();?>images/star.png' /></a>
        	<?php } ?>
        </div>
        <script>
        	$(document).ready(function(){
        		<?php if(in_array($product->id, $wishlist)){?>
        			$('#star_<?php echo $product->id;?> a').click(function(){removeFromWishlist("<?php echo $product->id ?>")});
        		<?php }else{ ?>
        			$('#star_<?php echo $product->id;?> a').click(function(){addToWishlist("<?php echo $product->id ?>")});
        		<?php } ?>
        		$('#star_<?php echo $product->id;?> a').hover(
                function(){
					$('#add_wish_<?php echo $product->id; ?>').show();
        		},
        		function(){
        			$('#add_wish_<?php echo $product->id; ?>').hide();
            	});
            })
        </script>
        <div class="add_wish"  id='add_wish_<?php echo $product->id; ?>'>
        	<?php if(in_array($product->id, $wishlist)){?>
        	<img src='<?php echo base_url();?>images/remove.png' />
        	<?php }else{ ?>
        	<img src='<?php echo base_url();?>images/add_to_wish_list.png' />
        	<?php } ?>
        </div>
        <div class="product_image">
        <?php if ($product->file){
        	if ($product->file->filename){
    				?>
        <a href="<?php echo base_url();?>single_product?id=<?php echo $product->id;?>&type=<?php echo $product->file->join_type; ?>">
        
        <img src="<?php echo base_url(); ?>images/product_image/list_image/<?php echo $product->file->filename; ?>" alt="" /></a>
        <?php 
    	}else {?>
        	<a href="#">
        	 <img src="<?php echo base_url(); ?>images/236X292.jpg" alt="" /></a>
        	 <?php }
        	}?>
        </div>
        
        <div class="title">
          <h2><a href="<?php echo base_url();?>single_product?id=<?php echo $product->id;?>&type=<?php echo $product->file->join_type; ?>"><?php echo $product->name;?></a></h2>
          <p><a href="<?php echo base_url(); ?>profile/index/<?php echo $product->user->id; ?>">By <?php echo $product->user->first_name.' '.$product->user->last_name; ?></a></p>
        </div>
       <?php if($product->original_value > 0){ ?>
        <div class="price2_box">
	<?php  echo "<del>".$product->original_value.'&pound;'.'</del>'.$product->price.'&pound;'; ?>
	</div>
	<?php } elseif($product->original_value == 0) { ?>
	<div class="price_box">
	<?php  echo $product->price.'&pound;'; ?>
	</div>
	<?php } ?>
         </div>
         <?php }?>
      <?php // }?>
      <div class="clear"></div>
    </div>
    <!--Product Image  end-->
    <div class="clear"></div>
    <!--Page Navi Start-->
   <?php $this->load->view('pagination');?>
    <!--Page Navi End-->
    <div class="shop_box">
      <ul>
        <li class="shop_inactive"><a href="<?php echo base_url(); ?>show_product?type=man">SHOP MEN</a></li>
        <li class="shop_inactive"><a href="<?php echo base_url(); ?>show_product?type=woman">SHOP WOMEN</a></li>
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
