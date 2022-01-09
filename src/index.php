<?php
// echo phpinfo();

$dsn = 'mysql:host=db;dbname=quizy;charset=utf8';
$user = 'asaka';
$password = 'password';


try {
    $pdo = new PDO($dsn, $user, $password);
   
    $id = htmlspecialchars($_GET["id"]);
    $stmt = $pdo->prepare("SELECT * FROM prefectures WHERE id = ?"); //choices tableから取ってきてね
    // INNER JOIN questions ON prefectures.id = questions.prefecture_id
    $stmt->execute(array($id));
    $posts =$stmt->fetchAll(); 
    // echo "接続成功\n";
    print_r($posts);
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

?>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSSE課題クイジー提出用</title>
    <link rel="stylesheet" href="../css/recetCSS.css">
    <link rel="stylesheet" href="../css/kuizy.css">
</head>
<body>
    <div id="container"></div>
    
    <script src="../js/quizy_3.js"></script>
</body>
</html>