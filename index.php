<?php include'config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my tasks list</title>
</head>
<body>
    <header>
        <div>myTasks</div>
        <nav>
            <a href="">Home</a>
            <a href="">Register</a>
        </nav>
    </header>
    
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
    <form action="">
        <fieldset>login form
            <label for="user_name">user name</label>
            <input type="text" name="user_name">
            <label for="password">password</label>
            <input type="text" name="password">
            <input type="submit" value="login">
        </fieldset>
    </form>
       
    </main>
    <footer>
        &copy; Walaa Alomari
    </footer>


</body>
</html>