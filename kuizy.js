'use strict';

let correct = document.getElementById("correct");

correct.onclick = function () {
    correct.classList.add("correct");
    showBox();
    fail1.style.pointerEvents = 'none';
    fail2.style.pointerEvents = 'none';
    correct.style.pointerEvents = 'none';
}

let correctBox = document.getElementById('correctBox');

function showBox () {
    correctBox.style.display = 'block';
}




// for (i = 1; i < 3; i++) {
//     let fails = document.getElementById(`fail${i}`);
// }

let fail1 = document.getElementById('fail1');
let fail2 = document.getElementById('fail2');

fail1.onclick = function () {
    correct.classList.add("correct");
    fail1.classList.add('fail');
    showBox2();
    fail1.style.pointerEvents = 'none';
    fail2.style.pointerEvents = 'none';
    correct.style.pointerEvents = 'none';
}

//間違いに関する関数

fail2.onclick = function () {
    correct.classList.add("correct");
    fail2.classList.add('fail');
    showBox2();
    fail1.style.pointerEvents = 'none';
    fail2.style.pointerEvents = 'none';
    correct.style.pointerEvents = 'none';
}

let failBox = document.getElementById('failBox');

function showBox2 () {
    failBox.style.display = 'block';
}

