function sentMessage(idUser)
{	
	alert("bbb");
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
		}
	};
	xmlhttp.send(params);
}