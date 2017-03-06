<!DOCTYPE html>
<?php
 session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WELCOME</title>
</head>
<body bgcolor="#99CCCC">
<?php
    if (!isset($_SESSION['class']))
    {
        echo "<div>
                <ul>
                    <div>
                        <li><a href='home.php' style='color: black'>หน้าแรก</a></li>
                        <li><a href='login.php' style='color: black'>เข้าสู่ระบบ</a></li>
                    </div>
                    <div>
                        <img id='banner' src='header.png'>
                    </div>
                </ul>
            </div>";
    }
    else if($_SESSION['class']=='admin')
    {
        echo "<div>
                <ul>
                    <div>
                        <li><a href='home.php' style='color: black'>หน้าแรก</a></li>
                        <li><a href='manage_user.php' style='color: black'>ระบบสมาชิก</a></li>
                        <li><a href='Logout.php' style='color: black'>ออกจากระบบ</a></li>
                    </div>
                    <div>
                        <img id='banner' src='header.png'>
                    </div>
                </ul>
            </div>";
    }
    else if($_SESSION['class']=='user')
    {
        echo "<div>
                <ul>
                    <div>
                        <li><a href='home.php' style='color: black'>หน้าแรก</a></li>
                        <li><a href='user_detail.php' style='color: black'>ข้อมูลส่วนตัว</a></li>
                        <li><a href='Logout.php' style='color: black'>ออกจากระบบ</a></li>
                    </div>
                    <div>
                        <img id='banner' src='header.png'>
                    </div>
                </ul>
            </div>";
    }
?>
