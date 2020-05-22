<html>
<body bgcolor="#dfebec">
<?php include "header2.php";   ?>
<?php
 if($email4==0)
{
echo "<script>location.href='http://localhost/JUMP/login/login.php'</script>";
}

?>

<?php
error_reporting(0);
$db2=$_GET['slct1'];
if($db2){
$table=$_GET['slct2'];
$qnum=$_GET['qno'];
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
echo"<form action='editquestion2.php' method='post'>";

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



echo"<h5><center><font color='green'>Question $qunume in $table Updated sucessfully ..!</font></center></h5>";
header( "refresh:2;url=display.php" );

}

else
{

echo"<h5><center><font color='red'>Question $qunume in $table Not Updated.Please check your Question.</center></font></h5>";
}

}
?>
</body>
</html>