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
		<h1>PRODUCTS<span><a href="<?php echo base_url();?>admin/product_manager/addProduct">Add New</a></span></h1>
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
				
				<?php echo form_open('admin/product_manager/filter_index/',"name='filter_form' id='filter_form'"); ?>
					<input type='hidden' name='name'  />
					<input type='hidden' name='designer' />
					<input type='hidden' name='price' />
					<input type='hidden' name='color' />
					<input type='hidden' name='quantity' />
					<input type='hidden' name='status' />
				<?php echo form_close(); ?>
				<script>
				$(document).ready(function() {
					$('#filter_submit').click(function(){
							$('#filter_form input[name=name]').val($('#filter_name').val());
							$('#filter_form input[name=designer]').val($('#filter_designer').val());
							$('#filter_form input[name=price]').val($('#filter_price').val());
							$('#filter_form input[name=color]').val($('#filter_color').val());
							$('#filter_form input[name=quantity]').val($('#filter_quantity').val());
							$('#filter_form input[name=status]').val($('#filter_status').val());
							$('#filter_form').submit();
							
						});
				});
				</script>
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check">SKU</th>
					<th class="table-header-repeat line-left minwidth-1">Title</th>
					<th class="table-header-repeat line-left minwidth-1">Image</th>
					<th class="table-header-repeat line-left">Designer</th>
					<th class="table-header-repeat line-left minwidth-1">Price</th>
					<th class="table-header-repeat line-left">Color</th>
					<th class="table-header-repeat line-left">Status</th>
					<th class="table-header-repeat line-left">Quantity</th>
					<th class="table-header-options line-left">Action</th>
				</tr>
    			<tr class="">
    				
					<td>&nbsp;</td>
					<td><input type='text' id='filter_name' /></td>
					<td></td>
					<td><input type='text' id='filter_designer' /></td>
					
					<td><input type='text' id='filter_price' class='filter_input'/></td>
					<td>
					<select  class="filter_input" id="filter_color">
						<option value="">--Color--</option>
						<?php foreach ($colors as $color){ 
						echo "<option value='$color->id'>$color->name</option>";
						} ?>
					</select>
					</td>
					<td>
					<select  class="filter_input" id="filter_status">
						<option value="">--Status--</option>
						<option value="In Stock">In Stock</option>
						<option value="On Sale">On Sale</option>
						<option value="Out of Stock">Out of Stock</option>
					</select>
					</td>
					<td><input type='text' id='filter_quantity' class='filter_input'/></td>
					<td class="options-width">&nbsp;<input type='button' name='filter' value='filter' id='filter_submit' /></td>
					
				</tr>
				
				
				
    	
    		<?php $i=0; foreach($products as $product){ ?>
	    		<?php if($i%2!='0'){
	    			$class="alternate-row";
	    		}else{
	    			$class="";
	    		}
	    		?>
				<tr class="<?php echo $class;?>">
					<td><?php echo $product->SKU;  ?></td>
					<td><?php echo $product->name; ?></td>
					<td><?php if(isset($pimg[$product->id])){ ?><img src="<?php echo base_url(); ?>images/product_image/short_image/<?php echo $pimg[$product->id]; ?>" /><?php } ?></td>
					<td><?php echo $product->user->first_name.' '.$product->user->last_name; ?></td>
					<td>
					 <?php if($product->original_value > 0){ 
						echo "<del>".$product->original_value.'&pound;'.'</del>'.$product->price.'&pound;'; 
					} elseif($product->original_value == 0) {
						echo $product->price.'&pound;'; 
					} ?>
					</td>
					<td><?php echo $product->color->name; ?></td>
					<td><?php if($stock[$product->id] > 0 && $product->original_value==0) { echo 'In stock'; } elseif($stock[$product->id]==0 && $product->original_value==0) { echo "Out of stock"; } elseif($product->original_value > 0){ echo "On sale"; } ?></td>
					<td><?php  echo $stock[$product->id]; ?></td>
					<td class="options-width">
					<a href="<?php echo base_url();?>admin/product_manager/editProduct/<?php echo $product->id; ?>" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="javascript:confirmDelete('<?php echo base_url();?>admin/product_manager/deleteProduct/<?php echo $product->id; ?>')" title="Delete" class="icon-2 info-tooltip" ></a>
					<a href="<?php echo base_url();?>admin/product_manager/imageManager/<?php echo $product->id; ?>" title="Images" class="icon-3 info-tooltip"></a>
					<a href="<?php echo base_url();?>admin/product_manager/stockManager/<?php echo $product->id; ?>" title="Stock" class="icon-4 info-tooltip"></a>
					<!--<a href="" title="Edit" class="icon-5 info-tooltip"></a> -->
					</td>
				</tr>
			<?php $i++; } ?>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
			
			<!--  start paging..................................................... -->
                            <?php $this->load->view('admin/pagination_filter'); ?>
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
