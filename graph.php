<?php
// Initialize the session
session_start();
 
// Check if the user is already logged out, if yes then redirect him to welcome page
if(is_null($_SESSION["loggedin"])|| $_SESSION["loggedin"] == false){
    header("location: home.php");
    exit;
}
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

    <div class="chart-container">
		<canvas id="line-chartcanvas"></canvas>
	</div>


         <!--javascript--> 
         <script src="./js/jquery.min.js"></script>
         <script src="./js/Chart.min.js"></script>

         <script src="./js/line-db-php.js"></script>
    
</div>

</body>
</html> 