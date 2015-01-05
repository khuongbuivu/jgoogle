<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("user.php");
?>

<div id="pagelet_bluebar" data-referrer="pagelet_bluebar">
  <div id="blueBarHolder" class="slim">
    <div id="blueBar" class="fixed_elem">
      <div id="pageHead" class="clearfix _5bfg" role="banner">
        <div id="headleft"> <a href="http://faceseo.vn" > <img src="http://faceseo.vn/images/css/logo-faceseo.png"/> </a> </div>        
        <div id="headNav" class="clearfix">
          <div class="rfloat">
            <ul id="pageNav" class="clearfix _5bfw" role="navigation">
              <li id="navJewels" class="navItem">
                <div id="jewelContainer" class="notifNegativeBase notifCentered notifGentleAppReceipt">
					<div id="fsAnaylyticsButton" class="uiToggle fbJewel west"> <a class="avataruser"> <img src="https://graph.facebook.com/<?php echo $_SESSION['session-user'];?>/picture"></a> </div>
                  <div id="fsAnaylyticsButton" class="uiToggle fbJewel west"> <a class="jewelButton icon-view"> <i class="jewelButtonHcm img sp_2al3zc sx_c49c9a"></i> <span id="anaylyticsCountWrapper" class="jewelCount"><span id="anaylyticsCountValue">99+</span></span> </a> </div>
                  <div id="fbNotificationsJewel" class="uiToggle fbJewel west"> <a class="jewelButton icon-comment"> <i class="jewelButtonHcm img sp_2al3zc sx_c49c9a"></i> <span id="notificationsCountWrapper" class="jewelCount"><span id="notificationsCountValue">1</span></span> </a> </div>
                  <div id="iconmessagebutton" class="uiToggle fbJewel west"> <a class="jewelButton icon-message"> <i class="jewelButtonHcm img sp_2al3zc sx_c49c9a"></i> <span id="messageCountWrapper" class="jewelCount"><span id="iconmessageCountValue">1</span></span> </a> </div>
                  <div id="iconemailbutton" class="uiToggle fbJewel west"> <a class="jewelButton icon-email"> <i class="jewelButtonHcm img sp_2al3zc sx_c49c9a"></i> <span id="emailCountWrapper" class="jewelCount"><span id="iconemailCountValue">1</span></span> </a> </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
