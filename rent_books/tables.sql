create database book_shop_db;
use book_shop_db;
create table if not exists returnedbooks(
    returnId int auto_increment not null primary key,
    userId int ,
    bookId int ,
    categoryId int,
    rentDate datetime,
    dueDate  datetime,
    returnDate datetime,
    paymentStatus varchar(50)
    );

create table if not exists payment(
    transactionId int auto_increment not null,
    userId int ,
	cardNumber long not null,
    name varchar(50) not null,
    transactionDate datetime,
    amount float,
	paymentStatus varchar(50),
	primary key(transactionId)
);
 

create table if not exists books(
bookId int not null auto_increment primary key,
title varchar(60) not null,
author varchar(60) not null,
categoryId int not null,
description varchar(255) not null,
quantity int not null,
price float not null,
fine float not null,
display_name varchar(30) not null,
date_added datetime not null,
date_updated datetime ,
availableStatus varchar(30) not null,
foreign key (categoryId)
references categories(categoryId)
);


create table if not exists admin(
admin_Id int auto_increment not null primary key, 
name varchar(80), 
email varchar(80) ,
password varchar(80)
);

create table if not exists rentedbooks(
rentId int auto_increment not null primary key,
userId int, 
bookId int, 
categoryId int, 
days int, 
price float, 
fine float ,
rentDate datetime,
dueDate datetime,
paymentStatus varchar(30)
);

create table if not exists categories(
categoryId int auto_increment not null primary key,  
category varchar(30), 
date_added datetime, 
date_updated datetime
)