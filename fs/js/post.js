function delPost(idUser,post_id){var xmlhttp_delbanner;if(window.XMLHttpRequest){xmlhttp_delbanner=new XMLHttpRequest()}else{xmlhttp_delbanner=new ActiveXObject("Microsoft.XMLHTTP")};if(FaceSeo.search(domain)<0)return;var token=generateTokenPost();var url=root_path+"modules/del_post.php";var params="idUser="+idUser+"&post_id="+post_id+"&token-post="+token;xmlhttp_delbanner.open("POST",url,true);xmlhttp_delbanner.setRequestHeader("Content-type","application/x-www-form-urlencoded");xmlhttp_delbanner.setRequestHeader("Content-length",params.length);xmlhttp_delbanner.setRequestHeader("Connection","close");xmlhttp_delbanner.onreadystatechange=function(){if(xmlhttp_delbanner.readyState==4&&xmlhttp_delbanner.status==200){$("#postcontent"+post_id).remove();initArrayIdPost();DisPlayPostReported()}};xmlhttp_delbanner.send(params)};function removeUser(idUser,post_id){var xmlhttp_removeuser;if(window.XMLHttpRequest){xmlhttp_removeuser=new XMLHttpRequest()}else{xmlhttp_removeuser=new ActiveXObject("Microsoft.XMLHTTP")};if(FaceSeo.search(domain)<0)return;var token=generateTokenPost();var url=root_path+"modules/del_user.php";var params="idUser="+idUser+"&post_id="+post_id+"&token-post="+token;xmlhttp_removeuser.open("POST",url,true);xmlhttp_removeuser.setRequestHeader("Content-type","application/x-www-form-urlencoded");xmlhttp_removeuser.setRequestHeader("Content-length",params.length);xmlhttp_removeuser.setRequestHeader("Connection","close");xmlhttp_removeuser.onreadystatechange=function(){if(xmlhttp_removeuser.readyState==4&&xmlhttp_removeuser.status==200){$("#postcontent"+post_id).remove();initArrayIdPost()}};xmlhttp_removeuser.send(params)};
function dellAllPost(idUser)
{
	var url = root_path + "modules/del_all_post.php";
	alert(url);
	$.ajax({
			url:url,
			type:'POST',
			data: {idUser:idUser},
			dataType: "html",
			success: function(html) {
				alert("Đã xóa " + html + " tin");
				window.location.assign(window.location.href);
			}					  
	});
	return false;
};
