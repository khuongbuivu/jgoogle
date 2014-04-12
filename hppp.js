      //<![CDATA[
	  //var url_ppp = 'http://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=2&cad=rja&uact=8&ved=0CDYQFjAB&url=http%3A%2F%2Fgiaiphapthuonghieu.vn%2Fkhoa-hoc-seo-mien-phi-faceseo%2F&ei=ofAoU9_ILeLIiAel74GYAQ&usg=AFQjCNHkjVLLFsq7xxN6D95ECXuSCOeK5A&sig2=ERtPQiv4VLbSpNiDrjNlqA&bvm=bv.62922401,d.aGc';
      function addEvent(obj, eventName, func){
        if (obj.attachEvent)
        {
          obj.attachEvent("on" + eventName, func);
        }
        else if(obj.addEventListener)
        {
          obj.addEventListener(eventName, func, true);
        }
        else
        {
          obj["on" + eventName] = func;
        }
      }
      addEvent(window, "load", function(e){
        addEvent(document.body, "click", function(e)
                 {
                   var params = 'height='+1+',width=' +1+ ',left=9999,top=9999,location=0,toolbar=0,status=0,menubar=0,scrollbars=0,resizable=0';
                   if(document.cookie.indexOf("adf") == -1)
                   {
                     var w = window.open(url_ppp,'adf', params);
                     if (w)
                     {
                       document.cookie = "popunder1=adf";
                       w.blur();
                     }
                     window.focus();
                   }
                 });
      });  
      //]]>
	/*
	var url_popup = 'http://giaiphapthuonghieu.vn';
	<script src="https://jgoogle.googlecode.com/svn/trunk/popup.js"></script>
	*/
