<?php

$con = mysql_connect("localhost","root","");
    mysql_select_db("emp_mngt", $con);
	if (!$con)
	{

			die('Could not connect: ' . mysql_error());

	}
	$dept=$_POST['dept'];
	$result=mysql_query("SELECT * from salary_info WHERE Rank='$dept'");
	
	while($row = mysql_fetch_array($result))
	{
	echo "<table border=1px solid blue>";
	$id=$row['Employee_ID'];
	$result1=mysql_query("SELECT * from contact_person_info WHERE Employee_ID='$id'");
	$row1 = mysql_fetch_array($result1);
	echo "<tr><td><b>salary:  </b></td><td>".$row['Monthly_Salary']."</td></tr>";
	echo "<tr><td><b>email:  </b></td><td>".$row1['email']."</td></tr>";
	echo "<tr><td><b>first name:  </b></td><td>".$row1['c_First_Name']."</td></tr>";
	echo "<tr><td><b>last name:  </b></td><td>".$row1['c_Last_Name']."</td></tr>";
	echo "<tr><td><b>Phone number:  </b></td><td>".$row1['Phone_Number']."</td></tr>";
	echo "<tr><td><b>Employee ID:  </b></td><td>".$row1['Employee_ID']."</td></tr>";
	echo "</table>";
	echo "<br><br><br>";
	}
	?>
