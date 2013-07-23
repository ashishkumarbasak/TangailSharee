<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
	$profile_name = $user->first_name." ".$user->last_name;
	echo str_replace("{profile_name}",$profile_name,lang('member_profile'));
?>
</title>
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/global.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/member.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/file_style.css" type="text/css" />

<!--Select Box Js Start-->

<script  type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.form.js"></script>


<script type="text/javascript">
var baseurl="<?php echo base_url();?>";	
var current_username = "<?php echo $user->username; ?>";
$(document).ready(function(){
	//global vars
	var form = $("#memberprofileForm");
	var name = $("#first_name");
	var nameInfo = $("#first_name_error");
	var username = $("#mp_username");
	var usernameInfo = $("#mp_username_error");
	
	var check1 = false;
	var check2 = false;
	//On blur
	
	name.blur(validateName);
	username.blur(validateUsername_mp);
	//On Submitting
	form.submit(function(){
		
		check1=validateName();
		var check6=validateUsername_mp();
		//if(check1) alert("check1");
		//if(check2) alert("check2");
		
		if( check1 && check2)
			return true;
		else
			return false;
		
	});
	
	function validateName(){
		var name = $("#first_name");
		var nameInfo = $("#first_name_error");
		//if it's NOT valid
		if(name.val().length < 3){
			
			nameInfo.text("First Name must be 3 characters long.");
			return false;
		}
		//if it's valid
		else{
			//name.removeClass("error");
			//nameInfo.text("");
			return true;
		}
	}
	
	function validateUsername_mp()
	{
		var username = $("#mp_username");
		var usernameInfo = $("#mp_username_error");
		if(username.val() == current_username)
		{
			usernameInfo.text("");
			check2 = true;
		}
		else if(username.val().length < 3)
		{
			usernameInfo.text("Please input your desired username and should be alphanumeric with 3 characters long.");
			return false;
		}
		else if(username.val().length >= 3 & !isAlphanumeric(username.val()))
		{
			usernameInfo.text("Username should be alphanumeric and at least 3 characters long.");
			return false;
		}
		else if(username.val() != current_username)
		{
			$.post(baseurl+"user/register/is_exist_username", {
        											username: username.val()
      											 }, function(response){
        																if(response=="1")
																			{
																				usernameInfo.text("");
																				check2 = true;
																			}
																		else
																			{
																				usernameInfo.text("The username you supplied is already taken.");
																				check2 = false;
																			}
																		}
									);
		}
	}
	
	function isAlphanumeric(inputValue)  
 	{  
		var regexp = /^[a-zA-Z0-9-_]+$/;
		//alert(inputValue);
		if (inputValue.search(regexp) == -1)
    		return false;
		else
    		return true;
 	}	
	
});	
</script>


<script type="text/javascript">
$(document).ready(function(){
	$(".toggle_container").hide();
	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
	});
});


function cart_refresh(){
	$(".toggle_container").show()
	setTimeout('$(".toggle_container").hide()',4000);
	$('body').after('<div class="inline_notification">You cart has been updated</div>');
	setTimeout("$('.inline_notification').slideUp(400)", 6500);
	//$(".toggle_container").hide();
	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("fast");
	});
}
</script>
<!--Select Box Js End-->
<!--LightBox Js-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.colorbox.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fileinput.js"></script>
<script type="text/javascript">


		$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$("a[rel='example1']").colorbox();
			$("a[rel='example2']").colorbox({transition:"fade"});
			$("a[rel='example3']").colorbox({transition:"none", width:"75%"});
			$("a[rel='example4']").colorbox({slideshow:true});
			$(".example5").colorbox();
			$(".example6").colorbox({iframe:true, innerWidth:425,});
			$(".example7").colorbox({width:"580px", inline:true, height:"auto", href:"#inline_example2"});
			$(".example8").colorbox({width:"580px", inline:true, height:"auto", href:"#inline_example1"});
			$(".example9").colorbox({
				onOpen:function(){ alert('onOpen: colorbox is about to open'); },
				onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
				onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
				onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
				onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
			});
			
			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
	</script>

</head>
<body>
<div id="top"></div>
<div id="wrapper">
  <!--Header Start-->
  	<?php $this->load->view('header'); ?>
  <!--Header End-->
  
  <?php $this->load->view('top_banner'); ?>

  <!--Page Content Start-->
  <div id="mid_content">
    
    <div class="mid_content_top">
      <div class="member_area_top_left">
        <div class="member_area_top_left_image">
        	<?php if ($user->image->filename){?>
          			<img src="<?php echo base_url(); ?>images/profile_image/short_image/<?php echo $user->image->filename; ?>" alt="profilr-image" />
          	<?php }else {?>
          			<img src="<?php echo base_url(); ?>images/no_image_48.jpg" alt="profilr-image" />
          	<?php }?>
        </div>
        <h3>
			<?php echo $user->display_name;?><br />
          	<span>
				<?php if ($user->address->city != "") { echo $user->address->city.', '.$user->address->country; }?>
            </span>
        </h3>
        <div class="clear"></div>
      </div>
      
      <div class="logout_button">
      	<a href="<?php echo base_url(); ?>user/logout/"><img src="<?php echo base_url(); ?>images/logout_button.png" alt="logout" /></a>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    
    <!--Member taber Start-->
    <div id="vtab">
      <ul>
        <li class="home selected"><a href="<?php echo base_url();?>user/member_profile">PROFILE</a></li>
		<?php if(isset($designers) && in_array($user->id,$designers)){ ?>
				<li class="earning"><a href="<?php echo base_url();?>user/manage_design/viewEarnings">EARNINGS</a></li>
				<li class="my_desigen"><a href="<?php echo base_url();?>user/manage_design/viewProducts">MY PRODUCTS</a></li>
        		<li class="my_desigen"><a href="<?php echo base_url();?>user/manage_design/viewDesigns">MY DESIGNS</a></li>
        		<li class="add_desigen"><a href="<?php echo base_url();?>user/manage_design/addDesign">ADD DESIGN</a></li>
		<?php } ?>
        <li class="support"><a href="<?php echo base_url();?>user/member_order">MY ORDERS</a></li>
        <li class="wishlist"><a href="<?php echo base_url();?>user/member_wishlist">WISH-LIST</a></li>
        <?php if(isset($new_event)){ ?>
			<li class="support1"><a href="<?php echo base_url();?>new_contest">NEW EVENT!</a></li>
		<?php }  ?>
      </ul>
      
      
      <div style="display: block;">
        
        <div class="top_button_box">
          <div class="top_button select1"><a href="<?php echo base_url();?>user/member_profile">Edit profile</a></div>
          <div class="point">:</div>
          <div class="shipping_in_button"><a href="<?php echo base_url();?>user/shipping_info">Shipping info</a></div>
          <div class="point">:</div>
          <div class="shipping_in_button"><a href="<?php echo base_url();?>user/billing_info">Billing info</a></div>
          <div class="point">:</div>
          <div class="shipping_in_button"><a href="<?php echo base_url();?>user/change_password">Password</a></div>
		</div>
        
        <?php 
			$attributes = array('name'=>'memberprofileForm','id'=>'memberprofileForm');
			echo form_open_multipart("user/member_profile/saveUser",$attributes); 
		?>
        <div class="tab_mid_box">
				<div class="tab_left_box">
                    
                    <?php if(isset($user)){?>
                        <input type="hidden" value='<?php echo $user->id;?>' name='user_id' />
                    <?php }?>
                    
                <div class="left_input_box">
                      
                        <label class="withmargin">First name</label>
                        <input type="text" name="first_name" id="first_name" value="<?php if($user){ echo $user->first_name;} ?>" tabindex="1" />
                        <div class="clear"></div>
                        <div id="first_name_error" class="error"></div>
                        <?php echo form_error('first_name','<div class="error">','</div>'); ?>  
                 
                 		<div class="gap"></div>
                        <label class="withmargin">Username</label>
                        <input type="text" name="username" id="mp_username" value="<?php if($user){ echo $user->username;} ?>" tabindex="3" />
                        <div class="clear"></div>
                        <div id="mp_username_error" class="error"></div>
                        <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                        
                        <div class="gap"></div>
                        <label>Gender</label>
                        <select class="taber_select_box" name="gender" value="" tabindex="5">
                            <option value='male' <?php if($user->gender=='male') { echo "selected='selected'"; }?>>Male</option>
                            <option value='female' <?php if($user->gender=='female') { echo "selected='selected'"; }?>>Female</option>
                        </select>
                      
                      	<div class="gap"></div>
                        <label>Email</label>
                        <input type="text" name="email" value="<?php if($user){ echo $user->email;} ?>" readonly="readonly" tabindex="7" />
                </div>
            
                <div class="right_input_box">              
                   	  <label>Last name</label>
                      <input type="text" name="last_name" value="<?php if($user){ echo $user->last_name;} ?>" tabindex="2" />
                      <div class="clear"></div>
                  	  <div id="last_name_error" class="error"></div>
                  

                      <div class="gap"></div>
                      <label>Display public name as</label>
                      <select class="taber_select_box" name="display_type" tabindex="4">
                        <option value='1' <?php if(isset($user) && $user->display_type==1){ echo "selected='selected'"; } ?>>First + Last name</option>
                        <option value='2' <?php if(isset($user) && $user->display_type==2){ echo "selected='selected'"; } ?>>First Name</option>
                        <option value='3' <?php if(isset($user) && $user->display_type==3){ echo "selected='selected'"; } ?>>Last Name</option>
                        <option value='4' <?php if(isset($user) && $user->display_type==4){ echo "selected='selected'"; } ?>>Username</option>
                      </select>
                      <div class="clear"></div>
                      <div id="last_name_error" class="error"></div>
                  
                  	  <div style="display:none">
                      <div class="gap"></div>
                      <label>Currency</label>
                      <select class="taber_select_box" name="currency" tabindex="6">
                      <?php 
                            foreach ($currencies as $currency)
                            {
                                if($currency->id==$user->currency_id)
                                    echo "<option value='$currency->id' selected='selected'>$currency->name</option>";
                                else
                                    echo "<option value='$currency->id'>$currency->name</option>";
                            }
                     ?>
                     </select>
                 	 </div>
                        
                 	 <div class="gap"></div>
                     <label>Reward Points</label>
                     <input type="text" name="reward_points" value="<?php if($user){ echo $user->reward_points;} ?>" readonly="readonly" tabindex="8" />
                     
                </div>
            	<div class="clear"></div>
                
                <div class="gap"></div>	
            	<label>About Me</label>
            	<input type="text" name="profile" class="email_input" value="<?php if($user){ echo $user->profile;} ?>" tabindex="9" />
	    		<div class="clear"></div>
                
                <div class="gap"></div>	
            	<input type="checkbox" value="1" name="notification" id="notification" class="tab_check_box" <?php if($user->notification==1) { echo "checked='checked'"; } ?> tabindex="10" />
            	<label>Notify me by e-mail about Twinne’s discounts and news</label>
            	<div class="clear"></div>
            
            	<input type="submit" value="&nbsp;" class="save_button" />
                
        </div>
        <?php echo form_close(); ?>
          
          
          <div class="tab_right_box">
          	
            <label>Upload a profile image</label>
          <?php if ($user->image->filename){?>
		  <div id='imgdisplay'>
			<img src="<?php echo base_url(); ?>images/profile_image/main_image/<?php echo $user->image->filename; ?>" alt="profilr-image" />
		  </div>
          <?php }
          else {?>
          <img src="<?php echo base_url(); ?>images/no_image_108.jpg" alt="profilr-image" />
          <?php }?>
          
            <div class="clear"></div>
            
		
			<?php //echo form_open_multipart("user/member_profile/uploadUserImage"); ?>
			<form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo base_url(); ?>user/member_profile/uploadUserImage'>
				
				<input type="hidden" value='<?php echo $user->id;?>' name='user_id' />
  				
  				<input type="file" name="userfile" id="userfile" size="11" />
  		
			</form>
		<div id='preview'>
</div>
          </div>
          
          <div class="clear"></div>
        </div>
        
      </div>
    </div>
    <!--Member taber Start-->
    <div class="clear"></div>
  </div>
  <!--Home Page Content End-->
  <!--Footer Start -->
  <?php $this->load->view('footer')?>
  <!--Footer End -->
  <div class="clear"></div>
</div>
<script type="text/javascript" >
     $('#userfile').live('change', function()			{ 
			           $("#imgdisplay").html('');
			    $("#imgdisplay").html('<img src="<?php echo base_url(); ?>images/loader.gif" alt="Uploading...."/>');
			$("#imageform").ajaxForm({
						target: '#imgdisplay'
		}).submit();
		
			});
</script>

</body>
</html>