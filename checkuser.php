<?php

$email1=$_POST["email"];
$host='localhost';
$username='root';
$password1='';
$db='login';
$check=array();
$connect=mysql_connect($host, $username, $password1);
mysql_select_db("login");
$result = mysql_query("select * from  user  where email='$email1' ") or die("failed");

$row=mysql_fetch_array($result);
if($row['email' ]== $email1 && $row['email'] != "" )
{

$check['status']="1";

}
else
{
	$check['status']="0";
}
 $c= json_encode($check);
 echo $c;


?>