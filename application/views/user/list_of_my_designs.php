<div class="item_box2">
<?php $this->load->view('pagination');?>
<?php if(count($projects->all)!=0){?>
            <table width="100%" cellspacing="0" cellpadding="0" border="0" class="top_font2" style="padding-top:40px; margin-bottom:20px;">
              <tbody>
                <tr class="font_size">
                  <td style="width: 131px; padding: 0pt 0pt 0pt 10px;">ITEMS</td>
                  <td style="width: 125px;">TITLE</td>
                  <td style="width: 125px; text-align:center;">ADDED ON</td>
                  <td style="width: 140px;">STATUS</td>                  
                  <td style="padding: 0pt 0pt 0pt 10px;">ACTION</td>
                </tr>
                <?php foreach($projects as $project){ ?>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                    <?php if($project->file->filename) { ?>
                  		<td style="width:131px;"><div class="item_image3"><img alt="item_image" src="<?php echo base_url(); ?>images/project_image/front_image/<?php echo $project->file->filename; ?>"></div></td>
                  	<?php } ?>
                  	<td style="width: 125px; padding:0 0 0 13px"><?php echo $project->title; ?></td>
                  	<td style="width: 140px; text-align:center;"><?php echo date("d/m/Y",$project->date_added); ?></td>
                  	<td style="color:#1b7c08;"><?php echo $project->status; ?></td>
                   	<td style="width:60px;">
						<?php if($project->status == "In progress"){ ?>
									<div style="float:left;"><a href="<?php echo base_url();?>user/manage_design/deleteDesign/<?php echo $project->id; ?>"><img src="<?php echo base_url(); ?>images/button_1.jpg" alt="button1" /></a></div>
									<div style="float:right;"><a href="<?php echo base_url();?>user/manage_design/editDesign/<?php echo $project->id; ?>"><img src="<?php echo base_url(); ?>images/button_2.jpg" alt="button1" /></a></div>
						<?php } else { ?>
								----
						<?php } ?>
					</td>
                </tr>
		<?php } ?>
              </tbody>
            </table>
	    <?php }else{?>    
		<h2>No Record Found </h2><?php }?>
          <div class="clear"></div>
          <!--Page Navi Start-->
  		 <?php $this->load->view('pagination');?>
          </div>