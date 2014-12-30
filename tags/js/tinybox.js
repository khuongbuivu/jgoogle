TINY={};
var contentStastic,kk,clock=0;
TINY.box=function(){
	var j,m,g,v,p,t=0;
	return{
		show:function(o,title,classtitle){
			//alert(title + "  " + classtitle);
			v={opacity:70,close:1,animate:1,fixed:1,mask:1,maskid:'',boxid:'',topsplit:2,url:0,post:0,height:0,width:0,html:0,iframe:0};
			for(s in o){v[s]=o[s]}
			if(!p){
				j=document.createElement('div'); j.className='tbox';
				p=document.createElement('div'); p.className='tinner';
				kk=document.createElement('div'); kk.className='scrollbarwrapper';
				kk1=document.createElement('div');kk1.className="nano";
				
				kk2=document.createElement('div');kk2.className="overthrow content description";
				
				contentStastic=document.createElement('div'); contentStastic.className='tcontent';
				m=document.createElement('div'); m.className='tmask';
				g=document.createElement('div'); g.className='tclose'; g.v=0;
				t=document.createElement('div');t.className=classtitle;
				clock=document.createElement('div');clock.setAttribute("id", "timeclock");
				t.innerHTML=title;
				/*
				tbox->tinner -> 
				*/
				document.body.appendChild(m); document.body.appendChild(j); j.appendChild(p);p.appendChild(t); p.appendChild(kk); kk.appendChild(kk1);kk1.appendChild(kk2);kk2.appendChild(contentStastic);				
				t.appendChild(clock);
				var oImg=document.createElement("img");
				 oImg.setAttribute('src', 'images/preload.gif');
			          oImg.setAttribute('alt', 'na');
				 oImg.setAttribute('style', 'margin-left:48%;');
				 oImg.setAttribute('id', 'imgLoadingPopup');
				 kk2.appendChild(oImg);
				
				m.onclick=g.onclick=TINY.box.hide; window.onresize=TINY.box.resize
			}else{
				j.style.display='none'; clearTimeout(p.ah); if(g.v){p.removeChild(g); g.v=0}
				 oImg=document.createElement("img");
				 oImg.setAttribute('src', 'images/preload.gif');
				 oImg.setAttribute('alt', 'na');
				 oImg.setAttribute('style', 'margin-left:48%;');
				 oImg.setAttribute('id', 'imgLoadingPopup');
				 kk2.appendChild(oImg);
				
			}
			p.id=v.boxid; m.id=v.maskid; j.style.position=v.fixed?'fixed':'absolute';
			if(v.html&&!v.animate){
				p.style.backgroundImage='none'; contentStastic.innerHTML=v.html; contentStastic.style.display='';
				p.style.width=v.width?v.width+'px':'auto'; p.style.height=v.height?v.height+'px':'auto';
				
			}else{
				contentStastic.style.display='none'; 				
				if(!v.animate&&v.width&&v.height){
					p.style.width=v.width+'px'; p.style.height=v.height+'px';
				}else{
					p.style.width= '400px';
					p.style.height='100px';
					kk1.style.height='100px';
					kk.style.height='120px';
				}
				
			}
			if(v.mask){this.mask(); this.alpha(m,1,v.opacity)}else{this.alpha(j,1,100)}
			if(v.autohide){p.ah=setTimeout(TINY.box.hide,1000*v.autohide)}else{document.onkeyup=TINY.box.esc}
		},
		fill:function(c,u,k,a,w,h){
			if(u){
				if(v.image){
					var i=new Image(); i.onload=function(){w=w||i.width; h=h||i.height; TINY.box.psh(i,a,w,h)}; i.src=v.image
				}else if(v.iframe){
					this.psh('<iframe src="'+v.iframe+'" width="'+v.width+'" frameborder="0" height="'+v.height+'"></iframe>',a,w,h)
				}else{
					var x=window.XMLHttpRequest?new XMLHttpRequest():new ActiveXObject('Microsoft.XMLHTTP');
					x.onreadystatechange=function(){
						if(x.readyState==4&&x.status==200){p.style.backgroundImage=''; TINY.box.psh(x.responseText,a,w,h)}
					};
					if(k){
    	            	x.open('POST',c,true); x.setRequestHeader('Content-type','application/x-www-form-urlencoded'); x.send(k)
					}else{
       	         		x.open('GET',c,true); x.send(null)
					}
				}
			}else{
				this.psh(c,a,w,h)
			}
		},
		psh:function(c,a,w,h){
			if(typeof c=='object'){contentStastic.appendChild(c)}else{contentStastic.innerHTML=c}
			var x=p.style.width, y=p.style.height;
			if(!w||!h){
				p.style.width=w?w+'px':''; p.style.height=h?h+'px':''; contentStastic.style.display='';
				if(!h){h=parseInt(contentStastic.offsetHeight)}
				if(!w){w=parseInt(contentStastic.offsetWidth)}
				contentStastic.style.display='none';
				
			}
			p.style.width=x; p.style.height=y;
			kk1.style.height='480px';
			kk.style.height='500px';
			this.size(w,h,a)
		},
		esc:function(e){e=e||window.event; if(e.keyCode==27){TINY.box.hide()}},
		hide:function(){TINY.box.alpha(j,-1,0,3); document.onkeypress=null; if(v.closejs){v.closejs()};
		/*giaiphapthuonghieu.org@gmail.com add */
		window.clearTimeout(timeoutStasticClick); window.clearInterval(refreshIntervalId); setScroll=0;},
		/* end giaiphapthuonghieu.org@gmail.com add */
		resize:function(){TINY.box.pos(); TINY.box.mask()
		},
		mask:function(){m.style.height=this.total(1)+'px'; m.style.width=this.total(0)+'px'},
		pos:function(){
			var t;
			if(typeof v.top!='undefined'){t=v.top}else{t=(this.height()/v.topsplit)-(j.offsetHeight/2); t=t<20?20:t}
			if(!v.fixed&&!v.top){t+=this.top()}
			j.style.top=t+'px'; 
			j.style.left=typeof v.left!='undefined'?v.left+'px':(this.width()/2)-(j.offsetWidth/2)+'px'
		},
		alpha:function(e,d,a){
			clearInterval(e.ai);
			if(d){e.style.opacity=0; e.style.filter='alpha(opacity=0)'; e.style.display='block'; TINY.box.pos()}
			e.ai=setInterval(function(){TINY.box.ta(e,a,d)},20)

		},
		ta:function(e,a,d){
			var o=Math.round(e.style.opacity*100);
			if(o==a){
				clearInterval(e.ai);
				if(d==-1){
					e.style.display='none';
					e==j?TINY.box.alpha(m,-1,0,2):contentStastic.innerHTML=p.style.backgroundImage=''
				}else{
					if(e==m){
						this.alpha(j,1,100)
					}else{
						j.style.filter='';
						TINY.box.fill(v.html||v.url,v.url||v.iframe||v.image,v.post,v.animate,v.width,v.height)
					}
				}
			}else{
				var n=a-Math.floor(Math.abs(a-o)*.5)*d;
				e.style.opacity=n/100; e.style.filter='alpha(opacity='+n+')'
			}
		},
		size:function(w,h,a){
			if(a){
				clearInterval(p.si); var wd=parseInt(p.style.width)>w?-1:1, hd=parseInt(p.style.height)>h?-1:1;
				p.si=setInterval(function(){TINY.box.ts(w,wd,h,hd)},20)
			}else{
				p.style.backgroundImage='none'; if(v.close){p.appendChild(g); g.v=1}
				p.style.width=w+'px'; p.style.height=h+'px'; contentStastic.style.display=''; this.pos();
				if(v.openjs){v.openjs()}
			}
		},
		ts:function(w,wd,h,hd){
			var cw=parseInt(p.style.width), ch=parseInt(p.style.height);
			if(cw==w&&ch==h){	
				clearInterval(p.si); p.style.backgroundImage='none'; contentStastic.style.display='block'; if(v.close){p.appendChild(g); g.v=1};
				$('#imgLoadingPopup').remove();
				
			if(v.openjs){v.openjs()}
			}else{
				if(cw!=w){p.style.width=(w-Math.floor(Math.abs(w-cw)*.6)*wd)+'px'}
				if(ch!=h){p.style.height=(h-Math.floor(Math.abs(h-ch)*.6)*hd)+'px'}
				this.pos()
			}
		},
		top:function(){return document.documentElement.scrollTop||document.body.scrollTop},
		width:function(){return self.innerWidth||document.documentElement.clientWidth||document.body.clientWidth},
		height:function(){return self.innerHeight||document.documentElement.clientHeight||document.body.clientHeight},
		total:function(d){
			var b=document.body, e=document.documentElement;
			return d?Math.max(Math.max(contentStastic.scrollHeight,e.scrollHeight),Math.max(contentStastic.clientHeight,e.clientHeight)):
			Math.max(Math.max(contentStastic.scrollWidth,e.scrollWidth),Math.max(contentStastic.clientWidth,e.clientWidth))
		}
	}
}();