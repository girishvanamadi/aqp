<?php

$check2=$_POST["check2"];
if($check2==2)
{}
else
{
  header('Location:error.php');  
}

?>
<html>
<head><title>Question Paper Generated </title></head>
<style>
.button{
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
<body>
<center>
  <form action="gen2.php" method= "post">
<input type="hidden" name="check" value="1">
<input type="submit"  class="button" value="GO-BACK">
  </form>

  </center>
</body>
</html>
<?php
session_start();
$check=$_SESSION['gen'];
if($check=='1')
{}
else
{

  header('Location:login.php');
}
error_reporting(0);
$length=$_POST['bangaram'];
$king=$_POST['bangaram2'];
$sl=$_POST['bangaram3'];
$count2=$_POST['count'];
$questions=array();
$count=array();
$check=array();
$girish=array();
$counter=1;
$just=0;
for($k=1;$k<=$length; $k++)
{
$questions[$k]=$_POST["iname"."$k"];
}
for($y=1;$y<=$length;$y++)
{
  $z="laxmi"."$y";
  $z=array();
}

$host='localhost';
$username='root';
$password='';
$db=$king;
$connect=mysql_connect($host, $username, $password);
mysql_select_db($db);
for($k=1; $k<=$sl ;$k++)
{
  echo"<hr>";
  //echo"<hr style='border-top: dotted 1px;' />";
  /*echo"<center><h1>Girish College of Engineering </h1> </center>";*/
  echo"<center><h1>COMPUTER PROGRAMMING </h1> </center>";
  echo"<center><h4>(Common to CSE & IT) </h4> </center>";
  echo"<hr>";
  echo"<center><h4><i>Answer any FIVE Questions </i> </h4> </center>";
  echo"<center><h4><i>All Questions Carry Equal Marks  </i> </h4> </center>"; 
  echo"<center><h3> SET-$k</h3> </center>";
  echo"</hr>";
for($i=1; $i<=$length ;$i++)
{
	    if($questions[$i]!="0")
	    {
	         for($j=1;$j<=$questions[$i];$j++)
	         {
	               
	               $hi=mysql_query( "SELECT count(1) FROM unit$i");
                       $row=mysql_fetch_array($hi);
                       $count[$i]=$row[0];
                       $c=rand(2,$count[$i]);


                              if(in_array($c, $check) || in_array($c, ${"laxmi" . $i} )) //check array is used for within unit repition.
                                  {
                                   $j=$j-1;  // laxmi array is used for all units repition.
                                 }
                                   


                                  
                              else
                              { 
                                $just++;
                                $t=($counter)%$count2; // t is used to print question numbers
                                if($t==0)
                                {
                                  $t=$count2;
                                }

                                ${"laxmi" . $i}[$counter]=$c;
                                

                                $check[$j]=$c;
                                $query1=mysql_query( "SELECT q FROM  unit$i where qno='$c' ");
                                $row=mysql_fetch_array($query1);
                                echo"<font size='4.5px'>$t.&nbsp$row[q] </font>";
                                echo"<br/>";  echo"<br/>";
                                $counter=$counter+1;

                              } 









	         }
        }

}
}
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" language="javascript">

        $(document).ready(function () {

            $(document).bind("contextmenu", function (e) {
            alert("This Function not allowed Here.")
                return false;
            });
            window.history.pushState(null, "", window.location.href);
            window.addEventListener('popstate', function () {
                window.history.pushState(null, "", window.location.href);
                alert("You are not allowed to use this Function\nClick on GO BACK button at the top of page.")

            });
        });
</script>

<script type = "text/javascript">  
    window.onload = function () {  
        document.onkeydown = function (e) {  
            return (e.which || e.keyCode) != 116;  
        };  
    }  
</script>  
<script type="text/javascript">
    window.onbeforeunload = function() {
        return false;
    }
</script>









