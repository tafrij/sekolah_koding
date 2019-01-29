<?php
  require_once 'core/init.php';
  if(isset($_SESSION['user'])){
    header('location:home.php');
  }

  if( isset($_POST['login']) ){
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $username   = mysqli_real_escape_string($link,$username);
    $password   = mysqli_real_escape_string($link,$password);

    if( !empty( trim($username) ) && !empty( trim($password) ) ){
        $username   = $_POST['username'];
        $username   = mysqli_real_escape_string($link,$username);
        $query =mysqli_query($link,"SELECT username FROM users WHERE username='$username'");

        if(mysqli_num_rows($query) != 0){
            $username   = $_POST['username'];
            $password   = $_POST['password'];
            $username   = mysqli_real_escape_string($link,$username);
            $password   = mysqli_real_escape_string($link,$password);
            // $query      = mysqli_query($link,"SELECT password FROM users WHERE username='$username'");
            $query      = mysqli_query($link,"SELECT * FROM users WHERE username='$username' AND password='$password'");
              if( mysqli_num_rows($query) > 0 ){
              $row = mysqli_fetch_assoc($query);
              $_SESSION['user']=$row['username'];
              header('location:home.php');
              }else {
                echo "<script>alert('username dan password ada yang salah');document.location='login.php';</script>";
              }
        }else {
          echo "<script>alert('username belum terdaftar');document.location='login.php';</script>";
        }
    }else {
      echo "<script>alert('username dan password tidak boleh kosong');document.location='login.php';</script>";
    }
  }

 ?>
 <link rel="stylesheet" href="assets/style.css">

 <section>
   <div id="form-login">
     <form action="login.php" method="post">
       <label for="">Username</label><br>
       <input type="text" name="username"><br><br>

       <label for="">Password</label><br>
       <input type="password" name="password"><br><br>

       <button type="submit" name="login">Login</button>
       <!-- <p><a href="register.php" type="submit">Register</a></p> -->
     </form>
   </div>
 </section>
