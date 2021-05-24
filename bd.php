<?php 
		function connect(){
			$host = 'localhost';
			$user = 'root';
			$password = '';
			$db_name = 'project_veb2021';
			return mysqli_connect($host, $user, $password, $db_name);
		}
		function select_comment_category($link, $school, $id_category){
            $arr = array();
            $sql = "SELECT * FROM comment WHERE id_user in (SELECT id FROM user WHERE id_school = '$school') AND id_category=$id_category";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $arr[] = $row;
              }
            } 
            return $arr;
        }
        function select_all_comment($link, $school){
            $arr = array();
            $sql = "SELECT * FROM comment WHERE id_user in (SELECT id FROM user WHERE id_school = '$school')";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $arr[] = $row;
              }
            } 
            return $arr;
        }
        function make_new_user($link, $new_user){
            $sql = "INSERT INTO user(name, surname, login, password, num_class, id_school) VALUES('$new_user[0]', '$new_user[1]', '$new_user[2]', '$new_user[3]', $new_user[4], $new_user[5])";
            $result = $link->query($sql);
        }
        function make_new_comment($link, $new_comment){
            $sql = "INSERT INTO comment(id_user, comment_text, data_create, id_category, num_likes) VALUES($new_comment[0], '$new_comment[1]', '$new_comment[2]', $new_comment[3], $new_comment[4])";
            $result = $link->query($sql);
        }
        function delete_comment($link, $id){
            $sql = "DELETE from comment WHERE id=$id";
            $result = $link->query($sql);
        }
        function select_all_school($link){
            $arr = array();
            $sql = "SELECT * FROM school";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $arr[] = $row;
              }
            } 
            return $arr;
        }
        function select_all_category($link){
            $arr = array();
            $sql = "SELECT * FROM categoty";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $arr[] = $row;
              }
            } 
            return $arr;
        }
        function select_category($link, $id_category){
            $sql = "SELECT name_category FROM categoty WHERE id=$id_category";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                return $row;
              }
            } 
        }
        function select_user_by_id($link, $user_id){
            $sql = "SELECT login, name, surname FROM user WHERE id=$user_id";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                return $row;
              }
            } 
        }
        function select_user_by_login($link, $login){
            $sql = "SELECT * FROM user WHERE login='$login'";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                return $row;
              }
            } 
        }
        function login_user($link, $user_array){
            $sql = "SELECT * FROM user WHERE login='$user_array[0]' AND password='$user_array[1]'";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              return true;
            } 
            return false;
        }
        function only_login_user($link, $user_array){
            $sql = "SELECT * FROM user WHERE login='$user_array'";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              return true;
            } 
            return false;
        }
        function select_school_by_user($link, $user_login){
            $sql = "SELECT id_school FROM user WHERE login='$user_login'";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                return $row;
              }
            } 
        }
        function search_school_by_name($link, $school_name){
            $sql = "SELECT id FROM school WHERE name='$school_name'";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                return $row;
              }
            } 
        }
        function search_school_by_id($link, $school_id){
            $sql = "SELECT name FROM school WHERE id='$school_id'";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                return $row;
              }
            } 
        }

//		function name_books($link, $name){
//            $sql = "SELECT description FROM books WHERE name = '$name'";
//            $result = $link->query($sql);
//            if ($result->num_rows > 0) {
//              while($row = $result->fetch_assoc()) {
//                return $row;
//              }
//            }
//		
//        }
?>