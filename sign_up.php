<?php
        session_start();
       require_once "bd.php";
        if ($_POST['surname'] != null and $_POST['name'] != null and $_POST['login'] != null and
        $_POST['password'] != null and $_POST['password'] == $_POST['password2'] and $_POST['num_class'] != null and $_POST['school'] != null){
            $new_user[0]=$_POST['name'];
            $new_user[1]=$_POST['surname'];
            $new_user[2]=$_POST['login'];
            $new_user[3]=$_POST['password'];
            $new_user[4]=(int)$_POST['num_class'];
            $link = connect();
            $new_user[5]=(int)$_POST['school'];
            $log_user=$_POST['login'];
            $a = only_login_user($link, $log_user);
            if ($a){
                echo "<script>alert('Такой пользователь уже существует')</script>";
            }
            else {make_new_user($link, $new_user);
//            echo mysqli_error($link);
            $_SESSION["username"]=$_POST['login'];
            exit("<meta http-equiv='refresh' content='0; url= /comments.php?school=$new_user[5]&sorts=0'>"); 
                 }
//            header("Location: /comments.php?school=$new_user[5]&sorts=0");
        }
    ?>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<!------ Include the above in your HEAD tag ---------->

<!-- no additional media querie or css is required -->
<body>
<h1 align='center'>Регистрация</h1>
<div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form action="" autocomplete="off" method=POST>
                           <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="surname" placeholder="Surname" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="login" placeholder="Login" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password2" placeholder="Repeat password" required>
                            </div>
                            <div class="form-group">
                                <select class="custom-select" placeholder="Select your class number" name="num_class" required>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                </select>
                            </div>
                            <?php 
                                    require_once "bd.php";
                                    $link = connect();
                                    $all_school = select_all_school($link);
                            ?>
                            <div class="form-group">
                                <select class="custom-select" placeholder="Выберите школу" name="school" required>
                            
                                    <? foreach ($all_school as $sch){
                                    ?>
                                   <option value="<? echo $sch[id] ?>">
                                            <? echo $sch[name]?>
                                    </option>
                                    <?
                                    }
        
                                    ?>
                                </select>
                            </div>
<!--
                            <div class="form-group">
                                <select class="custom-select" placeholder="Select your school" name="school" required>
                                  <option value="1">ГБОУ Школа №444</option>
                                  <option value="2">ГБОУ Школа №179</option>
                                  <option value="3">ГБОУ Школа №1811</option>
                                </select>
                            </div>
-->
                            <button type="submit" id="sendlogin" class="btn btn-primary">Sign up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>