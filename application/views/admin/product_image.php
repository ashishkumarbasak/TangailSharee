<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Tangail-sharee</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>adm/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>adm/css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="<?php echo base_url(); ?>adm/js/jquery/ui.core.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>adm/js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "<?php echo base_url(); ?>adm/images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="<?php echo base_url(); ?>adm/js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="<?php echo base_url(); ?>adm/css/datePicker.css" type="text/css" />
<script src="<?php echo base_url(); ?>adm/js/jquery/date.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 

<?php $this->load->view("admin/header"); ?>

<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">

<?php $this->load->view('admin/message'); ?>


<div id="page-heading"><h1><?php echo $product->name; ?>->Images</h1></div>
 <!--Member taber Start-->
    <div id="vtab">
      <ul>
        <li class="home"><a href="<?php echo base_url();?>admin/product_manager/editProduct/<?php echo $product->id;?>">GENERAL</a></li>
        <li class="home "><a href="<?php echo base_url();?>admin/product_manager/stockManager/<?php echo $product->id;?>">DATA</a></li>
        <li class="home selected"><a href="<?php echo base_url();?>admin/product_manager/imageManager/<?php echo $product->id;?>">IMAGES</a></li>
        <li class="home"><a href="<?php echo base_url();?>admin/product_manager/rewardPointsManager/<?php echo $product->id;?>">REWARD POINTS</a></li>
      </ul>
      <div style="display: block;">


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="<?php echo base_url(); ?>adm/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="<?php echo base_url(); ?>adm/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
            
            
        <?php if($product->for_man=='1'){ ?>   
        <?php echo form_open_multipart('admin/product_manager/saveImage',"name='man_form'"); ?>
            <input type="hidden" value="man" name="man" />
            <input type="hidden" value="<?php echo $product->id ?>" name="product" />
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
		 <?php 
        if (isset($excep)){ ?>
        <tr>
        	<td>
        		<div class='upload_error'><h4><?php echo 'Error: <br /><br />'.$excep->getMessage();?></h4></div><br />
        	</td>
        </tr>
         <?php }?>
        <tr valign="top">
            <td>
            		<div id="step-holder">
                            
                            <div class="step-dark-left"><a href="">Man Images</a></div>
                            <!--<div class="step-dark-right">&nbsp;</div>
                            <div class="step-no-off">2</div>
                            <div class="step-light-left">Select related products</div>
                            <div class="step-light-right">&nbsp;</div>
                            <div class="step-no-off">3</div>
                            <div class="step-light-left">Preview</div>
                            <div class="step-light-round">&nbsp;</div>
                            <div class="clear"></div>-->
                    </div>
                    <!--  end step-holder -->

            </td>
	
        </tr>
            
        <tr>
            <td>
                <div  class="image_gallery">
                    <?php foreach($product->file as $image){
                        if($image->join_type=="man"){
                            ?>
                               <div  class="gallery_content"><img src="<?php echo base_url(); ?>images/product_image/thumb_image/<?php echo $image->filename; ?>" />
                                <?php if($image->join_default=='1'){ ?>
                                    Default &nbsp;
                                    <a href="<?php echo base_url(); ?>admin/product_manager/deleteImage/<?php echo $image->id; ?>" >Delete</a>
                                <?php }else{ ?>
                                    <a href="<?php echo base_url(); ?>admin/product_manager/setImageDefault/<?php echo $image->id; ?>" >Make Default</a>&nbsp;
                                    <a href="<?php echo base_url(); ?>admin/product_manager/deleteImage/<?php echo $image->id; ?>" >Delete</a>
                                <?php } ?>
                                </div>
                        <?php
                        }
                    } ?>
                </div>
            </td>
        </tr>
            
        
                 
        <tr>
            <td>
                UpLoad New Image:<br /><br /><input type="file" class="" name="userfile" />
            </td>
        </tr>    
        
        <tr>
            <td><img src="<?php echo base_url(); ?>adm/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
        
        </tr>    
            
        <tr>
            <td>
                <input type="submit" value="" class="form-submit" />
            </td>
        </tr>
            
       
            
        <tr>
            <td><img src="<?php echo base_url(); ?>adm/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
        
        </tr>
         <tr>
            <td><img src="<?php echo base_url(); ?>adm/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
        
        </tr>
         <tr>
            <td><img src="<?php echo base_url(); ?>adm/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
        
        </tr>
          
            
            
            
        
        </table>
            <?php echo form_close(); ?>
        <?php } ?>
        
       <?php if($product->for_woman=='1'){ ?> 
            
            
        <?php echo form_open_multipart('admin/product_manager/saveImage',"name='woman_form'"); ?>
            <input type="hidden" value="woman" name="woman" />
            <input type="hidden" value="<?php echo $product->id ?>" name="product" />
        
        <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr valign="top">
            <td>


                    <!--  start step-holder -->
                    <div id="step-holder">
                            
                            <div class="step-dark-left"><a href="">Woman Images</a></div>
                            <!--<div class="step-dark-right">&nbsp;</div>
                            <div class="step-no-off">2</div>
                            <div class="step-light-left">Select related products</div>
                            <div class="step-light-right">&nbsp;</div>
                            <div class="step-no-off">3</div>
                            <div class="step-light-left">Preview</div>
                            <div class="step-light-round">&nbsp;</div>
                            <div class="clear"></div>-->
                    </div>
                    <!--  end step-holder -->

            </td>
	
        </tr>
            
        <tr>
            <td>
                <div class="image_gallery">
                    <?php foreach($product->file as $image){
                        if($image->join_type=="woman"){
                            ?>
                                <div  class="gallery_content"><img src="<?php echo base_url(); ?>images/product_image/thumb_image/<?php echo $image->filename; ?>" />
                                <?php if($image->join_default=='1'){ ?>
                                    Default&nbsp;
                                    <a href="<?php echo base_url(); ?>admin/product_manager/deleteImage/<?php echo $image->id; ?>" >Delete</a>
                                <?php }else{ ?>
                                    <a href="<?php echo base_url(); ?>admin/product_manager/setImageDefault/<?php echo $image->id; ?>" >Make Default </a>&nbsp;
                                	<a href="<?php echo base_url(); ?>admin/product_manager/deleteImage/<?php echo $image->id; ?>" >Delete</a>
                                	
                                <?php } ?>
                                </div>
                            <?php
                        }
                    } ?>
                </div>
            </td>
        </tr>
        
        
        <tr>
            <td>
                UpLoad New Image:<br /><br /><input type="file" name="userfile" class="" />
            </td>
        </tr>  
            
        <tr>
            <td><img src="<?php echo base_url(); ?>adm/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
        
        </tr>
            
        <tr>
            <td>
                <input type="submit" value="" class="form-submit" />
                
            </td>
        </tr>
        
            
        <tr>
            <td><img src="<?php echo base_url(); ?>adm/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
        
        </tr>
            
            
        <tr>
        <td><img src="<?php echo base_url(); ?>adm/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
        
        </tr>     
     </table>     
       <?php echo form_close(); ?>
    <?php } ?>
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>

        
      </div>
    </div>
    <!--Member taber Start-->

<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>


<?php $this->load->view('admin/footer'); ?>

</body>
</html>


