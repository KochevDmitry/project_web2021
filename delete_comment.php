<?php
require_once "bd.php";
$link = connect();
 if ($_GET[admin] == "12345adm"){
    $id = (int)$_GET[id];
    $sch = (int)$_GET[school];
    delete_comment($link, $id);
    header("Location: comments_admin.php?admin=12345adm&school=$sch&sorts=0");
 }
else if ($_GET[admin] == "12345usr"){
    $id = (int)$_GET[id];
    $sch = (int)$_GET[school];
    delete_comment($link, $id);
    header("Location: comments.php?school=$sch&sorts=0");
}
else echo "<h1 class='align-center'>Неверный пароль админа</h1>";
?>