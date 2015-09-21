 <div class="mid_content_top">
      <?php $this->load->view('my_pagination');?>
      
       		<div class="mid_content_top_left" style="margin-top:8px;">
         		<ul>
          			<li <?php if(isset($new)){ echo "class='mid_active'"; } ?>><a href="<?php echo base_url();?>show_product/getNewProducts?type=<?php echo $type; ?>">New</a></li>
          			<li <?php if(isset($popular)){ echo "class='mid_active'"; } ?>><a href="<?php echo base_url();?>show_product/getPopularProducts?type=<?php echo $type; ?>">Popular</a></li>
	  				<!--<li <?php if(isset($sale)){ echo "class='mid_active'"; } ?>><a href="<?php echo base_url();?>show_product/getSaleProducts?type=<?php echo $type; ?>">Sale</a></li>-->
        		</ul>
      		</div>
      		
      		<div class="mid_content_top_right" style="width:196px; margin-top:7px; position: relative; right: -8px;">
        <!-- <p class="facebook_suggestion"><a href="https://facebook.com/tangail-sharee.com"><strong>tangail-sharee</strong> on Facebook</a></p> //-->

          <div style="width: 230px; position: absolute; left: 103px;">
          	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=203991176319853";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="http://www.facebook.com/tangail-sharee.com" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-font="lucida grande"></div>
          </div>
            
            
        <div class="clear"></div>
    </div>
     	
        	<div class="filter_box">
      			<?php //$this->load->view('size_nav',$type);?>
                <div class="clear"></div>
            </div>
        

     	
    <div class="clear"></div>
     <?php if(isset($prods)){ ?>
     <div class="update_error">No Product available for this color.</div>
     <?php } ?>
    <!--Product Image  Start-->
    <div class="image_gallery">
    
    <?php $i=1; $is_called_already="no"; foreach($products as $product){ 
    	 //if($product->stock){
    	 ?>
        <div class="<?php if($i%4==0){ echo "product_image_box2";}else{echo "product_image_box";}$i++; ?>">
        <?php if($this->session->userdata("login")){ ?>
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
                            $('#star_<?php echo $product->id;?> a').click(function(){addToWishlist("<?php echo $product->id; ?>","<?php echo $product->file->join_type; ?>")});
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
         <?php }else{ ?>
         			<div class="star" id='star_<?php echo $product->id; ?>'>
                    	<a href="javascript:void(0);" class="load_popup_login">
                    		<img src='<?php echo base_url();?>images/star.png' />
                    	</a>
                	</div>
                    <script type="text/javascript">
						$(document).ready(function(){	
							$(".load_popup_login").colorbox({transition:"none", width:"580px", inline:true, height:"auto", href:"#inline_example1"});
							$('#star_<?php echo $product->id;?> a').hover(
								function(){
									$('#add_wish_<?php echo $product->id; ?>').show();
								},
								function(){
									$('#add_wish_<?php echo $product->id; ?>').hide();
								});
						})
					</script>
         <?php } ?>
        
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
        <a href="<?php echo base_url();?>single_product?id=<?php echo $product->id;?>&type=<?php echo $type;?>">
        
        <img src="<?php echo base_url(); ?>images/product_image/list_image/<?php echo $product->file->filename; ?>" alt="<?php echo $product->name;?>" /></a>
        <?php 
    	}else {?>
        	<a href="#">
        	 <img src="<?php echo base_url(); ?>images/236X292.jpg" alt="" /></a>
        	 <?php }
        	}?>
        </div>
        
        <div class="title">
          <h2><a href="<?php echo base_url();?>single_product?id=<?php echo $product->id;?>"><?php echo $product->name;?></a></h2>
          <p><a href="<?php echo base_url(); ?>profile/index/<?php echo $product->user->id; ?>">By <?php echo $product->user->first_name.' '.$product->user->last_name; ?></a></p>
        </div>
       <?php if($product->original_value > 0){ ?>
        <div class="price2_box">
	
            <?php  
	
			                                //if($is_called_already=="no")
                                        	{
                                            	if($pref_currency_type=="USD")
                                                	{
                                                	$orginal_price_value = currency("GBP","USD",$product->original_value);
                                                	$product_currency_sale = currency("GBP","USD",$product->price);
                                                	}
                                            	else if($pref_currency_type=="EUR")
                                                	{
                                                		$orginal_price_value = currency("GBP","EUR",$product->original_value);
                                                		$product_currency_sale = currency("GBP","EUR",$product->price);
                                                	}
                                            	else
                                                	{
                                                		$orginal_price_value = $product->original_value;
                                                		$product_currency_sale = $product->price;	
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
            <?php if($product->id=="7" || $product->id=="5" || $product->id=="8" || $product->id=="2") 
                                        	//echo " REPRINT" ?>
        
        </div>
	<?php } elseif($product->original_value == 0) { ?>
	<div class="price_box">
	<?php  
        
        //echo '&pound;'.$product->price; 
                                        if($is_called_already=="no")
                                        {
                                            if($pref_currency_type=="USD")
                                                $product_currency = currency("GBP","USD",$product->price);
                                            else if($pref_currency_type=="EUR")
                                                $product_currency = currency("GBP","EUR",$product->price);
                                            else
                                                $product_currency = $product->price;
                                            
                                            $is_called_already = "yes";
                                        }
                                            if($pref_currency_type=="USD")
                                                echo '$'.$product_currency; 
                                            else if($pref_currency_type=="EUR")
                                                echo '&euro;'.$product_currency; 
                                            else
                                                echo '&pound;'.$product->price;                                
        
        
        ?><?php if($product->id=="7" || $product->id=="5" || $product->id=="8" || $product->id=="2") 
                                        	//echo " REPRINT" ?>
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

	 <?php $this->load->view('my_pagination');?>
    <!--Page Navi End-->
    <div class="shop_box2">
      <ul>
	<?php if($type=='man'){ ?>
        <li class="shop_inactive"><a href="<?php echo base_url(); ?>show_product?type=woman">SHOP WOMEN</a></li>
	<?php } elseif($type=='woman') {?>
	<!-- <li class="shop_inactive"><a href="<?php echo base_url(); ?>show_product?type=man">SHOP MEN</a></li> //-->
	<?php }else { ?>
	<!-- <li class="shop_inactive"><a href="<?php echo base_url(); ?>show_product?type=man">SHOP MEN</a></li> //-->
        <li class="shop_inactive"><a href="<?php echo base_url(); ?>show_product?type=woman">SHOP WOMEN</a></li>
	<?php } ?>
      </ul>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
