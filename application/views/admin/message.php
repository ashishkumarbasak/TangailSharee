<div class="error_messages">
    <?php 
    		
    		if(isset($errors)){
            //var_dump($errors);
        
            foreach($errors as $key =>$value){
            	if ($key == 'confirm_password' && trim($value)=='<span>matches</span>'){
            		echo $key." is not ".$value."<br />";
            	}
            	else{
                	echo $key." is ".$value."<br />";
            	}
            }
        }
		?>
    </div>