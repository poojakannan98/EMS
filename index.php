<?php 

require 'conn.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
    .login-form {
        width: 340px;
        margin: 50px auto;
        font-size: 15px;
    }

    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }

    .login-form h2 {
        margin: 0 0 15px;
    }

    .form-control,
    .btn {
        min-height: 38px;
        border-radius: 2px;
    }

    .btn {
        font-size: 15px;
        font-weight: bold;
    }

    .btn-info {
        background: green;
    }
    </style>

</head>

<body>
    <div class="login-form">
        <form action="" method="post">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="u_name" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="u_pass" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-success " name="u_login">Login as Admin</button>
                <a href="register.php" class="btn btn-primary" role="button">Register</a>
            </div>
          
        </form>
    </div>

    <?php

    if(isset($_POST['u_login'])){
    $u_name = $_POST['u_name'];
    $u_pass = md5($_POST['u_pass']);

    $sql =  "SELECT * FROM users WHERE u_name = '$u_name'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        while ($user = mysqli_fetch_assoc($result)) {
            if($u_name == $user['u_name'] && $u_pass == $user['u_pass']){
                $_SESSION['u_name'] = $u_name;
                echo '<script>window.location.href ="dash.php" </script>';
            }else{
                echo '<script>alert("incorrect username or password");</script>';            }
        }
    }else{
        echo '<script>alert("register!!");</script>';
         }
    }
?>

</body>

</html>

</html>