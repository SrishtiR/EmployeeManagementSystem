<?php
 $emp_id=$_SESSION['emp_id'];
				$con = mysql_connect("localhost","root","");
mysql_select_db("emp_mngt", $con);
if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }
	$sql = "SELECT * FROM time_info where Employee_ID='$emp_id'";
  $retval = mysql_query( $sql, $con );
  
  if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
			{
			$taken = $row['Off_Days'];
			}
					
 $leaves = $_POST['leaves'];
 if($leaves+$taken >5) {
echo ("<SCRIPT LANGUAGE='JavaScript'>
         window.alert('Crossed')
         window.location.href='leave.php';
         </SCRIPT>");
         
 }
 else if($leaves>0 && $leaves+$taken <5)
 echo ("<SCRIPT LANGUAGE='JavaScript'>
         window.alert('Leave request granted!')
         window.location.href='leave.php';
         </SCRIPT>");
 ?>
