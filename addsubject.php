<html>
<head><title>Add -subjject</title></head>
<body>
<?php include "adminheader.php";   ?>

<div id="addsubject" style="margin-left:500;margin-top:10">
<h1 style="margin-left:150"> ADD SUBJECT </h1>

<form action="addsubject.php" method="POST">
  <div class="form-group">
    <label for="subname">Subject Name</label>
    <input type="text" class="form-control" id="subname" name="subname" required>
    <div id="ram"> </div>
    <label for="units">Number of units</label>
    <input type="text" class="form-control" id="units" name="units" required > <br/>
    <button type="submit" class="btn btn-default" name="addsubject">ADD SUBJECT</button>

  </div>
  </form>
  </div>
</body>
</html>
<?php
if(isset($_POST['addsubject']))
{
$subname=$_POST['subname'];
$units=$_POST['units'];
$host='localhost';
$username='root';
$password='';
$v=mysqli_connect($host, $username, $password);
if($v)
{
//echo "connected sucessfully yaaaar  !";
}

else
{

echo "Error in the database connection\n ";
}

$sql = "CREATE Database $subname";
 $retval = mysqli_query( $v,$sql );
   
   if(! $retval ) {
      die('Could not create database: ' . mysqli_error($v));
   }
   else
   {
   echo' <div class="alert alert-success">';
   echo " <center><font color='green'>$subname Added successfully</font></center>";
   echo'</div>';
  }


for($i=1;$i<=$units;$i++)
{
$host1='localhost';
$username1='root';
$password1='';
$v=mysqli_connect($host1, $username1, $password1,$subname);
$sql2 = "CREATE TABLE unit$i (
qno INT(11) AUTO_INCREMENT PRIMARY KEY , 
q text(1000) 
)";
$ret = mysqli_query( $v,$sql2 );


if(! $ret ) {
      die('Could not create table: ' . mysqli_error($v));
   }
   else
   {
  echo' <div class="alert alert-success">';
   echo " <center><font color='green'>unit$i Added successfully</font></center>";
   echo'</div>';
  }



}
if($ret ) {
$host='localhost';
$username='root';
$password='';
$db='girish';
$v1=mysqli_connect($host, $username, $password,$db);
$query3="insert into subjects(subjectname,nunits)values('$subname','$units')";

$g=mysqli_query($v1,$query3);

    
   }
}

?>