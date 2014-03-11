<?php
$time = date('Y年m月d日H:i:s');
$file = date('Y_m_d') . ".json";
$write = "[\"" . $time . "\",\"" . $_POST['date'] . "\",\"" . $_POST['date2'] . "\",\"" . $_POST['date3'] . "\"],";

$file_name = "./feedback_log";

//ファイルが存在するかを調べる
if( !file_exists( $file_name ) ){
	mkdir( $file_name, 0777 );
}


$textfile = fopen("./feedback_log/" . $file, "a");//[./feedback_log/***.json]をオープン
fputs($textfile, $write);//書き込む（これができません。ディレクトリーにファイルがなかった場合、ファイルは作成されます）
fclose($textfile);
?>

