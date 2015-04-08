<meta charset="UTF-8">
<script>
function remove_unicode(str) 
{  
	str= str.toLowerCase();  
	str= str.replace(/à|ậ|à|á|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/gi,"a");  
	str= str.replace(/ể|ệ|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/gi,"e");  
	str= str.replace(/ì|í|ị|ỉ|ĩ/gi,"i");  
	str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/gi,"o");  
	str= str.replace(/ứ|ữ|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/gi,"u");  
	str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/gi,"y");  
	str= str.replace(/đ/g,"d");  
	str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|$|_/g,"-"); 
	str= str.replace(/-+-/g,"-");
	str= str.replace(/^\-+|\-+$/g,""); 
	return str;  
}
str="nông nghiệp hữu cơ, trung tâm phát triển và chứng nhận hữu cơ việt nam";
alert(remove_unicode(str));
</script>
