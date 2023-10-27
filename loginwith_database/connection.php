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

/*$sql = "create table registr(
    id int auto_increment,
    name varchar(20) not null,
    email varchar(30) not null,
    phone varchar(15) not null,
    password varchar(20) not null,
    gender enum ('Male','Female','Others') not null,
    primary key(id)
    )";

*/
#$con->close();
?>