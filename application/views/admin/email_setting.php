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
		
		<h1>EMAIL SETTINGS</h1>
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
	
				
                            <div id="step-holder">
			<div class="step-dark-left">Email Admins</div>
                           <div class="clear"></div>
                        <p>When a new order has been placed.</p>
                        
			<!-- <div class="step-dark-right">&nbsp;</div>
			<div class="step-no-off">2</div>
			<div class="step-light-left">Select related products</div>
			<div class="step-light-right">&nbsp;</div>
			<div class="step-no-off">3</div>
			<div class="step-light-left">Preview</div>
			<div class="step-light-round">&nbsp;</div>
			<div class="clear"></div> -->
		</div>
                                <!----message boxes start------------------------------------->
                                    <?php //$this->load->view('admin/message'); ?>
                                <!----message boxes end------------------------------------->
		
		 

				<!--  start product-table ..................................................................................... -->
				<!--
				<?php echo form_open('admin/setting_manager/saveEmail/'.$email_id,"name='filter_form' id='filter_form'"); ?>
					<input type='hidden' name='to_email'  />
					<input type='hidden' name='re_email' />
					<input type='hidden' name='template' />
				<?php echo form_close(); ?>
				 <script>
				$(document).ready(function() {
					$('#filter_submit').click(function(){
							$('#filter_form input[name=to_email').val($('#filter_to_email').val());
							$('#filter_form input[name=re_email]').val($('#filter_re_email').val());
							$('#filter_form input[name=template]').val($('#filter_template').val());
							$('#filter_form').submit();
							
						});
				});
				</script> -->
				<?php echo form_open('admin/email_setting/saveEmail/1'); ?>
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
					<tr class="">
						<td>To: <input type='text' name="to_email"  value="<?php if(isset($to_email)){ echo $to_email; } ?>"/></td>
						<td>Re: <input type='text' name="re_email" value="<?php if(isset($re_email[1])){ echo $re_email[1]; } ?>"/></td>
						<td>Template &nbsp; &nbsp;<a href="<?php echo base_url();?>admin/email_setting/template_edit/1" title="Edit">(Edit)</a></td>
						<td>
							<input type="submit" value="" class="form-update" />
						</td>
			
						
					</tr>
                                </table>
				<?php echo form_close(); ?>
				<!--  end product-table................................... --> 
			</div>
			 <div id="step-holder">
			<div class="step-dark-left">Email Users</div>
                           <div class="clear"></div>
                        <p>When a new order has been placed.</p>
			 </div>
			<!--  end content-table  -->
			<?php echo form_open('admin/email_setting/saveEmail/2'); ?>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
					<tr class="">
						<td>From: <input type='text' name="to_email" value="<?php if(isset($from_email[2])){ echo $from_email[2]; } ?>"/></td>
						<td>Re: <input type='text' name="re_email" value="<?php if(isset($re_email[2])){ echo $re_email[2]; } ?>"/></td>
						<td>Template &nbsp; &nbsp;<a href="<?php echo base_url();?>admin/email_setting/template_edit/2" title="Edit">(Edit)</a></td>
						<td>
							<input type="submit" value="" class="form-update" />
						</td>
			
						
					</tr>
                         </table>
			<?php echo form_close(); ?>
			<div class="clear"></div>
			
			 <div>
                        <p>When a new order has been shipped.</p>
			 </div>
			 <?php echo form_open('admin/email_setting/saveEmail/3'); ?>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
					<tr class="">
						<td>From: <input type='text' name="to_email"  value="<?php if(isset($from_email[3])){ echo $from_email[3]; } ?>"/></td>
						<td>Re: <input type='text' name="re_email" value="<?php if(isset($re_email[3])){ echo $re_email[3]; } ?>"/></td>
						<td>Template &nbsp; &nbsp;<a href="<?php echo base_url();?>admin/email_setting/template_edit/3" title="Edit">(Edit)</a></td>
						<td>
							<input type="submit" value="" class="form-update" />
						</td>
			
						
					</tr>
                         </table>
			<?php echo form_close(); ?>
			<div class="clear"></div>
			
			 <div>
                        <p>When a user contact us throuh contact form.</p>
			 </div>
			 <?php echo form_open('admin/email_setting/saveEmail/4'); ?>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
					<tr class="">
						<td>From: <input type='text' name="to_email" value="<?php if(isset($from_email[4])){ echo $from_email[4]; } ?>" /></td>
						<td>Re: <input type='text' name="re_email" value="<?php if(isset($re_email[4])){ echo $re_email[4]; } ?>"/></td>
						<td>Template &nbsp; &nbsp;<a href="<?php echo base_url();?>admin/email_setting/template_edit/4" title="Edit">(Edit)</a></td>
						<td>
							<input type="submit" value="" class="form-update" />
						</td>
			
						
					</tr>
                         </table>
			<?php echo form_close(); ?>
			<div class="clear"></div>
			
			 <div>
                        <p>When a user create an account.</p>
			 </div>
			 <?php echo form_open('admin/email_setting/saveEmail/5'); ?>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
					<tr class="">
						<td>From: <input type='text' name="to_email"  value="<?php if(isset($from_email[5])){ echo $from_email[5]; } ?>"/></td>
						<td>Re: <input type='text' name="re_email" value="<?php if(isset($re_email[5])){ echo $re_email[5]; } ?>"/></td>
						<td>Template &nbsp; &nbsp;<a href="<?php echo base_url();?>admin/email_setting/template_edit/5" title="Edit">(Edit)</a></td>
						<td>
							<input type="submit" value="" class="form-update" />
						</td>
			
						
					</tr>
                         </table>
			<?php echo form_close(); ?>
			<div class="clear"></div>

			
			<div id="step-holder">
			<div class="step-dark-left">Email Designers</div>
                           <div class="clear"></div>
                        <p>When a design concept has been approved.</p>
			 </div>
			<!--  end content-table  -->
			<?php echo form_open('admin/email_setting/saveEmail/6'); ?>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
					<tr class="">
						<td>From: <input type='text' name="to_email" value="<?php if(isset($from_email[6])){ echo $from_email[6]; } ?>" /></td>
						<td>Re: <input type='text' name="re_email" value="<?php if(isset($re_email[6])){ echo $re_email[6]; } ?>"/></td>
						<td>Template &nbsp; &nbsp;<a href="<?php echo base_url();?>admin/email_setting/template_edit/6" title="Edit">(Edit)</a></td>
						<td>
							<input type="submit" value="" class="form-update" />
						</td>
			
						
					</tr>
                         </table>
			<?php echo form_close(); ?>
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
