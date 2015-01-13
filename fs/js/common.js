function FitToContent(id)
{   
  document.getElementById(id).style.height=document.getElementById(id).scrollHeight+'px';  
};

$('#textcomment').keyup(function (){
	
});
$('.postbutton').click( function(){
	if ( parseInt($("#numpoint").html())<=0)
	{
		alert('Bạn cần view, like, G+ cho người khác trước khi post bài');
		document.getElementById('des').innerHTML="";
		document.getElementById('textcomment').value="";
		return;
	};
	var cohinh=0;
	text='';
	if($('#contentpost').length > 0)
	text=document.getElementById('contentpost').innerHTML;	
	srcid="";
	if($('#srcid').length > 0)
	srcid=document.getElementById('srcid').value;
	posttext="";
	$(this).hide();
	if($('#textpost').length > 0)
		posttext=document.getElementById('textpost').innerHTML;
	var title="";
	var description="";
	var keyword="";
	var linkhinh="";
	var link="";
	if ($('#linkpost').length>0)
	{
		title=$('#titlelink11').html();
		description=$('#desid').html();
		keyword=$('#keylink').html();
		linkhinh=$('img[id^="idhinh"]:first').attr('src');
		link=document.getElementById('linkpost').value;
		
	};
	textcomment=$('#textcomment').val();
	var idgroup=$('#idgroup').html();
	
	if (textcomment.trim()=="")
	{
		alert("Vui lòng nhập nội dung.");
		return;		
	};
	if($('#haveimg').length > 0 && !document.getElementById('haveimg').checked) cohinh=1;
	else cohinh=0;
	var tokenPost=generateTokenPost();
	$.ajax({
	type: "POST",
	url: root_path+"libs/getcontenturl/post.php",
	data: { title:title, description:description, keyword:keyword, linkhinh:linkhinh, link:link, text: text,srcid:srcid,cohinh:cohinh,posttext:posttext,iduser:window.idUser,textcomment:textcomment,idgroup:idgroup,tokenPost:tokenPost},		
	success : function(abc)
	{
				if(abc.search("3333")>-1)
					alert("Chỉ post tối đa 3 link");
				if(abc.search("googlesearchbox")>-1)
					alert("Muốn tạo Google Search Box bạn nên post link search dạng: https://www.google.com.vn/#q=%C4%91%C3%A0o+t%E1%BA%A1o+seo+faceseo .");	
				if(abc.search("-1")>-1)
					alert("Cách nhau 5p post 1 lần");
				subPointPost(idUser,sidUser,textcomment);	
				getNewPost(idgroup);
				$("#fileupload").hide();
	}	
}).done(function( msg ) {
	document.getElementById('noidungpost').innerHTML=msg;
	document.getElementById('des').innerHTML="";
	document.getElementById('textcomment').value="";
});
});

$('#textcomment').keyup(function(e) {
	var url=$('#textcomment').val();
	var noidung=document.getElementById('des').innerHTML;  
	if(noidung=="" && (e.keyCode==32 || (url.substring(url.length-1)!="." && e.keyCode==86))){
		if(!url.match(/(http|https|ftp|ftps|www)+(\:\/\/)*\S*/))  
		{
			return;
		};
		$("#cho").css("display","block");
		$("#u_1w_n").css("display","none");	
		$.ajax({
			type: "POST",
			url: root_path + "libs/getcontenturl/content.php" , 
			data: { textcomment: url }
		}).done(function( msg ) {
				$("#cho").css("display","none");	
				$('#des').html(msg);
				$("#haveimg").click( function(){  	  
				   if( $("#haveimg").is(':checked') ){	  
					   $("#hinhanh").css("display","none");
					   $("#hinhanh").css("width","0%");   
					   $("#tieudebv").css("width","100%");		   
				   }else{
					   $("#hinhanh").css("width","30%");	   
					   $("#hinhanh").css("display","");  
					   $("#tieudebv").css("width","64%");
					}
				});
				$("#xoatieude").click( function(){$("#des").html("");$("#u_1w_n").css("display","");});
				$('#hotmusic').carouFredSel({
						width: null,
						align:"left",
						circular:true,
						infinite:false,
						items: {visible:1,start:0},
						scroll: {items:1,
									fx:"cover-fade",
									pauseOnHover: true,
									onAfter : function( data ) {						
									$(this).trigger("currentPosition", function( pos ) {	                
										document.getElementById('srcid').value=pos;	                
										});
									}								
								},					
						cookie: false,	
						auto:false,
						prev: {
						button  : ".sl_scroll.hotmusic",
						onBefore: function() {}
						},
						next:{
						button  : ".sr_scroll.hotmusic",
						onBefore: function() {}
						}
						
				});
		});
	}
});


