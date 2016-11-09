<?php
session_start();
?>
<html>
<head>
<link rel='stylesheet' href='http://localhost/Wt/css/table.css'/>
<link rel='stylesheet' href='http://localhost/Wt/css/style.css'type="text/css"/>
  <title>Leaderboard</title>
</head>

<body>
<div id="header" style="background-color:#19334d" >
  <a href="http://localhost/index.php"><img src="http://localhost/Wt/img/edge.jpg" style="margin-left:30%;"></a>
</div>


<nav>
  <ul id="ul">
    <li id="li">
      <a id="lia" href="learn.php"> <span>Learn</a> </span> </li>

    <li id="li" class="dropdown" "style="padding-left:10px"><a href="#"> Gates</a>
    <div class="dropdown-content" style="z-index:20">
    <a href="AND.php">AND Gate</a>
    <a href="OR.php">OR Gate</a>
    <a href="NOT.php">NOT Gate</a>
    <a href="NAND.php">NAND Gate</a>
    <a href="NOR.php">NOR Gate</a>
    <a href="XOR.php">XOR Gate</a>
    <a href="XNOR.php">XNOR Gate</a>
    </div>
    </li>

    <li id="li"><a id="lia" href="shop.php">Shop</a></li>
    <li id="li"><a id="lia" href="test.php">Test</a></li>
     <!-- <li id="li" style="padding-left:10px"><a id="lia" href="about.html">About us</a></li> -->

    <?php if(!isset($_SESSION['logged_user'])){
    echo '<li id="signin" style="float:right; padding-right: 10px;"><a href="login.html"> Log in </a> </li>
    <li id="signin" style="float:right; padding-right: 10px;"><a href="register.html"> Register </a> </li> ' ;
    }
    ?>

     <li id="userinfo" style=" padding-top: 10px;float:right"> <span><?php if(isset($_SESSION['logged_user'])) echo '<p style="padding-right:20px; display:inline; color:white; font-weight:800"> ' . 'Welcome ' . $_SESSION['logged_user'] ; ?> </p></span>
     </li>

     <?php if(isset($_SESSION['logged_user'])){
      echo '<li id="signout" style="float:right; padding-right: 10px;"><a href="logout.php"> Logout </a> </li> ' ;
  }
  ?>
</nav>

<?php
if(!isset($_SESSION['logged_user'])){
  echo "Log in or sign up to see your score on the leaderboard!";
}

$user = $_SESSION['logged_user'];


if(!isset($_POST)){
  echo "Form not submitted";
}
$a = array();
$a[1]=$_POST['a'][0];
$a[2]=$_POST['a'][1];
$a[3]=$_POST['a'][2];
$a[4]=$_POST['a'][3];
$a[5]=$_POST['a'][4];

/* echo "Q1: " . $a[1];
echo "Q2: " . $a[2];
echo "Q3: " . $a[3];
echo "Q4: " . $a[4];
echo "Q5: " . $a[5] ."   " ;  */

$score = 0;

$filename = 'wt.sql';
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = 'tanu1997';
$mysql_database = 'Wt';

$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

for($i = 1; $i <6; $i++){
  $query = "SELECT A_key FROM Test WHERE Q_id='". $i. "' AND T_id='1' ";
  $results = $conn->query($query);
  while($row = mysqli_fetch_array($results,MYSQL_ASSOC)){
    //echo $row['A_key'];
    if($row['A_key'] == $a[$i]){
      $score++;
    }
  }
}

if(!isset($_SESSION['logged_user'])){
  echo "<h2> Log in or sign up to see your score on the leaderboard! ";
  echo "Your score is " . $score ;
}
else {
$sql = "UPDATE Users SET Score='". $score."' WHERE user_id = '". $user."' ";
if($conn->query($sql) ===TRUE)
  echo "Updated scores";
  //echo "You are signed in as ". $user ;
}

// echo "  " . $score;


?>

<div class="table-title">
<h3>Leaderboard</h3>
</div>

<table style="margin-bottom:40px;" class="table-fill">
<thead>
<tr>
<th class="text-left">Users</th>
<th class="text-left">Scores</th>
</tr>
</thead>
<tbody class="table-hover">
<?php
 $users = "SELECT user_id,Score FROM Users ORDER BY Score DESC";
 $query_s = $conn->query($users);
 if($query_s->num_rows>0){
 while($row = $query_s->fetch_assoc()){
  echo ' <tr> <td class="text-left">' . $row['user_id'] . '</td>' ;
  echo "<td class='text-left'>" . $row['Score'] . "</td> </tr>" ;
 }
}
else echo "No entries yet";
$conn->close();
?>

</tbody>
</table>

</body>
</html>