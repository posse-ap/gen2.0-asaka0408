'use strict';

//変数宣言
let correct = document.getElementById("correctSelection");
let correctBox = document.getElementById('correctBox');
let failBox = document.getElementById('failBox');

//正解を押したとき

correct.onclick = function () {
    correct.classList.add("correct_selection");
    showCorrectBox();
    noMoreClick();
}

//不正解を押したとき

let fails = document.getElementsByClassName('fail_selections');
fails = Array.from(fails);
fails.forEach(fail => {
    console.log(fail),
    fail.onclick= function () {
            correct.classList.add("correct_selection");
            fail.classList.add('fail');
            showFailBox();
            noMoreClick();
        }
        
});

//ボタンを押せなくする

function noMoreClick () {
    fails.style.pointerEvents = 'none'; 
    correct.style.pointerEvents = 'none';
}
    
//箱を表示する

function showCorrectBox () {
    correctBox.style.display = 'block';
}

function showFailBox (){
    failBox.style.display = 'block';
}
      
