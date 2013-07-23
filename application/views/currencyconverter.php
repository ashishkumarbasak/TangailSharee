<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.cookie.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var currency_type = $("input[name$='currency_type']").val();
    
    $("input[name$='currency_type']").click(function() {
        var currency_type = $(this).val();
            //alert(currency_type);
			$.cookie("c", currency_type, { path: '/' });
            window.location.reload();
        });
		 
});
<?php
	if(isset($_COOKIE["c"]))
          $pref_currency_type = $_COOKIE["c"];
    else
          $pref_currency_type = "GBP";   
?>

</script>
<div class="currency_type_container">
	<p class="field switch">	
        <input type="radio" name="currency_type" id="currency_type_gb" value="GBP" <?php if($pref_currency_type=="GBP") echo "checked='checked'"; ?>>
        <input type="radio" name="currency_type" id="currency_type_eu" value="EUR" <?php if($pref_currency_type=="EUR") echo "checked='checked'"; ?> >
        <input type="radio" name="currency_type" id="currency_type_us" value="USD" <?php if($pref_currency_type=="USD") echo "checked='checked'"; ?> >       
		<label for="currency_type_gb" class="cb-gbp <?php if($pref_currency_type=="GBP") echo "selected"; ?>"><span>&pound; <small>GBP</small></span></label>
		<label for="currency_type_eu" class="cb-gbp <?php if($pref_currency_type=="EUR") echo "selected"; ?>"><span>&euro; <small>EUR</small></span></label>
		<label for="currency_type_us" class="cb-gbp <?php if($pref_currency_type=="USD") echo "selected"; ?>"><span>$ <small>USD</small></span></label>
	</p>
</div>