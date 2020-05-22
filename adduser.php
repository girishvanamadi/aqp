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
echo"<h5><center> <span class='glyphicon glyphicon-ok'></span>User $username1 added sucessfully ..!<br/> </center></h5>";
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

<form action="adduser.php" method="POST">
  <div class="form-group">
    <label for="email">USER ID</label>
    <input type="email" class="form-control" id="userid" name="userid" required>
    <div id="ram"> </div>
  </div>
  
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="text" class="form-control" id="pwd" name="pwd"  autocomplete="off" required>
  </div>
  <div id="krish">
  <b>Would you like to give permission to add questions?</b>
  <div class="radio">
  <label><input type="radio" name="give" value="0" required>NO</label>
</div>

<div class="radio">
  <label><input type="radio" name="give" value="1" >YES</label>
</div>


<b>Would you like to give permission to Edit questions?</b>
  <div class="radio">
  <label><input type="radio" name="edit" value="0" required>NO</label>
</div>

<div class="radio">
  <label><input type="radio" name="edit" value="1">YES</label>
</div>


<b>Would you like to give permission to Display questions?</b>
  <div class="radio">
  <label><input type="radio" name="display" value="0" required>NO</label>
</div>

<div class="radio">
  <label><input type="radio" name="display" value="1">YES</label>
</div>


<b>Would you like to give permission to Generate Question Paper?</b>
  <div class="radio">
  <label><input type="radio" name="gqp" value="0" required>NO</label>
</div>

<div class="radio">
  <label><input type="radio" name="gqp" value="1">YES</label>
</div>
 <button type="submit" class="btn btn-default" name="add">ADD USER</button>
 </div>
</form>
</div>



</div>

</body>

</html>


<script>
$(document).ready
(function(){
  var think=$("#userid").val();
    if(think.length==0)
{
$('#pwd').attr('disabled',true);
}
  



  $("#userid").keyup
(function()
{
  
  var query2=$("#userid").val();
  if(query2.length>5)
{
$('#pwd').attr('disabled',false);
}
else
{
  $('#pwd').attr('disabled',true);
}

});


$("#pwd").keyup
(function()
{
  var query=$("#pwd").val();
  if(query.length==0)
                    {
                    $('#userid').attr('readonly',false);
                  }
                  

  if(query.length>0)
{
  var email=$("#userid").val();
  $.ajax({
                       url: "checkuser.php",
                       type: "POST",
                       data: {
                           
                           email: $("#userid").val()
                       },
                       dataType: 'JSON',
                       success: function (bava) {
                        if(bava.status=="1")
                        {
                        $("#userid").attr('style', "border-radius: 5px; border:#FF0000 1px solid;");
                        var luck='<font color="red"><b>This user id '+email+'  is already present.Try with another user ID and please reenter password. </b> </font>';
                        var sum="";
                    $("#ram").html(luck);
                    $("#pwd").val(sum);

                      //$('#login').attr('disabled',true)
                      $("#krish").hide();
                        }
                        if(bava.status=="0")
                        {
                        
                       $("#userid").attr('style', "border-radius: 5px; border:green 1px solid;"); 
                    $("#ram").html("      ");
                    //$('#login').attr('disabled',false)
                    $("#krish").show();
                    if(query.length>0)
                    {
                    $('#userid').attr('readonly',true);
                  }
                  }
                        
                  
                       
                   }
               }//forajax closing
                   );//for ajax 
}//if loop



});//keyupfunction

});

  </script>

