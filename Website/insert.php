<html>

<body>

 

 

<?php


 function checkLectureStatus()
{
$con = mysql_connect("localhost","root","");
mysql_select_db("emp_mngt", $con);
if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }

 $result = mysql_query("SELECT * FROM salary_info WHERE Employee_ID='$_POST[empid]'");
  if(mysql_num_rows($result) > 0)
  {
        
      
 $sql="INSERT INTO employee_details (First_Name, Last_Name,Employee_ID,password) VALUE  

('$_POST[fname]','$_POST[lname]','$_POST[empid]','$_POST[pwd]')";
    

if (!mysql_query($sql,$con))

  {

  die('Error: ' . mysql_error());

  }
  echo "1 record added";
$sql1="INSERT INTO contact_person_info (c_First_Name,email,c_Middle_Name, c_Last_Name,Phone_Number,c_City,c_Address,c_Postal_Code,Employee_ID,bday,gender,nationality) VALUE  

('$_POST[fname]','$_POST[email]','$_POST[mname]','$_POST[lname]','$_POST[phno]','$_POST[cname]','$_POST[addr]','$_POST[pcode]','$_POST[empid]','$_POST[bday]','$_POST[gender]','$_POST[nationality]')";
if (!mysql_query($sql1,$con))

  {

  die('Error: ' . mysql_error());

  }
  echo "1 record added";

/*$sql2="INSERT INTO salary_info (Employee_ID) VALUE  ('$_POST[empid]')";
if (!mysql_query($sql2,$con))

  {

  die('Error: ' . mysql_error());

  }
  echo "1 record added";*/
$sql3="INSERT INTO time_info (Employee_ID) VALUE  ('$_POST[empid]')";




if (!mysql_query($sql3,$con))

  {

  die('Error: ' . mysql_error());

  }
  echo "1 record added";
  
  require_once "mail.php";
$type="text/html";
$from='gmail.com';
$to=$_POST['email'];
$subject="You Are Registered";
$body="congratulations You are now registered. Your ID is ".$_POST['empid'];

$host="ssl://smtp.gmail.com";
$port=465;
$username="accnew114@gmail.com";
$password="accnew@114";

$headers=array('Content-Type'=>$type,'From'=>$from,'To'=>$to,'Subject'=>$subject,'Body'=>$body);
$smtp=@Mail::factory('smtp',array('host'=>$host,'port'=>$port,'auth'=>true,'username'=>$username,'password'=>$password));
$mail=@$smtp->send($to,$headers,$body);
header('location:index2.html');
 
   
  }
  else
  {
   mysql_close($con);
         #return "Assigned";
         echo ("<SCRIPT LANGUAGE='JavaScript'>
         window.alert('Employee ID not yet registered by the admin')
         window.location.href='reg_main.html';
         </SCRIPT>");
         
mysql_close($con);

}
 
 }


 checkLectureStatus();




?>

</body>

</html>

 
