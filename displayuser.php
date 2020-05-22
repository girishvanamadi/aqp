<html>
<head>
<title>FETCH-DATA</title>
</head>
<body>
<?php include "adminheader.php";   ?>

<div id="delete" style="margin-left:500;margin-top:10">
<h1 style="margin-left:150"> FETCH DATA </h1>
<form action="displayuser.php" method="POST">
  <div class="form-group">
    <label for="pasword">ENTER ADMIN ID</label>
    <input type="password" class="form-control" id="userid" name="userid" required autocomplete="off"><br/>
    <button type="submit" class="btn btn-default" name="fetch">FETCH DATA</button>
  </div>
  </form>
  </div>
  </body>
  </html>
<?php
if(isset($_POST['fetch']))
{
$username1=$_POST['userid'];
$v=mysqli_connect($host, $username, $password,$db);
if($v)
{
echo "connected sucessfully yaaaar  !";
}
else
{

echo "Error in the database connection\n ";
}

$query="select * FROM user";

$g=mysqli_query($v,$query);
if (mysqli_num_rows($g) > 0) {
    echo'<table class="table table-striped">';
    echo"<thead>";
     echo" <tr>";
        echo"<th>Email</th>";
        echo"<th>Password</th>";
        echo"<th>GENERATE QP?</th>";
        echo"<th>DISPLAY QP?</th>";
        echo"<th>ADD QP?</th>";
        echo"<th>EDIT QP?</th>";
      echo"</tr>";
    echo"</thead>";
    
  
    while($row = mysqli_fetch_assoc($g)) {
   $mail=$row['email'];
$pass=$row['password'];
$gen=$row['generate'];
$dis=$row['display'];
$ad=$row['addq'];
$edi=$row['edit'];


      echo"<tbody>";
      echo"<tr>";
        echo"<td>$mail</td>";
        echo"<td>$pass</td>";
        echo"<td>$gen</td>";
        echo"<td>$dis</td>";
        echo"<td>$ad</td>";
        echo"<td>$edi</td>";
      echo"</tr>";
      
    }
    echo"</tbody>";
      echo"</table>";
    }


}
else
{
echo "<div class='alert alert-danger'>";
echo"<h5><center> <span class='glyphicon glyphicon-remove'></span> Invalid ID.<br/> </center></h5>";
 echo"</div>";

}
}
?>