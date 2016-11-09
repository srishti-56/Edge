
<?php
session_start();

if(isset($_SESSION['logged_user'])){
	echo "Already signed in!";
}
else {
$user=$_POST["user"];
$pass=$_POST["pass"];
$email_id= $_POST["email_id"];

$filename = 'wt.sql';
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = 'tanu1997';
$mysql_database = 'Wt';

$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database


$sql="INSERT INTO Users (user_id,password,email) VALUES ('$user','$pass','$email_id')";

if ($conn->query($sql) === TRUE) {
    echo " , You have been added!";
} else {
    echo "Error: " . "<br>" . "User exists. Try signing in!";
}

mysqli_close($conn);
}
?>

<html>
<head>
<title> Registration </title>
</head>

<body>
<p> Go to our <a href="http://localhost/Wt/login.html" >login page </a> to sign in! </p>
</body>
</html>
</html>
