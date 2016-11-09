
<?php
session_start();

$user=$_POST["user"];
$pass=$_POST["pass"];
//echo $user;
//echo $pass;
$flagu=0;
$flagp=0;

$filename = 'wt.sql';
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = 'tanu1997';
$mysql_database = 'Wt';

$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$query = "SELECT * FROM Users WHERE user_id='".$user. "' ";
$retval = $conn->query($query);
if(!$retval){
	//die("User doesn't exist." .mysql_error());
	echo "User does not exist.";
	echo '  <a href="http://localhost/Wt/register.html" </a>' . "Sign up with us!" ;
}

while($row=mysqli_fetch_array($retval,MYSQL_ASSOC))
{
	if($row['user_id']===$user)
	{$flagu=1;	
  	 if($row['password']===$pass){
		echo "successfully logged in";
		$_SESSION['logged_user'] = $user;
		$_SESSION['score'] = $row['score'];
		$_SESSION['email'] = $row['email_id'];
		$flagp=1;
		header("location: http://localhost/index.php");
		}
	}
}
if($flagu===1 && $flagp===0)
	echo "Incorrect password!" . "<a href='http://localhost/Wt/login.html' Log in again! </a> ";
if($flagu==0){
	echo "User does not exist.";
	echo '  <a href="http://localhost/Wt/register.html" </a>' . "Sign up with us!" ;
}
mysqli_close($conn);

?>

<html>
<body>

</body>
</html>