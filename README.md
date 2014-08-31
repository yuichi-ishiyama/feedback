test-github4mac-A
=================

Github for Mac のテスト

フィードバックの保存

詳しくは下記参照

https://yuichi-ishiyama.com/Apache_Module/GetJson.php

[使用方法]

1)ソースコードをダウンロードしApache_Moduleディレクトリをサイトのルートに配置する

2)以下の設定の通りに権限を設定する

3)pagespeed.php, deflate.php, mod_cache.php, mod_expires.php の各ページでフィードバックを送信する

[設定]

Apache_Moduleの権限を設定する

  # chmod 777 Apache_Module

result

drwxrwxrwx ... Apache_Module

/

-rw-r--r-- ... GetJson.php

drwxr-xr-x ... css

-rw-r--r-- ... deflate.php

drwxr-xr-x ... js

-rw-r--r-- ... mod_cache.php

-rw-r--r-- ... mod_expires.php

-rw-r--r-- ... pagespeed.php

-rw-r--r-- ... write.php

/

以上の通りfeddback_logディレクトリがもとからない場合は作成する

  # mkdir feedback_log

  # chmod 777 feedback_log

result

drwxrwxrwx ... feedback_log

or 

drwxrwxrwx 2 root   root  ... feedback_log

※既に作成されている場合はapacheの権限で実行される

drwxr-xr-x 2 apache apache ... feedback_log

/

書き込みを実行すると以下の通りfeedback.jsonとその日の一時ファイルが作成される

-/Apache_Module/

-rw-r--r-- 1 apache apache ... feedback.json

-/Apache_Module/feedback_log/

-rw-r--r-- 1 apache apache ... 2014 2014_03_11.json

「failed to copy $file...」とエラーが表示される場合は
feedback.json とその日の一時ファイルが apache 権限になっているか確認してください。
