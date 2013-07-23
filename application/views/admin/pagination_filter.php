<?php if($pagination['page_count']>1){ ?>

<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
<tr>
<td>
        <a href="<?php echo $pagination['url']."page=1" ?>" class="page-far-left"></a>
        
        <?php if($pagination['page']>1){ ?>
            <a href="<?php echo $pagination['url']."page=".($pagination['page']-1); ?>" class="page-left"></a>
        <?php } ?>
        
        <div id="page-info">Page <strong><?php echo $pagination['page']; ?></strong> / <?php echo $pagination['page_count']; ?></div>
        
        <?php if($pagination['page_count']>$pagination['page']){ ?>
            <a href="<?php echo $pagination['url']."page=".($pagination['page']+1); ?>" class="page-right"></a>
        <?php } ?>
            
        <a href="<?php echo $pagination['url']."page=".$pagination['page_count']; ?>" class="page-far-right"></a>
</td>


<!--<td>
<select  class="styledselect_pages">
        <option value="">Number of rows</option>
        <option value="">1</option>
        <option value="">2</option>
        <option value="">3</option>
</select>
</td>-->


</tr>
</table>

<?php } ?>