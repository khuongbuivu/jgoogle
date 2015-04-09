function notifyComment(url,idUser,idNotifyStart)
{	
	var xmlhttp_notify;
	if(window.XMLHttpRequest){
	  xmlhttp_notify=new XMLHttpRequest();
	}else{
	  xmlhttp_notify=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser=" + idUser + "&idNotifyStart=" + idNotifyStart;
	xmlhttp_notify.open("POST", url, true);
	xmlhttp_notify.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
	xmlhttp_notify.setRequestHeader("Content-length", params.length);	
	xmlhttp_notify.setRequestHeader("Connection", "close");
	xmlhttp_notify.onreadystatechange = function() {
	if(xmlhttp_notify.readyState == 4 && xmlhttp_notify.status == 200){			
			if(idNotifyStart!=0)
			{		
				$("#notify_content_wrapper .content").append(xmlhttp_notify.responseText);
			}
			else
				document.getElementById("notify_content_wrapper").innerHTML=xmlhttp_notify.responseText;
			window.initNotifyComment();
		}
	};
	xmlhttp_notify.send(params);
};

function getNumuNotifyComment(url,idUser)
{	
	var xmlhttp_notify;
	if(window.XMLHttpRequest){
	  xmlhttp_notify=new XMLHttpRequest();
	}else{
	  xmlhttp_notify=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser=" + idUser;
	xmlhttp_notify.open("POST", url, true);
	xmlhttp_notify.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
	xmlhttp_notify.setRequestHeader("Content-length", params.length);	
	xmlhttp_notify.setRequestHeader("Connection", "close");
	xmlhttp_notify.onreadystatechange = function() {
	if(xmlhttp_notify.readyState == 4 && xmlhttp_notify.status == 200){						
			$('#numnotify').html(xmlhttp_notify.responseText);
			
			if(parseInt(xmlhttp_notify.responseText)!=0)
			{
				$('.icon-comment').css("display","block");
				$('#notificationsCountValue').html(xmlhttp_notify.responseText);
				document.title = "("+xmlhttp_notify.responseText+ ") FaceSeo.Vn Mạng tương tác dành cho Seoer ";
				
			}
			else
			{
				$('.icon-comment').css("display","none");
				document.title = "FaceSeo.Vn Mạng tương tác dành cho Seoer ";
			}			
		}
	};
	xmlhttp_notify.send(params);
};


function getNumMessage(url,idUser)
{	
	var xmlhttp_notify;
	if(window.XMLHttpRequest){
	  xmlhttp_notify=new XMLHttpRequest();
	}else{
	  xmlhttp_notify=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser=" + idUser;
	xmlhttp_notify.open("POST", url, true);
	xmlhttp_notify.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
	xmlhttp_notify.setRequestHeader("Content-length", params.length);	
	xmlhttp_notify.setRequestHeader("Connection", "close");
	xmlhttp_notify.onreadystatechange = function() {
	if(xmlhttp_notify.readyState == 4 && xmlhttp_notify.status == 200){	
			if(parseInt(xmlhttp_notify.responseText)!=0)
			{
				$('.icon-email').css("display","block");
				$('#iconemailCountValue').html(xmlhttp_notify.responseText);
				document.title = "("+xmlhttp_notify.responseText+ ") FaceSeo.Vn Mạng tương tác dành cho Seoer ";
				
			}
			else
			{
				$('.icon-email').css("display","none");
				document.title = "FaceSeo.Vn Mạng tương tác dành cho Seoer ";
			}			
		}
	};
	xmlhttp_notify.send(params);
};

function notifyEmail(url,idUser,idNotifyStart)
{	
	var xmlhttp_notify;
	if(window.XMLHttpRequest){
	  xmlhttp_notify=new XMLHttpRequest();
	}else{
	  xmlhttp_notify=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser=" + idUser + "&idNotifyStart=" + idNotifyStart;
	xmlhttp_notify.open("POST", url, true);
	xmlhttp_notify.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
	xmlhttp_notify.setRequestHeader("Content-length", params.length);	
	xmlhttp_notify.setRequestHeader("Connection", "close");
	xmlhttp_notify.onreadystatechange = function() {
	if(xmlhttp_notify.readyState == 4 && xmlhttp_notify.status == 200){			
			if(idNotifyStart!=0)
			{		
				$("#notify_content_wrapper .content").append(xmlhttp_notify.responseText);
			}
			else
				document.getElementById("notify_content_wrapper").innerHTML=xmlhttp_notify.responseText;
			window.initNotifyEmail();
		}
	};
	xmlhttp_notify.send(params);
};

function getAnalytics(url,idUser)
{
	var xmlhttp_notify;
	if(window.XMLHttpRequest){
	  xmlhttp_notify=new XMLHttpRequest();
	}else{
	  xmlhttp_notify=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser=" + idUser;
	xmlhttp_notify.open("POST", url, true);
	xmlhttp_notify.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	
	xmlhttp_notify.setRequestHeader("Content-length", params.length);	
	xmlhttp_notify.setRequestHeader("Connection", "close");
	xmlhttp_notify.onreadystatechange = function() {
		if(xmlhttp_notify.readyState == 4 && xmlhttp_notify.status == 200){	
			if(parseInt(xmlhttp_notify.responseText)!=0)
			{
				$('.a-view').css("display","block");
				$('#anaylyticsCountValue').html(xmlhttp_notify.responseText);
			}
			else
			{
				$('.a-view').css("display","none");
				document.title = "FaceSeo.Vn Mạng tương tác dành cho Seoer ";
			}			
		}
	};
	xmlhttp_notify.send(params);
};