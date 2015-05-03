<?php
$homepathchat='http://localhost/faceseo.vn/fchat/';
if(!isset($_SESSION)){
    session_start();
}
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
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
	
	?>
<div class="bodychat">
<div data-ida="<?php echo $_SESSION['session-user']; ?>" class="userac"></div>
  <abbd data-ltime="<?php 
echo date_timestamp_get($date);
?>" title="" class="lasttimestamp" data-on='0'></abbd>
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
                    <?php
				  $query='SELECT atw_user.user_id as id,user_name as username,msg,time_chat,timestamp FROM chattext,atw_user WHERE iduser1=user_id and iduser2 ="group" order by timestamp desc limit 0,10';
$data=mysqli_query($con,$query);
$i=0;
$lr='left';
 $html='';
 while($row=mysqli_fetch_array($data))
{ 
/*
	$array_content_group['users'][$i]['id']=$row['id'];
	$array_content_group['users'][$i]['username']=$row['username'];
	$array_content_group['users'][$i]['thumbimg']=$row['id'];
	$array_content_group['msgs'][$i]['ib']=$row['id'];
	$array_content_group['msgs'][$i]['id']=$i;
	$array_content_group['msgs'][$i]['msg']=$row['msg'];
	$array_content_group['msgs'][$i]['timestamp']=$row['timestamp'];
	$array_content_group['msgs'][$i]['time_chat']=$row['time_chat'];
	$thoigianchat=date('h:i A',$row['timestamp']);
	$array_content_group['msgs'][$i]['giochat']=$thoigianchat;
	$i=$i+1;*/
	$thoigianchat=date('h:i A',$row['timestamp']);
	
	if($row['id']!=$idben){
		  if($lr=='right')$lr='left';
		  else $lr='right';
	}
	$idben=$row['id'];
	$html='<div class="chattime">
    <div class="chattime2"><abr class="livetimestamp" data-utime="'.$row['timestamp'].'">0</abr></div>
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

			echo $html;	  
				  
				  ?>
                  </div>
                </div>
              </div>
              <div class="borderchat">
                <textarea class="chaten scriptBox" data-itime="0" data-ui="usern_group" placeholder="Viết nội dung chat"></textarea>
                <div data-ui="usern_group" class="showicons"></div>
                <div class="iconchose iconchose_usern_group"></div>
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
        <?php /*
 $listonline=implode(',',$m);
 $user_all=$fchat->getUsers($listonline); 
foreach($user_all as $user):
	
	if($user['id']!=$useractive['id']){
		echo '<p><span class="icon-offline"></span>';
		echo '<img src="https://graph.facebook.com/'.$user['id'].'/picture">';
		echo '<a class="usern" data-username-show="'.$user['username'].'" rel="ignore" role="" data-usern="usern_'.$user['id'].'" usern="usern_'.$user['id'].'">';
	    echo $user['username'].'</a></p>';
	}
	
endforeach;
*/
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

