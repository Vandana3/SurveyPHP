<!DOCTYPE html>
<html>
<head>
<style>
div.container {
    width: 100%;
    border: 1px solid gray;
	font-size: 110%;
	
}

header {
	
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
	
}
article{
	min-heigth: 200%;
    margin-left: 20px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}

footer {
	position:absolute;
	bottom:0;
	width:100%;
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
   <h1> LOGIN</h1>
</header>


<article>


    <h3 style="text-align: center"> <a href="index.php">Click here to go back</a> </h3>
	<br><br>
        <form action="checklogin1.php" method="POST">
         <h2 style="text-align: center">  Enter Username: <input type="text" name="username" required="required" /> <br/>
           Enter password: <input type="password" name="password" required="required" /> <br/> </br> </br>
           <input type="submit" value="Login"/>
		   </h2>
        </form>
 
  




  </article>



<footer>SURVEY SITE</footer>

</div>

</body>
</html>
