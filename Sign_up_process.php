<?php
include_once("Connection.php");

$uid=$_GET["suid"];
$pwd=$_GET["spwd"];
$type=$_GET["stype"];

$qry="insert into signup values('$uid','$pwd','$type',curdate())";
mysqli_query($dbcon,$qry);
if(mysqli_error($dbcon)=="")
    echo "USER CREATED";
else
    echo mysqli_error($dbcon);
?>