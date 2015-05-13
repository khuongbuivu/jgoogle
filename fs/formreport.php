<div class="formreport" style="display: none;">
	<div class="sharepoint-wrapper">
		<div class="sharepoint-content">
			
			<h3>Báo cáo nội dung vi phạm</h3>
			<form method="post" action="sharepoint.php" id="freport">
				<label for="usernamerp">
					Nhập tên:
					<!-- <input type="text" name="nametoshare" id="username" placeholder="@Linh Nguyen" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />-->
					<input type="hidden" class="rpidPost" value="">
					<input type="hidden" class="rpmentionsHidden0000" value="">
					<div id="fslisttags0000" class="namereceivepoint"><div class="boxtagfullsecond"><div contenteditable="true" data-ph="@Linh Nguyen" data-he="cmt-content0000" class="content-namereceivepoint tagnameboxinput" id="rpcontentbox0000"></div><div id="display0000" class="boxtag"></div><div id="msgbox"></div></div></div>
				</label>
				<input type="radio" name="typereport" value="2"> Nội dung Sex<br>
				<input type="radio" name="typereport" value="3"> Tin liên quan chính trị<br>
				<input type="radio" name="typereport" value="4"> Không có keywords<br>				
				<input type="radio" name="typereport" value="5"> Thường xuyên spam<br><br>
				<button type="button" class="sendreport">Gửi</button>
				<button type="button" class="closerp">Hủy</button>
				
			</form>
		</div>
	</div>
</div>