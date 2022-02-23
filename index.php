<?php
 include'config.php';
 include'classes/database.php';
//  print_r(PDO::getAvailableDrivers());
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
    
    <main>
        <?php
            if($_GET['page']=="welcome" || $_GET['page']==""){
            include'pages/welcome.php'; }
            elseif($_GET['page']=="task"){
                include'pages/task.php';  
            }
            elseif($_GET['page']=="register"){
                include'pages/register.php';  
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
   
    </main>
    <footer>
        &copy; Walaa Alomari
    </footer>

<script src="bootstrap.js"></script>
</body>
</html>