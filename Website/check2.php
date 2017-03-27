<?php
//session_start();
//if(isset($_POST['submit']))
//{
 $con = mysql_connect("localhost","root","");
mysql_select_db("emp_mngt", $con);
if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }
 $admin_id=$_POST['admin_id'];
 $pass=$_POST['pass'];
 if($admin_id!=''&&$pass!='')
 {
   
   if($admin_id=='admin' && $pass=='admin')
   {
    //$_SESSION['emp_id']=$emp_id;
    echo 'weell done';
	header('location:admin_home.html');
   }
   else
   {
    echo'You entered username or password is incorrect';
	header('location:index1.html');
   }
 }
 
 
//}
?>