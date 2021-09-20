create database technology_sales_web;
use technology_sales_web;
-- cấu trúc cho bảng brands ( nhan hieu)
create table brands
(
	Id int primary key auto_increment,
    BrandName varchar(50) not null,
    Description text
);
-- cấu trúc cho bảng thể loại 
create table Categories
(
	Id int primary key auto_increment,
    Name varchar(50) not null unique,
    Description text
);
-- cấu trúc cho bảng khach hang
create table Customers
(
	Id int primary key auto_increment,
    CustomerName varchar(100) not null,
    PhoneNumber varchar(50),
    Address text not null,
    Email varchar(50) not null unique,
    Description text
);
-- cau truc cho bang san pham 
create table Products
(
	Id int primary key auto_increment,
    ProductName varchar(255) not null,
    Price decimal(18,2) not null,
    Dicount decimal(18,2) not null,
    ProductImage varchar(255) not null,
    BrandId int not null,
    CategoryId int not null,
    foreign key(BrandId) references brands(Id),
    foreign key(CategoryId) references categories(Id),
    Description text
);
-- du lieu cho bang admin
create table users
(
	Id int primary key auto_increment,
    UserName varchar(100) not null,
    Password varchar(50) not null,
    FullName varchar(100) not null,
    Phone varchar(10) not null,
    Address text not null,
    Email varchar(50) not null unique,
    Birthday datetime,
    RoleName varchar(30) not null,
    UserImage varchar(255) not null
);
-- cau truc cho bang don hang 
create table Orders
(
	Id int primary key auto_increment,
    CreatedDate datetime not null,
    StatusOrder varchar(50) not null,
    ShippingAddress text not null,
    ShippingCity varchar(50) not null,
    PaymentType varchar(20) not null,
    CustomerId int not null,
    UserId int not null,
    foreign key(CustomerId) references customers(Id),
    foreign key(UserId) references users(Id)
);
-- cau truc cho bang chi tiet don hang 
create table OrderDetails
(
	Id int primary key auto_increment,
    OrderId int not null,
    ProductId int not null,
    Quantity decimal(18,2) not null,
    foreign key(OrderId) references Orders(Id),
    foreign key(ProductId) references Products(Id)
);
alter table users
modify column Birthday varchar(50);
select p.Id as ProductId, c.Id as CategoryId, b.Id as BrandId,p.ProductName,c.Name as CategoryName,
b.BrandName,p.Price,p.ProductImage,p.Description
from products as p
inner join categories as c on p.CategoryId = c.Id
inner join brands as b on p.BrandId = b.Id;

select p.Id as ProductId, c.Id as CategoryId, b.Id as BrandId,p.ProductName,c.Name as CategoryName,
    b.BrandName,p.Price,p.Dicount,p.ProductImage,p.Description
    from products as p
    inner join categories as c on p.CategoryId = c.Id
    inner join brands as b on p.BrandId = b.Id where p.Id = 1;
    
select o.Id as OrderId ,cus.Id as CustomerId,u.Id as UserId,cus.CustomerName,u.FullName as EmployeeName,o.CreatedDate,o.StatusOrder,o.ShippingAddress,o.ShippingCity,o.PaymentType 
from orders as o
inner join customers as cus on o.CustomerId = cus.Id
inner join users as u on o.UserId = u.Id;

alter table orders
add ShippingType varchar(100);
alter table orders
modify column UserId int;

select o.Id as OrderId, cus.Id as CustomerId,cus.CustomerName,o.CreatedDate,o.StatusOrder,o.ShippingAddress,o.ShippingCity,o.PaymentType,o.ShippingType from orders as o
inner join customers as cus on o.CustomerId = cus.Id;

select * from orderdetails as od
inner join orders as o on od.OrderId = o.Id
inner join products as p on od.ProductId = p.Id;
DELETE FROM `orders`
    WHERE `Id` = 8;
DELETE FROM `orders`
WHERE o.Id = 7;
select p.Id as ProductId, c.Id as CategoryId, b.Id as BrandId,p.ProductName,c.Name as CategoryName,
    b.BrandName,p.Price,p.Dicount,p.ProductImage,p.Description
    from products as p
    inner join categories as c on p.CategoryId = c.Id
    inner join brands as b on p.BrandId = b.Id where p.Id = 14;
select p.Id as ProductId, c.Id as CategoryId, b.Id as BrandId,p.ProductName,c.Name as CategoryName,
    b.BrandName,p.Price,p.Dicount,p.ProductImage,p.Description
    from products as p
    inner join categories as c on p.CategoryId = c.Id
    inner join brands as b on p.BrandId = b.Id;
    
    select * from orderdetails where Id = 12