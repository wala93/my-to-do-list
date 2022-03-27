<?php session_start() ?>
<?php require'config.php';?>
 <?php require'classes/databases.php';
//  print_r(PDO::getAvailableDrivers());
$database= new Database ;
?>

<?php 
//log in
if($_POST['login_submit']){
   
    $username=$_POST['username'];
    $password=$_POST['password'];
    $enc_password=md5($password);
//query 
$database ->query("select * from users Where username = :username and password= :password");
$database->bind(':username',$username);
$database->bind(':password',$enc_password);
$rows= $database->resultset();
$count=count($rows);
if($count > 0){
session_start();

//assign session vabriables 

$_SESSION['username']=$username;
$_SESSION['password']=$enc_password;
$_SESSION['logged_in']=1;


}
else{
$login_msg[]='sorry something wrong in your login ';

}
}

//log out 

if($_POST['logout_submit']){
if(isset($_SESSION['username']))
    unset($_SESSION['username']);
if(isset($_SESSION['password']))
    unset($_SESSION['password']); 
if(isset($_SESSION['logged_in']))
    unset($_SESSION['logged_in']); 
session_destroy();  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my tasks list</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
    
    <ul class="nav">
        <li class="nav-item">
          <a class="nav-link disabled">myTasks</a>
        </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="http://localhost/myTasks">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=register">Register</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li> -->
</ul>
    
   
        <?php
            if($_GET['page']=="welcome" || $_GET['page']==""){
            include'pages/welcome.php'; }
            elseif($_GET['page']=="register"){
                include'pages/register.php'; 
            }
            elseif($_GET['page']=="task"){
                include'pages/task.php';  
            }
                         
            elseif($_GET['page']=="new_task"){
                include'pages/new_task.php';  
            }
            elseif($_GET['page']=="new_list"){
                include'pages/new_list.php';  
            }
            elseif($_GET['page']=="list"){
                include'pages/list.php';  
            }
            elseif($_GET['page']=="edit_list"){
                include'pages/edit_list.php';  
            }
            elseif($_GET['page']=="edit_task"){
                include'pages/edit_task.php';  
            }
            elseif($_GET['page']=="delete_list"){
                include'pages/delete_list.php';  
            }
        ?>
   
   <?php


if($_SESSION['logged_in']){
    //make db object
$database=new Database;
//get logged in user 
$list_user=$_SESSION['username'];

//query
$database->query('select * from lists where list_user=:list_user');
$database->bind(':list_user',$list_user);
$rows=$database->resultset();
echo'<h4>your  current lists </h4>';


if($rows){
echo '<ul class="items">';
foreach($rows as $list){
echo' <li><a href="?page=list&id='.$list->id.'">'.$list->list_name.'<br>';
}
echo'</ul>';
}
else{
echo'ther is no lists available now -<a href="index.php?page=new_list">create new one </a>';

}
}
?>
<style>
    label,input{
        display:block;
    }
</style>

<script src="bootstrap.js"></script>
</body>
</html>