
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Tangail-sharee</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>adm/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>adm/css/pro_dropline_ie.css" />
<![endif]-->
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>css/slimbox2.css" />

<!--  jquery core -->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/slimbox2.js" type="text/javascript"></script>

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
<link rel="stylesheet" href="<?php echo base_url(); ?>css/file_style.css" type="text/css" />

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
	 $button='Add New Upcoming Design';
	 $button1='Edit Upcoming Design';
	 $bar='Add Details';
	 $bar1='Edit Details';
?>
<div id="page-heading"><h1>
<?php if (isset($design)){?>
<?php echo $button1.' '; ?>
<?php }else{ ?>
<?php echo $button.' ';} ?></h1>
</div>

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
	<div class='val_error'><?php echo validation_errors(); ?></div><br>
	<?php if(isset($design)){
				echo form_open_multipart("admin/upcoming_designs/saveEditedDesign");?>
				<input type="hidden" value='<?php echo $design->id;?>' name='design_id' />
			<?php }else {
				 echo form_open_multipart("admin/upcoming_designs/saveDesign");} ?>
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td class="table_left">
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-dark-left">
			<?php if (isset($design)){?>
			<?php echo $bar1.' '; ?>
			<?php }else{ ?>
			<?php echo $bar.' ';} ?></div>
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
		
		<tr>
			<th valign="top">Title:</th>
			<td><input type="text" name="title" class="inp-form" value="<?php if (isset($design)){ echo $design->title; }else { echo $this->input->post('title');}?>" /></td>
			<td></td>
		</tr>
        
        
        <tr>
            <td colspan='2'>
            
              <div class='project_image'>
                <?php if (isset($design) && isset($img)){?>
                <input type="hidden" value='<?php echo $img_id;?>' name='file' />
				<a href="<?php echo base_url();?>images/upcoming_images/original_image/<?php echo $img; ?>" rel="lightbox">
			 	<img src="<?php echo base_url();?>images/upcoming_images/thumb_image/<?php echo $img; ?>" alt="" />
			 	<?php }else { ?>
			 	<img src="<?php echo base_url();?>images/no_image_145.jpg" alt="" />
			 	<?php }?>
				<br /><br />
                Upload:
		<br /><br />
		<input type="file" name="design" size="8"/>
			</div>
			
            
            </td>
        </tr> 
	</table>
	<!-- end id-form  -->
	
	</td>
		<td class="table_right"><div class="step-dark-left1"><a href="">Manage Designers</a></div>
	 <div class="clear"></div>
	 <div class="top_class">
	<div class="clear"></div>
	 <div class="right_input">
	 <label>Designer: </label><br/>
	 <select  class="styledselect_form_1" name="user_id">
			<option value="">--Designer--</option>
			<?php 
            		if(isset($design)){
            			
                  		foreach ($designers as $designer){
	            			if ($designer->id==$design->user->id)	
	            				echo "<option value='$designer->id' selected='selected'>".$designer->first_name.' '.$designer->last_name."</option>";	
	            			else 
	            				echo "<option value='$designer->id'>".$designer->first_name.' '.$designer->last_name."</option>";
                  		}
            		}
	            		else{
	            			foreach ($designers as $designer){
		            			echo "<option value='$designer->id'>".$designer->first_name.' '.$designer->last_name."</option>";
		            		}
	            		}
            	?>
		</select>
		<label>Status: </label>
	<select  class="styledselect_form_1" name="status">
			<option value="">-Select Status-</option>
			
			<option value="1" <?php if(isset($design) && $design->status=='1'){ echo "selected='selected'";}?> >Added</option>
			<option value="0" <?php if(isset($design) && $design->status=='0'){ echo "selected='selected'";}?>>Removed</option>
		</select>
	</div>
	<div class="clear"></div>
	<div>
	<div class="button"><input type="submit" class="form-submit" value=""></div>
	<div class="clear"></div>
	
	</div>
	</div>
	</td>
</tr>
<tr>
<td><img src="<?php echo base_url(); ?>adm/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
  <?php echo form_close();?>
<div class="clear"></div>

<div class="comment">
	<h1>Messages</h1>
	<?php if (isset($design)){
		$i=1; foreach ($design->comment as $c){
	?>
	<div class="comment_box">
	<div class="comment_box_left">
	<?php if(isset($pic[$i-1])){ ?>
	<img src="<?php echo base_url(); ?>images/profile_image/short_image/<?php echo $pic[$i-1]; ?>" alt="" />
	<?php } else {?>
	<img alt="comment_image" src="<?php echo base_url(); ?>images/no_image_48.jpg">
            <?php }?>
	<h2><?php echo $uname[$i-1];?></h2></div>
	<div class="comment_box_right">
	 <div class="comment_box_right_time">
	 <?php 
	 	$format = 'DATE_RFC1123';
		$date=explode('+',standard_date($format, $c->date));
		echo $date[0];
	 ?>
	 <br />
	 <br />
	 <a href="<?php echo base_url();?>admin/upcoming_designs/deleteComment/<?php echo $c->id;?>">Delete</a>
	 </div>
	 <div class="comment-text"><?php echo $c->content;?></div>
	</div>
	<div class="clear"></div>
	</div>	
	<div class="clear"></div>
	<?php $i++;}?>
	<?php echo form_open("admin/upcoming_designs/saveComment/".$design->id)?>
	 <textarea name="comment" class="form-textarea2" cols="" rows=""></textarea>
	<div class="button"><input type="submit" value="" class="form-submit2"></div>
	<?php form_close();?>
	<?php }
	else{
	?>
	<textarea name="comment" class="form-textarea2" cols="" rows=""></textarea>
	<div class="button"><input type="submit" value="" class="form-submit2"></div>
	<?php }?>
	<div class="clear"></div>
	</div>
	
	
	<div class="comment2">
	<h1>Subscribors&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id="d_clip_button" value="copy to clipboard" /></h1>
	
	<div class="clear"></div>
	<textarea name="box-content" id="textcontainer" class="text_area" rows="15" cols="39">
		<?php if(isset($emails)){
			foreach($emails as $key=>$value){ ?>
			<?php echo $value; ?>
		<?php  } } ?>
	</textarea>
	<script type="text/javascript" src="<?php echo base_url(); ?>adm/js/jquery/ZeroClipboard.js"></script>
	<script language="JavaScript">
        
		var clip = new ZeroClipboard.Client();
	//	$('#d_clip_button').click(function(){
			var myTextToCopy = $("#textcontainer").val();
			clip.setText( myTextToCopy );
			clip.glue( 'd_clip_button');
			
	//	});
    </script>
	</div>
	

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
<SCRIPT LANGUAGE="JavaScript">



</SCRIPT>
</body>
</html>
