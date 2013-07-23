 <h1 class="order_summary_box">ORDER SUMMARY<span><a href="<?php echo base_url();?>cart/viewCart">(edit)</a></span></h1>
                <div class="shipping_box_items">Items</div>
				<?php $total = 0;
				foreach ($this->cart->contents() as $items){
					$options=$this->cart->product_options($items['rowid']);
				?>
				<div class="order_summary_box2">
				<div style="float:left"><?php echo $items['name'];?><br />
				<small><?php echo $items['qty'];?> X <?php echo $options['size'];?></small> </div>
				<div style="float:right">$<?php echo ($items['price']*$items['qty']); $total=$total+($items['price']*$items['qty']);?></div>
				<div class="clear"></div>
				</div>
				<?php }?>
                <div class="clear" style="height:10px;"></div>
                <div class="shipping_box_items">Shipping &amp; Taxes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $shipping->price; $total += $shipping->price;?></div>
                <div class="order_summary_box2">
                  <div style="float:left"><small>(To be updated) </small> </div>
                  <div style="float:right"><small>----</small></div>
                  <div class="clear"></div>
                </div>
                <div class="order_summary_box3">
                  <div style="float:left">TOTAL </div>
                  <div style="float:right"> $<?php echo $total;?></div>
                  <div class="clear"></div>
                </div>
                <div class="clear"></div>