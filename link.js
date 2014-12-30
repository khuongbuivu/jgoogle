function dellink(idUser,link)
{
	var xmlhttp_delbanner;
	if(window.XMLHttpRequest){
	  xmlhttp_delbanner=new XMLHttpRequest();
	}else{
	  xmlhttp_delbanner=new ActiveXObject("Microsoft.XMLHTTP");
	};
	if (FaceSeo.search(domain)<0)
		return;
	var token = generateTokenPost();	
	var url=root_path+"modules/del_link.php";
	var params = "idUser=" + idUser + "&link="+link+"&token-link="+token;
	xmlhttp_delbanner.open("POST", url, true);
	xmlhttp_delbanner.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
	xmlhttp_delbanner.setRequestHeader("Content-length", params.length);
	xmlhttp_delbanner.setRequestHeader("Connection", "close");
	xmlhttp_delbanner.onreadystatechange = function() {
		if(xmlhttp_delbanner.readyState == 4 && xmlhttp_delbanner.status == 200){
			mylink(idUser);			
		}
	};
	xmlhttp_delbanner.send(params);
};