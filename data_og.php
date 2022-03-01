

<?php
/**
 * filename: data.php
 * description: this will return the score of the teams.
 */
session_start();
/*$_SESSION["graph"] = "week";
if($_SESSION["graph"] == "week"){
    $graph = "week";
}
*/
//setting header to json

header('Content-Type: application/json');

//database
//define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'rtmfs');
$username = $_SESSION["username"];


//get connection
$mysqli = new mysqli( 'localhost', DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}
//if ($graph == "week")
//    {
//$sql = "SELECT timedate, water FROM water WHERE timedate BETWEEN '2018-10-15 15:30:36' AND '2018-10-15 15:30:44'";
 //   }
$sql = "SELECT timedate, water FROM water WHERE username='$username'";
//AND date BETWEEN '2018-09-15' AND '2018-09-16'

//query to get data from the table
$query = sprintf($sql);

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();


//now print the data
echo json_encode($data);

?>