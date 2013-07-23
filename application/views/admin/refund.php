<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Tangail-sharee</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>adm/css/screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="<?php echo base_url(); ?>adm/css/style.css" type="text/css" media="screen" title="default" />
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

<!--  styled file upload script --> 
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "images/forms/choose-file.gif",
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
		<h1>Refund</h1>
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
			<div>
    			<h2>Orders:</h2>
    			<br/>
    			
    			<!--  start product-table ..................................................................................... -->
				
				<?php echo form_open('admin/sales_manager/filter_refund/',"name='filter_form' id='filter_form'"); ?>
					<input type='hidden' name='order_id' />
					<input type='hidden' name='customer' />
					<input type='hidden' name='status' />
					<input type='hidden' name='total' />
					<input type='hidden' name='quantity' />
				<?php echo form_close(); ?>
				<script>
				$(document).ready(function() {
					$('#filter_submit').click(function(){
							$('#filter_form input[name=order_id]').val($('#filter_order_id').val());
							$('#filter_form input[name=customer]').val($('#filter_first_name').val());
							$('#filter_form input[name=status]').val($('#filter_status').val());
							$('#filter_form input[name=total]').val($('#filter_total_amount').val());
							$('#filter_form input[name=quantity]').val($('#filter_quantity').val());
							
							$('#filter_form').submit();
							
						});
				});
				</script>
				
    			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check">#</th>
					<th class="table-header-repeat line-left minwidth-1">Order ID</th>
					<th class="table-header-repeat line-left">Customer</th>
					<th class="table-header-repeat line-left minwidth-1">Status</th>
					<th class="table-header-repeat line-left">Total</th>
					<!-- <th class="table-header-repeat line-left">Quantity</th>-->
					<th class="table-header-repeat line-left">Created</th>
					<th class="table-header-options line-left">Action</th>
				</tr>
				
				<tr class="">
				
				<td>&nbsp;</td>
				<td><input type='text' id='filter_order_id' class='filter_input' /></td>
				<td><input type='text' id='filter_first_name' /></td>
				<td>
					<select  class="styledselect_form_1" id="filter_status">
						<option value="">--Select Status--</option>
						<option value="Awaiting for the pack">Awaiting for the pack</option>
						<option value="payment sent">Payment sent</option>
						<option value="refund refused">Refund refused</option>
					</select>	
				</td>
				<td><input type='text' id='filter_total_amount' class='filter_input' /></td>
<!-- 				<td><input type='text' id='filter_quantity' class='filter_input' /></td> -->
				<td></td>
				<td class="options-width">&nbsp;<input type='button' name='filter' value='filter' id='filter_submit' /></td>
					
				</tr>
    			
    		<?php $i=0; foreach($refund->all as $ref){ ?>
	    		<?php if($i%2!='0'){
	    			$class="alternate-row";
	    		}else{
	    			$class="";
	    		}
	    		?>
				<tr class="<?php echo $class;?>">
					<td><?php echo $i+1; ?></td>
					<td><a href="<?php echo base_url(); ?>admin/sales_manager/products/<?php echo $ref->order->id; ?>"><?php echo $ref->order->SKU; ?></a></td>
					<td><?php echo $ref->order->user->first_name.'&nbsp;'.$ref->order->user->last_name; ?></td>
					<td><?php echo $ref->status;?></td>
					<td><?php echo $ref->order->total_amount;?></td>
<!-- 					<td>Quantity</td> -->
					<td><?php echo date("j-m-Y",strtotime($ref->created));?></td>
					<td class="options-width">
						<a href="<?php echo base_url(); ?>admin/sales_manager/products/<?php echo $ref->order->id; ?>">Details</a> &nbsp;| &nbsp;
                        <a href="<?php echo base_url(); ?>admin/sales_manager/refundHistory/<?php echo $ref->order->id; ?>">Refund History</a>
                        
					</td>
				</tr>
			<?php $i++; } ?>
				</table>
    			
    			
    			
    			
    			<!-- <table width="100%" align="center" border="1" cellpadding="0" cellspacing="0">
    				<tr>
    					<th>Order Id</th>
    					<th>Customer</th>
    					<th>Status</th>
    					<th>Quantity</th>
    					<th>Total</th>
    					<th>Hour Added</th>
    					<th>Action</th>
    				</tr>

    			<?php //echo "<pre>";print_r($order->all);?>
    				<?php foreach($order->all as $ord){?>
    				<tr>
    					<td><?php echo $ord->id;?></td>
    					<td><?php echo $ord->User->first_name.'&nbsp;'.$ord->User->last_name;?></td>
    					<td><?php echo $ord->status;?></td>
    					<td>Quantity</td>
    					<td><?php echo $ord->total_amount;?></td>
    					<td>Hour Added</td>
    					<td><a href="<?php echo base_url();?>admin/sales_manager/orderdetail/<?php echo $ord->id;?>">View</a></td>
    				</tr>
    				<?php }?>
    			</table>-->
    		</div>
              <!--  start paging..................................................... -->
                            <?php $this->load->view('admin/pagination_filter'); ?>
                        <!--  end paging................ -->     
   
			
		 
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