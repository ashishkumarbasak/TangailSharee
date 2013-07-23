	$(document).ready(function(){
		var n = $(".slides li").length;
		//var myClass = $(this).attr("class");
		var myClass = $(".slides li:eq(0)").attr('class');
		//myClass="man";
		$("#currentslide").val(0);
		if(myClass=='man' || myClass=='man default'){
			$('#man_tab').show();
			$('#selected-for-man').show();
			$('#woman_tab').hide();
			$('#selected-for-women').hide();
			$('#mantabheader').addClass('tabberactive');
            $('#womantabheader').removeClass('tabberactive');
			
		}else{
			$('#man_tab').hide();
			$('#selected-for-man').hide();
			$('#woman_tab').show();
			$('#selected-for-women').show();
			$('#womantabheader').addClass('tabberactive');
            $('#mantabheader').removeClass('tabberactive');
		}
		/*$('#arrowprevious').click(function() {
			currslide = $("#currentslide").val();
			var n = $(".slides li").length;
			if(currslide==0){
				x = n-1;
			}
			else{
				x= currslide-1;
			}

			for(i=0;i<n;i++)
			{
				$(".slides li:eq("+i+")").css("display", "none");
				$(".slides li:eq("+i+")").removeClass('slideActive');
			}

			var myClass = $(".slides li:eq("+x+")").attr('class');
			$("#currentslide").val(x);
			
			$(".slides li:eq("+x+")").css("display", "block");
			$(".slides li:eq("+x+")").addClass('slideActive');
			
			
			
			if(myClass=='man' || myClass=='man default'){
				$('#man_tab').show();
				$('#woman_tab').hide();
				$('#mantabheader').addClass('tabberactive');
	            $('#womantabheader').removeClass('tabberactive');
			}else{
				$('#man_tab').hide();
				$('#woman_tab').show();
				$('#womantabheader').addClass('tabberactive');
	            $('#mantabheader').removeClass('tabberactive');
			}
		});
		$('#arrownext').click(function() {
			currslide = parseInt($("#currentslide").val());
			var n = $(".slides li").length;
			max = n-1;
			if(currslide==max){
				x = 0;
			}
			else{
				x= currslide+1;
			}

			for(i=0;i<n;i++)
			{
				$(".slides li:eq("+i+")").css("display", "none");
				$(".slides li:eq("+i+")").removeClass('slideActive');
			}

			var myClass = $(".slides li:eq("+x+")").attr('class');
			$("#currentslide").val(x);
			$(".slides li:eq("+x+")").css("display", "block");
			$(".slides li:eq("+x+")").addClass('slideActive');
			
			
			if(myClass=='man' || myClass=='man default'){
					$('#man_tab').show();
					$('#woman_tab').hide();
					$('#mantabheader').addClass('tabberactive');
		            $('#womantabheader').removeClass('tabberactive');
				}else{
					$('#man_tab').hide();
					$('#woman_tab').show();
					$('#womantabheader').addClass('tabberactive');
		            $('#mantabheader').removeClass('tabberactive');
				}
		});
		$('div#slideshow').mouseover(function(){
			$('span#arrowprevious').css('display','block');
			$('span#arrownext').css('display','block');
		});
		$('div#slideshow').mouseout(function(){
			$('span#arrowprevious').css('display','none');
			$('span#arrownext').css('display','none');
		});	
		*/
	});

	$(document).ready(function(){
		
		$('#womantabheader a').click(function() {
			  currslide = parseInt($("#currentslide").val());
			  var myClass = $(".slides li:eq("+currslide+")").attr('class');
			  var n = $(".slides li").length;
			  var j=0;
				if(myClass!='woman'){
					for(i=0;i<n;i++)
					{
						$(".slides li:eq("+i+")").css("display", "none");
						$(".slides li:eq("+i+")").removeClass('slideActive');
						var rclass = $(".slides li:eq("+i+")").attr('class');
						
						if(rclass=='woman default')
						{
							j=i;
						}
					}
				}
			  
				$(".slides li:eq("+j+")").css("display", "block");
				$(".slides li:eq("+j+")").addClass('slideActive');
				$("#currentslide").val(j);
			  $('#man_tab').hide();
			  $('#selected-for-man').hide();
			  $('#woman_tab').show();
			  $('#selected-for-women').show();
			  $('#womantabheader').addClass('tabberactive');
              $('#mantabheader').removeClass('tabberactive');
              return false;
			});
		$('#mantabheader a').click(function() {
			  currslide = parseInt($("#currentslide").val());
			  var myClass = $(".slides li:eq("+currslide+")").attr('class');
			  var n = $(".slides li").length;
			  var j=0;
			 // alert(n);
			  //if(myClass!='man'){
				for(i=0;i<n;i++)
				{
					var rclass = $(".slides li:eq("+i+")").attr('class');
					$(".slides li:eq("+i+")").css("display", "none");
					$(".slides li:eq("+i+")").removeClass('slideActive');
					//alert(rclass);
					if(rclass=='man default')
					{
						j=i;
					}
				}
			  //}
			 	$(".slides li:eq("+j+")").css("display", "block");
				$(".slides li:eq("+j+")").addClass('slideActive');
				$("#currentslide").val(j);
			    $('#man_tab').show();
				$('#selected-for-man').show();
			    $('#woman_tab').hide();
			    $('#selected-for-women').hide();
			    $('#womantabheader').removeClass('tabberactive');
                $('#mantabheader').addClass('tabberactive');
              return false;
			});
	});