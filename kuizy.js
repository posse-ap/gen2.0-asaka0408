'use strict';

//TODO
//この地名はなんて読む？と、画像の複製
//不正解を押した時、正解の色



//変数宣言
let questionArea = document.getElementById("questionArea");
let quiz = document.getElementById("quiz");
let choices = document.getElementById("choices");
let correct = document.getElementById("correctSelection");
let correctBox = document.getElementById('correctBox');
let failBox = document.getElementById('failBox');

let isAnswered;


const quizSet = [
    { q: '1.この地名はなんて読む？', c: ['たかなわ', 'たかわ', 'こうわ'], b:'正解！正解は「たかなわ」です！', r: '不正解。正解は「たかなわ」です！'},
    { q: '2.この地名はなんて読む？', c: ['かめいど', 'かめと', 'かめど'], b:'正解は「たかなわ」です！', r: '正解は「たかなわ」です！' },
    { q: '3.この地名はなんて読む？', c: ['こうじまち', 'かゆまち', 'おかとまち'], b:'正解は「たかなわ」です！', r: '正解は「たかなわ」です！' },
    { q: '4.この地名はなんて読む？', c: ['おなりもん', 'おかどもん', 'ごせいもん'], b:'正解は「たかなわ」です！', r: '正解は「たかなわ」です！' },
    { q: '5.この地名はなんて読む？', c: ['とどろき', 'たたりき', 'たたら'], b:'正解は「たかなわ」です！', r: '正解は「たかなわ」です！' },
    { q: '6.この地名はなんて読む？', c: ['しゃくじい', 'いじい', 'せきこうい'], b:'正解は「たかなわ」です！', r: '正解は「たかなわ」です！' },
    { q: '7.この地名はなんて読む？', c: ['ぞうしき', 'ざっしょく', 'ざっしき'], b:'正解は「たかなわ」です！', r: '正解は「たかなわ」です！' },
    { q: '8.この地名はなんて読む？', c: ['おかちまち', 'ごしろちょう', 'みとちょう'], b:'正解は「たかなわ」です！', r: '正解は「たかなわ」です！' },
    { q: '9.この地名はなんて読む？', c: ['ししぼね', 'しこね', 'ろっこつ'], b:'正解は「たかなわ」です！', r: '正解は「たかなわ」です！' },
    { q: '10.この地名はなんて読む？', c: ['こぐれ', 'こしゃく', 'こばく'], b:'正解は「たかなわ」です！', r: '正解は「たかなわ」です！'},
];

//シャッフルについて
function shuffle(arr) {
    for (let terminalIndex = arr.length - 1; terminalIndex > 0; terminalIndex--) {
        const randomSelectedIndex = Math.floor(Math.random() * (terminalIndex + 1));
        [arr[randomSelectedIndex], arr[terminalIndex]] = [arr[terminalIndex], arr[randomSelectedIndex]];
    }
    //最後の一つとランダムに選んだ一つの要素を入れ替える処理を後ろからやっていく
    return arr;
}


// 問題文を複製
for (let i = 0; i < quizSet.length; i++) {


    isAnswered = false;

    const p = document.createElement('p');
    p.textContent = quizSet[i].q; //pの中に問題文が入る
    quiz.appendChild(p);

    const img = document.createElement('img');
    img.setAttribute('src', './img/' + i + '.png');
    quiz.appendChild(img);
    // document.write('<img src="./img/' + i + '.png" alt="画像${i}">');

    const shuffledChoices = shuffle([...quizSet[i].c]); //もとの配列はそのままにして入れ替えた配列を別のものとする？

    shuffledChoices.forEach(choice => {
        const li = document.createElement('li');
        li.textContent = choice;
        li.addEventListener('click', () => {
            checkAnswer(li);
        })
        quiz.appendChild(li);
    });


    //ボタンを押した時の処理

    function checkAnswer(li) {
        // if (isAnswered === true) {
        if (isAnswered) {
            return;
        }
        isAnswered = true;

        if (li.textContent === quizSet[i].c[0]) {
            li.classList.add('correct_selection');
            p.textContent = quizSet [i].b;
            quiz.appendChild(p);
        } else {
            li.classList.add('fail_selections');
            // quizSet[currentNum].c[0].classList.add('correct_selection');
            p.textContent = quizSet[i].r;
            quiz.appendChild(p);
        }
    }
}

function showCorrectBox() {
    
}

function showFailBox() {
    failBox.style.display = 'block';
}
