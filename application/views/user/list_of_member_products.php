<div class="item_box2">
 <?php $this->load->view('pagination');?>
<?php if(count($products->all)!=0){ ?>
            <table width="775px" cellspacing="0" cellpadding="0" border="0" class="top_font2" style="padding-top:40px; margin-bottom:20px;">
              <tbody>
                <tr class="font_size">
                  <td style="width: 131px; padding: 0pt 0pt 0pt 10px;">ITEMS</td>
                  <td style="width: 125px;">ON SALE FROM</td>
                  <td style="width: 125px; text-align:center;">PRICE</td>
                  <td style="width: 140px;">SALES</td>
                  
                  <td style="width: 125px;">REVENUE</td>
                  <td style="width: 80px;">STATUS</td>
                </tr>
                <?php foreach($products as $product){
				
			
			?>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                    <?php if($product->file->filename) { ?>
                  <td style="width:131px;"><div class="item_image3"><a href="<?php echo base_url(); ?>single_product?id=<?php echo $product->id; ?>"><img alt="item_image" src="<?php echo base_url(); ?>images/product_image/front_image/<?php echo $product->file->filename; ?>"></a></div></td>
                  <?php } else { ?>
		  <td style="width:131px;"><div class="item_image3"><img alt="item_image" src="<?php echo base_url(); ?>images/101X118.jpg"></div></td>
                  <?php } ?>
                  <td style="width: 125px; padding:0 0 0 13px"><?php  if($product->date_added!=''){ echo date('d/m/Y',$product->date_added); }?></td>
                  <td style="width: 140px; text-align:center;"><?php echo $product->price.'&pound;'; ?></td>
                  <td style="width: 125px; padding:0 0 0 10px;"><?php echo $product->sold; //echo $stock[$product->id]; ?></td>
                  <td style="padding:0 0 0 10px;"><?php echo ($product->price*$product->sold)*($revenue/100).'&pound;'; //echo ($product->price*$stock[$product->id])*($revenue/100).'&pound;'; ?></td>
                  <td style="color:#1b7c08;"><?php if($stock[$product->id] > 0){ echo "On Sale"; } else { echo "Out of stock"; }?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
	    <?php } else { ?>
	    <h2>No Record Found </h2><?php }?>
<div class="clear"></div>
          <!--Page Navi Start-->
		 	<?php $this->load->view('pagination');?>
</div>