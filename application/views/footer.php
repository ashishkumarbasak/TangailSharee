<?php $this->load->view('user/forgot_password'); ?>

<!--Footer Start PROVA-->
  <div class="footer">
    <div class="discounts-news-box">
      <div class="discounts-news-box_left">
        <label>Get exclusive discounts & news!</label>
        <?php
        echo form_close();
        $attributes = array( 'id' => 'subscribe');
        echo form_open('user/register/subscribeNews',$attributes); ?>
        <input type="text" onblur="if(this.value==''){this.value='Name'}" onclick="if(this.value=='Name'){this.value=''}" value="Name" name="NAME" class="" />
        <input type="text" onblur="if(this.value==''){this.value='Email'}" onclick="if(this.value=='Email'){this.value=''}"value="Email" name="email" id="email"/>
        <!-- <input class="discounts-button man_news" value="" type="submit" name="sub_button" /> -->
        <input class="discounts-button woman_news" value="" type="submit" name="sub_button"/>
        <?php  echo form_close(); ?>
        <div class="clear"></div>
	   <?php echo form_error('email', '<div class="update_error">', '</div>'); ?>
      </div>
      <div class="social-media_box">
        <h3>Socialize</h3>
        <ul>
          <li><a class="footer_facebook" target="_blank" href="https://www.facebook.com/TangailShareeDotCom"></a></li>
          <li><a class="footer_twitter" target="_blank" href="https://twitter.com/Tangail_sharee"></a></li>
          <li><a class="footer_pinterest" target="_blank" href="https://pinterest.com/Tangailsharee"></a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <!--Footer menu Start -->
   <?php // echo $footer_menu; ?>
    <!--Footer Start -->
  <div class="footer_back">
   
    <!--Footer menu Start -->
    <div class="footer_menu_box">
    <div class="copy_right">
    	
    <p>&copy; 2015 TANGAIL-SHAREE.com</p>
    <ul class="footer_links">    	
    	<li><a href="#">Home</a></li>
    	<li>/</li>
    	<li><a href="mailto:info@tangail-sharee.com">Contact</a></li>
    	<li>/</li>
    	<li><a href="mailto:support@tangail-sharee.com">Support</a></li>
    	<li>/</li>
    	<li><a href="<?php echo base_url();?>pages/terms">Terms &amp; Conditions</a></li>
    	<li>/</li>
    	<!-- <li><a href="<?php echo base_url();?>pages/delivery_returns_terms_conditions">Deliveries &amp; Returns</a></li>
    	<li>/</li> //-->
    	<!-- <li><a href="<?php echo base_url();?>pages/faq">FAQ</a></li> //-->
      <li><a href="mailto:support@tangail-sharee.com">Deliveries &amp; Returns</a></li>
      <li>/</li>
      <li><a href="mailto:support@tangail-sharee.com">FAQ</a></li>    	
    </ul> 
    </div> 
    </div> 
    </div>    
    
    <div class="clear"></div>
     
    <div class="pay_pal_box">
      <ul>
      	      	
        <li><img src="<?php echo base_url(); ?>images/pay_pal_1.png" alt="Pay_pal1" /></li>
        <li><img src="<?php echo base_url(); ?>images/amercan_card.png" alt="Pay_pal1" /></li>
        <li><img src="<?php echo base_url(); ?>images/pay_pal_2.png" alt="Pay_pal1" /></li>
        <li><img src="<?php echo base_url(); ?>images/visa_card.png" alt="Pay_pal1" /></li>
        <li><img src="<?php echo base_url(); ?>images/pay_pal.png" alt="Pay_pal1" /></li>
      </ul>
    </div>
  </div>
  
  <div xmlns="http://www.w3.org/1999/xhtml"
  xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
  xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
  xmlns:xsd="http://www.w3.org/2001/XMLSchema#"
  xmlns:gr="http://purl.org/goodrelations/v1#"
  xmlns:foaf="http://xmlns.com/foaf/0.1/"
  xmlns:vcard="http://www.w3.org/2006/vcard/ns#">
 
  <div typeof="gr:BusinessEntity" about="#company">
    <div property="gr:legalName" content="TANGAIL-SHAREE.com"></div>
    <div property="vcard:tel" content="0034 631 421 277"></div>
    <div rel="vcard:adr">
      <div typeof="vcard:Address">
        <div property="vcard:country-name" content="ES"></div>
        <div property="vcard:street-address" content="Sant Gervasi De Cassoles 41"></div>
        <div property="vcard:locality" content="Barcelona"></div>
        <div property="vcard:postal-code" content="08022"></div>
      </div>
    </div>
    <!-- <div rel="foaf:depiction" resource="<?php echo base_url(); ?>images/logo.png"></div> /-->
  </div>
</div>
  
  <!--Footer End -->
<script>
  $(document).ready(function(){
      function validateEmail(elementValue){
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
         return emailPattern.test(elementValue);
      }
      $('#subscribe').submit(function() {
        var email = $('#email').val();
        if(!validateEmail(email)){
            alert("Please enter a valid email address!!");
            return false;
        }
        else {
           $("#subscribe").submit();
        }
    });
});
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/ui_functions.js"></script>
