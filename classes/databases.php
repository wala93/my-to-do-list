<?php

try{
// new connect 
$db_conn= new PDO("mysql:host=localhost;dbname=mytasks;charset=utf8","root","");

}
catch(PDOException $err){

//display the error
echo $err->getMessage();

}