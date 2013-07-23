<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Tangail-sharee</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>adm/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>adm/css/pro_dropline_ie.css" />
<![endif]-->
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url(); ?>css/slimbox2.css" />

<!--  jquery core -->
<script src="<?php echo base_url(); ?>adm/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/slimbox2.js" type="text/javascript"></script>



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

 <!--Member taber Start-->
    <div id="vtab">
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
            
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr valign="top">
            <td>
            		<div id="step-holder">
                            
                            <div class="step-dark-left">Submitted Graphics</div>
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
            <div class="clear" style="height:10px;"></div>
			<div class="clear" style="height:10px;"></div>
			<?php $con_id=$this->uri->segment($this->uri->total_segments()); ?>
			<input type="hidden" name="contest" value="<?php echo $con_id; ?>" />
                <div  class="image_gallery">
                          <?php if(isset($gfile)){
                                    foreach($gfile as $key=>$value){
					$grap=explode(',',$value);
					$gid=$grap[0];
					$gimg=$grap[1];
                    	?>
                        		
          <div  class="coupon_product_image"><div>
		  <a href="<?php echo base_url();?>images/graphic_image/original_image/<?php echo $gimg; ?>" rel="lightbox">
		  <img src="<?php echo base_url(); ?>images/graphic_image/thumb_image/<?php echo $gimg; ?>" /></a>
                                 
			</div>
			
			<div class="clear" style="height:10px;"></div>
			<div><h3>By <?php echo $key;?></h3></div>
			<div class="clear" style="height:10px;"></div>
			<div><a href="<?php echo base_url(); ?>admin/contest_manager/downloadGraphic?name=<?php echo $gimg; ?>"><h3>Download </h3></a><a href="<?php echo base_url(); ?>admin/contest_manager/deleteGraphic/<?php echo $gid; ?>"><h4>Delete</h4></a></div>
			</div>
                        <?php }
                    } ?>
                </div>
                
            </td>
          
		<td></td>
        </tr>
        <tr>
        <td>
         <div>&nbsp;</div>        
        		  
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
        <?php echo form_close();?>
<div class="clear"></div>
 <!--  start paging..................................................... -->
				<?php //$this->load->view('admin/pagination'); ?>
			<!--  end paging................ -->

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


s