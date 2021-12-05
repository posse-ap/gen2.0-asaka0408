'use strict'

const quiz = document.getElementById('quiz');
let choices = document.getElementById("choices");

const quizSet = [
    {c: ['たかなわ', 'たかわ', 'こうわ'], b:'正解！正解は「たかなわ」です！', r: '不正解。正解は「たかなわ」です！'},
    {c: ['かめいど', 'かめと', 'かめど'], b:'正解！正解は「かめいど」です！', r: '不正解。正解は「かめいど」です！' },
    {c: ['こうじまち', 'かゆまち', 'おかとまち'], b:'正解！正解は「こうじまち」です！', r: '不正解。正解は「こうじまち」です！' },
    {c: ['おなりもん', 'おかどもん', 'ごせいもん'], b:'正解！正解は「おなりもん」です！', r: '不正解。正解は「おなりもん」です！' },
    {c: ['とどろき', 'たたりき', 'たたら'], b:'正解！正解は「とどろき」です！', r: '不正解。正解は「とどろき」です！' },
    {c: ['しゃくじい', 'いじい', 'せきこうい'], b:'正解！正解は「しゃくじい」です！', r: '不正解。正解は「しゃくじい」です！' },
    {c: ['ぞうしき', 'ざっしょく', 'ざっしき'], b:'正解！正解は「ぞうしき」です！', r: '不正解。正解は「ぞうしき」です！' },
    {c: ['おかちまち', 'ごしろちょう', 'みとちょう'], b:'正解！正解は「おかちまち」です！', r: '不正解。正解は「おかちまち」です！' },
    {c: ['ししぼね', 'しこね', 'ろっこつ'], b:'正解！正解は「ししぼね」です！', r: '不正解。正解は「ししぼね」です！' },
    {c: ['こぐれ', 'こしゃく', 'こばく'], b:'正解！正解は「こぐれ」です！', r: '不正解。正解は「こぐれ」です！'},
];

//シャッフル
function shuffle(arr) {
    for (let terminalIndex = arr.length - 1; terminalIndex > 0; terminalIndex--) {
        const randomSelectedIndex = Math.floor(Math.random() * (terminalIndex + 1));
        [arr[randomSelectedIndex], arr[terminalIndex]] = [arr[terminalIndex], arr[randomSelectedIndex]];
    }
    //最後の一つとランダムに選んだ一つの要素を入れ替える処理を後ろからやっていく
    return arr;
}

// 問題文を複製
for (let i = 0; i < 10; i++) {

    const p = document.createElement('p');
    p.textContent = (i + 1) + ".この地名はなんて読む？";
    quiz.appendChild(p);

    const img = document.createElement('img');
    img.setAttribute('src', '../img/' + i + '.png');
    quiz.appendChild(img);

    const shuffledChoices = shuffle([...quizSet[i].c]); //もとの配列はそのままにして入れ替えた配列を別のものとする？

    shuffledChoices.forEach(choice => {
        const li = document.createElement('li');
        li.textContent = choice;
        li.addEventListener('click', () => {
            checkAnswer(li);
        })
        quiz.appendChild(li);
    });
    
    
}