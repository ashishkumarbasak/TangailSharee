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
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.ui.core.js"></script>
	<!--<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.ui.position.js"></script>
	<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.ui.menu.js"></script>
	<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.ui.autocomplete.js"></script>-->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.autocomplete-min.js" type="text/javascript"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>-
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery-ui-1.8.17.custom.min.js" type="text/javascript"></script>-->


<!--  checkbox styling script -->
<!--<script src="<?php echo base_url(); ?>adm/js/jquery/ui.core.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>adm/js/jquery/ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.bind.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.autocomplete-min.js" type="text/javascript"></script>-->


<!-- Custom jquery scripts -->
<script src="<?php echo base_url(); ?>adm/js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<!--<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.dimensions.js" type="text/javascript"></script>-->
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
<!--  date picker script -->
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

<!--<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>-->
	
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

<?php $this->load->view("admin/message"); ?>

<div id="page-heading"><h1>Advance Search</h1></div>

<!--Member taber Start-->
    <div id="vtab">
      <ul>
        <li class="home "><a href="<?php echo base_url();?>admin/report_manager/reward_report">Reward Points</a></li>
        <li class="home selected"><a href="<?php echo base_url();?>admin/report_manager/search_reward">Advance Search</a></li>
        </ul>
      <div style="display: block;">
		
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
	<tr valign="top">
	<td>
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
			<tr>
		<td colspan=4><div class='val_error'>	<?php echo validation_errors(); ?></div></td>
	</tr>
		<?php echo form_open("admin/report_manager/search_reward"); ?>
		<tr>
			<th valign="top">Start Date:</th>
			<td><input type="text" class="inp-form" name="start_date"  id='start_date' value="<?php if(isset($contest)){ echo $contest->start_date;} ?>" />
            	<a href="#"  id="date-pick"><img src="<?php echo base_url();?>adm/images/forms/icon_calendar.jpg"   alt="" /></a>
            </td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">End Date:</th>
			<td><input type="text" class="inp-form" name="end_date" id='end_date' value="<?php if(isset($contest)){ echo $contest->end_date;} ?>" />
			<a href="#"  id="date-pick1"><img src="<?php echo base_url();?>adm/images/forms/icon_calendar.jpg"   alt="" /></a>
            </td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Group By</th>
			<td>
				<select  id="filter_status" name="group">
						<option value="week">Week</option>
						<option value="month">Month</option>
						<option value="year">Year</option>
				</select>
			</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Status</th>
			<td>
				<select  id="filter_status" name="status">
					<option value="Payment Successful">Payment Successful</option>
					<option value="shipped">Shipped</option>
					<option value="completed">Completed</option>
					<option value="canceled">Canceled</option>
					<option value="refunded">Refunded</option>
				</select>
			</td>
			<td></td>
			<td></td>
		</tr>
		
		
	<!-- <tr>
		<th valign="top">Description:</th>
		<td><textarea rows="" cols="" class="form-textarea"><?php if(isset($contest)){ echo $contest->description;} ?></textarea></td>
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
<!--  end content-outer -->

 
</div>
<div class="clear">&nbsp;</div>

<?php $this->load->view('admin/footer'); ?>
</div>

</body>
</html>
