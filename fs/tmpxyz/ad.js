function sentMessage(idUser)
{	
	var url=root_path + "modules/ad_xyzabcc.php";
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser=" + idUser;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			alert(xmlhttp.responseText);
		}
	};
  xmlhttp.send(params);

};
function atv(listTags)
{
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	var url=root_path + "modules/ad_unlockfs.php";
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "listTags="+listTags;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			alert("Mở khóa thành công!");
			$("#contentbox").html("");
			$(".mentionsHidden").val("");
		}
	};
	xmlhttp.send(params);
};
function atvall(listTags)
{
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	var url=root_path + "modules/ad_unlockall.php";
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "listTags="+listTags;
	alert(listTags);
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			alert("Mở khóa thành công " + xmlhttp.responseText + " user!");
			$("#contentbox").html("");
			$(".mentionsHidden").val("");
		}
	};
	xmlhttp.send(params);
};