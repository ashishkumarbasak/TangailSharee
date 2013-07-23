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
		
		<h1>Manage Designers</h1>
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
				
				<?php echo form_open('admin/manage_designer/filter_index/',"name='filter_form' id='filter_form'"); ?>
					<input type='hidden' name='fullname'  />
					<input type='hidden' name='email' />
					<input type='hidden' name='status' />
                    <input type='hidden' name='pmt_method' />
				<?php echo form_close(); ?>
				<script>
				$(document).ready(function() {
					$('#filter_submit').click(function(){
							$('#filter_form input[name=fullname]').val($('#filter_fullname').val());
							$('#filter_form input[name=email]').val($('#filter_email').val());
							$('#filter_form input[name=status]').val($('#filter_status').val());
							$('#filter_form input[name=pmt_method]').val($('#filter_pmt_methods').val());
							$('#filter_form').submit();
							
						});
				});
				</script>
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check">#</th>
					<th class="table-header-repeat line-left minwidth-1">Name</th>
					<th class="table-header-repeat line-left minwidth-1">Email</th>
                    <th class="table-header-repeat line-left minwidth-1">Payment Methods</th>
					<th class="table-header-repeat line-left">Status</th>
					<th class="table-header-options line-left">Action</th>
				</tr>
    			<tr class="">
    				
					<td>&nbsp;</td>
					<td><input type='text' id='filter_fullname' /></td>
					<td><input type='text' id='filter_email' /></td>
                    <td>
                    <select  class="styledselect_form_1" id="filter_pmt_methods">
						<option value="">--Select Payment Methods--</option>
						<option value="paypal">Paypal</option>
						<option value="swift">Bank Account</option>
					</select>
                    </td>
					<td>
					<select  class="styledselect_form_1" id="filter_status">
						<option value="">--Select Status--</option>
						<option value="1">Open</option>
						<option value="0">Closed</option>
					</select>
					<td class="options-width">&nbsp;<input type='button' name='filter' value='filter' id='filter_submit' /></td>
					
				</tr>
    		<?php $i=0; foreach($designers as $designer){ ?>
	    		<?php if($i%2!='0'){
	    			$class="alternate-row";
	    		}else{
	    			$class="";
	    		}
	    		?>
				<tr class="<?php echo $class;?>">
					<td><?php echo $i+1; ?></td>
					<td><?php echo $designer->first_name.' '.$designer->last_name; ?></td>
					<td><?php echo $designer->email; ?></td>
                    <td>
						<?php  
						
							if($designer->pmt_method=="paypal")
								echo $designer->pmt_method."<br>".$designer->paypal_address;
							else if($designer->pmt_method=="swift")
								{
									echo "Through Bank Account:"."<br>";
									echo "Bank Account: ".$designer->bank_account_no."<br>";
									echo "SWIFT Code: ".$designer->swift_code;
									
								}
							else
								echo "&nbsp;";
						 ?>
                    </td>
					<td><?php if($designer->status=='0'){ echo 'Closed';} else { echo 'Open';} ?></td>
					<td class="options-width">
					<a href="<?php echo base_url();?>admin/manage_designer/editDesigner/<?php echo $designer->id; ?>" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="<?php echo base_url();?>admin/manage_designer/paymentSetting/<?php echo $designer->id; ?>">Payment Setting</a>
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
