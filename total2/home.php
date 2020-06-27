<?php
// Initialize the session
session_start();
 
// Check if the user is already logged out, if yes then redirect him to welcome page
if(is_null($_SESSION["loggedin"])|| $_SESSION["loggedin"] == false){
    header("location: login.php");
    exit;
}



$username = $_SESSION["username"];
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "rtmfs";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, starttime, endtime, wdrop FROM error WHERE username='$username';";
$result = $conn->query($sql);
//$row = $result->fetch_assoc();

?>


<!DOCTYPE html>
<html>
<head>
<title>RTMFS - Team 28</title> <!--tab title-->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- to scale if on smaller or larger screens -->

    <link href="./css/default.css" rel="stylesheet">
    <link href="./img/team28.jpg" rel="icon"> <!--tab icon-->
</head>

</head>
<body>
<div class="container">
<p><div class="top-left"><a href="home.php">Home</a></div>
    <div class="top-right">User: <?php echo htmlspecialchars($_SESSION["username"]); ?>&nbsp&nbsp&nbsp&nbsp<a href="./logout.php">Logout</a></div>
</p>
<p>
 <div class="img"><img src="./img/team28.jpg" alt="Snow" style="width:4%;"></div>
  <div class="centered">Rainwater Tank Monitoring and Feedback System</div>
    </p>

</div>
<div class="redcont"> // Alert - will display if water level drops suddenl between readings.
<?php 
while ($row = $result->fetch_assoc())
    {
echo "ALERT! between ".htmlspecialchars($row['starttime'], ENT_HTML5, 'UTF-8')." and ".htmlspecialchars($row['endtime'], ENT_HTML5, 'UTF-8')." the water level of your tank dropped by ".htmlspecialchars($row['wdrop'], ENT_HTML5, 'UTF-8')."%";
 echo nl2br("\r\n");           
}

    ?>
</div>
<div style="text-align: center"> // Clear alerts button
<form action="/total2/delete_alerts.php">

                <input type="submit" value="Clear Alerts if Present">

        </form>    
</div>

<div class="pos"> // User can select a graph or a table to view their data.
    <div class="button1"><a href="graph.php">Graph</a></div><br>
    <img class="button3" src="./img/table.PNG" alt="Snow" style="width:45%;">
        <img class="button4" src="./img/graph.PNG" alt="Snow" style="width:40%;">
   

    <div class="button2"><a href="table.php">Table</a>
    </div><br>


</div>

<p>
</p>



</body>
</html> 
