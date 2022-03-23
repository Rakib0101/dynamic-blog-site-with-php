<?php

if(isset($_POST['signup'])){
  include "config.php";

  $fname =mysqli_real_escape_string($conn,$_POST['fname']);
  $lname = mysqli_real_escape_string($conn,$_POST['lname']);
  $user = mysqli_real_escape_string($conn,$_POST['user']);
  $password = mysqli_real_escape_string($conn,md5($_POST['password']));
  $role = mysqli_real_escape_string($conn,$_POST['role']);

  $sql = "SELECT username FROM user WHERE username = '{$user}'";

  $result = mysqli_query($conn, $sql) or die("Query Failed.");

  if(mysqli_num_rows($result) > 0){
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>UserName already Exists.</p>";
  }else{
    $sql1 = "INSERT INTO user (first_name,last_name, username, password, role)
              VALUES ('{$fname}','{$lname}','{$user}','{$password}','{$role}')";
    if(mysqli_query($conn,$sql1)){
      header("Location: {$hostname}/admin/post.php");
    }else{
      echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert User.</p>";
    }
  }
}
?>

<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>User | Sign Up</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Sign Up</h3>
                        <!-- Form Start -->
                        <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="user" class="form-control" placeholder="Username" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <input type="hidden" name="role" value="0">
                            <input type="submit" name="signup" class="btn btn-primary" value="Sign Up" />
                            <p style="margin-top: 10px;">Do You Have Account Already ? Please <a href="index.php">login</a></p>
                        </form>
                        
                        <!-- /Form  End -->
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
