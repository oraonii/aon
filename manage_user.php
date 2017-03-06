<?php
    include ("db_user.inc.php");
    include ("header.php");
    if($_SESSION['class']!='admin'){
        echo "<script>alert(\"This page for admin !!\");window.location='home.php';</script>";
    }
    echo "<form method='post'>";
    echo "<center><h2 style='color: black'>สมาชิก</h2>";
    $h=array("ID","Name","Surname","Username","Edit","Delete");
    $member=member();
    $colChbox=count($member[0]);
    for ($i=0;$i<count($member);$i++){
        $member_id=$member[$i][0];
        $member[$i][$colChbox]="<a name='edit' href='edit_user.php?user=$member_id'>Edit</a>";
        $member[$i][$colChbox+1]="<input name='$i' type='checkbox'>";
    }
    create_table($h,$member);
    echo "<br/>";
    echo "<button name='delete' class='button button1'>Delete</button><br/><br/>";
    //Insert
    echo "<h3 style='color: black'>เพิ่มสมาชิก</h3>";
    echo "ID : <input name='id' type='text'><br/>";
    echo "Name : <input name='name' type='text'><br/>";
    echo "Surname : <input name='surname' type='text'><br/>";
    echo "Username : <input name='username' type='text'><br/>";
    echo "<br/>";
    echo "<button name='insert' class='button button1'>Insert</button>";
    echo "</center>";
    echo "<br/>";
    if(isset($_POST['insert'])) {
        add_user($_POST['id'], $_POST['name'], $_POST['surname'], $_POST['username'], $_POST['class']);
        echo "<script>alert(\"Add user success !!\");window.location='manage_user.php';</script>";
    }
    if(isset($_POST['delete'])) {
        $selected_id="";
        for ($j = 0; $j < count($member); $j++) {
            if (!empty($_POST["$j"])) {
                $selected_id = $member["$j"][0];
                del_user($selected_id);
            }
        }
        if($selected_id==""){
            echo "<script>alert(\"Please select user !!\");window.location='manage_user.php';</script>";
        }
        else {
            echo "<script>alert(\"Delete user success !!\");window.location='manage_user.php';</script>";
        }
    }
    echo "</form>";
    include ("footer.php");
    show_source("db_connect.inc.php");
    show_source("db_user.inc.php");
    show_source("header.php");
    show_source("manage_user.php");
    show_source("footer.php");
?>