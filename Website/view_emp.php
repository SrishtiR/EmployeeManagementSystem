<html>

 <head>
<link rel="stylesheet" type="text/css" href="empstyle.css">
    <!-- Le styles -->
     <meta charset="UTF-8">
	
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    
    <script>
    
document.getElementById("login-form").style.visibility = "hidden";

    
    
    </script>
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
               <li >
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

    <h3>View Employee</h3>

    <fieldset>

      <form action="" method="post">
	  <div class = "user_reg">

        <input type="text" name="id" value = "Employee ID" onBlur="if(this.value=='')this.value='Employee ID'" onFocus="if(this.value=='Employee ID')this.value=''"  > 
        <input type="submit" name="submit" value="View employee" onclick="visibility()">
        <select name='dept'>
        <option value="select">Select</option>
        <option value="Manager">Manager</option>
        <option value="Assistant">Assistant</option>
        <option value="Clerk">Clerk</option>
                
         
        <input type="submit" name="view" value="View employees">
	</div>
      

      </form>

    </fieldset>

  </div>

</div>
  
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
	//echo $ID;
	$result=mysql_query("SELECT * from salary_info WHERE Employee_ID='$ID'");
	$row=mysql_fetch_array($result);
	echo '<div class="detail">';
	echo "<table id='detail' border=0px >";
	echo "<tr><td><b>salary:  </b></td><td>".$row['Monthly_Salary']."</td></tr>";
	//echo "<tr><td><b>deduction:  </b></td><td>".$row['Monthly_Dedudction']."</td></tr>";
	$result1=mysql_query("SELECT * from time_info WHERE Employee_ID='$ID'");
	$row1=mysql_fetch_array($result1);
	
	echo "<tr><td><b>Worked Hours:  </b></td><td>".$row1['Worked_Hours']."</td></tr>";
	echo "<tr><td><b>Off days:  </b></td><td>".$row1['Off_Days']."</td></tr></table>";
	echo "</div>";
	
	
	
	
} 


if(isset($_POST['view'])) {


//header("location:rankfilter.php");
$con = mysql_connect("localhost","root","");
    mysql_select_db("emp_mngt", $con);
	if (!$con)
	{

			die('Could not connect: ' . mysql_error());

	}
	$dept=$_POST['dept'];
	$result=mysql_query("SELECT * from salary_info WHERE Rank='$dept'");
	echo '<div class="detail">';
	while($row = mysql_fetch_array($result))
	{
	echo "<table border=1px>";
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
	echo '</div>';
	
	}
	
	?>
  
