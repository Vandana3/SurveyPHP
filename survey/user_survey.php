
<?php 
	session_start();
	 $username= $_SESSION['usern'];
	 mysql_query("INSERT INTO `user_survey` (`username`, `Survey_id`) VALUES ('rama', '');");
	 Print '<script>window.location.assign("index.php");</script>';
?>