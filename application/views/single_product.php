<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php 
	$designer = $product->user->first_name.' '.$product->user->last_name;
	if($type=="man")
		echo str_replace("{designer}",$designer,lang('single_product_man'));
	elseif($type=="woman")
		echo str_replace("{designer}",$designer,lang('single_product_women')); 
	else
		echo str_replace("{designer}",$designer,lang('single_product'));
	?>
</title>
<meta property="og:description" content="Awesome t-shirt designed by <?php 
	echo $designer;
	?> for Twinne!" />
<meta name="description" content="Awesome t-shirt designed by <?php 
	echo $designer;
	?> for Twinne!">
<meta name="keywords" content="browse, twinne, catalog, collection, unique, men&#039;s, women&#039;s, salethreadless, t-shirts, tee shirts, tshirts, clothing, design, art" />
<meta name="copyright" content="(c) 2012 Twinne Ltd" />
<meta name="author" content="Twinne Ltd" />
<meta property="fb:app_id" content="203991176319853"/>
<meta property="og:url" content="<?php echo current_url(); ?>?id=<?php echo $id; ?>&type=<?php echo $type; ?>" />
<meta property="og:title" content="<?php 
	$designer = $product->user->first_name.' '.$product->user->last_name;
	if($type=="man")
		echo str_replace("{designer}",$designer,lang('single_product_man'));
	elseif($type=="woman")
		echo str_replace("{designer}",$designer,lang('single_product_women')); 
	else
		echo str_replace("{designer}",$designer,lang('single_product'));
	?>" />
<meta property="og:type" content="product" />
<meta property="og:site_name" content="Twinne T-shirts Store" />
<meta property="og:image" content="<?php 

foreach ($product->file as $file)
			  	{
			  		
			  			if($file->join_default == 1)
						{
							if($file->join_type == $type){			
								echo base_url()."images/product_image/full_image/".$file->filename;		
						}
					
				} 
				}
?>" />
<link rel="canonical" href="<?php echo current_url(); ?>?id=<?php echo $id; ?>&type=<?php echo $type; ?>" />
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/example.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>css/global.css" type="text/css" />
<!--Select Box Js Start-->
<script  type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>

<!-- Fancy Box Scripts-----//-->
	<!-- Add mousewheel plugin (this is optional) --//-->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files --//-->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox/source/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/fancybox/source/jquery.fancybox.css" media="screen" />

	<!-- Add Button helper (this is optional) --//-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/fancybox/source/helpers/jquery.fancybox-buttons.css?v=2.0.4" />
	<script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox/source/helpers/jquery.fancybox-buttons.js?v=2.0.4"></script>

	<!-- Add Thumbnail helper (this is optional) --//-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=2.0.4" />
	<script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=2.0.4"></script>
     <script type="text/javascript">
		$(document).ready(function() {
			$('#size_info_tab').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : true,
				arrows    : true,
				nextClick : true,
          helpers: {
             overlay	: {
				opacity : 0.7,
				css : {
					'background-color' : '#ffffff'
				}
          }
          }
      });
		$('.fancybox-thumbs-featured').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : true,
				arrows    : true,
				nextClick : true,
		

				helpers : { 
					overlay	: {
				opacity : 0.7,
				css : {
					'background-color' : '#ffffff'
				}
				},
					thumbs : {
						width  : 100,
						height : 100
					}
				}
			});
		});
	</script>
    
	<script type="text/javascript">
		$(document).ready(function() {
		$('.fancybox-thumbs-woman').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : true,
				arrows    : true,
				nextClick : true,
				
				helpers : { 
					overlay	: {
				opacity : 0.7,
				css : {
					'background-color' : '#ffffff'
				}
				},

					thumbs : {
						width  : 100,
						height : 100
					}
				}
			});
		});
	</script>
    
    <script type="text/javascript">
		$(document).ready(function() {
		$('.fancybox-thumbs-man').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : true,
				arrows    : true,
				nextClick : true,
				
			

				helpers : { 
						overlay	: {
				opacity : 0.7,
				css : {
					'background-color' : '#ffffff'
				}
				},
					thumbs : {
						width  : 100,
						height : 100
					}
				}
			});
		});
	</script>
    
<!-- Fancy Box Scripts ----//-->

<script type="text/javascript">
$(document).ready(function(){
	$(".toggle_container").hide();
	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("fast");
	});
		//Close button:
    	
					
					$(".inline_notification").live("click", function () {
						$(this).fadeTo(450, 0, function () { // Links with the class "close" will close parent
						$(this).slideUp(400);
						});
					return false;
		}
		);
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
<script type="text/javascript" src="<?php echo base_url(); ?>js/wishlist.js"></script>
<script>
		$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$("a[rel='example1']").colorbox();
			$("a[rel='example2']").colorbox({transition:"fade"});
			$("a[rel='example3']").colorbox({transition:"none", width:"75%", height:"75%"});
			$("a[rel='example4']").colorbox({slideshow:true});
			$(".example5").colorbox();
			$(".example7").colorbox({transition:"none", width:"580px", inline:true, height:"auto", href:"#inline_example2"});
        	$(".example8").colorbox({transition:"none", width:"580px", inline:true, height:"auto", href:"#inline_example1"});
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
			
			$(".example10").colorbox({width:"700px", inline:true, height:"auto", href:"#inline_example10"}).click(function(){ $(this).click();});
			$(".example11").colorbox({width:"700px", inline:true, height:"auto", href:"#inline_example11"}).click(function(){ $(this).click();});
			$(".example12").colorbox({width:"700px", inline:true, height:"auto", href:"#inline_example12"}).click(function(){ $(this).click();});
			$(".example13").colorbox({width:"700px", inline:true, height:"auto", href:"#inline_example13"}).click(function(){ $(this).click();});
			$("a[rel='example14']").colorbox();
	        $(".example15").colorbox({width:"400px", inline:true, height:"auto", href:"#inline_example14"});
			//	//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
	</script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>
<!--tab Js-->
<script type="text/javascript" src="<?php echo base_url();?>js/tabber.js"></script>
<!--slider Js-->
<script type="text/javascript" src="<?php echo base_url();?>js/slider-js/jquery.easing.1.3.js"></script>
<script  type="text/javascript" src="<?php echo base_url();?>js/slider-js/slides.min.jquery.js"></script>
<script  type="text/javascript" src="<?php echo base_url();?>js/slider-tab.js"></script>
<script type="text/javascript">
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 0,
				pause: 2500,
				hoverPause: true
			});
		});
	</script>

</head>
<body>

<?php $is_called_already="no"; ?>
<div id="top"></div>
<div id="wrapper">
  <!--Header Start-->
  <?php $this->load->view('header');?>
  
  
  <!--Header End-->
  <?php $this->load->view('top_banner');?>
  <!--Page Content Start-->
  <div id="mid_content">
    <div class="mid_content_top">
      <p class="breadcrumb"><?php if($type=='man' || $type=='woman'){ ?><a href="<?php echo base_url(); ?>show_product?id=<?php echo $id; ?>&type=<?php echo $type; ?>">
        <?php if($type=='man'){ echo "Men"; } else if($type=='woman'){ echo "Women"; }?>
        </a><?php } else { ?><a href="<?php echo base_url(); ?>home"> Home</a> <?php } ?> > <a href="<?php echo base_url(); ?>profile/index/<?php echo $product->user->id; ?>"><?php echo $product->user->first_name." ".$product->user->last_name;?></a> > <?php echo $product->name; ?> </p>
    </div>
    <div class="single_product_box" style="overflow: hidden;">
      <div class="single_product_box_slider">
        <div id="container">
          <div id="slideshow">
            <ul class="slides">
              <?php 
			  if($type==NULL)
			  {
			  	foreach ($product->file as $file)
			  	{
					if($file->join_type=="featured")
					{
						if($file->join_default == 1)
						{
						?>
							<li class="<?php echo $file->join_type ?> default">
								<a class="fancybox-thumbs-featured" data-fancybox-group="thumb" href="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>"><img src="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>" alt="slider" /><span class="more_images_info">click for more images</span></a>
							
							</li>
						<?php 
						}
						else
						{ 
						?>
							<li class="<?php echo $file->join_type ?>">
								<a class="fancybox-thumbs-featured" data-fancybox-group="thumb" href="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>"><img src="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>" alt="slider" /><span class="more_images_info">click for more images</span></a>
							</li>
						<?php 
						}
					}
				}
				foreach ($product->file as $file)
			  	{
					if($file->join_type!="featured")
					{
						if($file->join_default == 1)
						{
						?>
							<li class="<?php echo $file->join_type ?> default">
								<a class="fancybox-thumbs-featured" data-fancybox-group="thumb" href="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>"><img src="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>" alt="slider" /><span class="more_images_info">click for more images</span></a>
							</li>
						<?php 
						}
						else
						{ 
						?>
							<li class="<?php echo $file->join_type ?>">
								<a class="fancybox-thumbs-featured" data-fancybox-group="thumb" href="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>"><img src="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>" alt="slider" /><span class="more_images_info">click for more images</span></a>
							</li>
						<?php 
						}
					}
				}
			  }
			  else
			  {
			  	foreach ($product->file as $file)
			  	{
			  		if($file->join_type==$type)
					{
						if($file->join_default == 1)
						{
						?>
							<li class="<?php echo $file->join_type; ?> default">
								<a class="fancybox-thumbs-<?php echo $file->join_type; ?>" data-fancybox-group="thumb" href="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>"><img src="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>" alt="slider" /><span class="more_images_info">click for more images</span></a>
							</li>
						<?php 
						}
						else
						{ 
						?>
							<li class="<?php echo $file->join_type; ?>">
								<a class="fancybox-thumbs-<?php echo $file->join_type; ?>" data-fancybox-group="thumb" href="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>"><img src="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>" alt="slider" /><span class="more_images_info">click for more images</span></a>
							</li>
						<?php 
						}
					}
				}
				foreach ($product->file as $file)
				  {
				  	if($file->join_type!=$type)
					{
						if($file->join_default == 1)
						{
						?>
							<li class="<?php echo $file->join_type; ?> default">
								<a class="fancybox-thumbs-<?php echo $file->join_type; ?>" data-fancybox-group="thumb" href="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>"><img src="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>" alt="slider" /><span class="more_images_info">click for more images</span></a>
							</li>
						<?php 
						}
						else
						{ 
						?>
							<li class="<?php echo $file->join_type; ?>">
								<a class="fancybox-thumbs-<?php echo $file->join_type; ?>" data-fancybox-group="thumb" href="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>"><img src="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>" alt="slider" /><span class="more_images_info">click for more images</span></a>
							</li>
						<?php 
						}
					}
				  }
			  }
			  ?>
                
            </ul>
            <span class="arrow previous" id='arrowprevious'></span> 
            <span class="arrow next" id="arrownext"></span> </div>
          <input type="hidden" id="currentslide" />
          <!--slider Start-->
          <!--  <div id="example">
            <div id="slides">
              <div class="slides_container"> 
         	  <?php foreach ($product->
          file as $file){?> <a href="#" title="" class="<?php echo $file->join_type?>"> <img src="<?php echo base_url(); ?>images/product_image/full_image/<?php echo $file->filename; ?>" alt="slider1" /></a>
          <?php }?>
        </div>
        <a href="#" class="prev"><img src="<?php echo base_url();?>images/img/arrow-prev.png" width="59" height="57" alt="Arrow Prev" border="0" /></a> <a href="#" class="next"><img src="images/img/arrow-next.png" width="59" height="57" alt="Arrow Next" border="0" /></a> </div>
    </div>
    --> </div>
</div>
<!--Right Tab Start-->
<div class="single_product_box_right">
  <div class="matrimonial">
    <div id='producttab'>
		
		<div id="womantabheader" class="men-tab"><a href="javascript:void(0);">WOMAN</a></div>
		<!-- <div id="mantabheader" class="women-tab"><a href="javascript:void(0);">MAN</a></div> //-->
		<div class="clear"></div>
	  <!-- Women tabber tab -->
      <div class="tabbertab" id="woman_tab" <?php if ($type=="man") { echo 'style="display:none;"'; } ?>>
        
        <div class="single_product_down_tab">
          <h1><?php if($product->id=="7" || $product->id=="5" || $product->id=="8" || $product->id=="2") 
                                        	{ ?><?php echo $product->name.'<span id="price"> ';
		//echo '&pound;'.$product->price; 
                include('product_price.php');
		?><?php } else { ?><?php echo $product->name.'<span id="price"><small style="color: #F3B700; font-size: 11px; position: relative; top: -2px; left: -4px;">Sale price 40% off</small> ';
		//echo '&pound;'.$product->price; 
                include('product_price.php');
		?><?php } ?> </span></h1>
        </div>
        <?php if(isset($woman_size) && !empty($woman_size)) { 
			
			$total_stock = 0;
			if(isset($product)){
						$item_array=array();
	            		foreach ($product->size as $psize){
	            				if ($psize->join_catagory=='woman' && $psize->is_active=='1'){
									$item_array[$psize->id]=$psize->name;
									$total_stock = $total_stock + $psize->join_stock;
	            				}
	            		}
            		}
			if($total_stock==0) {
        	?>
			<div class="add_text">Out of stock</div>
        	<?php }else { ?>	
                <div class="single_product_select_box">
                  <label>Size</label>
                  <select class="single_product_select" id='size_select_box1' name='size' style="width:90px;">
                    <option value="select_size1">Select size</option>
                    <?php 
                            ksort($item_array);
                            foreach($item_array as $key=>$value){
                                if($value!="XL") echo "<option value='$key'>$value</option>";
                            }
                    ?>
                  </select>
                  <label style="margin:0 0 0 14px;">QTY</label>
                  <select class="single_product_select2" id='qty_box1' name='qty' style="width:82px;">
                    <option value=''>--</option>
                    <option value=''>select size first</option>
                  </select>
                  <script>
                            $(document).ready(function(){
                            	$("#size_select_box1").val("select_size");
                                var size = 0;
                                var qty = 1;
                                $.ajaxSetup ({  
                                    cache: false  
                                    });     
                                var ajax_load = '<div class=\"loading\"><img src=\"<?php echo base_url();?>img/fb_large_loading.gif\" /></div>';
                                $("#size_select_box1").change(function(){
                                	if($("#size_select_box1").val()!="select_size1"){	
                                    size = escape(this.value);
                                    var loadUrl ='<?php echo base_url();?>cart/setQty/'+size+'/<?php echo $id;?>/woman';
                                    $(".single_product_select2").load(loadUrl);
                                    return false;
                                  } else {
									$(".single_product_select2").html("<option value=''>--</option><option value=''>select size first</option>");
								  }   
                                });
                                $("#qty_box1").change(function(){
                                    qty = escape(this.value);
                                    return false;
                                });
        
                                $("#women_cart").click(function(){
                                   if(size!=0){
								   	qty = $("#qty_box1").val();
									if(qty==null) qty=1;
                                    var loadUrl ='<?php echo base_url();?>cart/index/'+size+'/'+qty+'/<?php echo $id;?>/woman';
                                    $("#cart_container").load(loadUrl, cart_refresh);
                                    return false;}
                                    else{
                                        alert ('Select size and quantity');
                                    }
                                });
                            });
                            </script>
                  <div class="clear"></div>
                </div>
       
        <?php }
		} else {?>       	
        	<div class="add_text" style="padding-top: 20px; margin-bottom:-20px;">Out of stock</div>
        <?php } ?>
        <input type="button" class="add_cart_button" id="women_cart" />
        <?php echo form_close();?>
        <?php  if(!in_array($product->id, $wishlist)){ ?>
       
       	<?php if($this->session->userdata("login")){ ?>
			<div class="add_text" id="add_text1"><a href="javascript:void(0);" >+ Add to Wish-list</a></div>
		<?php }else{?>
			<div class="add_text" id="add_text2"><a class="example8" href="javascript:void(0);" >+ Add to Wish-list</a></div>
		<?php  } ?>
        
        <div style="display:none" class="add_text" id="add_text2">Added to your Wish-list</div>
        <script>
        		$(document).ready(function(){
        				$('#add_text1 a').click(function(){
            				addToWishlist1("<?php echo $product->id ?>","<?php echo $type;?>");
            				});
        				
   
            	})
        	</script>
        <?php } else {?>
        <div class="add_text" id="add_text2">Added in your <a href="<?php echo base_url(); ?>user/member_wishlist">Wish-list</a></div>
        <?php }?>
        <div class="like_faceboob_box">
          <div class="like_faceboob_box_image">
          	
          	<div style="float:left; position:relative; z-index: 998; margin-left: 0px; width:380px">
          	
 <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style" addthis:url="<?php echo current_url(); ?>?id=<?php echo $id; ?>&type=woman"
        addthis:title="<?php 
	$designer = $product->user->first_name.' '.$product->user->last_name;
	if($type=="man")
		echo str_replace("{designer}",$designer,lang('single_product_man'));
	elseif($type=="woman")
		echo str_replace("{designer}",$designer,lang('single_product_women')); 
	else
		echo str_replace("{designer}",$designer,lang('single_product'));
	?>"
        addthis:description="Awesome t-shirt designed by <?php 
	echo $designer;
	?> for Twinne!">

<div id="tweet_but"><a class="addthis_button_tweet"></a></div>
<div id="fblike"><a class="addthis_button_facebook_like"fb:like:layout="button_count"></a></div>
</div>
<script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f9bdbf122a37ea0"></script>
<!-- AddThis Button END -->
          	
          	</div>
          	</div>
      
         	
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="single_product_arrow_box"> <a href="<?php echo base_url(); ?>profile/index/<?php echo $product->user->id; ?>">
          <div class="single_product_arrow_box_text">DESIGNED BY:<br />
            <span><?php echo $product->user->first_name.' '.$product->user->last_name;?></span></div>
          </a>
          <div class="single_product_arrow_box_arrow"><img src="<?php echo base_url();?>images/twinne_final_arrowpng.png" alt="arrow" /></div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <!--END  Women tabber tab -->
      <!-- Men tabber tab -->
      <div class="tabbertab" id="man_tab" <?php if ($type=="woman") { echo 'style="display:none;"'; } ?>>
        
        <div class="single_product_down_tab">
          <h1><?php if($product->id=="7" || $product->id=="5" || $product->id=="8" || $product->id=="2") 
                                        	{ ?><?php echo $product->name.'<span id="price"> ';
						//echo '&pound;'.$product->price; 
                        include('product_price.php');
		?><?php } else { ?><?php echo $product->name.'<span id="price"><small style="color: #F3B700; font-size: 11px; position: relative; top: -2px; left: -4px;">Sale price 40% off</small> ';
						//echo '&pound;'.$product->price; 
                        include('product_price.php');
		?><?php } ?> </span></h1>
        </div>
        <?php if(isset($man_size) && !empty($man_size)) { 
		
					$total_stock = 0;
					if(isset($product)){
					$item_array2=array();
	            		foreach ($product->size as $psize){
	            			if ($psize->catagory=='man' && $psize->is_active=='1'){
            					//echo "<option value='$psize->id'>$psize->name</option>";
								$item_array2[$psize->id]=$psize->name;
								$total_stock = $total_stock + $psize->join_stock;
	            			}
	            		}
            		}
			if($total_stock==0) {		
		?>
        	<div class="add_text out_of_stock_distance" style="padding-top: 20px; margin-bottom:-20px;">Out of stock</div>
        <?php }else{?>
        	<div class="single_product_select_box">
          <label>Size</label>
          <select class="single_product_select" id='size_select_box' name='size' style="width:90px;">
            <option value="select_size">Select size</option>
            <?php 
					ksort($item_array2);	
					foreach($item_array2 as $key=>$value){
						echo "<option value='$key'>$value</option>";
					}
					
			?>
          </select>
          	<label style="margin:0 0 0 14px;">QTY</label>
          	<select class="single_product_select1" id='qty_box' name='qty' style="width:82px;">
            <option value=''>--</option>
            <option value=''>select size first</option>
          </select>
          <script>
					$(document).ready(function(){
						$("#size_select_box").val("select_size");
						var size = 0;
						var qty = 1;
						$.ajaxSetup ({  
							cache: false  
							});     
						var ajax_load = '<div class=\"loading\"><img src=\"<?php echo base_url();?>img/fb_large_loading.gif\" /></div>';
						$("#size_select_box").change(function(){							
							if($("#size_select_box").val()!="select_size"){							
					      	size = escape(this.value);
					    	var loadUrl ='<?php echo base_url();?>cart/setQty/'+size+'/<?php echo $id;?>/man';
					    	$(".single_product_select1").load(loadUrl);
							return false;
							} else {
								$(".single_product_select1").html("<option value=''>--</option><option value=''>select size first</option>");
								
							}
					    });
						$("#qty_box").change(function(){
							qty = escape(this.value);
							return false;
					    });
						$("#men_cart").click(function(){
							if(size!=0 && $("#size_select_box").val()!="select_size"){
							qty = $("#qty_box").val();
							if(qty==null) qty=1;
						   	var loadUrl ='<?php echo base_url();?>cart/index/'+size+'/'+qty+'/<?php echo $id;?>/man';
					    	$("#cart_container").load(loadUrl, cart_refresh);
							return false;
							}else{
								alert ('Please select size and quantity');
							}
							
					    });
					});
					</script>
          <div class="clear"></div>
        </div>
        	
        <?php } ?>
        <?php } else {?>
        <div class="add_text out_of_stock_distance">Out of stock</div>
        <?php } ?>
        <input type="button" class="add_cart_button" id="men_cart" />
        <?php echo form_close();?>
        <?php  if(!in_array($product->id, $wishlist)){ ?>
        
        
        <?php if($this->session->userdata("login")){ ?>
			<div class="add_text" id="add_text"><a href="javascript:void(0);" >+ Add to Wish-list</a></div>
		<?php }else{?>
			<div class="add_text" id="add_text2"><a class="example8" href="javascript:void(0);" >+ Add to Wish-list</a></div>
		<?php  } ?>
        
        <div style="display:none" class="add_text" id="add_text3">Added to your Wish-list</div>
        

        <script>
        		$(document).ready(function(){
        				$('#add_text a').click(function(){
            				addToWishlist("<?php echo $product->id ?>");
            				});
        				
   
            	})
        	</script>
        <?php } else {?>
         <div class="add_text" id="add_text3">Added to your <a href="<?php echo base_url();?>user/member_wishlist">Wish-list</a></a></div>
        <?php }?>
        <div class="like_faceboob_box">
          <div class="like_faceboob_box_image">
          
          	
          	<div style="float:left; position:relative; z-index: 998; margin-left: 0px; width:380px">
          	
          	          <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style" addthis:url="<?php echo current_url(); ?>?id=<?php echo $id; ?>&type=man"
        addthis:title="<?php 
	$designer = $product->user->first_name.' '.$product->user->last_name;
	if($type=="man")
		echo str_replace("{designer}",$designer,lang('single_product_man'));
	elseif($type=="woman")
		echo str_replace("{designer}",$designer,lang('single_product_women')); 
	else
		echo str_replace("{designer}",$designer,lang('single_product'));
	?>"
        addthis:description="Awesome t-shirt designed by <?php 
	echo $designer;
	?> for Twinne!">
	
<div id="tweet_but"><a class="addthis_button_tweet"></a></div>
<div id="fblike"><a class="addthis_button_facebook_like" fb:like:layout="button_count"></a></div>
</div>
<script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f9bdbf122a37ea0"></script>
<!-- AddThis Button END -->
          	
          	</div>
          	</div>
      
         	
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="single_product_arrow_box"> <a href="<?php echo base_url(); ?>profile/index/<?php echo $product->user->id; ?>">
          <div class="single_product_arrow_box_text">DESIGNED BY:<br />
            <span><?php echo $product->user->first_name.' '.$product->user->last_name;?></span></div>
          </a>
          <div class="single_product_arrow_box_arrow"><img src="<?php echo base_url();?>images/twinne_final_arrowpng.png" alt="arrow" /></div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <!-- End men tabber tab -->
    </div>
  </div>
  <div class="clear" style="height:10px;"></div>
  <div class="matrimonial">
    <script type="text/javascript">
		function show_tab_pane(tab_id)
		{
			for(var i=0;i<4;i++)
			{
				var tab_content_id="#tab_"+i;
				var tab_id_no = "#tab_id_"+i;
				$(tab_content_id).css('display','none');
				$(tab_id_no).removeClass('tabberactive');
			}
			var tab_content_id="#tab_"+tab_id;
			var tab_id_no = "#tab_id_"+tab_id;
			$(tab_content_id).css('display','block');
			$(tab_id_no).addClass('tabberactive');
		}
	</script>

		<ul class="tabbernav">
      		<li id="tab_id_1"><a href="javascript:void(0);" onclick="show_tab_pane('1');" title="SHIPPING">SHIPPING</a></li>
			<li id="tab_id_2"><a href="javascript:void(0);" onclick="show_tab_pane('2');" title="PRODUCT INFO">PRODUCT INFO</a></li>			
			<!-- <li id="tab_id_3" class="tabberactive"><a href="javascript:void(0);" onclick="show_tab_pane('3');" title="SIZE INFO">SIZE INFO</a></li>  //-->
      		
			
			<div style="clear:both"></div>
    	</ul>

		<div class="tabbertab" style="min-height:216px;">
      		
              				<div class="register_content_left" id="tab_3" style="display:block;">
								
								<div class="bottom"><?php echo $product->size_info; ?></div>
								<div class="single_product_select_box">
								  <div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							
							<div class="register_content_left" id="tab_2" style="display:none;">
								
								<div class="bottom"><?php echo $product->product_info; ?></div>
								<div class="single_product_select_box">
								  <div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="register_content_left" id="tab_1" style="display:none;">
								
								<div class="bottom"><?php echo $product->delivery_info; ?></div>
								<div class="single_product_select_box">
								  <div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							
					<div class="clear"></div>	
		</div>


<div style="height:20px;"></div>





	
</div>
<!--Right Tab End-->
<div class="clear"></div>
</div>
<div class="clear"></div>
<div class="single_product_down">
  <h4>Selected for you</h4>
  <div class="clear"></div>
  <div class="single_product_downimage_box" id="selected-for-man" style="display:none;">
    <?php 
	$i=0; 
	foreach($sub_products as $p)
	{
      	if($p->file->join_type == "man" && $p->id != $id)
		{
		if ($p->file->filename)
		{
      	?>
    		<div class="single_product-imagebox">
      		<div class="single_product-image"> <a href="<?php echo base_url(); ?>single_product?id=<?php echo $p->id; ?>&type=<?php echo $p->file->join_type; ?>"><img src="<?php echo base_url();?>images/product_image/thumb_image/<?php echo $p->file->filename; ?>" alt="ijmage" /></a>
        		<!-- This contains the hidden content for inline calls -->
       			<!-- <div style='display:none' class="login_page">
          		<div id='inline_example1<?php echo $i; ?>' style='padding:20px; background:#fff;'> <img src="<?php echo base_url();?>images/product_image/full_image/<?php echo $p->file->filename; ?>" alt="ijmage" /> </div>
        		</div> -->
      		</div>
     		<?php if($p->original_value > 0){ ?>
        		<div class="price2_box">
					<?php  
	
			                                //if($is_called_already=="no")
                                        	{
                                            	if($pref_currency_type=="USD")
                                                	{
                                                	$orginal_price_value = currency("GBP","USD",$p->original_value);
                                                	$product_currency_sale = currency("GBP","USD",$p->price);
                                                	}
                                            	else if($pref_currency_type=="EUR")
                                                	{
                                                		$orginal_price_value = currency("GBP","EUR",$p->original_value);
                                                		$product_currency_sale = currency("GBP","EUR",$p->price);
                                                	}
                                            	else
                                                	{
                                                		$orginal_price_value = $p->original_value;
                                                		$product_currency_sale = $p->price;	
                                                	}
                                            
                                           		//$is_called_already = "yes";
                                        	}
                                            if($pref_currency_type=="USD")
                                                echo "<del>$".$orginal_price_value.'</del> $'.$product_currency_sale.''; 
                                            else if($pref_currency_type=="EUR")
                                                echo "<del>&euro;".$orginal_price_value.'</del> &euro;'.$product_currency_sale.''; 
                                            else
                                                echo "<del>&pound;".$orginal_price_value.'</del> &pound;'.$product_currency_sale.'';                                
                
             ?>
				</div>
			<?php } elseif($p->original_value == 0) { ?>
				<div class="price_box">
					<?php  
                                        //echo '&pound;'.$p->price; 
                                       // if($is_called_already=="no")
                                            {
                                                if($pref_currency_type=="USD")
												{
                                                    $orginal_price_value = currency("GBP","USD",$p->original_value);	
                                                    $product_currency = currency("GBP","USD",$p->price);
												}
                                                else if($pref_currency_type=="EUR")
												{
                                                    $orginal_price_value = currency("GBP","EUR",$p->original_value);	
                                                    $product_currency = currency("GBP","EUR",$p->price);
												}
                                                else
												{
                                                    $orginal_price_value = $p->original_value;	
                                                    $product_currency = $p->price;
												}

                                             //   $is_called_already = "yes";
                                            }
                                            if($pref_currency_type=="USD")
                                                
                                                echo '$'.$product_currency.''; 
                                            else if($pref_currency_type=="EUR")
                                                 echo '&euro;'.$product_currency.''; 
                                            else
                                               echo '&pound;'.$product_currency.'';
                                        ?>
				</div>
			<?php } ?>
    		</div>
    	<?php 
		} else { ?>
    		<div class="single_product-imagebox">
      		<div class="single_product-image"> <a href="<?php echo base_url(); ?>single_product?id=<?php echo $p->id; ?>"><img src="<?php echo base_url();?>images/145X168.jpg" alt="ijmage" /></a></div>
      		<?php if($p->original_value > 0){ ?>
        		<div class="price2_box">
					<?php  echo "<del>".$p->original_value.'&pound;'.'</del>'.$p->price.'&pound;'; ?>
				</div>
			<?php } elseif($p->original_value == 0) { ?>
				<div class="price_box">
					<?php  
                                        
                                        //echo '&pound;'.$p->price;
                                        //if($is_called_already=="no")
                                            {
                                                if($pref_currency_type=="USD")
												{
                                                    $orginal_price_value = currency("GBP","USD",$p->original_value);	
                                                    $product_currency = currency("GBP","USD",$p->price);
												}
                                                else if($pref_currency_type=="EUR")
												{
                                                    $orginal_price_value = currency("GBP","EUR",$p->original_value);	
                                                    $product_currency = currency("GBP","EUR",$p->price);
												}
                                                else
												{
                                                    $orginal_price_value = $p->original_value;	
                                                    $product_currency = $p->price;
												}

                                             //   $is_called_already = "yes";
                                            }
                                            if($pref_currency_type=="USD")
                                                
                                                echo "<del>$".$orginal_price_value.'</del> $'.$product_currency.''; 
                                            else if($pref_currency_type=="EUR")
                                                 echo "<del>&euro;".$orginal_price_value.'</del> &euro;'.$product_currency.''; 
                                            else
                                               echo "<del>&pound;".$orginal_price_value.'</del> &pound;'.$product_currency.'';
                                        
                                        ?>
				</div>
			<?php } ?>
    		</div>
    	<?php 
			}
        
		$i++; 
		}
	} 
		
		?>
        
    <?php $this->load->view('bottom_banner');?>
    <div class="clear"></div>
  </div>
  
  <div class="single_product_downimage_box" id="selected-for-women" style="display:none;">
    <?php 
	$i=0; 
	foreach($sub_products as $p)
	{
      	if($p->file->join_type == "woman" && $p->id != $id)
		{
		if ($p->file->filename)
		{
      	?>
    		<div class="single_product-imagebox">
      		<div class="single_product-image"> <a href="<?php echo base_url(); ?>single_product?id=<?php echo $p->id; ?>&type=<?php echo $p->file->join_type; ?>"><img src="<?php echo base_url();?>images/product_image/thumb_image/<?php echo $p->file->filename; ?>" alt="ijmage" /></a>
        		<!-- This contains the hidden content for inline calls -->
       			<!-- <div style='display:none' class="login_page">
          		<div id='inline_example1<?php echo $i; ?>' style='padding:20px; background:#fff;'> <img src="<?php echo base_url();?>images/product_image/full_image/<?php echo $p->file->filename; ?>" alt="ijmage" /> </div>
        		</div> -->
      		</div>
     		<?php if($p->original_value > 0){ ?>
        		<div class="price2_box">
					<?php  
	
			                                //if($is_called_already=="no")
                                        	{
                                            	if($pref_currency_type=="USD")
                                                	{
                                                	$orginal_price_value = currency("GBP","USD",$p->original_value);
                                                	$product_currency_sale = currency("GBP","USD",$p->price);
                                                	}
                                            	else if($pref_currency_type=="EUR")
                                                	{
                                                		$orginal_price_value = currency("GBP","EUR",$p->original_value);
                                                		$product_currency_sale = currency("GBP","EUR",$p->price);
                                                	}
                                            	else
                                                	{
                                                		$orginal_price_value = $p->original_value;
                                                		$product_currency_sale = $p->price;	
                                                	}
                                            
                                           		//$is_called_already = "yes";
                                        	}
                                            if($pref_currency_type=="USD")
                                                echo "<del>$".$orginal_price_value.'</del> $'.$product_currency_sale.''; 
                                            else if($pref_currency_type=="EUR")
                                                echo "<del>&euro;".$orginal_price_value.'</del> &euro;'.$product_currency_sale.''; 
                                            else
                                                echo "<del>&pound;".$orginal_price_value.'</del> &pound;'.$product_currency_sale.'';                                
                
             ?>
				</div>
			<?php } elseif($p->original_value == 0) { ?>
				<div class="price_box">
					<?php  
                                        //echo '&pound;'.$p->price;
                                           if($is_called_already=="no")
                                            {
                                                if($pref_currency_type=="USD")
												{
                                                    $orginal_price_value = currency("GBP","USD",$p->original_value);	
                                                    $product_currency = currency("GBP","USD",$p->price);
												}
                                                else if($pref_currency_type=="EUR")
												{
                                                    $orginal_price_value = currency("GBP","EUR",$p->original_value);	
                                                    $product_currency = currency("GBP","EUR",$p->price);
												}
                                                else
												{
                                                    $orginal_price_value = $p->original_value;	
                                                    $product_currency = $p->price;
												}

                                                $is_called_already = "yes";
                                            }
                                            if($pref_currency_type=="USD")
                                                
                                                echo "<del>$".$orginal_price_value.'</del> $'.$product_currency.''; 
                                            else if($pref_currency_type=="EUR")
                                                 echo "<del>&euro;".$orginal_price_value.'</del> &euro;'.$product_currency.''; 
                                            else
                                               echo "<del>&pound;".$orginal_price_value.'</del> &pound;'.$product_currency.'';
                                        ?>
				</div>
			<?php } ?>
    		</div>
    	<?php 
		} else { ?>
    		<div class="single_product-imagebox">
      		<div class="single_product-image"> <a href="<?php echo base_url(); ?>single_product?id=<?php echo $p->id; ?>"><img src="<?php echo base_url();?>images/145X168.jpg" alt="ijmage" /></a></div>
      		<?php if($p->original_value > 0){ ?>
        		<div class="price2_box">
					<?php  echo "<del>".$p->original_value.'&pound;'.'</del>'.$p->price.'&pound;'; ?>
				</div>
			<?php } elseif($p->original_value == 0) { ?>
				<div class="price_box">
					<?php  
                                            //echo '&pound;'.$p->price; 
                                           if($is_called_already=="no")
                                            {
                                                if($pref_currency_type=="USD")
												{
                                                    $orginal_price_value = currency("GBP","USD",$p->original_value);	
                                                    $product_currency = currency("GBP","USD",$p->price);
												}
                                                else if($pref_currency_type=="EUR")
												{
                                                    $orginal_price_value = currency("GBP","EUR",$p->original_value);	
                                                    $product_currency = currency("GBP","EUR",$p->price);
												}
                                                else
												{
                                                    $orginal_price_value = $p->original_value;	
                                                    $product_currency = $p->price;
												}

                                                $is_called_already = "yes";
                                            }
                                            if($pref_currency_type=="USD")
                                                
                                                echo "<del>$".$orginal_price_value.'</del> $'.$product_currency.''; 
                                            else if($pref_currency_type=="EUR")
                                                 echo "<del>&euro;".$orginal_price_value.'</del> &euro;'.$product_currency.''; 
                                            else
                                               echo "<del>&pound;".$orginal_price_value.'</del> &pound;'.$product_currency.'';                              
                                        ?>
				</div>
			<?php } ?>
    		</div>
    	<?php 
			}
        
		$i++; 
		}
	} 
		
		?>
        
    <?php $this->load->view('bottom_banner');?>
    <div class="clear"></div>
  </div>
  
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
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
</body>
</html>