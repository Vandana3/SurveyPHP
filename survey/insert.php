<html>
<head>
<?php
session_start();
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("survey") or die("Cannot connect to database");
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

<?php
if(isset($_SESSION['keys'])) {
  $keys_array = $_SESSION['keys'];
  foreach ($keys_array as $key) {
    if(isset($_SESSION[$key])) {
        $my_array=$_SESSION[$key];
        $name = $my_array[4];
        $val = $my_array[5];
        if (isset($_POST[$name]) && $_POST[$name] == $val) {
        $my_string = "INSERT INTO `view_answer`(username,Survey_id,que_title,choice_text) VALUES ('$my_array[0]',$my_array[1],'$my_array[2]','$my_array[3]');";
        //print_r($my_array);
        mysql_query($my_string);
        unset($_POST[$name]);
        }
        unset($_SESSION[$key]);
      }
  }
unset($_SESSION['keys']);
}

?>
<div class="container">
<header> <h1> THANK YOU FOR TAKING THE SURVEY </h1> </header>
<article>

  

</article>

<footer>
<a href="survey.php">Go Back to Take Survey!
</footer>

</div>

