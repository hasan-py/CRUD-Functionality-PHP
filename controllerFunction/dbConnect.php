<?php 

// Database details for connection
$dbserver = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "test";
		
// Connection Logic
$connection = mysqli_connect($dbserver,$dbusername,$dbpassword,$dbname);
if(!$connection){
	echo "<td>Not connected</td>";
}

?>