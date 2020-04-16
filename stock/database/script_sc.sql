/*
*********************************************************************
Mini project
*********************************************************************
Name: MySQL Sample Database prod_sc

Version 1.1
+ added email column to conusmers table
+ changed role to 'Consumer'
+ lastname
+ firstname
*********************************************************************
*/


use prod_sc;
create table customers
(
customerid int unsigned not null auto_increment primary key,
username varchar(50) not null,
lastname char(60) not null,
firstname char(60) not null,
email varchar(50) not null,
role enum('Customer','Admin') DEFAULT NULL,
password varchar(255) NOT NULL,
address char(80) not null,
city char(30) not null,
state char(20),
zip char(10),
country char(20) not null
);

create table orders
(
orderid int unsigned not null auto_increment primary key,
customerid int unsigned not null references customers(customerid),
amount float(6,2),
date date not null,
order_status char(10),
ship_name char(60) not null,
ship_address char(80) not null,
ship_city char(30) not null,
ship_state char(20),
ship_zip char(10),
ship_country char(20) not null
) ;
create table products
(
prodid int unsigned not null auto_increment primary key,
catid int not null references categories(catid),
name varchar(200) NOT NULL,
price float(4,2) not null,
description  varchar(1255),
img text NOT NULL,
date_added datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;
create table categories
(
catid int unsigned not null auto_increment primary key,
catname char(60) not null
) ;
create table order_items
(
orderid int unsigned not null references orders(orderid),
prodid char(13) not null references products(prodid),
item_price float(4,2) not null,
quantity tinyint unsigned not null,
primary key (orderid, prodid)
) ;
create table admin
(
username char(16) not null primary key,
password char(40) not null
);
grant select, insert, update, delete on prod_sc.* to prod_sc@localhost identified by 'password';
