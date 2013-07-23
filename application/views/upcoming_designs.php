<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Twinne</title>
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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>
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

<!--  delete script -->
<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
    document.location = delUrl;
  }
}
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

  <!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		
		<h1>Upcoming Designs<span><a href="<?php echo base_url();?>admin/upcoming_designs/addUpdesign">Add New</a></span></h1>
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
	
				
                            
                                <!----message boxes start------------------------------------->
                                    <?php //$this->load->view('admin/message'); ?>
                                <!----message boxes end------------------------------------->
		
		 

				<!--  start product-table ..................................................................................... -->
				
				<?php echo form_open('admin/upcoming_designs',"name='filter_form' id='filter_form'"); ?>
					<input type='hidden' name='title' value='dsgfd' />
					<input type='hidden' name='designer' />
					<input type='hidden' name='status' />
					<input type='hidden' name='date_added' />
					<input type='hidden' name='date_removed' />
				<?php echo form_close(); ?>
				<script>
				$(document).ready(function() {
					$('#filter_submit').click(function(){
							$('#filter_form input[name=title]').val($('#filter_title').val());
							$('#filter_form input[name=designer]').val($('#filter_designer').val());
							$('#filter_form input[name=status]').val($('#filter_status').val());
							$('#filter_form input[name=date_added]').val($('#filter_date_added').val());
							$('#filter_form input[name=date_removed]').val($('#filter_date_removed').val());
							$('#filter_form').submit();
							
						});
				});
				</script>
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check">#</th>
					<th class="table-header-repeat line-left minwidth-1">Title</th>
					<th class="table-header-repeat line-left minwidth-1">Designer</th>
					<th class="table-header-repeat line-left">Status</th>
					<th class="table-header-repeat line-left">Date Added</th>
					<th class="table-header-repeat line-left">Date Removed</th>
					<th class="table-header-options line-left">Action</th>
				</tr>
    			<tr class="">
    				
					<td>&nbsp;</td>
					<td><input type='text' id='filter_title' /></td>
					<td><input type='text' id='filter_designer' /></td>
					<td>
					<select  class="styledselect_form_1" id="filter_status">
						<option value="">--Select Status--</option>
						<option value="1">Added</option>
						<option value="0">Removed</option>
					</select>
					
					<td><input type='text' id='filter_date_added' class='filter_input'/></td>
					<td><input type='text' id='filter_date_removed' class='filter_input' /></td>
					<td class="options-width">&nbsp;<input type='button' name='filter' value='filter' id='filter_submit' /></td>
					
				</tr>
    		<?php $i=0; foreach($designs as $design){ ?>
	    		<?php if($i%2!='0'){
	    			$class="alternate-row";
	    		}else{
	    			$class="";
	    		}
	    		?>
				<tr class="<?php echo $class;?>">
					<td><?php echo $i+1; ?></td>
					<td><?php echo $design->title; ?></td>
					<td><?php echo $design->user->username; ?></td>
					<td><?php if ($design->status=='1'){ echo "Added"; } 
								else { echo "Removed"; } ?></td>
					<td><?php if($design->date_added){echo date('d/m/Y',$design->date_added);} ?></td>
					<td><?php if($design->date_removed){echo date('d/m/Y',$design->date_removed); }?></td>
					<td class="options-width">
					<a href="<?php echo base_url();?>admin/upcoming_designs/editDesign/<?php echo $design->id; ?>" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="javascript:confirmDelete('<?php echo base_url();?>admin/upcoming_designs/deleteDesign/<?php echo $design->id; ?>')" title="Delete" class="icon-2 info-tooltip" ></a>
					<!-- <a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a> -->
					</td>
				</tr>
			<?php $i++; } ?>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			
			<!--  end content-table  -->
			
			<!--  start paging..................................................... -->
                            <?php $this->load->view('admin/pagination'); ?>
                        <!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
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
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
<?php $this->load->view('admin/footer'); ?>
</body>
</html>
