<?php
include_once'classes/databases.php';
if($_POST['register']){

$firstname=$_POST['f_name'];
$lastname=$_POST['l_name'];
$email=$_POST['email'];
$username=$_POST['username'];
$password1=$_POST['password'];
$password2=$_POST['password2'];
$errors=array();


//check pswrd matching

if ($password1 != $password2){
   $errors[]="your passwords do not match" ;
  }
  //check first name
if(empty($firstname)){
    $errors[]="first name is required"; 
}
//check lastname
if(empty($lasttname)){
    $errors[]="last name is required"; 
}
//check email 
if(empty($email)){
    $errors[]="email is required"; 
}

//check user name
if(empty($username)){
    $errors[]="username is required"; 
}
//check password
if(empty($password1)){
    $errors[]="password is required"; 
}
//make database object
$database= new Database ;

//check if the username have been used 
$database->query('select username from users where username:username');
$database->bind(':username',$username);

//excute the query 
$database->excute();
//check if user name is used 
if ($database->rowCount() > 0){
$errors[]="sorry this user name is used";
}

//check if email is used 
$database->query('select email from users where email:email');
$database->bind(':email',$email);

$database->excute();

//check if email is used 
if ($database->rowCount() > 0){
    $errors[]="sorry this email is used";
    }

}

?>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
    registration form

    <label for="f_name">first name</label>
<input type="text" name="f_name" value="<?php if ($_POST['f_name']) echo $_POST['f_name'];?>" require>
<label for="l_name">last name</label>
<input type="text" name="l_name" value="<?php if ($_POST['l_name']) echo $_POST['l_name'];?>" require>
<label for="email">email</label>
<input type="email" name="email"  value="<?php if ($_POST['email']) echo $_POST['email'];?>"require>
<label for="username">user name</label>
<input type="text" name="username" value="<?php if ($_POST['username']) echo $_POST['username'];?>" require>
<label for="password">password</label>
<input type="password" name="password" require>
<label for="password2">confirm password</label>
<input type="password" name="password2" require>
<input type="submit" value="register">
</form>
<style>

    label,input{
        display:block;
        
    }
</style>