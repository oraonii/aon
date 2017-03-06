<?php
include ("db_connect.inc.php");
function member(){
    global $con;
    $member=[];
    if($res=$con->query("SELECT * FROM members WHERE class='user'")){
        while($data=$res->fetch(PDO::FETCH_OBJ)){
                $member[]=array($data->id,$data->name,$data->surname,$data->username);
        }
       return $member;
    }
}
function login($username,$pwd){
    global $con;
    $detail=[];
    if($res=$con->query("SELECT * FROM members")){
        while($data=$res->fetch(PDO::FETCH_OBJ)){
            if($username==$data->username && $pwd==$data->passwd){
                $detail=array($data->id,$data->name,$data->surname,$data->class);
                return $detail;
            }
        }
        return $detail;
    }
}
function create_table($header,$data){
    if(!empty($data)){
        $l=0;
        echo "<table>";
        echo "<tr>";
        for($i=0;$i<count($header);$i++){
            echo "<th><center><span style='font-weight: bold'>$header[$i]</span></center></th>";
        }
        echo "</tr>";

        foreach ($data as $value) {
            echo "<tr>";
            foreach ($value as $result) {
                echo "<td>" . $result . "</td>";
            }
            echo "</tr>";

        }
        echo "</table>";
    }
}
function add_user($id,$name,$surname,$username){
    global $con;
    $class='user';
    $add_sql="INSERT INTO members (id,name,surname,class,username,passwd) 
              VALUES ('$id','$name','$surname','$class','$username','$username')";
    $con->exec($add_sql);
}
function del_user($id){
    global $con;
    $del_sql="DELETE FROM members WHERE id='$id'";
    $con->exec($del_sql);
}
function edit_user($user_detail){
    global $con;
    $id=$user_detail[0];
    $name=$user_detail[1];
    $surname=$user_detail[2];
    $username=$user_detail[3];
    $edit_sql="UPDATE members SET name='$name',surname='$surname',username='$username' WHERE id='$id'";
    $stmt = $con->prepare($edit_sql);
    $stmt->execute();

}
function search_user($id){
    global $con;
    $user=[];
    if($res=$con->query("SELECT name, surname, username FROM members WHERE id='$id'")){
        $data=$res->fetch(PDO::FETCH_OBJ);
        $user[]=array($data->name,$data->surname,$data->username);
        return $user;
    }
}
?>