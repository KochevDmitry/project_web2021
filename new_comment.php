<?php 
    session_start();
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
<h1 align='center'>Создание нового комментария</h1>
<div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form action="" autocomplete="off" method=POST>
                           <div class="form-group">
                               <?php 
                               require_once "bd.php";
                               $link = connect();
                               $arr_user = select_user_by_login($link, $_SESSION["username"]);
                                $school = search_school_by_id($link, $arr_user[id_school]);?>
                                <h3><? echo $school[name]?></h3>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="comment_text" placeholder="Комментарий" required></textarea>
                            </div>
                            <?php 
                                    require_once "bd.php";
                                    $link = connect();
                                    $all_category = select_all_category($link);
                            ?>
                            <div class="form-group">
                                <select class="custom-select" placeholder="Выберите категорию" name="category" required>
                            
                                    <? foreach ($all_category as $cat){
                                    ?>
                                   <option value="<? echo $cat[id] ?>">
                                            <? echo $cat[name_category]?>
                                    </option>
                                    <?
                                    }
        
                                    ?>
                                </select>
                            </div>
<!--
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
-->
                            <button type="submit" id="sendlogin" class="btn btn-primary">Оставить комментарий</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
       require_once "bd.php";
        if ($_POST['category'] != null and $_POST['comment_text'] != null){
            echo "11111112";
            $new_comment[0]=$arr_user[id];
            echo $new_comment[0];
            $new_comment[1]=$_POST['comment_text'];
            echo $new_comment[1];
            $new_comment[2]=date('Y-m-d');
            echo $new_comment[2];
            $new_comment[3]=(int)$_POST['category'];
            echo $new_comment[3];
            $link = connect();
            $new_comment[4]=0;
            echo $new_comment[4];
            make_new_comment($link, $new_comment);
            echo mysqli_error($link);
//            header("Location: comments.php?school=$id_school[id_school]&sorts=0");
            exit("<meta http-equiv='refresh' content='0; url= /comments.php?school=$arr_user[id_school]&sorts=0'>"); 
        }
    ?>
</body>
</html>