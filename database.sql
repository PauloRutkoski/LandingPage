create database LandingPage_Database character set utf8 collate utf8_unicode_ci;

create table tb_users(
	id int not null primary key auto_increment,
    name text not null,
    email text not null,
    telephone text not null
);
