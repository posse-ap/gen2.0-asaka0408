<?php
$dsn = 'mysql:host=mysql;dbname=posse;charset=utf8;';
$user = 'posse_user';
$password = 'password';

try {
  $db = new PDO($dsn, $user, $password);
  // データベースから上で定義した名前でデータを取ってくる
  // サーバーの接続を確立させる。引数が、オプション、ユーザーネーム、password
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // エラーが起きた時にcatchに回すための設定
} catch (PDOException $e) {
  // 上のが失敗したときの例外処理
  echo '接続失敗: ' . $e->getMessage();
  // ’接続失敗’と表示させる
  exit();
  // 処理を終わりにする
}
