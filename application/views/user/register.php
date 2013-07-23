<script type="text/javascript">
var baseurl="<?php echo base_url();?>";	
$(document).ready(function(){
	//global vars
	var form = $("#signupForm_popup");
	var username = $("#username_popup");
	var usernameInfo = $("#username_error_popup");
	var email = $("#email_popup");
	var emailInfo = $("#email_error_popup");
	var pass1 = $("#password_popup");
	var pass1Info = $("#password_error_popup");
	var pass2 = $("#passwordconf_popup");
	var pass2Info = $("#retype_password_error_popup");
	var privacyerror = $("#privacy_error_popup");
	
	var check1 = false;
	var check2 = false;
	var check3 = false;
	var check4 = false;
	var check5 = false;
	
	//On blur
	username.blur(validateUsername_popup);
	pass1.blur(validatePass1_popup);
	pass2.blur(validatePass2_popup);
	email.blur(validateEmail_popup);
	//On key press
	pass1.keyup(validatePass1_popup);
	pass2.keyup(validatePass2_popup);
	//message.keyup(validateMessage);
	//On Submitting
	form.submit(function(){
		check1=validatePrivacySetting_popup();
		
		var check6=validateUsername_popup();
		var check7=validateEmail_popup();
		check4=validatePass1_popup();
		check5=validatePass2_popup();
		if( check1 && check2 && check3 && check4 && check5)
			return true;
		else
			return false;
	});
	
	function validateUsername_popup()
	{
		var username = $("#username_popup");
		var usernameInfo = $("#username_error_popup p");

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
	
	function validatePass1_popup(){
	
		var pass1 = $("#password_popup");
		var pass1Info = $("#password_error_popup p");
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
	
	function validatePass2_popup(){
	
		var pass1 = $("#password_popup");
		var pass1Info = $("#password_error_popup p");
		
		var pass2 = $("#passwordconf_popup");
		var pass2Info = $("#retype_password_error_popup p");
		
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
	
	
	function validateEmail_popup(){
		var email = $("#email_popup");
		var emailInfo = $("#email_error_popup p");
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
																				//email.removeClass("error");
																				emailInfo.css('display','none');
																				emailInfo.text("");
																				//alert("return email true");
																				check3 = true;	
																			}
																		else
																			{
																				//email.removeClass("error");
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
	
	
	function validatePrivacySetting_popup()
	{
		var privacyerror = $("#privacy_error_popup p");
		
		if($("#terms_conditions_popup").attr("checked"))
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

function isAlphanumeric(inputValue)  
 	{  
		var regexp = /^[a-zA-Z0-9-_]+$/;
		//alert(inputValue);
		if (inputValue.search(regexp) == -1)
    		return false;
		else
    		return true;
 	}	
</script>
<div class="rigister" style="padding-left: 11px; width: auto;">
  
  <p><a class='example7' href="javascript:void(0);">Join</a></p>
  <!-- This contains the hidden content for inline calls -->
  <div style='display:none' class="login_page">
    <div id='inline_example2' style='padding:20px; background:#fff;'>
      <h2>JOIN THE COMMUNITY</h2>
      <div class="login_content">
        <?php 
			$attributes = array('name'=>'signupForm_popup','id'=>'signupForm_popup');
			echo form_open("register",$attributes); 
		?>
        <div class="login_content_left2">
            <label>Username</label>
           	<input type="text" value="" name="username" id="username_popup" />
           	<div class="clear"></div>
           	<div id="username_error_popup" class="error"><p style="position:absolute; top:132px; left:250px; display:none;"></p></div>
           
            <div class="gap"></div>
           	<label>Password</label>
           	<input type="password" value="" name="password" id="password_popup" />
           	<div class="clear"></div>
            <div id="password_error_popup" class="error"><p style="position:absolute; top:186px; left:250px; display:none;"></p></div>
           
           	<div class="gap"></div>
            <label>Re-type password</label>
           	<input type="password" value="" name="passwordconf" id="passwordconf_popup" />
           	<div class="clear"></div>
            <div id="retype_password_error_popup" class="error"><p style="position:absolute; top:240px; left:250px; display:none;"></p></div>
           	
            <div class="gap"></div>
            <label>e-mail</label>
           	<input type="text" value="" name="email" id="email_popup" />
          	<div class="clear"></div>
            <div id="email_error_popup" class="error"><p style="position:absolute; top:293px; left:250px; display:none;"></p></div>
            
            <div class="gap"></div>
            <label>I am</label>
            <div class="i-am-btn-box">
                <div id ='genderman' class="manbtn genderselectedm"><a href="javascript:void(0);">MAN</a></div>
                <div id='genderwoman' class="womanbtn"><a href="javascript:void(0);">WOMAN</a></div>
                <div class="clear"></div>
            </div>

	  		<input type='hidden' name='gender' id='gender' value="male" />
	  

            <div class="check_box2">
            
            <div style="display:none">
          		<input type="checkbox" value="1" name="privacy_policy" id="privacy_policy_popup" checked="checked"/>
               	<label>I accept Twinne’s Privacy Policy</label>
               	<div class="clear" style="height:10px;"></div>
            </div>   
               	<input type="checkbox" value="1" name="terms_conditions" id="terms_conditions_popup" />
               	<label> I accept Twinne’s <a class="example19" href="<?php echo base_url();?>pages/terms">Terms & Conditions</a></label>
               	<div class="clear" style="height:10px;"></div>
               
               	<input type="checkbox" value="1" checked="checked" name="notification" id="notification_popup" />
               	<label>Notify me by e-mail about Twinne’s discounts and news</label>
               	<div class="clear"></div>                
      		</div>
            <div class="check_box2" style="width:100%; padding:0px;">
            	<div id="privacy_error_popup" class="error"><p style="position:absolute; top:420px; left:250px; display:none;"></p></div>
          	</div>
          	<script>
				$(document).ready(function() {
				  $('#genderman a').click(function() {
					
				//$('#genderman').removeClass('manbtn');
				$('#genderman').addClass('genderselectedm');
				$('#genderwoman').removeClass('genderselectedw');
				$('#gender').val('male');
				
					});
				  $('#genderwoman a').click(function() {
					$('#genderwoman').addClass('genderselectedw');
				$('#genderman').removeClass('genderselectedm');
				$('#gender').val('female');
					});
				});
			</script>
	  
			<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/mailing-list.js"></script>-->
          
        	<input type="submit" class="account" value="&nbsp;" name="user_register" />

        	<div class="clear"></div>
        </div>
        <?php echo form_close(); ?>
          
          
          
          
        <div class="login_content_right2"> <p>Have a Facebook account?</p>
        <input type="button" class="facebook_btn" value="&nbsp;" id="facebook_btn"  onclick="window.location='<?php echo base_url();?>user/login/facebooklogin';" />
        <p style="padding:30px 0 0 0;">Already a member?</p>
        <p><span><a class="example8" href="javascript:void(0);">Sign in here</a></span></p>
        <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
</div>