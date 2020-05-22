<?php include "header2.php";   ?>
<html>
<head><title>PASSWORD-MODIFY</title>
<style>
input,
select {
    max-width: 480px;
}

</style>

 <script type="text/javascript">

function validateform()
{

var password=document.getElementById("cat").value;
var password2=document.getElementById("cat2").value;
 if(password!=password2)
{
alert("Passwords Not matched");
return false;
}
else
{
	return true;
}
}
</script>

</head>
<body>
<center>
<h2>PASSWORD-CHANGE</h2>
<hr /></center>
<center>
<form action ="password.php" method="POST"   onsubmit="return validateform()">
<div class="row">
        <div class="input-field col s12">
          <input id="pass" name="pass" type="password" class="validate" autocomplete="off"  required="" placeholder="Enter old password">
        
          
      </div>
        </div>
        <div class="row">
        <div class="input-field col s12">
        <input id="cat" name="cat" type="password" class="validate" autocomplete="off"  required="" placeholder="Enter new password">
        </div></div>

<div class="row">
        <div class="input-field col s12">
        <input id="cat2" name="cat2" type="password" class="validate" autocomplete="off"  required="" placeholder="Enter new password">
        </div></div>

<button class="btn waves-effect waves-light" type="submit" name="checkpass">Update Password
    <i class="material-icons right">send</i>
  </button>




</form>
</center>

</body>
</html>

<?php
if(isset($_POST['checkpass']))
{
$pass2=$_POST['pass'];
$pass3=$_POST['cat'];
$host='localhost';
$username='root';
$password1='';
$db='login';
$v=mysqli_connect($host, $username, $password1,$db);
if (!$v)
{
    die('Could not connect: ' . mysql_error());
}
$query="select * from  user  where email='$email5' ";
$result = mysqli_query($v, $query);
$row=mysqli_fetch_array($result,MYSQLI_BOTH);
if($row['email' ]== $email5 && $row['password'] == $pass2  && $row['password'] != "" && $row['email'] != "" )
{

$query="UPDATE user SET  password = '$pass3' WHERE email = '$email5' ";

$g=mysqli_query($v,$query);
$b=mysqli_affected_rows($v);
if ($b>=1)
{
echo"<center><h3><font color='green'>Your password updated sucessfully ....!</font></h3></center>";

}
else
{
echo"<center><h3>Your password  not updated .....!</h3></center>";	
}
}
else
{
	echo" <center><h3>invalid password. check again</h3></center>";
}



	}







   ?>
