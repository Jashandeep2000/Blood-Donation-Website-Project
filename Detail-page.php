<?php
    
include_once("Connection.php");
$uid=$_GET["txtid"];
$query="select * from registration where User_ID='$uid'";
$table=mysqli_query($dbcon,$query);

if(mysqli_num_rows($table)==0)
    {
        echo "No record found=".$uid;
        return;
    }
 $ary=array();
$row=mysqli_fetch_array($table);

?>

<html>

<head>
    <title>Donor-Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="JS/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="JS/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style>
    #btn:active{
            transform: translate(2px, 2px);
        }
        #last{
            background-color: #2c3e50;
            color:white;
            width: inherit;
            height: 250px;
        }
        #side{
            margin-left: 110px;
            padding-top: 15px;
            font-size: 22px;
        }
        #copy{
            background-color: #1a252f;
            height: 65px;
            width: inherit;
            color: white;
        }
    </style>
</head>

<body>
   <!-- ===============Nav-bar============================== -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
        <div class="navbar" style="color:white;">
            <h1>DONATE BLOOD!</h1>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="right">
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ml-5">
                    <li class="nav-item active" style="margin-left: 500px;">
                        <a class="nav-link" href="#last">
                            <h4 id="btn">Contact Us</h4>
                        </a>
                    </li>
                   <!--<li class="nav-item active">
                        <a class="nav-link" href="#">
                            <h4 id="btn">Features</h4>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <h4 id="btn">Pricing</h4>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <h4 id="btn">Disabled</h4>
                        </a>
                    </li>-->
                </ul>
            </div>
        </div>
    </nav>
    <!-- ===========TABLE=========================== -->
    <div class="container" style="margin-top: 100px;">
        <h1>Your All User Details:</h1>
        <center>
            <table class="table table-hover">
                <tr>
                    <td>User ID</td>
                    <td>
                        <?php echo  $row["User_ID"];?>
                    </td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td>
                        <?php echo $row["User_Name"];?>
                    </td>
                </tr>
                <tr>
                    <td>User Address</td>
                    <td>
                        <?php echo $row["User_Address"];?>
                    </td>
                </tr>
                <tr>
                    <td>Mobile Number</td>
                    <td>
                        <?php echo $row["User_Mobile"];?>
                    </td>
                </tr>
                <tr>
                    <td>Profile Picture</td>
                    <td>
                        <img src="Uploads/<?php echo $row["Profile_Pic"];?>" width=200 height=150 >
                    </td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>
                        <?php echo $row["City"];?>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <?php echo $row["Gender"];?>
                    </td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>
                        <?php echo $row["Age"];?>
                    </td>
                </tr>
                <tr>
                    <td>Blood Group</td>
                    <td>
                        <?php echo $row["group1"];?>
                    </td>
                </tr>
                <tr>
                    <td>Blood Donated</td>
                    <td>
                        <?php echo $row["Blood_Donated"]+"  Times";?>
                    </td>
                </tr>
                <tr>
                    <td>Other Information</td>
                    <td>
                        <?php echo $row["Other_Info"];?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="Show-Donors.php" id="btn" class="btn btn-outline-danger btn-lg">BACK</a>
                    </td>
                </tr>
            </table>
        </center>
    </div>
    <!-- ===========END ABOUT US======================================= -->
    <div id="last" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-4">
                <div id="side">
                    <center>
                        <h1>LOCATION</h1><br>
                        Street No. 12/2,<br>
                        Power House Road,<br>
                        Bathinda,India
                    </center>
                </div>
            </div>
            <div class="col-md-4">
                <div id="side">
                    <h1>MEDIA PARTNER</h1>
                    <center>
                        <div id="small">
                            <!--<img src="Pictures/Logos/facebook-brands.svg" width="50" height="50">-->
                            <h1> <i class="fab fa-facebook-square"></i>&nbsp;
                                <i class="fab fa-twitter-square"></i>&nbsp;
                                <i class="fab fa-google-plus-square"></i>&nbsp;
                                <i class="fab fa-cc-visa"></i>
                                <!--<i class="fab fa-cc-mastercard"></i>-->
                            </h1>
                        </div>
                    </center>
                </div>
            </div>
            <div class="col-md-4">
                <div id="side">
                    <h1>ABOUT US</h1>
                    <img src="Pictures/Blood_donation/me.jpg" width="70" height="70">
                    Best Blood Donation site<br> to start charity and<br>
                    give you hand for<br> good cause.<br>
                </div>
            </div>
        </div>
    </div>
    <!-- ============COPYRIGHT======================================== -->
    <div id="copy">
        <center>
            <span style="margin-top: 8px;">Copyright &#9400 Your Website 2018</span>
        </center>
    </div>
    <!-- =============================================================== -->
</body>

</html>
