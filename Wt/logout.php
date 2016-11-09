<?php
session_start();
//session_destroy();
session_unset();
if(isset($_SESSION['logged_user']))
echo "Still active";
else
header("Location: http://localhost/index.php");
?>