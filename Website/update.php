<html>

<body>
<?php
$con = mysql_connect("localhost","root","");
mysql_select_db("emp_mngt", $con);
if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }

 $emp_id=$_POST['empid'];
 //echo $emp_id;
 $sql="UPDATE employee_details SET First_Name='$_POST[fname]', Last_Name='$_POST[lname]',password='$_POST[pwd]' WHERE Employee_ID=$emp_id"; 
    

if (!mysql_query($sql,$con))

  {

  die('Error: ' . mysql_error());

  }
  echo "1 record updated";
$sql1="UPDATE contact_person_info SET c_First_Name='$_POST[fname]',c_Middle_Name='$_POST[mname]', c_Last_Name='$_POST[lname]',Phone_Number='$_POST[phno]',c_City='$_POST[cname]',c_Address='$_POST[addr]',c_Postal_Code='$_POST[pcode]',bday='$_POST[bday]',gender='$_POST[gender]',nationality='$_POST[nationality]' WHERE Employee_ID=$emp_id"; 
if (!mysql_query($sql1,$con))

  {

  die('Error: ' . mysql_error());

  }
  echo "1 record updated";

/*$sql2="INSERT INTO salary_info (Employee_ID) VALUE  ('$_POST[empid]')";
if (!mysql_query($sql2,$con))

  {

  die('Error: ' . mysql_error());

  }
  echo "1 record added";
$sql3="INSERT INTO time_info (Employee_ID) VALUE  ('$_POST[empid]')";




if (!mysql_query($sql3,$con))

  {

  die('Error: ' . mysql_error());

  }
  echo "1 record added";*/

 

mysql_close($con);





?>

</body>

</html>

 
