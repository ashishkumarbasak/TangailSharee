<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>About us | Tangail-sharee.com</title>
<meta name="keywords" content="browse, Tangail-sharee.com, catalog, collection, unique, men&#039;s, women&#039;s, salethreadless, t-shirts, tee shirts, tshirts, clothing, design, art" />
<meta name="copyright" content="(c) 2013 Tangail-sharee.com" />
<meta name="author" content="Tangail-sharee.com" />
<meta name="description" content="bring real art on t-shirts. Not photographic artworks, or no-sense illustrations, but real art created by super-talented designers belonging to different fields">
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" type="text/css" media="screen" />
<!--Select Box Js Start-->
<script  type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".toggle_container").hide();
	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("fast");
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
			$(".example7").colorbox({transition:"none", width:"580px", inline:true, height:"auto", href:"#inline_example2"});
        $(".example8").colorbox({transition:"none", width:"580px", inline:true, height:"auto", href:"#inline_example1"});
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


<div class="header">

  	<div class="header_cont" style="padding-top: 0px;">
    <div class="logo"><a href="<?php echo base_url();?>home"><img src="<?php echo base_url(); ?>images/logo.png" alt="logo" /></a></div>
    
     <div class="nav_box">
      <ul>	
      	<li><a href="<?php echo base_url();?>">HOME</a></li>         
        <li><a href="<?php echo base_url();?>show_product?type=woman">WOMEN</a></li>
        <li><a href="<?php echo base_url();?>show_product?type=man">MEN</a></li>
        <li><a href="http://help.tangail-sharee.com.com/">SUPPORT</a></li>
      </ul>
    </div>
    
    </div>
    <div class="clear"></div>
   
  </div>
  
    <div class="clear"></div>
    <div class="bottem_border"></div>
  <!--Header End-->



<script type="text/javascript">
	function show_page(page_number)
	{
		$('#loading_update').addClass('loading');
		var page_url="<?php echo $pagination['url']; ?>a_pagination=1&page="+page_number;
		//alert(page_url);
		$('#mid_content').load(page_url, function() {
  			$('#loading_update').removeClass('loading');
			$("html, body").animate({ scrollTop: 350 }, "slow");	
			//alert('Load was performed.');
		});			
	}
	
	
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

	<div id="loading_update" class="loading"></div>
  	<div id="mid_content">
<div class="about_us_container">  	
<h1>About us</h1>

<img style="margin-bottom: 30px;" src="<?php echo base_url(); ?>images/about_page.jpg" alt="about Tangail-sharee.com" />

<div class="about_side_left">
	<img src="<?php echo base_url(); ?>images/about_us_side_img.jpg" alt="about Tangail-sharee.com" />
</div>

<div class="about_us_text">
	
<p>Tangail-sharee.com began with an idea. An idea injected with a love of fashion and graphic design, fused together by three Italian friends all cut from different parts of the creative cloth. Introducing Sebastiano Guerriero, an expert in the world of graphic design; Davide Pacilio a PR specialising in electronic music events and Piervincenzo Madeo a web designer with a wealth of collaborative experience. Brought together by one simple dream: to create something different through a combination of all of their skills.</p>
 
<p>Tangail-sharee.com rapidly turned from an ideology into a reality. Sebastiano takes ownership of the graphic design aspect, Davide creates unique cuts producing high quality fashion whilst Piervincenzo brings the brand to life through a complex website system; the way in which Tangail-sharee.com becomes accessible to the customer.</p>

<p>But this is not an ordinary t-shirt brand. Deciding that there was a niche opportunity within the field, the three designers' wondered "What if talented worldwide artists could collaborate with us?" Thus Tangail-sharee.com was born. Through a diverse appeal, Tangail-sharee.com showcases underground creatives from across the world who experiment with all kinds of different art forms; fusing together an innovative design strategy to produce an edgy collection of cool tees, which instigates a subversive youth culture. The brand name Tangail-sharee.com, which is similar to 'twin', commemorates the collaboration between artist and designer - Tangail-sharee.com is linked to them and they are linked to us.</p>
 
<p>Leaving behind their Italian culture, the three friends braved the bright lights of London to start their company within one of the world's fashion capitals. A new city, a new project, a brand new adventure. But Tangail-sharee.com has gone from strength to strength through the production of real craftsmanship on fashion forward t shirts. No photography or illustrations, but real art created by super-talented designers belonging to different creative fields from graffiti to digital art, through to traditional paintings and graphic design.</p>
 
<p>Whether it is the unique ideology of submerging underground designers, or the way in which the Brand Directors' have put a slick Italian flair on something so simple, you can tell that Tangail-sharee.com will be gradually shaping the t-shirt design industry through the integration of tomorrow's artists today. The brand's artistic connotations may be dark, but their future in niche fashion looks very bright indeed.</p>
	
</div> 
 
 </div> 
  	</div>
  <!--Home Page Content End-->
  <!--Footer Start -->
  <?php $this->load->view("footer.php"); ?>
  <!--Footer End -->
  <div class="clear"></div>
</div>
</body>
</html>