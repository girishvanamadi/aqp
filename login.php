
<html>
<head><title>LOGIN </title>
<link rel="stylesheet" type="text/css" href="login.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<h1><font color='white'><center>AUTOMATC QUESTION PAPER GENERATOR</center> </font></h1>
<div class="login-page">
  <div class="form">
    
    <form class="login-form" action="login.php" method="POST">
      <input type="email" name="email" placeholder="username" id="email" required />
      <div id="ram"> </div>
      <input type="password" name="password" id="password" placeholder="password" onpaste="return false" required />
      <button type="submit" name="login" id="login">login</button>
      
    </form>
  </div>
</div>

<script>
$(document).ready
(function(){

$("#password").keyup
(function()
{
	var query=$("#password").val();

	if(query.length>0)
{
  var email=$("#email").val();
  $.ajax({
                       url: "checkuser.php",
                       type: "POST",
                       data: {
                           
                           email: $("#email").val()
                       },
                       dataType: 'JSON',
                       success: function (bava) {
                       	if(bava.status=="0")
                       	{
                       	
                       	
                    $("#ram").html("<font color='red'><b>Invalid user id.please check.<br/>. </b> </font>");

                      //$('#login').attr('disabled',true)
                      $("#login").hide();
                        }
                        if(bava.status=="1")
                       	{
                       	
                       	
                    $("#ram").html("      ");
                    //$('#login').attr('disabled',false)
                    $("#login").show();
                        }
                       	
                  
                       
                   }
               }//forajax closing
                   );//for ajax 
}//if loop



});//keyupfunction

});

	</script>
<?php
if(isset($_POST['login'])){
session_start();
$email=$_POST["email"];
$password=$_POST["password"];
$host='localhost';
$username='root';
$password1='';
$db='login';
$connect=mysql_connect($host, $username, $password1);
mysql_select_db("login");
date_default_timezone_set("Asia/Kolkata"); 

if (!$connect)
{
    die('Could not connect: ' . mysql_error());
}
else
{
/*echo 'connected sucessfully';*/
}

$result = mysql_query("select * from  user  where email='$email' and password='$password'") or die("failed");

$row=mysql_fetch_array($result);

if($row['email' ]== $email && $row['password'] == $password  && $row['password'] != "" && $row['email'] != "" )
{

echo "<center><h3>login sucess !</h3></center>";
$_SESSION['emails']=$email;
$_SESSION['gen']=$row['generate'];
$_SESSION['dis']=$row['display'];
$_SESSION['ad']=$row['addq'];
$_SESSION['edi']=$row['edit'];
$_SESSION['last_time'] = time();

echo "<script>location.href='http://localhost/JUMP/login/test.php'</script>";

}




else
{
echo "<h3><font color='red'><center>Login failed! Invalid password .</font></h3></center>";


}

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


	</body>
	</html>