function notifyComment(url,idUser,idNotifyStart)
{	
	//alert("autoLoadComment" + url);
	var xmlhttp_notify;
	if(window.XMLHttpRequest){
	  xmlhttp_notify=new XMLHttpRequest();
	}else{
	  xmlhttp_notify=new ActiveXObject("Microsoft.XMLHTTP");
	}
	/*
	if(idNotifyStart=0)
		var params = "idUser=" + idUser;
	else
	*/
		var params = "idUser=" + idUser + "&idNotifyStart=" + idNotifyStart;
	xmlhttp_notify.open("POST", url, true);
	xmlhttp_notify.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
	xmlhttp_notify.setRequestHeader("Content-length", params.length);	
	xmlhttp_notify.setRequestHeader("Connection", "close");
	xmlhttp_notify.onreadystatechange = function() {//Call a function when the state changes.
		if(xmlhttp_notify.readyState == 4 && xmlhttp_notify.status == 200){			
			
			//alert(xmlhttp_notify.responseText);
			if(idNotifyStart!=0)
			{
				
				//alert("idNotifyStart != 10"+ idNotifyStart);
				//alert(xmlhttp_notify.responseText);
				$(".content").append(xmlhttp_notify.responseText);
			}
			else
				document.getElementById("notify_content_wrapper").innerHTML=xmlhttp_notify.responseText;
			window.initNotifyComment();
		}
	}
	xmlhttp_notify.send(params);
}

function getNumuNotifyComment(url,idUser)
{	
	//alert("autoLoadComment" + url + " " + idUser);
	var xmlhttp_notify;
	if(window.XMLHttpRequest){
	  xmlhttp_notify=new XMLHttpRequest();
	}else{
	  xmlhttp_notify=new ActiveXObject("Microsoft.XMLHTTP");
	}
		var params = "idUser=" + idUser;
	xmlhttp_notify.open("POST", url, true);
	xmlhttp_notify.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
	xmlhttp_notify.setRequestHeader("Content-length", params.length);	
	xmlhttp_notify.setRequestHeader("Connection", "close");
	xmlhttp_notify.onreadystatechange = function() {//Call a function when the state changes.
		if(xmlhttp_notify.readyState == 4 && xmlhttp_notify.status == 200){						
			//alert(xmlhttp_notify.responseText);
			$('#numnotify').html(xmlhttp_notify.responseText);
			if(parseInt(xmlhttp_notify.responseText)!=0)
			{
				$('#notificationsCountWrapper').css("display","block");
				$('#notificationsCountValue').html(xmlhttp_notify.responseText);
				document.title = "("+xmlhttp_notify.responseText+ ") FaceSeo.Vn Mạng tương tác dành cho Seoer ";
				
			}
			else
			{
				$('#notificationsCountWrapper').css("display","none");
				document.title = "FaceSeo.Vn Mạng tương tác dành cho Seoer ";
			}
			
			
		}
	}
	xmlhttp_notify.send(params);
}