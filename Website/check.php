<?php
session_start();
//if(isset($_POST['submit']))
//{
 $con = mysql_connect("localhost","root","");
mysql_select_db("emp_mngt", $con);
if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }
 $emp_id=$_POST['emp_id'];
 $pass=$_POST['pass'];
 if($emp_id!=''&&$pass!='')
 {
   $query=mysql_query("select * from employee_details where Employee_ID='".$emp_id."' and password='".$pass."'") or die(mysql_error());
   $res=mysql_fetch_row($query);
   if($res)
   {
    $_SESSION['emp_id']=$emp_id;
	header('Location:user_home.php');
    //echo 'weell done';
   }
   else
   {
    //echo'You entered username or password is incorrect';
	echo ("<SCRIPT LANGUAGE='JavaScript'>
         window.alert('You entered username or password is incorrect')
         window.location.href='index1.html';
         </SCRIPT>");
   }
 }
 
 
//}
?>
