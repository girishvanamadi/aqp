<?php

$check=$_POST["check"];
if($check==1)
{}
else
{
  header('Location:error.php');  
}

?>
<html>
<head>
<style type="text/css">
.blink_me {
display: inline-block;
    text-align: center;
    vertical-align: middle;
    padding: 7px 14px;
    border: 1px solid #a12727;
    border-radius: 8px;
    background: #ff4a4a;
    background: -webkit-gradient(linear, left top, left bottom, from(#ff4a4a), to(#992727));
    background: -moz-linear-gradient(top, #ff4a4a, #992727);
    background: linear-gradient(to bottom, #ff4a4a, #992727);
    text-shadow: #591717 1px 1px 1px;
    font: normal normal bold 20px arial;
    color: #ffffff;
	margin-top: 10px;
    text-decoration: none;
    -webkit-animation-name: blinker;
    -webkit-animation-duration: 1s;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;

    -moz-animation-name: blinker;
    -moz-animation-duration: 1s;
    -moz-animation-timing-function: linear;
    -moz-animation-iteration-count: infinite;

    animation-name: blinker;
    animation-duration: 1s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
	text-decoration:none;
	color:#FFf;
	font-weight:bold;
	font-size:14px;
}

@-moz-keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@-webkit-keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}	
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<title>Generation-Inprogress</title>
<style>
</style>
<script type="text/javascript">

function validateform(l)
{
	var s=document.getElementById("raju").value;
	var count=0;
	for (i = 1; i <= l; i++)
	 {

var a=document.getElementById("cat"+i).value;
var b=parseInt(a);
count=parseInt(count+b);
}
if(count<s)
{
	alert("please Enter the count of questions that must be equal to"+s);
	return false;
}
else if(count>s)
{
	alert("please Enter the count of questions less than"+s);
	
	return false;

}
else if(s==count)
{
	return true;

}

}


</script>



</head>
<?php
session_start();
$check=$_SESSION['gen'];
if($check=='1')
{}
else
{

	header('Location:login.php');
}
?>
<body>
<center>
<h1>WELCOME TO AUTOMATED GENERATED QUESTION PAPER </h1>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "girish";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `subjects`";
$result1 = mysqli_query($connect, $query);
?>
<div align="left">	<a href="test.php" class="blink_me">Click here for Home</a>	</div>
<form action="gen2.php" method="POST">
<table>
<tr><td><b>Select the subject name</b></td></tr>
<tr><td><select name="subname" id="subname" required>
 <option value="">Select the subject</option>
<?php while($row1 = mysqli_fetch_array($result1)):;?>

 <option value="<?php echo $row1[0];?>"><?php echo strtoupper($row1[0]);?></option>

  <?php endwhile;?>

  </select> </td></tr>
<tr><td></td></tr>
<tr><td><input type="hidden" name="check" value="1"></td></tr>
<tr><td><input type="submit" name="Enter" value="click here"></td></tr>

</table>
</form>
</center>
</body>
</html>
<?php

if(isset($_POST['Enter']))
{
	echo"<center>";

	$subname=$_POST['subname'];
	echo" <b>Subject name:$subname</b>";
$host='localhost';
$username='root';
$password1='';
$db=$subname;
$v=mysqli_connect($host, $username, $password1,$db);
if (!$v)
{
    die('Could not connect: ' . mysql_error());
}
$query="SHOW TABLES FROM $subname";
$result = mysqli_query($v, $query);
$row=mysqli_fetch_array($result,MYSQLI_BOTH);
$b=mysqli_affected_rows($v);
echo"<form action='gen4.php' method='post' onsubmit='return validateform($b)'>";
echo'<tr><td><input type="hidden" name="check2" value="2"></td></tr>';
echo"<table>";

echo "<tr><td><b> Enter the no of questions you want:</b> </td> <td><input type='text' required name='count' id='raju'  autocomplete='off' style='width: 40px'   onkeypress='validate(event)'> </td> </tr>";

echo "<tr><td><b> Enter the no of sets you want:</b> </td> <td><input type='text' required name='bangaram3' id='bangaram3'  autocomplete='off' style='width: 40px'  onkeypress='validate(event)'> </td> </tr>";

for($i=1; $i<=$b; $i++)
{
echo "<tr><td><b> Enter the no of questions in unit$i &nbsp</b> </td>";
echo " <td><input type='text'id='cat$i' name='iname$i' value='0'  required autocomplete='off' style='width: 40px' onkeypress='validate(event)' > </td> </tr>";
}

echo "<tr> <td><input type='hidden' name='bangaram' value='$b' > </td> </tr>";
echo " <tr><td><input type='hidden' name='bangaram2' value='$subname' > </td> </tr>";
echo " <tr><td align='center'><input type='submit' name='generate' value='generate' > </td> </tr>";
echo "</table>";
echo"</form>";
echo"</center>";





}







?>

<script type="text/javascript" language="javascript">

        $(document).ready(function () {

            $(document).bind("contextmenu", function (e) {
            alert("This Function not allowed Here.")
                return false;
            });
            window.history.pushState(null, "", window.location.href);
            window.addEventListener('popstate', function () {
                window.history.pushState(null, "", window.location.href);
                window.location = "logout.php";

            });
        });
    </script>
    <script type="text/javascript" language="javascript">

    document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 ||  
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            alert('This function not allowed Here.');
            return false;
            }
            if(e.keyCode===122 || e.keyCode===123)
            {
              alert('This function not allowed Here.');
              return false;
            }

             else 
             {
            return true;
             }
};

    </script>
    <script type="text/javascript">
    	
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
    </script>
