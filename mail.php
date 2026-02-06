<?php

//jsで送られてきたデータを受け取り、変数に入れます。
//PHPでは変数の書き方は$と文字列となります。
$emailArea = htmlspecialchars($_POST['email'], ENT_QUOTES);
$fullNameArea = htmlspecialchars($_POST['fullName'], ENT_QUOTES);
$kanaArea = htmlspecialchars($_POST['kana'], ENT_QUOTES);
$messageArea = htmlspecialchars($_POST['message'], ENT_QUOTES);
$categoryArea = htmlspecialchars($_POST['category'], ENT_QUOTES);
$companyArea = htmlspecialchars($_POST['company'], ENT_QUOTES);
 
//以下はメールを送るための1セットのソースコードだと思ってください。
//まずは文字コードを日本語,UTF-8に設定します。
header("Content-Type:text/html; charset=UTF-8");
mb_language("japanese");
mb_internal_encoding("utf-8");
 
//送信先のメールアドレスを変数に入れておきます。
//ただ、変数という箱に入れただけでこれで送れるとかではありません。
$mail="noreply@flat-base.jp";
$atesaki="t-kaneko@flat-base.jp";
//タイトルを変数に入れておきます。
$sub1="[自動返信] お問合せが完了しました";
//$emailAreaとは、ユーザーが入力したメールアドレスです。
//$mail_toという変数に入れて、送る時に使います。
$mail_to = $emailArea;
 
//メールの本文を書きます。
//改行しながら変数に一行ずつ書いていきましょう。
$messegeall = "";
$messegeall .= "お問合せありがとうございます。\n";
$messegeall .= "以下の内容でお問い合わせを受け付けいたしました。\n";
$messegeall .= "\n";
$messegeall .= "─登録内容の確認─────────────────\n";
$messegeall .= "\n";
$messegeall .= "お名前：".$fullNameArea."\n";
$messegeall .= "フリガナ：".$kanaArea."\n";
$messegeall .= "会社名：".$companyArea."\n";
$messegeall .= "メールアドレス：".$emailArea."\n";
$messegeall .= "お問合せ種類:".$categoryArea."\n";
$messegeall .= "お問合せ内容:".$messageArea."\n";
$messegeall .= "\n";
$messegeall .= "─────────────────────────\n";
$messegeall .= "\n";
$messegeall .= "※このメールはシステムからの自動送信です。\n";
$messegeall .= "このメールへの返信はできませんのでご了承ください。\n";
$messegeall .= "\n";
 
//ここでメールを送信します。
//下記のフォーマットの該当箇所にデータの入った変数をいれましょう。
//$success1=mb_send_mail(送り先メアド,タイトル,メッセージ内容,"From:".送り元メアド);
//しかし、これだけでは「自動返信メール」が届きません。
$success1=mb_send_mail($mail_to,$sub1,$messegeall,"From:".$mail);
//自動返信メールは送り先メアドと、送り元メアドを交換すると送れます。
$success2=mb_send_mail($atesaki,$sub1,$messegeall,"From:".$mail);


 
//最後はjsonという形で送信メッセージをjsに戻します。
header('Content-type: application/json');
echo json_encode( "送信が完了しました！" );
 
?>