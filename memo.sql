create table memo (
  num int not null auto_increment,
  character_num int not null,
  memo_title char(40),
  memo_content varchar(400),
  primary key(num),
  foreign key (character_num) references character_information (num)
);