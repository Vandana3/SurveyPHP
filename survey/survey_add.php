<html>
    <head>
	<?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
   ?>
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
	font-size:30;
	text-align:center;
	height:100%;
    margin-left: 20px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}
footer {
	padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
    bottom: 0;
	position: absolute;
	width:98%;
	}
</style>
    </head>
    <body>
        <div class="container">
		<header><h1> WELCOME TO SURVEY SITE </h1> </header>
		<article>
  <form role="form" action="survey_add.php" method="post">

<label for="text">Survey Title:</label><input type="text" name="s_title" placeholder="Enter title here">
 <br><br><br>

<button type="submit">Submit</button>




  </form>
 

</article>
	<footer>
	<h2> SURVEY SITE </h2>
	</footer>
	</div>
	</body>
</html> 

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("survey") or die("Cannot connect to database");
	$s_title = mysql_real_escape_string($_POST['s_title']);
	mysql_query("INSERT INTO survey_tab (s_title) VALUES ('$_POST[s_title]')");
	Print '<script>window.location.assign("question_add.php");</script>';
	}
?>

