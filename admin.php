<?php 
    session_start();
?>
<?php
    require_once "bd.php";
    if ($_POST['username'] != null and $_POST['password'] != null){
    if ($_POST['username'] == "admin_cool" and $_POST['password'] == "123adminadmin"){
            $_SESSION["username"]=$_POST['username'];
            header("Location: comments_admin.php?admin=12345adm&school=1&sorts=0");
            
//            echo mysqli_error($link);
        }
        else echo "<script>alert('Неверный логин или пароль')</script>";
    }
?>
<html>
    <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    </head>
    <!-- no additional media querie or css is required -->
    <body>
        <h1 align='center'>Админ</h1>
        <div class="container">
                <div class="row justify-content-center align-items-center" style="height:100vh">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <form action="" autocomplete="off" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="Login" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                    <button type="submit" id="sendlogin" class="btn btn-primary">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
    </body>
</html>