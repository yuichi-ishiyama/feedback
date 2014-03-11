<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1">
<title>mod_cache_page</title>
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
<header id="header"><a href="../index.php">戻る</a> -Apache module <a href="pagespeed.php">mod_pagespeed</a> / <a href="deflate.php">mod_deflate</a> / <a href="mod_expires.php">mod_expires</a> / <span style="border-bottom:2px solid #3567B7"><a href="mod_cache.php">mod_cache</a></span>
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
  <p>[mod_cacheを有効にする]</p>
  <p><a href="http://httpd.eu.apache.org/docs/trunk/en/mod/mod_cache.html">詳細</a></p>
  <p># vi /etc/httpd/conf/httpd.conf<br>
    LoadModule cache_module modules/mod_cache.so←モジュール確認<br>
    LoadModule disk_cache_module modules/mod_disk_cache.so←モジュール確認 </p>
  <p>mod_cacheを使用して、Webサーバーからキャッシュを利用する </p>
  <p># vi /etc/httpd/conf.d/cache.conf</p>
  <p>example:</p>
  <p>&lt;IfModule mod_cache.c&gt;<br>
    &lt;IfModule mod_disk_cache.c&gt;<br>
    CacheIgnoreCacheControl On<br>
    CacheIgnoreNoLastMod On<br>
    CacheIgnoreHeaders Set-Cookie<br>
    CacheEnable disk /<br>
  CacheRoot /var/www/cache<br>
  CacheDefaultExpire 86400<br>
CacheMaxExpire 604800<br>
    &lt;/IfModule&gt;<br>
  &lt;/IfModule&gt;  </p>
  <p>[キャッシュを保存するディレクトリを作成]</p>
  <p># mkdir /var/www/cache<br>
  # chmod 777 /var/www/cache</p>
  <p># service httpd restart</p>
  <p>[キャッシュを無効にしてからクリアする]</p>
  <p>// キャッシュを無効にする<br>
    # cd /var/www<br>
    # chmod 700 cache
    <br>
    // キャッシュをクリアする<br>
    # cd cache<br>
    # rm -rf *</p>
  <p># service httpd restart</p>
  <p> [キャッシュを有効にする]</p>
  <p>// キャッシュを有効にする<br>
    # cd /var/www<br>
    # chmod 777 cache
  </p>
  <p># service httpd restart</p>
  <p>&nbsp;</p>
  <div style="background-color:#FF9;padding:10px;border-radius:10px;">
  <h2>[point]</h2>
  <h3>Point1 キャッシュを定期的に削除する。</h3>
  <p>- キャッシュは元のデータとは違うのでいつでも削除できます。
    いつもよりサーバーの動作が遅くなったり、動作がおかしくなったときはキャッシュのクリアを試みましょう。</p>
  <h2>[メンテナンス]</h2>
  <h3>１週間おきにキャッシュを削除する</h3>
  <p>- キャッシュの削除をするコマンドを作成します</p>
  <p>eg.</p>
  <p># vi cache-clear</p>
  <div style="border:1px solid #666;width:70%;border-radius:5px;padding:10px;margin:10px;">
  <p>#!/bin/bash</p>
  <p>cd /var/www<br>
    chmod 700 cache<br>
    cd cache<br>
    rm -rf *<br>
    cd /var/www<br>
    chmod 777 cache  </p>
  <p>echo &quot;cache was cleared`date +%Y%m%d`&quot; &gt;&gt; /var/www/html/cache-cleared.log</p>
  <p>service httpd restart</p></div>
  
  <p># mv cache-clear /etc/cron.weekly/<br>
    # cd /etc/cron.weekly/<br>
    # chmod 755 cache-clear</p></div>
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