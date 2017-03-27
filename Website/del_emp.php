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

 
    
 
   
    <form action = " " method = "post" class="user_reg" align="center" id="edit">
    <h2 style=background:#1dabb8> Delete Employee</h2>
     <input type="text" value="Employee ID" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Emoloyee ID';}" name="id">
	 <div id="reg-form"><input type="submit"  value="delete details" name="submit"></div>
   
  
  </form>
  
  </body>
  </html>
  
<?php

if(isset($_POST['submit']))
{
	$con = mysql_connect("localhost","root","");
    mysql_select_db("emp_mngt", $con);
	if (!$con)
	{

			die('Could not connect: ' . mysql_error());

	}
	$ID=$_POST['id'];
	$query=mysql_query("DELETE FROM contact_person_info WHERE Employee_ID='$ID'");
	$query1=mysql_query("DELETE FROM employee_details WHERE Employee_ID='$ID'");
	$query2=mysql_query("DELETE FROM salary_info WHERE Employee_ID='$ID'");
	$query3=mysql_query("DELETE FROM time_info WHERE Employee_ID='$ID'");
	
}
?>
