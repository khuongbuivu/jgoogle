(function($){  
$.fn.fbjlike = function(options) {  	
	  var defaults = {  
		appID: '731864150162369',
		userID: '100001707050712',
		siteTitle: '',
		siteName: '',
		siteImage: '',
		href:false,
		mode: 'insert',
		buttonWidth: 450,
		buttonHeight: 60,
		showfaces: true,
		font: 'lucida grande',
		layout: 'normal',	
		action: 'like',		
		send:false,
		comments:false,
		numPosts:10,
		colorscheme: 'light',
		lang: 'en_US',
		hideafterlike:false,
		googleanalytics:false,							
		googleanalytics_obj: 'pageTracker',	
		onlike: function(){return true;},
		onunlike: function(){return true;}
	}  

	var options =  $.extend(defaults, options);  
	
	return this.each(function() {  
	var o = options;  
	var obj = $(this);
	if(!o.href)
		var dynUrl = document.location;
	else
		var dynUrl = o.href;
	var dynTitle = document.title; 
  if(o.appID!='')$('head').append('<meta property="fb:app_id" content="'+o.appID+'"/>');
  if(o.userID!='')$('head').append('<meta property="fb:admins" content="'+o.userID+'"/>');
  if(o.siteTitle!='')$('head').append('<meta property="og:title" content="'+o.siteTitle+'"/>');
  if(o.siteName!='')$('head').append('<meta property="og:site_name" content="'+o.siteName+'"/>');
  if(o.siteImage!='')$('head').append('<meta property="og:image" content="'+o.siteImage+'"/>');
  
  $('body').append('<div id="fb-root"></div>');
  $('#fb-like iframe').css('height','35px !important');
  
  (function() {
    var e = document.createElement('script');
    e.async = true;
    e.src = document.location.protocol + '//connect.facebook.net/'+o.lang+'/all.js';
    $('#fb-root').append(e);
  }());
	
  
  window.fbAsyncInit = function() {
    FB.init({appId: o.appID, status: true, cookie: true, xfbml: true});
    FB.Event.subscribe('edge.create', function(response) {
		  if(o.hideafterlike)$(obj).hide();
		  if(o.googleanalytics){
				if(o.googleanalytics_obj!='_gaq'){
					pageTracker._trackEvent('facebook', 'liked', dynTitle);
				} else {
		  		_gaq.push(['_trackEvent','facebook', 'liked', dynTitle]);
		  	}
		  }
		  o.onlike.call(response);
		});
    FB.Event.subscribe('edge.remove', function(response) {
		  if(o.googleanalytics){
				if(o.googleanalytics_obj!='_gaq'){
					pageTracker._trackEvent('facebook', 'unliked', dynTitle);
				} else {
		  		_gaq.push(['_trackEvent','facebook', 'unliked', dynTitle]);
		  	}
		  }
		  o.onunlike.call(response);
		});
  };
  var tSend = '';
  if(o.send)tSend = ' send="true"';
  // var thtml = '<fb:like href="'+dynUrl+'" width="'+o.buttonWidth+'" height="'+o.buttonHeight+'" show_faces="'+o.showfaces+'" font="'+o.font+'" layout="'+o.layout+'" action="'+o.action+'" colorscheme="'+o.colorscheme+'"'+tSend+'/>';
	
	
	//var thtml = '<fb:like class="fb_edge_widget_with_comment fb_iframe_widget" colorscheme="light" action="like" layout="normal" font="lucida grande" show_faces="true" height="60" width="450" href="http://giaiphapthuonghieu.vn/hinh-anh-hoat-dong/165-faceseo-to-chuc-dao-tao-seo-mien-phi-buoi-2-do-linh-nguyen-chia-se.html" fb-xfbml-state="rendered"></fb:like>';
	
	if(o.comments){
  	thtml += '<'+'div style="clear:both;"></div><fb:comments href="'+dynUrl+'" num_posts="'+o.numPosts+'" width="'+o.buttonWidth+'"></fb:comments>';
  }
  // if(o.mode=='append')$(obj).append(thtml);
  // else $(obj).html(thtml);
  });
}  
})(jQuery);