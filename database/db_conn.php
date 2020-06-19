<!-- create connection to database with php file -->

<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "admin";
 $dbpass = "admin";
 $db = "elibrary";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 return $conn;
 }

function CloseCon($conn)
 {
 $conn -> close();
 }

?>
