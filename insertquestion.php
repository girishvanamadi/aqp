
<html>
<head>
<title>
Question
</title>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
input,
select {
    max-width: 480px;
}

</style>
<script>
$(document).ready(function(){
    $('#subname').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#units').html(html);
                    
                }
            }); 
        }else{
            $('#units').html('<option value="">Select subject first</option>');
          
        }
    });
    });
</script>


</head>

<body bgcolor="#dfebec">

<?php include "header2.php";   ?>
<?php
 if($email3==0)
{
echo "<script>location.href='http://localhost/JUMP/login/login.php'</script>";
}
?>
<center>
<h2>Add Questions Here</h2><hr/>
<form name="kalyan">
<b>Select the subject</b>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "girish";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `subjects`";
$result1 = mysqli_query($connect, $query);
?>
  <select class="browser-default"  name="slct1"  id="subname"  required>
    <option value="" disabled selected>Select Sem or Mid</option>
     <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo strtoupper($row1[0]);?></option>

            <?php endwhile;?>

  </select> 

<b>Select the unit: </b>

<select class="browser-default" name="units" id="units" required >
<option value="" disabled selected>Select Unit</option>
 </select> 

<br/><br/>
  <b>Enter Question Here:</b>
<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"  rows="12" cols="150" name="question"  required></textarea>
          <label for="textarea1">Enter Question Here</label>
        </div>
      </div>

      <button class="btn waves-effect waves-light" name="action"  type="button" id="pilli">Add Question
    <i class="material-icons right">send</i>
  </button>


    </form>
    <div id="girish">  </div>
  </div>
</center>

</body>
</html>
<script>
  $(document).ready(function(){
    var check=1;

$("#pilli").on('click',function()
{
  var db=$("#subname").val();
  var questions=$("#textarea1").val();
  var unit=$("#units").val();
  if(db == null && db == undefined)
  {
    alert('Enter subject name');

    
  }
   if(unit== null && unit == undefined)
  {
    alert('Enter the unit');

  }
  if(questions=="")
  {
    alert('Enter the Question');
  

  
  }
  
if(db&&questions&&unit){
  $.ajax(
{

  url:'database.php',
  method:'post',
  data:{

    'slct1':db,
    'units':unit,
    'question':questions
    
  },
  success:function(response)
  {

    $("#girish").html(response);
    var sum="";
    $("#textarea1").val(sum);
  },
  datatype:'text'

}//ajax


 );//ajax
}
  
}//pilli

);//pilli

 });//document

</script>