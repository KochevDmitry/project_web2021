<?php 
    session_start();
    require_once "bd.php";
    $link = connect();
?>
<?php if ($_GET[admin] == "12345adm") { ?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer/">
    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="sticky-footer.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/log_out.php">Выйти</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
  </button>
    <div class="btn-group">
      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Сортировать
      </button>
      <div class="dropdown-menu">
          <a class="dropdown-item" href="?admin=12345adm&school=<? echo (int)$_GET[school]?>&sorts=1"><button type="button" class="dropdown-item">Дата создания</button></a>
          <a class="dropdown-item" href="?admin=12345adm&school=<? echo (int)$_GET[school]?>&sorts=2"><button type="button" class="dropdown-item">Похвала</button></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?admin=12345adm&school=<? echo (int)$_GET[school]?>&sorts=3"><button type="button" class="dropdown-item">Предложение</button></a>
          <a class="dropdown-item" href="?admin=12345adm&school=<? echo (int)$_GET[school]?>&sorts=4"><button type="button" class="dropdown-item">Критика</button></a>
          <a class="dropdown-item" href="?admin=12345adm&school=<? echo (int)$_GET[school]?>&sorts=5"><button type="button" class="dropdown-item">Свои эмоции</button></a>
          <a class="dropdown-item" href="?admin=12345adm&school=<? echo (int)$_GET[school]?>&sorts=6"><button type="button" class="dropdown-item">Другое</button></a>
          <a class="dropdown-item" href="?admin=12345adm&school=<? echo (int)$_GET[school]?>&sorts=0"><button type="button" class="dropdown-item">Без сортировки</button></a>
      </div>
    </div>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php $school_id = (int)$_GET[school];
            require_once "bd.php";
            $link = connect();
            $school = search_school_by_id($link, $school_id);
            echo $school[name];
            ?>
            
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php 
            require_once "bd.php";
            $link = connect();
            $arr_school = select_all_school($link);
            $i = 1;
            foreach ($arr_school as $id){
                echo "<a class='dropdown-item' href='?admin=12345adm&school=$i'>$id[name]</a>"; 
                $i += 1;
            }
            ?>
        </div>

      </li>
    </ul>
    <h1><?php
      echo $_SESSION["username"];
        require_once "bd.php";
            $link = connect();
            $arr_school = select_all_school($link);
//        print_r($arr_school);
      ?></h1>
  </div>
</nav>
    <!-- Begin page content -->
    <main role="main" class="container">
     <?php
            require_once "bd.php";
            $link = connect();
            if ((int)$_GET[sorts] == 0){
                $comments_one = select_all_comment($link, $school_id);
                $comments = array_reverse($comments_one);
            }
            else if ((int)$_GET[sorts] == 1){
                $comments = select_all_comment($link, $school_id);
            }
             else if ((int)$_GET[sorts] == 2){
                $comments_one = select_comment_category($link, $school_id, 1);
                 $comments = array_reverse($comments_one);
            }
             else if ((int)$_GET[sorts] == 3){
                $comments_one = select_comment_category($link, $school_id, 2);
                 $comments = array_reverse($comments_one);
            }
             else if ((int)$_GET[sorts] == 4){
                $comments_one = select_comment_category($link, $school_id, 3);
                 $comments = array_reverse($comments_one);
            }
             else if ((int)$_GET[sorts] == 5){
                $comments_one = select_comment_category($link, $school_id, 4);
                 $comments = array_reverse($comments_one);
            }
             else if ((int)$_GET[sorts] == 5){
                $comments_one = select_comment_category($link, $school_id, 5);
                 $comments = array_reverse($comments_one);
            }
    ?>
            <?foreach ($comments as $com){
                $arr_user_com = select_user_by_id($link, $com[id_user]);
                $category = select_category($link, $com[id_category]);
            ?>
          <br>
           <div class='card'>
                  <div class='card-header'>
                    <? echo $arr_user_com[name]?> <? echo $arr_user_com[surname]?>, <? echo $arr_user_com[login] ?>
                  </div>
                  <div class='card-body'>
                    <p class='card-text'><? echo $com[comment_text]?></p>
                  </div>
                  <div class='card-footer text-muted'>
                    Категория:<? echo $category[name_category]?>, <? echo $com[data_create]?>
                  </div>
            </div>
            <a href='delete_comment.php?admin=12345adm&id=<? echo $com[id] ?>&school=<? echo (int)$_GET[school] ?>'><button type="button" class="btn btn-outline-danger">Удалить комментарий</button></a>
            <br>
            <?
            }
        ?>
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">@Dmitry Kochev</span>
      </div>
    </footer>
  

</body></html>
<? } 
else echo "<h1 class='align-center'>Неверный пароль админа</h1>" ?>