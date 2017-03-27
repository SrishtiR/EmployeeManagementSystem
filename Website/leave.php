<!DOCTYPE html>
    <html>
    <head>
       <meta charset="UTF-8">
    
    <link rel="stylesheet" type="text/css" href="empstyle.css">
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
             <li >
                <a href="user_home.php">Home</a>
              </li>
              <li >
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

		
	       <div class="contact1">
	       
	       
	<?php
				
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
				 
					
				 echo "Number of leaves taken this month: ";
					echo "{$row['Off_Days']}  <br><br> ";
					}
					



?>
 <form method="post" action=" ">
 Enter the number of leaves needed: <input type="text" name="leaves" size="4"><br><br>
 <input type="submit" name="sub" id="shiny3">
 </div>
  <?php
  if(isset($_POST['sub']))
 {
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
 if($leaves+$taken >=5) {
echo ("<SCRIPT LANGUAGE='JavaScript'>
         window.alert('Crossed')
         window.location.href='leave.php';
         </SCRIPT>");
         
 }
 else if($leaves>0 && $leaves+$taken <5)
  {echo ("<SCRIPT LANGUAGE='JavaScript'>
         window.alert('Leave request granted!')
         window.location.href='leave.php';
         </SCRIPT>");
         $offdays_new = $taken + $leaves;
         mysql_query("UPDATE time_info SET Off_Days= '$offdays_new' WHERE Employee_ID = '$emp_id' ") or die(mysql_error());}
    
   // if($offdays<=5)
    //	mysql_query("UPDATE time_info SET Off_Days= '$offdays_new' WHERE Employee_ID = '$emp_id' ") or die(mysql_error());
         }
         
 
 ?>
 
</body>
</html>

