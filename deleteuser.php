<html>
<head>
<title>DELETE-USER</title>
</head>
<body>
<?php include "adminheader.php";   ?>

<div id="delete" style="margin-left:500;margin-top:10">
<h1 style="margin-left:150"> DELETE USER </h1>
<form action="deleteuser.php" method="POST">
  <div class="form-group">
    <label for="email">USER ID</label>
    <input type="email" class="form-control" id="userid" name="userid" required><br/>
    <button type="submit" class="btn btn-default" name="delete">DELETE USER</button>
  </div>
  </form>
  </div>
  </body>
  </html>
 <?php
if(isset($_POST['delete']))
{
$host='localhost';
$username='root';
$password='';
$db='login';
$username1=$_POST['userid'];
$v=mysqli_connect($host, $username, $password,$db);
if($v)
{
//echo "connected sucessfully yaaaar  !";
}
else
{

echo "Error in the database connection\n ";
}

$query="DELETE FROM user  WHERE email='$username1' ";

$g=mysqli_query($v,$query);
$b=mysqli_affected_rows($v);
if ($b>=1)
{

echo "<div class='alert alert-success'>";
echo"<h5><center> <span class='glyphicon glyphicon-ok'></span>User Deleted sucessfully ..!<br/> </center></h5>";
 echo"</div>";

}
else
{

echo "<div class='alert alert-danger'>";
echo"<h5><center> <span class='glyphicon glyphicon-remove'></span> check data and try again.<br/> </center></h5>";
 echo"</div>";
}
}
?>