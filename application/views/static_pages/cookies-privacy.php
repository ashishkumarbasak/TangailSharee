<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Terms and conditions</title>
<meta name="description" content="tangail-sharee Terms and Conditions. Privacy policy and legal details to buy our unique t-shirts">
<meta name="keywords" content="browse, tangail-sharee, catalog, collection, unique, men&#039;s, women&#039;s, salethreadless, t-shirts, tee shirts, tshirts, clothing, design, art" />
<meta name="copyright" content="(c) 2012 tangail-sharee Ltd" />
<meta name="author" content="Tangail-sharee Ltd" />
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
    <div class="logo"><a href="<?php echo base_url();?>home"><img src="<?php echo base_url(); ?>images/logo.jpg" alt="logo" /></a></div>
    
    <div class="nav_box">
      <ul>	
      	<li><a href="<?php echo base_url();?>">HOME</a></li>         
        <li><a href="<?php echo base_url();?>show_product?type=woman">WOMEN</a></li>
        <li><a href="<?php echo base_url();?>show_product?type=man">MEN</a></li>
        <li><a href="http://help.tangail-sharee.com/">SUPPORT</a></li>
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
  	
<h1>Cookie Policy</h1>

<h2>General</h2>

<p>This privacy statement sets out how tangail-sharee Ltd ("we" "us" or "our"), who operate this web site located at tangail-sharee.com ("Site"), use the information you give us. We may change this privacy statement at any time by posting such changes on the Site. Your continued use of the Site after notice of changes shall mean you have agreed to the new privacy statement.</p>
<p>
This Cookies Policy explains what cookies are, how we use cookies and similar technologies on our website, and what you can do to manage how cookies are used.
</p>

<h2>What are cookies</h2>

<p>
A cookie is a small text file which is sent to your device by the web server so that the website can remember some information about your browsing activity on the website.  The cookie will collect information relating to your use of our sites, information about your device such as the device���s IP address and browser type, demographic data and, if you arrived at our site via a link from third party site, the URL of the linking page. If you are a registered user or subscriber it may also collect your name and email address, which may be transferred to data processors for registered user or subscriber verification purposes.

Cookies record information about your online preferences and help us to tailor our websites to your interests. Information provided by cookies can help us to analyse your use of our sites and help us to provide you with a better user experience.

Cookies are either ���session��� or ���persistent��� cookies, depending on how long they are stored for:
<ul>
<li>Session cookies are only stored for the duration of your visit to a website and are deleted from your device when you close your browser;</li>
<li>Persistent cookies are saved on your device for a fixed period of time after the browser has closed and are activated each time you visit the website where the cookie was generated.</li>
</ul>
</p>

<h2>How does Future use cookies?</h2>

<p>We, together with our trusted partners, use cookies for the following purposes:</p>

<p>
<strong>1. Essential and Functional Cookies</strong><br/>
We use these cookies to enable certain online functionality including:
<ul>
    <li>identify returning users, registrants and subscribers and to allow them to be presented with a personalised version of the site;</li>
    <li>eliminating the need for returning users to re-enter their login details;</li>
    <li>filling your cart to buy;</li>
    <li>operating a shopping trolley</li>
</ul>
</p>
<p>
<strong>2. Analytical Performance Cookies</strong><br/>
We use these cookies to measure users��� behaviour to better develop our websites.  By using web analytics services provided by Google Analytics we can analyse which pages are viewed and how long for and which links are followed, and we can use this information to provide products which is of interest. We also use this analysis to report on our performance and to sell advertising.
</p>
<p>
<strong>3. Behavioural Advertising Cookies</strong><br/>
We use these cookies to measure general user behaviour across our sites and third party sites to build a profile based on users browsing patterns so that we and third parties can target advertising to users that will be more relevant to users��� interests. We use cookies to create profiles that trusted third parties can buy to allow them to better target their advertising with more relevant content.
<br /><br />
The information generated by the cookie about your use of our sites (including your IP address) will be transmitted to and stored on servers in the United States and/or United Kingdom. They may also transfer this information to third parties where required to do so by law, or where such third parties process the information on their behalf.  By using this website, you consent to the processing of data about you by those service providers in the manner and for the purposes set out above.
<br /><br />
We cannot control nor do we have access to any cookies placed on your computer by third party advertisers and sponsors.
</p>
<p>
<strong>4. Other Third Party Cookies</strong><br/>
You may notice on some pages of our websites that cookies have been set that are not related to tangail-sharee. When you visit a page with content embedded from, for example, YouTube or Facebook, these third party service providers may set their own cookies on your device. tangail-sharee does not control the use of these third party cookies and cannot access them due to the way that cookies work, as cookies can only be accessed by the party who originally set them. Please check the third party websites for more information about these cookies.
</p>

<h2>Controlo your cookies</h2>
<p>Someone finds the idea of a website storing information on their device a little intrusive. If you would prefer to opt out of cookies, it is possible to control cookies by following the steps below, however you should be aware that you might lose some features and functionality of the website if you do so.</p>
<p>
Cookies, including those which have already been set, can be deleted from your hard drive. You can also change the preferences/settings in your web browser to control cookies. In some cases, you can choose to accept cookies from the primary site, but block them from third parties. In others, you can block cookies from specific advertisers, or clear out all cookies. Deleting or blocking cookies may reduce functionality of the site. To learn more about how to reject cookies, visit <a href="http://www.allaboutcookies.org">www.allaboutcookies.org</a> or go to the help menu within your internet browser. If you experience any problems having deleted cookies, you should contact the supplier of your web browser.
</p>
<p>Opting out of Analytical Performance Cookies:<br />

If you would like to opt out of Analytics cookies, please do so by clicking on the links below:
</p>
<p>
Google Analytics: <a href="https://tools.google.com/dlpage/gaoptout">https://tools.google.com/dlpage/gaoptout</a>
</p>
<p>
Opting out of Third part Cookies:<br />

If you would like to disable ���third party��� cookies generated by advertisers or providers of targeted advertising services or social media services, you can turn them off by going to the third party���s website and getting them to generate a one-time ���no thanks��� cookie that will stop any further cookies being written to your machine. Here are links to the main third party advertising platforms we use, each of which have instructions on how to do this:
</p>
<p>
You can find out how to decline other online behavioural advertising by visiting:<br />

<a href="https://www.facebook.com/help/cookies">https://www.facebook.com/help/cookies</a>
<a href="http://www.networkadvertising.org/managing/opt_out.asp">http://www.networkadvertising.org/managing/opt_out.asp</a>
</p>
<p>	
Do you need more information about cookies? Email us:
</p>

<p>
<br />
<a href="mailto:info@tangail-sharee.com">info@tangail-sharee.com</a><br />
</p>


  
  	</div>
  <!--Home Page Content End-->
  <!--Footer Start -->
  <?php $this->load->view("footer.php"); ?>
  <!--Footer End -->
  <div class="clear"></div>
</div>
</body>
</html>