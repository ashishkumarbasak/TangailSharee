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
          imageheight :30,
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
<link rel="stylesheet" href="<?php echo base_url(); ?>css/file_style.css" type="text/css" />

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

<div id="page-heading"><h1>Add New <?php echo substr($role->name, 0, strlen($role->name)-1);?></h1></div>


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
	<?php echo form_open_multipart("admin/user_manager/saveUser"); ?>
	<table border="0" width="600px" cellpadding="0" cellspacing="0" style=" float: left;">
	<tr valign="top">
	<td>
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-dark-left"><a href="">Add Details</a></div>
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
		
		<tr>
			<th valign="top">User Name:</th>
			<td><input type="text" name="username" class="inp-form" value="<?php echo $this->input->post('username') ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Email:</th>
			<td><input type="text" class="inp-form" name="email" value="<?php echo $this->input->post('email') ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">First Name:</th>
			<td><input type="text" name="first_name" class="inp-form" value="<?php echo $this->input->post('first_name') ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Last Name:</th>
			<td><input type="text" name="last_name" class="inp-form" value="<?php echo $this->input->post('last_name') ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Website:</th>
			<td><input type="text" name="website" class="inp-form" value="<?php echo $this->input->post('website') ?>" /></td>
			<td></td>
		</tr>
                <tr>
			<th valign="top">Password</th>
			<td><input type="password" class="inp-form" name="password" value="" /></td>
			<td></td>
		</tr>
                <tr>
			<th valign="top">Confirm password</th>
			<td><input type="password" class="inp-form" name="confirm_password" value="" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Profile:</th>
			<td><textarea rows="" cols="" class="form-textarea" name="profile"><?php echo $this->input->post('profile') ?></textarea></td>
			<td></td>
		</tr>
		<?php if($role->name=='Designers' || $role->name=='Customers'){?>
		<tr>
			<th valign="top">Reward Points</th>
			<td><input type="text" class="inp-form" name="reward_points" value="<?php echo $this->input->post('reward_points') ?>" /></td>
			<td></td>
		</tr>
		<?php }?>
		<tr>
			<th valign="top">Role</th>
			<td><select title="" name="role" class='styledselect_form_1'>
            	<?php 
            		if (isset($role))
            		foreach ($roles as $r){
            			if($role->id==$r->id){
            				echo "<option value='$r->id' selected='selected'>$r->name</option>";	
            			}
            			else
            				echo "<option value='$r->id'>$r->name</option>";
            		}
            	?>
            </select>
            </td>
			<td></td>
		</tr>
		<?php if($role->name=='Designers'){?>
		<tr>
			<th valign="top">Supervisor</th>
			<td><select title="" name="supervisor" class='styledselect_form_1'>
			<option value=''>Admin's Name</option>
            	<?php 
            		
            		foreach ($supervisors as $supervisor){
            			
            				echo "<option value='$supervisor->id'>".$supervisor->first_name.' '.$supervisor->last_name."</option>";	
            			
            		}
            	?>
            </select>
            </td>
			<td></td>
		</tr>
		<?php }?>
		<tr>
		<th valign="top">Notification:</th>
		<td>	
		 <input type="checkbox" name='notification' value="1"/>
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
			<input type="reset" value="" class="form-reset"  />
		</td>
		<td></td>
	</tr>
	
	</table>
	<!-- end id-form  -->
  <tr>
            
        </tr>  
	</td>
	
	<td>
</td>
</tr>
<tr>
<td><img src="<?php echo base_url(); ?>adm/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 <div class="test" style=" float: right; width: 404px;">
                UpLoad New Image:<br /> 
	  	<input type="file" name="userfile" />
                <br /><br />
                <div><img src="<?php echo base_url(); ?>images/no_image_145.jpg" width="145" height="168" alt="" /></div>
            </div>
<div class="clear"></div>
 
 <?php echo form_close();?>
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
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>


<?php $this->load->view('admin/footer'); ?>

</body>
</html>
