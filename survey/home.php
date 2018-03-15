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
	position: fixed;
	width:98%;
	}

</style>
</head>
<body>
<div class="container">
<header> <h1> WELCOME </h1> </header>
<article>

        
<h2 style="text-align:center"><a href="survey_add.php"> ADD SURVEY </a> <br><br><br><br>
<a href="view_ans.php"> VIEW ANSWERS </a>  <br><br><br><br>
<a href="delete.php"> DELETE SURVEY </a> </h2>

</article>

<footer>
<a href="logout.php">click here to log out
</footer>

</div>
