<?php
echo phpinfo();

$dsn = 'mysql:host=db;dbname=quizy;charset=utf8';
$user = 'asaka';
$password = 'password';


try {
    $pdo = new PDO($dsn, $user, $password);
    // $stmt = $pdo->query("SELECT * FROM questions" );
    // $posts = $stmt->fetchAll();

    $stmt = $pdo->query("SELECT * FROM choices");
    $posts = $stmt->fetchAll();
    echo "接続成功\n";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}