<!DOCTYPE html>
<html>
<head>
<style>
div.container {
    width: 100%;
    border: 1px solid gray;
	font-size: 110%;
	
}

header{
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
	
}
article {
	height: 110%;
    margin-left: 20px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
	bottom: 0;
}
footer {
	position: absolute;
	bottom: 0;
	width: 100%;
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
	
}

</style>
</head>
<body>

<div class="container">

<header>
   <h1>Register here</h1>
</header>


<article>
  <form role="form" action="register.php" method="post">

<label for="text">
First name:</label>
<input type="text" name="fname" placeholder="Enter first name">
 <br><br><br>

<label for="text">
Last name:</label>
<input type="text" name="lname" placeholder="Enter last name">

<br><br><br>

      <label for="email">Email:</label>
      <input type="email" name="email" placeholder="Enter email">
    <br><br><br>
	
	<label for="username"> Username </label>
   <input type="text" name="username" placeholder="enter username" required="required">

<br><br><br>
    
     <label for="password"> Enter password: </label> <input type="password" name="password" required="required" />   
 <br><br><br>
 
<button type="submit" class="btn btn-default">Submit</button>
  </form>




  </article>



<footer>Thank you!</footer>

</div>

</body>
</html>

<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$fname = mysql_real_escape_string($_POST['fname']);
	$lname = mysql_real_escape_string($_POST['lname']);
	$email = mysql_real_escape_string($_POST['email']);
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$bool = true;
	
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("survey") or die("Cannot connect to database");
	$query = mysql_query("Select * from admin");
	while($row = mysql_fetch_array($query))
	{
		$table_users = $row['username'];
		if($username == $table_users)
		{
			$bool = false;
			Print '<script>alert("Username has been taken");</script>';
			Print '<script>window.location.assign("register.php");</script>';
		}
	}
	
	if($bool)
	{
		mysql_query("INSERT INTO admin (username, password, fname, lname, email) VALUES ('$username','$password','$fname','$lname','$email')");
		$result2=mysql_query("SELECT Survey_id from survey_tab;");
		while($surid = mysql_fetch_row($result2)): 
   			 foreach ($surid as $key => $value): 
   			 	mysql_query("INSERT INTO `user_survey` (`username`, `Survey_id`) VALUES ('$username', '$value');");
   			 endforeach;
   		endwhile;


		
		

		Print '<script>alert("Successfully Registered!");</script>';
		Print '<script>window.location.assign("index.php");</script>';
		
	}
}
?> 