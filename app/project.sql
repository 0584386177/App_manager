CREATE DATABASE PRODUCT_MANAGER

use PRODUCT_MANAGER

create table admin(
    id int primary key auto_increment,
    username varchar(100) NOT NULL,
    fullname varchar (100) NOT NULL,
    email varchar(100) NOT NULL unique,
    password varchar(100) NOT NULL,
    last_login date default CURRENT_TIMESTAMP


)

create table register(
    id int primary key auto_increment,
    fullname varchar (100) NOT NULL,
    phone varchar (25) NOT NULL,
    email varchar(100) NOT NULL unique,
    username varchar(100) NOT NULL,
    password varchar(100) NOT NULL,
    last_register date default NOW()
);


CREATE TABLE Categories(

    CategoryID int primary key AUTO_INCREMENT,
    CategoryName varchar(100) NOT NULL,
    createAt datetime NOW(),
    updateAt datetime NOW()
);
CREATE TABLE Manufacturers(
    ManufacturerID int primary key AUTO_INCREMENT,
    ManufacturerName varchar(100) NOT NULL,

);
CREATE TABLE Products(
    ProductId int primary key auto_increment,
    CategoryID int ,
    ManufacturerID int,
    ProductName varchar(200) NOT NULL,
    ProductDesc text NOT NULL,
    ProductImei varchar(100) NOT NULL,
    ProductSKU varchar(100) NOT NULL,
    ProductModel varchar(100) NOT NULL,
    CPU varchar(100)NOT NULL,
    RAM varchar(50),
    Storage varchar(100),
    GPU varchar(100),
    Price DECIMAL(10,2),
    StockQuantity INT,
    IMAGE varchar(200),
    CreatAt DATETIME DEFAULT CURRENT_TIMESTAMPP,
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
    FOREIGN KEY (ManufacturerID) REFERENCES Manufacturers(ManufacturerID)
);

--
CREATE TABLE Customers (

    CustomerID int primary AUTO_INCREMENT,
    Fullname varchar(200) NOT NULL,
    Phone varchar(25) NOT NULL,
    Email varchar(100) NOT NULL UNIQUE,
    Address Text,
    CreateDate DATETIME DEFAULT CURRENT_TIMESTAMPP

);
-- ORDERS
CREATE TABLE Orders(
    OrderID int primary key AUTO_INCREMENT,
    OrderDate DATETIME DEFAULT CURRENT_TIMESTAMPP,
    TotalAmount Decimal(10,2),
    Status varchar(50), -- Pending,Processing,Shipping,Delivered,Cancelled
    PaymentMethod varchar(100),
    ShippingAddress text,
    Note text,
    FOREIGN KEY OrderID REFERENCES Customers(CustomerID)
);

--OrderDetails (Chi tiết đơn hàng)

CREATE TABLE OrderDetails(
    OrderDetailID INT PRIMARY KEY AUTO_INCREMENT,
    OrderId,
    ProductId,
    Quantity INT,
    UnitPrice DECIMAL(10,2),
    Discount DECIMAL(5,2) DEFAULT 0,
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);
-- Bảng Nhân viên
CREATE TABLE Employees (
    EmployeeID INT PRIMARY KEY AUTO_INCREMENT,
    FullName VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE,
    Phone VARCHAR(20),
    Address TEXT,
    Position VARCHAR(50),
    Username VARCHAR(50) UNIQUE,
    Password VARCHAR(255),
    CreatedDate DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Bảng Nhập hàng
CREATE TABLE Imports (
    ImportID INT PRIMARY KEY AUTO_INCREMENT,
    EmployeeID INT,
    ImportDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    TotalAmount DECIMAL(10,2),
    Status VARCHAR(50),
    Note TEXT,
    FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID)
);

-- Bảng Chi tiết nhập hàng
CREATE TABLE ImportDetails (
    ImportDetailID INT PRIMARY KEY AUTO_INCREMENT,
    ImportID INT,
    ProductID INT,
    Quantity INT,
    UnitPrice DECIMAL(10,2),
    FOREIGN KEY (ImportID) REFERENCES Imports(ImportID),
    FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
);

-- Bảng Khuyến mãi
CREATE TABLE Promotions (
    PromotionID INT PRIMARY KEY AUTO_INCREMENT,
    PromotionName VARCHAR(200),
    Description TEXT,
    DiscountPercent DECIMAL(5,2),
    StartDate DATETIME,
    EndDate DATETIME,
    Status VARCHAR(50)
);

-- Bảng Bảo hành
CREATE TABLE Warranty (
    WarrantyID INT PRIMARY KEY AUTO_INCREMENT,
    OrderDetailID INT,
    StartDate DATETIME,
    EndDate DATETIME,
    Status VARCHAR(50),
    Description TEXT,
    FOREIGN KEY (OrderDetailID) REFERENCES OrderDetails(OrderDetailID)
);