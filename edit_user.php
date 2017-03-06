<?php
//var_dump($_GET['user']);
include ("db_user.inc.php");
include ("header.php");
if($_SESSION['class']!='admin'){
    echo "<script>alert(\"This page for admin !!\");window.location='home.php';</script>";
}
$id_edit=$_GET['user'];
$user_detail="";
$user_detail=search_user($id_edit);
$user_name=$user_detail[0][0];
$user_surname=$user_detail[0][1];
$user_username=$user_detail[0][2];
echo "<center><h2 style='color: black'>Edit User</h2>";
echo "<form method='post'>";
echo "ID : ".$id_edit."<br/>";
echo "Name : <input name='name' type='text' value='$user_name'><br/>";
echo "Surname : <input name='surname' type='text' value='$user_surname'><br/>";
echo "Username : <input name='username' type='text' value='$user_username'><br/>";
echo "<br/>";
echo "<button name='edit' class='button button1'>Edit</button>";
echo "</from></center>";
echo "<br/>";

if(isset($_POST['edit'])){
    $user_detail=array($id_edit,$_POST['name'], $_POST['surname'], $_POST['username']);
    edit_user($user_detail);
    echo "<script>alert(\"Edit user success !!\");window.location='manage_user.php';</script>";
}
include ("footer.php");
show_source("db_connect.inc.php");
show_source("db_user.inc.php");
show_source("feader.php");
show_source("edit_user.php");
show_source("footer.php");
?>