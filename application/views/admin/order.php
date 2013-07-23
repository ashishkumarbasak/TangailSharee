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
		<h1>Dashboard</h1>
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
			<div style="border: 1px solid #000; width: 45%; min-height: 20px;float: left">
				<table width="45%"  border="0" cellpadding="5" cellspacing="0" class="dashboard_manager">
    				<tr>
			    		<td>Total Sales Today</td>
			    		<td>:</td>
			    		<?php
			    		$price = 0;
			    		foreach($order->all as $test )
			    		{
			    			$price += $test->total_amount;
			    		} 
			    		?>
			    		<td><?php echo $price; ?></td>
			    	</tr>
			    	<tr>
				    	<td>Total Orders Today</td>
				    	<td>:</td>
				    	<td><?php echo count($order->all);?></td>
			    	</tr>
			    	<tr>
				    	<td>Total Login Today</td>
				    	<td>:</td>
				    	<td><?php echo count($user->all);?></td>
			    	</tr>
			    	<tr>
				    	<td>New Users Today</td>
				    	<td>:</td>
				    	<td><?php echo count($nuser->all);?></td>
			    	</tr>
			    	<tr>
				    	<td>Total Registered User</td>
				    	<td>:</td>
				    	<td><?php echo $tuser;?></td>
			    	</tr>
			    </table> 
			</div>
			<div style="width: 45%; min-height: 20px;float: right;">
				<img src="<?php echo base_url();?>/temp/test.png"/>
            </div>        
    		<div style="clear: both;"></div>
    		<div>
    			<h2>Daily Orders:</h2>
    			<br/>
    			<table width="100%" align="center" border="1" cellpadding="0" cellspacing="0">
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
    					<td><?php echo $ord->User->first_name;?></td>
    					<td><?php echo $ord->status;?></td>
    					<td>Quantity</td>
    					<td><?php echo $ord->total_amount;?></td>
    					<td>Hour Added</td>
    					<td><a href="<?php echo base_url();?>admin/sales/order_detail/<?php echo $ord->id;?>">View</a></td>
    				</tr>
    				<?php }?>
    			</table>
    		</div>
                   
    <!--                 
	<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" class="dashboard_manager">
		<tbody><tr>
					<td height="150" width="30%" align="center">
			
				<a href="<?php echo base_url();?>/admin/user_manager"><img src="<?php echo base_url(); ?>adm/images/user_mgmt.jpg" alt="User Management" width="50px" border="0">
				</a><br>
				<a href="<?php echo base_url();?>/admin/user_manager" title="User Management">User Management</a>			</td>
				<td height="150" width="30%" align="center">
			
				<a href="<?php echo base_url();?>/admin/cms_manager"><img src="<?php echo base_url(); ?>adm/images/cms_pages_mgmt.jpg" alt="CMS Pages Management" width="50px" border="0">
				</a><br>
				<a href="<?php echo base_url();?>/admin/cms_manager" title="CMS Pages Management">CMS Pages Management</a>			</td>
					<td height="150" width="30%" align="center">
			
				<a href="<?php echo base_url();?>/admin/system_manager"><img src="<?php echo base_url(); ?>adm/images/configuration.png" alt="System Configurations" width="50px" border="0">
				</a><br>
				<a href="<?php echo base_url();?>/admin/system_manager" title="System Configurations">System Configurations</a>			</td>
		</tr><tr>			<td height="150" width="30%" align="center">
			
				<a href="<?php echo base_url();?>/admin/product_manager"><img src="<?php echo base_url(); ?>adm/images/restaurant_mgmt.png" alt="Restaurant Management (6)" width="50px" border="0">
				</a><br>
				<a href="<?php echo base_url();?>/admin/product_manager" title="Product Management">Product Management</a>			</td>
					<td height="150" width="30%" align="center">
			
				<a href="<?php echo base_url();?>/admin/contest_manager"><img src="<?php echo base_url(); ?>adm/images/admin_user_mgmt.jpg" alt="Admin Users Mangement" width="50px" border="0">
				</a><br>
				<a href="<?php echo base_url();?>/admin/contest_manager" title="Contest Mangement">Contest Mangement</a>			</td>
					<td height="150" width="30%" align="center">
			
				<a href="<?php echo base_url();?>/admin/video_manager"><img src="<?php echo base_url(); ?>adm/images/web_email_mgmt.jpg" alt="Web Email Management" width="50px" border="0">
				</a><br>
				<a href="<?php echo base_url();?>/admin/video_manager" title="Web Email Management">Video Management</a>			</td>
		</tr>
		<tr>			<td height="150" width="30%" align="center">
			
				<a href="<?php echo base_url();?>/admin/role_manager"><img src="<?php echo base_url(); ?>adm/images/role_mgmt.jpg" alt="Admin Role Mangement" width="50px" border="0">
				</a><br>
				<a href="<?php echo base_url();?>/admin/role_manager" title="Role Mangement">Role Mangement</a>			</td>
				</tr>
	</tbody></table>-->

			
		 
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