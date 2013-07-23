<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
	$profile_name=$user->first_name." ".$user->last_name;
	echo str_replace("{profile_name}",$profile_name,lang('member_wishlist'));
?>
</title>
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/colorbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>css/global.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/member.css" type="text/css" />
<!--Select Box Js Start-->
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".toggle_container").hide();
	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
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

function delete_wishlist_item(product_id)
		{
			$('#loading_match_update').addClass('loading');	
			var returnmessage = $.ajax({
				  	url: "<?php echo base_url(); ?>user/member_wishlist/deleteProduct",
					global: false,
					type: "POST",
					data: {	product_id : product_id},
					dataType: "html",
					async:false,
					success: function(returndata){
					//alert(returndata);
					$('#loading_match_update').removeClass('loading');
					//alert(returndata);
					//var ul_id="#child_"+$('#popup_comment_parent').val()+" li:first";
					//alert(ul_id);
					if(returndata=="1")
						var remove_div_id="#wish_list_item_"+product_id;
						$(remove_div_id).remove();
						//$(msg).hide().insertBefore(ul_id).slideDown('fast');
						}
					}

					).responseText;			
						return false;
		}

</script>
<!--Select Box Js End-->
<!--LightBox Js-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.colorbox.js"></script>
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
			
			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
	</script>

</head>
<body>
<?php //$this->load->view("currencyconverter.php"); ?>  
<div id="top"></div>
<div id="wrapper">
  <!--Header Start-->
  <?php $this->load->view('header');?>
  <!--Header End-->
  <?php $this->load->view('top_banner');?>
  <!--Page Content Start-->
  <div id="mid_content">
     <div class="mid_content_top">
      <div class="member_area_top_left">
        <div class="member_area_top_left_image">
        <?php if ($user->image->filename){?>
          <img src="<?php echo base_url(); ?>images/profile_image/short_image/<?php echo $user->image->filename; ?>" alt="profilr-image" />
          <?php }
          else {?>
          <img src="<?php echo base_url(); ?>images/no_image_48.jpg" alt="profilr-image" />
          <?php }?>
          </div>
        <h3><?php echo $user->display_name;?><br />
          <span><?php if ($user->address->city != "") { echo $user->address->city.', '.$user->address->country; }?></span></h3>
        <div class="clear"></div>
      </div>
      <div class="logout_button"><a href="<?php echo base_url(); ?>user/logout/"><img src="<?php echo base_url(); ?>images/logout_button.png" alt="logout" /></a></div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!--Member taber Start-->
    <div id="vtab">
      <ul>
        <li class="home"><a href="<?php echo base_url();?>user/member_profile">PROFILE</a></li>
	<?php if(isset($designers) && in_array($user->id,$designers)){ ?>
	<li class="earning"><a href="<?php echo base_url();?>user/manage_design/viewEarnings">EARNINGS</a></li>
	<li class="my_desigen"><a href="<?php echo base_url();?>user/manage_design/viewProducts">MY PRODUCTS</a></li>
        <li class="my_desigen"><a href="<?php echo base_url();?>user/manage_design/viewDesigns">MY DESIGNS</a></li>
        <li class="add_desigen"><a href="<?php echo base_url();?>user/manage_design/addDesign">ADD DESIGN</a></li>
	<?php } ?>
        <li class="support"><a href="<?php echo base_url();?>/user/member_order">MY ORDERS</a></li>
        <li class="wishlist selected"><a href="<?php echo base_url();?>user/member_wishlist">WISH-LIST</a></li>
        <?php if(isset($new_event)){ ?>
	<li class="support1"><a href="<?php echo base_url();?>new_contest">NEW EVENT!</a></li>
	<?php }  ?>
      </ul>







      <div style="display: block;">
        <div class="tab_mid_box2" style="margin:0px; width:97%; padding-left:20px;" >
          <h3>My wish-list:</h3>
          <div class="wish_list_image_box"  style="margin:0px; width:100%;">
          <?php if(isset($wproducts))
		  {
					$j=0; $is_called_already="no";
          			foreach ($wproducts as $p)
					{ 
						$wishlist_product_type = $my_product_type[$j];
						if(isset($pro_img[$j]))
						{
						?>
            			<div class="wish_list_image_box_left1" id="wish_list_item_<?php echo $p->id;?>" style="width:auto; margin-right:40px; margin-bottom:40px;">
              				<div class="wish_list_image_box_left">
                				<div class="delet_image">
                                	<a href="javascript:void(0);" onclick="delete_wishlist_item('<?php echo $p->id;?>');">
                                    	<img src="<?php echo base_url();?>images/Edit_btn.png" alt="delet-image" />
                                    </a>
                                </div>
                				<div class="wishlist_image">
                                	<a href="<?php echo base_url(); ?>single_product?id=<?php echo $p->id;?>&type=<?php echo $wishlist_product_type; ?>">
                                    	<img src="<?php echo base_url(); ?>images/product_image/feature_image/<?php echo $pro_img[$j]; ?>" alt="wish-list-image" />
                                    </a>
                                </div>
                 				<?php 
									if($p->original_value > 0)
									  { ?>
										<div class="price2_box">
											<?php echo "<del>".$p->original_value.'&pound;'.'</del>'.$p->price.'&pound;'; ?>
										</div>
								<?php } 
									elseif($p->original_value == 0) 
									  { 
										?>
										<div class="price_box">
											<?php  
												//echo $p->price.'&pound;'; 
												if($is_called_already=="no")
												{
													if($pref_currency_type=="USD")
														$product_currency = currency("GBP","USD",$p->price);
													else if($pref_currency_type=="EUR")
														$product_currency = currency("GBP","EUR",$p->price);
													else
														$product_currency = $p->price;
													
													$is_called_already = "yes";
												}
												if($pref_currency_type=="USD")
													echo '$'.$product_currency; 
												else if($pref_currency_type=="EUR")
													echo '&euro;'.$product_currency; 
												else
													echo '&pound;'.$p->price; 
												
												?>
										</div>
								<?php } ?>
              				</div>
              				<h3>IN STOCK</h3>
           				</div>
            			<?php  $j++;
						} 
					} 
		 } 
		 else 
		 { ?>
         <div>
         	<h4>There is no product in your wishlist.</h4>
         </div>
		<?php 
		}
		?>
		<div class="clear"></div>
      </div>
	<div class="clear"></div>
	</div>
	<div class="clear"></div>
	</div>
	</div>
    </div>
    <!--Member taber Start-->
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