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
  `user_id` INT NOT NULL
);
INSERT INTO dates
  (date, `user_id`)
VALUES
  (2022/03/08, 1),
  (2022/03/10, 1),
  (2022/03/11, 1),
  (2022/03/12, 1);
  


DROP TABLE IF EXISTS contents;
CREATE TABLE contents (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  date_id INT NOT NULL
);

INSERT INTO contents
  (name, date_id)
VALUES
  ('N予備校', 1),
  ('ドットインストール', 1),
  ('N予備校', 2),
  ('ドットインストール', 2),
  ('N予備校', 3),
  ('ドットインストール', 3),
  ('N予備校', 4),
  ('ドットインストール', 4);


DROP TABLE IF EXISTS languages;
CREATE TABLE languages (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  time INT NOT NULL,
  content_id INT NOT NULL
);

INSERT INTO languages
  (name, time, content_id)
VALUES
  ('html', 3, 1),
  ('css', 2, 1),
  ('html', 3, 2),
  ('js', 1, 2),
  ('html', 3, 3),
  ('html', 3, 4),
  ('css', 1, 4),
  ('html', 3, 5),
  ('html', 4, 6),
  ('html', 2, 7),
  ('html', 1, 8);
