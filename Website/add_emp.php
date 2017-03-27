<?php
$con = mysql_connect("localhost","root","");
    mysql_select_db("emp_mngt", $con);
	if (!$con)
	{

			die('Could not connect: ' . mysql_error());

	}


//echo $ID;
//$result=mysql_query("SELECT * FROM salary_info,time_info where Employee_ID='$ID'");
//$row=mysql_fetch_array($result);
//$id=$row['id'];
/*$w_hours=$row['Worked_Hours'];
$off=$row['Off_Days'];
$salary=$row['Monthly_Salary'];
$deduction=$row['Monthly_Dedudction'];*/

if(isset($_POST['save']))
{
	$ID=$_POST['emp_id'];
	$rank = $_POST['rank'];
	
	$salary=$_POST['salary'];
	
	
	$sql = "INSERT into salary_info (Monthly_Salary,Employee_ID,Rank)  VALUE ('$salary','$ID','$rank')" ;
	
	if (!mysql_query($sql,$con))

  {

  die('Error: ' . mysql_error());

  }
 
	/*mysql_query("UPDATE salary_info,time_info SET salary_info.Monthly_Salary='$salary_new',salary_info.Monthly_Dedudction='$deduction_new',time_info.Worked_Hours='$w_hours_new', time_info.Off_Days='$off_new' where salary_info.Employee_ID='$ID' and time_info.Employee_ID='$ID'") or die(mysql_error());*/
/*	$result=mysql_query("SELECT email from contact_person_info WHERE Employee_ID='$ID'");
	$row=mysql_fetch_array($result);
	echo $row['email'];
	require_once "mail.php";
    $type="text/html";
	$from='gmail.com';
	$to=$row['email'];
	$subject="Updation in your salary";
	$body="your salary has been updated. Following are the changes. your monthly salary is now <br>".$salary;

	$host="ssl://smtp.gmail.com";
	$port=465;
	$username="accnew114@gmail.com";
	$password="accnew@114";

	$headers=array('Content-Type'=>$type,'From'=>$from,'To'=>$to,'Subject'=>$subject,'Body'=>$body);
	$smtp=@Mail::factory('smtp',array('host'=>$host,'port'=>$port,'auth'=>true,'username'=>$username,'password'=>$password));
	$mail=@$smtp->send($to,$headers,$body);
	
	//header('Location:disp_emp.html');*/
	
}
?>

 <html>
 <head>
 <link rel="stylesheet" type="text/css" href="empstyle.css">
 
    <!-- Le styles -->
     <meta charset="UTF-8">
	
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
	    </head>
	     <body>
	      <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li >
                <a href="admin_home.html">Home</a>
              </li>
               <li>
                <a href="add_emp.php">Add</a>
              </li>
               <li >
                <a href="edit_emp.php">Edit</a>
              </li>
               <li >
                <a href="view_emp.php">View</a>
              </li>
               <li >
                <a href="del_emp.php">Delete</a>
              </li>
              <li id="logout">
                <a href="logout.php">Logout</a>
              </li>
             
         
            </ul>
         
          </div>
        </div>
      </div>
    </div>

<div class="con1">
 <div id="login-form">

    <h3>Add Employee</h3>

    <fieldset>

      <form action="" method="post">
	  <div class = "user_reg">

        <input type="text" required name="emp_id" value = "Employee ID" onBlur="if(this.value=='')this.value='Employee ID'" onFocus="if(this.value=='Employee ID')this.value=''"  > 
        <select name='rank'>
        <option value="select">Select</option>
        <option value="Manager">Manager</option>
        <option value="Assistant">Assistant</option>
        <option value="Clerk">Clerk</option>
         <input type="text" required name="salary" value ="Monthly Salary" onBlur="if(this.value=='')this.value='Monthly Salary'" onFocus="if(this.value=='Monthly Salary')this.value=''"  > 
         
           
        <input type="submit" name="save" value="Add employee">
	</div>
      

      </form>

    </fieldset>

  </div>

</div>

 </body>
 </html>

 
