CREATE TABLE memo (
  character_num int NOT NULL,
  memo_num int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  memo_title char(40),
  memo_content varchar(400),
  UNIQUE KEY unique_memo (character_num, memo_num),
  FOREIGN KEY (character_num) REFERENCES character_information (num)
);