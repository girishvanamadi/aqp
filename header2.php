
<script type="text/javascript">
 
    setTimeout(function()
    {

 $('.modal').modal({
    dismissible: true
});
 $('#modal2').modal('open');
}, 15000000);  //150000
</script>
<script  "text/javascript">
 
    setTimeout(function()
    {


 $('.modal').modal({
    dismissible: true
});
 $('#modal2').modal('close');
}, 18000000);//180000
</script>

<?php
session_start();
if((time() - $_SESSION['last_time']) > 180000) // Time in Seconds   //180
 {

$message = "Session expired ! Please Login Again.";
echo "<script type='text/javascript'>alert('$message');</script>";
 //header("location:logout.php");
header( "refresh:1;url=logout.php" );
 }
 else
 {
  $_SESSION['last_time']=time();
 }

$email1= $_SESSION['gen'];
$email2= $_SESSION['dis'];
$email3= $_SESSION['ad'];//add
$email4= $_SESSION['edi'];//edit
$email5= $_SESSION['emails'];
if(isset($email5))
{
}
else
{
  echo "<script>location.href='http://localhost/JUMP/login/login.php'</script>";
}
?>




<html>
 
<head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
	<body>
    <nav>
    <div class="nav-wrapper">
      <a href="#modal1" class="brand-logo right">LOGOUT</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
           <li><a href="test.php">HOME</a></li>
    <?php  if($email1=="1"){ echo" <li><a onclick='test()''>GENERATE QUESTION PAPER</a></li>";} ?>
    <?php  if($email3=="1"){ echo" <li><a href='insertquestion.php'>ADD QUESTIONS</a></li>";} ?>
    <?php  if($email2=="1"){ echo"<li><a href='display.php'>DISPLAY QUESTIONS</a></li>";} ?>
    <?php  if($email4=="1"){ echo" <li><a href='editquestion.php'>EDIT QUESTIONS</a></li>";} ?>
    <li><a href="password.php">PASSWORD CHANGE</a></li>
    <li><a href="#"><?php echo"(Login id:$email5)";?></a></li>
		
      </ul>
    </div>
  </nav>
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>LOGOUT</h4>
      <p><font color="blue"><b>Are you want to logout?</b></font></p>
    </div>
    <div class="modal-footer">
    <a href="logout.php" class="modal-close waves-effect waves-green btn-flat">YES</a>
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">NO</a>
    </div>
  </div>

  <script>
  $(document).ready(function(){
    $('.modal').modal();
  });
  </script>

  <div id="modal2" class="modal">
    <div class="modal-content">
      <h4>YOUR SESSION EXPIRES IN </h4>
      <img src="images/timer.gif" height="200px" width="550px">
    </div>
    <div class="modal-footer">
    <a onclick="check()" class="modal-close waves-effect waves-green btn-flat">RENEW SECTION</a>
    <a href="#!" class="modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>


<script type='text/javascript'>

function check()
{
    location = location['href'];
}

</script>

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
            //alert('This function not allowed Here.');
            return true;
            }
            if(e.keyCode===122 || e.keyCode===123)
            {
              //alert('This function not allowed Here.');
              return true;
            }

             else 
             {
            return true;
             }
};

    </script>

    <form action ="gen2.php" id="testform" method="post">
<input type="hidden" name="check" value="1" />
</form>
<script type="text/javascript">
function test()
{
document.forms.testform.submit();
}
</script>



 </body>
  </html>