function addWarning(url,idUser,type,warningNum)
{
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var params = "idUser=" + idUser + "&type="+type + "&warningNum=" + warningNum;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {//Call a function when the state changes.
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	  //alert(xmlhttp.responseText);
	}
  }
  xmlhttp.send(params);
}

function getWarningNumber(url,idUser,type)
{
	//alert(url);
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var params = "idUser=" + idUser + "&type="+type;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {//Call a function when the state changes.
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	  //document.getElementById("idComment"+idArt).innerHTML=xmlhttp.responseText;
	  //alert(xmlhttp.responseText);
	  $("#numwarning").html(xmlhttp.responseText);
	}
  }
  xmlhttp.send(params);
}