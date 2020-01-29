<?php
//$servername = "marcy.furman.edu";
$servername2="cs.furman.edu";
$username = "pmusau";
$password = "Muthkev1313";

$dbname="molrepodb";


// Create connection
$conn = new mysqli("localhost", $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
    echo $conn->connect_error;
} 
else{
	//echo "<p>Connected successfully</p>";
}
?> 

