<?php
    include_once("connection.php");    
    
$uid=$_GET["uid"];

        $query="select * from registration where User_ID='$uid'";
        $table=mysqli_query($dbcon,$query);
        $count=mysqli_num_rows($table);
        if($count==0)
            echo "Available!";
        else
            echo "Not Available!";

        ?>