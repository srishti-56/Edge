<?php
session_start();

$filename = 'wt.sql';
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = 'tanu1997';
$mysql_database = 'Wt';

$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$q = $_POST['question'];
$add = Array();

$query = "SELECT Q FROM Test WHERE Q_id= '". $q. "' AND T_id = '1' " ;
$results = $conn->query($query);
while ($row = mysqli_fetch_array($results, MYSQL_ASSOC)) {
	$add[] = $row; 

	$query_op = "SELECT Op FROM Options WHERE Q_id= '". $q. "' AND T_id= '1' GROUP BY Op_id ";
	$results_op = $conn->query($query_op);
 	for($i=0;$i<4; $i++){
		while($row_op = mysqli_fetch_array($results_op,MYSQL_ASSOC)){
			$add[] = $row_op; 
		}
	}
}

echo json_encode($add);  //Encode an Associative array






mysqli_close($conn);

?>