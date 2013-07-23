<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php echo lang('login_to_your_account');?>
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
var baseurl="<?php echo base_url();?>";	
$(document).ready(function(){
	//global vars
	var form = $("#SigninForm");
	var signin_username = $("#signinusername");
	var signin_password = $("#signinpassword");
	
	var check1 = false;
	var check2 = false;
	//On blur
	signin_username.blur(SigninUsernameValidate);
	signin_password.blur(SigninPasswordValidate);
	//On Submitting
	form.submit(function(){
		check1=SigninUsernameValidate();
		check2=SigninPasswordValidate();
		if( check1 && check2)
			return true;
		else
			return false;
	});
	
	function SigninUsernameValidate(){
		var signin_username = $("#signinusername");
		if(signin_username.val().length < 1){
			signin_username.css("border","solid red 1px");
			return false;
		}
		else{
			signin_username.css("border","solid #cccccc 1px");
			return true;
		}
	}
	
	function SigninPasswordValidate()
	{
		var signin_password = $("#signinpassword");
		if(signin_password.val().length < 1){
			signin_password.css("border","solid red 1px");
			return false;
		}
		else{
			signin_password.css("border","solid #cccccc 1px");
			return true;
		}
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
<script type="text/javascript">
$(document).ready(function(){
        //Examples of how to assign the ColorBox event to elements
        
		$("a[rel='example1']").colorbox();
        $("a[rel='example2']").colorbox({transition:"fade"});
        $("a[rel='example3']").colorbox({transition:"none", width:"75%"});
        $("a[rel='example4']").colorbox({slideshow:true});
        $(".example5").colorbox();
        $(".example6").colorbox({iframe:true, innerWidth:425});
        $(".example7").colorbox({width:"580px", transition:"none", inline:true, height:"auto", href:"#inline_example2"});
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
</head>
<body>
<?php //$this->load->view("currencyconverter.php"); ?>
<div id="top"></div>
<div id="wrapper">
  <!--Header Start-->
  <?php $this->load->view("header"); ?>
  
    <div id="mid_content">
		
		<ul class="tabbernav">
      		<li class="tabberactive"><a href="<?php echo base_url(); ?>user/login" title="ALREADY A MEMBER">ALREADY MEMBER</a></li>
      		<li><a href="<?php echo base_url(); ?>user/register" title="NEW MEMBER">NEW MEMBER</a></li>
			<div style="clear:both"></div>
    	</ul>

    	<div class="tabbertab">
      	<div class="single_product_down_tab">
        <div class="register_box">
          <div style="padding:20px; background:#fff;" id="inline_example2">
            
            <div class="register_content">
              <div class="register_content_left">
	
		<script>
		
		$(document).ready(function(){
    			//Close button:
    			setTimeout("$('.inline_notification').slideUp(400)", 6500);
    			$(".inline_notification").click(
					function () {
						$(this).fadeTo(450, 0, function () { // Links with the class "close" will close parent
						$(this).slideUp(400);
						});
					return false;
					}
					);
    			
    	});
		
		</script>

		
		<?php
			if (isset($msg)){
				echo "<div class='inline_notification'>Instrucions has been sent to your mail address</div>";
			}
                        
                        if($this->session->userdata('display_error')=="yes" )
                        {
                            echo "<div class='inline_notification'>".$this->session->userdata('error_message')."</div>";
                            $this->session->unset_userdata('display_error');
                            $this->session->unset_userdata('error_message');
                            
                        }
		?>
                  
                  
                  <?php 
				  	if (isset($not_login) || isset($not_login1))
				  	{
					?>
                 	 	<div class="error inline_notification">You have to login first!!</div>
                  	<?php 
					}
					?>
				  	<?php 
					//print_r($error);
					if (isset($error) && $this->input->post('user_login')){?>
                  		<div class="error inline_notification"><?php echo $this->form_validation->_error_array[0];?></div>
                  	<?php }?>
                  
                <div class="register_heading">Login</div>
                <div class="register_form">
                  <?php echo form_close(); ?>
                        
						
				<?php 
				$attributes = array('name'=>'SigninForm','id'=>'SigninForm');
				echo form_open("login",$attributes ); 
				?>
                    <label>Username</label>
                      <input type="text" value="" name="username" id="signinusername" />
                      <div class="clear"></div>
                      <label>Password</label>
                      <input type="password" value="" name="password" id="signinpassword" />
                      <div class="clear"></div>
                      <div class="register_check_box" style="margin-top:12px;">
                        <input type="checkbox" value="1" name="remember_me" />
                        <div class="register_check_text">Remember me</div>
                        <div class="clear"></div>
						<?php
						if($this->session->userdata('ref_url')!=NULL){?>
							<input type="hidden" name="ref_url" value="<?php echo $this->session->userdata('ref_url');?>" />
						<?php }	?>
						
                        <input type="submit" value="&nbsp;" class="login_submit" name="user_login" />
                        <div class="register_check_text1"><a href="javascript:void(0);" class="example15">Forgot your password?</a>
                        </div>
                        
                        <div class="clear"></div>
                      </div>
                      <div class="clear"></div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                  
                  
                  
                  
		
   		
                  
                  
                  
                  
                  
                  
                  
                  
                  <?php
				  if(!isset($_COOKIE['fbsr_'.FACEBOOK_API_KEY])){
				  ?> 
                  
					<div class="register_content_right">
                    <div class="or"> or</div>
                    
                    <!-- Or you can use XFBML -->
  					<div class="fb-login-button" data-show-faces="false" data-width="100" data-max-rows="1" data-scope="email,user_birthday,publish_stream"></div>
  					
                    
                    <input type="button" value="" class="facebook_btn" onclick="window.location='<?php echo base_url(); ?>user/login/facebooklogin';">
                    <div class="or" style="padding: 30px 0pt 0pt;">Not still a member?</div>
                    <div class="or"><span><a href="<?php echo base_url(); ?>user/register">Create your account now</a></span></div>
                    <div class="clear"></div>
                  </div>
		<?php } ?>
              
              <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
    <!--Home Page Content End-->
  <!--Footer Start -->
  <?php $this->load->view("footer"); ?>
  <!--Footer End -->
  <div class="clear"></div>
</div>
</body>
</html>