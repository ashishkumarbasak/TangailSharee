<div class="all_number_box2" style="width:220px;">
      
        <?php foreach($colors as $c){ ?>
    
           <a href="<?php echo base_url(); ?>show_product/Pcolor?type=<?php echo $type;?>&color=<?php echo $c->id; ?>">
            <div style="background-color:#<?php echo $c->code; ?>; width:30px; height:25px; float:left;">
             
            </div>
                </a>
            <?php } ?>
</div>