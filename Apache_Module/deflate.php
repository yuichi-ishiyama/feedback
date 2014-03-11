<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1">
<title>mod_deflate_page</title>
<link href="css/apache_module.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="w">

<style type="text/css">
<!--
#header a{
	color:#666;
}
@media screen and (min-width:769px){
ul{
	width:80%;
/*	padding-right:50px;*/
}	
#w{
	width:100%;
}
}

@media screen and (min-width:641px) and (max-width:768px){
body{
	font-size:15px;
	-webkit-text-size-adjust:100%;
}
ul{
	width:80%;
/*	padding-right:50px;*/
}
#w{
	width:100%;
}
}

@media screen and (max-width: 640px){
body{
	font-size: 18px;
	-webkit-text-size-adjust:100%;
}
ul{
	width:450px;
/*	padding-right:50px;*/
}
#w{
	width:550px;
}
}
-->
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="js/feedback10.js"></script>
<script type="text/javascript">
$(function() {
    var topBtn = $('#header');   
    //最初はボタンを隠す
    topBtn.hide();
    //スクロールが300に達したらボタンを表示させる
    $(window).scroll(function () {
        if ($(this).scrollTop() > 30) {
            topBtn.slideDown(10);
        } else {
            topBtn.slideUp(20);
        }
    });
        return false;
});
</script>
<header id="header"><a href="../index.php">戻る</a> -Apache module <a href="pagespeed.php">mod_pagespeed</a> / <span style="border-bottom:2px solid #3567B7"><a href="deflate.php">mod_deflate</a></span> / <a href="mod_expires.php">mod_expires</a> / <a href="mod_cache.php">mod_cache</a>
</header><!-- /header"-->

<div id="feedback">
<form name="chat" onsubmit="send();return false" method="POST">
<textarea id="cancelEnter" rows="16" cols="40" maxlength="400" name="text" class="text" placeholder="<?php print("[http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . "]\n"); print("[yes]\n"); print("フィードバックがあれば以下に内容を記入してください\n\n");?>"></textarea><br>
<input type="hidden" name="text2" class="text2" value="<?php print("[http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . "]");?>">
<input type="hidden" name="text3" class="text3" value="<?php print("[yes]");?>">
<div class="submit">回答する</div><div class="box">無視する</div>
</form>
</div>
<div id="feedback_no">
<form name="chat2" onsubmit="send2();return false" method="POST">
<textarea id="cancelEnter2" rows="16" cols="40" maxlength="400" name="text_no" class="text_no" placeholder="<?php print("[http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . "]\n"); print("[no]\n"); print("フィードバックがあれば以下に内容を記入してください\n\n");?>"></textarea><br>
<input type="hidden" nome="text2_no" class="text2_no" value="<?php print("[http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . "]");?>">
<input type="hidden" name="text3_no" class="text3_no" value="<?php print("[no]");?>">
<div class="submit_no">回答する</div><div class="box">無視する</div>
</form>
</div>

<div style="margin-left:10px;"><p>this is test page.ver.5</p>
<p><a href="../index.php">戻る</a></p></div>
<div class="ul">
<ul>
  <p>mod_deflateを使用して、Webサーバーからファイルを圧縮して送信</p>
  <p><a href="http://centossrv.com/apache-deflate.shtml">詳細</a></p>
  <p># vi /etc/httpd/conf.d/deflate.conf</p>
  <p>&lt;Location /&gt;</p>
  <p># DEFLATEの有効化<br>
    AddOutputFilterByType DEFLATE text/html text/plain text/xml <span style="color:green;">text/css text/javascript application/x-javascript application/javascript</span></p>
  <p># 送信先ブラウザがNetscape 4.xの場合はtext/htmlのみ圧縮<br>
    BrowserMatch ^Mozilla/4 gzip-only-text/html</p>
  <p># 送信先ブラウザがNetscape 4.06-4.08の場合は圧縮しない<br>
    BrowserMatch ^Mozilla/4\.0[678] no-gzip</p>
  <p># 送信先ブラウザがMSIEの場合は全て圧縮する<br>
    BrowserMatch \bMSI[E] !no-gzip !gzip-only-text/html</p>
  <p># プロキシサーバーが圧縮未対応ブラウザへ圧縮ファイルを送信しないようにする<br>
    Header append Vary User-Agent env=!dont-vary</p>
  <p>&lt;/Location&gt;</p>
  <p># /etc/rc.d/init.d/httpd reload<br>
  反映</p>
  <p>圧縮確認<br>
  <a href="http://www.gidnetwork.com/tools/gzip-test.php">タイプ１</a>　<a href="http://www.whatsmyip.org/http-compression-test/">タイプ２</a></p>
  <p>&nbsp;</p>
  <p>&nbsp;<span class="sample0">Thank you for the feedback.</span><span class="sample1">Was this page useful? - [ <span class="sample">yes</span> ] / [ <span class="sample_no">no</span> ]</span></p>

<!-- +1 ボタン を表示したい位置に次のタグを貼り付けてください。 -->
<div class="g-plusone" data-size="small" data-annotation="inline" data-width="300"></div>

<!-- 最後の +1 ボタン タグの後に次のタグを貼り付けてください。 -->
<script type="text/javascript">
  window.___gcfg = {lang: 'ja'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</ul>
</div>
</div>
</body>
</html>