	
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
	text-align: center;
	font-size: 30;
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
  <form role="form" action="question_add.php" method="post">

<label for="text">Question Title:</label><input type="text" name="que_title" placeholder="Enter title here">
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

	$que_title = mysql_real_escape_string($_POST['que_title']);
	
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("survey") or die("Cannot connect to database");
	
	mysql_query("INSERT INTO question (que_title) VALUES ('$que_title')");
	
	
	$x = mysql_query("SELECT MAX(`Survey_id`) AS num FROM `survey_tab`;");
	$y = mysql_query("SELECT MAX(`que_id`) AS num1 FROM `question`;");
	
	$row = mysql_fetch_assoc($x);
	$row1 = mysql_fetch_assoc($y);
	
	$m = $row['num'];
	$n = $row1['num1'];

	//echo $m;echo $n;
	
	
	mysql_query("UPDATE question SET Survey_id = '$m' WHERE question.que_id = '$n'");
	Print '<script>window.location.assign("choice_add.php");</script>';
}
?>