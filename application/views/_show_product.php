<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
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
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=244291812276034";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
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
<!--cufon Js-->
<script type="text/javascript" src="<?php echo base_url();?>js/cufon_min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Oswald_400.font.js"></script>
<script type="text/javascript">
        Cufon.replace('.nav_box'); // Works without a selector engine
		Cufon.replace('.shop_box'); // Works without a selector engine
		Cufon.replace('.footer_menu_1 h1 ,.footer_menu_2 h1 ,.footer_menu_3 h1 ,.footer_menu_4 h1'); // Works without a selector engine
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
  <div class="bottem_border"></div>
  <!--Home Page Content Start-->
  <div id="mid_content" style="border:solid red 1px;">
    <div class="mid_content_top">
      <?php $this->load->view('pagination');?>
      <div class="mid_content_top_left" style="margin:5px 0 0 0;">
        <ul>
          <li <?php if(isset($new)){ echo "class='mid_active'"; } ?>><a href="<?php echo base_url();?>show_product/getNewProducts?type=<?php echo $type; ?>">New</a></li>
          <li <?php if(isset($popular)){ echo "class='mid_active'"; } ?>><a href="<?php echo base_url();?>show_product/getPopularProducts?type=<?php echo $type; ?>">Popular</a></li>
	  <li <?php if(isset($sale)){ echo "class='mid_active'"; } ?>><a href="<?php echo base_url();?>show_product/getSaleProducts?type=<?php echo $type; ?>">Sale</a></li>
        </ul>
      </div>
     
      <?php $this->load->view('size_nav',$type);?>
     <?php $this->load->view('color_nav',$type);?>
     <div class="mid_content_top_right" style="border:solid red 1px;">
        <h3>Stay tuned!</h3>
        <?php if ($type=='woman') {?>
       <div class="like_faceboob_box_image">
            <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fhostingmachine.net%2Fdev%2Ftwinne%2Fshow_product%3Ftype%3Dwoman&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></div>
      </div>
      <?php } else {?>
       <div class="like_faceboob_box_image">
            <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fhostingmachine.net%2Fdev%2Ftwinne%2Fshow_product%3Ftype%3Dman&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></div>
      </div>
      <?php } ?>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
     <?php if(isset($prods)){ ?>
     <div class="update_error">No Product available for this color.</div>
     <?php } ?>
    <!--Product Image  Start-->
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
        <a href="<?php echo base_url();?>single_product?type=<?php echo $type;?>&id=<?php echo $product->id;?>">
        
        <img src="<?php echo base_url(); ?>images/product_image/list_image/<?php echo $product->file->filename; ?>" alt="" /></a>
        <?php 
    	}else {?>
        	<a href="#">
        	 <img src="<?php echo base_url(); ?>images/236X292.jpg" alt="" /></a>
        	 <?php }
        	}?>
        </div>
        
        <div class="title">
          <a href="<?php echo base_url();?>single_product?id=<?php echo $product->id;?>"><h2><?php echo $product->name;?></h2></a>
          <a href="<?php echo base_url(); ?>profile/index/<?php echo $product->user->id; ?>"><p>By <?php echo $product->user->first_name.' '.$product->user->last_name; ?></p></a>
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
    <div class="shop_box2">
      <ul>
	<?php if($type=='man'){ ?>
        <li class="shop_inactive"><a href="<?php echo base_url(); ?>show_product?type=woman">SHOP WOMEN</a></li>
	<?php } elseif($type=='woman') {?>
	<li class="shop_inactive"><a href="<?php echo base_url(); ?>show_product?type=man">SHOP MEN</a></li>
	<?php }else { ?>
	 <li class="shop_inactive"><a href="<?php echo base_url(); ?>show_product?type=man">SHOP MEN</a></li>
        <li class="shop_inactive"><a href="<?php echo base_url(); ?>show_product?type=woman">SHOP WOMEN</a></li>
	<?php } ?>
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
