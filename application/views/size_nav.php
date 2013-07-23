<div class="all_number_box">
        <ul>
        	<li <?php if(!isset($selected_size)){ ?>class="selsct_active" <?php } ?>><a href='<?php echo base_url(); ?>show_product?type=<?php echo $type;?>'>All</a></li>
        <?php
	
	foreach($sizes as $size){
		?>
	        <?php if(isset($selected_size) && $size->id==$selected_size){ ?>
	        <li class="selsct_active" ><a href='<?php echo base_url(); ?>show_product/size?type=<?php echo $type;?>&size=<?php echo $size->id; ?>'><?php echo $size->name; ?></a></li>
	        <?php }else{ ?>
	        <li><a href='<?php echo base_url(); ?>show_product/size?type=<?php echo $type;?>&size=<?php echo $size->id; ?>'><?php echo $size->name; ?></a></li>
	        <?php }?>
        <?php }?>
         <?php foreach($colors as $c){ 
        
			if ($c->code == "000000") {
			
        ?>
    		
           <li <?php if(isset($pcolor) && $pcolor == "1"){ ?> class="selsct_active" <?php } ?>><a style="width:50px;" href="<?php echo base_url(); ?>show_product/Pcolor?type=<?php echo $type;?>&color=<?php echo $c->id; ?>">BLACK</a></li>
            
        <?php } else { ?>
        	
        	<li  <?php if(isset($pcolor) && $pcolor == "2"){ ?> class="selsct_active" <?php } ?>><a style="width:50px;" href="<?php echo base_url(); ?>show_product/Pcolor?type=<?php echo $type;?>&color=<?php echo $c->id; ?>">WHITE</a></li>
        	
        <?php } 
        }
        ?>
        </ul>
       
</div>