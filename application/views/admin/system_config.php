<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Tangail-sharee</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>adm/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>adm/css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
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


<div id="page-heading"><h1>GENERAL</h1></div>


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
		<div id="step-holder">
			<div class="step-dark-left"><a href="">Update</a></div>
			<!-- <div class="step-dark-right">&nbsp;</div>
			<div class="step-no-off">2</div>
			<div class="step-light-left">Select related products</div>
			<div class="step-light-right">&nbsp;</div>
			<div class="step-no-off">3</div>
			<div class="step-light-left">Preview</div>
			<div class="step-light-round">&nbsp;</div>
			<div class="clear"></div> -->
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<?php echo form_open("admin/system_manager/saveSetting","id='mainform'"); ?>
			<?php if(isset($system)){?>
				<input type="hidden" value='<?php echo $system->id;?>' name='system_id' />
			<?php }?>
			<tr>
			<th valign="top">Website Name:</th>
			<td><input type="text" name="website_name" class="inp-form" value="<?php if ($system->is_active==1){echo $system->website_name;} ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Email:</th>
			<td><input type="text" class="inp-form" name="site_email" value="<?php if ($system->is_active==1){echo $system->site_email;} ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Meta Description:</th>
			<td><textarea rows="" cols="" class="form-textarea" name="meta_desc"><?php if ($system->is_active==1){echo $system->meta_desc;} ?></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Keywords:</th>
			<td><textarea rows="" cols="" class="form-textarea" name="keywords"><?php if ($system->is_active==1){echo $system->keywords;} ?></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Address:</th>
			<td><textarea rows="" cols="" class="form-textarea" name="address"><?php if ($system->is_active==1){echo $system->address;} ?></textarea></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Telephone:</th>
			<td><input type="text" class="inp-form" name="telephone" value="<?php if ($system->is_active==1){echo $system->telephone;} ?>" /></td>
			<?php echo form_error('telephone', '<td class="update_error">', '</td>'); ?>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Revenue(in %):</th>
			<td><input type="text" class="inp-form" name="revenue" value="<?php if ($system->is_active==1){echo $system->revenue;} ?>" /></td>
			<?php echo form_error('revenue', '<td class="update_error">', '</td>'); ?>
			<td></td>
		</tr>		
		
	
	<!-- <tr>
		<th valign="top">Description:</th>
		<td><textarea rows="" cols="" class="form-textarea"></textarea></td>
		<td></td>
	</tr> -->

	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="Update" class="form-submit" />
		</td>
		<td></td>
	</tr>
	 <?php echo form_close();?>
	</table>
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


