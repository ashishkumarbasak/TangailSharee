<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Tangail-sharee</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>adm/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/file_style.css" type="text/css" />

<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>adm/css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="<?php echo base_url(); ?>adm/js/jquery/ui.core.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>adm/js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.bind.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<!-- [if !IE 7] -->

<!--  styled select box script version 1 -->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<!--  [endif]-->

<!--  styled select box script version 2 --> 
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "<?php echo base_url(); ?>adm/images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="<?php echo base_url(); ?>adm/js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 

<?php $this->load->view("admin/header"); ?>

<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">

<?php $this->load->view('admin/message'); ?>

<?php
	 $button='Add Product';
	 $button1='Edit Product';
	 $bar='Add Product Details';
	 $bar1='Edit Product Details';
?>
<div id="page-heading"><h1>
<?php if (isset($product)){?>
<?php echo $button1.' '; ?>
<?php }else{ ?>
<?php echo $button.' ';} ?></h1>
</div>

 <!--Member taber Start-->
    <div id="vtab">
      <ul>
        <?php if (isset($product)){?>
        <li class="home selected"><a href="<?php echo base_url();?>admin/product_manager/editProduct/<?php echo $product->id;?>">GENERAL</a></li>
        <li class="home "><a href="<?php echo base_url();?>admin/product_manager/stockManager/<?php echo $product->id;?>">DATA</a></li>
        <li class="home "><a href="<?php echo base_url();?>admin/product_manager/imageManager/<?php echo $product->id;?>">IMAGES</a></li>
        <li class="home"><a href="<?php echo base_url();?>admin/product_manager/rewardPointsManager/<?php echo $product->id;?>">REWARD POINTS</a></li>
        <?php }else{  ?>
         <li class="home selected"><a href="<?php echo base_url();?>admin/product_manager/addProduct">GENERAL</a></li>
        <li >DATA</li>
        <li >IMAGES</li>
        <li >DISCOUNTS</li>
        <li >REWARD POINTS</li>
        <?php }?>
      </ul>
      <div style="display: block;">
      
        
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="<?php echo base_url(); ?>adm/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="<?php echo base_url(); ?>adm/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
		<!--  start step-holder -->
		
		<!-- start id-form -->
		<?php echo form_open_multipart("admin/product_manager/saveProduct"); ?>
			<?php if(isset($product)){?>
				<input type="hidden" value='<?php echo $product->id;?>' name='product_id' />
				<input type="hidden" value='<?php echo $product->man_image->id;?>' name='man_image_id' />
				<input type="hidden" value='<?php echo $product->woman_image->id;?>' name='woman_image_id' />
			<?php }?>
		
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form" style="float:left">
		<tr>
			<th valign="top">Product Name:</th>
			<td><input type="text" name="name" class="inp-form" value="<?php if(isset($product)){ echo $product->name;} else  echo $this->input->post('name');?>" /></td>
			<td></td>
		</tr>
		<tr>
		<th valign="top">Designer:</th>
		<td>	
		<select  class="styledselect_form_1" name="user_id">
			<option value="">--Designers--</option>
			<?php 
            		if(isset($product)){
	            		foreach ($users as $user){
	            			if($user->id==$product->user->id)
	            				echo "<option value='$user->id' selected='selected'>$user->first_name $user->last_name</option>";
            				else
            					echo "<option value='$user->id'>$user->first_name $user->last_name</option>";
	            		}
            		}else{
            			foreach ($users as $user){
	            			echo "<option value='$user->id'>$user->first_name $user->last_name</option>";
	            		}
            		}
            	?>
		</select>
		</td>
		<td></td>
		</tr>
		
		<tr>
		<th valign="top">Color:</th>
		<td>	
		<select  class="styledselect_form_1" name="color_id">
			<option value="">--Colors--</option>
			<?php 
            		if(isset($product)){
	            		foreach ($colors as $color){
	            			if($color->id==$product->color_id)
	            				echo "<option value='$color->id' selected='selected'>$color->name</option>";
            				else
            					echo "<option value='$color->id'>$color->name</option>";
	            		}
            		}else{
            			foreach ($colors as $color){
	            			echo "<option value='$color->id'>$color->name</option>";
	            		}
            		}
            	?>
		</select>
		</td>
		<td></td>
		</tr>
		
		<tr>
			<th valign="top">Meta Tags:</th>
			<td><textarea rows="3" cols="26" class="" name="meta_tag"><?php if(isset($product)){ echo $product->meta_tags;} else  echo $this->input->post('meta_tag');?></textarea></td>
			<td></td>
		</tr>
		<?php if(isset($product)) { ?>
		<tr>
			<th valign="top">Current Price:</th>
	 		<td><h3><?php echo $product->price.'&pound;';?></h3></td>	 	
			
			<td></td>
		</tr>
		<tr>
			<th valign="top">Original Price:</th>
	 		<td><h3><?php echo $product->original_value.'&pound;';?></h3></td>	 
			<td></td>
		</tr>
		<?php } ?>
		<tr>
			<th valign="top">Product Info:</th>
			<td><textarea rows="3" cols="26" class="" name="product_info"><?php if(isset($product)){ echo $product->product_info;} else  echo $this->input->post('product_info');?></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Size Info:</th>
			<td><textarea rows="3" cols="26"  name="size_info"><?php if(isset($product)){ echo $product->size_info;} else  echo $this->input->post('product_info');?></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Delivery Info:</th>
			<td><textarea rows="3" cols="26" class="" name="delivery_info"><?php if(isset($product)){ echo $product->delivery_info;} else  echo $this->input->post('delivery_info');?></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Tags:</th>
			<td><textarea rows="3" cols="26"  name="tag"><?php if(isset($product)){ echo $product->tag;} else  echo $this->input->post('tag');?></textarea></td>
			<td></td>
		</tr>

		 <tr>
			<th valign="top">Available for:</th>
			<td>
                            <div style='float:left; margin-right: 30px;'>Men<input type="checkbox" class="inp-form" name="for_man" value="1" <?php if(isset($product) && $product->for_man=='1'){ echo "checked='checked'";} ?> /></div>
                            <div style='float:left;'>Women<input type="checkbox" class="inp-form" name="for_woman" value="1" <?php if(isset($product) && $product->for_woman=='1'){ echo "checked='checked'";} ?> /></div>
                        </td>
			<td></td>
		</tr>
		<!--<tr>
			<th>Upload Image(Men):</th>
			<td><input type="file" class="file_1" name="man_image" />
                        </td>
			<td><div class="bubble-left"></div>
			<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
			<div class="bubble-right"></div>
			</td>
                       
		</tr>
                 <tr>
                     <th></th>
                     <td calspan="2"><?php if(isset($product)){ echo "<img src='".base_url().$product->man_image->filepath."' />"; } ?></td>
		</tr>
		<tr>
			<th>Upload Image(Women):</th>
			<td><input type="file" name="woman_image" class="file_1"/>
                        </td>
			<td><div class="bubble-left"></div>
			<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
			<div class="bubble-right"></div>
			</td>
		</tr>
		<tr>
                    <th></th>
                     <td calspan="2"><?php if(isset($product)){ echo "<img src='".base_url().$product->woman_image->filepath."' />"; } ?></td>
		</tr>-->
                
                
	
	<!-- <tr>
		<th valign="top">Description:</th>
		<td><textarea rows="" cols="" class="form-textarea"></textarea></td>
		<td></td>
	</tr> -->

	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="" class="form-submit" />
			<input type="reset" value="" class="form-reset"  />
		</td>
		<td></td>
	</tr>
	 
	</table>
        <div class="test" style=" float: right; width: 404px;">
                <h2>Featured Image:</h2><br />
	  				<input type="file" name="productfile" value="productfile"/>
                <br /><br />
                <div><br />
                <?php if (isset($product)){
			if(isset($fimg[$product->id])) { ?>
		<img src="<?php echo base_url(); ?>images/product_image/feature_image/<?php echo $fimg[$product->id]; ?>"  alt="" />
		<?php } else {?>
          <img src="<?php echo base_url(); ?>images/no_image_145.jpg" alt="profilr-image" />
          <?php }
	  }  else {?>
	  <img src="<?php echo base_url(); ?>images/no_image_145.jpg" alt="profilr-image" />
          <?php } ?>
        </div>
  </div>
        
        <?php echo form_close();?>
	<!-- end id-form  -->

	</td>
	<td>
</td>
</tr>
<tr>
<td><img src="<?php echo base_url(); ?>adm/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>
        
        
        
      </div>
    </div>
    <!--Member taber Start-->
<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>


<?php $this->load->view('admin/footer'); ?>

</body>
</html>


