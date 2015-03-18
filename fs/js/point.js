function subPointPost(idUser,sidUser,content)
{ 
	var url = root_path + "modules/subpointpost.php";	
	if(!content.match(/(http|https|ftp|ftps):\/\/[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,3}(\/\S*)?/))  
	{
		return;
	};	
	var xmlhttp1;
	if(window.XMLHttpRequest){
	  xmlhttp1=new XMLHttpRequest();
	}else{
	  xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser=" + idUser + "&sidUser=" + sidUser;
	xmlhttp1.open("POST", url, true);
	xmlhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp1.setRequestHeader("Content-length", params.length);
	xmlhttp1.setRequestHeader("Connection", "close");
	xmlhttp1.onreadystatechange = function() {
	if(xmlhttp1.readyState == 4 && xmlhttp1.status == 200){
		document.getElementById('point').innerHTML="Point <div id='numpoint'>" + xmlhttp1.responseText + "</div>" ;
	}
  };
  xmlhttp1.send(params);
};

function subHackPoint(idUser,sidUser,subpoint)
{ 
	var url = root_path + "modules/subpoint.php";
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser=" + idUser + "&sidUser=" + sidUser + "&subpoint=" +subpoint;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		document.getElementById('point').innerHTML="Point <div id='numpoint'>" + xmlhttp.responseText + "</div>" ;
	}
  };
  xmlhttp.send(params);
};

function subPoint(idUser,sidUser,subpoint,content)
{ 
	var url = root_path + "modules/subpoint.php";
	if(!content.match(/(http|https|ftp|ftps):\/\/[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,3}(\/\S*)?/))  
	{
		return;
	};
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser=" + idUser + "&sidUser=" + sidUser + "&subpoint=" +subpoint;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		document.getElementById('point').innerHTML="Point <div id='numpoint'>" + xmlhttp.responseText + "</div>" ;
	}
  };
  xmlhttp.send(params);
};
