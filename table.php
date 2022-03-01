<?php
// Initialize the session
session_start();
 
// Check if the user is already logged out, if yes then redirect him to welcome page
if(is_null($_SESSION["loggedin"])|| $_SESSION["loggedin"] == false){
    header("location: home.php");
    exit;
}

$username = $_SESSION["username"];

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "rtmfs";

// Connect to the database, run a query, handle errors
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT date, time, water FROM water WHERE username='$username';";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>

<head>
<title>RTMFS - Water Level Table</title> <!--tab title-->
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="./css/default.css" rel="stylesheet">
<link href="./img/team28.jpg" rel="icon"> <!--tab icon-->


</head>
    <body>
<div class="container">
<p><div class="top-left"><a href="./home.php">Home</a></div>
    <div class="top-right">User: <?php echo htmlspecialchars($_SESSION["username"]); ?>&nbsp&nbsp&nbsp&nbsp<a href="./logout.php">Logout</a></div>
</p>
<p>
 <div class="img"><img src="./img/team28.jpg" alt="Snow" style="width:4%;"></div>
  <div class="centered">Rainwater Tank Monitoring and Feedback System</div>
    </p>

</div>
<br>
    <table style="width:100%">
  <tr>
    <th>Date</th>
      <th>Time</th> 
    <th>Water Level (%)</th> 
  </tr>
<?php while ($row = $result->fetch_assoc()): ?>
    <tr>
    <td>
        <?php echo htmlspecialchars($row['date'], ENT_HTML5, 'UTF-8') ?>    </td>
    <td>
        <?php echo htmlspecialchars($row['time'], ENT_HTML5, 'UTF-8') ?>    </td>
        <td>
        <?php echo htmlspecialchars($row['water'], ENT_HTML5, 'UTF-8') ?>    </td>
    </tr>
<?php endwhile ?>

</table>
</body>

</html>