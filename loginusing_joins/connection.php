<?php
$servername = 'localhost';
$username = 'root';
$password = 'Lavish@1233';
$database = 'regist_details';

#check connection
mysqli_report(MYSQLI_REPORT_STRICT);
try{
$con = new mysqli($servername, $username, $password, $database);

}catch(Exception $ex){
    die ("Connection Failed: " . $ex->getMessage());
    
}
#create database
/*$sql = 'create database regist_details';
if($con->query($sql) === TRUE){
    echo "Database regist_details created";
}
else{
    echo "Error :".$con->error;
}*/

/*create table user_reg(
    userId int auto_increment,
    name varchar(30) not null,
    email varchar(30) not null,
    phone varchar(15) not null,
    password varchar(20) not null,
    gender enum ('Male','Female','Others') not null,
    primary key(userId)
    );
create table img_file(
id int primary key auto_increment,
userId int ,
unique_name varchar(200) not null,
display_name varchar(200) not null,
date_created datetime,
date_modified datetime,
foreign key (userId) references user_reg(userId)

);

*/
#$con->close();
?>