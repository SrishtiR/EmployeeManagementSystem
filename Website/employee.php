<html>
<head>
</head>
<body>
<?php
$con = mysql_connect("localhost","root","");
mysql_select_db("emp_mngt", $con);
if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }
  
$sql = 'SELECT Employee_ID, First_Name, Last_Name FROM employee_details where Employee_ID="1"';
$retval = mysql_query( $sql, $con );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
    echo "EMP ID :{$row['Employee_ID']}  <br> ".
         "EMP NAME : {$row['First_Name']} <br> ".
         "EMP SALARY : {$row['Last_Name']} <br> ".
         "--------------------------------<br>";
} 
echo "Fetched data successfully\n";
mysql_close($con);
?>
</body>
</html>