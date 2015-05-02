var fss='vài giây trước';
var fis='giây';
var fid='ngày';
var fih='giờ';
var fim='phút';
var fit='trước';
var fc=5;

function formattime(a){
 if(a<60){
   t=a+' '+fis+' '+fit;
 }else if(a>60&&a<3600){
   p=parseInt(a/60);
   s=a-p*60;
   t=p+' '+fim+' '+ s +' '+fis+' '+fit;
 }else if(a>3600&&a<86400){
   h=parseInt(a/3600);
   m=a-h*60; 
   t=h+' '+fih+' '+ m +' '+fim+' '+fit; 
 }else if(a>=86400){
	h=parseInt(a/86400); 
	t=h+' '+fid+' '+fit;
 }
 return t;
}
function checknewbox(){
if($('.lasttimestamp').data('on')=='0'){
$('.lasttimestamp').data('on','1');
$.ajax({
    url:'checknewbox.php',
    type:'POST',
    data: {timese:$('.lasttimestamp').data('ltime')},
	dataType: "json",
    success: function(data) {
	   $('.lasttimestamp').data('ltime',data.timenows);	
	   if(data.listuser!=''){
		   $('.userslist').html(data.listuser);
		   }
	   if(data.users.length>0){
		for(var i=0;i<data.users.length;i++){	
		   if(!$('div').hasClass('blockchat_usern_'+data.users[i].id)){
		    $(".chatfull" ).append(getboxchat('usern_'+data.users[i].id,data.users[i].username));
		   }
			   $('.blockchat_usern_'+data.users[i].id).addClass('waitingsee');
			  
		}  
		     for(j=data.msgs.length-1;j>=0;j--){
			   kt=1;  
			  if($('#cmt_content_usern_'+data.msgs[j].ib+' .msgcontent:last').data('utime')>0){
				 lst=$('#cmt_content_usern_'+data.msgs[j].ib+' .msgcontent:last').data('utime');
				 if(data.msgs[j].timestamp<=lst)kt=0;
			  }
			  if(kt==1){			  
				comtime=getcommenttime(data.msgs[j].timestamp,data.msgs[j].time_chat);
				if( data.msgs[j].id=='-1'){
				 
	              //combox=getCommentbox(data.ur.username,data.msgs[j].time_chat,data.msgs[j].msg,data.ur.thumbimg,data.msgs[j].timestamp);
				   a=data.ur.username;b=data.ur.thumbimg;
				  
				}else{
	             //combox=getCommentbox(data.users[data.msgs[j].id].username,data.msgs[j].time_chat,data.msgs[j].msg,data.users[data.msgs[j].id].thumbimg,data.msgs[j].timestamp);
				  a=data.users[data.msgs[j].id].username;b=data.users[data.msgs[j].id].thumbimg;
				}
				if(j!=data.msgs.length-1&&data.msgs[j].timestamp>data.msgs[j+1].timestamp+5){
				    combox=getCommentbox(a,data.msgs[j].time_chat,data.msgs[j].msg,b,data.msgs[j].timestamp,data.msgs[j].giochat);
					$('#cmt_content_usern_'+data.msgs[j].ib).append(comtime+combox);
				}else{
					combox=getCommentbox(a,data.msgs[j].time_chat,data.msgs[j].msg,b,data.msgs[j].timestamp,data.msgs[j].giochat);
					$('#cmt_content_usern_'+data.msgs[j].ib).append(comtime+combox);
				}
				
                 
				 // var psconsole=$('.viewport_usern_'+data.msgs[j].ib);
	              //psconsole.scrollTop( psconsole[0].scrollHeight - psconsole.height());	
				  jQuery('.viewport_usern_'+data.msgs[j].ib).animate({ scrollTop: jQuery('.viewport_usern_'+data.msgs[j].ib).attr("scrollHeight") - jQuery('.viewport_usern_'+data.msgs[j].ib).height() }, 100);
                  
  //$('#playsound').html("<embed src='http://faceseo.biz/newmessage.mp3' hidden=true autostart=true loop=false>");

					
			 }
			 }
		
	   }
	   
	  if(data.group.users.length>0){
		   for(j=data.group.msgs.length-1;j>=0;j--){
			   kt=1;  
			  if($('#cmt_content_usern_group .msgcontent:last').data('utime')>0){
				 lst=$('#cmt_content_usern_group .msgcontent:last').data('utime');
				 if(data.group.msgs[j].timestamp<=lst)kt=0;
			  }
			  if(kt==1){			  
				comtime=getcommenttime(data.group.msgs[j].timestamp,data.group.msgs[j].time_chat);
				if( data.group.msgs[j].id=='-1'){
				 
	              
				   a=data.ur.username;b=data.ur.thumbimg;
				  
				}else{
	            
				  a=data.group.users[data.group.msgs[j].id].username;
				  b=data.group.users[data.group.msgs[j].id].thumbimg;
				}
				if(j!=data.group.msgs.length-1&&data.group.msgs[j].timestamp>data.group.msgs[j+1].timestamp+5){
				    combox=getCommentbox(a,data.group.msgs[j].time_chat,data.group.msgs[j].msg,b,data.group.msgs[j].timestamp,data.group.msgs[j].giochat);
					$('#cmt_content_usern_group').append(comtime+combox);
				}else{
					combox=getCommentbox(a,data.group.msgs[j].time_chat,data.group.msgs[j].msg,b,data.group.msgs[j].timestamp,data.group.msgs[j].giochat);
					$('#cmt_content_usern_group').append(comtime+combox);
				}
				
                 
				 // var psconsole=$('.viewport_usern_'+data.msgs[j].ib);
	              //psconsole.scrollTop( psconsole[0].scrollHeight - psconsole.height());	
				  //jQuery('.viewport_usern_group').animate({ scrollTop: jQuery('.viewport_usern_group').attr("scrollHeight") - jQuery('.viewport_usern_group').height() }, 100);
				  jQuery('.viewport_usern_group').scrollTop(jQuery('.viewport_usern_group').attr("scrollHeight") - jQuery('.viewport_usern_group').height());
                  
  $('#playsound').html("<embed src='http://faceseo.biz/newmessage.mp3' hidden=true autostart=true loop=false>");

					
			 }
			 }
			
		   
		  
		  }
	   
	   
	  $('.lasttimestamp').data('on','0');
	}
});

}


}
function checkthoigian(){
$.ajax({
    url:'chung.php',
    type:'POST',
    data: {},
	dataType: "json",
    success: function(data) {
		$('.lasttimestamp').data('ltime',data.timenows);
		var h = document.getElementsByTagName('abbr');
		if(h.length>0){
		for(var i=0;i<h.length;i++){
		k=$(h[i]).data('utime');
		tru=data.timenows-k;
	    h[i].innerHTML=formattime(tru);
		}
		}
	}
});
}
function getCommentboxajax1(a,b,c,t,ti,giochat){

	var ida=$('.userac').data('ida');
	if(ida==t)c='<div class="chati1">'+giochat+'</div><div class="textright">'+c+'</div>';
html='<div class="commentbox commentright"><div class="commentthumb"><div class="commentline"></div><a aria-label="'+a+'" data-hover="tooltip" class="profileLink" href="#" role="button"><img src="https://graph.facebook.com/'+t+'/picture" class="thumbimg"></a></div><div class="messages mright"><div class="infomsg"><span class="hidden_div"><a href="#" rel="dialog" role="button"><span class="fcg">Báo sai phạm</span></a></span><span class="timestamp">'+b+'</span></div><div class="msgcontent" data-jsid="message" data-utime="'+ti+'"><span><div>'+c+'</div></span></div></div></div><div class="clearfix"></div>';
   return html;
}

function addCommentboxajax(id){	
$.ajax({
    url:'ajaxcomment.php',
    type:'POST',
    data: {id:id},
	dataType: "json",
    success: function(data) {
		  // for(j=data.msgs.length-1;j>=0;j--){
			 if(data.msgs.length>0){
			  for(j=0;j<data.msgs.length;j++){
			   kt=1;  
		//	  if($('#cmt_content_usern_'+data.msgs[j].ib+' .msgcontent:last').data('utime')>0){
			//	 lst=$('#cmt_content_usern_'+data.msgs[j].ib+' .msgcontent:last').data('utime');
			//	 if(data.msgs[j].timestamp>=lst)kt=0;
			 // }
			 
			  if(kt==1){			  
				comtime=getcommenttime(data.msgs[j].timestamp,data.msgs[j].time_chat);	
				  a=data.msgs[j].id;
				  b=data.msgs[j].id;
				if(j!=data.msgs.length-1&&data.msgs[j].timestamp>data.msgs[j+1].timestamp+5){
				    combox=getCommentboxajax(a,data.msgs[j].time_chat,data.msgs[j].msg,b,data.msgs[j].timestamp,data.msgs[j].giochat);
					$('#cmt_content_usern_'+data.msgs[j].ib).append(comtime+combox);
				}else{
					
			combox=getCommentboxajax(a,data.msgs[j].time_chat,data.msgs[j].msg,b,data.msgs[j].timestamp,data.msgs[j].giochat);
					$('#cmt_content_usern_'+data.msgs[j].ib).append(comtime+combox);
				}
				//  var psconsole=$('.viewport_usern_'+data.msgs[j].ib);
	           //   psconsole.scrollTop( psconsole[0].scrollHeight - psconsole.height());	
			    jQuery('.viewport_usern_'+data.msgs[j].ib).animate({ scrollTop: jQuery('.viewport_usern_'+data.msgs[j].ib).attr("scrollHeight") - jQuery('.viewport_usern_'+data.msgs[j].ib).height() }, 100);
                  
  //$('#playsound').html("<embed src='http://faceseo.biz/newmessage.mp3' hidden=true autostart=true loop=false>");
					
			 }
			 }
			 }
		
		
		}
});
}

function getCommentbox(a,b,c,t,ti,giochat){
var ida=$('.userac').data('ida');
	var m='thum-left';
	if(ida==t){
			
		c='<div class="chati1">'+giochat+'</div><div class="textright">'+c+'</div>';
		m='thumb-right';
		l='mright';
		ben='commentright';
	}else { c='<div class="chati2">'+giochat+'</div><div class="textleft">'+c+'</div>';l='mleft';ben='commentleft';}
html='<div class="commentbox '+ben+'"><div class="commentthumb '+m+'"><div class="commentline"></div><a aria-label="'+a+'" usern="usern_'+t+'" data-username-show="'+a+'" class="usern" data-hover="tooltip" class="profileLink" href="#" role="button"><img src="https://graph.facebook.com/'+t+'/picture" class="thumbimg"></a></div><div class="messages '+l+'"><div class="infomsg"><span class="hidden_div"><a href="#" rel="dialog" role="button"><span class="fcg">Báo sai phạm</span></a></span><span class="timestamp">'+b+'</span></div><div class="msgcontent" data-jsid="message" data-utime="'+ti+'"><span><div>'+c+'</div></span></div></div></div><div class="clearfix"></div>';
return html;
}
function getCommentboxajax(a,b,c,t,ti,giochat){
	
	
	var ida=$('.userac').data('ida');
	var m='thum-left';
	if(ida==t){
		c='<div class="chati1">'+giochat+'</div><div class="textright">'+c+'</div>';
		m='thumb-right';
		l='mright';
		ben='commentright';
	}else {c='<div class="chati2">'+giochat+'</div><div class="textleft">'+c+'</div>';l='mleft';ben='commentleft';}
html='<div class="commentbox '+ben+'"><div class="commentthumb '+m+'"><div class="commentline"></div><a aria-label="'+a+'" data-hover="tooltip" class="profileLink" href="#" role="button"><img src="https://graph.facebook.com/'+t+'/picture" class="thumbimg"></a></div><div class="messages '+l+'"><div class="infomsg"><span class="hidden_div"><a href="#" rel="dialog" role="button"><span class="fcg">Báo sai phạm</span></a></span><span class="timestamp">'+b+'</span></div><div class="msgcontent" data-jsid="message" data-utime="'+ti+'"><span><div>'+c+'</div></span></div></div></div><div class="clearfix"></div>';
return html;
}
function getcommenttime(a,b){
return '<div class="chattime"><div class="chattime2"><abbr data-utime="'+a+'" class="livetimestamp">'+b+'</abbr></div></div>';
}
function getCommentbox2(a,b,c,t,ti){
html='<div data-jsid="message" data-utime="'+ti+'" class="msgcontent"><span><div><div>'+c+'</div></div></span></div>';
return html;
}

function chataddCmtToDb(content,userid,kind){ 
  $.ajax({
    url:'process-comment.php',
    type:'POST',
    data: {cmt_content:content,userid:userid,kind:kind},
	dataType: "json",
    success: function(json) {
	  idu=$('.userac').data('ida');
	   pre=$('.blockchat_'+userid+' .chaten').data('itime');
	   kt=json.timestamp-pre;
	   $('.blockchat_'+userid+' .chaten').data('itime',json.timestamp);
	   s=1;
	   //if(kt>fc){
	   if(s==1){
	   var comtime='<div class="chattime"><div class="chattime2"><abbr data-utime="'+json.timestamp+'" class="livetimestamp">'+fss+'</abbr></div></div>';
	   var combox=getCommentbox(json.un,json.timechat,json.msg,idu,json.timestamp,json.giochat);
       $('#cmt_content_'+userid).append(comtime+combox);
	
	  
	   jQuery(".viewport_"+userid).animate({ scrollTop: jQuery(".viewport_"+userid).attr("scrollHeight") - jQuery(".viewport_"+userid).height() }, 1000);
	
	   }else{
	    var combox=getCommentbox2(json.un,json.timechat,json.msg,idu,json.timestamp,json.giochat);
		$('#cmt_content_'+userid+' div.messages:last').append(combox)
	   }
		}
});  

}




$(document).on('keypress','.chaten',function( event ) {	
if ( event.which == 13 ) {
var k=$(this).data('ui');	
var tb = $(this);
var chat="";
		var oldContent = $('#comment_content_'+k).html();		
		var div, targetElement =$('#cmt_content_'+k);
		var numdiv= $('#comment_content_num_'+k).html();		
		chat=chataddCmtToDb(tb.val(),k,'text');
		$(this).val('');
		
		var psconsole=$('.viewport_'+k);
	    psconsole.scrollTop( psconsole[0].scrollHeight - psconsole.height());		
}
});  
$(document).on('click','.closethis',function( event ) {
	var k=$(this).data('ui');
	$(".chatfull .blockchat_"+k).remove();
	}); 
$(document).on('click','.blockchat',function( event ) {
	 
	  if($(this).hasClass('waitingsee'))$(this).removeClass('waitingsee');
	});  
$(document).on('keypress','.searchbox',function( event ) {
	var sb=$('.searchinput').val();
	if ( event.which == 13) {
	   $.ajax({
    url:'user.php',
    type:'POST',
    data: {sb:sb},
	dataType: "json",
    success: function(data) {
		var cont="";
	   if(data.users.length>0){
		for(var i=0;i<data.users.length;i++){
			cont+='<p><img src="https://graph.facebook.com/'+data.users[i].id+'/picture"><a data-usern="usern_'+data.users[i].id+'" role="" rel="ignore" class="usern">'+data.users[i].user_username+'</a></p>';
			$('.userslist').html(cont);
			
			} 
	   }else{
		    $('.userslist').html('<p>Không có dữ liệu</p>');
	   }
		
		}
	});	
	}
})
$(document).on('click','.nameblock .anboxchat',function( event ) {
	 var par=$(this).parent();
	 var m=par.data('ui');
	if($('.'+m).hasClass('boxmini')){
		$('.'+m).removeClass('boxmini');
	}else{
	   $('.'+m).addClass("boxmini");
	}
	});		
$(document).on('click','.timeicon',function( event ) {
	  var parent1=$(this).parent();
	  var parent2=parent1.parent();
	  if(!parent2.hasClass('showtimechat')){
		  parent2.addClass('showtimechat');
		  parent2.removeClass('boxmini');
		  }else{
			  parent2.removeClass('showtimechat');
			  }
	});		
	
$(document).ready(function()
 {
   if ($('#checkLang').hasClass('RU')){
       $('.ru').show();   
   }

if ($('#checkLang').hasClass('LV')){
     $('.lv').show();   
};             
 });
/*
$(document).on('mouseover','.messages',function( event ) {
	  $('.messages .infomsg').css('visibility','inherit');
	});  
$(document).on('mouseleave','.messages',function( event ) {
	  $('.messages .infomsg').css('visibility','hidden');
	});  	
$(document).on('mouseover','.blockusers',function( event ) {
	  $('.blockusers').css('width','200px');
	   $('.chatfull').css('right','210px');
	});  
$(document).on('mouseleave','.blockusers',function( event ) {
	  $('.blockusers').css('width','50px');
	  $('.chatfull').css('right','60px');
	});  
*/

function getboxchat(id,blockname){
	html='<div class="blockchat blockchat_'+id+'"><div class="nameblock" data-ui="blockchat_'+id+'"><span title="Hiện thời gian chat" class="timeicon" data-ui="'+id+'"></span><span class="anboxchat"><a href="#">'+blockname+'</a></span><span class="closethis" data-ui="'+id+'">x</span></div><div class="fullchat"><div class="fullchat2"><div class="scrollbar1 content_'+id+'"><div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div><div style="height:215px;overflow: auto;" class="viewport viewport_'+id+'"><div class="overview"><div id="cmt_content_'+id+'"><div id="comment_content_'+id+'"></div><div id="comment_content_num_'+id+'" style="display:none">0</div></div></div></div><div class="borderchat">   <textarea data-ui="'+id+'" data-itime="0" class="chaten scriptBox"></textarea><div class="showicons" data-ui="'+id+'"></div><div class="iconchose iconchose_'+id+'"></div></div></div></div></div></div>';
return html;
}
$(document).on('click','.iconchose',function( event ) {
    var parentbox=$(this).parent();
	if(parentbox.hasClass('acticons')){
	parentbox.removeClass('acticons');
	}else{
		 parentbox.addClass('acticons');
		var showiconsdiv=parentbox.find('.showicons');
		var contenticons=$('.iconschat').html();
		showiconsdiv.html(contenticons);
	}
  });
$(document).on('click','.icon-class-click',function( event ) {
    var parentbox=$(this).parent();
	var borderchat=parentbox.parent();
	var imgurl=$(this).data('img');
	var iduser=parentbox.data('ui');
	chataddCmtToDb(imgurl,iduser,'img');
	  borderchat.removeClass('acticons');
  });

$(document).on('click','.usern',function( event ) {
  var id=$(this).data('usern');
  var blockname=$(this).data('username-show');
  var ida=$('.userac').data('ida');
  if(!$('div').hasClass('blockchat_'+id)){
  $(".chatfull" ).append(getboxchat(id,blockname));
  
  addCommentboxajax(id);
  }else{
   //alert("da ton tai");
  }
  });  

var int=self.setInterval(function(){checkthoigian()},10000);
var int=self.setInterval(function(){checknewbox()},1000);