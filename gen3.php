

<?php
$length=$_POST['bangaram'];
$king=$_POST['bangaram2'];
$questions=array();
$count=array();
$check=array();
$counter=0;
for($k=1;$k<=$length; $k++)
$questions[$k]=$_POST["iname"."$k"];


$host='localhost';
$username='root';
$password='';
$db=$king;
$connect=mysql_connect($host, $username, $password);
mysql_select_db($db);
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
                              if(in_array($c, $check))
                                  {
                                   $j=$j-1;
                                  }
                              else
                              { 
                                $counter=$counter+1;    
                                $check[$j]=$c;
                                $query1=mysql_query( "SELECT q FROM  unit$i where qno='$c' ");
                                $row=mysql_fetch_array($query1);
                                echo"<font size='4.5px'>$counter.$row[q] </font>";
                                echo"<br/>";  echo"<br/>";
                              } 









	         }
        }

}



?>