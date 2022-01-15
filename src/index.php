<?php
// echo phpinfo();
$dsn = 'mysql:host=db;dbname=quizy;charset=utf8';
$user = 'asaka';
$password = 'password';

try {
  $db = new PDO($dsn, $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo '接続成功';
} catch (PDOException $e) {
  echo '接続失敗: ' . $e->getMessage();
  exit();
}

// $stmt = $pdo->prepare("SELECT * FROM prefectures INNER JOIN questions ON prefectures.id = questions.prefecture_id"); //questions tableから取ってきてね





if (isset($_GET["id"])) {
  $id = $_GET["id"];
  // echo $id;
}

$prefectures_value = "SELECT * FROM prefectures WHERE id = $id";
$questions_value =  "SELECT * FROM questions INNER JOIN prefectures ON questions.prefecture_id = $id";
$selections_value = "SELECT * FROM selections INNER JOIN questions ON selections.question_id = questions.id where prefecture_id = $id";

$prefectures = $db->query($prefectures_value)->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_UNIQUE);
$questions = $db->query($questions_value)->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_UNIQUE);
$selections = $db->query($selections_value)->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_UNIQUE);
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
    <div id="container">
    <?php for ($questions["order"]=1; $questions["order"] < 3; $questions["order"]++) { 
    
  echo  '<div id="quiz" class="question">
          <h3 id="questionArea" class="question_area">' . $questions["order"] .'.この地名はなんて読む？</h3>
          <img class="images" src=../img/' . $questions["order"] . '.png alt="画像">
       
          <ul id="worksFigure" style="display: flex;flex-direction: column">';
           
          foreach ($selections as $selection) {
            echo '<li id="correctSelection' . $questions["order"] . '" onclick = "checkAnswer(' . $questions["order"] . ',1,0)">' . $selection["selection_name"] . '</li>' .PHP_EOL; 
        }
        

  echo   '</ul>
        <div id="correctBox' . $questions['order'] . '" class="correct_box"  onclick = "checkAnswer(' . $questions["order"] . ',0,0)">
          <p class="text_seikai">正解！</p>
          <p>正解は「' . $questions['question_name'] . '」です</p>
        </div>
        <div id="failBox' . $questions["order"] . '" class="fail_box"  onclick = "checkAnswer(' . $questions["order"] . ',0,0)">
          <p class="text_fuseikai">不正解。</p>
          <p>正解は「' . $questions['question_name'] . '」です</p>
        </div>
    
      </div>';
}
?>
      
         
          
    </div>
    
    <script src="../js/quizy_3.js"></script>
</body>
</html>