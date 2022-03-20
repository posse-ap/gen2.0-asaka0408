DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);
INSERT INTO users SET name='eddy';


DROP TABLE IF EXISTS dates;
CREATE TABLE dates (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  date INT NOT NULL,
  `user_id` INT NOT NULL,
  time INT NOT NULL
);
INSERT INTO dates
  (date, `user_id`, time)
VALUES
  (2022/02/08, 1, 3),
  (2022/03/08, 1, 2),
  (2022/03/10, 1, 2),
  (2022/03/11, 1, 3),
  (2022/03/12, 1, 4);
  


DROP TABLE IF EXISTS details;
CREATE TABLE details (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  num INT NOT NULL,
  languages_or_contents TINYINT(1) NOT NULL DEFAULT '0',
  date_id INT NOT NULL
);
INSERT INTO details
  (name, num, languages_or_contents, date_id)
VALUES
  ('N予備校', 1, 1, 1),
  ('ドットインストール', 2, 1, 1),
  ('POSSE課題', 3, 1, 1),
  ('html', 1, 0, 1),
  ('css', 2, 0, 1),
  ('js', 3, 0, 1),
  ('ドットインストール', 2, 1, 2),
  ('js', 3, 0, 2),
  ('POSSE課題', 3, 1, 3),
  ('PHP', 4, 0, 3),
  ('js', 3, 0, 3),
  ('ドットインストール', 2, 1, 4),
  ('POSSE課題', 3, 0, 4),
  ('js', 3, 0, 4),
  ('css', 2, 0, 4);

 
