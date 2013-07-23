  <div style='display:none' class="login_page">
    <div id='inline_example14' style='padding:20px; background:#fff;'>
       
        <?php echo form_open('user/forgot_password');?>
      <h2>Forgot Your Password?</h2>
      
      <div class="forgot_password_content">
        
        <div class="login_content_left" style="width: 310px;">
        <label>Enter your email here and click on submit button and we will send you instructions to reset your password to your email.</label>
        <br /> <br />
         <label>E-mail</label><br />
          <input type="text" value="" name="email" />
           <div class="clear"></div>
         <div class="passwordbutton-box">
           <input type="submit" value="" name="user_login" />
          <div class="clear"></div>
         </div>

        </div>
      	
      <div class="clear"></div>
      
      </div>
     <?php echo form_close(); ?>
    </div>
  </div>