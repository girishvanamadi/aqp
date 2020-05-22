<html>
<head>
<title>EDIT-USER</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
            
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <style>  
           

           .girish ul{  
                background-color:#eee;  
                cursor:pointer; 
                width:480px;
                 border: 1px solid black; 
                 border-top:0; 
           }  
           .girish li{  
                padding:06px;  
           } 
            

           }
           </style>  
</head>
<body >
<?php include "adminheader.php";   ?>

<div id="delete" style="margin-left:500;margin-top:10">
<h1 style="margin-left:150"> EDIT USER </h1>
<form action="edituser.php" method="POST">
  <div class="form-group" cl>
    <label for="email">USER ID</label>
    <input type="email" class="form-control" id="userid" name="userid" autocomplete="off" required>
    <div id="userid2" class="girish"></div>
    <br/><button type="submit" class="btn btn-default" name="edit">EDIT USER</button>
  </div>
  </form>
  </div>
  </body>
  </html>
  <?php
if(isset($_POST['update']))
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

$query="UPDATE user SET email = '$username1', password = '$password1',generate='$generate',display='$display',addq='$add1', edit='$edit' WHERE email = '$username1' ";

$g=mysqli_query($v,$query);
$b=mysqli_affected_rows($v);
if ($b>=1)
{

echo "<div class='alert alert-success'>";
echo"<h5><center> <span class='glyphicon glyphicon-ok'></span>User $username1 Updated sucessfully ..!<br/> </center></h5>";
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
 <?php
if(isset($_POST['edit']))
{
$email=$_POST["userid"];
$host='localhost';
$username='root';
$password1='';
$db='login';

$connect=mysql_connect($host, $username, $password1);
mysql_select_db("login");

if (!$connect)
{
    die('Could not connect: ' . mysql_error());
}
else
{
//echo 'connected sucessfully';
}

$result = mysql_query("select * from  user  where email='$email' ") or die("failed");

$row=mysql_fetch_array($result);
$mail=$row['email'];
$pass=$row['password'];
$gen=$row['generate'];
$dis=$row['display'];
$ad=$row['addq'];
$edi=$row['edit'];
$bava=mysql_affected_rows($connect);
//echo"$mail \t $gen\t $dis\t $ad\t $edi";

}
?>
<?php if(isset($_POST['edit']) && !isset($_POST['update'])) 
{
  if($bava>=1)
  {
?>
<div id="adduser" style="margin-left:500;margin-top:10">
<h1 style="margin-left:150"> UPDATE USER </h1>

<form action="edituser.php" method="POST">
  <div class="form-group">
    <label for="email">USER ID</label>
    <input type="email" class="form-control" readonly name="userid"  value='<?php echo"$mail";?>' id="userid" >
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="text" class="form-control" id="pwd" name="pwd"  value='<?php echo"$pass";?>'>
  </div>
  <b>Would you like to give permission to add questions?</b>
  <div class="radio">
  <label><input type="radio" name="give" value="0"  <?php if($ad=="0"){echo"checked";}?>>NO</label>
</div>

<div class="radio">
  <label><input type="radio" name="give" value="1" <?php if($ad=="1"){echo"checked";}?>>YES</label>
</div>


<b>Would you like to give permission to Edit questions?</b>
  <div class="radio">
  <label><input type="radio" name="edit" value="0" <?php if($edi=="0"){echo"checked";}?>>NO</label>
</div>

<div class="radio">
  <label><input type="radio" name="edit" value="1" <?php if($edi=="1"){echo"checked";}?>>YES </label>
</div>


<b>Would you like to give permission to Display questions?</b>
  <div class="radio">
  <label><input type="radio" name="display" value="0" <?php if($dis=="0"){echo"checked";}?>>NO</label>
</div>

<div class="radio">
  <label><input type="radio" name="display" value="1" <?php if($dis=="1"){echo"checked";}?>>YES</label>
</div>


<b>Would you like to give permission to Generate Question Paper?</b>
  <div class="radio">
  <label><input type="radio" name="gqp" value="0" <?php if($gen=="0"){echo"checked";}?>>NO</label>
</div>

<div class="radio">
  <label><input type="radio" name="gqp" value="1" <?php if($gen=="1"){echo"checked";}?>>YES</label>
</div>
 <button type="submit" class="btn btn-default" name="update">UPDATE USER</button>
</form>
</div>



</div>
<?php 
}
else 
{
  echo "<div class='alert alert-danger'>";
echo"<h5><center> <span class='glyphicon glyphicon-remove'></span> No  data  found in sever regarding  user id $email .<br/> </center></h5>";
 echo"</div>";
} 
} 
?>



<script>  
 $(document).ready(function(){  
      $('#userid').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#userid2').fadeIn();  
                          $('#userid2').html(data);  
                     }  
                });  
           } 

           var query=$("#userid").val();

  if(query.length==0)
{
  $('#userid2').fadeOut();
}
   
      });  
      $(document).on('click', 'li', function(){  
           $('#userid').val($(this).text());  
           $('#userid2').fadeOut(); 
            
      }); 
      $(document).click(function (event) {            
    $('#userid2:visible').hide();
}); 
 });  
 </script>  
