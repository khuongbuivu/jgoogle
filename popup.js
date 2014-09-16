      //<![CDATA[
	  var url_ppp = 'http://www.google.com.vn/url?sa=t&rct=j&q=&esrc=s&source=web&cd=3&cad=rja&uact=8&ved=0CE8QFjAC&url=http%3A%2F%2Fgiaiphapthuonghieu.vn%2Fdaotaoseo-dao-tao-seo-website-thuc-hanh-du-an-seo-thuc-te.html&ei=2LIXVJbpKsTM8gWI3YLQBQ&usg=AFQjCNEa_QflR9NqBjpmJa96GnAweqc6aQ&sig2=anxywImKgHOCWa_fNbV-7g&bvm=bv.75097202,d.dGc';
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
