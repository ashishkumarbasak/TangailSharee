<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FAQ</title>
<meta name="description" content="Frequently asked questions about deliveries, returns and refunds, orders, payments, security and our products">
<meta name="keywords" content="browse, twinne, catalog, collection, unique, men&#039;s, women&#039;s, salethreadless, t-shirts, tee shirts, tshirts, clothing, design, art" />
<meta name="copyright" content="(c) 2012 Twinne Ltd" />
<meta name="author" content="Twinne Ltd" />
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
        <li><a href="http://help.twinne.com/">SUPPORT</a></li>
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
  	

<h1>FAQ</h1>

<h2>Delivery</h2>

<h3>Has my order been shipped?</h3>
<p>
As soon as your order has been shipped we will automatically send you confirmation via email including your tracking number when available.
</p>

<h3>How can I track my order?</h3>
<p>
You can track your order using your tracking number, please note that this can sometimes be referred to as consignment number, displayed in your confirmation email.
Go to http://www.royalmail.com/, select the option "tracking" and enter the tracking number to locate your items.</p>
<p>
Please ensure that you allow 24 hours for this number to become active.
</p><p>
Not all of our delivery options include a tracking number. The option is displayed in the checkout process when available.
</p>
<h3>Can I change the delivery address for my order?</h3>
<p>
Once your order has been despatched we are unable to change your delivery address. But you can contact us to get the item reference, that can be used to contact the Royal Mail customer service, locate the item and arrange a re-delivery.
</p>
<h3>Do I need to sign for my UK delivery?</h3>
<p>
It depends by the shipping option chosen by you. If you choose a tracked service and you are in when we deliver, our driver will ask you to sign for your delivery.
</p>
<p>
If we attempt to deliver whilst you are out our couriers will either leave the parcel with a neighbour or in a safe location at your property.
<p>
<h3>What happens if you deliver whilst I am out?</h3>
<p>
If you are not in when our couriers first try to deliver and they cannot find a safe location to leave the package, they will leave a card, take your order back, and safely hold it in the nearest Post office where you can take it by showing the card and a valid ID.
</p>
<p>
Please follow the instructions on the card left by the courier.
</p>
<h3>What do I do if there is a problem with my delivery?</h3>
<p>
Please use our support service or contact our customer service through our contact page.
</p>

<h3>Which are the delivery options?</h3>
<ul>
<li>Uk Standard delivery: FREE (2-3 working days)</li>
<li>Uk next day delivery: 8£ ( Next day delivery, Order by 4:00pm)</li>
<li>Europe Standard delivery: 4.99£ (5-7 working days)</li>
<li>Europe Express delivery: 12£ (3-5 working days)</li>
<li>Worldwide Standard delivery: 5.99£ (7-10 working days)</li>
<li>Worldwide Express delivery: 15£ (5-7 working days)</li>
</ul>

<h3>Which is your delivery service company?</h3>
<p>
We use Royal Mail Ltd.
</p>

<h3>Why have I paid extra duties when I received the items?</h3>
<p>
Recipients outside the EU sometimes have to pay import duties, clearance or brokerage fees. These customs duties are charged once the parcel reaches its destination country and must be paid by the recipient of the parcel. Unfortunately we have no control over these charges nor can we advise on the cost. Please contact your local customs authority in order to determine this before proceeding with an order.
</p>

<h2>Returns and Refunds</h2>

<h3>What is your online returns policy?</h3>
<p>
We guarantee to refund items purchased on Twinne.com that you are not completely happy with, when you perform the refund request through our website within 7 days from the receipt of the items, and return it to us in a saleable condition within 28 days from your refund request. We do not offer exchange with other Twinne products.
</p>
<p>
Please note that items must be returned with all of the tags intact. 
</p>
<p>
Twinne purchases can only be returned by post, we do not refund the postage and delivery costs. We are sorry for any inconvenience this may cause you. 
</p>
<p>
The goods are your responsibility until they reach our Warehouse. Please ensure you package your return to prevent any damage to the items or boxes. We are not responsible for any items that are returned to us in error.
</p
><p>
Refunds will be credited to your original method of payment.<br />
Our returns address is:<p>

<p>
	<br />
<strong>Twinne Ltd</strong><br />
91 Linden Gardens<br />
London<br />
W2 4EX<br />
</p>

<h3>How do I return an item?</h3>
<p>
As an online business, we aim to provide a Returns service that is totally hassle-free for you.
</p>
<p>
The refund procedure is entirely performed through our website. All what you need to do is to login to http://twinne.com using your account details, go to your profile page and select "My orders". Here you can select the order you want to return and click on the link "Request a refund". You have 7 days from the receipt of the items to perform a refund request.
</p>
<p>
At this point you need to download, print and compile the returns label. Please note it is very important that when you return an item, we know the order number it relates to and your details. Without these details we won't be able to take the action you want us to. 
</p>
<p>
You can now dispatch the items to the Following address:
</p>
<p>
	<br />
<strong>Twinne Ltd</strong><br />
91 Linden Gardens<br />
London<br />
W2 4EX<br />
</p>
<p>
You have 28 days from the refund request to return the items to us.
</p>
<p>
Once we receive your items, we will inspect and process the goods within 24 hours to ensure you receive what you want as quickly as possible.
</p>
<p>
So you are kept informed, we will send you an email confirming the action we have taken, as soon as we are confident the goods are in their original condition.
</p>
<p>
Any refund will automatically be issued to the card used to make the original purchase.
</p>
<h3>What do I do if there is a problem with my return?</h3>
<p>
Please contact us through our support page or email us at <a href="mailto:info@twinne.com">info@twinne.com</a>
</p>
<h3>Do I have to pay postage and delivery costs for my returns?</h3>
<p>Yes, the clients has to pay for the returns. Unfortunately we can't cover all the costs of the return process, but if you're eligible for a refund we will pay the entire t-shirt price.</p> 
<h3>My items are damaged. What I'm supposed to do?</h3>
<p>
Send them back to us and we will refund you. Please follow the instruction contained in our Delivery & Returns page.
</p>
<h3>My account states I've been refunded but I haven't received the money yet</h3>
<p>
Please ensure you are checking the account you used to place your order originally and allow about 5 working days for your account to be credited.
</p>

<h2>Our products</h2>
<h3>How should I care for my shirts? Will they shrink?</h3>
<p>Washing instructions: ALWAYS wash inside out. For the first 2 washes, wash by hand in cold water. Use low temp washing program only (we recommend 30 degrees Celsius maximum). Wash dark colors separately. Tumble dry low. DO NOT IRON DECORATIONS. Iron shirts inside out. Do not dry clean if decorated.</p>
<p>Since all of the shirts have some percentage of cotton, they will tend to shrink a little after being washed and dried.</p> 
<h3>What t-shirts do you print on?</h3>
<p>All of our t-shirts are manufactured in Italy from scratch, they have unique cuts and custom designs. We do not print on branded pre-made t-shirts. T-shirts material is high-quality European combed cotton.</p>
<h3>How do I know what size shirt to order?</h3>
<p>Each product page has links to sizing charts. Refer to these charts and any special instructions given per product.</p>
<h3>Will the printing fade?</h3>
<p>Because we choose to use soft water-based inks, some of the prints will fade some after being washed. Black prints tend to fade the most, but will still hold up for lots of wear and washes.</p>

<h2>Orders</h2>

<h3>Do I need to create an account to be able to order?</h3>
<p>
Yes, you do. By creating an account you will be able to order our products and you will get access to further website features.
</p>

<h3>How do I place an order?</h3>
<p>
The order process is very easy: chose the product you want to buy from our gallery of t-shirts, from the product page select the size and quantity, then press the "add to cart button". At this point you can access the checkout process from the cart icon on top-right of the website. If you already are a registered user, simply follow the instructions provided during the checkout process. If you are not a registered user, you have to create an account first, then you can continue with the checkout process. At the end of the checkout process, once you have provided the data we needed and performed the payment, the order has been placed. You will receive a notification via email and the order will be shipped to you.
</p>

<h3>What do I do if there is a problem with my order?</h3>
<p>
Please inform us about every issue had during the ordering process. You can use the support page or email us at info@twinne.com
</p>
<h3>Can I add an item to my order after I have placed it?</h3>
<p>
Unfortunately not, you will need to place a separate order for anything else that you want to buy. We will do our best to ship both the orders the same day so you will receive them together.
</p>
<h3>Can I cancel my order?</h3>
<p>
You can cancel your order only if we haven't shipped it yet. When an order is shipped, you will receive an email notification. Before the delivery, you can cancel the order though the "My account" panel.
</p>
<p>If you no longer wish to receive the items, you have to wait for them and send them back to us, then follow the refund process explained in our Delivery & Returns page.</p>
<h3>Can I cancel an item from my order?</h3>
<p>
You can cancel an order and place a new order only before we dispatch the items to you. Once the order has been dispatched, you receive an email notification and the order cannot be modified or cancelled anymore. If you are unhappy with one or more of the items you purchased, you can always request a refund. See the Delivery & Refunds page for more information about refunds.
</p>

<h2>Payment and Security</h2>

<h3>What payment methods do you accept?</h3>
<p>
We currently accept the following payment methods:</p>
<p>
Visa, Mastercard, American Express, Solo, Delta, Maestro and Paypal.</p>

<h3>Can I use more than one discount offer on my order?</h3>
<p>No, you can use only 1 discount code per order.</p>
<h3>When will a payment leave my bank account?</h3>
<p>
You will only be charged once the goods have been despatched to the delivery address.
</p>
	
<h3>I have a promotional/discount code,how do I use this?</h3>
<p>
Please enter the promotional/discount code in the 'shopping bag' page of your transaction, before proceeding with the checkout process.
</p>
<h3>How secure is your website?</h3>
<p>
As safe as it possibly can be. We store any information you give us securely using high-level SSL encryption technology - the most advanced security software currently available for online transactions.
</p>

<h3>How do I change my account details?</h3>
<p>
You can change your account details in the 'My profile' section of your account. You are also able to view your orders and manage them from the same website area.
</p>

<h2>Your online account</h2>

<h3>How do I create an account?</h3>
<p>
Simply use the "Join" link on top-right of any page.
</p>
<h3>Why do I need to register?</h3>
<p>
Registering with us helps speed up the ordering process for you and allows you to keep track of your orders and refunds online.
</p>
<h3>By registering, will I automatically receive marketing emails from you?</h3>
<p>
No, not unless you sign up to our newsletter. If you do sign up, you can cancel your subscription from your profile pagel at any time. 
</p>
<h3>By registering, will you pass my details on to any other companies?</h3>
<p>
No, we will not pass your details on to other companies.
</p>

<h3>I've forgotten my password. What do I do?</h3>
<p>
If you’ve forgotten your password we’ll need to reset it for you. Simply log in to your account and follow the "Forgotten Password" instructions. For security reasons, we cannot send your password to you via email.
</p>
<h3>What is your privacy policy?</h3>
<p>
Please see our privacy policy here.
</p>
<h3>How can I have my details removed from your mailing list?</h3>
<p>
Simply click the unsubscribe link at the foot of the email, or, if you prefer, uncheck the apposite field in your profile page.
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