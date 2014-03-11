<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no,maximum-scale=1">
<title>GetJson.php</title>
<style type="text/css">
body,td,th {
	font-size: 12px;
}

#listbox { margin:0; padding:0; border-collapse: collapse;}
#listbox th{ background:#FDF7DF;}
#listbox th,
#listbox td{ margin:0; padding:0.6em; border:1px solid #999; border-collapse: collapse;}

</style>
</head>

<body>
<?php
$file = "./feedback_log/" . date('Y_m_d') . ".json";

if(file_exists($file)){
	$value = file_get_contents($file);
	/* $value から 末尾',' を削除します */
	$value01 = "[" . substr($value, 0, -1) . "]";
	
	//$value01から改行文字を削除します追加（2014/03/11） 
	// 改行文字配列
	$linefeed = array("\r\n", "\n", "\r");
	// 置き換え後の<br>配列
	$html_br = array("<br>", "<br>", "<br>");
 
	$new = str_replace($linefeed, $html_br , $value01);
	//追加（2014/03/11） 
	

	$newfile = "feedback.json";
	copy($file, $newfile);
	if (!copy($file, $newfile)) {
	    echo "failed to copy $file...\n";
	}

	$write = "[".$new."]";
	file_put_contents( $newfile, $new );
}else{
	echo "A file does not exist. \n";
}
?>

this is test page.ver.5<br>
<p><a href="../index.php">戻る</a></p>
<ul>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">

$(function() {
$.getJSON("feedback.json", function(feedback){
var wak = "";
for (i = 0; i < feedback.length; i++) {
wak += "<tr>\n";
for (j = 0; j < feedback[i].length; j++) {
wak += "<td>";
wak += feedback[i][j];
wak += "</td>\n";
}
wak += "</tr>\n";
}
$("#listbox").append(wak);
});

});

</script>
<table id="listbox">
	<tr>
		<th>日時</th>
		<th>feedback</th>
		<th>ページURL</th>
		<th>評価</th>
	</tr>
</table>
<p>※注意１　textareの入力時に改行をしないようすること。（改行が含まれる状態のままでは読み込みができないためkeydownイベントの監視等を活用する）</p>
<p>※注意２　またキャッシュを有効にした状態ではデータを更新しようとしても初期のデータ更新からは<br>
  キャッシュ削除に相当する期間が経過するまでは変更が利かなくなるので注意をする</p>
<p>※注意３　テスト等でページを頻繁に更新する場合は、<span style="color:#090;">mod_cache</span> の <span style="color:#090;">CacheDefaultExpire</span>、<span style="color:#090;">CacheMaxExpire</span> を設定すると直後に更新できない</p>
<p>※注意４　ローカルでは正常動作を確認できたが、なぜかリモートではjQueryを設定した後に動作に不具合が発生した<br>
  jQueryを使用しているため見た目の動作だけは確認することができたがバックグラウンド動作（フォームによるデータの送信など）は正常な動作を確認できない<br>
はじめは改行処理の不具合が発生。２つ目はajaxによる送信の不具合。３つめは渡されたデータをphpでファイルに保存する動作不具合が発生した<br>
現在、原因と対処方法は不明（2013/12/14）</p>
<p>result:</p>
<p>想定される主な原因は第一にキャッシュを有効にしていることが起因してると思われる<br>
その証拠としてキャッシュをクリアした後に正常な動作が確認されたことが何度かある    </p>
<p>javascriptやphpのファイルはhtmlファイルと違ってバックグラウンドで保存されている以前のキャッシュの影響を受けていることが考えられる<!--<p>※注意４　mod_expires や mod_cache の CacheDefaultExpire、CacheMaxExpire を設定しているときでも<br>
jQuery を用いて css を編集することで、編集内容を直後に更新できることが確認できた</p>--></p>
<p>つまり頻繁に更新をしたりテストをしたりするサイトではキャッシュを有効にしたりプロキシを用いることは不向きであるといえる</p>
<p>データの変更が行われず追加や削除の影響をうけないサイトにキャッシュやプロキシを設定することによって絶大な効果があるといえる</p>
<p>&nbsp;</p>
</ul>
</body>
</html>

