<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1">
<title>mod_pagespeed_page</title>
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
}
#w{
	width:550px;
}
}
-->
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="js/feedback.js"></script>
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
<header id="header"><a href="../index.php">戻る</a> -Apache module <span style="border-bottom:2px solid #3567B7"><a href="pagespeed.php">mod_pagespeed</a></span> / <a href="deflate.php">mod_deflate</a> / <a href="mod_expires.php">mod_expires</a> / <a href="mod_cache.php">mod_cache</a>
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
  <p>[mod_pagespeed]</p>
  <p><a href="https://developers.google.com/speed/pagespeed/module/configuration">詳細</a></p>
  <p>ソースをダウンロード<br>
  # wget https://dl-ssl.google.com/dl/linux/direct/mod-pagespeed-stable_current_x86_64.rpm</p>
  <p>作業フォルダ作成<br>
  # mkdir mod-pagespeed</p>
  <p>ソースをフォルダに移動<br>
  # mv mod-pagespeed-stable_current_x86_64.rpm ./mod-pagespeed/</p>
  <p>インストール開始<br>
  # cd mod-pagespeed<br>
  # rpm -U mod-pagespeed-*.rpm</p>
  <p>警告: mod-pagespeed-stable_current_x86_64.rpm: ヘッダ V4 DSA/SHA1 Signature, key ID 7fac5991: NOKEY<br>
  job 1 at 2013-06-30 01:18</p>
  <p>インストール完了<br>
    mod_pagespeed.so<br>
  mod_pagespeed_ap24.so<br>
  が /etc/httpd/modules にインストールされた。</p>
  <p>ベンチマーク開始<br>
    # ab -n 100 -c 10 http://yuichi-ishiyama.com/<br>
    This is ApacheBench, Version 2.3 &lt;$Revision: 655654 $&gt;<br>
    Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/<br>
  Licensed to The Apache Software Foundation, http://www.apache.org/</p>
  <p>Benchmarking yuichi-ishiyama.com (be patient).....done<br>
  </p>
  <p>Server Software:        Apache<br>
    Server Hostname:        yuichi-ishiyama.com<br>
    Server Port:            80</p>
  <p>Document Path:          /<br>
    Document Length:        14019 bytes</p>
  <p>Concurrency Level:      10<br>
    Time taken for tests:   30.875 seconds<br>
    Complete requests:      100<br>
    Failed requests:        0<br>
    Write errors:           0<br>
    Total transferred:      1425100 bytes<br>
    HTML transferred:       1401900 bytes<br>
    Requests per second:    3.24 [#/sec] (mean)<br>
    Time per request:       3087.538 [ms] (mean)<br>
    Time per request:       308.754 [ms] (mean, across all concurrent requests)<br>
    Transfer rate:          45.07 [Kbytes/sec] received</p>
  <p>Connection Times (ms)<br>
    min  mean[+/-sd] median   max<br>
    Connect:        0    0   0.8      0       4<br>
    Processing:     5 3053 8342.3    281   27938<br>
    Waiting:        4 3053 8342.4    280   27938<br>
    Total:          6 3054 8342.5    281   27939</p>
  <p>Percentage of the requests served within a certain time (ms)<br>
    50%    281<br>
    66%    415<br>
    75%    493<br>
    80%   1204<br>
    90%  27926<br>
    95%  27933<br>
    98%  27937<br>
    99%  27939<br>
    100%  27939 (longest request)</p>
  <p>mod_pagespeedの設定内容確認<br>
  # vi /etc/httpd/conf.d/pagespeed.conf</p>
  <p>ModPagespeed on←onを確認</p>
  <p>apacheを再起動<br>
    # service httpd restart
  </p>
  <p>再起動後に、先ほどと同じく検証</p>
  <p># ab -n 100 -c 10 http://yuichi-ishiyama.com/<br>
    This is ApacheBench, Version 2.3 &lt;$Revision: 655654 $&gt;<br>
    Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/<br>
  Licensed to The Apache Software Foundation, http://www.apache.org/</p>
  <p>Benchmarking yuichi-ishiyama.com (be patient).....done<br>
  </p>
  <p>Server Software:        Apache<br>
    Server Hostname:        yuichi-ishiyama.com<br>
    Server Port:            80</p>
  <p>Document Path:          /<br>
    Document Length:        10280 bytes</p>
  <p>Concurrency Level:      10<br>
    Time taken for tests:   0.603 seconds<br>
    Complete requests:      100<br>
    Failed requests:        90<br>
    (Connect: 0, Receive: 0, Length: 90, Exceptions: 0)<br>
    Write errors:           0<br>
    Total transferred:      1195925 bytes<br>
    HTML transferred:       1170325 bytes<br>
    Requests per second:    165.93 [#/sec] (mean)<br>
    Time per request:       60.265 [ms] (mean)<br>
    Time per request:       6.026 [ms] (mean, across all concurrent requests)<br>
    Transfer rate:          1937.94 [Kbytes/sec] received</p>
  <p>Connection Times (ms)<br>
    min  mean[+/-sd] median   max<br>
    Connect:        0    0   0.2      0       1<br>
    Processing:    15   59  42.4     39     162<br>
    Waiting:       14   59  42.6     39     162<br>
    Total:         15   59  42.6     40     162</p>
  <p>Percentage of the requests served within a certain time (ms)<br>
    50%     40<br>
    66%     45<br>
    75%     62<br>
    80%    111<br>
    90%    136<br>
    95%    155<br>
    98%    162<br>
    99%    162<br>
    100%    162 (longest request)</p>
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

