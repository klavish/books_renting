# Book Return Table
create table if not exists returnedbooks(
    userId int ,
    bookId int ,
    categoryId int,
    returnDate datetime,
    paymentStatus varchar(30)
    );


# Payment Table
    create table if not exists paymenmt(
    transactionId int auto_increment not null,
    userId int ,
    bookId int ,
    category varchar(50),
    name varchar(30) not null,
    email varchar(30) not null,
    cardNumber long not null,
    transactionDate datetime,
    amount float,
     paymentStatus varchar(30),
     primary key(transactionId)
    );
    
