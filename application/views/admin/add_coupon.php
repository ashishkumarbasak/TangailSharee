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
	 $button='Add Coupon';
	 $button1='Edit Coupon';
	 $bar='Add Coupon Details';
	 $bar1='Edit Coupon Details';
?>

<div id="page-heading"><h1>
<?php if (isset($coupon)){?>
<?php echo $button1.' '; ?>
<?php }else{ ?>
<?php echo $button.' ';} ?></h1>
</div>


 <div id="vtab">
      <ul>
        <?php if (isset($coupon)){?>
        <li class="home selected"><a href="<?php echo base_url();?>admin/coupon_manager/editCoupon/<?php echo $coupon->id;?>">General</a></li>
        <li class="home "><a href="<?php echo base_url();?>admin/coupon_manager/couponhistory/<?php echo $coupon->id;?>">Coupon History</a></li>
        <?php }else{  ?>
         <li class="home selected"><a href="<?php echo base_url();?>admin/coupon_manager/addCoupon">General</a></li>
        <li >Coupon History</li>
        <?php }?>
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
	<td class="table_left">
	
	
		<!--  start step-holder -->
		<div id="step-holder">
		<?php if (isset($coupon)){?>
			<div class="step-dark-left"><a href=""><?php echo $bar1;?></a></div>
			<?php }
				else {
			?>
			<div class="step-dark-left"><a href=""><?php echo $bar;}?></a></div>
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
		<?php echo form_open("admin/coupon_manager/saveCoupon"); ?>
		<?php if(isset($coupon)){?>
				<input type="hidden" value='<?php echo $coupon->id;?>' name='coupon_id' />
			<?php }?>
		<tr>
			<th valign="top">Coupon Name:</th>
			<td><input type="text" name="name" class="inp-form" value="<?php if (isset($coupon)){ echo $coupon->name;}?>" /></td>
			<?php echo form_error('name', '<td class="update_error">', '</td>'); ?>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Coupon Code:</th>
			<?php if (!isset($coupon)){?>
			<td><input type="text" name="code" class="inp-form" value="" /></td>
			<?php }
	 			 else{?>
	 		<td><h3><?php echo $coupon->code;?></h3></td>	 	
	 			 <?php } ?>
			
			<td></td>
		</tr>
		<tr>
			<th valign="top">Type</th>
			<td><select title="" name="type" class='styledselect_form_1'>
            	<option value='Fixed' <?php if(isset($coupon) && $coupon->type=='Fixed'){ echo "selected='selected'";}?>>Fixed Amount</option>
            	<option value='Percentage' <?php if(isset($coupon) && $coupon->type=='Percentage'){ echo "selected='selected'";}?>>Percentage</option>
            	<option value='Free shipping' <?php if(isset($coupon) && $coupon->type=='Free shipping'){ echo "selected='selected'";}?>>Free Shipping</option>
            </select>
            </td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Discount:</th>
			<td><input type="text" name="discount" class="inp-form" value="<?php if (isset($coupon)){ echo $coupon->discount;}?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Total Amount:</th>
			<td><input type="text" name="total_amount" class="inp-form" value="<?php if (isset($coupon)){ echo $coupon->total_amount;}?>" /></td>
			<?php echo form_error('total_amount', '<td class="update_error">', '</td>'); ?>
			<td></td>
		</tr>
	
		<tr>
			<th valign="top">Start Date:</th>
			<td><input type="text" class="inp-form" name="start_date"  id='start_date' value="<?php if(isset($coupon)){ echo $coupon->start_date;} ?>" />
            	<a href=""  id="date-pick"><img src="<?php echo base_url();?>adm/images/forms/icon_calendar.jpg"   alt="" /></a>
            </td>
			<?php echo form_error('start_date', '<td class="update_error">', '</td>'); ?>
			<td></td>
		</tr>
		<tr>
			<th valign="top">End Date:</th>
			<td><input type="text" class="inp-form" name="end_date" id='end_date' value="<?php if(isset($coupon)){ echo $coupon->end_date;} ?>" />
			<a href=""  id="date-pick1"><img src="<?php echo base_url();?>adm/images/forms/icon_calendar.jpg"   alt="" /></a>
            </td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Uses Per Coupon:</th>
			<td><input type="text" name="uses_coupon" id="uses_coupon" class="inp-form" value="<?php if(isset($coupon)){ echo $coupon->uses_coupon; } ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Uses Per Customer:</th>
			<td><div id="uses_customer"><input type="text" name="uses_customer"  id='uses_customer' class="inp-form" value="<?php if(isset($coupon)){  echo $coupon->uses_customer;} ?>" /></div>
			</td>
			
		</tr>		
	<!-- 	
		
		<script>
		    $(document).ready(function(){
		    	$("#uses_coupon").show();
				$("#uses_customer").hide();
		    $("input[name$='group1']").click(function() {
		        var test = $(this).val();
				if(test == 'uses_coupon')
				{
					$("#uses_coupon").show();
					$("#uses_customer").hide();
				}
				if(test == 'uses_customer')
				{
					$("#uses_coupon").hide();
					$("#uses_customer").show();
				}
		        
		    });
		});
		</script>
		 -->
		<tr>
			<th valign="top">Enable:</th>
			<td><input type="checkbox" name='status' <?php if(isset($coupon) && $coupon->status==1){ echo "checked='checked'";} ?> value="1"/>
            </td>
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
			<input type="submit" value="" class="form-submit" />
		</td>
		<td></td>
	</tr>
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
 </div>
    </div>

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
