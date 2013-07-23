<?php //echo "<pre>"; print_r($errors); die;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery</title>
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/example-2.css" TYPE="text/css" MEDIA="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/colorbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/example-3.css" TYPE="text/css" MEDIA="screen" />
<!--Select Box Js Start-->
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

<!--Select Box Js End-->
<!--LightBox Js-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.colorbox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.cookie.js"></script>
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
<!--cufon Js-->
<script src="<?php echo base_url(); ?>js/cufon_min.js"></script>
<script src="<?php echo base_url(); ?>js/Oswald_400.font.js"></script>
<script type="text/javascript">
        Cufon.replace('.nav_box'); // Works without a selector engine
		Cufon.replace('.shop_box'); // Works without a selector engine
		Cufon.replace('.profile_box_text h2'); // Works without a selector engine
		Cufon.replace('.footer_menu_1 h2 ,.footer_menu_2 h2 ,.footer_menu_3 h2 ,.footer_menu_4 h2'); // Works without a selector engine
</script>
<!--tab Js-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/tabber.js"></script>
<!--slider Js-->
</head>
<body>
<div id="top"></div>
<div id="wrapper">
  <!--Header Start-->
  <?php $this->load->view("header"); ?>
  <!--Header End-->
  <?php $this->load->view('top_banner'); ?>
  <div class="bottem_border"></div>
   <!--Page Content Start-->
  <div id="mid_content">
    
	<div class="top-menu">
      <ul>
        <li class="tab-memu-select"><a href="contest_submission.html">1. LOGIN/REGISTER</a></li>
        <li><a href="#">2. READ THE GUIDELINES</a></li>
        <li><a href="#">3. SUBMIT YOUR DESIGN</a></li>
        
      </ul>
      <div class="clear"></div>
    </div>
	
		
        <!--tabber -1 Start-->
        <div class="tabbertab">
		<?php if (isset($errors)){
                  			foreach ($errors as $key =>$value){
                  				if ($key == 'confirm_password' && trim($value)=='<span>matches</span>'){
                  					echo "<div class='update_error'>".' Confirm password does not match.'."</div>";
                  				}elseif ($key == 'email' && trim($value)=='<span>valid_email</span>'){
                  					echo "<div class='update_error'>".'Email is invalid.'."</div>";
                  				}
                  				elseif ($key == 'username' && trim($value)=='<span>min_length</span>'){
                  					echo "<div class='update_error'>".' Username should be atleast of 3 charactors.'."</div>";
                  				}
                  				elseif ($key == 'username' && trim($value)=='<span>The Username you supplied is already taken.</span>'){
                  					echo "<div class='update_error'>".' This Username already exists. '."</div>";
                  				}
                  				elseif ($key == 'email' && trim($value)=='<span>The Email Address you supplied is already taken.</span>'){
                  					echo "<div class='update_error'>".' This email address already exists. '."</div>";
                  				}
						elseif ($key == 'password' && trim($value)=='<span>min_length</span>'){
                  					echo "<div class='update_error'>".' Password should be atleast of 6 charactors.'."</div>";
                  				}
                  				else {
                  					echo "<div class='update_error'>".$key.' is '.$value."</div>";
                  				}
                  			}
       					}
       					if (isset($terms)){
       						echo "<div class='update_error'>Please select the Twinne's terms and conditions.</div>";
       					}
       					if (isset($privacy)){
       						echo "<div class='update_error'>Please select Twinne's privacy policy.</div>";
       					}
					if (isset($msg)){
       						echo "<div class='update_error'>New password has been sent to your mail address.</div>";
       					}
       		?>
	<?php if (isset($not_login) || isset($not_login1)){?>
                  <div class="update_error">You have to login first!!</div>
                  <?php }?>
				   <?php
				  if(isset($_COOKIE['fbsr_'.FACEBOOK_API_KEY])){
				  ?>
				  <div class="update_error1">You have to login or register for complete the process</div>
				<?php }else{?>
                  <?php if (isset($error)){?>
                  	<div class="update_error1"><?php echo $this->form_validation->_error_array[0];?></div>
                  <?php }}?>
          <div class="login_taber_box">
           
            <?php echo form_open('contest_login'); ?>
            <input type="hidden" name="current_loc" value='<?php echo $current_loc; ?>' />
       <input type="hidden" name="query_str" value='<?php echo $query_str; ?>' />

           <div class="login_taber_login">
            
            <h1 class="register_heading">Login</h1>
           
            <div class="login_content_left" style="padding:25px 0 ;">
                  <label>Username</label>
                  <input type="text" name="username" value="" />
                  <label>Password</label>
                  <input type="password" name="password" value="" />
                  <div class="check_box">
                    <input type="checkbox" value="1" name="remember_me " />
                    <label>Remember me</label>
                    <div class="clear"></div>
                  </div>
                  <div class="loginbutton-box">
                    <input type="submit" name="user_login" value="" />
                    <div class="register_check_text1"><a href="#" class="example15">Forgot your password ?</a>
                        </div>
                    <div class="clear"></div>
                  </div>
                </div>
           
          
           </div>
            <?php echo form_close(); ?>
            <?php echo form_open('contest_register'); ?>
            <input type="hidden" name="current_loc" value='<?php echo $current_loc; ?>' />
       <input type="hidden" name="query_str" value='<?php echo $query_str; ?>' />

          <div class="login_taber_login" >
              <h1 class="register_heading">Register</h1>
               <div class="login_content_left2" style="padding:25px 0 ;">
                  <label>Username</label>
                  <input type="text" name="username" value="" />
                  <div class="clear"></div>
                  <label>Password</label>
                  <input type="password" name="password" value="" />
                  <div class="clear"></div>
                  <label>Re-type password</label>
                  <input type="password" name="passwordconf"value="" />
                  <div class="clear"></div>
                  <label>e-mail</label>
                  <input type="text" name="email" value="" />
                  <div class="check_box2">
                 
                    <input type="checkbox" name="terms_conditions" value="1" />
                    <label> I accept Twinne?s Terms &amp; Conditions</label>
                    <div style="height: 10px;" class="clear"></div>
                    <input type="checkbox" value="1" name="notification"/>
                    <label>Notify me by e-mail about Twinne?s 
                    discounts and news</label>
                    <div class="clear"></div>
                  </div>
                  <input type="submit" value="" class="join_commiti" />
                  <div class="clear"></div>
                </div>
          </div>
          <?php echo form_close(); ?>
	  
	   <?php
		if(!isset($_COOKIE['fbsr_'.FACEBOOK_API_KEY])){
				  ?>
           <div class="login_taber_login_2">
             <h1 class="register_heading">Sign in with Facebook</h1>
              <input type="button" value="" class="facebook_btn" onclick="fbAction()">
           </div>
	   <?php } ?>
           <div class="clear"></div>
          </div>
        </div>
        <!--tabber -1 End-->
        <!--tabber -2 Start-->
        
     
        
        <!--tabber -3 End-->
  
     
    <div class="clear"></div>
  </div>
  
  <?php $this->load->view("footer"); ?>
  <!--Footer End -->
  <div class="clear"></div>
</div>
</body>
</html>
<?php $this->load->view('user/forgot_password');?>