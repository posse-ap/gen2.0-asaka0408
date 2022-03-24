<?php require("./dbconnect.php");

// 時間合計
$today = date("Y-m-d");
// print_r($today);
$stmt = $db->prepare('SELECT * FROM posts where date = ?');
$stmt->execute(array($today));
$day_hour = $stmt->fetchAll();

$stmt = $db->prepare('SELECT * from posts');
$stmt->execute();
$posts = $stmt->fetchAll();


$month_total = 0;
foreach($posts as $post) {
  if(strpos($post['date'], "2022-03") !== false) {
    $month_total += $post['time'];
  }else {
    $month_total += 0;
  }
}

$total = 0;
foreach($posts as $post_total) {
  $total += $post_total['time'];
}

// 円グラフ -言語
$html_total = 0;
$js_total = 0;
$css_total = 0;
$php_total = 0;
$laravel_total = 0;
$sql_total = 0;
$shell_total = 0;
$other_total = 0;
foreach($posts as $post_lan) {

  if(strpos($post_lan['language'], "html") !== false) {
    $html_total += $post_lan['time'];
  }
  elseif(strpos($post_lan['language'], "js") !== false) {
    $js_total += $post_lan['time'];
  }
  elseif(strpos($post_lan['language'], "css") !== false) {
    $css_total += $post_lan['time'];
  }
  elseif(strpos($post_lan['language'], "php") !== false) {
    $php_total += $post_lan['time'];
  }
  elseif(strpos($post_lan['language'], "Laravel") !== false) {
    $laravel_total += $post_lan['time'];
  }
  elseif(strpos($post_lan['language'], "SQL") !== false) {
    $sql_total += $post_lan['time'];
  }
  elseif(strpos($post_lan['language'], "SHELL") !== false) {
    $shell_total += $post_lan['time'];
  }
  else {
    $other_total += $post_lan['time'];
  }
}

// 円グラフ -コンテンツ
$nyobi_total = 0;
$dotinstall_total = 0;
$posse_total = 0;

foreach($posts as $post_con) {

  if(strpos($post_con['content'], "N予備校") !== false) {
    $nyobi_total += $post_lan['time'];
  }
  elseif(strpos($post_con['content'], "ドットインストール") !== false) {
    $dotinstall_total += $post_lan['time'];
  }
  else {
    $posse_total += $post_lan['time'];
  }
}
?>

<?php
// 空の配列
$monthly_hours = [];
// ０で埋める
$monthly_hours=array_pad($monthly_hours, date('t'), 0);
// 日数ぶん回す
for ($i = 0; $i < date('t'); $i++) {
  // １つずつのデータに対して
  foreach($posts as $monthly_date) {
    // もし登録されてたら
    if($monthly_date['date']=== date("Y-m-" . sprintf('%02d',$i))) { 
      // 配列にデータを登録
      $monthly_hours[$i] += $monthly_date['time'];
    }
  }
}
?>




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>posse-webapp</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/webapp.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
</head>
<body>
  <header class="header">
    <div class="header_logo_week">
      <img src="../img/BE692566-F416-4E12-BB40-049BBBF38B19_4_5005_c.jpeg" alt="POSSEロゴ">
      <p>4th week</p>
    </div>
    
    <button class="header_record_and_post_btn" onclick="showModal()">記録・投稿</button>

  </header>


  <div class="page_container">
    <div id="pageBackground"></div>
    <div class="main_container">
      <div class="time_bar_graf">
        <ul class="time_container">
          <li class="time_each">
            <p class="time_each_title">Today</p><br>
            <p class="time_each_hours"><?php
            // print_r($date);
            // foreach ($date as $key => $d) {
            //   echo $d;
            //   # code...
            // }
            echo $day_hour[0]['time'];     
            ?></p><br>
            <p class="time_each_unit">hour</p>
          </li>
          <li class="time_each">
            <p class="time_each_title">Month</p><br>
            <p class="time_each_hours"><?php echo $month_total; ?></p><br>
            <p class="time_each_unit">hour</p>
          </li>
          <li class="time_each">
            <p class="time_each_title">Total</p><br>
            <p class="time_each_hours"><?php echo $total; ?></p><br>
            <p class="time_each_unit">hour</p>
          </li>
        </ul>
        <div class="bar_graf">
          <canvas id="myBarChart"></canvas>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
        </div>
      </div>

      <ul class="sircle_graf_container">
        <li class="sircle_graf_each">
          <p class="sircle_graf_each_title">学習言語</p>
          <canvas class="sircle_graf_each_graf" id="sircleGrafLanguages">
          </canvas>
        </li>
        <li class="sircle_graf_each">
          <p class="sircle_graf_each_title">学習コンテンツ</p>
          <canvas class="sircle_graf_each_graf" id="sircleGrafContents">
          </canvas>
        </li>
      </ul>

    </div>

    <div class="now_time_container">
      <p class="now_time_flame">＜</p>
      <p>2020年10月</p>
      <p class="now_time_flame">＞</p>
    </div>

    <button class="sp_record_and_post_btn" onclick="showModal()">記録・投稿</button>

  </div>
    
  <section id="modalContainer" class="modal_container">
    <span id="modalBackBtn" class="modal_back_btn" onclick="closeModal()"></span>
    <form action="/" class="modal_form" name="modal_form">

      <div class="modal_form_first">
        <div class="modal_form_date">
          <label for="date">学習日</label>
          <input id="date" type="date" name="date">
        </div>
        <div class="modal_form_contents">
          <label for="contents">学習コンテンツ（複数選択可）</label>
          <div class="modal_form_contents_selections">
            <input type="checkbox" name="contents">N予備校
            <input type="checkbox" name="contents">ドットインストール
            <br>
            <input type="checkbox" name="contents">POSSE課題
          </div>
        </div>
        <div class="modal_form_languages">
          <label for="languages">学習言語（複数選択可）</label>
          <div class="modal_form_languages_selections">
            <input type="checkbox" name="languages">HTML 
            <!-- テーブル（見出しと中身）とかの表で使うやつだからなくてもおけ -->
            <input type="checkbox" name="languages">CSS
            <input type="checkbox" name="languages">JavaScript
            <br>
            <input type="checkbox" name="languages">PHP
            <input type="checkbox" name="languages">Laravel
            <input type="checkbox" name="languages">SQL
            <input type="checkbox" name="languages">SHELL
            <br>
            <input type="checkbox" name="languages">情報システム基礎知識（その他）
          </div>
        </div>
      </div>

      <div class="modal_form_second">
        <div class="modal_form_hours">
          <label for="hours">学習時間</label>
          <input id="hours" type="text" name="hours">
        </div>
          <div class="modal_form_twitter">
          <label for="twitter">Twitter用コメント</label>
          <textarea name="twitter" id="twitter" cols="30" rows="10"></textarea>
          <dd class="modal_form_twitter_btn"><input type="radio" name="tweet" onclick="radioDeselection(this, 1)">Twitterに自動投稿する
        </div>
      </div>
    </form>

    <div id="overlay">
      <div class="cv-spinner">
          <span class="spinner"></span>
      </div>
    </div>
      
    <button id="modalFormAnchor" class="modal_record_and_post_btn">記録・投稿</button>


      
  </section>

  <section id="postedContainer" class="posted_container">
    <span id="postedBackBtn" class="modal_back_btn" onclick="closePosted()"></span>
    <p>記録・投稿 完了しました</p>
  </section>

  <div id="background"></div>

  <div id="postedScrean" class="posted_screen">

  </div>


  <script>
  
  // 円グラフ
    var dataLabelPlugin = {
    afterDatasetsDraw: function (chart, easing) {
        // To only draw at the end of animation, check for easing === 1
        var ctx = chart.ctx;
  
        chart.data.datasets.forEach(function (dataset, i) {
            var dataSum = 0;
            dataset.data.forEach(function (element){
                dataSum += element;
            });
  
            var meta = chart.getDatasetMeta(i);
            if (!meta.hidden) {
                meta.data.forEach(function (element, index) {
                    // Draw the text in black, with the specified font
                    ctx.fillStyle = 'rgb(255, 255, 255)';
  
                    var fontSize = 12;
                    var fontStyle = 'normal';
                    var fontFamily = 'Helvetica Neue';
                    ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);
  
                    // Just naively convert to string for now
                    var labelString = chart.data.labels[index];
                    var dataString = (Math.round(dataset.data[index] / dataSum * 1000)/10).toString() + "%";
  
                    // Make sure alignment settings are correct
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
  
                    var padding = 5;
                    var position = element.tooltipPosition();
                    // ctx.fillText(labelString, position.x, position.y - (fontSize / 2) - padding);
                    ctx.fillText(dataString, position.x, position.y + (fontSize / 2) - padding);
                });
            }
        });
    }
  };
  
    var ctx = document.getElementById("sircleGrafLanguages");
    var sircleGrafLanguages= new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["HTML", "CSS", "JavaScript", "PHP", "Laravel", "SQL", "SHELL", "その他"], //データ項目のラベル
        datasets: [{
          backgroundColor: [
            "#65ccf9",
            "#2d72b8",
            "#204be3",
            "#55bbda",
            "#aea1ee",
            "#654fe4",
            "#412ce5",
            "#291db9"
          ],
          data: [<?php echo $html_total;?>, <?php echo $css_total;?>, <?php echo $js_total ;?>, <?php echo $php_total;?>, <?php echo $laravel_total;?>, <?php echo $sql_total;?>, <?php echo $shell_total;?>] //グラフのデータ
        }]
      },
      options: {
        legend: {position: 'bottom'},
        maintainAspectRatio: false,
        responsive: true,
        layout: { //レイアウトの設定
          padding: {
            left: 30,
            right: 30,
            top: 0,
            bottom: 50
          }
        }
      },
      plugins: [dataLabelPlugin],
    });

    var ctx = document.getElementById("sircleGrafContents");
  var sircleGrafContents= new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["N予備校", "ドットインストール", "POSSE課題",], //データ項目のラベル
      datasets: [{
        backgroundColor: [
          "#2d72b8",
          "#204be3",
          "#55bbda",
        ],
        data: [<?php echo $nyobi_total;?>, <?php echo $dotinstall_total;?>, <?php echo $posse_total;?>] //グラフのデータ
      }]
    },
    options: {
      // responsive: true,
      legend: {
        position: 'bottom',
        layout: {
          padding: {
            top: 100,
          },
        }
      },
      maintainAspectRatio: false,
      title: {
        display: true,
      },
      layout: { //レイアウトの設定
        padding: {
          left: 30,
          right: 30,
          top: 0,
          bottom: 120
        }
      }
    },
    plugins: [dataLabelPlugin],
  });


  // 棒グラフ
  var ctx = document.getElementById("myBarChart");
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['', 2,'' ,4 ,'' , 6, '', 8, '', 10, '', 12, '', 14, '', 16, '', 18, '', 20, '', 26, '', 28, '', 30],
      datasets: [
        {
          label: 'hours',
          // 登録されたデータの配列１つずつの値に対して
          data: [<?php foreach($monthly_hours as $monthly_hour )
          // カンマで区切りながら配列に登録
          echo $monthly_hour .",";
          ?>],
          backgroundColor: "#3f8dcb"
        }
      ]
    },
    options: {

      // responsive: true,
      legend: {
        display: false
     },
      title: {
        display: true,
      },
      scales: {
        yAxes: [{
          stacked: false,
          gridLines: {
            display: false
          },
          ticks: {
            suggestedMax: 8,
            suggestedMin: 0,
            stepSize: 2,
            callback: function (value, index, values) {
                return value + 'h'
            }
        }
        }],
        xAxes: [{
          stacked: false,
          gridLines: {
            display: false,
          },
          ticks: {
            stepSize: 2,
            suggestedMax: 30,
            suggestedMin: 1,
            callback: function (value, index, values) {
                return value + ''
            }
        }
        }],
      },
    }
  });
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="./js/webapp.js"></script>
</body>

</html>