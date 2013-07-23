<?php if($pagination['page_count']>1){ 

if($this->input->get('page')==NULL)
	$req_page=1;
else
	$req_page=$this->input->get('page');

?>
<div style="float:right;">
<div class="page_navi_top">
		<ul>
          	<?php if($this->input->get('page')>1) { ?>
          		<li><a href="javascript:void(0);" onclick="show_page('<?php echo ($this->input->get('page')-1); ?>');" class="active_nav">&laquo;</a></li>
          	<?php }?>
	  		 <?php if(!$this->input->get('page') || $this->input->get('page')==1) { ?>
				<li class='active_nav'><a href="javascript:void(0);" class="active_nav">1</a></li>
			<?php } else{ ?>
				<li><a href="javascript:void(0);" onclick="show_page('1');">1</a></li>
			<?php } ?>	
          	<?php  for ($i=2;$i<=$pagination['page_count'];$i++) 
					{ 
			?>
          		<li <?php if($i==$this->input->get('page')) { echo "class='active_nav'"; } ?>>
					<a href="javascript:void(0);" onclick="show_page('<?php echo $i; ?>');" class="active_nav"><?php echo $i;?></a>
				</li>
          	<?php }	?>
            <?php if(($this->input->get('page')!=$pagination['page_count']) && ($this->input->get('page') < $pagination['page_count'])) { ?>
          	<li><a href="javascript:void(0);" onclick="show_page('<?php echo ($req_page+1); ?>');" class="active_nav">&raquo;</a></li>
            <?php } ?>
        </ul>
 </div>
 <div class="clear"></div>
 </div>
<?php } ?>