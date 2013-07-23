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
<link rel="stylesheet" href="<?php echo base_url(); ?>css/file_style.css" type="text/css" />
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


<!--  date picker script -->
<link rel="stylesheet" href="<?php echo base_url(); ?>adm/css/datePicker.css" type="text/css" />
<script src="<?php echo base_url(); ?>adm/js/jquery/date.js" type="text/javascript"></script>

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

<div id="page-heading"><h1>Banners</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="<?php echo base_url();?>adm/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="<?php echo base_url();?>adm/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	 <?php 
        if (isset($excep)){ ?>
        <tr>
        	<td>
        		<div class='upload_error'><h4><?php echo 'Error: <br /><br />'.$excep->getMessage();?></h4></div><br />
        	</td>
        </tr>
         <?php }?>
	<tr valign="top">
	<td class="table_left">
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<?php echo form_open_multipart("admin/setting_manager/saveBanner"); 
		?>
		
		    <tr>
		    	<td width='195px'><h4>Homepage top banner</h4></td>
		    	<td colspan='2'>
             <div class='_image'>
	  		<input type="file" name="banner_1" />
			</div>
			</td>
			<td style="padding:5px 0 0 23px;"><h3>Upload</h3></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><a href="<?php echo base_url();?>admin/setting_manager/bannerImages/1"><div class="step-dark-left">View Images</div></a></td>
		    </tr>
		   <tr>
			<td>(Width:960px, No maximum height)</td>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name='rotate'  value="1"/>&nbsp;Rotate</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Add Url:</th>
			<td><input type="text" name='url' class="inp-form" value="<?php if(isset($url[0])) { echo $url[0]; } ?>"/></td>
			<td></td>
		</tr>

	<tr>
		<td valign="top">
			<input type="submit" value="" class="form-submit" />
		</td>
		
	</tr>
	<div class="clear"></div>
	 <?php  echo form_close();?>
	 
	 <?php echo form_open_multipart("admin/setting_manager/saveBanner"); 
		?>
		
		    <tr>
		    	<td width='195px'><h4>All pages top banner</h4></td>
		    	<td colspan='2'>
             <div class='_image'>
			<input type="file" name="banner_2" />
			</div>
			</td>
			<td style="padding:5px 0 0 23px;"><h3>Upload</h3></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><a href="<?php echo base_url();?>admin/setting_manager/bannerImages/2"><div class="step-dark-left">View Images</div></a></td>
		    </tr>
		    <tr>
			<td>(Width:960px, Height: 100px)</td>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name='rotate'  value="1"/>&nbsp;Rotate</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Add Url:</th>
			<td><input type="text" name='url' class="inp-form" value="<?php if(isset($url[1])) { echo $url[1]; } ?>"/></td>
			<td></td>
		</tr>

	<tr>
		<td valign="top">
			<input type="submit" value="" class="form-submit" />
		</td>
		
	</tr>
	<div class="clear"></div>
	 <?php   echo form_close();?>
	 
	 <div class="clear"></div>
	 <div class="clear"></div>
	  
	 <?php echo form_open_multipart("admin/setting_manager/saveBanner"); 
		?>
		
		    <tr>
		    	<td width='195px'><h4>Single page bottom-right banner</h4></td>
		    	<td colspan='2'>
             <div class='_image'>
	  	<input type="file" name="banner_3" />
	  	</div>
			</td>
			<td style="padding:5px 0 0 23px;"><h3>Upload</h3></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><a href="<?php echo base_url();?>admin/setting_manager/bannerImages/3"><div class="step-dark-left">View Images</div></a></td>
		    </tr>
		  <tr>
			<td>(Width:300px, Height: 200px)</td>
			<td></td>
		</tr>
		<tr>
			<td><input type="checkbox" name='rotate'  value="1"/>&nbsp;Rotate</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Add Url:</th>
			<td><input type="text" name='url' class="inp-form" value="<?php if(isset($url[2])) { echo $url[2]; } ?>"/></td>
			<td></td>
		</tr>

	<tr>
		<td valign="top">
			<input type="submit" value="" class="form-submit" />
		</td>
		
	</tr>
	<div class="clear"></div>
	 <?php echo form_close();?>
	</table>
	<!-- end id-form  -->
	
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