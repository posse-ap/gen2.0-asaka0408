DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);
INSERT INTO users SET name='eddy';


DROP TABLE IF EXISTS posts;
CREATE TABLE posts (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  date DATE NOT NULL,
  content VARCHAR(255) NOT NULL,
  language VARCHAR(255) NOT NULL,
  time INT NOT NULL
);
INSERT INTO posts
  (date, content, language, time)
VALUES
  ('2022-02-08', 'N予備校', 'html', 3),
  ('2022-03-08', 'ドットインストール', 'js', 2),
  ('2022-03-10', 'N予備校', 'php', 2),
  ('2022-03-11', 'ドットインストール', 'css', 3),
  ('2022-03-12', 'POSSE課題', 'js', 4),
  ('2022-03-24', 'N予備校', 'css', 4);
  


-- DROP TABLE IF EXISTS contents;
-- CREATE TABLE contents (
--   id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
--   name VARCHAR(255) NOT NULL,
--   num INT NOT NULL
-- );
-- INSERT INTO contents
--   (name, num)
-- VALUES
--   ('N予備校', 1),
--   ('ドットインストール', 2),
--   ('POSSE課題', 3),
--   ('html', 1, 0, 1),
--   ('css', 2, 0, 1),
--   ('js', 3, 0, 1),
--   ('ドットインストール', 2, 1, 2),
--   ('js', 3, 0, 2),
--   ('POSSE課題', 3, 1, 3),
--   ('PHP', 4, 0, 3),
--   ('js', 3, 0, 3),
--   ('ドットインストール', 2, 1, 4),
--   ('POSSE課題', 3, 0, 4),
--   ('js', 3, 0, 4),
--   ('css', 2, 0, 4);

 
