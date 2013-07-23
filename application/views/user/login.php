<script type="text/javascript">
var baseurl="<?php echo base_url();?>";	
$(document).ready(function(){
	//global vars
	var form = $("#SigninPopupForm");
	var signin_username_popup = $("#signinusername_popup");
	var signin_password_popup = $("#signinpassword_popup");
	
	var check1 = false;
	var check2 = false;
	//On blur
	signin_username_popup.blur(SigninUsernameValidate_popup);
	signin_password_popup.blur(SigninPasswordValidate_popup);
	//On Submitting
	form.submit(function(){
		check1=SigninUsernameValidate_popup();
		check2=SigninPasswordValidate_popup();
		if( check1 && check2)
			return true;
		else
			return false;
	});
	
	function SigninUsernameValidate_popup(){
		var signin_username_popup = $("#signinusername_popup");
		if(signin_username_popup.val().length < 1){
			signin_username_popup.css("border","solid red 1px");
			return false;
		}
		else{
			signin_username_popup.css("border","solid #cccccc 1px");
			return true;
		}
	}
	
	function SigninPasswordValidate_popup()
	{
		var signin_password_popup = $("#signinpassword_popup");
		if(signin_password_popup.val().length < 1){
			signin_password_popup.css("border","solid red 1px");
			return false;
		}
		else{
			signin_password_popup.css("border","solid #cccccc 1px");
			return true;
		}
	}
});	
</script>	

<div class="login">
  	<p><a class='example8' href="javascript:void(0);">Login <span class="sep_sp">&middot;</span></a></p>
	<!-- This contains the hidden content for inline calls -->
  	<div style='display:none;' class="login_page" id="login_box_popup">
    <div id='inline_example1' style='padding:20px; background:#fff;'>
       
    <?php 
		$attributes = array('name'=>'SigninPopupForm','id'=>'SigninPopupForm');
		echo form_open('login',$attributes); 
	?>
		<input type="hidden" name="current_loc" value="<?php echo $current_loc; ?>" />
		<input type="hidden" name="query_str" value="<?php echo $query_str; ?>" />
      	<h2>LOGIN</h2>
      	<div class="login_content">
        	<div class="login_content_left">
         		<label>Username</label>
          		<input type="text" value="" name="username" id="signinusername_popup" />
          		<label>Password</label>
          		<input type="password" value="" name="password" id="signinpassword_popup" />
          		<div class="check_box">
           		<input type="checkbox" value="1" name="remember_me" />
           		<label>Remember me</label>
           		<div class="clear"></div>
          	</div>
         	<div class="loginbutton-box" style="margin-top:12px;">
            <?php
            $query_str = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
			$ref_url = $this->uri->uri_string(). $query_str;
			if($ref_url=="login" || $ref_url=="user/login")
				$this->session->set_userdata('ref_url',$this->session->userdata('ref_url'));
			else
				$this->session->set_userdata('ref_url',$ref_url);
			?>
           		<input type="submit" value="&nbsp;" name="user_login" />
           		<div class="forgot_password">
  				<p><a class='example15' href="javascript:void(0);">Forgot Your Password?</a></p>
           	</div>
          	<div class="clear"></div>
         </div>
		</div>
        <div class="login_content_right">
        <p>or</p>
		 
		<input type="button" class="facebook_btn" value=""  onclick="window.location='<?php echo base_url();?>user/login/facebooklogin';" />
	

	  
	  
        <p style="padding:30px 0 0 0;">Not still a member?</p>
        <p><span><a class='example7' href="javascript:void(0);">Create your account now</a></span></p>
        <div class="clear"></div>
        </div>
      <div class="clear"></div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>