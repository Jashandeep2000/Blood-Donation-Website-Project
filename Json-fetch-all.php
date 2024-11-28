<?php
    
include_once("Connection.php");

$bg=$_GET["bg"];
$city=$_GET["city"];

$query="select * from registration where Blood_Group='$bg' and City='$city'";
$table=mysqli_query($dbcon,$query);
$ary=array();

while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);
?>
