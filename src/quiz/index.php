<?php
require('../dbconnect.php');

if (isset($_GET['id'])) {
  $id = htmlspecialchars($_GET['id']);

  $stmt = $db->prepare('SELECT * FROM questions WHERE prefecture_id = ?');
  $stmt = $db->execute(array($id));

   
 
}

// echo $id;

$prefectures_value = "SELECT * FROM prefectures WHERE id = $id";
$questions_value =  "SELECT * FROM questions INNER JOIN prefectures ON questions.prefecture_id = prefectures.id where prefecture_id = $id";
$selections_value = "SELECT * FROM selections INNER JOIN questions ON selections.question_id = questions.id where prefecture_id = $id";

$prefectures = $db->query($prefectures_value)->fetchAll();
$questions = $db->query($questions_value)->fetchAll();
$selections = $db->query($selections_value)->fetchAll();

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
    <?php foreach ($questions as $index => $question):?>
      <!-- 中身を増やしたときの汎用性 -->
    <h3> <?php echo $question['order'];?> .この地名はなんて読む？</h3>
    <img src="./img/<?php echo $question['order'];?>.png" alt="質問内容画像">
    <ul>
      <?php  
      
            
            $tmp = array_filter($selections, function($v) {
              return $v['question_id'] == 1;
              // ＝＝１だと全部高輪になるけど$questionsはUndefinedがでるなんで？？？？？？？？？グローバルとかローカルてきな？？？？これもエラーなのはなんで？？？？？？？
              // for文使えばindex使える
            });

            $result = array_map(function($v) {
              return $v['selection_name'] ;
            }, $tmp);

            foreach ($result as $value):?>   
      <li><?php echo $value; ?></li>
      <?php endforeach;?>
    </ul>
    
  </div>
  <?php endforeach ?>
  <!-- <script src="./js/quizy_3.js"></script> -->
</body>
</html>

<!-- <div id="correctBox' . $questions['order'] . '" class="correct_box"  onclick = "checkAnswer(' . $questions["order"] . ',0,0)">
          <p class="text_seikai">正解！</p>
          <p>正解は「' . $questions['question_name'] . '」です</p>
        </div>
        <div id="failBox' . $questions["order"] . '" class="fail_box"  onclick = "checkAnswer(' . $questions["order"] . ',0,0)">
          <p class="text_fuseikai">不正解。</p>
          <p>正解は「' . $questions['question_name'] . '」です</p>
        </div> -->

        <!-- echo '<li id="correctSelection' . $questions["order"] . '" onclick = "checkAnswer(' . $q
       