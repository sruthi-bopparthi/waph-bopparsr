
#Drop table if exits
drop table if exists users;

#Create table users
create table users(
name varchar(50),
email varchar(50),
username varchar(50) PRIMARY KEY,
password varchar(100) NOT NULL);

#Insert values
INSERT INTO users(name, email,username,password) VALUES ('admin','admin@mail.uc.edu','admin',md5('MyPa$$w0rd'));
