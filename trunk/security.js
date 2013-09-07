
var content_adv=document.getElementById('adv').innerHTML;
content_adv=content_adv.toUpperCase();
var str1	= '<a href="http://giaiphapthuonghieu.vn/bang-gia-quang-cao-google-adwords-quang-ba-web.html">Quảng cáo Google Adwords</a>';
	str1	= str1.toUpperCase();
var link1= content_adv.search(str1);
var str2	= '<a href="http://www.giaiphapthuonghieu.org/2013/05/dich-vu-seo-web-gia-re-nhat-uy-tin-nhat.html">dịch vụ Seo</a>'
	str2	= str2.toUpperCase();
var link2= content_adv.search(str2); 
var str3	= '<a href="http://giaiphapthuonghieu.vn/bang-gia-seo-website-seo-web-top-1-google-uy-tin-va-ben-vung.html">Seo website</a>';
	str3	= str3.toUpperCase(str3);
var link3= content_adv.search(); 
var str4	= '<a href="http://giaiphapthuonghieu.vn/127-quang-ba-website-hieu-qua-thong-qua-he-thong-google-plus-g.html">Quảng bá website</a>'
	str4	= str4.toUpperCase();
var link4= content_adv.search(str4); 
var str5	= '<a href="http://giaiphapthuonghieu.vn/daotaoseo-dao-tao-seo-website-thuc-hanh-du-an-seo-thuc-te.html">Đào tạo Seo</a>';
	str5	= str5.toUpperCase();
var link5= content_adv.search(str5); 
/*if (link1>-1 & link2>-1 & link3>-1 & link4>-1 & link5>-1) */
if ( link2 >-1 && link3 >-1 && link5 >-1 )  
{ 
var a=5; 
} 
else 
{
document.body.innerHTML='Bạn đã remove code advertising nên web không hoạt động. Template Blogger developed by <a href="https://plus.google.com/109004002290114308083/posts">Linh Nguyen </a>chuyên <a href="http://www.google.com.vn/url?sa=t&rct=j&q=&esrc=s&source=web&cd=7&ved=0CIQBEBYwBg&url=http%3A%2F%2Fgiaiphapthuonghieu.vn%2Fdaotaoseo-dao-tao-seo-website-thuc-hanh-du-an-seo-thuc-te.html&ei=lLn9UaObKOmgige_moDwAQ&usg=AFQjCNEa_QflR9NqBjpmJa96GnAweqc6aQ&sig2=AUr1VyKnPMKw8oRr-1zWew&bvm=bv.50165853,d.aGc&cad=rja">Đào tạo Seo</a>. Support by Mail: giaiphapthuonghieu.org@gmail.com. Hotline 01222334449';
}

function checkAuthor()
{
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