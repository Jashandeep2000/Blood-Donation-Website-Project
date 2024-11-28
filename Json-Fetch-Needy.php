<?php
    
include_once("connection.php");

$uid=$_GET["uid"];
$query="select * from needy where Needy_ID='$uid'";
$table=mysqli_query($dbcon,$query);
$ary=array();

while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);
?>