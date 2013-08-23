<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Terms and conditions</title>
<meta name="description" content="Tangail-sharee.com Terms and Conditions. Privacy policy and legal details to buy our unique t-shirts">
<meta name="keywords" content="browse, Tangail-sharee.com, catalog, collection, unique, men&#039;s, women&#039;s, salethreadless, t-shirts, tee shirts, tshirts, clothing, design, art" />
<meta name="copyright" content="(c) 2013 Tangail-sharee.com" />
<meta name="author" content="Tangail-sharee.com" />
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
  	
<h1>Terms and conditions</h1>

<h2>General</h2>

<p>Access to and use of this website and the products and services available through it are subject to the following terms and conditions. These terms of conditions may be updated at any time and without notice. Your statutory rights are not affected.
</p>
<p>
This Website also contains links to other websites, which are not operated by Tangail-sharee.com (the "Linked Sites"). Tangail-sharee.com has no control over the Linked Sites and accepts no responsibility for them or for any loss or damage that may arise from your use of them. Your use of the Linked Sites will be subject to the terms of use and service contained within each such site.
</p>

<h2>Terms of sale</h2>

<p>
The terms of sale shall apply to all contracts for the purchase of goods by you from Tangail-sharee.com (hereafter "Tangail Sharee"), the seller, to the exclusion of all other terms and conditions which you may purport to apply under any sales offer or purchase order. These terms of sale supersede all previous agreements and understandings between the parties. Any amendment to the terms of sale will only be effective if signed by a director of Tangail-sharee.com.
Tangail-sharee.com is committed to providing you with terms of sale, which are easy to understand and which are fair to you.
</p><p>
Dispatch times may vary according to availability and any guarantees or representations made as to delivery times are limited and subject to any delays resulting from postal delays or force majeure for which we will not be responsible.
In order to contract with Tangail-sharee.com you must be over 18 years of age and possess a valid credit or debit card issued by a bank acceptable to us, or a Paypal account. 
</p><p>
When placing an order you undertake that all details you provide to us are true and accurate, that you are an authorised user of the credit or debit card used to place your order and that there are sufficient funds to cover the cost of the goods.
Whilst we try and ensure that all details, descriptions and prices which appear on our website <a href="http://tangail-sharee.com.com">Tangail-sharee.com</a> are accurate, errors may occur. If we discover an error in the price of any goods which you have ordered we will inform you about this as soon as possible and give you the option of reconfirming your order at the correct price or cancelling it. If we are unable to contact you we will treat the order as cancelled. If you cancel and you have already paid for the goods, you will receive a full refund. Where applicable, prices are inclusive of VAT at the rate appropriate to the country of receipt within the EU. VAT is not included in our prices for customers outside of the EU. Delivery costs will be charged in addition; such additional charges are clearly displayed where applicable and included in the 'Total Cost'.
<p>

<h2>Placing an order</h2>

<p>
All orders are subject to acceptance and availability. When placing an order you undertake that all details you provide to us are true and accurate, that you are an authorised user of the credit, debit card or Paypal account used to place your order and that there are sufficient funds to cover the cost of the goods. Once you have placed an order with us, you will receive an order confirmation e-mail acknowledging receipt of your order. This email is NOT an acceptance of your order, just a confirmation that we have received it.
When placing your order we carry out a standard pre-authorization check on your payment card. Payment will be not be taken until your order has been accepted and the goods dispatched. We carry out security checks on all orders and may cancel your order should it fail these checks, upon which you will be notified.
</p>
<p>
A contract between you and Tangail-sharee.com will not be formed until we send you a further email confirming that your order has been accepted and your goods have been dispatched. Only those goods listed in the dispatch confirmation e-mail will be included in the contract formed.
</p>
<p>
We reserve the right not to accept your order in the event that the item ordered is out of stock or does not satisfy our quality control standards and is withdrawn.
</p>

<h2>Refunds</h2>
<p>
We guarantee to refund items purchased on Tangail-sharee.com that you are not completely happy with, when you perform the refund request through our website within 7 days from the receipt of the items, and return it to us in a saleable condition within 28 days from your refund request. We do not offer exchange with other Tangail-sharee.com products.
</p>
<p>
Please note that items must be returned with all of the tags intact. 
</p>
<p>
Tangail-sharee.com purchases can only be returned by post, we do not refund the postage and delivery costs. We are sorry for any inconvenience this may cause you. 
</p>
<p>
The goods are your responsibility until they reach our Warehouse. Please ensure you package your return to prevent any damage to the items or boxes. We are not responsible for any items that are returned to us in error.
Refunds will be credited to your original method of payment.<p>
<p>	
Our returns address is:
</p>

<p>
<br />
<strong>Tangail-sharee.com</strong><br />
Adalat Para, Kalibari Road<br />
Tangail<br />
Bangladesh<br />
</p>

<p>
Go to page <a href="https://tangail-sharee.com.com/pages/delivery_returns_terms_conditions">Delivery & Returns</a> for more info.
</p>

<h2>Delivery options</h2>
<p>
We offer different options of delivery by Royal Mail Ltd. Go to page <a href="https://tangail-sharee.com/pages/delivery_returns_terms_conditions">Delivery & Returns</a> for more info.
</p>
<p>
Unfortunately we are not able to delivery to Morocco at the moment. If we receive orders form Morocco by mistake we will refund it immediately and we will cancel the order.
</p>

<h2>Customs and Duty</h2>

<p>Please note that recipients outside the EU will be responsible for any IMPORT DUTIES, CLEARANCE FEES or BROKERAGE fees including any other additional charges. We operate on a DDU (Delivered Duty Unpaid) basis. This is managed by shipping provider on a 'pay on delivery' basis. Sometimes goods may be subject to delays, due to customs or weather. The customer is responsible for providing any information required by customs to ensure the goods are cleared. We recommend you to contact your local customs authority to determine a landed cost price prior to purchase completion.
</p>

<h2>Disputes</h2>
<p>
In the unlikely event that there is a dispute in relation to the goods supplied, any dispute or claim shall be governed and construed according to English Law and shall be subject to the exclusive jurisdiction of the English Courts. If any provision of these Terms & Conditions is held by any Court or other authority to be invalid or unenforceable in whole or in part, then the validity of the rest of these Terms & Conditions and the remainder of the provision in question shall not be affected thereby.
</p>

<h2>Prohibitions</h2>

<p>You must not misuse this website. You will not: commit or encourage a criminal offence; transmit or distribute a virus or post any other material which is malicious, technologically harmful, in breach of confidence or in any way offensive or obscene; hack into any aspect of it; corrupt data; cause annoyance to other users; infringe upon the rights of any other person's proprietary rights; send any unsolicited advertising or promotional material, or attempt to affect the performance or functionality of any computer facilities of or accessed through this website. Breaching this provision would constitute a criminal offence under the Computer Misuse Act 1990.
</p>
<p>We will not be liable for any loss or damage caused by a distributed denial-of-service attack, viruses or other technologically harmful material that may infect your computer equipment, computer programs, data or other proprietary material due to your use of this website or to your downloading of any material posted on it, or on any website linked to it.
</p>
<p>Tangail-sharee.com reserves the rights to take any customer account out of use at any time if it is believed that the website and the products and services available through it are being misused.
<p>
<h2>Intellectual property,software and Content</h2>
<p>
The intellectual property rights in all software and content made available to you on or through this Website remains the property of Tangail-sharee.com or its licensors and are protected by copyright laws and treaties around the world. All such rights are reserved by Tangail-sharee.com and its licensors. You may store, print and display the content supplied solely for your own personal use. You are not permitted to publish, manipulate, distribute or otherwise reproduce, in any format, any of the content or copies of the content supplied to you or which appears on this Website nor may you use any such content in connection with any business or commercial enterprise.
</p>

<p>You shall not modify, translate, reverse engineer, decompile, disassemble or create derivative works based on any software or accompanying documentation supplied by Tangail-sharee.com or its licensors. Tangail-sharee.com is trade marks belonging to Tangail-sharee.com. No licence or consent is granted to you to use these marks in any way, and you agree not to use these marks or any marks which are colourably similar without the written permission of Tangail-sharee.com.
<br />
Disclaimer as to ownership of trade marks,images of personalities and third party copyright
</p>
<p>	
Except where expressly stated to the contrary all persons (including their names and images), third party trade marks and images of third party products, services and/or locations featured on this Website are in no way associated, linked or affiliated with Tangail-sharee.com and you should not rely on the existence of such a connection or affiliation. Any trade marks/names featured on this Website are owned by the respective trade mark owners. Where a trade mark or brand name is referred to it is used solely to describe or identify the products and services and is in no way an assertion that such products or services are endorsed by or connected to Tangail-sharee.com.
</p>
<p>
Your use of this website and any dispute arising out of such use of the website is subject to the laws of England, Northern Ireland, Scotland and Wales.
</p>

<h2>Privacy Policy</h2>
<p>
Tangail-sharee.com takes a great deal of care in ensuring that information which is obtained about you is treated appropriately and in accordance with the Data Protection Act 1998. We will not sell your personal information to any third parties.
</p>
<p>We use the information that we collect about you to:</p>
<ul>
<li>Process your order expeditiously and efficiently.</li>
<li>In order to enable the goods to be delivered to you we have to pass on your address to our third party couriers. If it is in our possession we will also pass on details of your telephone number in order to allow our couriers to contact you directly in the event of a query regarding delivery.</li>
<li>Contact you regarding forthcoming offers by email only, and only if you subscribe our newsletter service.</li>
<li>We will not telephone you unless the telephone call relates to a particular order that you have made. Credit card and debit card details are checked and verified by a third party and goods are only dispatched once authorisation has been obtained.</li>
<li>To ensure that your credit, debit or charge card is not being used without your consent, we will validate name, address and other personal information supplied by you during the order process against appropriate third party databases. By accepting these terms and conditions you consent to such checks being made. In performing these checks personal information provided by you may be disclosed to a registered Credit Reference Agency which may keep a record of that information. You can rest assured that this is done only to confirm your identity, that a credit check is not performed and that your credit rating will be unaffected. All information provided by you will be treated securely and strictly in accordance with the Data Protection Act 1998.</li>
</ul>
<p>
We may use information concerning you for payment recovery or to investigate any possible fraud in the event that credit or debit card payments have been used in a fraudulent manner. Please note that we may be required to disclose information concerning you if requested to do so by the police.
</p>
<p>
We do not store credit card details nor do we share customer details with any 3rd parties.
</p>
<h2>How we use cookies</h2>
<p>
A cookie is a small file which asks permission to be placed on your computer's hard drive. Once you agree, the file is added and the cookie helps analyse web traffic or lets you know when you visit a particular site. Cookies allow web applications to respond to you as an individual. The web application can tailor its operations to your needs, likes and dislikes by gathering and remembering information about your preferences. 
</p>

<h2>Community terms & conditions</h2>
<p>
Tangail-sharee.com reserves the right to close accounts if any users is seen to be using proxy IPS in order to attempt to hide the use of multiple accounts or disrupts any of our service in any way.
If you use multiple logins for the purpose of disrupting the community you may have action taken against all of yours accounts.
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