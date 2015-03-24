$(document).ready(function() {
	$("#sharepointLink").click(function( event ){
		event.preventDefault();
    	$(".overlay").fadeToggle("fast");
  	});
	
	$(".overlayLink").click(function(event){
		event.preventDefault();
		$(".overlay").fadeToggle("fast");
	});
	$(".submit").click(function(){
	
		var url=root_path + "modules/share-point.php";
		var idUserB=$(".mentionsHidden0000").val();
		var subpoint=$(".numpointshare").val();
		if (FaceSeo.search(domain)<0)
		return;
		$.ajax({
				url:url,
				type:'POST',
				data: {idUserA:idUser,idUserB:idUserB,sidUser:sidUser,subpoint:subpoint},
				dataType: "json",
				success: function(result) {
					if (result.pointShare>0)
						effectSubPoint(result.pointA,result.pointShare);
			}
		}); 		
		$(".overlay").fadeToggle("fast");
	});
	
	$(".close").click(function(){
		$(".overlay").fadeToggle("fast");
	});
	
	$(document).keyup(function(e) {
		if(e.keyCode == 27 && $(".overlay").css("display") != "none" ) { 
			event.preventDefault();
			$(".overlay").fadeToggle("fast");
		}
	});
});
function displayFormSharePoint(a,b)
{
	$(".mentionsHidden0000").val(a);
	$("#contentbox0000").html(b);
	$(".overlay").fadeToggle("fast");
	return false;
}