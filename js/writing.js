'use strict'
//問題の配列を作る
let question_list = new Array();
question_list.push(['たかなわ','たかわ','こうわ']);
question_list.push(['かめいど', 'かめと', 'かめど']);
question_list.push(['こうじまち', 'かゆまち', 'おかとまち']);
question_list.push(['おなりもん', 'おかどもん', 'ごせいもん']);
question_list.push(['とどろき', 'たたりき', 'たたら']);
question_list.push(['しゃくじい', 'いじい', 'せきこうい']);
question_list.push(['ぞうしき', 'ざっしょく', 'ざっしき']);
question_list.push(['おかちまち', 'ごしろちょう', 'みとちょう']);
question_list.push(['ししぼね', 'しこね', 'ろっこつ']);
question_list.push(['こぐれ', 'こしゃく', 'こばく']);


function check(question_id, selection_id, valid_id) {

//クリック無効化
  let answerlists = document.getElementsByName('answerlist_' + question_id);
  answerlists.forEach( answerlist => {
    answerlist.style.pointerEvents = 'none';
  });

//一度全て不正解で、正解なら上書き
 
//正誤判定
  let answertext = document.getElementById('answertext_' + question_id);
  let answerbox = document.getElementById('answerbox_' + question_id);

  if(selection_id == valid_id) {
    answertext.className = 'valid_box';
    answertext.innerText = '正解！';
  } else {
    answertext.className = 'invalid_box';
    answertext.innerText = '不正解。';
  }
  answerbox.style.display = 'block'
}

function createQuestion(question_id, selection_list, valid_id) {
  let contents = '<div class="quiz">'
  + '<h3>' + question_id + '.この地名はなんて読む？</h3>'
    
  + '<img src=../img/' + question_id + '.png alt="画像">'
  + '<ul>';

  selection_list.forEach(function(selection, index) {
    contents += '<li id="answerlist_' + question_id + '_' + (index + 1) + '" name="answerlist_' + question_id + '" class="answerlist" onclick="check(' + question_id + ',' + (index+1) + ',' + valid_id + ')">'
    + selection + '</li>';
  });

  contents += '</ul>'
  + '<div id="answerbox_' + question_id + '" class="answerbox" >'
  + '<p id="answertext_' + question_id + '"></p>'
  + '<p>正解は「' + selection_list[valid_id - 1] + '」です</p>'
  + '</div>'

  +'</div>';

  document.getElementById('main').insertAdjacentHTML('beforeend',contents);
}

function createhtml() {
  question_list.forEach(function(question, index) {
     let answer = question[0];
    for (var i = question.length - 1; i > 0; i--) {
      var r = Math.floor(Math.random() * (i + 1));
      var tmp = question[i];
      question[i] = question[r];
      question[r] = tmp;
  }

    createQuestion(index+1, question, question.indexOf(answer)+1);
  });
}

window.onload = createhtml();