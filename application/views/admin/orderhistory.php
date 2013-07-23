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
		}selected
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

<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">

<?php $this->load->view('admin/message'); ?>
<div id="page-heading"><h1>
	Sales

</div>

 <!--Member taber Start-->
    <div id="vtab">
      <ul>
        <li class="home"><a href="<?php echo base_url();?>admin/sales_manager/orderDetail/<?php echo $order->id;?>">Order Detail</a></li>
        <li class="home"><a href="<?php echo base_url();?>admin/sales_manager/paymentDetail/<?php echo $order->id;?>">Payment Detail</a></li>
        <li class="home"><a href="<?php echo base_url();?>admin/sales_manager/shippingDetail/<?php echo $order->id;?>">Shipping Detail</a></li>
        <li class="home" ><a href="<?php echo base_url();?>admin/sales_manager/products/<?php echo $order->id;?>">Products</a></li>
        <li class="home selected"><a href="<?php echo base_url();?>admin/sales_manager/orderHistory/<?php echo $order->id;?>">Order History</a></li>
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
		<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat" style="padding-left:10px;">Order ID</th>
					<th class="table-header-repeat" style="padding-left:10px;">Date Added</th>
					<th class="table-header-repeat" style="padding-left:10px;">Comment</th>
					<th class="table-header-repeat" style="padding-left:10px;">Status</th>
					<th class="table-header-repeat" style="padding-left:10px;">Customer Notified</th>
				</tr>
				<?php $sub_total = 0; $i=0; $status = null;
    		 	foreach($orderh as $prod){ ?>
	    		<?php if($i%2!='0'){
	    			$class="alternate-row";
	    		}else{
	    			$class="";
	    		}
	    		?>
				<tr class="<?php echo $class;?>">
					<td><a href="<?php echo base_url(); ?>admin/sales_manager/products/<?php echo $order->id; ?>"><?php echo $order->SKU; ?></a></td>
					<td><?php echo date("j-m-Y",strtotime($prod->created));?></td>
					<td>
					<?php echo ucwords($prod->comment);?> 
                    </td>
					<td><?php echo ucwords($prod->status); ?></td>
					<td><?php if($prod->notified==1){echo "Yes";}else{echo 'no';} ?></td>
				</tr>
			<?php $i++; $status = $prod->status; } ?>
				</table>
				<!--  end product-table................................... -->
				
				
				<?php if($status !='refunded'){?>
				<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<?php echo form_open("admin/sales_manager/savehistory"); ?>
				<input type="hidden" value='<?php echo $order->id;?>' name='order_id' />
			
		<tr>
			<th valign="top">Status:</th>
			<td>
				<select  class="styledselect_form_1" id="filter_status" name="status">
						<option value="">--Select Status--</option>
						<!--<option value="pending">Order Payment Pending</option>
						<option value="shipped">Order Product Shipped</option>-->
						<option value="completed">Order Completed</option>
						<option value="canceled">Order Canceled</option>
						<!-- <option value="refunded">Refunded</option> -->
				</select>	
			</td>
			<td></td>
		</tr>
		
		<tr>
		<th valign="top">Notify Customer:</th>
		<td>	
		 <input type="checkbox" checked="checked" name='notity' value="1"/>
		</td>
		<td></td>
		</tr>
		<tr>
		<th valign="top">Comment:</th>
		<td>	
		 <textarea name='comment' rows=3 cols=25></textarea>
		</td>
		<td></td>
		</tr>
                
                <tr>
		<th valign="top">Tracking Number:</th>
		<td>	
		 <input type="text" name='tracking_number' id="tracking_number" value=""/>
		</td>
		<td></td>
		</tr>                
                                
                                
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="Add History" class="form-submit" />
		</td>
		<td></td>
	</tr>
	 <?php echo form_close();?>
	</table><?php }?>
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













<?php
echo form_open("admin/sales_manager/saveEditedProduct"); ?>
<input type="hidden" value='<?php echo $order->id;?>' name='order_id' />


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
<!-- Invoice printing Part -->
<div id="print_div"  style="display:none;">

<div id="p1">
	<div style="padding-left:35px;font-size:16px;">
 	<div style="float: left;width:42%;border: 1px solid #999999;margin: 10px 2px;padding: 10px;"> 
		 <h2>Bill To</h2><br>
			<?php if (isset($billadd) && !empty($billadd)){?>
			 <label style="font-weight:bold;">Name : </label><label><?php if(isset($billadd->first_name)){echo $billadd->first_name;}?>&nbsp;<?php if(isset($billadd->last_name)){echo $billadd->last_name;}?></label>
			 <br><label style="font-weight:bold;">Email : </label><label><?php echo $order->User->email;?></label><br>
			 <label style="font-weight:bold;">Address : </label><label><?php if(isset($billadd->address_line1)){echo $billadd->address_line1;}?>&nbsp;<?php if(isset($billadd->address_line2)){echo $billadd->address_line2;}?></label><br>
			 <label style="font-weight:bold;">City : </label><label><?php if(isset($billadd->city)){echo $billadd->city;}?></label><br>
			 <label style="font-weight:bold;">Region/State : </label><label><?php if(isset($billadd->state)){echo $billadd->state;}?></label><br>
			 <label style="font-weight:bold;">Country : </label><label><?php if(isset($billadd->country)){echo $billadd->country;}?></label><br>
			 <?php }?>
	</div> 
	
	
	<div style="float: right;width: 42%;border: 1px solid #999999;margin: 10px 2px;padding: 10px;"> 
	<h2>ship To</h2><br>
	<?php if (isset($shipadd) && !empty($shipadd)){?>
			 <label style="font-weight:bold;">Name : </label><label><?php if(isset($shipadd->first_name)){echo $shipadd->first_name;}?>&nbsp;<?php if(isset($shipadd->last_name)){echo $shipadd->last_name;}?></label>
			 <br>
			 <label style="font-weight:bold;">Address : </label><label><?php if(isset($shipadd->address_line1)){echo $shipadd->address_line1;}?>&nbsp;<?php if(isset($shipadd->address_line2)){echo $shipadd->address_line2;}?></label><br>
			 <label style="font-weight:bold;">City : </label><label><?php if(isset($shipadd->city)){echo $shipadd->city;}?></label><br>
			 <label style="font-weight:bold;">Region/State : </label><label><?php if(isset($shipadd->state)){echo $shipadd->state;}?></label><br>
			 <label style="font-weight:bold;">Country : </label><label><?php if(isset($shipadd->country)){echo $shipadd->country;}?></label><br>
			 <?php }?>
	 </div> 
	 </div>
	 <div style="clear:both"> </div>
	 <br><br><br><br>
	 <div style="font-size:20px;float: right;width: 92%;border: 1px solid #999999;margin: 10px 2px;padding: 10px;"> 
		<h2>Products</h2><br/>	
		<div id='shoping_div' class=''>
			<table style="text-align: center;width: 98%;">
			<tr>
				<th>#</th>
				<th>Product Name</th>
				<th>Size</th>
				<th>Genre</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Amount</th>
			</tr>			
        	<?php  
        		$sub_total = 0; $i = 0;      		
        		foreach($order->product as $prod):
        		?>
        			<tr>
	        			<td><?php echo $i+1; ?></td>
	        			<td><?php echo $prod->name; ?></td>
	        			<td><?php echo $prod->size_name; ?></td>
	        			<td><?php echo $prod->size_catagory; ?></td>
	        			<td><?php echo $prod->join_prize; ?></td>
	        			<td><?php echo $prod->join_quantity; ?></td>
	        			<td><?php echo $prod->join_quantity * $prod->join_prize; ?>&nbsp;&pound;</td>
						<?php $quantity = $prod->join_quantity - $prod->join_rdm_quantity;?>
						<?php $sub_total += $quantity * $prod->join_prize; ?>
	        		</tr>
        					      					     				
	        				
        		<?php 	
        		endforeach; 
        		 ?>
        		 <tr>
					<td>&nbsp;</td>
	        		<td>&nbsp;</td>
	        		<td>&nbsp;</td>
	        		<td>&nbsp;</td>
					<td>&nbsp;</td>
	        		<td>&nbsp;</td>
	        	</tr>
        		<tr>
					<td>&nbsp;</td>
	        		<td>&nbsp;</td>
	        		<td>&nbsp;</td>
	        		<td>&nbsp;</td>
					<td>&nbsp;</td>
	        		<td>&nbsp;</td>
	        	</tr>
        		
        		<tr>
        			<td></td>
	        		<td></td>
	        		<td></td>
	        		<td></td>
	        		<td></td>
					<td><b>Sub Total: </b></td>
	        		<td><b><?php echo $sub_total.'&nbsp;&pound';?></b></td>
	        	</tr>
	        	<?php if(isset($discount)){?>
	        	<tr>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td></td>
	        	<td><b>Discount: </b></td>
	        	<td><b>
	        		<?php
	        		if($discount->type == 'Percentage' ){
	        			echo $aptax = $sub_total*$discount->discount/100;
	        			echo '&nbsp;&pound';
	        			$sub_total -= $aptax;
	        		}
	        		if($discount->type == 'Fixed' ){
	        			echo $aptax = $discount->discount;
	        			echo '&nbsp;&pound';
	        			$sub_total -= $aptax;
	        		}
	        		if($discount->type == 'Free shipping' )
	        			echo 'Free shipping';
	        		?>
	        	</b></td>
	        		        	</tr>
	        	<?php }?>
	        	<?php if($order->shipping_amount != null){?>
	        	<tr>
					<td></td>
	        		<td></td>
	        		<td></td>
	        		<td></td>
	        		<td></td>
					<td><b>Shipping: </b></td>
	        		<td><b><?php echo $order->shipping_amount.'&nbsp;&pound';?></b></td>
	        		<?php $sub_total += $order->shipping_amount; ?>
	        	</tr>
	        	<?php } ?>
	        	<?php if($order->tax!=null){?>
	        	<tr>
					<td></td>
					<td></td>
	        		<td></td>
	        		<td></td>
	        		<td></td>
					<td><b>Tax: </b></td>
	        		<td><b><?php echo $order->tax.'&nbsp;&pound';?></b></td>
	        		<?php $sub_total += $order->tax;?>
	        	</tr>
	        	<?php } ?>
	        	<tr>
					<td></td>
					<td></td>
	        		<td></td>
	        		<td></td>
	        		<td></td>
					<td><b>Total: </b></td>
	        		<td><b><?php echo $sub_total.'&nbsp;&pound';?></b></td>
	        	</tr>  
        		 	 
        	</table>
		</div>
		
	</div>
	
	 <div style="clear:both"> </div>
	
	
<div style="clear:both"> </div>
<br><br><br>
</div>




</div>
<script src="<?php echo base_url(); ?>adm/js/print.js" type="text/javascript"></script>

	<script type="text/javascript">
 		function printPDF(){
 			var o = $("#p1");
			o.jqprint();
			
			//$("#divToPrint").jqprint();
			//$('#divOpera').jqprint({ operaSupport: true });				

			return( false) ;
 		}		


 
</script>
<!-- End of Invoice Printing Part -->
</body>
</html>


