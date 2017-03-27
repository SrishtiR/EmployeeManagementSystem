    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="empstyle.css"
   
    <!-- Le styles -->
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
              <li>
                <a href="user_home.php">Home</a>
              </li>
              <li>
                <a href="new1.php">My Profile</a>
              </li>
               <li id="me">
                <a href="leave.php">Leaves</a>
              </li>
              <li id="me">
                <a href="salary.php">Salary</a>
              </li>
             
           <li id="logout">
                <a href="logout.php">Logout</a>
              </li>
            </ul>
         
          </div>
        </div>
      </div>
    </div>



			  <div class="pic">
		
		<span align="center">
		<?php
		session_start();
				$emp_id=$_SESSION['emp_id'];
		 $host = "localhost";
 $user = "root";
 $pass = "";
 $db = "emp_mngt";
 
 
     //connect to the db
     $link = mysql_connect("$host", "$user", "$pass")
     or die("Could not connect: " . mysql_error());
   
     // select our database
     mysql_select_db("$db") or die(mysql_error());
     
    
		
		//echo ('<img src="filedisp.php" height=150 width=220>');
		$sql = "SELECT image FROM pictures WHERE Employee_ID = '$emp_id'";

     // the result of the query
    $result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
   while($row = mysql_fetch_assoc($result)){
echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" id ="upload"/>';
}
	
		?>
		<br>
		<form method = "post" action="uploaddb.php">
		
		
		<input type="submit" id="shiny1" value="Upload Image" name="upload">
		
		</form>
		
		
		</span></div>
		
		
		
	       <div class="contact">
	       <span align="center">
		<b>SUMMARY</b><br><br>
		<?php
				
				$con = mysql_connect("localhost","root","");
mysql_select_db("emp_mngt", $con);
if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }
		//About Me:<br>.'
		//echo "First name:";
		$sql = "SELECT c_First_Name, c_Last_Name, c_Middle_Name, Phone_Number,c_City,c_Address,c_Postal_Code,nationality,bday,gender FROM contact_person_info where Employee_ID='$emp_id'";
  $retval = mysql_query( $sql, $con );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
		
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
			 {echo "<table>";
				 echo "<tr><th>First name: </th>";
					echo "<td>{$row['c_First_Name']} </td>";
					
					echo "<td>{$row['c_Middle_Name']}<td> ";
					
					echo "<td>{$row['c_Last_Name']} </td> </tr> ";
					echo "<tr><th>Phone: </th>";
					echo "<td>{$row['Phone_Number']}</td></tr>";
					echo "<tr><th>City: </th>";
					echo "<td>{$row['c_City']}</td> </tr>";
					echo "<tr><th>Address: </th>";
					echo "<td>{$row['c_Address']}</td></tr> ";
					echo "<tr><th>Nationality:</th> ";
					echo "<td>{$row['nationality']} </td></tr> ";
					echo "<tr><th>Birthday:</th>";
					echo "<td>{$row['bday']} </td> </tr> ";
					echo "<tr><th>Gender:</th> ";
					echo "<td>{$row['gender']}</td></tr> ";
					echo "</table>";
			}
		//Mobile:<br>
		//Landline:<br>
		//Birthday:<br>
		//Address:<br>
		//Gender:<br>
		//Nationality:<br>
			echo "<br>
			    <b>OFFICIAL INFORMATION</b><br><br>";
				
  
  $sql = "SELECT Employee_ID FROM employee_details where Employee_ID='$emp_id'";
  $retval = mysql_query( $sql, $con );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
		echo "Employee ID:";
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
			 {
					echo "{$row['Employee_ID']}  <br> ";
			}
			mysql_close($con);
			
		//Designation:<br>
		//Department:<br>
		//Location:<br>
	    
		?>
	       </span>
		    
		</div>
	    
	      <div id="edit">
		<br><br>
		<input type="button" id="shiny" onclick="location.href='edit_prof.php'" value="Edit profile">
		</div>
		
	    </body>
	</html>
