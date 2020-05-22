<?php
if(!empty($_POST["country_id"])){
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "girish";
$ink=$_POST["country_id"];
$connect = mysql_connect($hostname, $username, $password);
mysql_select_db("girish");
if (!$connect)
{
    die('Could not connect: ' . mysql_error());
}
else
{
/*echo 'connected sucessfully';*/
}

$result = mysql_query("select * from  subjects  where subjectname='$ink'") or die("failed");
$row=mysql_fetch_array($result);
$result1=$row['nunits'];

for($i=0;$i<=$result1;$i++)
{
if($i==0)
{
echo"<option value=''>SELECT THE UNIT</option>";
continue;	
}
$g="unit"."$i";
$jj="UNIT-"."$i";
echo"<option value='$g'>$jj</option>";
}
}

?>