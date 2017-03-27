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
   $sql = "SELECT image FROM pictures WHERE Employee_ID = '$emp_id'";

     // the result of the query
    $result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
   while($row = mysql_fetch_assoc($result)){
echo '<div id=conx><a href="new1.php"><img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" id ="upload"/><figcaption>My Profile</figcaption></a></div>';
}
		?>
	
		 
	       
		</div>
		
		
		
		<div id="cony">
		<a href="leave.php"><img src="leave.jpeg"><figcaption>Request Leaves</figcaption></img></a>
		</div>
		</div>
	
		<div id="conz">
		<a href="salary.php"><img src="dollar.png"><figcaption>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSalary</figcaption></img></a>
		
		 </body>
	</html>
