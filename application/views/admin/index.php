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
          image: "images/forms/choose-file.gif",
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

<?php $this->load->view('admin/footer'); ?>

</body>
</html>
























<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="<?php echo base_url(); ?>adm/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_main">
    <?php $this->load->view("admin/header"); ?>
  <div class="clear"></div>
  <div class="mid_box">
    <div class="mid_boxbg">
    <?php $this->load->view("admin/left_nav"); ?>
        <div class="mid_boxright">
        <div class="mid_boxrighttop">News</div>
        <div class="mid_boxrightbg">
          <div class="heading">
            <ul>
              <li>Sr.No.</li>
              <li style="padding-left:15px;">Title</li>
              <li style="padding-left:100px;">Description</li>
              <li style="padding-left:120px;">Publish on</li>
              <li style="padding-left:35px;">Status</li>
              <li style="padding-left:60px;">Action</li>
            </ul>
          </div>
          <div class="row_1">
            <div class="sr_nu_box">1</div>
            <div class="title_box">Test news
              1</div>
            <div class="description_box">Lorem ipsum dolor sit amet, maecenas vitae neque et magna urna. Lobortis per, vel sit neque enim ullamcorper per neque, sodales sed</div>
            <div class="publish_box">Wednesday, January 26, 2011</div>
            <div class="tatus_box">Published</div>
            <div class="action_box">
              <div class="edit_butten">Edit</div>
              <div class="del_butten">Delete</div>
            </div>
          </div>
          <div class="row_2">
            <div class="sr_nu_box">2</div>
            <div class="title_box">Test news
              1</div>
            <div class="description_box">Lorem ipsum dolor sit amet, maecenas vitae neque et magna urna. Lobortis per, vel sit neque enim ullamcorper per neque, sodales sed</div>
            <div class="publish_box">Wednesday, January 26, 2011</div>
            <div class="tatus_box">Published</div>
            <div class="action_box">
              <div class="edit_butten">Edit</div>
              <div class="del_butten">Delete</div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="row_1">
            <div class="sr_nu_box">3</div>
            <div class="title_box">Test news
              1</div>
            <div class="description_box">Lorem ipsum dolor sit amet, maecenas vitae neque et magna urna. Lobortis per, vel sit neque enim ullamcorper per neque, sodales sed</div>
            <div class="publish_box">Wednesday, January 26, 2011</div>
            <div class="tatus_box">Published</div>
            <div class="action_box">
              <div class="edit_butten">Edit</div>
              <div class="del_butten">Delete</div>
            </div>
          </div>
          <div class="row_2">
            <div class="sr_nu_box">4</div>
            <div class="title_box">Test news
              1</div>
            <div class="description_box">Lorem ipsum dolor sit amet, maecenas vitae neque et magna urna. Lobortis per, vel sit neque enim ullamcorper per neque, sodales sed</div>
            <div class="publish_box">Wednesday, January 26, 2011</div>
            <div class="tatus_box">Published</div>
            <div class="action_box">
              <div class="edit_butten">Edit</div>
              <div class="del_butten">Delete</div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <div class="arrow_box">
            <p>Results: 4</p>
            <div class="arrowleft"></div>
            <div class="arrow_boxmum">1 ,2</div>
            <div class="arrowright"></div>
          </div>
        </div>
        <div class="mid_boxrightdown"></div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <?php $this->load->view('admin/footer'); ?>
</div>
</body>
</html>
