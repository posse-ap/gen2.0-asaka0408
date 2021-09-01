'use strict';

//変数宣言
let questionArea = document.getElementById("questionArea");
let choices = document.getElementById("choices");
let correct = document.getElementById("correctSelection");
let correctBox = document.getElementById('correctBox');
let failBox = document.getElementById('failBox');


const quizSet = [
    {q: '1.この地名はなんて読む？',c:['たかなわ','たかわ','こうわ']},
    {q: '2.この地名はなんて読む？',c:['かめいど','かめと','かめど']},
    {q: '3.この地名はなんて読む？',c:['こうじまち','かゆまち','おかとまち']},
    {q: '4.この地名はなんて読む？',c:['おなりもん','おかどもん','ごせいもん']},
    {q: '5.この地名はなんて読む？',c:['とどろき','たたりき','たたら']},
    {q: '6.この地名はなんて読む？',c:['しゃくじい','いじい','せきこうい']},
    {q: '7.この地名はなんて読む？',c:['ぞうしき','ざっしょく','ざっしき']},
    {q: '8.この地名はなんて読む？',c:['おかちまち','ごしろちょう','みとちょう']},
    {q: '9.この地名はなんて読む？',c:['ししぼね','しこね','ろっこつ']},
    {q: '10.この地名はなんて読む？',c:['こぐれ','こしゃく','こばく']},
];
let currentNum = 0;

//シャッフルについて

questionArea.textContent = quizSet[currentNum].q; //ulの中に問題文が入る

function shuffle(arr) {
    for (let terminalIndex = arr.length - 1; terminalIndex > 0; terminalIndex--) {
        const randomSelectedIndex = Math.floor(Math.random() * (terminalIndex + 1));
    [arr[randomSelectedIndex],arr[terminalIndex]] = [arr[terminalIndex],arr[randomSelectedIndex]];
    }
    //最後の一つとランダムに選んだ一つの要素を入れ替える処理を後ろからやっていく
    return arr;
}

const shuffledChoices = shuffle([...quizSet[currentNum].c]); //もとの配列はそのままにして入れ替えた配列を別のものとする？

shuffledChoices.forEach(choice => {
    const li = document.createElement('li');
    li.textContent = choice;
    choices.appendChild(li);
});






// //正解を押したとき

// correct.onclick = function () {
//     correct.classList.add("correct_selection");
//     showCorrectBox();
//     noMoreClick();
// }

// //不正解を押したとき

// let fails = document.getElementsByClassName('fail_selections');
// fails = Array.from(fails);
// fails.forEach(fail => {
//     console.log(fail),
//     fail.onclick= function () {
//             correct.classList.add("correct_selection");
//             fail.classList.add('fail');
//             showFailBox();
//             noMoreClick();
//     }
        
// });

// //ボタンを押せなくする

// function noMoreClick () {
//     fails.style.pointerEvents = 'none'; 
//     correct.style.pointerEvents = 'none';
// }
// //ここでfailsを使ってもHTML要素になってて動いてくれない。forEachの中に入れるとエラーになったし、正解を押したときにまた動かすのか？？よくわからない、、、
    
// //箱を表示する

// function showCorrectBox () {
//     correctBox.style.display = 'block';
// }

// function showFailBox (){
//     failBox.style.display = 'block';
// }
      
