<html>

<head>
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="JS/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="JS/bootstrap.min.js"></script>
</head>

<body>
    <?php 
   include_once("Connection.php");

   $btn=$_POST["button"];

if($btn=="submit")
  dosubmit($dbcon);
else if($btn=="update")
  doupdate($dbcon);

function dosubmit($dbcon)
{
    $uid=$_POST["uid"];
    $uname=$_POST["uname"];
    $gender=$_POST["gender"];
    if($gender=="female")
        $gender="female";
    else
        $gender="male";
    $address=$_POST["address"];
    $city=$_POST["city"];
    $state=$_POST["state"];
    if($state=="punjab")
        $state="Punjab";
    else if($state=="himachal")
        $state="Himachal Pradesh";
    else if($state=="haryana")
        $state="Haryana";
    else if($state=="madhya")
        $state="Madhya Pradesh";
    else if($state=="uttrakhand")
        $state="Uttrakhand";
    $acard=$_POST["acard"];
    $mobile=$_POST["mobile"];
    $organ=$_POST["organ"];
    
    $qry="insert into needy values('$uid','$uname','$gender','$address','$city','$state','$acard','$mobile','$organ',curdate())";
    mysqli_query($dbcon,$qry);
    $count=mysqli_affected_rows($dbcon);
    if(mysqli_error($dbcon)=="" && $count==1)
            echo "<h1>Submited</h1>";
    else
        echo "error:".mysqli_error($dbcon);
}
 
    function doupdate($dbcon)
    {
        $uid=$_POST["uid"];
    $uname=$_POST["uname"];
    $gender=$_POST["gender"];
    if($gender=="female")
        $gender="female";
    else
        $gender="male";
    $address=$_POST["address"];
    $city=$_POST["city"];
    $state=$_POST["state"];
    if($state=="punjab")
        $state="Punjab";
    else if($state=="himachal")
        $state="Himachal Pradesh";
    else if($state=="haryana")
        $state="Haryana";
    else if($state=="madhya")
        $state="Madhya Pradesh";
    else if($state=="uttrakhand")
        $state="Uttrakhand";
    $acard=$_POST["acard"];
    $mobile=$_POST["mobile"];
    $organ=$_POST["organ"];
    
    $qry="update needy set Needy_Name='$uname',Gender='$gender',Address='$address',City='$city',State='$state', Acard_No='$acard',Mobile_No='$mobile',Organization='$organ' where Needy_ID='$uid'";
    mysqli_query($dbcon,$qry);
    $count=mysqli_affected_rows($dbcon);
    if(mysqli_error($dbcon)=="" && $count==1)
        echo "<h1>Updated</h1>";
    else
        echo "Error:".mysqli_error($dbcon);
    }
?>
</body>

</html>
