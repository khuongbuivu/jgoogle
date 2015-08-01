$(document).ready(function() {
	
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
	
	/* report post */
	$(".sendreport").click(function(){	
		var url=root_path + "modules/report_post.php";
		var idUserB=$(".rpmentionsHidden0000").val();
		var idPost=$(".rpidPost").val();
		var typereport=$('input[name=typereport]:checked', '#freport').val();
		if (FaceSeo.search(domain)<0)
		return;
		$.ajax({
				url:url,
				type:'POST',
				data: {idUserA:idUser,idUserB:idUserB,sidUser:sidUser,idPost:idPost,typereport:typereport},
				dataType: "html",
				success: function(result) {
				$("#postcontent"+idPost).fadeToggle("fast");
			}
		}); 		
		$(".formreport").fadeToggle("fast");
	});
	
	$(".closerp").click(function(){
		$(".formreport").fadeToggle("fast");
	});
	
	$(document).keyup(function(e) {
		if(e.keyCode == 27 && $(".formreport").css("display") != "none" ) { 
			event.preventDefault();
			$(".formreport").fadeToggle("fast");
		}
	});
	/* end report post */
	
});

function displayFormSharePoint(a,b)
{
	$(".mentionsHidden0000").val(a);
	alert("abc");
	$("#contentbox0000").html(b);
	$(".overlay").fadeToggle("fast");
	alert("bcd");
	return false;
};

function displayFormReport(idPost,idUser,Name)
{
	$(".rpidPost").val(idPost);
	$(".rpmentionsHidden0000").val(idUser);
	$("#rpcontentbox0000").html("@"+Name);
	$(".formreport").fadeToggle("fast");
	return false;
}