function showbannerfree(url,idUser)
{
var xmlhttp_cmt;
if(window.XMLHttpRequest){xmlhttp_cmt=new XMLHttpRequest()}
else{xmlhttp_cmt=new ActiveXObject("Microsoft.XMLHTTP")};
var params="idUser="+idUser;
xmlhttp_cmt.open("POST",url,true);
xmlhttp_cmt.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp_cmt.setRequestHeader("Content-length",params.length);
xmlhttp_cmt.setRequestHeader("Connection","close");
if(FaceSeo.search(domain)<0)return;
xmlhttp_cmt.onreadystatechange=function(){
if(xmlhttp_cmt.readyState==4&&xmlhttp_cmt.status==200){$("#bannerfree").html(xmlhttp_cmt.responseText)}};
xmlhttp_cmt.send(params)
};
function addbannerfree(url,User,img,link,status){
var xmlhttp_cmt;
if(window.XMLHttpRequest){xmlhttp_cmt=new XMLHttpRequest()}
else{xmlhttp_cmt=new ActiveXObject("Microsoft.XMLHTTP")};
img=$('#linkImageBanner').html();if(img==""){alert("Nhớ upload ảnh trước");return};
link=$('#linkbanner').val();
if(link.trim()==""){alert("Nhớ chèm link trước khi upload trước");return};
if(FaceSeo.search(domain)<0)return;
var params="idUser="+idUser+"&img="+img+"&link="+encodeURIComponent(link);
xmlhttp_cmt.open("POST",url,true);
xmlhttp_cmt.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp_cmt.setRequestHeader("Content-length",params.length);xmlhttp_cmt.setRequestHeader("Connection","close");
xmlhttp_cmt.onreadystatechange=function(){
if(xmlhttp_cmt.readyState==4&&xmlhttp_cmt.status==200){
window.location.assign(root_path+"modules/upload/banner.php")}};xmlhttp_cmt.send(params)
};
function delbanner(idUser){
var xmlhttp_delbanner;
if(window.XMLHttpRequest){xmlhttp_delbanner=new XMLHttpRequest()}
else{xmlhttp_delbanner=new ActiveXObject("Microsoft.XMLHTTP")};
if(FaceSeo.search(domain)<0)return;
var token=generateTokenPost();
var link=$('#linkbanner1').html();
var url=root_path+"modules/del_banner.php";
var params="idUser="+idUser+"&link="+link+"&token-banner="+token;
xmlhttp_delbanner.open("POST",url,true);
xmlhttp_delbanner.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp_delbanner.setRequestHeader("Content-length",params.length);
xmlhttp_delbanner.setRequestHeader("Connection","close");
xmlhttp_delbanner.onreadystatechange=function(){
if(xmlhttp_delbanner.readyState==4&&xmlhttp_delbanner.status==200){
window.location.assign(root_path+"modules/upload/banner.php")}};xmlhttp_delbanner.send(params)
};
function delBannerById(idBanner){
	var url = root_path + "modules/banner_del_by_id.php";
	if (FaceSeo.search(domain)<0)
		return;
	var xmlhttp;
	if(window.XMLHttpRequest){
	  xmlhttp=new XMLHttpRequest();
	}else{
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	};
	var params = "idBanner=" + idBanner ;
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.onreadystatechange = function() {
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){ 
		$("#dbanner"+idBanner).hide();
	}
  };
  xmlhttp.send(params);
};