'use strict'
let container = document.getElementById('container');
// let questionArea = document.getElementById("questionArea");
let quiz = document.getElementById("quiz");
// let choices = document.getElementById("choices");


let quizSet = [
    ['たかなわ', 'たかわ', 'こうわ'],
    ['かめいど', 'かめと', 'かめど'],
    ['こうじまち', 'かゆまち', 'おかとまち'],
    ['おなりもん', 'おかどもん', 'ごせいもん'],
    ['とどろき', 'たたりき', 'たたら'],
    ['しゃくじい', 'いじい', 'せきこうい'],
    ['ぞうしき', 'ざっしょく', 'ざっしき'],
    ['おかちまち', 'ごしろちょう', 'みとちょう'],
    ['ししぼね', 'しこね', 'ろっこつ'],
    ['こぐれ', 'こしゃく', 'こばく'], 
]

let quizAnswers = [
    'たかなわ',
    'かめいど',
    'こうじまち',
    'おなりもん',
    'とどろき',
    'しゃくじい',
    'ぞうしき',
    'おかちまち',
    'ししぼね',
    'こぐれ',
]




// let main = '';
// for (let i = 0; i < quizSet.length; i++) {
//     main += '<div id="quiz" class="question">'
    
//     + '<h3 id="questionArea" class="question_area">' + [i + 1] + '.この地名はなんて読む？</h3>'
    
//     + '<img class="images" src=../img/' + i + '.png alt="画像">'
//     + '<ul id="worksFigure" style="display: flex;flex-direction: column">'
//     + '<li id="correctSelection' + [i] + '"  onclick = "checkAnswer(' + [i] + ',0,0)">' + quizSet[i][0] + '</li>'
//     + '<li id="failSelection1' + [i] + '"   onclick = "checkAnswer(' + [i] + ',1,0)">' + quizSet[i][1] + '</li>'
//     + '<li id="failSelection2' + [i] + '"   onclick = "checkAnswer(' + [i] + ',2,0)">' + quizSet[i][2] + '</li>'
//     + '</ul>'
//     + '<div id="correctBox' + i + '" class="correct_box"  onclick = "checkAnswer(' + [i + 1] + ',0,0)">'
//     + '<p class="text_seikai">正解！</p>'
//     + '<p>正解は「' + quizAnswers[i] + '」です</p>'
//     + '</div>'
//     + '<div id="failBox' + i + '" class="fail_box"  onclick = "checkAnswer(' + [i + 1] + ',0,0)">'
//     + '<p class="text_fuseikai">不正解。</p>'
//     + '<p>正解は「' + quizAnswers[i] + '」です</p>'
//     + '</div>'
    
//     + '</div>'
//     container.innerHTML = main;
    
// }




// 要素の取得
let lists = document.querySelectorAll("#worksFigure li");

// ランダム関数
function rand() {
  var Mrand = Math.floor(Math.random() * 3 );
  return Mrand;
}

// <li>のorderだけ修正して並び直す
lists.forEach( elm =>{ elm.style.order=rand()});


function checkAnswer(questionNumber, checkedSelection, correctNum) {
    let choice1 = document.getElementById("correctSelection" + questionNumber);
    let choice2 = document.getElementById("failSelection1" + questionNumber);
    let choice3 = document.getElementById("failSelection2" + questionNumber);
    let correctBox = document.getElementById('correctBox' + questionNumber);
    let failBox = document.getElementById('failBox' + questionNumber);


    if (checkedSelection === correctNum) {
        choice1.classList.add('correct_selection');
        correctBox.style.display = 'block';
        choice1.style.pointerEvents = 'none';
        choice2.style.pointerEvents = 'none';
        choice3.style.pointerEvents = 'none';
    }
    else if (checkedSelection === 1) {
        choice1.classList.add('correct_selection');
        choice2.classList.add('fail_selections');
        failBox.style.display = 'block';
        choice1.style.pointerEvents = 'none';
        choice2.style.pointerEvents = 'none';
        choice3.style.pointerEvents = 'none';
    }
    else {
        choice1.classList.add('correct_selection');
        choice3.classList.add('fail_selections');
        failBox.style.display = 'block';
        choice1.style.pointerEvents = 'none';
        choice2.style.pointerEvents = 'none';
        choice3.style.pointerEvents = 'none';
    }
    // console.log(questionNumber, checkedSelection, correctNum);
}




