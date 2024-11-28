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
    
    $btn=$_POST["btn"];
    
if($btn=="submit")
    dosubmit($dbcon);
else if($btn=="update")
    doupdate($dbcon);
    
/*==============================*/
function dosubmit($dbcon){
    $uid=$_POST["uid"];
    $uname=$_POST["uname"];
    $address=$_POST["address"];
    $mobile=$_POST["mobile"];
    $city=$_POST["city"];
    $gender=$_POST["gender"];
    if($gender=="female")
        $gender="female";
    else
        $gender="male";
    $age=$_POST["age"];
    $group=$_POST["group"];
    if($group=="Op")
        $group1="O+";
    else if($group=="O-")
        $group1="O-";
    else if($group=="Op")
        $group1="O+";
    else if($group=="Bp")
        $group1="B+";
    else if($group=="B-")
        $group1="B-";
    else if($group=="Ap")
        $group1="A+";
    else if($group=="A-")
        $group1="A-";
    else if($group=="ABp")
        $group1="AB+";
    else if($group=="AB-")
        $group1="AB-";
    $times=$_POST["times"];
    $info=$_POST["info"];
    $pic=$_FILES["pic"]["name"];
    move_uploaded_file($_FILES["pic"]["tmp_name"],"Uploads/".$pic);
        
        $qry="insert into registration values('$uid','$uname','$address','$mobile','$city','$gender','$age',
        '$group','$times','$info','$pic','$group1')";
    mysqli_query($dbcon,$qry);
    $count=mysqli_affected_rows($dbcon);
    if(mysqli_error($dbcon)=="" && $count==1)
       echo "<h1>Submitted</h1>";
    else
       echo "Error:".mysqli_error($dbcon);  
    }
/*==============================*/
function doupdate($dbcon){
    $uid=$_POST["uid"];
    $uname=$_POST["uname"];
    $address=$_POST["address"];
    $mobile=$_POST["mobile"];
    $city=$_POST["city"];
    $gender=$_POST["gender"];
    if($gender=="female")
        $gender="female";
    else
        $gender="male";
    $age=$_POST["age"];
    $group=$_POST["group"];
    if($group=="Op")
        $group1="O+";
    else if($group=="O-")
        $group1="O-";
    else if($group=="Op")
        $group1="O+";
    else if($group=="Bp")
        $group1="B+";
    else if($group=="B-")
        $group1="B-";
    else if($group=="Ap")
        $group1="A+";
    else if($group=="A-")
        $group1="A-";
    else if($group=="ABp")
        $group1="AB+";
    else if($group=="AB-")
        $group1="AB-";
    $times=$_POST["times"];
    $info=$_POST["info"];
    $pic=$_FILES["pic"]["name"];
    move_uploaded_file($_FILES["pic"]["tmp_name"],"Uploads/".$pic);
    
    $qry="update registration set User_Name='$uname',User_Address='$address',User_Mobile='$mobile',City='$city', Gender='$gender',Age='$age',Blood_Group='$group',Blood_Donated='$times',gender= '$gender',Other_Info='$info',Profile_Pic='$pic',group1='$group1' where User_ID='$uid'";
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
