<?php
session_start();
if(isset($_SESSION["uid"])==false)
    header("location:Index.php");
?>
<html>

<head>
    <title>Needy Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="JS/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="JS/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <style>

        #btn:active,#btnFetch:active{
            transform: translate(2px, 2px);
        }
        #copy{
            background-color: #1a252f;
            height: 65px;
            width: inherit;
            color: white;
        }
        #last{
            background-color: #2c3e50;
            color:white;
            width: inherit;
            height: 250px;
        }
        #side{
            margin-left: 90px;
            padding-top: 15px;
            font-size: 22px;
        }
        #wait {
            display: none;
            zoom: .6;
        }
        
    </style>
    <script>
        $(document).ready(function(){
        //--------------------------------------
        $(document).ajaxStart(function() {
                $("#wait").css("display", "inline");
            });
            $(document).ajaxStop(function() {
                $("#wait").css("display", "none");
            });

            $("#uid").keyup(function() {
                $uid = $("#uid").val();
                $.get("Ajax-Needy-Uid.php?uid=" + $uid, function(result) {
                    $("#errid").html(result);
                });
            });
            //--------------------------------------
            $("#btnFetch").click(function() {
                var uid = $("#uid").val();
                var url = "Json-Fetch-Needy.php?uid=" + $uid;
                $.getJSON(url, function(object) {
                   // alert(JSON.stringify(object));
                    if (object.length == 0) {
                        alert("No record found");
                        return;
                    }
                    var inString = JSON.stringify(object);
                    $("#uname").val(object[0].Needy_Name);
                    $("#address").val(object[0].Address);
                    $("#mobile").val(object[0].Mobile_No);
                    $("#city").val(object[0].City);
                    $("#state").val(object[0].State);  
                    $("#gender").val(object[0].Gender);  
                    $("#acard").val(object[0].Acard_No);  
                    $("#organ").val(object[0].Organization);  
                });
            });
    });
    </script>
    
</head>

<body style="background-color: aliceblue;">
    <!-- ==================NAV-BAR==================================== -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
        <div class="navbar" style="color:white;">
            <h1>NEED BLOOD!</h1>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="right">
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ml-5">
                    <li class="nav-item active" style="margin-left: 800;">
                        <a class="nav-link" href="#last">
                            <h5 id="btn">CONTACT US</h5>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ================HEAD QUOTE======================================= -->
    <div class="row h1" style="background-color: darkred; margin-top: 86px;">
        <div class="col-md-4"></div>
        <div class="col-md-5 mt-3 mb-3 font-weight-bold" style="font-family: FontAwesome; color: white;">BE A HERO GIVE BLOOD</div>
        <div class="col-md-3"></div>
    </div>
    <!-- ===============CARDS OF DASH================================ -->
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card offset-2" style="width: 22rem;">
                <img class="card-img-top" src="Pictures/Blood_donation/Blood%20Needed-2.jpg" alt="Card image cap">
                <div class="card-body">
                    <center>
                       
                        <button class="btn btn-outline-danger btn-lg font-weight-bold" data-toggle="modal" data-target="#Needy" id="btn">NEEDY PROFILE</button>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card offset-1" style="width: 22rem;">
                <img class="card-img-top" src="Pictures/Blood_donation/Donate640-1.png">
                <div class="card-body">
                    <center>
                        <a href="Show-Donors.php" class="btn btn-outline-danger btn-lg font-weight-bold" target="_blank" id="btn">BLOOD SEARCH</a>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card offset-1 ml-3" style="width: 22rem;">
                <img class="card-img-top" src="Pictures/Blood_donation/Donate640-3.jpg" alt="Card image cap">
                <div class="card-body">
                    <center>
                        <a href="Logout.php" class="btn btn-outline-danger btn-lg font-weight-bold" id="btn">LOG OUT</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- ==============NEEDY PROFILE MODAL=========================== -->
    <div class="modal" tabindex="-1" role="dialog" id="Needy">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: darkred;">
                    <h4 class="modal-title" style="color: white;">NEEDY PROFILE:</h4>&nbsp;&nbsp;<img id="wait" src="Pictures/Logos/Animated%20Wait-4.gif">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Needy-Profile-Process.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-md-10">
                                <label>User ID:&nbsp;&nbsp;&nbsp;<span id="errid"></span></label>
                                <input type="text" class="form-control" id="uid" name="uid" placeholder="User-ID" value="<?php  echo $_SESSION["uid"];?>" disabled>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-outline-danger mt-3 font-weight-bold" value="Fetch" id="btnFetch" name="btnFetch">Fetch</button>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>User Name:</label>
                                <input type="text" class="form-control" id="uname" name="uname" placeholder="Name"></div>
                            <div class="form-group col-md-6">
                                <label>Gender:</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="City">
                            </div>
                            <div class="form-group col-md-6">
                                <label>State</label>
                                <select id="state" name="state" class="form-control">
                                    <option value="punjab">Punjab</option>
                                    <option value="himachal">Himachal Pradesh</option>
                                    <option value="haryana">Haryana</option>
                                    <option value="madhya">Madhya Pradesh</option>
                                    <option value="uttrakhand">Uttrakhand</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Adhaar Card Number:</label>
                                <input type="text" class="form-control" name="acard" id="acard" placeholder="Adhaar card number">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Mobile Number:</label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Organization(If Any):</label>
                            <input type="text" class="form-control" name="organ" id="organ" placeholder="Organization">
                        </div>
                        <button type="submit" id="btn" name="button" class="btn btn-outline-danger font-weight-bold" value="submit">Submit</button>
                        <button type="submit" id="btn" name="button" class="btn btn-outline-danger font-weight-bold" value="update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ===========LAST ABOUT US================== -->
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
                    Best Blood Donation site<br> to start charity and<br>
                    give you hand for<br> good cause.<br>
                </div>
            </div>
        </div>
    </div>
    <!-- ===========COPYRIGHT======================================== -->
    <div id="copy">
        <center>
            <span style="margin-top: 8px;">Copyright &#9400 Your Website 2018</span>
        </center>
    </div>
    <!-- ================================================================ -->
</body>

</html>
