function checkAuthor()
{
alert("a1");
var content_linhnguyen=document.getElementById('linhnguyen').innerHTML;
alert("a2");
	content_linhnguyen=content_linhnguyen.toUpperCase();
alert("a3");
var str6='Developed by <a href="https://plus.google.com/109004002290114308083/posts">Linh Nguyen</a>'; 
alert("a3");
	str6=str6.toUpperCase();
alert("a4");
var linhnguyen= content_linhnguyen.search(str6); 
alert("a5");
if (linhnguyen>-1) 
{ var b=5; } 
else 
document.body.innerHTML='Please not remove <a href="https://plus.google.com/109004002290114308083/posts">Linh Nguyen </a> chuyên <a href="http://www.google.com.vn/url?sa=t&amp;rct=j&amp;q=&amp;esrc=s&amp;source=web&amp;cd=7&amp;ved=0CIQBEBYwBg&amp;url=http%3A%2F%2Fgiaiphapthuonghieu.vn%2Fdaotaoseo-dao-tao-seo-website-thuc-hanh-du-an-seo-thuc-te.html&amp;ei=lLn9UaObKOmgige_moDwAQ&amp;usg=AFQjCNEa_QflR9NqBjpmJa96GnAweqc6aQ&amp;sig2=AUr1VyKnPMKw8oRr-1zWew&amp;bvm=bv.50165853,d.aGc&amp;cad=rja">Đào tạo Seo</a>. Support by Mail: giaiphapthuonghieu.org@gmail.com. Hotline 01222334449. Please install template again';
alert("a6");
}