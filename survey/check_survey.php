<?php
    session_start();
    $su_id = mysql_real_escape_string($_POST['s_id']);
    $bool = true;
    $user = $_SESSION['user'];
    mysql_connect("localhost", "root", "") or die (mysql_error()); //Connect to server
    mysql_select_db("survey") or die ("Cannot connect to database"); //Connect to database
    $query1 = mysql_query("Select Survey_id from survey_tab where Survey_id = '$su_id'"); // Query the users table
    $exists = mysql_num_rows($query1); //Checks if username exists
   // $uname = $_SESSION['user'];
    $query2 = mysql_query("SELECT Survey_id,username from view_answer where Survey_id = '$su_id' and username = '$user';");
    $exists2 = mysql_num_rows($query2);
    if($exists > 0 && $exists2 == 0 )//IF there are no returning rows or no existing survey
    {

              $_SESSION['ts_id'] = $su_id;
             header("location: surveytake.php"); 
          
       }
       
        
       else
       {
        Print '<script>alert("Incorrect Survey ID!");</script>'; // Prompts the user
        Print '<script>window.location.assign("survey.php");</script>'; // redirects to login.php
       }
    

?>