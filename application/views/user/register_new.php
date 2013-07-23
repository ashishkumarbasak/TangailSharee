<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php echo lang('create_new_account');?>
</title>
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/example-2.css" TYPE="text/css" MEDIA="screen">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" type="text/css" media="screen" />
<!--Select Box Js Start-->
<!--Select Box Js End-->
<!--LightBox Js-->
<script  type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorbox.js"></script>
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
<script>
$(document).ready(function(){
        //Examples of how to assign the ColorBox event to elements
        
        $(".toggle_container").hide();
	$("h2.trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
	});
        
        $("a[rel='example1']").colorbox();
        $("a[rel='example2']").colorbox({transition:"fade"});
        $("a[rel='example3']").colorbox({transition:"none", width:"75%"});
        $("a[rel='example4']").colorbox({slideshow:true});
        $(".example5").colorbox();
        $(".example6").colorbox({iframe:true, innerWidth:425});
        $(".example7").colorbox({width:"580px", transition:"fade", spped:200, inline:true, height:"auto", href:"#inline_example2"});
        $(".example8").colorbox({width:"580px", transition:"none", inline:true, height:"auto", href:"#inline_example1"});
        $(".example9").colorbox({
                onOpen:function(){ alert('onOpen: colorbox is about to open'); },
                onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
                onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
                onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
                onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
        });
        $("a[rel='example14']").colorbox();
        $(".example15").colorbox({width:"400px", inline:true, height:"auto", href:"#inline_example14"});
	$("a[rel='example18']").colorbox();
	        $(".example19").colorbox({width:"580px", inline:true, height:"auto", href:"#inline_example18"});
        //Example of preserving a JavaScript event for inline calls.
        $("#click").click(function(){ 
                $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                return false;
        });
        
        
        
       


});
	</script>

<!--slider Js-->





<script type="text/javascript">
var baseurl="<?php echo base_url();?>";	
$(document).ready(function(){
	//global vars
	var form = $("#signupForm");
	var username = $("#username");
	var usernameInfo = $("#username_error");
	var email = $("#email");
	var emailInfo = $("#email_error");
	var pass1 = $("#password");
	var pass1Info = $("#password_error");
	var pass2 = $("#passwordconf");
	var pass2Info = $("#retype_password_error");
	var privacyerror = $("#privacy_error");
	
	var check1 = false;
	var check2 = false;
	var check3 = false;
	var check4 = false;
	var check5 = false;
	
	//On blur
	username.blur(validateUsername);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	email.blur(validateEmail);
	//On key press
	pass1.keyup(validatePass1);
	pass2.keyup(validatePass2);
	//message.keyup(validateMessage);
	//On Submitting
	form.submit(function(){
		check1=validatePrivacySetting();
		var check6=validateUsername();
		var check7=validateEmail();
		check4=validatePass1();
		check5=validatePass2();
		if( check1 && check2 && check3 && check4 && check5)
			return true;
		else
			return false;
	});
	
	function validateUsername()
	{
		var username = $("#username");
		var usernameInfo = $("#username_error p");

		if(username.val().length < 3)
		{
			usernameInfo.css('display','block');
			usernameInfo.text("Please input your desired username and should be alphanumeric with 3 characters long.");
			return false;
		}
		else if(username.val().length >= 3 & !isAlphanumeric(username.val()))
		{
			usernameInfo.css('display','block');
			usernameInfo.text("Username should be alphanumeric and at least 3 characters long.");
			return false;
		}
		else
		{
			$.post(baseurl+"user/register/is_exist_username", {
        											username: username.val()
      											 }, function(response){
        																if(response=="1")
																			{
																				usernameInfo.css('display','none');
																				usernameInfo.text("");
																				check2 = true;
																			}
																		else
																			{
																				usernameInfo.css('display','block');
																				usernameInfo.text("The username you supplied is already taken.");
																				check2 = false;
																			}
																		}
									);
		}
	}
	
	function validatePass1(){
	
		var pass1 = $("#password");
		var pass1Info = $("#password_error p");
		if(pass1.val()=="" || pass1.val()==null)
		{
			pass1Info.css('display','block');
			pass1Info.text("Please input your desired password.");
			return false;
		}
		else if(pass1.val().length <6)
		{
			pass1Info.css('display','block');
			pass1Info.text("Password should be at least 6 characters long.");
			return false;
		}
		else
		{
			pass1Info.css('display','none');
			pass1Info.text("");
			return true;
		}
		
	}
	
	function validatePass2(){
	
		var pass1 = $("#password");
		var pass1Info = $("#password_error p");
		
		var pass2 = $("#passwordconf");
		var pass2Info = $("#retype_password_error p");
		
		if(pass2.val().length < 1)
		{
			pass2Info.css('display','block');
			pass2Info.text("Please input your password again.");
			return false;
		}
		else if((pass1.val() != pass2.val()) ){
			pass2Info.css('display','block');
			pass2Info.text("Retyped Password Doesn't match.");
			return false;
		}
		else
		{
			pass2Info.css('display','none');
			pass2Info.text("");
			return true;
		}
	}
	
	
	function validateEmail(){
		var email = $("#email");
		var emailInfo = $("#email_error p");
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		if(email.val().length < 1)
		{
			emailInfo.css('display','block');
			emailInfo.text("Please input your email address.");
			return false;
		}
		else if(filter.test(email.val()))
		{
			$.post(baseurl+"user/register/is_exist_email", {
        											email: email.val()
      											 }, function(response){
        																if(response=="1")
																			{
																				emailInfo.css('display','none');
																				emailInfo.text("");
																				check3 = true;	
																			}
																		else
																			{
																				emailInfo.css('display','block');
																				emailInfo.html("The email is already registered.");
																				check3 = false;	
																			}
																		});	
		}
		else
		{
			emailInfo.css('display','block');
			emailInfo.text("Please input a valid email address.");
			return false;
		}
		return true;
	}
	
	
	
	
	function validatePrivacySetting()
	{
		var privacyerror = $("#privacy_error p");
		
		if($("#terms_conditions").attr("checked"))
		{
			privacyerror.css('display','none');
			privacyerror.text("");
			return true;
		}
		else
		{
			privacyerror.css('display','block');
			privacyerror.text("Please check Twinne's Terms & Conditions");
			return false;
		}
	}
});	
</script>







</head>
<body>
<?php //$this->load->view("currencyconverter.php"); ?>
<div id="top"></div>
<div id="wrapper">
  <!--Header Start-->
  <?php $this->load->view("header"); ?>
  <!--Page Content Start-->
  <div id="mid_content">


		<ul class="tabbernav">
      		<li><a href="<?php echo base_url(); ?>user/login" title="ALREADY A MEMBER">ALREADY MEMBER</a></li>
      		<li class="tabberactive"><a href="<?php echo base_url(); ?>user/register" title="NEW MEMBER">NEW MEMBER</a></li>
			<div style="clear:both"></div>
    	</ul>
    

    <div class="tabbertab">
   
      <div class="single_product_down_tab">
        <div class="register_box">
          <div style="padding:20px; background:#fff;" id="inline_example2">
             <div class="register_content">
                  <div class="register_content_left">
					
                    <div class="error"></div>
                    
                    <div class="register_heading">Register</div>
                    <div class="register_form">
                      <?php 
					  	$attributes = array('name'=>'signupForm','id'=>'signupForm');
						echo form_open("register",$attributes);  
					  ?>
                      	
                      	<div class="input_container">
                        <label>Username</label>
                      	<input type="text" value="" name="username" id="username" />
                        <div class="clear"></div>
                        <?php if( isset($errors) && array_key_exists("username",$errors) && in_array('<span>min_length</span>',$errors) ) { ?>
                        	<div id="username_error" class="error"><p>Username should be at least 3 characters long</p></div>
                        <?php }elseif( isset($errors) && array_key_exists("username",$errors) && in_array('<span>The Username you supplied is already taken.</span>',$errors) ){?>    
                         	<div id="username_error" class="error"><p>The username you supplied is already taken</p></div>
                        <?php }elseif(isset($errors) && array_key_exists("username",$errors)){?>    
                        	<div id="username_error" class="error"><p>Please input your desired username and it should be alphanumeric</p></div>
						<?php }else{?>
                        	<div id="username_error" class="error"><p style="display:none;"></p></div>
                        <?php } ?>
                        </div>
                        
                      	<div class="input_container">
                      	<label>Password</label>
                      	<input type="password" value="" name="password" id="password" />
                      	<div class="clear"></div>
                        <?php if( isset($errors) && array_key_exists("password",$errors) && in_array('<span>min_length</span>',$errors) ) { ?>
                        	<div id="password_error" class="error"><p>Password should be at least 6 characters long</p></div>
                        <?php }elseif(isset($errors) && array_key_exists("password",$errors)){?>    
                        	<div id="password_error" class="error"><p>Please input your desired password</p></div>
						<?php }else{?>
                        	<div id="password_error" class="error"><p style="display:none;"></p></div>
                        <?php } ?>
                        </div>
                        
                        <div class="input_container">
                      	<label>Re-type Password</label>
                      	<input type="password" value="" name="passwordconf" id="passwordconf" />
                      	<div class="clear"></div>
                        <?php if( isset($errors) && array_key_exists("confirm_password",$errors) && in_array('<span>matches</span>',$errors) ) { ?>
                        	<div id="retype_password_error" class="error"><p>Retyped Password Doesn't match</p></div>
                        <?php }elseif(isset($errors) && array_key_exists("confirm_password",$errors)){?>    
                        	<div id="retype_password_error" class="error"><p>Please input your password again</p></div>
						<?php }else{?>
                        	<div id="retype_password_error" class="error"><p style="display:none;"></p></div>
                        <?php } ?>
                        </div>
                        
                        <div class="input_container">
                      	<label>Email</label>
                      	<input type="text" value="<?php if(isset($fb_email)) echo $fb_email; else echo $this->input->post('email'); ?>" name="email" id="email" />
                      	<div class="clear"></div>
                         
                        <?php if( isset($errors) && array_key_exists("email",$errors) && in_array('<span>valid_email</span>',$errors) ) { ?>
                        	<div id="email_error" class="error"><p>Please input a valid email address</p></div>
                        <?php }elseif( isset($errors) && array_key_exists("email",$errors) && in_array('<span>The Email Address you supplied is already taken.</span>',$errors) ){?>    
                         	<div id="email_error" class="error"><p>The email address you supplied is already in our system</p></div>
                        <?php }elseif(isset($errors) && array_key_exists("email",$errors)){?>    
                        	<div id="email_error" class="error"><p>Please input your email address</p></div>
						<?php }else{?>
                        	<div id="email_error" class="error"><p style="display:none;"></p></div>
                        <?php } ?>
                        </div>
		      
		       			<label>I am</label>
						<div class="i-am-btn-box1" style="margin-top:12px; margin-bottom:12px;">
                            <div id ='gman' class="manbtn genderselectedm">
                                <a href="javascript:void(0);">MAN</a>
                            </div>
                            <div id='gwoman' class="womanbtn">
                                <a href="javascript:void(0);">WOMAN</a>
                            </div>
                            <div class="clear"></div>
						</div>
                		<div class="clear"></div>
						<input type='hidden' name='gender' id='gndr' value="male" />
							
		      			 <div class="register_check_box">
                         <div style="display:none">
                            <input type="checkbox"  name="privacy_policy" value="1" id="privacy_policy" checked="checked" />
                            <div class="register_check_text">I accept Twinne's Privacy Policy</div>
                            <div class="clear" style="height:10px;"></div>
                         </div>   
                            <input type="checkbox" name="terms_conditions" value="1" id="terms_conditions" />
                            <div class="register_check_text">I accept Twinne's Terms & Conditions</div>
                            <div class="clear" style="height:10px;"></div>
                            
                            <input type="checkbox"  name="notification" value="1" />
                            <div class="register_check_text">Notify me by e-mail about Twinne's discounts and news</div>
                            <div class="clear"></div>
                         </div>
                         	<?php if(isset($_POST['user_register']) && !isset($_POST['privacy_policy']) && !isset($_POST['terms_conditions'])){?>
                				<div id="privacy_error" class="clear error">Please check Twinne's Privacy Policy and Terms & Conditions</div>
                			<?php }else{?>
                        		<div id="privacy_error" class="error"><p style="display:none;"></p></div>   
                        	<?php } ?>
                            
                            
                          <div class="register_check_box">
                          	<input type="hidden" name="fb_uid" id="fb_uid" value="<?php if(isset($fb_uid)) echo $fb_uid;?>">
                          	<input type="hidden" name="comes_from" id="comes_form" value="<?php if($this->input->post('comes_from')){echo $this->input->post('comes_from');}elseif(isset($ref_url)) echo $ref_url; ?>"> 
                            <input class="join_commiti" value="&nbsp;" type="submit" name="user_register" />
                         	<div class="clear"></div>
                         </div>
                          
                          	<script>
                			$('#gman a').click(function() {
                              //$('#genderman').removeClass('manbtn');
                              $('#gman').addClass('genderselectedm');
                              $('#gwoman').removeClass('genderselectedw');
                              $('#gndr').val('male');
                              
                              });
                            $('#gwoman a').click(function() {
                              $('#gwoman').addClass('genderselectedw');
                              $('#gman').removeClass('genderselectedm');
                              $('#gndr').val('female');
                              });
                            </script>
	  
							<script type="text/javascript" src="<?php echo base_url(); ?>js/mailing-list.js"></script>
                          
                      	<div class="clear"></div>
                     <?php echo form_close(); ?>
                    </div>
                  </div>
				  <?php
				  if(!isset($_COOKIE['fbsr_'.FACEBOOK_API_KEY])){
				  ?>
                  <div class="register_content_right">
                    <div class="or">Have a Facebook account?</div>
                    <input type="button" value="" class="facebook_btn" onclick="window.location='<?php echo base_url();?>user/login/facebooklogin';">
                    <div class="or" style="padding: 30px 0pt 0pt;">Already a member?</div>
                    <div class="or"><span><a class="example8" href="javascript:void(0);">Sign in here</a></span></div>
                    <div class="clear"></div>
                  </div>
		<?php } ?>
            <div class="clear"></div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
</div>
  <!--Home Page Content End-->
  <!--Footer Start -->
  <?php $this->load->view("footer"); ?>
  <!--Footer End -->
  <div class="clear"></div>
</div>
</body>
</html>