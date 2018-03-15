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
	   tr{
		   text-align: center;
	   }
	   
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
	<article>
	<form method="post">
 <label for="survey_id"> Survey_id <input type="text" name="survey_id" required="required" />
 <button type="submit" value="submit">DELETE!</button>
 </form>
</article>		
		<?php
			mysql_connect("localhost","root","") or die(mysql_error());
			mysql_select_db("survey") or die("Cannot connect to database");
			$result = mysql_query("SELECT * FROM survey_tab");
		?>

				
	</article
	<footer> <a href = "logout.php"logout </a>
	</footer>
	</body>
	</html>