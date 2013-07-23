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

// initialise the "Select date" link


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
    <?php echo form_open("admin/setting_manager/saveTaxSetting"); ?>
        <table border="0" width="50%" cellpadding="0" cellspacing="0">
              
                <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
            <tr>
			<td class="fonts";>&nbsp;&nbsp;&nbsp;Calculate Taxes :</td>
			<td><input type="checkbox" name='default' value="1"/>&nbsp;&nbsp;&nbsp;Enable Taxes & Calculation</td>
		</tr>
               <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
              <tr>
			<td class="fonts";>&nbsp;&nbsp;&nbsp;Prices Inclusive of Tax :</td>
			<td><input type="checkbox" name='default' value="1"/>&nbsp;&nbsp;&nbsp;Catalog prices include tax</td>
		</tr>
        </table>
	<!--  start page-heading -->
	<div id="page-heading">
		<h1>TAXES<span><a href="<?php echo base_url();?>admin/setting_manager/addTaxes">Add New</a></span></h1>
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
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check">#</th>
					<th class="table-header-repeat line-left minwidth-1">Name</th>
                                        <th class="table-header-repeat line-left minwidth-1">Apply To</th>
                                        <th class="table-header-repeat line-left minwidth-1">Rate</th>
                                        <th class="table-header-repeat line-left minwidth-1">Default</th>
					<th class="table-header-options line-left">Action</th>
				</tr>
    	
    		<?php $i=0; foreach($taxes as $tax){ ?>
                <input type="hidden" value='<?php echo $tax->id;?>' name='tax_id' />
	    		<?php if($i%2!='0'){
	    			$class="alternate-row";
	    		}else{
	    			$class="";
	    		}
	    		?>
				<tr class="<?php echo $class;?>">
					<td><?php echo $i+1; ?></td>
					<td><?php echo $tax->name; ?></td>
                                        <td><?php echo $tax->apply_to; ?></td>
                                        <td><?php echo $tax->rate; ?>%</td>
                                        <td><input type="radio" name='default' <?php if($tax->default==1){ echo "checked='checked'";} ?> value="<?php echo $tax->id; ?>"/><?php if($tax->default==1){ echo "Applied"; } ?></td>
					<td class="options-width">
					<a href="<?php echo base_url();?>admin/setting_manager/editTaxes/<?php echo $tax->id; ?>" title="Edit" class="icon-1 info-tooltip"></a>
					<a href="javascript:confirmDelete('<?php echo base_url();?>admin/setting_manager/deleteTaxes/<?php echo $tax->id; ?>')" title="Delete" class="icon-2 info-tooltip" ></a>
					<!-- <a href="" title="Edit" class="icon-3 info-tooltip"></a>
					<a href="" title="Edit" class="icon-4 info-tooltip"></a>
					<a href="" title="Edit" class="icon-5 info-tooltip"></a> -->
					</td>
				</tr>
			<?php $i++; } ?>
                         
				</table>
				<!--  end product-table................................... --> 
				</form>
                                  <div><input type="submit" value="" class="form-save" /></div>
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
        <?php echo form_close(); ?>
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
