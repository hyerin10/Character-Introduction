create table character_information (
  num int not null auto_increment,
  name char(40) not null,
  gender char(40) not null,
  theme_color char(40) not null,
  character_image_url char(200) not null,
  eyes char(40) not null,
  skin char(40),
  hair char(40),
  clothing char(40),
  etc char(200) not null,
  primary key(num)
);