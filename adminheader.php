<html>
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
input,
select {
    max-width: 480px;
}

</style>
<body >
<?php
session_start();
$dul=$_SESSION['emails'];
if(isset($dul))
{

?> 

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">AUTOMATC QUESTION PAPER GENERATOR</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="displayuser.php">DISPLAY USER DATA</a></li>
      <li><a href="adduser.php">ADD USER</a></li>
      <li><a href="edituser.php">UPDATE USER</a></li>
      <li><a href="deleteuser.php">DELETE USER</a></li>
      <li><a href="addsubject.php">ADD SUBJECT</a></li>
      <li><a href="alogout.php">LOGOUT</a></li>
      </ul>
  </div>
</nav>
</body>
</html>
<?php
}
else
{
  echo "<script>location.href='http://localhost/JUMP/login/login.php'</script>";
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

