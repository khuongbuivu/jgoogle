      //<![CDATA[
	  var url_ppp = 'http://www.google.com.vn/url?sa=t&amp;rct=j&amp;q=&amp;esrc=s&amp;source=web&amp;cd=31&amp;cad=rja&amp;uact=8&amp;ved=0CBkQFjAAOB4&amp;url=http%3A%2F%2Fwww.giaiphapthuonghieu.net%2F2014%2F07%2Fbang-bao-gia-dich-vu-seo-website-top-google.html&amp;ei=OtzPU-qjBtW48gW0-YGICQ&amp;usg=AFQjCNF3gldy5CRpli-WICB7SZ5Cged2vg&amp;bvm=bv.71667212,d.dGc';
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
