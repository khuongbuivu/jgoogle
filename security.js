alert("bbbx");

function checkAuthor()
{
alert("cccc");
var content_linhnguyen=document.getElementById('linhnguyen').innerHTML;
	content_linhnguyen=content_linhnguyen.toUpperCase();
var str6='Developed by <a href="https://plus.google.com/109004002290114308083/posts">Linh Nguyen</a>'; 
	str6=str6.toUpperCase();
var linhnguyen= content_linhnguyen.search(str6); 
if (linhnguyen>-1) 
{ var b=5; } 
else 
document.body.innerHTML='Please not remove <a href="https://plus.google.com/109004002290114308083/posts">Linh Nguyen </a> chuyên <a href="http://www.google.com.vn/url?sa=t&rct=j&q=&esrc=s&source=web&cd=7&ved=0CIQBEBYwBg&url=http%3A%2F%2Fgiaiphapthuonghieu.vn%2Fdaotaoseo-dao-tao-seo-website-thuc-hanh-du-an-seo-thuc-te.html&ei=lLn9UaObKOmgige_moDwAQ&usg=AFQjCNEa_QflR9NqBjpmJa96GnAweqc6aQ&sig2=AUr1VyKnPMKw8oRr-1zWew&bvm=bv.50165853,d.aGc&cad=rja">Đào tạo Seo</a>. Support by Mail: giaiphapthuonghieu.org@gmail.com. Hotline 01222334449. Please install template again';
}