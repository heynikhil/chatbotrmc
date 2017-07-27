
<?php
$servername = "host=ec2-54-221-221-153.compute-1.amazonaws.com";
$username = "lthwqfdnbwcqvs";
$password = "ec3c382e3ec579974a5cbf4de9be4ba386ec84fe69483980b5f555e6b909b48a";
$dbname = "de2fc7r4pt13n1";

// Create connection
$conn = new pg_connect($servername, $username, $password, $dbname);

?>
