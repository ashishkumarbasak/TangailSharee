<div class="empty_cart"><img src="<?php echo base_url(); ?>images/empty_cart.png" alt="empty cart" /></div>
<?php 
if($this->cart->total_items() > 0){ ?>
<div class="empty_cart"><img src="<?php echo base_url(); ?>images/empty_cart.png" alt="empty cart" /></div>
<div class="green_image"><?php echo $this->cart->total_items();?></div>
<?php }?>
      <div class="touch">
        <div class="container" >

		<h2 class="trigger"><a href="javascript:void(0);">View Cart</a></h2>
          <div style="display: none;" class="toggle_container">
            <?php $cartitem = $this->cart->contents(); 
            if (count($cartitem)>0){?>
            <div class="block">
             
             
             <?php $total_amount=0; foreach ($this->cart->contents() as $items){?>
			  
                            <?php $options=$this->cart->product_options($items['rowid']); ?>
                            <div class="Product_detail_box">
                            <div class="Product_detail_image"><?php if($options['image']!=null){?><a href='<?php echo base_url(); ?>single_product?type=<?php echo $options['type'];?>&id=<?php echo $items['id'];?>'><img src="<?php echo base_url(); ?>images/product_image/short_image/<?php echo $options['image']; ?>" alt="shirt" /></a> <?php } ?></div>
                            <div class="Product_detail_box_right">
                            <h2><a href='<?php echo base_url(); ?>single_product?type=<?php echo $options['type'];?>&id=<?php echo $items['id'];?>'><?php echo $items['name'];?></a><span><br />Size: <?php echo $options['size']; ?><br />Qty: <?php echo $items['qty'];?><br />
                            <?php 
                            
                                                if($pref_currency_type=="USD")
                                                {
                                                   	$converted_item_price = currency("GBP","USD",($items['price']));
												    $product_currency = $converted_item_price*$items['qty'];
                                                    echo ($product_currency).'$';
													$total_amount+=$product_currency;
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    $converted_item_price = currency("GBP","EUR",($items['price']));
													$product_currency = $converted_item_price*$items['qty'];
                                                    echo ($product_currency).'&euro;';
													$total_amount+=$product_currency;
                                                }
                                                else
                                                {
                                                    echo ($items['price']*$items['qty']).'&pound;';
													$total_amount+=($items['price']*$items['qty']);
                                                }
                                                
                             ?>
                                
                                
                                </span></h2>
                            <div class="Product_detail_box_right_image" ><a href='#' id="delete_item_<?php echo $items['rowid']; ?>" ><img src="<?php echo base_url(); ?>images/Edit_btn.png" alt="delete"/></a></div>
                            <script>
                            $(document).ready(function(){
					$.ajaxSetup({ cache: false });     
					var ajax_load = '<div class=\"loading\"><img src=\"<?php echo base_url();?>img/fb_large_loading.gif\" /></div>';
					$("#delete_item_<?php echo $items['rowid']; ?>").click(function(){
				    	var loadUrl ='<?php echo base_url();?>cart/deleteItem/<?php echo $items['rowid'];?>';
				    	$("#cart_container").load(loadUrl,cart_refresh);
						return false;
				    });
			   });
			   </script>
			   
			   
			  <div class="clear"></div>
			  </div>
			  <div class="clear"></div>
			 </div>
			 
			 
			 <?php } ?>
			  
             <h4>
                 Total:  <?php 
                 //echo $this->cart->total().'&pound;';
                                                if($pref_currency_type=="USD")
                                                {
                                                    //$product_total = currency("GBP","USD",$this->cart->total());
                                                    //echo ($product_total).'$';
													echo ($total_amount).'$';
                                                }
                                                else if($pref_currency_type=="EUR")
                                                {   
                                                    //$product_total = currency("GBP","EUR",$this->cart->total());
                                                    //echo ($product_total).'&euro;';
													echo ($total_amount).'&euro;';
                                                }
                                                else
                                                {
                                                    //echo $this->cart->total().'&pound;';
													echo $total_amount.'&pound;';
                                                }
                 
                 ?>
             
             
             </h4>
			 <div class="cart_page_button"><a href="<?php echo base_url();?>cart/viewCart"></a></div>
			<?php if($this->session->userdata("login")){ ?> 
				<div class="view_cart_check_out_button"><a href="<?php echo base_url();?>cart/checkout"></a></div>
			<?php } else { ?>
						<div class="view_cart_check_out_button"><a href="<?php echo base_url();?>cart/checkout"></a></div>
			<?php } ?>
			<div class="clear"></div>
			</div>
			<?php }else{?>
			<div class="Product_detail_box">
				<h2 style="font-size: 14px; color: #888;">Your cart is empty</h2>
          	</div>
          <?php }?>
          </div>
          </div>
          
 <script>
 $(document).ready(function(){
	$(document).click(function(){
		$(".toggle_container").hide();
	 });
	$("#cart_container").click(function(e) {
     	e.stopPropagation();
	});
 });
</script>
<?php 
if($this->cart->total_items() == 0){ ?>
	 <script>
	 $(document).ready(function(){
	 	
		$("h2.trigger a").click(function(){
			return false;
		});
		$("h2.trigger a").hover(function(){
			$(".empty_cart").show();
		},function(){
			$(".empty_cart").hide();
		});
		

 });
 </script>
<?php } ?>