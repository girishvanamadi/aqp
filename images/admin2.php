<?php
error_reporting(E_ALL);
if(isset($_POST['add']))
{
$host='localhost';
$username='root';
$password='';
$db='login';
$username1=$_POST['userid'];
$password1=$_POST['pwd'];
$add1=$_POST['give'];
$edit=$_POST['edit'];
$display=$_POST['display'];
$generate=$_POST['gqp'];
$v=mysqli_connect($host, $username, $password,$db);
if($v)
{
echo "connected sucessfully yaaaar  !";
}
else
{

echo "Error in the database connection\n ";
}

$query="insert into user(email,password,generate,display,addq,edit)values('$username1','$password1','$generate','$display' ,'$add1','$edit')";

$g=mysqli_query($v,$query);
if ($g)
{

echo "<div class='alert alert-success'>";
echo"<h5><center> <span class='glyphicon glyphicon-ok'></span>User added sucessfully ..!<br/> </center></h5>";
 echo"</div>";

}
else
{
echo "Error: " . $g . "<br>" . mysqli_error($v);
echo "<div class='alert alert-danger'>";
echo"<h5><center> <span class='glyphicon glyphicon-remove'></span> check data and try again.<br/> </center></h5>";
 echo"</div>";
}
}
?>