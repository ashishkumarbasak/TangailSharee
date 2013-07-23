<?php if ($this->uri->segment($this->uri->total_segments())=='home'){ ?>
<?php if(isset($new_event)){ ?>
<?php if(isset($banners->url)){ ?>
<div id="top_banner">
<a href="<?php echo $banners->url; ?>">
<img src="<?php echo base_url(); ?>images/banner_images/<?php echo $banners->file->filename;?>" alt="" />
</a>
</div>
<?php } ?>
<?php } else { ?>
<div id="top_banner">
<img src="<?php echo base_url(); ?>images/banner_images/<?php echo $banners->file->filename;?>" alt="" />
</div>
<?php } ?>

<?php } else {?>
<?php if(isset($banners->url)){ ?>
<div id="top_banner">
<a href="<?php echo $banners->url; ?>">
<img src="<?php echo base_url(); ?>images/banner_images/<?php echo $banners->file->filename;?>" alt="" />
</a>
</div>
<?php }?><?php }?>

