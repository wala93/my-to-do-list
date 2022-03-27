<?php

/*

$db_conn= new PDO("mysql:host=localhost;dbname=mytasks;charset=utf8","root","");
*/
if($_POST['register_submit']){

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
if(empty($lastname)){
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
$database->query('select username from users where username=:username');

$database->bind(':username',$username);

//excute the query 
$database->execute();


//check if user name is used 
if ($database->rowCount() > 0){
    
$errors[]="sorry this user name is used";
}

//check if email is used 
$database->query('select email from users where email=:email');
$database->bind(':email',$email);

$database->execute();

//check if email is used 
if ($database->rowCount() > 0){
    $errors[]="sorry this email is used";
    }
// if there is no errors


if (empty($errors)){
//encrypt password


$enc_password=md5($password1);

//write insert query
// $sql=$database->prepare("insert into users (first_name,last_name,email,username,password) values(:first_name,:last_name,:email,:username,:password)");

$database->query("insert into users (first_name,last_name,email,username,password) values(:first_name,:last_name,:email,:username,:password)");

//bind values
$database->bind(':first_name',$firstname);
$database->bind(':last_name',$lastname);
$database->bind(':email',$email);
$database->bind(':username',$username);
$database->bind(':password',$enc_password);

//execute query 
$database->execute();


//if registration is sucssess or not 
if ($database->lastInsertId()){
    echo'<p class="msg"> registration completed !please log in . </p>';
}
else{
    echo'<p class="msg"> Sorry some thing went wrong  </p>'; 
}
}
}

?>


<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
    registration form

<label for="f_name">first name</label>
<input type="text" name="f_name" value="<?php if ($_POST['f_name']) echo $_POST['f_name'];?>"  required>
<label for="l_name">last name</label>
<input type="text" name="l_name" value="<?php if ($_POST['l_name']) echo $_POST['l_name'];?>"  required>
<label for="email">email</label>
<input type="email" name="email"  value="<?php if ($_POST['email']) echo $_POST['email'];?>" required>
<label for="username">user name</label>
<input type="text" name="username" value="<?php if ($_POST['username']) echo $_POST['username'];?>"  required>
<label for="password">password</label>
<input type="password" name="password" required>
<label for="password2">confirm password</label>
<input type="password" name="password2"  required>
<input type="submit" value="register"  name="register_submit">
</form>


<?php
if(!empty($errors)){
echo "<ul>";
foreach($errors as $error){
echo"<li class=\" error\"> $error </li>";
echo "</ul>";
}

}


   

?>

<style>

    label,input{
        display:block;
        
    }
</style>