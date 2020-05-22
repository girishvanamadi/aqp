<html>
<head>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
    </head>
<script type="text/javascript">
 $(document).ready(function(){
    $('select').formSelect();
  });
  </script>
  <script>
$(document).ready(function(){
    $('#subname').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#units').html(html);
                    
                }
            }); 
        }else{
            $('#units').html('<option value="">Select subject first</option>');
          
        }
    });
    });
</script>
<style>
input,
select {
    max-width: 480px;
}
body{
    background-color: #dfebec !important;
}
</style>
 </head>
<body bgcolor="#dfebec">
<?php include "header2.php";   ?>
<?php
 if($email4==0)
{
echo "<script>location.href='http://localhost/JUMP/login/login.php'</script>";
}

?>
<center>
<h2>Edit Questions</h2>
<hr />
<form action ="editquestion.php" method="POST">
<b>Select the Exam type:</b><br/>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "girish";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `subjects`";
$result1 = mysqli_query($connect, $query);
?>    
<center>
  <select class="browser-default" id="subname" name="slct1"  required>
    <option value="" disabled selected>Select Sem or Mid</option>
   <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo strtoupper($row1[0]);?></option>

            <?php endwhile;?>
  </select> <br/>
  
  <b>Select The unit below :</b><br/>
<select class="browser-default"  id="units" name="slct2" required=>
<option value="" disabled selected>Select Units</option>
</select><br/>
<b>Enter Question Number below:</b>
<div class="row">
        <div class="input-field col s12">
          <input id="qno" name="qno" type="text" class="validate" autocomplete="off"  required="">
          
      </div>
        </div><br/>
<button class="btn waves-effect waves-light" type="submit" name="display">Reterive Question
    <i class="material-icons right">send</i>
  </button>
</form>
</body>

</html>
<?php
if(isset($_POST['display']))
{
$db2=$_POST['slct1'];
$table=$_POST['slct2'];
$qnum=$_POST['qno'];
$host='localhost';
$username='root';
$password='';
$db=$db2;
$connect=mysql_connect($host, $username, $password);
mysql_select_db($db2);
$query1=mysql_query( "SELECT q FROM  $table where qno='$qnum'  ");
WHILE($rows=mysql_fetch_array($query1))
{
$b=$rows['q'];
echo"<center>";
echo"<form action='editquestion.php' method='post'>";

echo"<br/>(<b><font color='blue'>Retervied Question as Follows and  also edit the below </font></b>)";
echo"<div class='row'>";
   echo" <form class='col s12'>";
      echo"<div class='row'>";
        echo"<div class='input-field col s12'>";
echo"<textarea  class='materialize-textarea'  rows='8' cols='150' name='question' >";
echo"$b";
echo"</textarea>";
echo"</div>";
echo"</div>";
echo"</div>";

echo"<input type='hidden' value='$qnum' name='girish'>";
echo"<input type='hidden' value='$table' name='satish'>";
echo"<input type='hidden' value='$db2' name='varun'>";
echo'<button class="btn waves-effect waves-light" type="submit" name="update">UpdateQuestion
    <i class="material-icons right">send</i>
  </button>';
echo "<br/>";
echo"</form>";
echo"</center>";
}
}



if(isset($_POST['update']))
{
$host='localhost';
$username='root';
$password='';
$qu=$_POST['question'];
$qunume=$_POST['girish'];
$table=$_POST['satish'];
$db=$_POST['varun'];
$connect=mysql_connect($host, $username, $password);
mysql_select_db($db);

$query="UPDATE $table SET q='$qu' where qno='$qunume'";
$g=mysql_query($query,$connect);
$k=mysql_affected_rows();

if ($k>=1)
{



echo"<h5><font color='green'>Question $qunume in $table Updated sucessfully ..!</font></h5>";

}

else
{

echo"<h5><font color='red'>Question $qunume in $table Not Updated.Please check your Question.</font></h5>";
}

}
?>
