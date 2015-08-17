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
			<div class="logo"><a href="<?php echo FULLDOMAIN;?>"   > <img src="<?php echo FULLDOMAIN;?>/images/css/logo-faceseo.png"/> </a>
			</div>        
		</div>        
        <div id="headright">
			
          <div class="rfloat menu">
				<div id='cssmenu' class="menuchinh">
					<ul>
					   <li><a href="<?php echo FULLDOMAIN."/seo/faceseo-la-gi/"; ?>">Giới thiệu</a></li>
					   <li>
					   <a href="<?php echo FULLDOMAIN."/seo/faceseo-la-gi/huong-dan-su-dung-faceseo.php"; ?>">Hướng dẫn</a>
						</li>
					   <li><a href="<?php echo FULLDOMAIN."/seo/faceseo-la-gi/dich-vu-faceseo.php"; ?>">Dịch vụ</a>
					   </li>
					   <li><a href='#'>Ngôn ngữ</a></li>
					   <!--
					   <li class='has-sub'><a href='#'>Ngôn ngữ</a>
							<ul>
								 <li><a href='#'>Anh</a></li>
							</ul>
					   </li>
					   -->
					</ul>
				</div>
				<select id="m-menuchinh" onchange="window.location=this.value;">
                    <option value="<?php echo FULLDOMAIN."/seo/faceseo-la-gi/"; ?>">Giới thiệu</option>
                    <option value="<?php echo FULLDOMAIN."/seo/faceseo-la-gi/huong-dan-su-dung-faceseo.php"; ?>">Hướng dẫn</option>
                    <option value="#">--Hotline: 0932523569</option>
                    <option value="<?php echo FULLDOMAIN."/seo/faceseo-la-gi/dich-vu-faceseo.php"; ?>">Dịch vụ</option>
                    <option value="#">Ngôn ngữ</option>                   
                </select>
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
