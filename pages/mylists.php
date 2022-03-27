<?php
echo "hello my lists page";

if($_SESSION['logged_in']){
$database=new Database;

$list_user=$_SESSION['username'];
//query
$database->query('select * from lists where list_user= :listuser');
$database->bind(':list_user',$list_user);
$rows=$database->resultset();

print_r($rows);

}
?>