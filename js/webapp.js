'use strict'
const modalContainer = document.getElementById('modalContainer');
const background = document.getElementById('background');

function showModal() {
  modalContainer.style.display = 'block';
  background.style.display = 'block';
}

function closeModal() {
  modalContainer.style.display ='none';
  background.style.display ='none';
}



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
        data: [30, 20, 10, 5, 20, 20, 10] //グラフのデータ
      }]
    },
    options: {
      legend: {position: 'bottom'},
      maintainAspectRatio: false,
      layout: { //レイアウトの設定
        padding: {
          left: 30,
          right: 30,
          top: 0,
          bottom: 50
        }
      }
    }
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
        data: [40, 20, 40] //グラフのデータ
      }]
    },
    options: {
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
    }
  });







  var ctx = document.getElementById("myBarChart");
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['', 2,'' ,4 ,'' , 6, '', 8, '', 10, '', 12, '', 14, '', 16, '', 18, '', 20, '', 26, '', 28, '', 30],
      datasets: [
        {
          label: 'hours',
          data: [3, 4, 5, 3, 0, 0, 4, 2, 2, 8, 8, 2, 2, 1, 7, 4, 4, 3, 3, 3, 2, 2, 6, 2, 2, 1, 1, 7, 8],
          backgroundColor: "#3f8dcb"
        }
      ]
    },
    options: {
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
 


  
