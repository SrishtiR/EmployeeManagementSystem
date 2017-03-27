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

  
   
    <form action = "update.php" method = "post" class="user_reg" align="center" id="edit">
      <h2 style=background:#1dabb8> Edit Profile</h2>
     <input type="text" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}" name="fname"><br><br>
     <input type="text" name="mname" value="Middle Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Middle Name';}" ><br><br>
     <input type="text" name="lname" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}" ><br><br>
     <input type="text" name="phno" value="Phone Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone Number';}" ><br><br>
     <input type="text" name="cname" value="City" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'City';}" ><br><br>
     <input type="text" name="addr" value="Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}" ><br><br>
     <input type="text" name="pcode" value="Postal Code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Postal Code';}" ><br><br>
     <input type="text" name="empid" value="Employee ID" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Employee ID';}" ><br><br>
     <input type="password" name="pwd" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" ><br><br>
	 
     <input type="text" name="nationality" value="nationality" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'nationality';}" ><br><br>
     <input type="text" name="gender" value="gender" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'gender';}" ><br><br>
	 <input type="text" name="p_exp" value="p_exp" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'previous experience';}" ><br><br>
	 <input type="text" name="email" value="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'email';}" ><br><br>
	 <input type="text" name="bday" value="bday" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Birthday(dd/mm/yyyy)';}" >
     
     
     
     
    
     <div id="reg-form"><input type="submit"  value="change values" ></div>
   
  
  </form>
 
 </body>
 </html>
