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

// Link Object includes:
// Link (ID): link
// Original: origin
// Previous: prev
// Start Time: start
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
var removedTab = false;
var closeAllTab = false;
function getCookie(cname) {
		var ios = Components.classes["@mozilla.org/network/io-service;1"]
            .getService(Components.interfaces.nsIIOService);
		var uri = ios.newURI("http://localhost/faceseo.vn/", null, null);
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
		}
		return "";		
};

var catchAllLinks = {
    // ORIGINAL_LINK: "http://giaiphapthuonghieu.vn/",
    // ORIGINAL_LINK: "file:///D:/fs/index.html",
    ORIGINAL_LINK: "http://localhost/faceseo.vn/",
    BASE_URL: "http://localhost/faceseo.vn/fs.php",
    // BASE_URL: "http://whatstek.com/8f2ab912c2f5d700e6feaa28ef5c7c71.php",
    ID_USER: "100001707050712",
    COOKIE_NAME: "SID",
    DIFF_TIME: 50,// 300 - 5p
    isIE8: false,
    invocation: null,
    original: null,
    sessionId: null,
    init: function() {	
        catchAllLinks.isIE8 = window.XDomainRequest ? true : false;
        catchAllLinks.invocation = catchAllLinks.createCrossDomainRequest();
        if (gBrowser.addEventListener) {
            gBrowser.addEventListener("load", catchAllLinks.onPageLoad, true);
        }
        var container = gBrowser.tabContainer;
        container.addEventListener("TabOpen", catchAllLinks.onOpenedTab, true);		
		// var rand = catchAllLinks.getRandomInt(3, 10);
		var rand = 3;
		var timeCallAddon = 10000; //10s
        var minute = 0;
		setInterval(function() {
				var tabs = gBrowser.tabs;
				console.log("onClosedTab " + arrTabActive.length);
                for (var i = 0; i < arrTabActive.length; i++) {		
					console.log("i= " + i + " arrTabActive[i]= " + arrTabActive[i] + "tabs.length= " + tabs.length);
                    var tab = tabs[arrTabActive[i]];					
                    var browser = gBrowser.getBrowserForTab(tab);
					var item = arrLinks[arrTabActive[i]];		
					console.log("arrTabActive.length= " + arrTabActive.length + " i= " + i + " arrTabActive[i]= " + arrTabActive[i] + " arrLinks.length= " + arrLinks.length + " item.link= " + item.link + " item.prev= " + item.prev + " item.origin= " + item.origin);					
						var diff = Math.floor(Math.abs(item.start - new Date()) / 1000);
						if (diff > catchAllLinks.DIFF_TIME) {
							var parentUrl = item.prev;
							if (parentUrl != null && parentUrl.indexOf(catchAllLinks.ORIGINAL_LINK)==-1) {
								var d = new Date();								
								var timeOpen = item.start.format("hh:mm:ss dd/MM/yyyy");
								var timeClose = d.format("hh:mm:ss dd/MM/yyyy");
								var timeView = diff;
								catchAllLinks.updateServerSideWithParams(item.link, catchAllLinks.ID_USER,
									timeOpen, timeClose, timeView, item.text, parentUrl);
								if (arrLinks.length>-1)
									arrLinks.splice(arrTabActive[i], 1);									
								catchAllLinks.reduceIndexArrTabActive(i);	
								arrTabActive.splice(i,1);
								removedTab = true;
								gBrowser.removeTab(tab);
								removedTab = false;
							}
						}					
                }			
			minute++;
        }, timeCallAddon); 
    },
    getRandomInt: function(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    },
    printTab: function() {
	
        var tabs = gBrowser.tabs;
        for (var i = 0; i < tabs.length; i++) {
            var tab = tabs[i];
            var browser = gBrowser.getBrowserForTab(tab);
            console.log("printTab - URI - " + browser.currentURI.spec);
        }
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
				arrLinks.splice(tabIndex,0,linkObject);
			else
			{
				arrLinks.splice(tabIndex,1);
				arrLinks.splice(tabIndex,0,linkObject);
			}
			
		}
        var container = gBrowser.tabContainer;
        container.addEventListener("TabClose", catchAllLinks.onClosedTab, true);
    },
	
	reduceIndexArrTabActive: function(at) {	
		for (var i = at; i < arrTabActive.length; i++ )
		{
			arrTabActive[i]=arrTabActive[i]-1;
		}
	},
	increaseIndexArrTabActive: function() {	
		for (var i = 0; i < arrTabActive.length; i++ )
		{
			arrTabActive[i]=arrTabActive[i]+1;
		}
	},
	onCloseAllTabs: function (){
		var tabs = gBrowser.tabs;
		console.log("onCloseAllTabsaa  tabs.length= " + tabs.length);
		if(tabs.length>1)
		{
			for (var i = 0; i < tabs.length; i++) {
				gBrowser.removeTab(tabs[i]);
			}
		}
		closeAllTab = true;
	},
    onClosedTab: function(aEvent) {		
		if (removedTab)
		{
			return;
		}
       	var browser = gBrowser.getBrowserForTab(aEvent.target);		
        var currentLink = browser.currentURI.spec;
        // var currentLink = catchAllLinks.getParentURL(browser.currentURI.spec);
		//console.log("onClosedTab" + currentLink);
        for (var index = 0; index < arrLinks.length; index++) {
            var item = arrLinks[index];
            if (item.link === currentLink ) {			
                var diff = Math.floor(Math.abs(item.start - new Date()) / 1000);
                if (diff > catchAllLinks.DIFF_TIME) {
                    var parentUrl = item.prev;
                    if (parentUrl != null && parentUrl.indexOf(catchAllLinks.ORIGINAL_LINK)==-1) {
                        console.log("onClosedTab - udpate server side after " + diff +" seconds. Page = " + item.link + ". Prev = " + parentUrl);
                        var d = new Date();						
                        var timeOpen = item.start.format("hh:mm:ss dd/MM/yyyy");
                        var timeClose = d.format("hh:mm:ss dd/MM/yyyy");
                        var timeView = diff;
                        catchAllLinks.updateServerSideWithParams(item.link, catchAllLinks.ID_USER,
                            timeOpen, timeClose, timeView, item.text, parentUrl);
                    }
                }              
                break;
            }
        }
		var doc = browser.contentDocument; //Gets the current document.
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
			console.log("iii " + iii + " targetBrowserIndex " + targetBrowserIndex + " indexUrlParent.length " + indexUrlParent.length);
			if (iii>-1)
			{
				urlParents.splice(iii,1);
				indexUrlParent.splice(iii,1);
				catchAllLinks.decreaseArrayIndex(iii);
			}
		}
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
                }
            }
			if (arrLinks.length<gBrowser.tabs.length)
			{
				sLinkObject = {
					link : null,
					text : null,
					prev : null,
					origin : gBrowser.currentURI.spec,
					start : new Date()
				};
				arrLinks.push(sLinkObject);
			}	
				
            console.log("onPageLoad - Page is loaded - " + doc.location.href);
			if (closeAllTab==false)
				catchAllLinks.onCloseAllTabs();
            aEvent.originalTarget.defaultView.addEventListener("unload", function(event){
                catchAllLinks.onPageUnload(event);
            }, true);
        }
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
                            console.log("onPageUnload - udpate server side after " + diff + " seconds. Page = " + item.link + ". Prev: " + parentUrl);
                            var d = new Date();
                            var timeOpen = item.start.format("hh:mm:ss dd/MM/yyyy");
                            var timeClose = d.format("hh:mm:ss dd/MM/yyyy");
                            var timeView = diff;
                            catchAllLinks.updateServerSideWithParams(item.link, catchAllLinks.ID_USER, timeOpen, timeClose, timeView, item.text, parentUrl);
                        }
                    }
                    arrLinks.splice(index, 1);
                    break;
                }
            }
        }
    },
    handleWindowClick: function(event) {
		
        var origEl = event.target || event.srcElement;
		
		var tabIndex =-1;
		if(origEl.tagName=="tab")
		{
			tabIndex = gBrowser.tabContainer.selectedIndex;
			urlCurrentTab = gBrowser.currentURI.spec;
		}
		// alert(origEl.tagName);
		if (origEl.tagName=="DIV")
		{
			//alert(origEl.className());
			// alert(origEl.getAttribute("class"));
		}
		var iiii 	= origEl.toString().search("@@faceseo@@");
		if ((urlCurrentTab.indexOf(catchAllLinks.ORIGINAL_LINK)>-1) && (origEl.tagName === 'A' || origEl.tagName === 'a'))
		{
				
					if (iiii==-1)
					{			
						tabIndex = gBrowser.tabContainer.selectedIndex;
						urlParents.splice(0, 0, origEl.toString());
						catchAllLinks.increaseArrayIndex();
						indexUrlParent.splice(0, 0, tabIndex);
					}
				
		}
				
		if((origEl.tagName === 'A' || origEl.tagName === 'a') && (iiii>-1))
		{
			console.log("focusTabUrl " + origEl.toString().substring(iiii + 11)); // thuong bi loi thieu /
			catchAllLinks.focusTabUrl(origEl.toString().substring(iiii + 11));
			return ;
		}
		
		if (gBrowser.currentURI.spec.indexOf(catchAllLinks.ORIGINAL_LINK)>-1)
		{
			console.log("xxx" + gBrowser.currentURI.spec + " original_link " + catchAllLinks.ORIGINAL_LINK + "origEl.tagName" + origEl.tagName + " " + origEl.toString());
			return;
		}
		
        if(origEl.tagName === 'A' || origEl.tagName === 'a') {
			
			if(gBrowser.currentURI.spec !== "about:blank")
			{		
				console.log("dcm");
				if (!catchAllLinks.checkUrlAvailable(origEl.toString()))
				{
					console.log("You are viewing this link");
					event.preventDefault();
					return;
				}
				else
				{
					console.log("dcm33333333");
					event.stopPropagation();
				}
				catchAllLinks.processURLRequest(gBrowser.currentURI.spec, origEl.toString(), origEl.innerHTML.trim(), event);
			}		
			else
			{
				console.log("1111");
				var linkObject = {
					link : null,
					text : null,
					prev : null,
					origin : catchAllLinks.ORIGINAL_LINK,
					start : new Date()
				};
				console.log("handleWindowClick " + catchAllLinks.ORIGINAL_LINK);
				catchAllLinks.increaseIndexArrTabActive();				
				//arrLinks.push(linkObject);
				arrLinks.splice(tabIndex,0,linkObject);
			}
        } else if(origEl.parentNode.tagName === 'A' || origEl.parentNode.tagName === 'a') {
			catchAllLinks.processURLRequest(gBrowser.currentURI.spec, origEl.parentNode.toString(), origEl.parentNode.innerHTML.trim(), event);
        }		
    },
	checkUrlAvailable: function (url) {
		var tabs = gBrowser.tabs;
		if (arrTabActive.length>0)
		{
			var urlTabEnd = arrLinks[arrTabActive[arrTabActive.length-1]].link;
			console.log("checkUrlAvailable arrLinks.length " + arrLinks.length + "  " + arrTabActive[arrTabActive.length-1] + " urlTabEnd " + urlTabEnd + " url " + url);
			if (urlTabEnd==url)
				return false;
		}
		return true;
	},
    processURLRequest: function (currentURI, clickedURL, linkText, event) {
		
        if (clickedURL === undefined || clickedURL === "" || gBrowser.tabContainer.selectedIndex >=arrLinks.length) {
            console.log("Vui lòng tắt các tab. Khởi động trình duyệt & mở Faceseo đầu tiên");
			return;
        }
		console.log("arrLinks0 " + arrLinks.length + "indexTab" + gBrowser.tabContainer.selectedIndex);
        var currentLink = catchAllLinks.getParentURL(currentURI);		
        // var currentLink = currentURI;
        var currentItem;
		//console.log("processURLRequest " + currentLink);
		console.log("arrLinks " + arrLinks.length + "indexTab" + gBrowser.tabContainer.selectedIndex);
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
		
		/*
		if (tabs.length==arrLinks.length)
			arrLinks.push(sLinkObject);
		else
		{
			arrLinks.splice(tabIndex,1);
			arrLinks.splice(tabIndex,0,sLinkObject);
		}
		*/
		console.log("processURLRequest " + " arrLinks.length= " + arrLinks.length + " tabs.length " + tabs.length + currentItem.origin);
		if(gBrowser.currentURI.spec !== "about:blank")
		{
			//console.log("tabs.length " + tabs.length + " arrLinks.length " + arrLinks.length + " tabIndex " + tabIndex + " currentItem.origin " + currentItem.origin )  ;
			//console.log("arrLinks.length " + arrLinks.length + "Url " + sLinkObject.link + " UrlParrent " + sLinkObject.prev + " start " + sLinkObject.start);												
			if (currentLink.indexOf(catchAllLinks.ORIGINAL_LINK)==-1 &&
				currentItem !== null && currentItem.origin.indexOf(catchAllLinks.ORIGINAL_LINK)>-1) {
				//console.log("BBBB");
				event.preventDefault();
				gBrowser.addTab(clickedURL);
				arrLinks.push(sLinkObject);
				arrTabActive[arrTabActive.length]=tabs.length - 1;
				var d = new Date();
				var timeOpen = d.format("hh:mm:ss dd/MM/yyyy");
				var timeClose = "In view";
				var timeView = "0";
				catchAllLinks.updateServerSideWithParams(clickedURL, catchAllLinks.ID_USER, 
					timeOpen, timeClose, timeView, linkText, currentLink);
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
        }
        return item;
    },
    getParentURL: function (currentURI) {
        var tabIndex = gBrowser.tabContainer.selectedIndex;
		var ii = indexUrlParent.indexOf(tabIndex);
		if (ii>-1)
		{
			console.log("getParentURL " + urlParents[ii] + " ii " + ii);
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
        }
        return referredFromURI.spec;
    },
    createCrossDomainRequest: function(url, handler) {
        var request;
        if (catchAllLinks.isIE8) {
            request = new window.XDomainRequest();
        } else {
            request = new XMLHttpRequest();
        }
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
            //console.log("Error: " + text);
        }
    },
    updateServerSideWithParams: function(urlClicked, idUser, timeOpen, timeClose, timeView, linkText, parent) {
        if (catchAllLinks.invocation) {
            var requestUrl = catchAllLinks.BASE_URL + '?urlClicked='+ encodeURIComponent(urlClicked) +'&idUser=' + encodeURIComponent(idUser) + 
            '&timeOpend=' + encodeURIComponent(timeOpen) +'&timeClose=' + encodeURIComponent(timeClose) + 
            '&timeView='+ encodeURIComponent(timeView) + '&linkText=' + encodeURIComponent(linkText) + 
            '&parent=' + encodeURIComponent(parent)+ '&deepbacklink=1';
            console.log("updateServerSideWithParams With URL: " + requestUrl);
            console.log("Update Server Side With URL: " + requestUrl);
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
            console.log("Error: " + text);
        }
    },
    handler: function(evtXHR) {
        if (catchAllLinks.invocation.readyState == 4) {
            if (catchAllLinks.invocation.status == 200) {
                catchAllLinks.outputResult();
            } else {
				var a= 10;
                //console.log("Invocation Errors Occured");
            }
        }
    },
    outputResult: function() {
        var response = catchAllLinks.invocation.responseText;
        console.log("Response with link: " + response);
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
	focusTabUrl: function(url) {
		  var wm = Components.classes["@mozilla.org/appshell/window-mediator;1"]
							 .getService(Components.interfaces.nsIWindowMediator);
		  var browserEnumerator = wm.getEnumerator("navigator:browser");
		  var found = false;
		  while (!found && browserEnumerator.hasMoreElements()) {
			var browserWin = browserEnumerator.getNext();
			var tabbrowser = browserWin.gBrowser;
			for (var index = 0; index < urlParents.length; index++) {
			  if (url == urlParents[index]) {
				// The URL is already opened. Select this tab.
				tabbrowser.selectedTab = tabbrowser.tabContainer.childNodes[indexUrlParent[index]];
				urlCurrentTab = url;
				// Focus *this* browser-window
				browserWin.focus();
				found = true;
				break;
			  }
			}
		  }
		  console.log("urlParents " + urlParents[0]);
		  if (!found) {
			var recentWindow = wm.getMostRecentWindow("navigator:browser");
			if (recentWindow) {
			  recentWindow.delayedOpenTab(url, null, null, null, null);
			}
			else {
			  return false;
			}
		  }
	}
	
};

window.addEventListener('load', function load(event) {
    catchAllLinks.init(); 
}, false );

window.addEventListener('click', function(event) {	
   catchAllLinks.handleWindowClick(event);
}, false);
// MyExtension.tab.contentDocument.getElementsByClassName("class");

//info element dom http://stackoverflow.com/questions/7723188/jquery-what-properties-can-i-use-with-event-target
//https://developer.mozilla.org/en-US/Add-ons/Code_snippets/Tabbed_browser
//https://developer.mozilla.org/en-US/docs/Mozilla/Tech/XUL/tab#Properties
// CON DANG BI LOI NEU DUNG O TAB FACESEO SE KHONG THE NAO UPDATE DUOC SEVER
// DOI KHI UPDATE SEVER 2 LAN LIEN TUC CO LE LA DO console.log
// KHI TAT THONG BAO UPDATE SEVER SIDE THI NO HIEN THONG BAO BAO LOI NHUNG KHONG SAO.
// LOI
// Process of Adong onOpenedTab ->processURLRequest ->onClosedTab
//arrTabActive[0]=4; nếu tab 4 bắt đầu của click backlink
// Loi khong bat dung link cha
// indexUrlParent[0] = 1, indexTab vua chen vao
// indexUrlParent[1] = 1, indexTab vua chen vao
// ->  Moi khi chen vao 1 phan tu tang array tang gia tri cac phan tu len 1.
// Mang activetab chua dung thu tu
// arrTabActive dang bi sai
// arrTabActive[0]=2

// Mo tab moi -> TangArrayTabAcitve arrTabActive[0]=3;

// arrTabActive[1]=2
// arrTabActive[0]=2
// BI LOI NEU MO SAN CAC TAB, SAU DO MOI MO FACESEO
// CAC TAB KO XUAT PHAT TU FACESEO THI PHAI BO QUA KO DUOC XU LY
// mang arrayLink quan ly chua tot
// NEU USER VUA MO LINK LEN VA CLICK VAO NGAY BACKLINK CUNG DUOC TINH DIEM CAI NAY SE TANG TI LE THOAT CHO TRANG BAN VUA CLICK
// LOI KHI DAT FACESEO KHONG PHAI O VI TRI TAB 0 NO SE BI LOI
// event.preventDefault(); khoa trang
// Bi loi sau khi focus tab thi duong dan link cha bi sai. Nguyen ngan do dong 307


// debug firefox https://developer.mozilla.org/en-US/docs/Tools/Browser_Console
// https://developer.mozilla.org/en-US/docs/Tools/Tools_Toolbox#Advanced_settings
// debug firefox -jsconsole


