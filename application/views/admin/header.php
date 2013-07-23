<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
		<a href="<?php echo base_url(); ?>admin/dashboard" ><h1 style="color: white;">Tangail-sharee Admin Panel</h1></a>
	</div>
	<div id="top-search">
		<a href="<?php echo base_url(); ?>home" target='_blank'><h4 style="color: white; float:right;">Site Homepage</h4></a>
	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	
	<div id="top-search">
		<ul>
	           <li>Hello, <?php echo $admuser->first_name.' '.$admuser->last_name; ?></li>
		   <li><a href="<?php echo base_url(); ?>admin/user_manager/editUser/<?php echo $admuser->id; ?>">Edit Profile</a></li>
		   <li style="border: medium none;"><a href="<?php echo base_url();?>admin/logout">Logout</a></li>
		</ul>
		
	</div>
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			
			
			<div class="clear">&nbsp;</div>
		
			<!--  start account-content -->	
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Personal details </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Project details</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Inbox</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">Statistics</a> 
			</div>
			</div>
			<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<?php $this->load->view('admin/navigation');?>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

  <div class="clear"></div>
 