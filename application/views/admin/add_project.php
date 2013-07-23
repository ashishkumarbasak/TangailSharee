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
<link rel="stylesheet" href="<?php echo base_url(); ?>adm/css/datePicker.css" type="text/css" />
<script src="<?php echo base_url(); ?>adm/js/jquery/date.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			/*for(var i in selectedDate){
				alert(i+"    "+selectedDate[i]);
			}*/
			var date=selectedDate.asString();
			$('#start_date').val(date);
			//$('#end_date').val(date);
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});

 $(function()
{

// initialise the "Select date" link
$('#date-pick1')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			/*for(var i in selectedDate){
				alert(i+"    "+selectedDate[i]);
			}*/
			var date=selectedDate.asString();
			$('#end_date').val(date);
			//$('#end_date').val(date);
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
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
	 $button='Add New Project';
	 $button1='Edit Project';
	 $bar='Add Project Details';
	 $bar1='Edit Project Details';
?>
<div id="page-heading"><h1>
<?php if (isset($project)){?>
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
	<?php if(isset($project)){
				echo form_open_multipart("admin/project_manager/saveEditedProject");?>
				<input type="hidden" value='<?php echo $project->id;?>' name='project_id' />
			<?php }else {
				 echo form_open_multipart("admin/project_manager/saveProject");} ?>
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td class="table_left">
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-dark-left">
			<?php if (isset($project)){?>
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
			<td><input type="text" name="title" class="inp-form" value="<?php if (isset($project)){ echo $project->title; } else { echo $this->input->post('title');}?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Description:</th>
			<td><textarea rows="" cols="" class="form-textarea" name="description"><?php if (isset($project)){ echo $project->description;} else { echo $this->input->post('description');}?></textarea></td>
			<td></td>
		</tr>
		 
        
        
        <tr>
	 <?php if (isset($project)){?>
            <td colspan='2'>
		<?php foreach($project->file as $pfile){
			if($pfile->filename) {
			?>
              <div class='project_image'>
			<a href="<?php echo base_url();?>images/project_image/original_image/<?php echo $pfile->filename; ?>" rel="lightbox"> 
			<img src="<?php echo base_url();?>images/project_image/thumb_image/<?php echo $pfile->filename; ?>" alt="" /></a>
			<?php }else { ?>
			<img src="<?php echo base_url();?>images/no_image_145.jpg" alt="" />
			<?php }?>
		</div>
		<?php } ?>	
			<div class="clear"></div>
            
            </td>
	    <?php } ?>
	   
	  
        </tr>
	<tr>
		 <td>
		 Upload:<br /> <br /><input type="file" name="design" size="8"/>
		</td>
	</tr>
		<tr>
			<th valign="top">Date Added:</th>
			<td><input type="text" class="inp-form" name="date_added"  id='start_date' value="<?php if (isset($project)){ echo $project->date_added;} else { echo $this->input->post('date_added');}?>" />
            	<a href=""  id="date-pick"><img src="<?php echo base_url();?>adm/images/forms/icon_calendar.jpg"   alt="" /></a>
            </td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Date Accepted:</th>
			<td><input type="text" class="inp-form" name="date_accept" id='end_date' value="<?php if (isset($project)){ echo $project->date_accept; } else { echo $this->input->post('date_accept');}?>" />
			<a href=""  id="date-pick1"><img src="<?php echo base_url();?>adm/images/forms/icon_calendar.jpg"   alt="" /></a>
            </td>
			<td></td>
			<td></td>
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
            		if(isset($project)){
            			
                  		foreach ($designers as $designer){
	            			if ($designer->id==$project->user->id)	
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
			
			<option value="In progress" <?php if(isset($project) && $project->status=="In progress"){ echo "selected='selected'";}?> >In Progress</option>
			<option value="Accepted" <?php if(isset($project) && $project->status=="Accepted"){ echo "selected='selected'";}?>>Accepted</option>
			<option value="Declined" <?php if(isset($project) && $project->status=="Declined"){ echo "selected='selected'";}?>>Declined</option>
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
	<?php if (isset($project)){
		$i=1; foreach ($project->comment as $c){
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
	 <a href="<?php echo base_url();?>admin/project_manager/deleteComment/<?php echo $c->id;?>">Delete</a>
	 </div>
	 <div class="comment-text"><?php echo $c->content;?></div>
	</div>
	<div class="clear"></div>
	</div>	
	<div class="clear"></div>
	<?php $i++;}?>
	<?php echo form_open("admin/project_manager/saveComment/".$project->id)?>
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
