<html>
    <head>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
      <script src="jquery-3.2.1.js"></script>
      <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <?php
      session_start(); 
     if ($_SESSION['user']) {
        # code...
      }   
   
   else{
      header("location: index.php");
   }
   $user = $_SESSION['user']; 

    mysql_connect("localhost","root","") or die(mysql_error());
    mysql_select_db("survey") or die("Cannot connect to database");

    $su_id1 = $_SESSION['ts_id'];
    $result = mysql_query("SELECT Survey_id FROM `survey_tab` where Survey_id = '$su_id1';");
    $row = mysql_fetch_row($result);

    $id = $row[0];
    $result1 = mysql_query("SELECT que_title from `question` where Survey_id ='$su_id1';");
 
    ?>
   <style>
  .centerdv
  {
    margin-left: auto;
    margin-right: auto;
    text-align: center;
  }
  .header-top
  {
    margin-top: 5%;
  }

header{
  
    padding: 0.5em;
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
<div class="jumbotron container centerdv header-top">
<header> <h2 style="text-align:center">TAKE SURVEY  <?php echo $id; ?> </h2> </header>
</div>
<article>

        <form method = "post" action = "insert.php">
        <input type = "hidden" name = "survey_id" value ="" >
        <?php while($question = mysql_fetch_row($result1)): ?>
          <?php foreach ($question as $key => $value): ?>

        
            <div class = "container centerdv">
            <div class = "well page-header">
            <b><?php print_r($value);?></b>
            <?php $intermediate = mysql_query("SELECT que_id from `question` where que_title ='$value';");
            $row1 = mysql_fetch_row($intermediate);

            $id1 = $row1[0];

            $result2 = mysql_query("SELECT choice_text,choice_id from `choice` where Survey_id ='$su_id1' and que_id ='$id1';");
            ?>
            </div>
            <?php while($choice = mysql_fetch_row($result2)) : ?>
                <label class="radio inline">
                <input type="radio" name ="<?php echo $id1;?>" value = "<?php echo $choice[1];?>">
                <?php echo $choice[0]; ?>
                </label>
        
        <?php endwhile; ?>
        <?php endforeach; ?>
        <?php endwhile; ?>
        <input type = "submit" value = "Complete!" class = "btn btn-lg btn-success" >
        </div>
        </form>
</article>
</body>
</html>



