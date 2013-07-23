<?php if (isset($bottom_banner)){?>
<!--<a href="<?php if(isset($bottom_banner->url)){ echo $bottom_banner->url; } else { "#"; }?>">-->
<div class="single_product-imagebox_banner"><img src="<?php echo base_url();?>images/banner_images/<?php echo $bottom_banner->file->filename;?>" alt="banner" /></div>
<!--</a>-->
<?php }?>
