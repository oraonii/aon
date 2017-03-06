<?php
include ("header.php");
if($_SESSION['class']!='user'){
    echo "<script>alert(\"You are not member or user\");window.location='home.php';</script>";
}
echo "<div align='center'>";
echo "<h2 style='color: black'>ข้อมูลส่วนตัว</h2>";
echo "ID : ".$_SESSION['code']."<br/>";
echo "<br/>";
echo "Name : ".$_SESSION['name']."<br/>";
echo "<br/>";
echo "Surname : ".$_SESSION['surname']."<br/>";
echo "<br/>";
echo "Username : ".$_SESSION['username']."<br/>";
echo "<br/>";
echo "</div>";
include ("footer.php");
show_source("header.php");
show_source("user_detail.php");
show_source("footer.php");
?>