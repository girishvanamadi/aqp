
<?php

$host='localhost';
$username='root';
$password='';
$db=$_POST['slct1'];
$uname=$_POST['question'];
$unit=$_POST['units'];
$v=mysqli_connect($host,$username,$password,$db);

if($v)
{
//echo "connected sucessfully yaaaar  !";
}
else
{

echo "Error in the database connection\n ";
}
$query="insert into $unit(q)  values ('$uname')";
$g=mysqli_query($v,$query);
if($g)
{

echo"<h5><center><font color='green'>Question inserted sucessfully in $unit.(subjectname:$db)</font></center></h5>";
echo"<b>your question as follows</b><br/>";
echo "<font color='blue'>$uname</font>";
}
else
{
echo "<b>Question not added .Please insert the data correctly.</b>";
//echo("Error description: " . mysqli_error($v));
}
/*$connect=mysql_connect($host, $username, $password);
mysql_select_db($db);
$query1=mysql_query( "SELECT * FROM  $unit ");
echo"<center><h5>$unit Questions are as follows </h5></center>";
WHILE($rows=mysql_fetch_array($query1))
{
$a= $rows['qno'];
$b=$rows['q'];

//echo str_replace("\r","\n","$a");
echo"<ul class='collection'>";
      
echo" </ul>";

echo "$a     $b \n";
echo "<br/>";
}*/

?>

