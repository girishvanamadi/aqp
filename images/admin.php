<html>
<head>
  <title>ADD-USER</title>
  
</head>
<style>
input,
select {
    max-width: 480px;
}

</style>
<body >
<?php include "adminheader.php";   ?>
<div id="adduser" style="margin-left:500;margin-top:10">
<h1 style="margin-left:150"> ADD USER </h1>

<form action="admin.php" method="POST">
  <div class="form-group">
    <label for="email">USER ID</label>
    <input type="email" class="form-control" id="userid" name="userid">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="text" class="form-control" id="pwd" name="pwd">
  </div>
  <b>Would you like to give permission to add questions?</b>
  <div class="radio">
  <label><input type="radio" name="give" value="0">NO</label>
</div>

<div class="radio">
  <label><input type="radio" name="give" value="1">YES</label>
</div>


<b>Would you like to give permission to Edit questions?</b>
  <div class="radio">
  <label><input type="radio" name="edit" value="0">NO</label>
</div>

<div class="radio">
  <label><input type="radio" name="edit" value="1">YES</label>
</div>


<b>Would you like to give permission to Display questions?</b>
  <div class="radio">
  <label><input type="radio" name="display" value="0">NO</label>
</div>

<div class="radio">
  <label><input type="radio" name="display" value="1">YES</label>
</div>


<b>Would you like to give permission to Generate Question Paper?</b>
  <div class="radio">
  <label><input type="radio" name="gqp" value="0">NO</label>
</div>

<div class="radio">
  <label><input type="radio" name="gqp" value="1">YES</label>
</div>
 <button type="submit" class="btn btn-default" name="add">ADD USER</button>
</form>
</div>

<div id="delete" style="margin-left:500;margin-top:10">
<h1 style="margin-left:150"> DELETE USER </h1>
<form action="admin.php" method="POST">
  <div class="form-group">
    <label for="email">USER ID</label>
    <input type="email" class="form-control" id="userid" name="userid"><br/>
    <button type="submit" class="btn btn-default" name="delete">DELETE USER</button>
  </div>

</div>

</body>

</html>

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
//echo "connected sucessfully yaaaar  !";
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