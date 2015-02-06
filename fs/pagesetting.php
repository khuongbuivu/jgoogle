<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="css/pages/jquery.min.js"></script>
<script type="text/javascript" src="css/pages/jquery-ui.min.js"></script>
<script>
jQuery=$.noConflict();
var root_path = "http://localhost/faceseo.vn/";
</script>
<link rel="stylesheet" href="css/pagesetting.css" type="text/css" />
<link href="css/pages/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="http://faceseo.vn/index/images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>
<body class="hasSmurfbar">
<div id="container">
  <div id="pagelet_bluebar" data-referrer="pagelet_bluebar">
    <div id="blueBarHolder" class="slim">
      <div id="blueBar" class="fixed_elem">
        <div id="pageHead" class="clearfix _5bfg" role="banner">
          <div id="headleft"> <a href="http://faceseo.vn" > <img src="images/css/logo-faceseo.png"/> </a> </div>
          <div id="headNav" class="clearfix">
            <div class="rfloat">
              <ul id="pageNav" class="clearfix _5bfw" role="navigation">
                <li id="navJewels" class="navItem">
                  <div id="jewelContainer" class="notifNegativeBase notifCentered notifGentleAppReceipt">
                    <div id="fsAnaylyticsButton" class="uiToggle fbJewel west"> <a class="jewelButton icon-view"> <i class="jewelButtonHcm img sp_2al3zc sx_c49c9a"></i> <span id="anaylyticsCountWrapper" class="jewelCount"><span id="anaylyticsCountValue">1</span></span> </a>
                     
                      <div class="textintro"><div class="textcon"><span class="nutintro"></span>Chức năng thống kê lượt click trong ngày</div></div>
                    </div>
                    <div id="fbNotificationsJewel" class="uiToggle fbJewel west"> <a class="jewelButton icon-comment"> <i class="jewelButtonHcm img sp_2al3zc sx_c49c9a"></i> <span id="notificationsCountWrapper" class="jewelCount"><span id="notificationsCountValue">1</span></span> </a>
                   
                      <div class="textintro"><div class="textcon"><span class="nutintro"></span>Chức năng thống kê comment mới</div></div>
                    </div>
                    <div id="iconmessagebutton" class="uiToggle fbJewel west"> <a class="jewelButton icon-message"> <i class="jewelButtonHcm img sp_2al3zc sx_c49c9a"></i> <span id="messageCountWrapper" class="jewelCount"><span id="iconmessageCountValue">1</span></span> </a>
                    
                      <div class="textintro"><div class="textcon"><span class="nutintro"></span>Chức năng thống báo tin nhắn mới</div></div>
                    </div>
                    <div id="iconemailbutton" class="uiToggle fbJewel west"> <a class="jewelButton icon-email"> <i class="jewelButtonHcm img sp_2al3zc sx_c49c9a"></i> <span id="emailCountWrapper" class="jewelCount"><span id="iconemailCountValue">1</span></span> </a>
                      <div class="textintro"><div class="textcon"><span class="nutintro"></span>Chức năng thông báo mới của hệ thống</div></div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="content">
    <div id="showindex" class="ccenter2">
      <div class="center">
                									<script src="css/pages/showLoading.js" type="text/javascript"></script>
<h2 class="center_title">Thêm/Sửa Link  <img title="" alt="" src="css/pages/icon-add-setting.png"></h2>
<div class="main-content">
			<div>Link SEO, Link G+, Link Fanpage FB, Link Youtube<br><span style="font-size: 10pt;"><span style="color: #ff0000;"></span></span></div>
	</div>
<div class="add-site-form">
	<script src="css/pages/jquery.validate.js" type="text/javascript"></script>
<script src="css/pages/jquery.validation.functions.js" type="text/javascript"></script>

<link type="text/css" rel="stylesheet" href="css/pages/jquery.multiselect.css">
<link type="text/css" rel="stylesheet" href="css/pages/jquery.multiselect.filter.css">
<script src="css/pages/jquery.multiselect.js" type="text/javascript"></script>
<script src="css/pages/jquery.multiselect.filter.min.js" type="text/javascript"></script>


<script type="text/javascript"> 

jQuery(function () {
    jQuery("#l_email").validate({
        expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
        message: "Please, enter vaild email"
    });
    jQuery("#l_pass").validate({
        expression: "if (VAL.length &gt; 5 &amp;&amp; VAL) return true; else return false;",
        message: "Password is not valid, please use only letters and numbers - at least 6 characters"
    });
    jQuery('#login_form').validated(function () {
        login()
    });
    jQuery("#r_email").validate({
        expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9-_]+(\\.[a-zA-Z0-9-_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
        message: "Please, enter vaild email"
    });
    jQuery("#r_pass").validate({
        expression: "if (VAL.length &gt; 5 &amp;&amp; VAL) return true; else return false;",
        message: "Password is not valid, please use only letters and numbers - at least 6 characters"
    });
    jQuery("#r_re_pass").validate({
        expression: "if ((VAL == jQuery(\'#r_pass\').val()) &amp;&amp; VAL) return true; else return false;",
        message: "Please, confirm password, field doesn't match the password field"
    });
    jQuery("#capt").validate({
        expression: "if (VAL.length &gt; 1 &amp;&amp; VAL) return true; else return false;",
        message: "Please, enter security code"
    });
    jQuery('#reg_form').validated(function () {
        registration()
    });
    jQuery("#l_title").validate({
        expression: "if ((VAL.match(/^[a-zA-Z0-9 _]*$/) &amp;&amp; VAL  &amp;&amp; jQuery(\'#l_type\').val()!=3 &amp;&amp; jQuery(\'#l_type\').val()!=35 &amp;&amp; jQuery(\'#l_type\').val()!=36 &amp;&amp; jQuery(\'#l_type\').val()!=37 &amp;&amp; jQuery(\'#l_type\').val()!=20 &amp;&amp; jQuery(\'#l_type\').val()!=7 &amp;&amp; jQuery(\'#l_type\').val()!=11) || jQuery(\'#l_type\').val()==3 || jQuery(\'#l_type\').val()==35 || jQuery(\'#l_type\').val()==36 || jQuery(\'#l_type\').val()==37 || jQuery(\'#l_type\').val()==7 || jQuery(\'#l_type\').val()==20 || jQuery(\'#l_type\').val()==11 || jQuery(\'#l_type\').val()==12 || jQuery(\'#l_type\').val()==13 || jQuery(\'#l_type\').val()==14 || jQuery(\'#l_type\').val()==15 || jQuery(\'#l_type\').val()==16 || jQuery(\'#l_type\').val()==17 || jQuery(\'#l_type\').val()==19 || jQuery(\'#l_type\').val()==21 || jQuery(\'#l_type\').val()==22 || jQuery(\'#l_type\').val()==23 || jQuery(\'#l_type\').val()==24) return true; else return false;",
        message: "Please enter only letters and numbers"
    });
    jQuery("#l_url").validate({
        expression: "if ((isUrl(VAL) &amp;&amp; jQuery(\'#l_type\').val()!=3 &amp;&amp; jQuery(\'#l_type\').val()!=35 &amp;&amp; jQuery(\'#l_type\').val()!=36 &amp;&amp; jQuery(\'#l_type\').val()!=37 &amp;&amp; jQuery(\'#l_type\').val()!=9 &amp;&amp; jQuery(\'#l_type\').val()!=18 &amp;&amp; jQuery(\'#l_type\').val()!=19) || ((jQuery(\'#l_type\').val()==3 || jQuery(\'#l_type\').val()==35 || jQuery(\'#l_type\').val()==36 || jQuery(\'#l_type\').val()==37 || jQuery(\'#l_type\').val()==5 || jQuery(\'#l_type\').val()==6 || jQuery(\'#l_type\').val()==7 || jQuery(\'#l_type\').val()==8 || jQuery(\'#l_type\').val()==31 || jQuery(\'#l_type\').val()==12 || jQuery(\'#l_type\').val()==13 || jQuery(\'#l_type\').val()==14 || jQuery(\'#l_type\').val()==15 || jQuery(\'#l_type\').val()==16 || jQuery(\'#l_type\').val()==19 || jQuery(\'#l_type\').val()==21 || jQuery(\'#l_type\').val()==22 || jQuery(\'#l_type\').val()==23 || jQuery(\'#l_type\').val()==24) &amp;&amp; VAL.match(/^[a-zA-Z0-9 _\-\]*$/) &amp;&amp; VAL) || (jQuery(\'#l_type\').val()==11 &amp;&amp; VAL.match(/^[a-zA-Z0-9 _\.\-\]*$/) &amp;&amp; VAL) || (jQuery(\'#l_type\').val()==20 &amp;&amp; VAL.match(/^[a-zA-Z0-9 _\.\-\]*$/) &amp;&amp; VAL) || (jQuery(\'#l_type\').val()==15 &amp;&amp; VAL.match(/^[a-zA-Z0-9 \/_\.\-\:]*$/) &amp;&amp; VAL) || (jQuery(\'#l_type\').val()==16 &amp;&amp; VAL.match(/^[a-zA-Z0-9 \/_\.\-\:]*$/) &amp;&amp; VAL) || (jQuery(\'#l_type\').val()==19 &amp;&amp; VAL.match(/^[a-zA-Z0-9 \/_\.\-\:]*$/) &amp;&amp; VAL) || (jQuery(\'#l_type\').val()==17 &amp;&amp; VAL.length &gt; 0 &amp;&amp; VAL.length &lt; 256) || (isUrl(VAL) &amp;&amp; jQuery(\'#l_type\').val()==18 &amp;&amp; !VAL.match(/[#]/)) || jQuery(\'#l_type\').val()==9) return true; else return false;",
        message: "Please enter a valid url"
    });
    jQuery("#l_type").validate({
        expression: "if (VAL != \'0\') return true; else return false;",
        message: "Please select type"
    });
    jQuery("#l_cpc").validate({
        expression: "if (VAL.match(/^[0-9]*$/) &amp;&amp; VAL!=1 &amp;&amp; VAL&lt;11) return true; else return false;",
        message: "Must bee only numbers or 0, or from 2 to 10"
    });
    jQuery("#l_clicks").validate({
        expression: "if (!VAL || (VAL &amp;&amp; VAL.match(/^[0-9]*$/))) return true; else return false;",
        message: "Enter only numbers"
    });
    jQuery("#l_daily").validate({
        expression: "if (!VAL || (VAL &amp;&amp; VAL.match(/^[0-9]*$/))) return true; else return false;",
        message: "Enter only numbers"
    });
    jQuery('#link_form').validated(function () {
        addSite()
    });
    jQuery("#f_email").validate({
        expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9-_]+(\\.[a-zA-Z0-9-_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
        message: "Please, enter vaild email"
    });
    jQuery("#secure").validate({
        expression: "if (VAL.length &gt; 1 &amp;&amp; VAL) return true; else return false;",
        message: "Please, enter security code"
    });
    jQuery('#forgot_form').validated(function () {
        forgot()
    });
    jQuery("#f_code").validate({
        expression: "if (VAL.match(/^[a-zA-Z0-9]*$/) &amp;&amp; VAL) return true; else return false;",
        message: "Please enter only letters and numbers"
    });
    jQuery('#recover_form').validated(function () {
        resetPassCode()
    });
    jQuery("#f_pass").validate({
        expression: "if (VAL.length &gt; 5 &amp;&amp; VAL) return true; else return false;",
        message: "Password is not valid, please use only letters and numbers - at least 6 characters"
    });
    jQuery("#f_re_pass").validate({
        expression: "if ((VAL == jQuery(\'#f_pass\').val()) &amp;&amp; VAL) return true; else return false;",
        message: "Please, confirm password, field doesn't match the password field"
    });
    jQuery('#new_pass_form').validated(function () {
        newPass()
    });
    jQuery("#rce_email").validate({
        expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
        message: "Please, enter vaild email"
    });
    jQuery("#rce_capt").validate({
        expression: "if (VAL.length &gt; 1 &amp;&amp; VAL) return true; else return false;",
        message: "Please, enter security code"
    });
    jQuery('#resend_email_form').validated(function () {
        resendConfirmEmail()
    })
});
</script> 

<script src="css/pages/jquery.jqEasyCharCounter.min.js" tyep="text/javascript"></script>


<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(".area_col2").jqEasyCounter({
		    'maxChars': 255,
		    'maxCharsWarning': 140,
		    'msgFontSize': '12px',
		    'msgFontColor': '#000',
		    'msgFontFamily': 'Arial',
		    'msgTextAlign': 'left',
		    'msgWarningColor': '#F00',
		    'msgAppendMethod': 'insertBefore'              
		});
		
		var widget = jQuery("#l_country").multiselect({
			header: "&amp;nbsp;",
			height: "350",
			noneSelectedText: "select countries",
			click: function(e, ui){
				if( jQuery(this).multiselect("widget").find("input:checked").length > 30 ){
				    return false;
				}
			}
		}).multiselectfilter();
		
		state = false;
		
			widget.multiselect('disable');
			state = true;
		
		
		
		jQuery("#ww").click(function(){
		   state = !state;
		   widget.multiselect(state ? 'disable' : 'enable');
		});
		
		jQuery(document).on("click", "#on", function(){
			var parent = jQuery(this).parents('.switch');
			jQuery('#off',parent).removeClass('selected');
			jQuery(this).addClass('selected');
			jQuery("#l_clicks").removeAttr("disabled");
			jQuery("#l_clicks").val(parseInt(1000));
		});

		jQuery(document).on("click", "#off", function(){
			var parent = jQuery(this).parents('.switch');
			jQuery('#on',parent).removeClass('selected');
			jQuery(this).addClass('selected');
			jQuery("#l_clicks").attr("disabled", "disabled");
			jQuery("#l_clicks").val("");
		});
		
		jQuery(document).on("click", "#d-on", function(){
			var parent = jQuery(this).parents('.switch');
			jQuery('#d-off',parent).removeClass('selected');
			jQuery(this).addClass('selected');
			jQuery("#l_daily").removeAttr("disabled");
			jQuery("#l_daily").val(parseInt(100));
		});

		jQuery(document).on("click", "#d-off", function(){
			var parent = jQuery(this).parents('.switch');
			jQuery('#d-on',parent).removeClass('selected');
			jQuery(this).addClass('selected');
			jQuery("#l_daily").attr("disabled", "disabled");
			jQuery("#l_daily").val("");
		});
		jQuery('.save').click( function(){
			var nameproject= jQuery('#l_title').val();
			var keywords= jQuery('#l_keywrods').val();
			var urls= jQuery('#l_url').val();
			var bl1= jQuery('#l_bl1').val();
			var bl2= jQuery('#l_bl2').val();
			var bl3= jQuery('#l_bl3').val();
			var gplus1= jQuery('#l_gplus1').val();
			var gplus2= jQuery('#l_gplus2').val();
			var gplus3= jQuery('#l_gplus3').val();
			var fanpage= jQuery('#l_fanpage').val();
			var clicks= jQuery('#l_clicks').val();
			var daily= jQuery('#l_daily').val();
			var cpc= jQuery('#l_cpc').val();
			jQuery.ajax({
				type: "POST",
				url: root_path+"modules/add_setting.php",
				data: { nameproject:nameproject, urls:urls, keywords:keywords, bl1:bl1, bl2:bl2, bl3: bl3,gplus1:gplus1,gplus2:gplus2,gplus3:gplus3,fanpage:fanpage,clicks:clicks,daily:daily,cpc:cpc},	
				success : function(abc)
				{
							alert("Bạn đã cài đặt thành công");
				}	
			}).done(function( msg ) {
			});
			
		});
	});
	
</script>


<div id="NotificationTextYoutube" style="display:none;padding:0px 20px 20px 20px;">
	Here you can add your YouTube video
</div>

<div id="NotificationTextYoutubeChannel" style="display:none;padding:0px 20px 20px 20px;">
	Add your YouTube channel USERNAME and get subscriptions.
</div>

<div id="NotificationTextYoutubeLike" style="display:none;padding:0px 20px 20px 20px;">
	<span>Here you can add your YouTube video and get likes.</span>
</div>

<?php
include_once("config.php");
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
$result=mysqli_query($con,"select * from fs_setting where setting_uid=".$_SESSION['session-user']." order by setting_id desc limit 1");
$row = mysqli_fetch_array($result);
mysqli_close($con);
?>
<form action="" method="post" id="link_form" class="edit_form">
	
		
	<div class="edit_row">
	<?php 
	/*
		<label class="col1">Type:</label>	
		<!--selection-->	
		<div class=" col2_wrap"> 
	       <select onchange="changeSiteLinkField('SiteLinkName','SiteLinkNote','Page URL:','Username:','Video URL:','Username/Id:','ID / UserName:','Username:','Username / ID:','Enter your Facebook Page url','Type your twitter username only','YouTube video full url or video id','Enter Youtube channel username','exp. 104027532900 or +your_gplus_username','Type your pinterest username only','Type your facebook username or id','Type your myspace username only','Type your digg username or id only','Type your stumbleupon username or id only', 'Tweet ID:', 'Twitter tweet\'s id only (exmpl. 435757540987514880)', 'Text:', 'Twitter tweet\'s text, max 140 characters', 'URL:', 'Enter URL for sharing on facebook', 'Username:', 'Enter your Instagram username', 'Username:', 'Enter your Reverbnation username', 'Username:', 'Enter your SoundCloud username', 'Pin ID:', 'Enter your pinterest pin id', 'FB post url:', 'Enter facebook post url', 'G+ post url:', 'Enter Google plus post url', 'VK page URL:', 'Enter vk.com page url', 'VK group URL:', 'Enter vk.com group url', 'Username:', 'Enter your MySpace username', 'Video URL', 'YouTube video full url or video id', 'Photo URL:', 'Enter your Instagram Photo URL', 'Answer URL:', 'Enter your Ask.fm answer URL (exmpl. ask.fm/x/answer/1)', 'Post URL:', 'Enter your Google Plus Post URL', 'Username/ID:', 'Enter your Vine account ID or Username only', 'Post ID:', 'Enter your Vine post ID only', 'Post ID:', 'Enter your Vine post ID only', 'URL:', 'Enter your website url')" id="l_type" class="col2" name="type">
	       					<option value="1">Facebook Likes</option>
							<option value="18">Facebook Share</option>
							<option value="11">Facebook Followers</option>
							<option value="25">Facebook Post Like</option>
							<option value="28">Facebook Post Share</option>
							<option value="35">Vine Followers</option>
							<option value="36">Vine Likes</option>
							<option value="37">Vine Revines</option>
							<option value="9">Google Circles</option>
							<option value="34">Google Post Share</option>
							<option value="6">YouTube Subscribe</option>
							<option value="8">YouTube Video Likes</option>
							<option value="31">YouTube Favorites</option>
							<option value="5">YouTube Views</option>
							<option value="3">Twitter Followers</option>
							<option value="17">Twitter Tweets</option>
							<option value="16">Twitter Retweets</option>
							<option value="15">Twitter Favorites</option>
							<option value="19">Instagram Followers</option>
							<option value="32">Instagram Likes</option>
							<option value="33">Ask.fm Likes</option>
							<option value="29">Vkontakte Pages</option>
							<option value="30">Vkontakte Groups</option>
							<option value="20">MySpace Friends</option>
							<option value="7">Pinterest Followers</option>
							<option value="23">Pinterest Repins</option>
							<option value="24">Pinterest Likes</option>
							<option value="21">Reverbnation Fans</option>
							<option value="22">Soundcloud Follow</option>
							<option value="10">Soundcloud Plays</option>
							<option value="14">Stumbleupon Followers</option>
							<option value="4">Website Hits</option>
						</select>
		</div>
		<!--selection end-->
		<label class="col3">Choose network type (Facebook like, Google +1, Twitter, Website Hits)</label>
	</div>
		
	<div class="edit_row">
		<label class="col1">Countries:</label>
		<div class="select_wrap col2_wrap">
			<input type="checkbox" checked="checked" value="1" id="ww" name="ww"> <span>WORLDWIDE</span><br> 
	       	<select class="col2" multiple="multiple" id="l_country" name="country" style="display: none;" aria-disabled="false">
	       					<option value="1">AFGHANISTAN</option>
							<option value="2">ALAND ISLANDS</option>
							<option value="3">ALBANIA</option>
							<option value="4">ALGERIA</option>
							<option value="5">AMERICAN SAMOA</option>
							<option value="6">ANDORRA</option>
							<option value="7">ANGOLA</option>
							<option value="8">ANGUILLA</option>
							<option value="9">ANTARCTICA</option>
							<option value="10">ANTIGUA AND BARBUDA</option>
							<option value="11">ARGENTINA</option>
							<option value="12">ARMENIA</option>
							<option value="13">ARUBA</option>
							<option value="14">AUSTRALIA</option>
							<option value="15">AUSTRIA</option>
							<option value="16">AZERBAIJAN</option>
							<option value="17">BAHAMAS</option>
							<option value="18">BAHRAIN</option>
							<option value="19">BANGLADESH</option>
							<option value="20">BARBADOS</option>
							<option value="21">BELARUS</option>
							<option value="22">BELGIUM</option>
							<option value="23">BELIZE</option>
							<option value="24">BENIN</option>
							<option value="25">BERMUDA</option>
							<option value="26">BHUTAN</option>
							<option value="27">BOLIVIA, PLURINATIONAL STATE OF</option>
							<option value="28">BONAIRE, SINT EUSTATIUS AND SABA</option>
							<option value="29">BOSNIA AND HERZEGOVINA</option>
							<option value="30">BOTSWANA</option>
							<option value="31">BOUVET ISLAND</option>
							<option value="32">BRAZIL</option>
							<option value="33">BRITISH INDIAN OCEAN TERRITORY</option>
							<option value="34">BRUNEI DARUSSALAM</option>
							<option value="35">BULGARIA</option>
							<option value="36">BURKINA FASO</option>
							<option value="37">BURUNDI</option>
							<option value="38">CAMBODIA</option>
							<option value="39">CAMEROON</option>
							<option value="40">CANADA</option>
							<option value="41">CAPE VERDE</option>
							<option value="42">CAYMAN ISLANDS</option>
							<option value="43">CENTRAL AFRICAN REPUBLIC</option>
							<option value="44">CHAD</option>
							<option value="45">CHILE</option>
							<option value="46">CHINA</option>
							<option value="47">CHRISTMAS ISLAND</option>
							<option value="48">COCOS (KEELING) ISLANDS</option>
							<option value="49">COLOMBIA</option>
							<option value="50">COMOROS</option>
							<option value="51">CONGO</option>
							<option value="52">CONGO, THE DEMOCRATIC REPUBLIC OF THE</option>
							<option value="53">COOK ISLANDS</option>
							<option value="54">COSTA RICA</option>
							<option value="55">COTE D'IVOIRE</option>
							<option value="56">CROATIA</option>
							<option value="57">CUBA</option>
							<option value="58">CURACAO</option>
							<option value="59">CYPRUS</option>
							<option value="60">CZECH REPUBLIC</option>
							<option value="61">DENMARK</option>
							<option value="62">DJIBOUTI</option>
							<option value="63">DOMINICA</option>
							<option value="64">DOMINICAN REPUBLIC</option>
							<option value="65">ECUADOR</option>
							<option value="66">EGYPT</option>
							<option value="67">EL SALVADOR</option>
							<option value="68">EQUATORIAL GUINEA</option>
							<option value="69">ERITREA</option>
							<option value="70">ESTONIA</option>
							<option value="71">ETHIOPIA</option>
							<option value="72">FALKLAND ISLANDS (MALVINAS)</option>
							<option value="73">FAROE ISLANDS</option>
							<option value="74">FIJI</option>
							<option value="75">FINLAND</option>
							<option value="76">FRANCE</option>
							<option value="77">FRENCH GUIANA</option>
							<option value="78">FRENCH POLYNESIA</option>
							<option value="79">FRENCH SOUTHERN TERRITORIES</option>
							<option value="80">GABON</option>
							<option value="81">GAMBIA</option>
							<option value="82">GEORGIA</option>
							<option value="83">GERMANY</option>
							<option value="84">GHANA</option>
							<option value="85">GIBRALTAR</option>
							<option value="86">GREECE</option>
							<option value="87">GREENLAND</option>
							<option value="88">GRENADA</option>
							<option value="89">GUADELOUPE</option>
							<option value="90">GUAM</option>
							<option value="91">GUATEMALA</option>
							<option value="92">GUERNSEY</option>
							<option value="93">GUINEA</option>
							<option value="94">GUINEA-BISSAU</option>
							<option value="95">GUYANA</option>
							<option value="96">HAITI</option>
							<option value="97">HEARD ISLAND AND MCDONALD ISLANDS</option>
							<option value="98">HOLY SEE (VATICAN CITY STATE)</option>
							<option value="99">HONDURAS</option>
							<option value="100">HONG KONG</option>
							<option value="101">HUNGARY</option>
							<option value="102">ICELAND</option>
							<option value="103">INDIA</option>
							<option value="104">INDONESIA</option>
							<option value="105">IRAN, ISLAMIC REPUBLIC OF</option>
							<option value="106">IRAQ</option>
							<option value="107">IRELAND</option>
							<option value="108">ISLE OF MAN</option>
							<option value="109">ISRAEL</option>
							<option value="110">ITALY</option>
							<option value="111">JAMAICA</option>
							<option value="112">JAPAN</option>
							<option value="113">JERSEY</option>
							<option value="114">JORDAN</option>
							<option value="115">KAZAKHSTAN</option>
							<option value="116">KENYA</option>
							<option value="117">KIRIBATI</option>
							<option value="118">KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF</option>
							<option value="119">KOREA, REPUBLIC OF</option>
							<option value="251">KOSOVO</option>
							<option value="120">KUWAIT</option>
							<option value="121">KYRGYZSTAN</option>
							<option value="122">LAO PEOPLE'S DEMOCRATIC REPUBLIC</option>
							<option value="123">LATVIA</option>
							<option value="124">LEBANON</option>
							<option value="125">LESOTHO</option>
							<option value="126">LIBERIA</option>
							<option value="127">LIBYA</option>
							<option value="128">LIECHTENSTEIN</option>
							<option value="129">LITHUANIA</option>
							<option value="130">LUXEMBOURG</option>
							<option value="131">MACAO</option>
							<option value="132">MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF</option>
							<option value="133">MADAGASCAR</option>
							<option value="134">MALAWI</option>
							<option value="135">MALAYSIA</option>
							<option value="136">MALDIVES</option>
							<option value="137">MALI</option>
							<option value="138">MALTA</option>
							<option value="139">MARSHALL ISLANDS</option>
							<option value="140">MARTINIQUE</option>
							<option value="141">MAURITANIA</option>
							<option value="142">MAURITIUS</option>
							<option value="143">MAYOTTE</option>
							<option value="144">MEXICO</option>
							<option value="145">MICRONESIA, FEDERATED STATES OF</option>
							<option value="146">MOLDOVA, REPUBLIC OF</option>
							<option value="147">MONACO</option>
							<option value="148">MONGOLIA</option>
							<option value="149">MONTENEGRO</option>
							<option value="150">MONTSERRAT</option>
							<option value="151">MOROCCO</option>
							<option value="152">MOZAMBIQUE</option>
							<option value="153">MYANMAR</option>
							<option value="154">NAMIBIA</option>
							<option value="155">NAURU</option>
							<option value="156">NEPAL</option>
							<option value="157">NETHERLANDS</option>
							<option value="250">NETHERLANDS ANTILLES</option>
							<option value="158">NEW CALEDONIA</option>
							<option value="159">NEW ZEALAND</option>
							<option value="160">NICARAGUA</option>
							<option value="161">NIGER</option>
							<option value="162">NIGERIA</option>
							<option value="163">NIUE</option>
							<option value="164">NORFOLK ISLAND</option>
							<option value="165">NORTHERN MARIANA ISLANDS</option>
							<option value="166">NORWAY</option>
							<option value="167">OMAN</option>
							<option value="168">PAKISTAN</option>
							<option value="169">PALAU</option>
							<option value="170">PALESTINIAN TERRITORY, OCCUPIED</option>
							<option value="171">PANAMA</option>
							<option value="172">PAPUA NEW GUINEA</option>
							<option value="173">PARAGUAY</option>
							<option value="174">PERU</option>
							<option value="175">PHILIPPINES</option>
							<option value="176">PITCAIRN</option>
							<option value="177">POLAND</option>
							<option value="178">PORTUGAL</option>
							<option value="179">PUERTO RICO</option>
							<option value="180">QATAR</option>
							<option value="181">REUNION</option>
							<option value="182">ROMANIA</option>
							<option value="183">RUSSIAN FEDERATION</option>
							<option value="184">RWANDA</option>
							<option value="185">SAINT BARTHELEMY</option>
							<option value="186">SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA</option>
							<option value="187">SAINT KITTS AND NEVIS</option>
							<option value="188">SAINT LUCIA</option>
							<option value="189">SAINT MARTIN (FRENCH PART)</option>
							<option value="190">SAINT PIERRE AND MIQUELON</option>
							<option value="191">SAINT VINCENT AND THE GRENADINES</option>
							<option value="192">SAMOA</option>
							<option value="193">SAN MARINO</option>
							<option value="194">SAO TOME AND PRINCIPE</option>
							<option value="195">SAUDI ARABIA</option>
							<option value="196">SENEGAL</option>
							<option value="197">SERBIA</option>
							<option value="198">SEYCHELLES</option>
							<option value="199">SIERRA LEONE</option>
							<option value="200">SINGAPORE</option>
							<option value="201">SINT MAARTEN (DUTCH PART)</option>
							<option value="202">SLOVAKIA</option>
							<option value="203">SLOVENIA</option>
							<option value="204">SOLOMON ISLANDS</option>
							<option value="205">SOMALIA</option>
							<option value="206">SOUTH AFRICA</option>
							<option value="207">SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS</option>
							<option value="208">SOUTH SUDAN</option>
							<option value="209">SPAIN</option>
							<option value="210">SRI LANKA</option>
							<option value="211">SUDAN</option>
							<option value="212">SURINAME</option>
							<option value="213">SVALBARD AND JAN MAYEN</option>
							<option value="214">SWAZILAND</option>
							<option value="215">SWEDEN</option>
							<option value="216">SWITZERLAND</option>
							<option value="217">SYRIAN ARAB REPUBLIC</option>
							<option value="218">TAIWAN, PROVINCE OF CHINA</option>
							<option value="219">TAJIKISTAN</option>
							<option value="220">TANZANIA, UNITED REPUBLIC OF</option>
							<option value="221">THAILAND</option>
							<option value="222">TIMOR-LESTE</option>
							<option value="223">TOGO</option>
							<option value="224">TOKELAU</option>
							<option value="225">TONGA</option>
							<option value="226">TRINIDAD AND TOBAGO</option>
							<option value="227">TUNISIA</option>
							<option value="228">TURKEY</option>
							<option value="229">TURKMENISTAN</option>
							<option value="230">TURKS AND CAICOS ISLANDS</option>
							<option value="231">TUVALU</option>
							<option value="232">UGANDA</option>
							<option value="233">UKRAINE</option>
							<option value="234">UNITED ARAB EMIRATES</option>
							<option value="235">UNITED KINGDOM</option>
							<option value="236">UNITED STATES</option>
							<option value="237">UNITED STATES MINOR OUTLYING ISLANDS</option>
							<option value="238">URUGUAY</option>
							<option value="239">UZBEKISTAN</option>
							<option value="240">VANUATU</option>
							<option value="241">VENEZUELA, BOLIVARIAN REPUBLIC OF</option>
							<option value="242">VIET NAM</option>
							<option value="243">VIRGIN ISLANDS, BRITISH</option>
							<option value="244">VIRGIN ISLANDS, U.S.</option>
							<option value="245">WALLIS AND FUTUNA</option>
							<option value="246">WESTERN SAHARA</option>
							<option value="247">YEMEN</option>
							<option value="248">ZAMBIA</option>
							<option value="249">ZIMBABWE</option>
						</select>
		</div>
		
		<label class="col3">Select countries to promote your site / page.</label>
	</div>
	*/
	?>
			<div id="siteTitle" class="edit_row">
			<label class="col1">Tên dự án:</label>
			<div class="col2_wrap">
				<input type="text" value="<?php echo $row['setting_projectname']  ;?>" id="l_title" class="col2 ErrorField" name="title"><span class="ValidationErrors">Please enter only letters and numbers</span>
			</div>
			<label class="col3">Tên dự án bạn đang SEO</label>
		</div>
	<div class="edit_row">
		<label id="SiteLinkName" class="col1">Từ khóa SEO:</label>
		<div class="col2_wrap">
							<input type="text" value="<?php echo $row['setting_keywords']; ?>" id="l_keywrods" class="col2" name="keywrods">
					</div>
		<label id="SiteLinkNote" class="col3">Những keywords cần SEO</label>
	</div>	
	<div class="edit_row">
		<label id="SiteLinkName" class="col1">Link SEO:</label>
		<div class="col2_wrap">
							<input type="text" value="<?php echo $row['setting_linkseo']      ;?>" id="l_url" class="col2" name="url">
					</div>
		<label id="SiteLinkNote" class="col3">Link chính cần SEO top</label>
	</div>
	<div class="edit_row">
		<label id="SiteLinkName" class="col1">Backlink 1:</label>
		<div class="col2_wrap">
							<input type="text" value="<?php echo $row['setting_linkbl1']      ;?>" id="l_bl1" class="col2" name="backlink1">
					</div>
		<label id="SiteLinkNote" class="col3">Link post forum, blogger cần view</label>
	</div>
		<div class="edit_row">
		<label id="SiteLinkName" class="col1">Backlink 2:</label>
		<div class="col2_wrap">
							<input type="text" value="<?php echo $row['setting_linkbl2']      ;?>" id="l_bl2" class="col2" name="backlink2">
					</div>
		<label id="SiteLinkNote" class="col3">Link post forum, blogger cần view</label>
	</div>
		<div class="edit_row">
		<label id="SiteLinkName" class="col1">Backlink 3:</label>
		<div class="col2_wrap">
							<input type="text" value="<?php echo $row['setting_linkbl3']      ;?>" id="l_bl3" class="col2" name="backlink3">
					</div>
		<label id="SiteLinkNote" class="col3">Link post forum, blogger cần view</label>
	</div>
	<div class="edit_row">
		<label id="SiteLinkName" class="col1">Url post G+ 1:</label>
		<div class="col2_wrap">
							<input type="text" value="<?php echo $row['setting_linkg1']       ;?>" id="l_gplus1" class="col2" name="gplus1">
					</div>
		<label id="SiteLinkNote" class="col3">Link G+ cần share</label>
	</div>
	<div class="edit_row">
		<label id="SiteLinkName" class="col1">Url post G+ 2 :</label>
		<div class="col2_wrap">
							<input type="text" value="<?php echo $row['setting_linkg2']       ;?>" id="l_gplus2" class="col2" name="gplus2">
					</div>
		<label id="SiteLinkNote" class="col3">Link G+ cần share</label>
	</div>
	<div class="edit_row">
		<label id="SiteLinkName" class="col1">Url post G+ 3:</label>
		<div class="col2_wrap">
							<input type="text" value="<?php echo $row['setting_linkg3']       ;?>" id="l_gplus3" class="col2" name="gplus3">
					</div>
		<label id="SiteLinkNote" class="col3">Link G+ cần share</label>
	</div>
	<div class="edit_row">
		<label id="SiteLinkName" class="col1">Url Fanpage:</label>
		<div class="col2_wrap">
							<input type="text" value="<?php echo $row['setting_linkfb1']      ;?>" id="l_fanpage" class="col2" name="fanpage">
					</div>
		<label id="SiteLinkNote" class="col3">Enter your Facebook Page url</label>
	</div>
		
	<div class="edit_row">
		<label class="col1">Total Clicks:</label>
		<div class="col2_wrap">
			<p class="field switch">
				<label class="cb-enable" id="on"><span>On</span></label>
				<label class="cb-disable selected" id="off"><span>Off</span></label>
			</p>
			<div class="fltlft">
				<input type="text" value="<?php echo $row['setting_totalclick']   ;?>" id="l_clicks" class="col2 col2_short" name="clicks" disabled="disabled">
			</div>
		</div>
		<label class="col3">Set limit for total clicks for this site / page</label>
	</div>
	
	<div class="edit_row">
		<label class="col1">Daily Clicks:</label>
		<div class="col2_wrap">
			<p class="field switch">
				<label class="cb-enable" id="d-on"><span>On</span></label>
				<label class="cb-disable selected" id="d-off"><span>Off</span></label>
			</p>
			<div class="fltlft">
				<input type="text" value="<?php echo $row['setting_dailyclick']   ;?>" id="l_daily" class="col2 col2_short" name="daily" disabled="disabled">
			</div>
		</div>
		<label class="col3">Set limit for daily clicks for this site / page</label>
	</div>
    
		<div class="edit_row">
		<label class="col1">CPC:</label>
		<div class="col2_wrap"><input type="text" value="<?php if ($row['setting_cpc']!="") echo $row['setting_cpc']; ?>" id="l_cpc" class="col2" name="cpc"></div>
		<label class="col3">CPC is Cost (points) Per Click for your Site/Page - min=2 and max=10</label>
	</div>
        
		<div class="edit_form_bottom">
		<label class="cancel"><a href="/my_sites">Hủy</a></label>
		<button type="button" class="save btn btn2" value="Lưu" name="save" />Lưu</button>
	</div>
	</form>

</div>
<div class="content_bottom">Các bạn nhớ điều chỉnh, điều hướng link cần SEO mỗi ngày để đạt hiệu quả SEO cao nhất.<br></div>
								</div>
    </div>
  </div>
  <div id="footer">
    <div class="footermenu">
      <ul>
        <li><span data-show="1" class="liamenu">Giới thiệu</span><span class="subicon">New</span></li>
        <li><span data-show="2" class="liamenu">Điều khoản</span></li>
        <li><span data-show="3" class="liamenu">Bảo mật</span></li>
        <li><span data-show="4" class="liamenu">Hợp tác</span></li>
        <li><span data-show="5" class="liamenu">Tuyển dụng</span></li>
      </ul>
    </div>
  </div>
</div>

</body>
</html>