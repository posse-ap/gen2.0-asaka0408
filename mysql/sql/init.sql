-- DROP TABLE IF EXISTS choices; もしあったら消してね
-- CREATE TABLE choices ( テーブル作りますよ
-- id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, １番から自動的にIDをふってくれる。自分で振ってもいけど、勝手にやってくれたほうがありがたいよね.
-- Primary keyとは：idは必ず固有の値ユニークであるといういみ。紐付けのときに判定できなくなるのを防ぐ。おまじない
-- big_question_id INT NOT NULL, 必ず何かしら入力してください
-- question_id INT NOT NULL,
-- choice0 VARCHAR(225) NOT NULL, 文字列を格納する型（２５５字数制限）
-- choice1 VARCHAR(225) NOT NULL,
-- choice2 VARCHAR(225) NOT NULL,
-- image VARCHAR(225) NOT NULL
-- );
-- ↑正規化されていない

-- 紐付けルール：同じ型でないといけない

DROP TABLE IF EXISTS prefectures;
CREATE TABLE prefectures (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  prefecture_name VARCHAR(225) NOT NULL
);

DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  prefecture_id INT NOT NULL, 
  `order` INT NOT NULL,
  question_name VARCHAR(255) NOT NULL
);

DROP TABLE IF EXISTS selections;
CREATE TABLE selections (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  question_id INT NOT NULL,
  selection_name VARCHAR(225) NOT NULL,
  is_correct boolean
);

INSERT INTO prefectures (id, prefecture_name) VALUES 
(1, '東京'),(2, '広島');

INSERT INTO questions (id, prefecture_id, `order`, question_name) VALUES 
(1, 1, 1, '高輪'),
(2, 1, 2, '亀戸'),
(3, 2, 1, '向洋');
-- order必要？

INSERT INTO selections (id, question_id, selection_name, is_correct) VALUES 
(1, 1, 'たかなわ', true),
(2, 1, 'こうわ', false),
(3, 1, 'たかわ', false),
(4, 2, 'かめいど', true),
(5, 2, 'かめと', false),
(6, 2, 'かめど', false),
(7, 3, 'むかいなだ', true),
(8, 3, 'むこうひら', false),
(9, 3, 'むきひら', false);


-- desc prefectures; カラムを確認できるsqlコマンド



-- INSERT INTO choices (big_question_id, question_id, choice0, choice1, choice2, image) VALUES 
-- (1, 1, 'たかなわ', 'こうわ', 'たかわ', 'Tokyo1.png'),
-- (1, 2, 'かめいど', 'かめと', 'かめど', 'Tokyo2.png'),
-- (1, 3, 'こうじまち', 'かゆまち', 'おかとまち', 'Tokyo3.png' ),
-- (1, 4, 'おなりもん', 'おかどもん', 'ごせいもん', 'Tokyo4.png'),
-- (1, 5, 'とどろき', 'たたら', 'たたろき', 'Tokyo5.png'),
-- (1, 6, 'しゃくじい', 'せきこうい', 'いじい', 'Tokyo6.png'),
-- (1, 7, 'ぞうしき', 'ざっしき', 'ざっしょく', 'Tokyo7.png'), 
-- (1, 8, 'おかちまち', 'みとちょう', 'ごしろちょう','Tokyo8.png'),
-- (1, 9, 'ししぼね', 'ろっこつ', 'しこね','Tokyo9.png'),
-- (1, 10, 'こぐれ', 'こばく', 'こしゃく','Tokyo10.png'),
-- (2, 1, 'むかいなだ', 'むこうひら', 'むきひら','Hiroshima1.png'),
-- (2, 2, 'みつぎ', 'みよし', 'おしらべ','Hiroshima2.png'),
-- (2, 3, 'かなやま', 'ぎんざん', 'きやま','Hiroshima3.png'),
-- (2, 4, 'とよひ', 'とよか', 'としか','Hiroshima4.png'),
-- (2, 5, 'いしぐろ', 'いしあぜ', 'しゃくぜ','Hiroshima5.png'),
-- (2, 6, 'みよし', 'みかた', 'みつぎ','Hiroshima6.png'),
-- (2, 7, 'うずい', 'もみち', 'くもおり','Hiroshima7.png'),
-- (2, 8, 'すもも', 'ぽんかん', 'でこぽん','Hiroshima8.png'),
-- (2, 9, 'おおちごとうげ', 'おうちごとうげ', 'おおちごえとうげ','Hiroshima9.png'),
-- (2, 10, 'よおろほよばら', 'ていぼよはら', 'てっぽよばら','Hiroshima10.png');
