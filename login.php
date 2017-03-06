<?php
    include ("db_user.inc.php");
    include ("header.php");
    echo "<form method='post'>";
    echo "<center><h2 style='color: black'>ลงชื่อเข้าใช้</h2>";
    echo "Username : <input name='username' type='text'><br/>";
    echo "Password : <input name='password' type='password'><br/>";
    echo "<button class='button button1' name='login' type='submit' style='size: 500px'>LOG IN</button>";
    echo "</center>";
    echo "</form>";
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $member=login($username,$password);
        if(!empty($member)){
            $_SESSION['class']=$member[3];
            if($_SESSION['class']=='user') {
                $_SESSION['code'] = $member[0];
                $_SESSION['name'] = $member[1];
                $_SESSION['surname'] = $member[2];
                $_SESSION['username'] = $username;
                echo "<script>alert(\"Login Success !\");window.location='user_detail.php';</script>";
            }
            else{
                echo "<script>alert(\"ADMIN !\");window.location='manage_user.php';</script>";
            }
        }
        else{
            echo "<script>alert(\"Username or Password incorrect. Login again !\");</script>";
        }
    }
    include ("footer.php");
    show_source("db_connect.inc.php");
    show_source("db_user.inc.php");
    show_source("header.php");
    show_source("login.php");
    show_source("footer.php");
?>