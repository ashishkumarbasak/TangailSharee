<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<title><?php echo lang('home_page_title'); ?></title>
<meta property="og:description" content="" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="copyright" content="(c) 2015 tangail-sharee.com" />
<meta name="author" content="tangail-sharee.com" />
<meta property="fb:app_id" content=""/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="<?php echo base_url(); ?>" />
<meta property="og:title" content="<?php echo lang('home_page_title'); ?>" />
<meta property="og:site_name" content="tangail-sharee.com" />
<meta property="og:image" content="<?php echo base_url(); ?>images/logo_share.jpg" />
<link rel="canonical" href="https://tangail-sharee.com" />
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" type="text/css" media="screen" />

<!--Select Box Js Start-->
<script  type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js"></script>
<!--Select Box Js End-->

<!--LightBox Js-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.colorbox.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/wishlist.js"></script>

<script type="text/javascript">
$(document).ready(function(){
		base_url="<?php echo base_url(); ?>";
		
        //Examples of how to assign the ColorBox event to elements
        $("a[rel='example1']").colorbox();
        $("a[rel='example2']").colorbox({transition:"fade"});
        $("a[rel='example3']").colorbox({transition:"fade", width:"75%"});
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
        $("a[rel='example14']").colorbox();
        $(".example15").colorbox({width:"400px", inline:true, height:"auto", href:"#inline_example14"});

        //Example of preserving a JavaScript event for inline calls.
        $("#click").click(function(){ 
                $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                return false;
        });
        
        
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
</head>

<body>
  <div id="top"></div>
  <div class="wrapper_container">
    <!--Header Start-->
    <?php $this->load->view("header"); ?>
  </div>
  <!--Header End-->
  
  <!--Top banner Start-->
  <div class="welcome_banner_pat">
    <div class="welcome_banner">
      <img src="<?php echo base_url(); ?>images/homepage_img_sale.jpg" alt="sale">
    </div>
  </div>
  <!--Top banner End-->

  <!--Home Page Content Start-->
  <div class="wrapper_container">
    <?php if(isset($pagination)) { ?>
      <script type="text/javascript">
        function show_page(page_number) {
          $('#loading_update').addClass('loading');
          var page_url="<?php echo $pagination['url']; ?>a_pagination=1&page="+page_number;
          $('#mid_content').load(page_url, function() {
            $('#loading_update').removeClass('loading');
            /* Just delay few seconds */
            $("html, body").animate({ scrollTop: 350 }, "slow");
            //alert('Load was performed.');
          });
        }
      </script>
    <?php } ?>

    <div id="mid_content">
      <?php $this->load->view("home_page_item.php"); ?>
    </div>
    <!--Home Page Content End-->
  </div>

  <!--Footer Start -->
  <?php $this->load->view("footer.php"); ?>
  <!--Footer End -->
  <div class="clear"></div>
</body>
</html>