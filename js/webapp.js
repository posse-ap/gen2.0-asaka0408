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
      
    }
  });

  var ctx = document.getElementById("sircleGrafContents");
  var sircleGrafContents= new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["N予備校", "ドットインストール", "課題"], //データ項目のラベル
      datasets: [{
        backgroundColor: [
          "#2d72b8",
          "#204be3",
          "#55bbda"
        ],
        data: [40, 20, 40] //グラフのデータ
      }]
    },
    options: {
      legend: {position: 'bottom'},
      maintainAspectRatio: false,
      title: {
        display: true,
      }
    }
  });







  var ctx = document.getElementById("myBarChart");
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30],
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
          }
        }],
        xAxes: [{
          stacked: false,
          gridLines: {
            display: false
          }
        }]
      },
    }
  });
 


  
