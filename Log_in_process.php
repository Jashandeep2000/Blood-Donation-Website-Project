<?php
include_once("Connection.php");

$uid=$_GET["luid"];
$pwd=$_GET["lpwd"];

session_start();


$qry="select * from signup where uid='$uid' and password='$pwd'";

$table=mysqli_query($dbcon,$qry);
if(mysqli_error($dbcon)=="")
{
    $table=mysqli_query($dbcon,$qry);
    if(mysqli_num_rows($table)!=0)
    {
        $row=mysqli_fetch_array($table);
        $_SESSION["uid"]=$uid;
        $_SESSION["type"]=$row["type"];
        echo $row["type"];
    }
    else
        echo "Unauthorised";
}
else
    echo mysqli_error($dbcon);
?>