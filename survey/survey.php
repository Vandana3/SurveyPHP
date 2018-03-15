<html>
<head>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
      <script src="jquery-3.2.1.js"></script>
      <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<style type = "text/css">
div.container {
    width: 100%;
    border: 1px solid gray;
	font-size: 110%;
	
}
.centerdv
    {
        margin-top: 5%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
    .idtextbox
    {
        margin-top: 5%;
        margin-bottom: 5%;
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
    .idbutton
    {
        width: 20%;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
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
<div class=" container">
<header> <h1  style="text-align:center"> SURVEY </h1></header>
<article>
 <h1 style="text-align:center">   <!--<button type="button"--><a  class="btn btn-info btn-lg" data-toggle="modal" data-target="#surveyIDmodal" >TAKE SURVEY  </a> </h1> 

<div class="modal fade" role="dialog" id = "surveyIDmodal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
        <h4>Enter a survey ID#</h4>
    </div>
    <form method = "post" class = "idtextbox" action = "check_survey.php">
        
     <!-- <input type = "text" class = "form-control" name = "s_id"> -->
	 <select name="s_id">
	 <option value="">--select--</option>
      <br>
	<?php
mysql_connect("localhost","root","");
mysql_select_db("survey");
$select="survey";
if(isset($select)&&$select!=""){
$select=$_POST['s_id'];
}
?>
<?php
$list=mysql_query("select Survey_id from survey_tab");
while($row_list=mysql_fetch_assoc($list)){
?>
<option value="<?php echo $row_list['Survey_id']; ?>">
 <?php if($row_list['Survey_id']==$select){ echo "selected"; } ?>
 <?php echo $row_list['Survey_id']; ?>
</option>
<?php
}
?>
</select>

      
      <input class = "btn btn-success" onClick="window.location.href='check_survey.php'" type="submit" Value="Go!">
    </form>
    </div>
  </div>
</div>
<br><br><br>
<h2 style="text-align:center"> <a href="survey_list.php">SURVEY LIST </a> </h2>

    

</article>

<footer>
<a href="logout.php">click here to log out
</footer>

</div>

</body>
</html>



