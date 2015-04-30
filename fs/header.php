<?php
if(!isset($_SESSION)){
    session_start();
}
require_once("definelocal.php");
require_once("user.php");
?>

<div id="pagelet_bluebar" data-referrer="pagelet_bluebar">
  <div id="blueBarHolder" class="slim">
    <div id="blueBar" class="fixed_elem">
      <div id="pageHead" class="clearfix _5bfg" role="banner">
        <div id="headleft"> 
			<div class="logo"><a href="http://localhost/<?php echo DOMAIN;?>"   > <img src="http://localhost/<?php echo DOMAIN;?>/images/css/logo-faceseo.png"/> </a>
			</div>        
		</div>        
        <div id="headright">
			
          <div class="rfloat menu">
				<div id='cssmenu'>
					<ul>
					   <li><a href='#'>Giới thiệu</a></li>
					   <li class='active has-sub' ><a href='#'>Trợ giúp</a>
							<ul>
									<li><a href='#'>Hotline: 0932523569</a></li>
									<li><a href='#'>Mail: ndnhu@faceseo.vn</a></li>				
							</ul>
						</li>
					   <li class='has-sub'><a href='#'>Dịch vụ</a>
						  <ul>
							  <li><a href='#'>SEO</a></li>
								   <li><a href='#'>DESIGN</a></li>
								   <li><a href='#'>ADWORDS</a></li>
								   <li><a href='#'>FACEBOOK ADS</a></li>
								   <li><a href='#'>SECURITY WEB</a></li>
								   <li><a href='#'>TRAINNING SEO</a></li> 
						  </ul>
					   </li>
					   
					   <li class='has-sub'><a href='#'>Ngôn ngữ</a>
							<ul>
								 <li><a href='#'>Anh</a></li>
								 <li><a href='#'>Pháp</a></li>
								 <li><a href='#'>Đức</a></li>
							</ul>
					   </li>
					</ul>
				</div>
          </div>
		
		<div class="rfloat usertop">
				<div class ="rfloat userimgtop">
					<a class="avataruser" href="<?php echo $logoutUrl; ?>" title="CLICK LOGOUT, TẮT TRÌNH DUYỆT"><img width="95%" src="https://graph.facebook.com/<?php echo $_SESSION['session-user'];?>/picture"></a>
					<div style="position:absolute;bottom:4px; right:2px;"><img src="http://<?php echo DOMAIN;?>/images/button/logout.png" ></div>
				</div>
				<div class ="rfloat usernametop">
				<?php echo $_SESSION['session-name'];?>
				</div>
				
			</div>
		
	   </div>
      </div>
    </div>
  </div>
</div>
