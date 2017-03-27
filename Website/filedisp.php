<?php
 session_start();
				$emp_id=$_SESSION['emp_id'];
	 $host = "localhost";
 $user = "root";
 $pass = "";
 $db = "emp_mngt";
 
 // just so we know it is broken
 error_reporting(E_ALL);
 // some basic sanity checks

     //connect to the db
     $link = mysql_connect("$host", "$user", "$pass")
     or die("Could not connect: " . mysql_error());

     // select our database
     mysql_select_db("$db") or die(mysql_error());

     // get the image from the db
  $sql = "SELECT image,flag FROM pictures WHERE id = 30";

     // the result of the query
    $result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
   while($row = mysql_fetch_assoc($result)){
echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>';
}
    
    
	mysql_query("UPDATE pictures SET flag = 1 WHERE  id= 30") or die(mysql_error());
     
     //header("Content-type: image/jpeg");
    // echo mysql_result($result, 0);

     // close the db link
     mysql_close($link);
    
 


?>
