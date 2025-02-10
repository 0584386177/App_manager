CREATE DATABASE PRODUCT_MANAGER

use PRODUCT_MANAGER

create table admin(
    id int primary key auto_increment,
    username varchar(100) NOT NULL,
    fullname varchar (100) NOT NULL,
    email varchar(100) NOT NULL unique,
    password varchar(100) NOT NULL,
    last_login date default NOW()


)

