function showAllComment(url,idArt)
{
	if (FaceSeo.search(domain)<0)
		return;
	var url = root_path + "modules/json_comment_post.php";
	$.ajax({
			url:url,
			type:'POST',
			data: {idArt:idArt,numCmtDisplay:1000},
			dataType: "json",
			success: function(json) {
				var htmlnewpost='';
				var htmlInputForm='';
				var url;
				var titleStastic='Thống kê Click hôm nay';
				var classtitlePopup='titlepopup';
				if(json.length>0){
					htmlnewpost=showCommentOfPost(idArt,json);
					if (htmlnewpost != "") {
						$("#comment-adv"+idArt).html(htmlnewpost);
						$("#loadcmtfull"+idArt).html("yes");			
					}
				}
			}					  
	}); 
};

function autoLoadComment(url,idArt)
{	
	if (FaceSeo.search(domain)<0)
		return;
	var numCmtDisplay=10;
	if($("#loadcmtfull"+idArt).html().trim()=="yes")	
		numCmtDisplay=1000;
	var url = root_path + "modules/json_comment_post.php";
	$.ajax({
			url:url,
			type:'POST',
			data: {idArt:idArt,numCmtDisplay:numCmtDisplay},
			dataType: "json",
			success: function(json) {
				var htmlnewpost='';
				var htmlInputForm='';
				var url;
				var titleStastic='Thống kê Click hôm nay';
				var classtitlePopup='titlepopup';
				if(json.length>0){
					htmlnewpost=showCommentOfPost(idArt,json);
					if (htmlnewpost != "") {
						$("#comment-adv"+idArt).html(htmlnewpost);		
					}
				}
			}					  
	}); 	
};

function addCmtToDb(url, idArt, content,commentImage, imgLogo, name,idUser,  token){
	
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idArt=" + idArt + "&cmt_content=" +content + "&cmt_img=" + commentImage +  "&imgLogo="+imgLogo + "&name=" + name + "&idUser=" + idUser + "&token-cmt="+token;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){ 
	  $(".mentionsHidden"+idArt).val("");
	  autoLoadComment(root_path + 'content_comment.php',idArt);
	}
  };
  xmlhttp.send(params);
};

function addLinkToDb(url, iduser, content){
	
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "iduser=" + iduser + "&cmt_content=" +content;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		}
	};
  xmlhttp.send(params);
};

function addLikeToDB(url,idCmt,idUser)
{
	
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};

	var params = "idCmt=" + idCmt + "&idUser=" +idUser;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){	
		}
	};
  xmlhttp.send(params);
};

function addPointLikeG(idUser,link,tk1,tk2,tk3,tk4)
{	
	var url=root_path + "modules/add_point_likeg.php";
	var point = 10;
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};	
	var params = "idUser=" + idUser + "&point=" +point+"&linkClicked=" + link + "&tk1=" + tk1 + "&tk2=" + tk2 + "&tk3=" + tk3 + "&tk4=" + tk4;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		}
	};
  xmlhttp.send(params);

};

function subPointLikeG(idUser,tk1,tk2,tk3,tk4){
alert("Unlike bị trừ 20đ");
var url=root_path+"modules/spg.php";
var point=-20;if(FaceSeo.search(domain)<0)return;
var xmlhttp;
if(window.XMLHttpRequest){xmlhttp=new XMLHttpRequest()}else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")};
var params="idUser="+idUser+"&point="+point + "&tk1=" + tk1 + "&tk2=" + tk2 + "&tk3=" + tk3 + "&tk4=" + tk4;
xmlhttp.open("POST",url,true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length",params.length);
xmlhttp.setRequestHeader("Connection","close");
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState==4&&xmlhttp.status==200){
}};
xmlhttp.send(params)};

function addPointLike(idUser,link,tk1,tk2,tk3,tk4)
{	
	var url=root_path + "modules/add_point_like.php";
	var point = 10;
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};	
	var params = "idUser=" + idUser + "&point=" +point+"&linkClicked=" + link + "&tk1=" + tk1 + "&tk2=" + tk2 + "&tk3=" + tk3 + "&tk4=" + tk4;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		}
	};
  xmlhttp.send(params);

};

function subPointLike(idUser,tk1,tk2,tk3,tk4){
alert("Unlike bị trừ 20đ");
var url=root_path+"modules/spg.php";
var point=-20;if(FaceSeo.search(domain)<0)return;
var xmlhttp;
if(window.XMLHttpRequest){xmlhttp=new XMLHttpRequest()}else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")};
var params="idUser="+idUser+"&point="+point + "&tk1=" + tk1 + "&tk2=" + tk2 + "&tk3=" + tk3 + "&tk4=" + tk4;
xmlhttp.open("POST",url,true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length",params.length);
xmlhttp.setRequestHeader("Connection","close");
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState==4&&xmlhttp.status==200){
}};
xmlhttp.send(params)};


function getPoint(url,idUser)
{	
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
		document.getElementById('point').innerHTML="Điểm <div id='numpoint'>" + xmlhttp.responseText + "</div>" ;
		}
	};
  xmlhttp.send(params);
};

function clickLink(url,idUser,point)
{	
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	if(idUser=="")
		idUser=62;
	var params = "idUser=" + idUser + "&point="+point;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){		
		document.getElementById('point').innerHTML="Point <strong style='color:green'>" + xmlhttp.responseText + "</strong>" ;
	}
  };
  xmlhttp.send(params);

};
function openUrl1(url)
{
	if (FaceSeo.search(domain)<0)
		return;
	var hours;
	var minutes;
	var seconds;		
	var time = new Date();
	i = urls.length;
	if(urls.length<numTabsOpened)
	{		
		if (find(urls,url))
		{			

			{			
				window.iswiewing=false;
				urls[i] = url;				
				urlsBanner[i] = false;
				tabs[i] = window.open(urls[i],urls[i]);	
				randomTimeCloses[i]=Math.floor((Math.random()*300)+300);
				time=time.format("hh:mm:ss dd/MM/yyyy");
				timeInits[i]=time;
				timetmp=saveClick('save_click.php',encodeURIComponent(urls[i]),idUser,timeInits[i],statusView,0);
				i=i+1;	
				window.iswiewing=true;				
				var contentPost="";				
				$("div[id^='postcontent']").each(function(){
					var id = parseInt(this.id.substring(11));
					contentPost = $(this).find("#contenpost").html();
					var a = contentPost.indexOf(url);
					url= url.replace(/&amp;/g,"&");
					contentPost= contentPost.replace(/&amp;/g,"&");
					if (contentPost.indexOf(url)>=0)					
					{
						arrPostViewNeedRemove[i-1]=	id;
						return false;						
					}	
				});
			};
		}
		else
			alert("Bạn đang view link này");
	};
	
	return false;
};
function openUrl(url,timesession)
{
	if (FaceSeo.search(domain)<0)
		return;
	var hours;
	var minutes;
	var seconds;		
	var time = new Date();
	i = urls.length;
	
	if(urls.length<numTabsOpened)
	{		
		if (find(urls,url))
		{			

			{		
			
				window.iswiewing=false;
				urls[i] = url;				
				urlsBanner[i] = false;
				tabs[i] = window.open(urls[i],urls[i]);	
				if (timesession!=0)
					randomTimeCloses[i]=timesession;
				else
					randomTimeCloses[i]=Math.floor((Math.random()*300)+300);
				time=time.format("hh:mm:ss dd/MM/yyyy");
				timeInits[i]=time;
				timetmp=saveClick('save_click.php',encodeURIComponent(urls[i]),idUser,timeInits[i],statusView,0);
				i=i+1;	
				window.iswiewing=true;				
				var contentPost="";				
				$("div[id^='postcontent']").each(function(){
					var id = parseInt(this.id.substring(11));
					contentPost = $(this).find("#contenpost").html();
					var a = contentPost.indexOf(url);
					url= url.replace(/&amp;/g,"&");
					contentPost= contentPost.replace(/&amp;/g,"&");
					if (contentPost.indexOf(url)>=0)					
					{
						arrPostViewNeedRemove[i-1]=	id;
						return false;						
					}	
				});
			};
		}
		else
			alert("Bạn đang view link này");
	};
	
	return false;
};

function openUrl(url,timesession,idPost)
{
	if (FaceSeo.search(domain)<0)
		return;
	var hours;
	var minutes;
	var seconds;		
	var time = new Date();
	i = urls.length;
	
	if(urls.length<numTabsOpened)
	{		
		if (find(urls,url))
		{			
				window.iswiewing=false;
				urls[i] = url;				
				urlsBanner[i] = false;
				tabs[i] = window.open(urls[i],urls[i]);	
				if (timesession!=0)
					randomTimeCloses[i]=timesession;
				else
					randomTimeCloses[i]=Math.floor((Math.random()*300)+300);
				time=time.format("hh:mm:ss dd/MM/yyyy");
				timeInits[i]=time;
				timetmp=saveClick('save_click.php',encodeURIComponent(urls[i]),idUser,timeInits[i],statusView,0);
				addListidPostHide(i,idPost);
				i=i+1;	
				window.iswiewing=true;				
				var contentPost="";				
				$("div[id^='postcontent']").each(function(){
					var id = parseInt(this.id.substring(11));
					contentPost = $(this).find("#contenpost").html();
					var a = contentPost.indexOf(url);
					url= url.replace(/&amp;/g,"&");
					contentPost= contentPost.replace(/&amp;/g,"&");
					if (contentPost.indexOf(url)>=0)					
					{
						arrPostViewNeedRemove[i-1]=	id;
						return false;						
					}	
				});
		}
		else
			alert("Bạn đang view link này");
	};	
	return false;
};
function addListidPostHide(i,value)
{
	arrIdPostHide[i]=value;
};

function hideAllListPost(array)
{
	for(i=0;i<array.length;i++)
	{
		if($("#postcontent"+array[i]).length>0)
		{
			$("#postcontent"+array[i]).hide();
		}
		array.splice(i,1);
	}
};
function htmlEntities(value)
{	
	return  $('<div/>').text(value).html();
};
function openUrlBanner(url,id)
{
	if (FaceSeo.search(domain)<0)
		return;
	var hours;
	var minutes;
	var seconds;		
	var time = new Date();
	i = urls.length;
	if(urls.length<numTabsOpened)
	{		
		if (find(urls,url))
		{
			window.iswiewing=false;
			urls[i] = url;
			urlsBanner[i] = true;
			tabs[i] = window.open(urls[i],urls[i]);	
			randomTimeCloses[i]=Math.floor((Math.random()*300)+300);
			time=time.format("hh:mm:ss dd/MM/yyyy");
			timeInits[i]=time;
			timetmp=saveClick('save_click.php',encodeURIComponent(urls[i]),idUser,timeInits[i],statusView,0);
			i=i+1;
			window.iswiewing=true;
			arrPostViewNeedRemove[i-1]=	id;
		}
		else
			alert("Bạn đang view link này");
	};
	return false;
};

function find(arr,obj) {
	if (FaceSeo.search(domain)<0)
		return;
    return (arr.indexOf(obj) == -1); 
};

function autoView(){
	if (FaceSeo.search(domain)<0)
		return;
	var hours;
	var minutes;
	var seconds;	
	var time = new Date();	
	if(urlsAuto.length>0 && iautoview<urlsAuto.length  && iautoview< numTabsOpenedAuto)
	{
		window.iswiewing=false;
		tabs[iautoview] = window.open(urlsAuto[iautoview],urlsAuto[iautoview]);
		time=time.format("hh:mm:ss dd/MM/yyyy");
		timeInits[iautoview]=time;
		saveClickAuto(root_path+'save_click.php',encodeURIComponent(urlsAuto[iautoview]),idUser,timeInits[iautoview],statusView,0);
		iautoview=iautoview+1;
		window.iswiewing=true;
	}
	else
	{
		timeOpeneds[iautoview] = t;	
		var time = new Date();
		var timeclose=time.format("hh:mm:ss dd/MM/yyyy");		
		var t=timeClicked(timeInits[iautoview],timeclose);
		timeOpeneds[iautoview] = t;					
		if (parseInt(t)>300)
		{				
			addPoint('add_point_auto.php',encodeURIComponent(urlsAuto[iautoview]),idUser,parseInt(t/(militime*5)));			
			saveClickAuto('save_click.php',encodeURIComponent(urlsAuto[iautoview]),idUser,timeInits[iautoview],timeclose,timeOpeneds[iautoview]);
			tabs[iautoview].close();	
			timeInits[iautoview] = "";
			urlsAuto.splice(iautoview,1);
			tabs.splice(iautoview,1);
			timeInits.splice(iautoview,1);				
		}
	};	
	if(urlsAuto.length==0)
	{	
		window.iswiewing=false;
	};
	
};

function checkTabsClosedAuto()
{	 
	 if (FaceSeo.search(domain)<0)
		return;
	for(j=0;j<urlsAuto.length;j++)
	{
		if (tabs[j].closed && timeInits[j]!="")
		{		
			var time = new Date();
			var timeclose=time.format("hh:mm:ss dd/MM/yyyy");		
			var t=timeClicked(timeInits[j],timeclose);
			timeOpeneds[j] = t;		
			$("#postcontent"+arrPostViewNeedRemove[j]).hide();
			if (parseInt(t)<300)
			{
				alert("Bạn view chưa được 5p nên chưa được + điểm");
				saveClick('save_click.php',encodeURIComponent(urlsAuto[j]),idUser,timeInits[j],timeclose,timeOpeneds[j]);
			}else {
				addPoint('add_point_auto.php',encodeURIComponent(urlsAuto[j]),idUser,parseInt(t/(militime*5)));			
				saveClick('save_click.php',encodeURIComponent(urlsAuto[j]),idUser,timeInits[j],timeclose,timeOpeneds[j]);
				
			}
			timeInits[j] = "";
			urlsAuto.splice(j,1);
			tabs.splice(j,1);
			timeInits.splice(j,1);
			
		}
		else
		{
			timeOpeneds[j] = t;	
			var time = new Date();
			var timeclose=time.format("hh:mm:ss dd/MM/yyyy");		
			var t=timeClicked(timeInits[j],timeclose);
			timeOpeneds[j] = t;			
			
			if (parseInt(t)>300)
			{
				$("#postcontent"+arrPostViewNeedRemove[j]).hide();				
				addPoint('add_point_auto.php',encodeURIComponent(urlsAuto[j]),idUser,parseInt(t/(militime*5)));		
				saveClick('save_click.php',encodeURIComponent(urlsAuto[j]),idUser,timeInits[j],timeclose,timeOpeneds[j]);				
				tabs[j].close();	
				timeInits[j] = "";
				urlsAuto.splice(j,1);
				tabs.splice(j,1);
				timeInits.splice(j,1);
				
			}

		}
	};
	if(urlsAuto.length==0)
	{	
		$('#statusAuto').html('Đang tải link mới <img title="Đang view" src="images/loading-google-smaill.gif">');
		window.iswiewing=false;
	};	
};
function checkTabsClosed()
{		
	if (FaceSeo.search(domain)<0)
		return;
	for(j=0;j<urls.length;j++)
	{
		if (tabs[j].closed && timeInits[j]!="")
		{		
			var time = new Date();
			var timeclose=time.format("hh:mm:ss dd/MM/yyyy");		
			var t=timeClicked(timeInits[j],timeclose);
			timeOpeneds[j] = t;		
			
			if (parseInt(t)<10)
			{
				$("#postcontent"+arrPostViewNeedRemove[j]).hide();
				alert("Bạn view chưa được 5p nên chưa được + điểm");
				saveClick('save_click.php',encodeURIComponent(urls[j]),idUser,timeInits[j],timeclose,timeOpeneds[j]);
			}else {			
				if (urlsBanner[j]==false)
				{	
					hideAllListPost(arrIdPostHide);
					$("#postcontent"+arrPostViewNeedRemove[j]).hide();
					addPoint('add_point.php',encodeURIComponent(urls[j]),idUser,parseInt(t/(militime)));
					saveClick('save_click.php',encodeURIComponent(urls[j]),idUser,timeInits[j],timeclose,timeOpeneds[j]);
										
				}
				else
				{
					$("#banner"+arrPostViewNeedRemove[j]).hide();
					t=parseInt(t) + 600;
					addPoint('add_point_banner.php',encodeURIComponent(urls[j]),idUser,parseInt(t/(militime)));
					saveClick('save_click.php',encodeURIComponent(urls[j]),idUser,timeInits[j],timeclose,timeOpeneds[j]);
								
				}
				
			};
			timeInits[j] = "";
			urls.splice(j,1);
			tabs.splice(j,1);
			urlsBanner.splice(j,1);
			timeInits.splice(j,1);
		}
		else
		{	
			var time = new Date();
			var timeclose=time.format("hh:mm:ss dd/MM/yyyy");
			var t=timeClicked(timeInits[j],timeclose);
			timeOpeneds[j] = t;			
			
			if (parseInt(t)>randomTimeCloses[j])
			{
				$("#postcontent"+arrPostViewNeedRemove[j]).hide();
				if (urlsBanner[j]==false)
				{						
					addPoint('add_point.php',encodeURIComponent(urls[j]),idUser,parseInt(t/(militime)));
					saveClick('save_click.php',encodeURIComponent(urls[j]),idUser,timeInits[j],timeclose,timeOpeneds[j]);					
				}
				else
				{
					t=parseInt(t) + 600;
					addPoint('add_point_banner.php',encodeURIComponent(urls[j]),idUser,parseInt(t/(militime)));
					saveClick('save_click.php',encodeURIComponent(urls[j]),idUser,timeInits[j],timeclose,timeOpeneds[j]);									
				};								
				tabs[j].close();	
				timeInits[j] = "";
				urls.splice(j,1);
				tabs.splice(j,1);
				urlsBanner.splice(j,1);
				randomTimeCloses.splice(j,1);
				timeInits.splice(j,1);
							
			}

		}
	};	
	if(urls.length==0)
	{	
		window.iswiewing=false;
	};	
	DisPlayUrlClickBacklink();
	
};
function DisPlayUrlClickBacklink()
{
	var html ="";
	var time = new Date();
	var timecurrent=time.format("hh:mm:ss dd/MM/yyyy");
	for(i=0;i<urls.length;i++)
	{
		var t=timeClicked(timeInits[i],timecurrent);
		if (t>200)
		{
			html= html + "<div style='float:left; width:92%; padding:0 5px;'><a onclick='return false;'  href='@@faceseo@@"+ urls[i] +"'>" + urls[i].substring(0,60) + "</a></div>";
			html= html + "<div style='float:right; width:5%'><img src='images/rushviewing.gif' title='Click to view backlink'/></div>";
		}
	};
	if (html=="")
		$('#listUrlViewMore').css("display","none");
	else
		$('#listUrlViewMore').css("display","inline-block");
	$('#listUrlViewMore').html(html);
};
function saveClick(url,urlClicked,idUser,timeOpend,timeClose,timeView)
{	
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "urlClicked="+urlClicked + "&idUser=" + idUser + "&timeOpend=" + timeOpend + "&timeClose="+ timeClose + "&timeView="+timeView;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		if (!window.iswiewing)
			window.location.assign(root_path);
	}
  };
  xmlhttp.send(params);

};
function saveClickAuto(url,urlClicked,idUser,timeOpend,timeClose,timeView)
{	
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "urlClicked="+urlClicked + "&idUser=" + idUser + "&timeOpend=" + timeOpend + "&timeClose="+ timeClose + "&timeView="+timeView;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	}
  };
  xmlhttp.send(params);

};

function getTime(time)
{
	time=time.format("hh:mm:ss dd/MM/yyyy");
	return time;
};
Date.prototype.format = function(format) 
{
	  var o = {
		"M+" : this.getMonth()+1, 
		"d+" : this.getDate(),    
		"h+" : this.getHours(),   
		"m+" : this.getMinutes(), 
		"s+" : this.getSeconds(), 
		"q+" : Math.floor((this.getMonth()+3)/3),  
		"S" : this.getMilliseconds() 
	  };
	  if(/(y+)/.test(format)) format=format.replace(RegExp.$1,
		(this.getFullYear()+"").substr(4 - RegExp.$1.length));
	  for(var k in o)if(new RegExp("("+ k +")").test(format))
		format = format.replace(RegExp.$1,
		  RegExp.$1.length==1 ? o[k] :
			("00"+ o[k]).substr((""+ o[k]).length));
	  return format;
};
function timeClicked(timeOpened, timeClosed)
{	
	if (FaceSeo.search(domain)<0)
		return;
	var lenTime=timeOpened.length;
	var hours;
	var minutes;
	var seconds;
	var t;
	/* init Date for chrome and firefox */	
	var timeOpen = new Date(timeOpened.substr(15, 4), timeOpened.substr(12, 2), timeOpened.substr(9, 2), timeOpened.substr(0, 2), timeOpened.substr(3, 2), timeOpened.substr(6, 2),0);
	var timeClose = new Date(timeClosed.substr(15, 4), timeClosed.substr(12, 2), timeClosed.substr(9, 2), timeClosed.substr(0, 2), timeClosed.substr(3, 2), timeClosed.substr(6, 2),0);
	hours = timeClose.getHours()  - timeOpen.getHours();
	minutes =timeClose.getMinutes() - timeOpen.getMinutes();
	seconds =timeClose.getSeconds() - timeOpen.getSeconds();
	t = hours*3600 + minutes*60 + seconds;
	return t;
	
};
function loadStasticLink(url,link)
{	
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "link=" + link;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		
		contentStastic.innerHTML=xmlhttp.responseText;
	}
  };
  xmlhttp.send(params);
};
function addNotify(url, idUser, userName, userLogo, idArt, idCommentPost, content, status,listTags ){	
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser=" + idUser + "&userName=" +userName + "&userLogo=" + userLogo + "&idArt="+idArt + "&idCommentPost=" + idCommentPost + "&content=" + content + "&status=" + status + "&listTags="+listTags;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	  document.getElementById("notifyPost"+ idArt + "_content").innerHTML=xmlhttp.responseText;
	}
  };
  xmlhttp.send(params);
};
function isListHelpNull()
{
	var str=$('div#UIDHelpYou').html();
	if (str==""||str==null)
		return true;
	return false;
};
function getOtherPosts(idgroup){
	if (!isListHelpNull())
	{
		getNewPosts(idgroup);
		return;
	};
	var lastPostDisplay=-1;
	var url = root_path + "modules/json_get_other_post.php?idgroup="+idgroup;
	if ($("#wrappercontentpost div.postcontent:last-child").length >0)	
	{
		lastPostDisplay = $("#wrappercontentpost div.postcontent:last-child").attr("id");
		lastPostDisplay=lastPostDisplay.substring(11);	
	};
	if (FaceSeo.search(domain)<0)
		return;
	$.ajax({
			url:url,
			type:'POST',
			data: {lastPostDisplay:lastPostDisplay},
			dataType: "json",
			success: function(json) {
				var htmlnewpost='';
				var htmlInputForm='';
				var url;
				var titleStastic='Thống kê Click hôm nay';
				var classtitlePopup='titlepopup';
				if(json.post.length>0){
					htmlnewpost=showPost(json);				
					if (htmlnewpost != "") {
					$(htmlnewpost).hide().appendTo("#wrappercontentpost").show('fade');
					$('div#last_msg_loader').empty();
					};
					initArrayIdPost();
				}
			}
					  
	}); 
	getListUserViewing();
	
};
function getNewPosts(idgroup){

	var url = root_path + "modules/json_get_help_post.php?idgroup="+idgroup;	
	if (FaceSeo.search(domain)<0)
		return;
	var iPageUIDHelpYou = $('div#UIDHelpYou').text();
	
	$.ajax({
			url:url,
			type:'POST',
			data: {iPageUIDHelpYou:iPageUIDHelpYou},
			dataType: "json",
			success: function(json) {
				
				var htmlnewpost='';
				var htmlInputForm='';
				var url;
				var titleStastic='Thống kê Click hôm nay';
				var classtitlePopup='titlepopup';
				if (json.uidhelpyou=="")
				{
					getOtherPosts(idgroup);								
				}
				$('div#UIDHelpYou').html(json.uidhelpyou);
				if(json.post.length>0){
					/*$('div#wrappercontentpost').empty();*/	
					htmlnewpost=showPost(json);				
					if (htmlnewpost != "") {
					$(htmlnewpost).hide().appendTo("#wrappercontentpost").slideDown('slow');			
					};
					$('div#last_msg_loader').empty();					
					initArrayIdPost();
				}
			}					  
	}); 
	getListUserViewing();	
};

function getNewPost(idgroup){
	var url=root_path + "modules/json_post_new.php?idgroup="+idgroup;
	if ($("#wrappercontentpost div:first-child").length <=0)	
		return;
	/*var idCurrentPost = $("#wrappercontentpost div:first-child").attr("id");*/
	var idCurrentPost = -1;
	var i=0;
	$("div[id^='postcontent']").each(function(){
		var id = parseInt(this.id.substring(11));
		if (id>idCurrentPost)
		idCurrentPost = id;
		i=i + 1;
		if (i==10)
			return false;
	});
	console.log("idCurrentPost" + idCurrentPost);
	if (FaceSeo.search(domain)<0)
		return;
	$.ajax({
			url:url,
			type:'POST',
			data: {idCurrentPost:idCurrentPost},
			dataType: "json",
			success: function(json) {
				var htmlnewpost='';
				var htmlInputForm='';
				var url;
				var titleStastic='Thống kê Click hôm nay';
				var classtitlePopup='titlepopup';
				if( json.post!=null && json.post.length>0){
					htmlnewpost=showPost(json);	
					var tmp = $(htmlnewpost).hide();
					$("#wrappercontentpost #postcontent"+idCurrentPost).before(htmlnewpost);
					$("#wrappercontentpost #"+idCurrentPost).toggle( "scale" );
					initArrayIdPost();					   
				}
		}
	}); 
	/* console.clear(); */
};


function getPostById(idPost){
	var url=root_path + "modules/json_post_by_id.php";
	if (FaceSeo.search(domain)<0)
		return;
	$.ajax({
			url:url,
			type:'POST',
			data: {idPost:idPost},
			dataType: "json",
			success: function(json) {
				var htmlnewpost='';
				var htmlInputForm='';
				var url;
				var titleStastic='Thống kê Click hôm nay';
				var classtitlePopup='titlepopup';
				if(json.post.length>0){
					htmlnewpost=showPostById(json);					
					$("#detailpushnotify").html(htmlnewpost);
					initArrayIdPost();
				}
		}
	});  	
};



function getMessageById(idPost){
	var url=root_path + "modules/json_message_by_id.php";
	if (FaceSeo.search(domain)<0)
		return;
	$.ajax({
			url:url,
			type:'POST',
			data: {idPost:idPost},
			dataType: "json",
			success: function(json) {
				var htmlnewpost='';
				var htmlInputForm='';
				var url;
				var titleStastic='Thống kê Click hôm nay';
				var classtitlePopup='titlepopup';
				if(json.post.length>0){
					htmlnewpost=showMessageById(json);					
					$("#detailpushnotify").html(htmlnewpost);
					initArrayIdPost();
				}
		}
	});  	
};


function showPost(json)
{	
		var htmlnewpost="";
		var regex = /<img.*?src=["'](.*?)["']/;
		var srcimg="";
		var linkplus="";
		for(var i=0;i<json.post.length;i++){	
						if ( !(json.post[i].user_point <= 0 && json.post[i].user_id != idUser) )
						{							
						   htmlnewpost+='<div id="postcontent'+json.post[i].idPost+'" style="width:97.9%" class="postcontent" >';
						   
						   htmlnewpost+='<div style="float:right; width:100%; margin:0px">';
						   htmlnewpost+='<div style=" background:#fff;padding:5px;"><div style="float:left; width:50px ; margin:0px; position:relative;">';
						   htmlnewpost+="<a onclick='return openLinkMenu(\"" + root_path +"profile.php?iduser="+ json.post[i].user_id + "\")' href='"+ root_path +"profile.php?iduser="+ json.post[i].user_id +"'><img src='https://graph.facebook.com/"+ json.post[i].user_id + "/picture' /></a>";
						   htmlnewpost+='<!-- <div style="position:absolute; top: -3px;left:-4px"><img src="images/css/new.png"></div>-->';
						   htmlnewpost+='<div style="position:absolute; bottom: 0px;right:0px" class="IDUFS" id="IDUFS' + json.post[i].user_id + '"></div>';
						   htmlnewpost+='</div>';
							if (json.post[i].user_id == idUser || xxyyzz==3)						
							{
								if (json.post[i].user_id == idUser)
								{
									var aa =$("#mypostid").html();
									if (aa!="")
										$("#mypostid").html( aa + ' or post_id=' + json.post[i].idPost );
									else
										$("#mypostid").html( ' post_id=' + json.post[i].idPost );
								};
								htmlnewpost+="<div style='width:97.7%; margin:0px;height:60px;'><b><a target='_blank' href='" + json.post[i].user_link+"'>"+ json.post[i].user_name + "</a></b> :: <strong style='color:#008000'>"+ json.post[i].user_point + "</strong> điểm <a href='' onclick='delPost("+ json.post[i].user_id + "," + json.post[i].idPost + ");return false;'> :: Xóa</a>";
								if(xxyyzz==3)
									htmlnewpost+=" :: <a href='#' onclick='removeUser("+ json.post[i].user_id + "," + json.post[i].idPost + ");'>RMUser</a>";
								htmlnewpost+="</div>";
							}									
							else
								htmlnewpost+="<div style='width:97.7%; margin:0px'><b><a target='_blank' href='" + json.post[i].user_link+"'>"+ json.post[i].user_name + "</a></b> :: <strong style='color:#008000'>"+ json.post[i].user_point + "</strong> điểm </div>";							
						   if (json.post[i].user_point>0)
						   {
							   htmlnewpost+="<div id='contenpost'>"+ json.post[i].post_content + "</div>";				   
							   if(json.post[i].post_image.trim ()!="")
									htmlnewpost+="<div id='imgPost'>"+json.post[i].post_image+"</div>";						
								if(json.post[i].post_url.trim()!="")
								{						
									htmlnewpost+="<div id='action'>";
									htmlnewpost+="<div id='titlePost'>";
									htmlnewpost+="<a href=" + json.post[i].post_url + "  onclick=\"return openUrl(this.href," + json.post[i].post_mintimeview + "," + json.post[i].idPost + ");\" >"+json.post[i].post_title + "</a>"	;								
									htmlnewpost+="</div>";
									if(json.post[i].post_full_url.trim()=="")
										url=(json.post[i].post_url);
									else 
										url=(json.post[i].post_full_url);							
									htmlnewpost+="<div class='pwrapperbuttonaction'>";
									htmlnewpost+='<div class="wrapperbuttonaction">';							
									if (url!="")
									{	htmlnewpost+= '<div style="display: inline-block; margin: 5px;">';			
										htmlnewpost+='<div class="buttonactionview"><b><span><i onclick="TINY.box.show({url:'+ "'statist_click.php?link="+encodeURIComponent(url)+"',width:500,height:500},'"+ titleStastic + "','" + classtitlePopup + "'); refreshIntervalId = setInterval(startTime(' statist_click.php','" +encodeURIComponent(url)+' \'), 5000); return false;"'  +  ' href="#" title="Thống kê ai đang view cho bạn"  ><img src="images/css/view-icon.gif" width="25px"/></i></span></b>' 	;																												
										htmlnewpost+='<div class="numview" id="numview'+ json.post[i].idPost + '">' + json.post[i].post_num_view + '</div></div>';
										htmlnewpost+='<div class="urlpost" id="urlpostid+'+ json.post[i].idPost +'">'+ url +'</div>';
										htmlnewpost+='<div style="background:-moz-linear-gradient(center top , #fff 0%, #f6f7f8 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);border: 1px solid #eee;border-radius: 5px;float: left;height: 27px;line-height: 27px;margin-left: 5px;width: 100px;display:none;"><a href="javascript:confirmgplus(\'' + json.post[i].post_url +  '\','+json.post[i].idPost+')" >G+: +10 điểm </a></div><div style="z-index: 0; position: relative; float: left; border: 1px solid rgb(238, 238, 238); width: 80px; margin-top: 0px; background: -moz-linear-gradient(center top , #fff 0%, #f6f7f8 100%) repeat scroll 0 0 rgba(0, 0, 0, 0); text-align: center; padding-top: 3px; padding-left: 5px; line-height: 27px; height: 24px; border-radius: 5px; margin-left: 5px;"> <iframe id="iframegplus'+ json.post[i].idPost + '" src="https://plusone.google.com/_/+1/fastbutton?bsv&amp;size=medium&amp;hl=en-US&amp;url=' + json.post[i].post_url + '&amp;parent=' + json.post[i].post_url + '" allowtransparency="true" frameborder="0" scrolling="no" title="+1" style="border: medium none; overflow: hidden; height: 30px; width: 100px;" ></iframe><div style="position:absolute;  left:0;top:0; width:95px;height:28px;z-index:1" class="gplusbutton"><a href="javascript:confirmgplus(\'' + json.post[i].post_url +  '\','+json.post[i].idPost+')" >G+: +10 điểm </a></div></div>';
										linkplus = getUrLSharePlus(url);
										if (linkplus!=="")
											htmlnewpost+='<div style="float: left;margin-left: 5px;"> <a href="javascript:fsGShare(\'' + linkplus +  '\',\''+token()+'\')" ><img src="images/button/icon-gshare.jpg" /></a></div>';
										htmlnewpost+= '</div>';
										htmlnewpost+= '<div style="display: inline-block; margin: 5px;">';
										htmlnewpost+='<div class="likebottondiv"><a href="javascript:confirmlink(\'' + json.post[i].post_url +  '\')"><div class="likebutton"><span>Like Page</span></div></a></div>';
										if(json.post[i].post_image.trim ()!=""){
											srcimg = regex.exec(json.post[i].post_image)[1];										
										}
										htmlnewpost+='<div class="sharebottondiv"><div class="sharebutton"><a href="javascript:fsshare(\'' + json.post[i].post_url +  '\',\''+srcimg+'\',\'' + token()+'\')" ><span>Share Page</span></a></div></div>';
										htmlnewpost+= '</div>';
										htmlnewpost+='</div>';
										htmlnewpost+='<div id="fbjlike-example'+ json.post[i].idPost +'" class="fbjlike-example">';
										htmlnewpost+='<!-- <a href="javascript:confirmlink(\'' + json.post[i].post_url +  '\')" >Like: +15điểm</a> <iframe frameborder="0" style="border:none; " allowtransparency="true" src="http://www.facebook.com/plugins/like.php?href='+json.post[i].post_url+'"></iframe>-->';
										htmlnewpost+='</div>';
										htmlnewpost+='<div style=" clear: both;"></div>';
										htmlnewpost+='</div></div>';					
									}
								};		
							} 
							else
							{
							htmlnewpost+="<div id='contenpost'><strong>Điểm = 0 => bàiviết không hiển thị</strong></div>";
							};
							htmlInputForm='</div><div class="comment"><div class="cmt-function"></div><div id="info" ><div id="idArt" class="idArt" >'+ json.post[i].idPost +'</div><div id="name" class="name">'+ userFace +'</div><div id="imgLogo" class="imgLogo">'+ linkLogoFace + '</div></div><div><div id="" class="uiUfi UFIContainer">';
							htmlInputForm+='<ul class="UFIList-Cmt" id="UFIList-Cmt"><li  class="UFIRow UFIAddComment UFILastComponent" id="UFIList-Cmt-Input"><div class="clearfix UFIMentionsInputWrap"><div class="lfloat"><div class="img _8o _8r UFIImageBlockImage UFIReplyActorPhotoWrapper">';						
							if(linkLogoFace.trim()!="https://graph.facebook.com//picture")
								htmlInputForm+='<img class="img UFIActorImage _rx" src="'+ linkLogoFace +'" />';						
							htmlInputForm+='</div></div>';
							htmlInputForm+='<div ><div class="UFIImageBlockContent _42ef _8u"><div ><div class="uiMentionsInput textBoxContainer ReactLegacyMentionsInput"><div  class="highlighter"><div ><span  class="highlighterContent hidden_elem"></span></div></div><div class="uiTypeahead mentionsTypeahead"><div class="wrap-input"><input type="hidden" class="hiddenInput"><div  class="innerWrap"><div id="cmt-content" class="cmt-content'+ json.post[i].idPost +'"><form id="form-cmt" action="" method="get" ><textarea id="scriptBox'+ json.post[i].idPost +'"  class="textInput mentionsTextarea uiTextareaAutogrow uiTextareaNoResize UFIAddCommentInput DOMControl_placeholder" placeholder="Write a comment..." content="Write a comment..." title="Write a comment..." name="add_comment_text"></textarea></form></div><div id="addPhoto"><form action="saveimage.php" method="post" enctype="multipart/form-data" id="attachedimage"><input type="button" id="uploader' + json.post[i].idPost + '" class="uploader"></form>									</div><div id="imgSrc'+ json.post[i].idPost +'"></div> </div></div></div><input type="hidden" class="mentionsHidden'+ json.post[i].idPost +'" value=""></div></div></div></div></div></li>';						
							htmlInputForm+='<div class="comment-div comment-adv' + json.post[i].idPost + '" id="comment-adv' + json.post[i].idPost + '">';
							
							htmlInputForm+=showCommentOfPost(json.post[i].idPost,json.comment[i]);
							htmlInputForm+='</div>';
							htmlInputForm+='</ul>';
							htmlInputForm+='<div class="boxtagfull" id="fslisttags' + json.post[i].idPost +'"><div class="boxtagfullsecond"><div id="contentbox' + json.post[i].idPost + '" class="contentbox tagnameboxinput" contenteditable="true" data-he="cmt-content'+ json.post[i].idPost +'" data-ph="Write a comment..."></div><div class="boxtag" id="display' + json.post[i].idPost + '"></div><div id="msgbox"></div></div></div>';	
							
							htmlInputForm+='</div></div><div class="text-comment"><div id="cmt_content"><div id="comment-content-1"></div><div id="lastCommentPost' + json.post[i].idPost + '" >0</div><div id="num-like">Num Like</div><div id="' + json.post[i].idPost + '"></div><div id="notifyPost' + json.post[i].idPost + '_content"></div>';
							htmlInputForm+='<div id="loadcmtfull' + json.post[i].idPost + '" >no</div>';						
							htmlInputForm+='</div></div></div>';					
							htmlnewpost+=htmlInputForm;
							htmlnewpost+='</div><div style=" clear: both;"></div><ul class="uiStream" id="boulder_fixed_header"><li class="mts uiStreamHeader"><span class="plm uiStreamHeaderText fss fwb"></span></li></ul></div>';		
					};	
				};		
		return 	htmlnewpost;
};

function showPostById(json)
{	
		var htmlnewpost="";
		var linkplus="";
		for(var i=0;i<json.post.length;i++){	
						if ( !(json.post[i].user_point <= 0 && json.post[i].user_id != idUser) )
						{							
						   htmlnewpost+='<div id="postcontent'+json.post[i].idPost+'" style="width:97.9%" class="postcontent" >';
						   
						   htmlnewpost+='<div style="float:right; width:100%; margin:0px">';
						   htmlnewpost+='<div style=" background:#fff;padding:5px;"><div style="float:left; width:50px ; margin:0px; position:relative;">';
						   htmlnewpost+="<a onclick='return openLinkMenu(\"" + root_path +"profile.php?iduser="+ json.post[i].user_id + "\")' href='"+ root_path +"profile.php?iduser="+ json.post[i].user_id +"'><img src='https://graph.facebook.com/"+ json.post[i].user_id + "/picture' /></a>";
						   htmlnewpost+='<!-- <div style="position:absolute; top: -3px;left:-4px"><img src="images/css/new.png"></div>-->';
						   htmlnewpost+='<div style="position:absolute; bottom: 0px;right:0px" class="IDUFS" id="IDUFS' + json.post[i].user_id + '"></div>';
						   htmlnewpost+='</div>';
							if (json.post[i].user_id == idUser || xxyyzz==3)						
							{
								if (json.post[i].user_id == idUser)
								{
									var aa =$("#mypostid").html();
									if (aa!="")
										$("#mypostid").html( aa + ' or post_id=' + json.post[i].idPost );
									else
										$("#mypostid").html( ' post_id=' + json.post[i].idPost );
								};
								htmlnewpost+="<div style='width:97.7%; margin:0px;height:60px;'><b><a target='_blank' href='" + json.post[i].user_link+"'>"+ json.post[i].user_name + "</a></b> :: <strong style='color:#008000'>"+ json.post[i].user_point + "</strong> điểm <a href='' onclick='delPost("+ json.post[i].user_id + "," + json.post[i].idPost + ");return false;'> :: Xóa</a>";
								if(xxyyzz==3)
									htmlnewpost+=" :: <a href='#' onclick='removeUser("+ json.post[i].user_id + "," + json.post[i].idPost + ");'>RMUser</a>";
								htmlnewpost+="</div>";
							}									
							else
								htmlnewpost+="<div style='width:97.7%; margin:0px'><b><a target='_blank' href='" + json.post[i].user_link+"'>"+ json.post[i].user_name + "</a></b> :: <strong style='color:#008000'>"+ json.post[i].user_point + "</strong> điểm </div>";							
						   if (json.post[i].user_point>0)
						   {
							   htmlnewpost+="<div id='contenpost'>"+ json.post[i].post_content + "</div>";				   
							   if(json.post[i].post_image.trim ()!="")
									htmlnewpost+="<div id='imgPost'>"+json.post[i].post_image+"</div>";						
								if(json.post[i].post_url.trim()!=="")
								{						
									htmlnewpost+="<div id='action'>";
									htmlnewpost+="<div id='titlePost'>";
									if (json.post[i].post_url!=='viewedinday')
										htmlnewpost+="<a href=" + json.post[i].post_url + "  onclick=\"return openUrl(this.href," + json.post[i].post_mintimeview + "," + json.post[i].idPost + ");\" >"+json.post[i].post_title + "</a>"	;								
									else
										htmlnewpost+=json.post[i].post_title ;								
									htmlnewpost+="</div>";
									if(json.post[i].post_full_url.trim()==="")
										url=(json.post[i].post_url);
									else 
										url=(json.post[i].post_full_url);							
									htmlnewpost+="<div style='height:40px;'>";
									htmlnewpost+='<div style="float: left; padding-right: 10px; margin: 4px; height: 40px; width: 97%;">';							
									if (url!=="")
									{				
										htmlnewpost+= '<div style="display: inline-block; margin: 5px;">';			
										htmlnewpost+='<div class="buttonactionview"><b><span><i onclick="TINY.box.show({url:'+ "'statist_click.php?link="+encodeURIComponent(url)+"',width:500,height:500},'"+ titleStastic + "','" + classtitlePopup + "'); refreshIntervalId = setInterval(startTime(' statist_click.php','" +encodeURIComponent(url)+' \'), 5000); return false;"'  +  ' href="#" title="Thống kê ai đang view cho bạn"  ><img src="images/css/view-icon.gif" width="25px"/></i></span></b>' 	;																												
										htmlnewpost+='<div class="numview" id="numview'+ json.post[i].idPost + '">' + json.post[i].post_num_view + '</div></div>';
										htmlnewpost+='<div class="urlpost" id="urlpostid+'+ json.post[i].idPost +'">'+ url +'</div>';
										htmlnewpost+='<div style="background:-moz-linear-gradient(center top , #fff 0%, #f6f7f8 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);border: 1px solid #eee;border-radius: 5px;float: left;height: 27px;line-height: 27px;margin-left: 5px;width: 100px;display:none;"><a href="javascript:confirmgplus(\'' + json.post[i].post_url +  '\','+json.post[i].idPost+')" >G+: +10 điểm </a></div><div style="z-index: 0; position: relative; float: left; border: 1px solid rgb(238, 238, 238); width: 80px; margin-top: 0px; background: -moz-linear-gradient(center top , #fff 0%, #f6f7f8 100%) repeat scroll 0 0 rgba(0, 0, 0, 0); text-align: center; padding-top: 3px; padding-left: 5px; line-height: 27px; height: 24px; border-radius: 5px; margin-left: 5px;"> <iframe id="iframegplus'+ json.post[i].idPost + '" src="https://plusone.google.com/_/+1/fastbutton?bsv&amp;size=medium&amp;hl=en-US&amp;url=' + json.post[i].post_url + '&amp;parent=' + json.post[i].post_url + '" allowtransparency="true" frameborder="0" scrolling="no" title="+1" style="border: medium none; overflow: hidden; height: 30px; width: 100px;" ></iframe><div style="position:absolute;  left:0;top:0; width:95px;height:28px;z-index:1" class="gplusbutton"><a href="javascript:confirmgplus(\'' + json.post[i].post_url +  '\','+json.post[i].idPost+')" >G+: +10 điểm </a></div></div>';
										linkplus = getUrLSharePlus(url);
										if (getUrLSharePlus(url)!=="")
											htmlnewpost+='<div style="float: left;margin-left: 5px;"> <a href="javascript:fsGShare(\'' + linkplus +  '\',\''+token()+'\')" ><img src="images/button/icon-gshare.jpg" /></a></div>';
										htmlnewpost+= '</div>';
										htmlnewpost+= '<div style="display: inline-block; margin: 5px;">';
										htmlnewpost+='<div class="likebottondiv"><a href="javascript:confirmlink(\'' + json.post[i].post_url +  '\')"><div class="likebutton"><span>Like Page</span></div></a></div>';
										htmlnewpost+='<div class="sharebottondiv"><div class="sharebutton"><a href="javascript:fsshare(\'' + json.post[i].post_url +  '\','+json.post[i].idPost+',\'' + token()+'\')" ><span>Share Page</span></a></div></div>';
										htmlnewpost+= '</div>';
										htmlnewpost+='</div>';
										htmlnewpost+='<div id="fbjlike-example'+ json.post[i].idPost +'" class="fbjlike-example">';
										htmlnewpost+='<!-- <a href="javascript:confirmlink(\'' + json.post[i].post_url +  '\')" >Like: +15điểm</a> <iframe frameborder="0" style="border:none; " allowtransparency="true" src="http://www.facebook.com/plugins/like.php?href='+json.post[i].post_url+'"></iframe>-->';
										htmlnewpost+='</div>';
										htmlnewpost+='<div style=" clear: both;"></div>';
										htmlnewpost+='</div></div>';					
									}
								};		
							} 
							else
							{
							htmlnewpost+="<div id='contenpost'><strong>Điểm = 0 => bàiviết không hiển thị</strong></div>";
							};
							htmlInputForm='</div><div class="comment"><div class="cmt-function"></div><div id="info" ><div id="idArt" class="idArt" >'+ json.post[i].idPost +'</div><div id="name" class="name">'+ userFace +'</div><div id="imgLogo" class="imgLogo">'+ linkLogoFace + '</div></div><div><div id="" class="uiUfi UFIContainer">';
							htmlInputForm+='<ul class="UFIList-Cmt" id="UFIList-Cmt"><li  class="UFIRow UFIAddComment UFILastComponent" id="UFIList-Cmt-Input"><div class="clearfix UFIMentionsInputWrap"><div class="lfloat"><div class="img _8o _8r UFIImageBlockImage UFIReplyActorPhotoWrapper">';						
							if(linkLogoFace.trim()!=="https://graph.facebook.com//picture")
								htmlInputForm+='<img class="img UFIActorImage _rx" src="'+ linkLogoFace +'" />';						
							htmlInputForm+='</div></div>';
							htmlInputForm+='<div ><div class="UFIImageBlockContent _42ef _8u"><div ><div class="uiMentionsInput textBoxContainer ReactLegacyMentionsInput"><div  class="highlighter"><div ><span  class="highlighterContent hidden_elem"></span></div></div><div class="uiTypeahead mentionsTypeahead"><div class="wrap-input"><input type="hidden" class="hiddenInput"><div  class="innerWrap"><div id="cmt-content"><form id="form-cmt" action="" method="get" ><textarea id="scriptBox'+ json.post[i].idPost +'"  class="textInput mentionsTextarea uiTextareaAutogrow uiTextareaNoResize UFIAddCommentInput DOMControl_placeholder" placeholder="Write a comment..." content="Write a comment..." title="Write a comment..." name="add_comment_text"></textarea></form></div><div id="addPhoto"><form action="saveimage.php" method="post" enctype="multipart/form-data" id="attachedimage"><input type="button" id="uploader' + json.post[i].idPost + '" class="uploader"></form>									</div><div id="imgSrc'+ json.post[i].idPost +'"></div> </div></div></div><input type="hidden" class="mentionsHidden" value=""></div></div></div></div></div></li>';						
							htmlInputForm+='<div class="comment-div comment-adv' + json.post[i].idPost + '" id="comment-adv' + json.post[i].idPost + '">';
							htmlInputForm+='<div class="boxtagfull" id="fslisttags' + json.post[i].idPost +'"><div id="contentbox' + json.post[i].idPost + '" class="contentbox tagnameboxinput" contenteditable="true" data-ph="Tag thành viên"></div><div class="boxtag" id="display' + json.post[i].idPost + '"></div><div id="msgbox"></div></div>';	
							htmlInputForm+=showFullCommentOfPost(json.post[i].idPost,json.comment[i]);
							htmlInputForm+='</div>';
							htmlInputForm+='</ul></div></div><div class="text-comment"><div id="cmt_content"><div id="comment-content-1"></div><div id="lastCommentPost' + json.post[i].idPost + '" >0</div><div id="num-like">Num Like</div><div id="' + json.post[i].idPost + '"></div><div id="notifyPost' + json.post[i].idPost + '_content"></div>';
							htmlInputForm+='<div id="loadcmtfull' + json.post[i].idPost + '" >no</div>';						
							htmlInputForm+='</div></div></div>';					
							htmlnewpost+=htmlInputForm;
							htmlnewpost+='</div><div style=" clear: both;"></div><ul class="uiStream" id="boulder_fixed_header"><li class="mts uiStreamHeader"><span class="plm uiStreamHeaderText fss fwb"></span></li></ul></div>';		
					};	
				};		
		return 	htmlnewpost;
};
function showMessageById(json)
{	
		var htmlnewpost="";
		var linkplus="";
		for(var i=0;i<json.post.length;i++){	
						if ( !(json.post[i].user_point <= 0 && json.post[i].user_id !== idUser) )
						{							
						   htmlnewpost+='<div id="postcontent'+json.post[i].idPost+'" style="width:97.9%" class="Message" >';
						   
						   htmlnewpost+='<div style="float:right; width:100%; margin:0px">';
						   htmlnewpost+='<div style=" background:#fff;padding:5px;"><div style="float:left; width:50px ; margin:0px; position:relative;">';
						   htmlnewpost+="<a onclick='return openLinkMenu(\"" + root_path +"profile.php?iduser="+ json.post[i].user_id + "\")' href='"+ root_path +"profile.php?iduser="+ json.post[i].user_id +"'><img src='https://graph.facebook.com/"+ json.post[i].user_id + "/picture' /></a>";
						   htmlnewpost+='<!-- <div style="position:absolute; top: -3px;left:-4px"><img src="images/css/new.png"></div>-->';
						   htmlnewpost+='<div style="position:absolute; bottom: 0px;right:0px" class="IDUFS" id="IDUFS' + json.post[i].user_id + '"></div>';
						   htmlnewpost+='</div>';
							if (json.post[i].user_id === idUser || xxyyzz===3)						
							{
								if (json.post[i].user_id === idUser)
								{
									var aa =$("#mypostid").html();
									if (aa!=="")
										$("#mypostid").html( aa + ' or post_id=' + json.post[i].idPost );
									else
										$("#mypostid").html( ' post_id=' + json.post[i].idPost );
								};
								htmlnewpost+="<div style='width:97.7%; margin:0px;height:60px;'><b><a target='_blank' href='" + json.post[i].user_link+"'>"+ json.post[i].user_name + "</a></b> :: <strong style='color:#008000'>"+ json.post[i].user_point + "</strong> điểm <a href='' onclick='delPost("+ json.post[i].user_id + "," + json.post[i].idPost + ");return false;'> :: Xóa</a>";
								if(xxyyzz===3)
									htmlnewpost+=" :: <a href='#' onclick='removeUser("+ json.post[i].user_id + "," + json.post[i].idPost + ");'>RMUser</a>";
								htmlnewpost+="</div>";
							}									
							else
								htmlnewpost+="<div style='width:97.7%; margin:0px'><b><a target='_blank' href='" + json.post[i].user_link+"'>"+ json.post[i].user_name + "</a></b> :: <strong style='color:#008000'>"+ json.post[i].user_point + "</strong> điểm </div>";							
						   if (json.post[i].user_point>0)
						   {
							   htmlnewpost+="<div id='contenpost'>"+ json.post[i].post_content + "</div>";				   
							   if(json.post[i].post_image.trim ()!=="")
									htmlnewpost+="<div id='imgPost'>"+json.post[i].post_image+"</div>";						
								if(json.post[i].post_url.trim()!=="")
								{						
									htmlnewpost+="<div id='action'>";
									htmlnewpost+="<div id='titlePost'>";
									htmlnewpost+="<a href=" + json.post[i].post_url + "  onclick=\"return openUrl(this.href," + json.post[i].post_mintimeview + "," + json.post[i].idPost + ");\" >"+json.post[i].post_title + "</a>"	;								
									htmlnewpost+="</div>";
									if(json.post[i].post_full_url.trim()==="")
										url=(json.post[i].post_url);
									else 
										url=(json.post[i].post_full_url);							
									htmlnewpost+="<div style='height:40px;'>";
									htmlnewpost+='<div style="float: left; padding-right: 10px; margin: 4px; height: 40px; width: 97%;">';							
									if (url!=="")
									{				
										htmlnewpost+= '<div style="display: inline-block; margin: 5px;">';			
										htmlnewpost+='<div class="buttonactionview"><b><span><i onclick="TINY.box.show({url:'+ "'statist_click.php?link="+encodeURIComponent(url)+"',width:500,height:500},'"+ titleStastic + "','" + classtitlePopup + "'); refreshIntervalId = setInterval(startTime(' statist_click.php','" +encodeURIComponent(url)+' \'), 5000); return false;"'  +  ' href="#" title="Thống kê ai đang view cho bạn"  ><img src="images/css/view-icon.gif" width="25px"/></i></span></b>' 	;																												
										htmlnewpost+='<div class="numview" id="numview'+ json.post[i].idPost + '">' + json.post[i].post_num_view + '</div></div>';
										htmlnewpost+='<div class="urlpost" id="urlpostid+'+ json.post[i].idPost +'">'+ url +'</div>';
										htmlnewpost+='<div style="background:-moz-linear-gradient(center top , #fff 0%, #f6f7f8 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);border: 1px solid #eee;border-radius: 5px;float: left;height: 27px;line-height: 27px;margin-left: 5px;width: 100px;display:none;"><a href="javascript:confirmgplus(\'' + json.post[i].post_url +  '\','+json.post[i].idPost+')" >G+: +10 điểm </a></div><div style="z-index: 0; position: relative; float: left; border: 1px solid rgb(238, 238, 238); width: 80px; margin-top: 0px; background: -moz-linear-gradient(center top , #fff 0%, #f6f7f8 100%) repeat scroll 0 0 rgba(0, 0, 0, 0); text-align: center; padding-top: 3px; padding-left: 5px; line-height: 27px; height: 24px; border-radius: 5px; margin-left: 5px;"> <iframe id="iframegplus'+ json.post[i].idPost + '" src="https://plusone.google.com/_/+1/fastbutton?bsv&amp;size=medium&amp;hl=en-US&amp;url=' + json.post[i].post_url + '&amp;parent=' + json.post[i].post_url + '" allowtransparency="true" frameborder="0" scrolling="no" title="+1" style="border: medium none; overflow: hidden; height: 30px; width: 100px;" ></iframe><div style="position:absolute;  left:0;top:0; width:95px;height:28px;z-index:1" class="gplusbutton"><a href="javascript:confirmgplus(\'' + json.post[i].post_url +  '\','+json.post[i].idPost+')" >G+: +10 điểm </a></div></div>';
										linkplus = getUrLSharePlus(url);
										if (getUrLSharePlus(url)!=="")
											htmlnewpost+='<div style="float: left;margin-left: 5px;"> <a href="javascript:fsGShare(\'' + linkplus +  '\',\''+token()+'\')" ><img src="images/button/icon-gshare.jpg" /></a></div>';
										htmlnewpost+= '</div>';
										htmlnewpost+= '<div style="display: inline-block; margin: 5px;">';
										htmlnewpost+='<div class="likebottondiv"><a href="javascript:confirmlink(\'' + json.post[i].post_url +  '\')"><div class="likebutton"><span>Like Page</span></div></a></div>';
										htmlnewpost+='<div class="sharebottondiv"><div class="sharebutton"><a href="javascript:fsshare(\'' + json.post[i].post_url +  '\','+json.post[i].idPost+',\'' + token()+'\')" ><span>Share Page</span></a></div></div>';
										htmlnewpost+= '</div>';
										htmlnewpost+='</div>';
										htmlnewpost+='<div id="fbjlike-example'+ json.post[i].idPost +'" class="fbjlike-example">';
										htmlnewpost+='<!-- <a href="javascript:confirmlink(\'' + json.post[i].post_url +  '\')" >Like: +15điểm</a> <iframe frameborder="0" style="border:none; " allowtransparency="true" src="http://www.facebook.com/plugins/like.php?href='+json.post[i].post_url+'"></iframe>-->';
										htmlnewpost+='</div>';
										htmlnewpost+='<div style=" clear: both;"></div>';
										htmlnewpost+='</div></div>';					
									}
								};		
							} 
							else
							{
							htmlnewpost+="<div id='contenpost'><strong>Điểm = 0 => bàiviết không hiển thị</strong></div>";
							};
		
							htmlnewpost+='</div><div style=" clear: both;"></div><ul class="uiStream" id="boulder_fixed_header"><li class="mts uiStreamHeader"><span class="plm uiStreamHeaderText fss fwb"></span></li></ul></div>';		
					};	
				};		
		return 	htmlnewpost;
};


function showFullCommentOfPost(idPost,comment)
{			
			var htmlnewpost='';
			var numCmtDisplay=1000;
			if(comment.length>0){
			   for(var j=0;j<comment.length;j++){
					htmlnewpost+='<li class="UFIRow UFIComment UFILastComment UFILastCommentComponent commentid'+comment[j].cmt_Id+'" >';
					htmlnewpost+='<div  class="clearfix">';
					htmlnewpost+='<div class="lfloat"><a  class="img _8o _8s UFIImageBlockImage" aria-hidden="true" tabindex="-1" href="'+comment[j].cmt_imgLogo+'"><img class="img UFIActorImage _rx" src="'+comment[j].cmt_imgLogo+'" /></a></div>';
					htmlnewpost+='<div style="position:relative;"><div class="clearfix UFIImageBlockContent _42ef">';
					htmlnewpost+='<div class="rfloat"><a class="uiCloseButton UFICommentCloseButton" data-tooltip-alignh="center" data-hover="tooltip" aria-label="Hide as Spam" role="button" href="#" aria-owns="js_2" aria-controls="js_2" aria-haspopup="true"></a></div>';
					htmlnewpost+='<div ><div >';
					htmlnewpost+='<div class="UFICommentContent">	<a  class="UFICommentActorName"  content="Linh Nguyen" href="'+comment[j].cmt_user_link+'" title="'+comment[j].cmt_name+"::"	+comment[j].cmt_user_point+ '" target="_blank">'+comment[j].cmt_name+'</a><span > </span><span ><span class="UFICommentBody"><span >'+comment[j].cmt_Content+' </span></span></span></div>';
					htmlnewpost+='<div class="UFICommentActions fsm fwn fcg"><span ><span ></span>';
					htmlnewpost+='<a class="uiLinkSubtle" href=""><abbr  class="livetimestamp" content="a few seconds ago" title="'+comment[j].Time+'">'+comment[j].countTime+'</abbr></a>';
					if ( comment[j].cmt_url!=="" && !checkUrlImage(comment[j].cmt_url))
					{
						htmlnewpost+=' · <b><span ><i onclick="TINY.box.show({url:'+ "'statist_click.php?link="+encodeURIComponent(comment[j].cmt_url)+"',width:500,height:500},'"+ titleStastic + "','" + classtitlePopup + "'); refreshIntervalId = setInterval(startTime(' statist_click.php','" +encodeURIComponent(comment[j].cmt_url)+' \'), 5000); return false;"'  +  ' href="#" title="Thống kê ai đang view cho bạn"  ><img src="images/css/view-icon.gif" width="20px"/></i></span></b>';
					};
					htmlnewpost+='</span><span > · </span>';
					htmlnewpost+='<div class="statuslike" id="statuslike'+comment[j].cmt_Id+'"><a  class="UFILikeLink" id="likeCmt'+comment[j].cmt_Id+'" title="Like this comment" >';
					if(comment[j].cmt_num_like!==0 && comment[j].cmt_my_like>0)
					{
						htmlnewpost+='Unlike<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike' + comment[j].cmt_Id+'">' + comment[j].cmt_num_like + '</span>';					
					}
					else if ((comment[j].cmt_num_like!==0) && (comment[j].cmt_my_like===0 || comment[j].cmt_num_like===0))
					{
						htmlnewpost+='Like<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike' + comment[j].cmt_Id + '">' + comment[j].cmt_num_like + '</span>';
					}
					else
					htmlnewpost+='Like';
					htmlnewpost+='</a></div></div></div></div></div>';
					if (comment[j].cmt_userId === window.idUser || xxyyzz===3)
						htmlnewpost+='<div class="cmtclose" onclick="return delComment('+ comment[j].cmt_Id +')" >x</div>';
					htmlnewpost+='</div></div></li>';					
			   }
			 };		
			return htmlnewpost;			
};


function showCommentOfPost(idPost,comment)
{			
			var htmlnewpost='';
			var numCmtDisplay=1000;
			var num=0;
			if ( ($("#loadcmtfull"+idPost).length ===0) || ($("#loadcmtfull"+idPost).length > 0 && $("#loadcmtfull"+idPost).html().trim()==="no"))
				numCmtDisplay=10;
			num = (comment.length <	numCmtDisplay? comment.length:numCmtDisplay);
			if(comment.length>0){
			   for(var j=0;j<num;j++){
					htmlnewpost+='<li class="UFIRow UFIComment UFILastComment UFILastCommentComponent commentid'+comment[j].cmt_Id+'" >';
					htmlnewpost+='<div  class="clearfix">';
					htmlnewpost+='<div class="lfloat"><a  class="img _8o _8s UFIImageBlockImage" aria-hidden="true" tabindex="-1" href="'+comment[j].cmt_imgLogo+'"><img class="img UFIActorImage _rx" src="'+comment[j].cmt_imgLogo+'" /></a></div>';
					htmlnewpost+='<div style="position:relative;"><div class="clearfix UFIImageBlockContent _42ef">';
					htmlnewpost+='<div class="rfloat"><a class="uiCloseButton UFICommentCloseButton" data-tooltip-alignh="center" data-hover="tooltip" aria-label="Hide as Spam" role="button" href="#" aria-owns="js_2" aria-controls="js_2" aria-haspopup="true"></a></div>';
					htmlnewpost+='<div ><div >';
					htmlnewpost+='<div class="UFICommentContent">	<a  class="UFICommentActorName"  content="Linh Nguyen" href="'+comment[j].cmt_user_link+'" title="'+comment[j].cmt_name+"::"	+comment[j].cmt_user_point+ '" target="_blank">'+comment[j].cmt_name+'</a><span > </span><span ><span class="UFICommentBody"><span >'+comment[j].cmt_Content+' </span></span></span></div>';
					htmlnewpost+='<div class="UFICommentActions fsm fwn fcg"><span ><span ></span>';
					htmlnewpost+='<a class="uiLinkSubtle" href=""><abbr  class="livetimestamp" content="a few seconds ago" title="'+comment[j].Time+'">'+comment[j].countTime+'</abbr></a>';
					if ( comment[j].cmt_url!=="" && !checkUrlImage(comment[j].cmt_url))
					{
						htmlnewpost+=' · <b><span ><i onclick="TINY.box.show({url:'+ "'statist_click.php?link="+encodeURIComponent(comment[j].cmt_url)+"',width:500,height:500},'"+ titleStastic + "','" + classtitlePopup + "'); refreshIntervalId = setInterval(startTime(' statist_click.php','" +encodeURIComponent(comment[j].cmt_url)+' \'), 5000); return false;"'  +  ' href="#" title="Thống kê ai đang view cho bạn"  ><img src="images/css/view-icon.gif" width="20px"/></i></span></b>';
					}
					htmlnewpost+='</span><span > · </span>';
					htmlnewpost+='<div class="statuslike" id="statuslike'+comment[j].cmt_Id+'"><a  class="UFILikeLink" id="likeCmt'+comment[j].cmt_Id+'" title="Like this comment" >';
					if(comment[j].cmt_num_like!==0 && comment[j].cmt_my_like>0)
					{
						htmlnewpost+='Unlike<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike' + comment[j].cmt_Id+'">' + comment[j].cmt_num_like + '</span>';					
					}
					else if ((comment[j].cmt_num_like!==0) && (comment[j].cmt_my_like===0 || comment[j].cmt_num_like===0))
					{
						htmlnewpost+='Like<span> · </span><i class="UFICommentLikeIcon"></i> <span id="numlike' + comment[j].cmt_Id + '">' + comment[j].cmt_num_like + '</span>';
					}
					else
					htmlnewpost+='Like';
					htmlnewpost+='</a></div></div></div></div></div>';
					if (comment[j].cmt_userId === window.idUser || xxyyzz===3)
						htmlnewpost+='<div class="cmtclose" onclick="return delComment('+ comment[j].cmt_Id +')" >x</div>';
					htmlnewpost+='</div></div></li>';					
			   };
			   
			   if ( comment.length > numCmtDisplay && $("#loadcmtfull"+idPost).html().trim()==="no")
				{
					htmlnewpost+='<li class="UFIRow UFIPagerRow UFIFirstCommentComponent" ><div class="clearfix"><div class="lfloat"><a class="img _8o _8r UFIImageBlockImage UFIPagerIcon" aria-hidden="true" tabindex="-1" role="button" href="#"></a></div><div ><div class="clearfix UFIImageBlockContent _42ef _8u"><div class="rfloat"><span class="fcg"></span></div><div ><a class="UFIPagerLink" role="button" href="javascript:showAllComment(\'' + root_path + 'json_comment_post.php\', ' + idPost + ' );"><span >Xem ' + (comment.length - numCmtDisplay) + ' khác </span></a></div></div></div></div>';					
				}
				
			 };			
			return htmlnewpost;			
};
function loadlinks(idUser){	
	var url=root_path + 'modules/json_list_link_friend.php';
	if (FaceSeo.search(domain)<0)
		return;
	$.ajax({
			url:url,
			type:'POST',
			data: {idUser:idUser},
			dataType: "json",
			success: function(links) {
				var htmlnewpost='';
				var htmlInputForm='';
				if (links.length>0)
				{
					htmlnewpost+="<pre><b>   Danh sách link của những người đã view cho bạn</b></pre>";
					for (var i=0;i<links.length;i++)
					{
						
						htmlnewpost+='<ul id="UFIList-Cmt" class="UFIList-Cmt">';
						htmlnewpost+="<li>";
						htmlnewpost+='<a href="'+links[i]+'" onclick="return openUrl(this.href,' + json.post[i].post_mintimeview + ',' + json.post[i].idPost + ');">' + links[i] + '</a>';
						htmlnewpost+=' · <b><span ><i onclick="TINY.box.show({url:'+ "'statist_click.php?link="+encodeURIComponent(links[i])+"',width:500,height:500},'"+ titleStastic + "','" + classtitlePopup + "'); refreshIntervalId = setInterval(startTime(' statist_click.php','" +encodeURIComponent(links[i])+' \'), 5000); return false;"'  +  ' href="#" title="Thống kê ai đang view cho bạn"  ><img src="images/css/view-icon.gif" width="20px"/></i></span></b>';
						htmlnewpost+="</li>";
						htmlnewpost+="</ul>";
						$("#linkneedview").html(htmlnewpost);
						$("#linkneedview").css('display','block');
						$("#closelink").css('display','block');
					}
				}
		}
	});  
};
function mylink(idUser){	
	var url=root_path + 'modules/json_my_link.php';
	if (FaceSeo.search(domain)<0)
		return;
	$.ajax({
			url:url,
			type:'POST',
			data: {idUser:idUser},
			dataType: "json",
			success: function(links) {
				var htmlnewpost='';
				var htmlInputForm='';
				if (links.length>0)
				{
					htmlnewpost+="<pre><b>   Danh sách link </b></pre>";
					for (var i=0;i<links.length;i++)
					{						
						htmlnewpost+='<ul id="UFIList-Cmt" class="UFIList-Cmt">';
						htmlnewpost+="<li>";
						htmlnewpost+='<a href="'+links[i]+'" onclick="return openUrl(this.href);">' + links[i] + '</a>';
						htmlnewpost+=' · <b><span ><i onclick="TINY.box.show({url:'+ "'statist_click.php?link="+encodeURIComponent(links[i])+"',width:500,height:500},'"+ titleStastic + "','" + classtitlePopup + "'); refreshIntervalId = setInterval(startTime(' statist_click.php','" +encodeURIComponent(links[i])+' \'), 5000); return false;"'  +  ' href="#" title="Thống kê ai đang view cho bạn"  ><img src="images/css/view-icon.gif" width="20px"/></i></span></b>';
						htmlnewpost+='<a onclick="dellink(' + idUser + ',\'' + links[i] + '\');">Xóa</a>';
						htmlnewpost+="</li>";
						htmlnewpost+="</ul>";
						$("#linkneedview").html(htmlnewpost);
						$("#linkneedview").css('display','block');
						$("#closelink").css('display','block');
					}
				}
		}
	});  
};

function updateNotify(url,idUser){
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser="+idUser;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
	if(xmlhttp.readyState === 4 && xmlhttp.status === 200){		
	}
  };
  xmlhttp.send(params);
};

function updateMessage(url,idUser){
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser="+idUser;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
	if(xmlhttp.readyState === 4 && xmlhttp.status === 200){	
	}
  };
  xmlhttp.send(params);
};

function checkAvailableClick(url,link,idUser){
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp_checklink;
	if(window.XMLHttpRequest){
	  xmlhttp_checklink=new XMLHttpRequest();
	}else{
	  xmlhttp_checklink=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idUser="+idUser+"&link="+link;
	xmlhttp_checklink.open("POST", url, true);
	xmlhttp_checklink.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp_checklink.setRequestHeader("Content-length", params.length);
	xmlhttp_checklink.setRequestHeader("Connection", "close");
	xmlhttp_checklink.onreadystatechange = function() {
		if(xmlhttp_checklink.readyState === 4 && xmlhttp_checklink.status === 200){	
		}
	};
  xmlhttp_checklink.send(params);
};

function checkUrlImage(url)
{
	url=url.toLowerCase();
	var arr=url.split('.');	
	if (arr[(arr.length-1)] ==="gif" || arr[(arr.length-1)]==="jpeg" || arr[(arr.length-1)]==="jpg"|| arr[(arr.length-1)]==="png"|| arr[(arr.length-1)]==="bmp")
		return true;
	return false;

};

function openLinkMenu(link)
{
		if(window.iswiewing===true)
			window.open(link);
		else
			window.open(link,"_self");
		return false;
};

function getNumView(link,id){
	var url=root_path + "modules/json_numview.php";
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp_checklink;
	if(window.XMLHttpRequest){
	  xmlhttp_checklink=new XMLHttpRequest();
	}else{
	  xmlhttp_checklink=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "link="+encodeURIComponent(link);
	xmlhttp_checklink.open("POST", url, true);
	xmlhttp_checklink.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp_checklink.setRequestHeader("Content-length", params.length);
	xmlhttp_checklink.setRequestHeader("Connection", "close");
	xmlhttp_checklink.onreadystatechange = function() {
		if(xmlhttp_checklink.readyState === 4 && xmlhttp_checklink.status === 200){
			$('#numview'+id).html(xmlhttp_checklink.responseText);
		}
	};
  xmlhttp_checklink.send(params);
};

function loadNumView()
{
	$("div[id^='urlpostid']").each(function(){
		var id = parseInt(this.id.substring(9));
		var $this = $(this);
		var link = $this.text();
		getNumView(link,id);
	});
	//console.clear();
};

function getprofile(idUser)
{
	var url=root_path + "modules/json_get_link_profile.php";
	if (FaceSeo.search(domain)<0)
		return;
	$.ajax({
			url:url,
			type:'POST',
			data: {idUser:idUser},
			dataType: "json",
			success: function(links) {
				var htmlnewpost='';
				var htmlInputForm='';
				if (links.length>0)
				{
					htmlnewpost+="<pre><b>   Hãy click mạnh tay giúp nào. </b></pre>";
					var shortlink='';
					htmlnewpost+='<div class="listlinkwrapper"><div class="cen cl"><ol class="roundedlistlink">';
					for (var i=0;i<links.length;i++)
					{		
						shortlink = links[i];
						if (shortlink.length > 75)
							shortlink = links[i].substring(0,75)+'...';					
						htmlnewpost+="<li>";						
						htmlnewpost+='<a href="' + links[i] + '" onclick="return openUrl1(this.href);">' + shortlink + '</a>';
						htmlnewpost+='<div style="float:left"><i onclick="TINY.box.show({url:'+ "'statist_click.php?link="+encodeURIComponent(links[i])+"',width:500,height:500},'"+ titleStastic + "','" + classtitlePopup + "'); refreshIntervalId = setInterval(startTime(' statist_click.php','" +encodeURIComponent(links[i])+' \'), 5000); return false;"'  +  ' href="#" title="Ai đang view cho bạn?"  ><img src="images/css/view-icon.gif" width="18px"/></i></div>';						
						htmlnewpost+=' <div class="googleplus"><div class="button"> <iframe scrolling="no" frameborder="0" style="border: medium none; overflow: hidden; height: 30px; width: 100px;" title="+1" allowtransparency="true" src="https://plusone.google.com/_/+1/fastbutton?bsv&amp;size=medium&amp;hl=en-US&amp;url=' + links[i] + '&amp;parent=' + links[i] +'" id="iframegplus90781"></iframe><div class="gplusbutton" style="position:absolute; left:0;top:0; width:95px;height:22px;z-index:1"><i onclick="confirmgplus(\'' + links[i]+ '\',90781);" >+10 điểm </i></div></div></div>';						
						htmlnewpost+=' <div class="likefb"><div class="button"> <iframe scrolling="no" id="f5d7a6c12fc5aa" name="f1993637d3d9f4c" style="border: medium none; overflow: hidden; height: 20px; width: 99px;" class="fb_ltr" src="http://www.facebook.com/plugins/like.php?api_key=296894317070497&amp;locale=vi_VN&amp;sdk=joey&amp;channel_url=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D24%23cb%3Df15eb1210affe44%26origin%3Drelation%3Dparent.parent&amp;href=' + links[i] + '&amp;node_type=link&amp;width=120&amp;layout=button_count&amp;colorscheme=light&amp;show_faces=false&amp;send=false&amp;extended_social_context=false"></iframe><div class="gplusbutton" style="position:absolute; left:0;top:0; width:95px;height:22px;z-index:1"><i onclick="confirmgplus(\'http://www.muahoatuoi.com.vn/\',90781);" >+10 điểm </i></div></div></div>';						
						htmlnewpost+='<div style="clear:both"></div>';						
						htmlnewpost+='</li>';						
					};
					htmlnewpost+='</ol></div></div>';
					$(htmlnewpost).hide().appendTo("#wrappercontentpost").slideDown('slow');			
				}
		}
	}); 
};
function getListUserViewing()
{
	var url=root_path + "modules/json_list_user_viewing.php";
	if (FaceSeo.search(domain)<0)
		return;		
	var qIdUserPost = $('#mypostid').html();
	$.ajax({
			url:url,
			type:'POST',
			data: {qIdUserPost:qIdUserPost},
			dataType: "json",
			success: function(jsonviewing) {
				
				if(jsonviewing.length>0){	
						$("div[id^='IDUFS']").each(function(){							
							var idu = parseInt(this.id.substring(5));
							$(this).html('');
							for(var i=0;i<jsonviewing.length;i++){									
								if (jsonviewing[i]===idu)
									$(this).html('<img src="images/loading-google-smaill.gif">');									
							}	
						});
				}
			}					  
	}); 
};

function setCookie(cname, cvalue, exdays) {
	
	var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
	
};
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)===' ') c = c.substring(1);
        if (c.indexOf(name) !== -1) 
		{
			return c.substring(name.length,c.length);
		}
    }
    return "";
} ;

function delComment(idCmt)
{
	var url=root_path + "modules/del_comment.php";
	if (FaceSeo.search(domain)<0)
		return;		
	$.ajax({
			url:url,
			type:'POST',
			data: {idCmt:idCmt},
			dataType: "html",
			success: function(html) {
				$(".commentid"+idCmt).hide();
			}
	}); 
	return false;
};

function rand() {
    return Math.random().toString(36).substr(2); 
};
function token() {
    return rand() + rand();
};
function getUrLSharePlus(str)
{
	var res = str.split("····"); 
	for (var i=0;i<res.length;i++)
	{
		if (res[i].search('https://plus.google.com')>-1)
			return res[i];
	};
	return "";
	
};