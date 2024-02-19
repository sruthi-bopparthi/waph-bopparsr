#Drop table if exits
drop table if exists users;

#Create table users
create table users(
username varchar(50) PRIMARY KEY,
password varchar(100) NOT NULL);

#Insert values
INSERT INTO users(username,password) VALUES ('admin',md5('MyPa$$w0rd'));
