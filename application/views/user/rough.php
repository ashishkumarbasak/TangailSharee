<div class="earning_box_left">
            <h1>ADD A NEW DESIGN</h1>
            <p>Put some info here about the design (i.e. max size is 
              3000x4000px at 300 dpi) </p>
            <p><a href="#">Put some info here about the design (i.e. max size is 
              3000x4000px at 300 dpi)</a> </p>
            <div class="terms-conditions" style="margin:0 0 0 30px;">T-shirt template</div>
            <div class="clear" style="height:15px;"></div>
            <h1>Title of the t-shirt</h1>
            <p style="padding:10px 0;">Here is the brief description added by the designer, or the
              additional info he wants to add. </p>
            <div class="tshirt_imagebox">
              <div class="tshirt_imagebox_left">
                <div class="tshirt_imagebox_left_in">
                  <div class="tshirt_image"><img src="images/add_desigen_image.jpg" alt="add" /></div>
                  <div class="green_box">1</div>
                </div>
              </div>
              <div class="tshirt_imagebox_left">
                <div class="tshirt_imagebox_left_in">
                  <div class="tshirt_image"><img src="images/add_desigen_image.jpg" alt="add" /></div>
                  <div class="green_box">2</div>
                </div>
              </div>
              <div class="tshirt_imagebox_left">
                <div class="tshirt_imagebox_left_in">
                  <div class="tshirt_image"><img src="images/add_desigen_image.jpg" alt="add" /></div>
                  <div class="green_box">3</div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="open_button2">Compliments! Your design has been approved</div>
            <h3 style=" padding:15px 0;">ATTACH A NEW PREVIEW</h3>
            <div class="select_file_box">
              <div style="float:left"><img src="images/select_icon.png" alt="image" /></div>
              <div style="float:left">
                <input type="button" value="" class="scegli_file_button1">
              </div>
              <label>No file selected</label>
              <div class="clear"></div>
              <p>JPG, GIF or PNG.  Max size is 2MB.</p>
            </div>
            <span class="file-wrapper">
  				<input type="file" name="design" id="userfile" />
  				<span class="button"></span>
			</span> 
            <p style="padding:0px; font-size:10px;">(Once your design will be approved, it will be printed too!)</p>
            
            
             <div class="comment_box_left">
       		<div class="comment_title"><?php $i=0; foreach ($design->comment as $c){ $i++; }echo $i;?> Comments </div>
           <?php $i=1; foreach ($design->comment as $c){?>
          <div class="comment_in_box">
            <div class="user_image">
            <?php if(isset($img[$i-1])){ ?>
            <img alt="comment_image" src="<?php echo base_url(); ?>images/profile_image/short_image/<?php echo $img[$i-1]; ?>">
            <?php }
            else {?>
            <img alt="comment_image" src="<?php echo base_url(); ?>images/no_image_48.jpg">
            <?php }?>
            </div>
            <div class="comment_in_box_right">
              <h3><?php echo $uname[$i-1];?><span>
              <?php 
			 	$format = 'DATE_RFC1123';
				$date=explode('+',standard_date($format, $c->date));
				echo $date[0];
				 ?>
	 </span></h3>
              <p><?php echo $c->content;?></p>
            </div>
            <div class="clear"></div>
          </div>
			<?php $i++;}?>
          <div class="comment_in_box2">
            <div class="user_image">
            <?php if ($this->session->userdata('user_id')){
            	if (isset($loged_user->image->filename)){
            	?>
            <img alt="comment_image" src="<?php echo base_url(); ?>images/profile_image/short_image/<?php echo $loged_user->image->filename; ?>">
            <?php
            	}
            	else  {?>
		            <img alt="" src="<?php echo base_url(); ?>images/no_image_48.jpg">
		            <?php }
            	} else  {?>
            <img alt="" src="<?php echo base_url(); ?>images/no_image_48.jpg">
            <?php }?>
            </div>
            <div class="comment_in_box_right">
              <h4>LEAVE A COMMENT...</h4>
            </div>
            <div class="clear"></div>
          </div>
          <?php echo form_open('upcoming_designs/saveComment/'.$design->id);?>
          <textarea class="comment_textarea" name='comment'></textarea>
           <div class="clear"></div>
          <input type="submit" class="post_comment_button">
          <?php echo form_close();?>
        </div>
       </div>
       <?php }?>