<?php

$homepathchat='http://faceseo.vn/fchat/';
if(!isset($_SESSION)){
    session_start();
}
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
require_once('classdata.php');
$fchat=new faceseochat();

/*
require 'class/src/facebook.php';
$facebook = new Facebook(array(
  'appId'  => '286617934749989',
  'secret' => '1fbfa0204ce4bc6e24f7cbce312aa9de',
));


$user = $facebook->getUser();


if ($user) {
  try {
   
    $user_profile = $facebook->api('/me');
	 
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $statusUrl = $facebook->getLoginStatusUrl();
  $loginUrl = $facebook->getLoginUrl();
}
*/

//$user=0;
// $useridoff=$_GET['userid'];
$useridoff=$_SESSION['session-user'];
$_SESSION['useractive']['id']=$_SESSION['session-user'];
$_SESSION['useractive']['username']=$_SESSION['session-name'];
if($useridoff>0){
	$user=1;	
?>

<?php if($user){
	$setuser=array('id'=>$_SESSION['session-user'],'name'=>$_SESSION['session-name']);
	$useractive2=$fchat->getUser2($setuser);
	$hourstimeonline=date('Y-m-d H:i:s');
    $_SESSION['timelogin']=strtotime($hourstimeonline);
	$useronline=$fchat->getUsersOnline();
	
	$conreport=mysqli_connect("localhost","root","rootfaceseo@#","chatreport") or die("Không kết nối được");
     mysqli_set_charset($conreport, "utf8");	
    $query='select lanvp from reportuser where iduser="'.$_SESSION['session-user'].'" limit 0,1';
   $data=mysqli_query($conreport,$query);
   $row=mysqli_fetch_row($data);
   $_SESSION['useractive']['vp']=(int)$row[0];
   mysqli_close($conreport);
	?>
<div class="bodychat">
<div data-ida="<?php echo $_SESSION['session-user']; ?>" class="userac"></div>
  <abbd data-ltime="<?php $date = date_create();
$timestamp=date_timestamp_get($date); 
echo $timestamp;
?>" title="" class="lasttimestamp" data-on='0' data-tai="<?php echo $timestamp;?>"></abbd>
  <div id="doan"></div>
  <div class="blockusers">
    <div class="reblockuser">
		<div class="blockgroup blockchat blockchat_usern_group">
        <div data-ui="blockchat_usern_group" class="nameblock"><span data-ui="usern_group" class="timeicon" title="Hiện thời gian chat"></span>
          <div class="clearfix"></div>
        </div>
        <div class="fullchat">
          <div class="fullchat2">
            <div class="scrollbar1 content_usern_group">
              <div class="scrollbar">
                <div class="track">
                  <div class="thumb">
                    <div class="end"></div>
                  </div>
                </div>
              </div>
              <div class="viewport viewport_usern_group" style="height:56%;overflow: auto;">
                <div class="overview">
                  <div id="cmt_content_usern_group">
                    <div id="comment_content_usern_group"></div>
                    <div style="display:none" id="comment_content_num_usern_group">0</div>
                    <div class="ajaxlast">
                      <div class="viewmore">Xem thêm tin nhắn cũ</div>
                      <span class="loading-chat"></span></div>
                      <div class="chattime"><div class="chattime2"><abbd class="chatlivetimestamp" data-utime="<?php echo $timestamp; ?>"></abbd></div></div>
                    <?php
$congroup=mysqli_connect("localhost","root","rootfaceseo@#","chatgroup") or die("Không kết nối được");
mysqli_set_charset($congroup, "utf8");					
$query='SELECT iduser1 as id,username1 as username,msg,time_chat,timestamp FROM chattext WHERE iduser2 ="group" order by timestamp desc limit 0,5';
$data=mysqli_query($congroup,$query);
$i=0;
$lr='left';
 $html='';
 while($row=mysqli_fetch_array($data))
{ 

	$thoigianchat=date('h:i A',$row['timestamp']);
	
	if($row['id']!=$idben){
		  if($lr=='right')$lr='left';
		  else $lr='right';
	}
	$idben=$row['id'];
	$html='<div class="chattime">
    <div class="chattime2"><abr class="chatlivetimestamp" data-utime="'.$row['timestamp'].'">0</abr></div>
  </div>
  <div class="commentbox comment'.$lr.'">
    <div class="commentthumb thum-'.$lr.'">
      <div class="commentline"></div>
      <a role="button" href="#" data-hover="tooltip" class="usern" data-username-show="'.$row['username'].'" usern="usern_'.$row['id'].'" aria-label="'.$row['username'].'"><img class="thumbimg" src="https://graph.facebook.com/'.$row['id'].'/picture"></a></div>
    <div class="messages m'.$lr.'">
      <div class="infomsg"><span class="hidden_div"><a role="button" rel="dialog" href="#"><span class="fcg">Báo sai phạm</span></a></span><span class="timestamp">'.$row['time_chat'].'</span></div>
      <div data-utime="'.$row['timestamp'].'" data-jsid="message" class="msgcontent"><span>
        <div>
          <div class="chati2">'.$thoigianchat.'</div>
          <div class="text'.$lr.'">'.$row['msg'].'</div>
        </div>
        </span></div>
    </div>
  </div>'.$html;
	?>
                    <?php }
mysqli_close($congroup);
			echo $html;	  
				  
				  ?>
                  </div>
                </div>
              </div>
              <div class="borderchat boxchatvip"><div class="chuachat">
                <textarea class="chaten scriptBox textareanew" onkeydown="run_with(this);" data-itime="0" data-ui="usern_group" placeholder="Viết nội dung chat" style="height:15px;direction: ltr;"></textarea>
                </div>
                <div style="position:absolute;right:0; bottom:0" class="khungicon">
                <div data-ui="usern_group" class="showicons"></div>
                <div class="iconchose iconchose_usern_group"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="onoffchatgroup" title="Ẩn hiện khung chat group"></div>
      <div class="userslist">
        <?php 
	$m=array();	
foreach($useronline as $user):
	
	if($user['id']!=$useractive['id']){
		$m[]=$user['id'];
		echo '<p><span class="icon-online"></span>';
		echo '<img src="https://graph.facebook.com/'.$user['id'].'/picture">';
		echo '<a class="usern" rel="ignore" role="" data-username-show="'.$user['username'].'" data-usern="usern_'.$user['id'].'" usern="usern_'.$user['id'].'">';
	    echo $user['username'].'</a></p>';
	}
	
endforeach;
?>
        
      </div>
      <div class="listsearchuser"></div>
      <div class="searchbox">
        <input type="text" class="searchinput" name="searchuser" value="" placeholder="Tìm kiếm" />
      </div>
      </div>
  </div>
  <div class="chatfull"> </div>
</div>
<div style="clear:both"></div>
<div class="iconschat">
  <?php for($i=1;$i<21;$i++){?>
  <div class="icon-class-click" data-img='<?php echo $homepathchat;?>icon/icon-<?php echo $i?>.png'>
  <img src="<?php echo $homepathchat;?>icon/icon-<?php echo $i?>.png" />
  </div>
  <?php }?>
</div>
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
<script>$.noConflict();</script> 
<script src="<?php echo $homepathchat;?>js/chat.js"></script> 
<span id="playsound"></span>
<div id="bgiconex"></div>
<?php /*?><script type="text/javascript" src="js/chung.js"></script><?php */?>
<?php } }else{
 $_SESSION['timelogin']=0;	
 echo 'chưa có ID';	
	
}
// $userfull=$fchat->getUsers();
// for($i=0;$i<count($userfull);$i++){
	// echo $userfull[$i]['username'].'- ID:'.$userfull[$i]['id'].'</br>';
// }

?>
<div style="z-index: 9998; display:none" class="modal-overlay modalOverlay"></div>
<div style="z-index: 9999; position: fixed; top: 50%; left: 50%; height:150px;width:300px;display:none" class="modal-window modalWindow modalContent modal-compare">
  <div class="compare-items-wrapper"></div>
  <span class="close-btn closeButton" style="cursor:pointer"></span> </div>
