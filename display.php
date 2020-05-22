<html>
<head>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
 td,tr {
    padding: 1px;
    text-align: center;
    border-bottom: 2px solid black;
  
  column-span: 0px;
}

</style>
 </head>
<body bgcolor="#dfebec">
<?php include "header2.php";   ?>
<?php
 if($email2==0)
{
echo "<script>location.href='http://localhost/JUMP/login/login.php'</script>";
}
?>
<center>
<h2>Display Questions</h2>
<hr />
<form action ="display.php" method="POST">
<b>Select the subject</b>
    	
<center>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "girish";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `subjects`";
$result1 = mysqli_query($connect, $query);
?>
  <select class="browser-default"  name="slct1"  id="subname" required>
    <option value="" disabled selected>Select Sem or Mid</option>
     <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo strtoupper($row1[0]);?></option>

            <?php endwhile;?>

  </select> 
  </center><br/>
  <b>Choose The unit :</b>
<select class="browser-default"  id="units" name="slct2" required>
<option value="" disabled selected>Select Units</option>
</select>
<br/>
<button class="btn waves-effect waves-light" type="submit" name="action">Display Questions
    <i class="material-icons right">send</i>
  </button>
</form>
  </center>
 </body>
</html>
<?php
if(isset($_POST['action']))
{
  
$db2=$_POST['slct1'];
$table=$_POST['slct2'];
$host='localhost';
$username='root';
$password='';
$db=$db2;
$connect=mysql_connect($host, $username, $password);
mysql_select_db($db2);
$query1=mysql_query( "SELECT *FROM  $table ");
echo"<center><h2>$table Questions</h2></center>";
echo"<table class='striped'>";
echo"<thead>";
echo"<tr>";
echo"<th colspan='2'>Question Number</th><th>Questions</th>" ;
if($email4=='1'){ echo "<th>Update</th> ";}

echo"</tr>";
echo"</thead>";

WHILE($rows=mysql_fetch_array($query1))
{
$a= $rows['qno'];
$b=$rows['q'];

echo "<tr><td colspan='2'><b>$a</b></td><td><b>$b</b></td>";
if($email4=='1'){echo"<td><a href='editquestion2.php?slct1=$db&slct2=$table&qno=$a'>Update</a></td>";}
echo"</tr>";

}
echo"</table>";
}




?>