<h2>Welcome to myTasks !</h2>
              
<p> It's a small application but very helpful to manage your tasks </p>

 
  
<form action="<?PHP $_server['PHP_SELF']?>"  method="POST">
    <?php if($_SESSION['logged_in']) :?>
       
        HELLO, <?php echo$_SESSION['username'].'</br>' ;?>
        <input type="submit" value="logout" name="logout_submit"> 
<?php else : ?>
    <?php foreach($login_msg as $msg): ?>
    <?php  echo $msg.'<br />';?>
    <?php endforeach; ?>
            login form 
<label for="user_name">user name</label>
<input type="text" name="username" required>
<label for="password">password</label>
<input type="password" name="password" required>
<input type="submit" value="login" name="login_submit">

<?php endif ?>     
          
    </form>