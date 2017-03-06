<?php
session_cache_expire(30);
session_start();
session_unset();
session_destroy();
if (ini_get("session.use_cookies")) {
    setcookie(session_name(),'',time() - 3600,"/");
}
echo "<script> alert('Logout success !!'); window.location='Home.php';</script>";
?>