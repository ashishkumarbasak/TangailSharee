var base_url = "http://dev.twinne.com/" ;




function addToWishlist(product_id,product_type){
	var url=base_url+"home/addToWishList/"+product_id+"/"+product_type;
	//alert(url);
	$.ajax({
			url:url,
			type:'GET',
			dataType:'json',
			success: function(data){
				//alert(data);
				if(data){
					$('#add_wish_'+product_id+' img').attr('src',base_url+'images/remove.png');
					$('#star_'+product_id+' a img').attr('src',base_url+'images/star-hover.png');
					$('#star_'+product_id+' a').attr('href',base_url+'home/removeFromWishlist/'+product_id);
					$('#star_'+product_id+' a').unbind('click');
					$('#star_'+product_id+' a').click(function(){removeFromWishlist(product_id)});
					$('#add_text').hide();
            		$('#add_text3').show();
					$('#add_text1').hide();
            		$('#add_text2').show();
				}else{
					window.location=base_url+"login?msg=false";
				}
			}
		});
}


function removeFromWishlist(product_id){

	var url=base_url+"home/removeFromWishlist/"+product_id;
	//alert(url);
	$.ajax({
			url:url,
			type:'GET',
			dataType:'json',
			success: function(data){
				if(data){
					$('#add_wish_'+product_id+' img').attr('src',base_url+'images/add_to_wish_list.png');
					$('#star_'+product_id+' a img').attr('src',base_url+'images/star.png');
					$('#star_'+product_id+' a').attr('href',base_url+'home/addToWishlist/'+product_id);
	
					$('#star_'+product_id+' a').unbind('click');
					$('#star_'+product_id+' a').click(function(){addToWishlist(product_id)});
				}else{
					window.location=base_url+"login";
				}
			}
		});
	
}

//Read a page's GET URL variables and return them as an associative array.
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function addToWishlist1(product_id,product_type){
	var url=base_url+"home/addToWishList/"+product_id+"/"+product_type;
	//alert(url);
	$.ajax({
			url:url,
			type:'GET',
			dataType:'json',
			success: function(data){
				if(data){
					
					$('#add_text a').unbind('click');
					$('#add_text1').hide();
            		$('#add_text2').show();
					$('#add_text').hide();
            		$('#add_text3').show();
				}else{
					window.location=base_url+"login?msg=false";
				}
			}
		});
}