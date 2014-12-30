
<form name="frm" method="post" action="" id="fileupload" enctype="multipart/form-data">
  <div id="thanh" style="border:1px solid #ccc; width:400px; overflow:hidden; padding:10px;">
    <div style="border-bottom:1px dotted #ccc; width:100%;">
      <textarea style="border:none; width:387px;resize: none; overflow:hidden;vertical-align: bottom;direction: ltr;min-height: 48px;white-space: pre-wrap;word-wrap: break-word;letter-spacing: normal;
word-spacing: normal;
text-transform: none;
text-indent: 0px;
text-shadow: none;
display: inline-block;
text-align: start;zoom: 1;" role="textbox" name="textcomment" id="textcomment"></textarea>
    </div>
    <p style="text-align:center;"><span id="cho"></span></p>
    <div id="des"></div>
    <div id="imgdiv" style="clear:both;">
      <div class="container">
        <div class="row fileupload-buttonbar">
          <div class="span5 fileupload-progress fade">
            <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
              <div class="bar" style="width:0%;"></div>
            </div>
            <div class="progress-extended">&nbsp;</div>
          </div>
        </div>
        <table role="presentation" class="table table-striped">
          <tbody class="files">
          </tbody>
        </table>
        <br>
      </div>
    </div>
    <div id="buttonpos" style="clear:both">
      <div class="_1dsp _4-">
        <div class="clearfix">
          <div class="_52lb _3-7 lfloat">
            <div>
              <div id="u_1w_m" class="lfloat"><a id="u_0_z" title="Đánh dấu người trong bài đăng của bạn" aria-label="Đánh dấu người trong bài đăng của bạn" role="button" data-gt="{&quot;composer&quot;:{&quot;comp&quot;:&quot;people&quot;,&quot;ua_id&quot;:&quot;composer:post&quot;}}" href="#" class="_1dsq _1dsv"><span class="_1dsr"><span class="_4-px ellipsis">Đính tên người</span></span></a></div>
              <div id="u_1w_o" class="lfloat">
                <div id="composerCityTagger" class="_6a _zg _1dsq"><a id="u_1w_p" aria-label="Thêm địa điểm vào bài đăng" title="Thêm địa điểm vào bài đăng" role="button" href="#" class="_y9"><span class="_1dst"><span class="_4-px ellipsis">Thêm địa điểm vào bài đăng</span></span>
                  <div class="_6a _1dsu">
                    <div style="height:30px" class="_6a _6b"></div>
                    <div class="_6a _6b"><span class="_y8"></span></div>
                  </div>
                  </a><a id="u_1w_q" title="Xóa" rel="async-post" ajaxify="/ajax/places/toggle_location_sharing?disable=1&amp;session_id=1376211657" role="button" href="#" class="_4_z3 uiCloseButton uiCloseButtonSmall"></a>
                  <input type="hidden" id="u_1w_r" name="composertags_city" autocomplete="off">
                  <input type="hidden" id="u_1w_s" value="false" name="disable_location_sharing" autocomplete="off">
                  <input type="hidden" value="108458769184495" name="composer_predicted_city" autocomplete="off">
                </div>
              </div>
              <div id="u_1w_n" class="lfloat">
                <div id="u_0_13" class="_6a _m _1dsq _1dsw"><a id="u_0_14" rel="ignore" role="presentation" class="_1dsr"><span class="_4-px ellipsis">Thêm hình ảnh</span>
                  <div class="_3jk">
                   
                    <input type="file" name="files[]" class="_n _5f0v" id="fileimg">
                  </div>
                  </a></div>
                <div class="span7" style="display:none;"> <span class="fileupload-loading"></span> </div>
              </div>
            </div>
          </div>
          <ul class="uiList _1dso rfloat _509- _4ki _6-h _6-j _6-i">
            <li>
              <button type="button" class="_42ft _42fu _11b selected _42g- postbutton" value="1">Đăng</button>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div id="noidungpost"></div>
  </div>
</form>