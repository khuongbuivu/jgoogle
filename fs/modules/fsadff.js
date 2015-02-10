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
var arrLinks = [];
var arrTabActive = [];
var sLinkObject = {
            link : null,
            text : null,
            prev : null,
            origin : null,
            start : null
};
var urlCurrentTab = "";
var urlParents = [];
var indexUrlParent = [];
var arrkey = ["","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""];
var removedTab = false;
var closeAllTab = false;
function getCookie(cname) {
		var ios = Components.classes["@mozilla.org/network/io-service;1"]
            .getService(Components.interfaces.nsIIOService);
		var uri = ios.newURI("http://faceseo.vn/", null, null);
		var cookieSvc = Components.classes["@mozilla.org/cookieService;1"]
						  .getService(Components.interfaces.nsICookieService);
		var aa = cookieSvc.getCookieString(uri, null);		
		var name = cname + "=";
		var ca = aa.split(';');
		for(var i=0; i<ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1);
			if (c.indexOf(name) != -1)
			{
				return c.substring(name.length,c.length);
			}
		};
		return "";		
};

var catchAllLinks = {
    ORIGINAL_LINK: "http://faceseo.vn/",
    BASE_URL: "http://faceseo.vn/fs1.2.php",
    ID_USER: getCookie("UIDFACESEO"),
    COOKIE_NAME: "SID",
    DIFF_TIME: 301,
    isIE8: false,
    invocation: null,
    original: null,
    sessionId: null,
    init: function() {	
        catchAllLinks.isIE8 = window.XDomainRequest ? true : false;
        catchAllLinks.invocation = catchAllLinks.createCrossDomainRequest();
        if (gBrowser.addEventListener) {
            gBrowser.addEventListener("load", catchAllLinks.onPageLoad, true);
        };
		
        var container = gBrowser.tabContainer;
        container.addEventListener("TabOpen", catchAllLinks.onOpenedTab, true);	
		var timeCallAddon = 10000;
        var minute = 0;
		setInterval(function() {
				var tabs = gBrowser.tabs;				
                for (var i = 0; i < arrTabActive.length; i++) {						
                    var tab = tabs[arrTabActive[i]];					
                    var browser = gBrowser.getBrowserForTab(tab);
					var item = arrLinks[arrTabActive[i]];					
						var diff = Math.floor(Math.abs(item.start - new Date()) / 1000);
						if (diff > catchAllLinks.DIFF_TIME) {
							var parentUrl = item.prev;
							var iTabParent = catchAllLinks.getITabParent(parentUrl);
							if (parentUrl != null && parentUrl.indexOf(catchAllLinks.ORIGINAL_LINK)==-1) {
								var d = new Date();								
								var timeOpen = item.start.format("hh:mm:ss dd/MM/yyyy");
								var timeClose = d.format("hh:mm:ss dd/MM/yyyy");
								var timeView = diff;								
								var a1=item.text.toUpperCase();
								var a2=decodeURIComponent(arrkey[iTabParent]).toUpperCase();
								var a3=decodeURIComponent(item.link).toUpperCase();
								if( ( catchAllLinks.checkeyAvailable(a2,a1) || (a3.search(a2)>-1)) && (arrkey[iTabParent]!==""))
									catchAllLinks.updateServerSideWithParams(item.link, catchAllLinks.ID_USER,
										timeOpen, timeClose, timeView, item.text, parentUrl,1);
								else
									catchAllLinks.updateServerSideWithParams(item.link, catchAllLinks.ID_USER,
										timeOpen, timeClose, timeView, item.text, parentUrl,0);
								if (arrLinks.length>-1)
									arrLinks.splice(arrTabActive[i], 1);									
								catchAllLinks.reduceIndexArrTabActive(i);	
								arrTabActive.splice(i,1);
								removedTab = true;
								gBrowser.removeTab(tab);
								removedTab = false;
							}
						}					
                };		
			minute++;
        }, timeCallAddon); 
    },
	getITabParent: function(url) {
        for (var index = 0; index < urlParents.length; index++) {
			if (url == urlParents[index]) {
						return indexUrlParent[index];
			}
		};
		return -1;
    },
    getRandomInt: function(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    },
    printTab: function() {
	
        var tabs = gBrowser.tabs;
        for (var i = 0; i < tabs.length; i++) {
            var tab = tabs[i];
            var browser = gBrowser.getBrowserForTab(tab);           
        };
    },
    onOpenedTab: function(aEvent) {
		
        var currentTab = gBrowser.getBrowserForTab(aEvent.target);		
		if (currentTab.currentURI.spec === "about:newtab")
		{
			var linkObject = {
				link : null,
				text : null,
				prev : null,
				origin : "onOpenedTab",
				start : new Date()
			};
			var tabs = gBrowser.tabs;
			var tabIndex = gBrowser.tabContainer.selectedIndex;
			if (tabs.length>arrLinks.length)
			{
				
				arrLinks.splice(tabIndex,0,linkObject);
				
			}
			else
			{
				arrLinks.splice(tabIndex,1);
				arrLinks.splice(tabIndex,0,linkObject);
				
			};
			
		};
        var container = gBrowser.tabContainer;
        container.addEventListener("TabClose", catchAllLinks.onClosedTab, true);
    },
	
	reduceIndexArrTabActive: function(at) {	
		for (var i = at; i < arrTabActive.length; i++ )
		{
			arrTabActive[i]=arrTabActive[i]-1;
		};
	},
	increaseIndexArrTabActive: function() {	
		for (var i = 0; i < arrTabActive.length; i++ )
		{
			arrTabActive[i]=arrTabActive[i]+1;
		};
	},
	onCloseAllTabs: function (){
		var tabs = gBrowser.tabs;
		if(tabs.length>1)
		{
			for (var i = tabs.length - 1; i > 0; i--) {
				gBrowser.removeTab(tabs[i]);
			}
			gBrowser.addTab("http://faceseo.vn/");
			gBrowser.removeTab(tabs[0]);
		};
		closeAllTab = true;
	},
    onClosedTab: function(aEvent) {
		if (removedTab)
		{
			return;
		};
       	var browser = gBrowser.getBrowserForTab(aEvent.target);		
        var currentLink = browser.currentURI.spec;
        for (var index = 0; index < arrLinks.length; index++) {
            var item = arrLinks[index];
            if (item.link === currentLink ) {			
                var diff = Math.floor(Math.abs(item.start - new Date()) / 1000);
                if (diff > catchAllLinks.DIFF_TIME) {
                    var parentUrl = item.prev;
                    if (parentUrl != null && parentUrl.indexOf(catchAllLinks.ORIGINAL_LINK)==-1) {
                        
                        var d = new Date();						
                        var timeOpen = item.start.format("hh:mm:ss dd/MM/yyyy");
                        var timeClose = d.format("hh:mm:ss dd/MM/yyyy");
                        var timeView = diff;
                        catchAllLinks.updateServerSideWithParams(item.link, catchAllLinks.ID_USER,
                            timeOpen, timeClose, timeView, item.text, parentUrl,0);
                    }
                };             
                break;
            };
        };
		var doc = browser.contentDocument; 
		var targetBrowserIndex = gBrowser.getBrowserIndexForDocument(doc);
		if (targetBrowserIndex > -1)
		{				
			var ii = arrTabActive.indexOf(targetBrowserIndex);
			if (arrLinks.length>-1)
			arrLinks.splice(targetBrowserIndex, 1);
			if(ii>-1)
				catchAllLinks.reduceIndexArrTabActive(targetBrowserIndex);			
			else
				catchAllLinks.reduceIndexArrTabActive(0);
			if(ii>-1 && arrTabActive.length>-1)
				arrTabActive.splice(ii,1);				
			var iii = indexUrlParent.indexOf(targetBrowserIndex);			
			if (iii>-1)
			{
				urlParents.splice(iii,1);
				indexUrlParent.splice(iii,1);
				catchAllLinks.decreaseArrayIndex(iii);
			}
		};
		if(urlParents.length===0 || arrLinks.length===1)
		{
			catchAllLinks.resetArrayKey();
			if (arrLinks.length===1)
			{
				urlParents.splice(0,1);
				indexUrlParent.splice(0,1);
			}
		};
		
    },
    onPageLoad: function(aEvent) {		
        var doc = aEvent.originalTarget;
        if ((doc.nodeName === '#document')
            && (doc.defaultView.location.href === gBrowser.currentURI.spec) 
            && (gBrowser.currentURI.spec !== "about:blank")) {
            var link = doc.defaultView.location.href;	
			urlCurrentTab = link;
            if (arrLinks.length == 0) {
                if (link.indexOf(catchAllLinks.ORIGINAL_LINK) !== -1) {
                    var linkObject = {
                        link : link,
                        prev : null,
                        origin: link,
                        start : new Date()
                    };
					
                    arrLinks.push(linkObject);
                };
            };
			var linkcurrentnewtab = doc.location.href;
			var tabIndex= gBrowser.tabContainer.selectedIndex;			
			if (arrLinks.length<gBrowser.tabs.length || arrLinks[tabIndex].origin==="onOpenedTab")
			{
				sLinkObject = {
					link : null,
					text : null,
					prev : null,
					origin : linkcurrentnewtab,
					start : new Date()
				};
				
				if (arrLinks.length<gBrowser.tabs.length)
				{				
					arrLinks.push(sLinkObject);				
				}
				else
				{					
					arrLinks.splice(tabIndex,1);
					arrLinks.splice(tabIndex,0,sLinkObject);					
				};				
			};
            aEvent.originalTarget.defaultView.addEventListener("unload", function(event){
                catchAllLinks.onPageUnload(event);
            }, true);
        };
    },
    onPageUnload: function(aEvent) {
        var doc = aEvent.originalTarget;
        if ((doc.nodeName === '#document')
            && (doc.defaultView.location.href === gBrowser.currentURI.spec) 
            && (gBrowser.currentURI.spec !== "about:blank")) {
            for (var index = 0; index < arrLinks.length; index++) {
                var item = arrLinks[index];
                if (item.link == gBrowser.currentURI.spec) {
                    var diff = Math.abs(item.start - new Date());
                    if (diff > catchAllLinks.DIFF_TIME) {
                        var parentUrl = item.prev;
                        if (parentUrl != null && parentUrl.indexOf(catchAllLinks.ORIGINAL_LINK)==-1) {
                            
                            var d = new Date();
                            var timeOpen = item.start.format("hh:mm:ss dd/MM/yyyy");
                            var timeClose = d.format("hh:mm:ss dd/MM/yyyy");
                            var timeView = diff;							
							var a1=item.text.toUpperCase();
							var a2=decodeURIComponent(arrkey[iTabParent]).toUpperCase();
							var a3=decodeURIComponent(item.link).toUpperCase();
							if( ( catchAllLinks.checkeyAvailable(a2,a1) || (a3.search(a2)>-1)) && (arrkey[iTabParent]!==""))								
								catchAllLinks.updateServerSideWithParams(item.link, catchAllLinks.ID_USER, timeOpen, timeClose, timeView, item.text, parentUrl,1);
							else
								catchAllLinks.updateServerSideWithParams(item.link, catchAllLinks.ID_USER, timeOpen, timeClose, timeView, item.text, parentUrl,0);
                        }
                    };
                    arrLinks.splice(index, 1);
					var iii = indexUrlParent.indexOf(index);			
					if (iii>-1)
					{
						urlParents.splice(iii,1);
						indexUrlParent.splice(iii,1);
						catchAllLinks.decreaseArrayIndex(iii);
					};
                    break;
                }
            }
        }
    },
    handleWindowClick: function(event) {
		if (closeAllTab==false)
			catchAllLinks.onCloseAllTabs();		
        var origEl = event.target || event.srcElement;
		var tabIndex =-1;
		if(origEl.tagName=="tab")
		{
			tabIndex = gBrowser.tabContainer.selectedIndex;
			urlCurrentTab = gBrowser.currentURI.spec;
			/*
			for (var kk=0;kk<arrLinks.length;kk++)
				console.log("arrLinks["+ kk + "]: " + arrLinks[kk].origin + " " + arrLinks[kk].prev + " <br/>");
			for (xx=0;xx<urlParents.length;xx++)
				console.log("urlParents " + xx + " " + urlParents[xx]);			
			for (var xx=0;xx<indexUrlParent.length;xx++)
				console.log("indexUrlParent " + xx + " " + indexUrlParent[xx]);
			for (var xx=0;xx<20;xx++)
				console.log("arrkey " + xx + " " + arrkey[xx]);
			*/
			
		};		
		var iiii 	= origEl.toString().search("@@faceseo@@");
		if ((urlCurrentTab.indexOf(catchAllLinks.ORIGINAL_LINK)>-1) && (origEl.tagName === 'A' || origEl.tagName === 'a'))
		{				
					if (iiii==-1)
					{			
						tabIndex = gBrowser.tabContainer.selectedIndex;
						if(indexUrlParent.length < arrLinks.length &&  !catchAllLinks.checkUrlInListParent(origEl.toString()))
						{			
							urlParents.splice(0, 0, origEl.toString());
							catchAllLinks.increaseArrayIndex();
							indexUrlParent.splice(0, 0, tabIndex);
						}
						
					}
				
		};	
		if((origEl.tagName === 'A' || origEl.tagName === 'a') && (iiii>-1))
		{
			
			var rushUrl = origEl.toString().substring(iiii + 11);
			var iiiii= rushUrl.search("###");
			var uuu="";
			if(iiiii>-1)
					uuu = rushUrl.substring(0,iiiii);
			else
					uuu = rushUrl.substring(0);
			var key = catchAllLinks.getkey(rushUrl);
			catchAllLinks.focusTabUrl(uuu,key);
			return ;
		};		
		if (gBrowser.currentURI.spec.indexOf(catchAllLinks.ORIGINAL_LINK)>-1)
		{			
			return;
		};
		
        if(origEl.tagName === 'A' || origEl.tagName === 'a') {	
			if(gBrowser.currentURI.spec !== "about:blank")
			{		
				if (!catchAllLinks.checkUrlAvailable(origEl.toString()) || !(catchAllLinks.getNumChildOfUrl(catchAllLinks.getParentURL(gBrowser.currentURI.spec))<5) )
				{
					if(!(catchAllLinks.getNumChildOfUrl(catchAllLinks.getParentURL(gBrowser.currentURI.spec))<5))
						alert("Click tối đa 5 keywords");
					event.preventDefault();
					return;
				}
				else
				{
					
					event.stopPropagation();
				};
				catchAllLinks.processURLRequest(gBrowser.currentURI.spec, origEl.toString(), catchAllLinks.removeTag(origEl.innerHTML.trim()), event);
			}		
			else
			{
				var linkObject = {
					link : null,
					text : null,
					prev : null,
					origin : catchAllLinks.ORIGINAL_LINK,
					start : new Date()
				};
				catchAllLinks.increaseIndexArrTabActive();
				arrLinks.splice(tabIndex,0,linkObject);
			};
        } else if(origEl.parentNode.tagName === 'A' || origEl.parentNode.tagName === 'a') {
				if (!catchAllLinks.checkUrlAvailable(origEl.toString()) || !(catchAllLinks.getNumChildOfUrl(catchAllLinks.getParentURL(gBrowser.currentURI.spec))<5) )
				{
					if(!(catchAllLinks.getNumChildOfUrl(catchAllLinks.getParentURL(gBrowser.currentURI.spec))<5))
						alert("Click tối đa 5 keywords");
					event.preventDefault();
					return;
				}
				else
				{
					
					event.stopPropagation();
				};
			catchAllLinks.processURLRequest(gBrowser.currentURI.spec, origEl.parentNode.toString(), catchAllLinks.removeTag(origEl.parentNode.innerHTML.trim()), event);
        }		
    },
	checkUrlAvailable: function (url) {
		var tabs = gBrowser.tabs;
		if (arrTabActive.length>0)
		{
			var urlTabEnd = arrLinks[arrTabActive[arrTabActive.length-1]].link;	
			if ( (urlTabEnd==url))
				return false;
		};

		return true;
	},
	getNumChildOfUrl: function(url)
	{
		var num=0;
		for (var kk=0;kk<arrLinks.length;kk++)
		{
			if (arrLinks[kk].prev==url)
				num=num+1;
		}
		return num;
	},
	checkUrlInListParent: function (url) {
			for (var ii = 0;ii < urlParents.length;ii++)
				if (urlParents[ii]==url)
					return true;
		return false;
	},
	rtrim: function (url) {
		var urlnew=url;
		if (url.lastIndexOf("/")== url.length-1)
			urlnew = url.substring(0, url.length - 1);
		return urlnew;
	},
	getkey: function (str) {
		var key="";
		var start = str.search("###");
		if(start>-1)
		{
			var end = str.lastIndexOf("!!!");
			var key=str.substring(start+3,end);
			return key;
		};
		return "";
		
	},
    processURLRequest: function (currentURI, clickedURL, linkText, event) {		
        if (clickedURL === undefined || clickedURL === "" || gBrowser.tabContainer.selectedIndex >=arrLinks.length) {          
			return;
        };
        var currentLink = catchAllLinks.getParentURL(currentURI);
        var currentItem;
		currentItem= arrLinks[gBrowser.tabContainer.selectedIndex];
		sLinkObject = {
            link : clickedURL,
            text : linkText,
            prev : currentLink,
            origin : currentItem.origin,
            start : new Date()
		};
		var tabs = gBrowser.tabs;
		var tabIndex = gBrowser.tabContainer.selectedIndex;
		
		if(gBrowser.currentURI.spec !== "about:blank")
		{
			if (currentLink.indexOf(catchAllLinks.ORIGINAL_LINK)==-1 &&
				currentItem !== null && currentItem.origin.indexOf(catchAllLinks.ORIGINAL_LINK)>-1 && urlParents.length>0) {
				event.preventDefault();
				gBrowser.addTab(clickedURL);				
				arrLinks.push(sLinkObject);
				arrTabActive[arrTabActive.length]=tabs.length - 1;
				var d = new Date();
				var timeOpen = d.format("hh:mm:ss dd/MM/yyyy");
				var timeClose = "In view";
				var timeView = "0";
				var iTabParent=catchAllLinks.getITabParent(currentLink);
				var a1=sLinkObject.text.toUpperCase();
				var a2=decodeURIComponent(arrkey[iTabParent]).toUpperCase();
				var a3=decodeURIComponent(sLinkObject.link).toUpperCase();
				if( ( catchAllLinks.checkeyAvailable(a2,a1) || (a3.search(a2)>-1)) && (arrkey[iTabParent]!==""))									
					catchAllLinks.updateServerSideWithParams(clickedURL, catchAllLinks.ID_USER, 
					timeOpen, timeClose, timeView, linkText, currentLink,1);
				else
					catchAllLinks.updateServerSideWithParams(clickedURL, catchAllLinks.ID_USER, 
					timeOpen, timeClose, timeView, linkText, currentLink,0);
			}
		}
    },
    getCurrentItem: function (currentURI) {
        var item = null;
        for (var index = 0; index < arrLinks.length; index++) {
            var tmp = arrLinks[index];
            if (tmp.link === currentURI) {
                item = tmp;
                break;
            }
        };
        return item;
    },
    getParentURL: function (currentURI) {
        var tabIndex = gBrowser.tabContainer.selectedIndex;
		var ii = indexUrlParent.indexOf(tabIndex);
		if (ii>-1)
		{
			
			return urlParents[ii];
		}
		else 
			return currentURI;
			
    },
    getReferredFromURI: function () {
        var tabIndex = gBrowser.tabContainer.selectedIndex;
        var referredFromURI = gBrowser.tabContainer.childNodes[tabIndex].linkedBrowser.webNavigation.referringURI;
        if (referredFromURI == null) {
            return "";
        };
        return referredFromURI.spec;
    },
    createCrossDomainRequest: function(url, handler) {
        var request;
        if (catchAllLinks.isIE8) {
            request = new window.XDomainRequest();
        } else {
            request = new XMLHttpRequest();
        };
        return request;
    }, 
    updateServerSide: function() {
        if (catchAllLinks.invocation) {
            if(catchAllLinks.isIE8) {
                catchAllLinks.invocation.onload = catchAllLinks.outputResult;
                catchAllLinks.invocation.open("GET", catchAllLinks.BASE_URL, true);
                catchAllLinks.invocation.send();
            } else {
                catchAllLinks.invocation.open('GET', catchAllLinks.BASE_URL, true);
                catchAllLinks.invocation.onreadystatechange = catchAllLinks.handler;
                catchAllLinks.invocation.send();
            }
        } else {
            var text = "No Invocation TookPlace At All";
        }
    },
    updateServerSideWithParams: function(urlClicked, idUser, timeOpen, timeClose, timeView, linkText, parent,checkkey) {
        if (catchAllLinks.invocation) {
            var requestUrl = catchAllLinks.BASE_URL + '?urlClicked=%20'+ encodeURIComponent(urlClicked) +'&idUser=' + encodeURIComponent(idUser) + 
            '&timeOpend=' + encodeURIComponent(timeOpen) +'&timeClose=' + encodeURIComponent(timeClose) + 
            '&timeView='+ encodeURIComponent(timeView) + '&linkText=' + encodeURIComponent(linkText) + 
            '&parent=%20' + encodeURIComponent(parent)+ '&deepbacklink=1';
			if (checkkey===1)
				requestUrl=requestUrl + '&checkkey=1';
			/*
			console.log("updateServerSideWithParams With URL: " + requestUrl);
			*/
            if(catchAllLinks.isIE8) {
                catchAllLinks.invocation.onload = catchAllLinks.outputResult;
                catchAllLinks.invocation.open("GET", requestUrl, true);
                catchAllLinks.invocation.send();
            } else {
                catchAllLinks.invocation.open('GET', requestUrl, true);
                catchAllLinks.invocation.onreadystatechange = catchAllLinks.handler;
                catchAllLinks.invocation.send();
            }
        } else {
            var text = "No Invocation TookPlace At All";          
        }
    },
    handler: function(evtXHR) {
        if (catchAllLinks.invocation.readyState == 4) {
            if (catchAllLinks.invocation.status == 200) {
                catchAllLinks.outputResult();
            } else {
				var a= 10;
            }
        }
    },
    outputResult: function() {
        var response = catchAllLinks.invocation.responseText;        
    }, 
    increaseArrayIndex: function ()
	{
			for(var i=0;i<indexUrlParent.length;i++)
				indexUrlParent[i]=indexUrlParent[i]+1;
	},
	decreaseArrayIndex: function (at)
	{
			for(var i=at;i<indexUrlParent.length;i++)
				indexUrlParent[i]=indexUrlParent[i]-1;
	},
	focusTabUrl: function(url,key) {
		  var wm = Components.classes["@mozilla.org/appshell/window-mediator;1"]
							 .getService(Components.interfaces.nsIWindowMediator);
		  var browserEnumerator = wm.getEnumerator("navigator:browser");
		  var found = false;
		  while (!found && browserEnumerator.hasMoreElements()) {
			var browserWin = browserEnumerator.getNext();
			var tabbrowser = browserWin.gBrowser;
			for (var index = 0; index < urlParents.length; index++) {
			  if (url == urlParents[index] && url!=="") {
				tabbrowser.selectedTab = tabbrowser.tabContainer.childNodes[indexUrlParent[index]];				
				arrkey[indexUrlParent[index]]=key;				
				urlCurrentTab = url;
				browserWin.focus();
				found = true;
				break;
			  }
			}
		  };		  
		  if (!found) {
			var recentWindow = wm.getMostRecentWindow("navigator:browser");
			if (recentWindow) {
			  recentWindow.delayedOpenTab(url, null, null, null, null);
			}
			else {
			  return false;
			}
		  };
	},
	replaceNbsps: function (str) {
		
		str=str.replace(/&nbsp;/gi," ");
		str=str.replace(/&amp;/gi,"&");
		str=str.replace(/&quot;/gi,'"');
		str=str.replace(/&lt;/gi,"<");
		str=str.replace(/&gt;/gi,">");
		return str;
	},
	removeTag: function (str)
	{
			
			str=catchAllLinks.replaceNbsps(str);
			var temp = document.createElement("div");
			temp.innerHTML = str;
			return temp.textContent || temp.innerText;
	},
	remove_unicode: function(str) 
	{  
		str= str.toLowerCase();  
		str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");  
		str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");  
		str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");  
		str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");  
		str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");  
		str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");  
		str= str.replace(/đ/g,"d");  
		str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|$|_/g,"-"); 
		str= str.replace(/-+-/g,"-");
		str= str.replace(/^\-+|\-+$/g,""); 
		return str;  
	},
	checkeyAvailable: function(a1,a2)
	{
		var string = catchAllLinks.remove_unicode(a1);
		a2 =catchAllLinks.remove_unicode(a2.trim());
		var b=string.split("-");
		for( var i=0;i< b.length;i++)
		{
			b[i]=b[i].trim();
			if(b[i].search(a2)>-1 || a2.search(b[i])>-1)
			{
				
				return true;
			}
		};	
		return false;			
	},
	resetArrayKey: function()
	{
		var i, n = arrkey.length;
		for (i = 0; i < n; ++i) {
			arrkey[i] = "";
		}
	}
	
};

window.addEventListener('load', function load(event) {
    catchAllLinks.init(); 
}, false );

window.addEventListener('click', function(event) {	
   catchAllLinks.handleWindowClick(event);
}, false);
