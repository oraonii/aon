<?php
    define("DSN","mysql:dbname=aon;host=localhost");
	define("DBUSER","aon");
	define("DBPASS","1234");
    try{
        $con=new PDO(DSN,DBUSER,DBPASS);
    }catch (PDOException $e){
        echo 'Connection failed: '.$e->getMessage();
    }
?>