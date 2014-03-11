<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1">
<title>mod_expires_page</title>
<link href="css/apache_module.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="w">

<style type="text/css">
<!--
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
$(function() {
	$("#header a").css({
		"color" : "#666"
	});
	$("#header .link4").css({
		"border-bottom" : "2px solid #3567B7",
	});
});
</script>
<header id="header"><a href="../index.php">戻る</a> -Apache module <span class="link2"><a href="pagespeed.php">mod_pagespeed</a></span> / <span class="link3"><a href="deflate.php">mod_deflate</a></span> / <span class="link4"><a href="mod_expires.php">mod_expires</a></span> / <span class="link5"><a href="mod_cache.php">mod_cache</a></span>
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
  <p>[mod_expiresを有効にする]</p>
  <p><a href="http://httpd.apache.org/docs/2.2/mod/mod_expires.html">詳細</a></p>
  <p># vim /etc/httpd/conf/httpd.conf<br>
  LoadModule expires_module modules/mod_expires.so←モジュール確認</p>
  <p>サイトのTop directoryに.htaccessという名前でファイルを保存します。</p>
  <p>[.htaccess]</p>
  <p>example:</p>
  <p>ExpiresActive On<br>
    ExpiresDefault &quot;access plus 30 minutes&quot;<br>
    ExpiresByType text/html &quot;access plus 10 seconds&quot;<br>
    ExpiresByType image/jpg &quot;access plus 7 days&quot;<br>
    ExpiresByType image/jpeg &quot;access plus 7 days&quot;<br>
    ExpiresByType image/gif &quot;access plus 7 days&quot;<br>
    ExpiresByType image/png &quot;access plus 7 days&quot;<br>
    ExpiresByType text/css &quot;access plus 1 month&quot;<br>
    ExpiresByType application/pdf &quot;access plus 1 month&quot;<br>
    ExpiresByType text/javascript &quot;access plus 1 month&quot;<br>
    ExpiresByType application/x-javascript &quot;access plus 1 month&quot;<br>
    ExpiresByType application/x-shockwave-flash &quot;access plus 1 month&quot;<br>
  ExpiresByType image/x-icon &quot;access plus 1 month&quot;</p>
  <p>&nbsp;</p>
  <p>example1-1:</p>
  <p>cssを直後に変更するようにしたいときは下記のように変更します</p>
  <p>ExpiresByType text/css &quot;access plus 10 seconds&quot;</p>
  <p>しかし欠点としてcssのファイルの読み込みが始まるため<br>
    再びデータの読み込み量が増えます</p>
  <p>そこからまた元の &quot;access plus 1 month&quot; に戻すと<br>
    キャッシュの残骸がまた反映してしまうため<br>
    jQueryや直接スタイルシートを使用して適用しなければいけません</p>
  <p>スタイルを変更したいときは計画的にキャッシュが消去される期間を待って<br>
    確実に古いキャッシュが消去されてからcssの変更を適用するようにしましょう</p>
  <p>&nbsp;</p>
  <p>example1-2:</p>
  <p>Cookie設定時のリロードに伴いhtmlの期間を短くして確認を早く行うときは下記のように変更します<br>
    <br>
    ExpiresByType text/html &quot;access plus 5 seconds&quot;<br>
    <br>
    しかし欠点として変更した分はhtmlのファイルの読み込みが始まるため<br>
    再びデータの読み込み量が増えます</p>
  <p>リロードを伴いhtmlを動的に変更し早めに確認をしたいときは計画的に期間（経過時間）を考えて<br>
    一番利用しやすい設定を適用するようにしましょう</p>
  <p><br>
  </p>
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

