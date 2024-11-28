<?php
session_start();
if(isset($_SESSION["uid"])==true)
    if(isset($_SESSION["type"])==true)
        if($_SESSION["type"]=="needy")
            header("location:Needy-Profile-Front.php");
        else 
            header("location:Donation-Register-Front.php");
?>
<html>

<head>
    <title>Donate It!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="JS/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="JS/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <script>
        $(document).ready(function(){ 
            $("#signupbtn").click(function(){
                if($("#suid").val()=="")
                    {
                        $("#suid").css("border-color","red");
                        $("#suid").focus();
                        return;
                    }
                else if($("#spwd").val()=="")
                    {
                        $("#spwd").css("border-color","red");
                        $("#spwd").focus();
                        return;   
                    }
                
                var allData=$("#signupfrm").serialize();
                var url="Sign_up_process.php?"+allData;
                $.get(url,function(response,status){
                    alert(response);
                })
            })
            $("#loginbtn").click(function(){
                if($("#luid").val()=="")
                    {
                        $("#luid").css("border-color","red");
                        $("#luid").focus();
                        return;
                    }
                else if($("#lpwd").val()=="")
                    {
                        $("#lpwd").css("border-color","red");
                        $("#lpwd").focus();
                        return;   
                    }
                
                var url="Log_in_process.php?luid="+$("#luid").val()+"&lpwd="+$("#lpwd").val();
                $.get(url,function(response,status){
                    alert(response);
                    if(response=="needy")
                        {
                            window.location="Needy-Profile-Front.php";
                        }
                    else if(response=="donor")
                        {
                           window.location="Donation-Register-Front.php";
                        }
                    else
                        window.location="Index.php";
            })
           })
        });
    </script>
    <style>
        #suid,#spwd,#lpwd,#luid{
             outline-style:none;
             box-shadow:none;
        }
        #inner{
            height: 2000px;
        }
        #last{
            background-color: #2c3e50;
            color:white;
            width: inherit;
            height: auto;
        }
        #side{
            margin-left: 110px;
            padding-top: 15px;
            font-size: 22px;
        }
        #main{
            background-image: url(Pictures/Blood_donation/back3.jpg)    
        }
        #right{
            float: right;
            margin-right: 5px;
            padding-top: 3px;
        }
        img{
            z-index: 1000;
        }
        #small{
            padding-top: 30px;
            margin-right: 100px;
        }
        #copy{
            background-color: #1a252f;
            height: 65px;
            width: inherit;
            color: white;
        }
        #btn:active,#loginbtn:active,#signupbtn:active
        {
            transform: translate(2px, 2px);
        }
        .ok{
            width: 20px; height: 20px;
            background-image: url(pics/ok.png);
            background-size: contain;
            margin-left:10px;
        }
        .notok{
            width: 20px; height: 20px;
            background-image: url(pics/notok.png);
            background-size: contain;
            margin-left:10px;
        }
    </style>
</head>

<body id="main">
    <!-- ====================NAV-BAR=============================== -->
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
                        <a class="nav-link" href="Who_donate.html">
                            <h5 id="btn">FACTS</h5><span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#signup">
                            <h5 id="btn">SIGN-UP</h5>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#login">
                            <h5 id="btn">LOG-IN</h5>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#last">
                            <h5 id="btn">CONTACT US</h5>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- =====================SIGN-UP============================== -->
    <div class="modal" tabindex="-1" role="dialog" id="signup">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: firebrick;">
                    <h5 class="modal-title" style="color: white;">SIGN-UP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="signupfrm">
                        <div class="form-group">
                            <label>
                                <h5>Email address</h5>
                            </label>
                            <input type="email" autofocus class="form-control" id="suid" name="suid" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>
                                <h5>Password</h5>
                            </label>
                            <input type="password" class="form-control" id="spwd" name="spwd" placeholder="Password">
                        </div>
                        <div class="form-row h5">
                            <div class="col-md-4">
                                Select Type:
                            </div>
                            <div class="col-md-8">
                                <select name="stype" id="stype" class="form-control">
                                    <option value="donor" selected>Donor</option>
                                    <option value="needy">Needy</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="signupbtn" class="btn btn-outline-danger btn-lg">SIGN-UP</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================LOG-IN============================== -->
    <div class="modal" tabindex="-1" role="dialog" id="login">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: firebrick;">
                    <h5 class="modal-title" style="color: white;">LOG-IN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="signupfrm">
                        <div class="form-group">
                            <label>
                                <h5>Email address</h5>
                            </label>
                            <input type="email" autofocus class="form-control" id="luid" name="luid" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>
                                <h5>Password</h5>
                            </label>
                            <input type="password" class="form-control" id="lpwd" name="lpwd" placeholder="Password">
                        </div>
                        <!--<div class="form-row h5">
                            <div class="col-md-6">
                                <input type="radio" value="donor" name="stype" style="zoom: 1.5;">
                                Donor
                            </div>
                            <div class="col-md-6"><input type="radio" value="needy" name="stype" style="zoom: 1.5;">
                                Needy
                            </div>
                        </div>-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="loginbtn" class="btn btn-outline-danger btn-lg">LOG-IN</button>
                </div>
            </div>
        </div>
    </div>
    <!-- =====================CAROUSEL============================= -->
    <div class="container" style="margin-top: 100px;">
        <div class="row" style="background-color:transparent">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="Pictures/Blood_donation/Carousel-4.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="Pictures/Blood_donation/Carousel-2.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="Pictures/Blood_donation/Carousel-1.png" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="Pictures/Blood_donation/Carousel-3.png" alt="Forth slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="Pictures/Blood_donation/Carousel-5.png" alt="Fifth slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- ============================================================= -->
        <div class="row h2 mt-3" style="background-color: firebrick;text-align: center;">
            <div class="col-md-12" style="color: white; font-family: cursive;">Facts About Blood Donation</div>
        </div>
        <!-- =================FACTS================================ -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div><img class="card-img-top" src="Pictures/Blood_donation/Donate%20Blood-2.jpg" alt="Card image cap"></div>
                    <div class="card-body text-primary">
                        <p class="card-text h5">Every 3 Minutes someone needs blood.Your blood can save upto life of 3 people. Donate for cause.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                    <div><img class="card-img-top" src="Pictures/Blood_donation/Donate%20Blood-4.jpg" alt="Card image cap"></div>
                    <div class="card-body text-secondary">
                        <p class="card-text h5">Children being treated for cancer,having heart surgery need blood and platelets from donors of all types, especially type O.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-success mb-3" style="max-width: 18rem;">
                    <div><img class="card-img-top" src="Pictures/Blood_donation/Donate640-1.png" alt="Card image cap"></div>
                    <div class="card-body text-success">
                        <p class="card-text h5">Apheresis is special kind of blood donation that allows donor to give specific blood components, such as platelets.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- =================FACTS========================================= -->
        <div class="row">
            <div class="col-md-4">
                <div class="card border-info mb-3" style="max-width: 18rem;">
                    <div><img class="card-img-top" src="Pictures/Blood_donation/Donate640-2.jpg" alt="Card image cap"></div>
                    <div class="card-body text-info">
                        <p class="card-text h5">If all blood donors gave three times a year, blood shortages would be a rare event.(Current average=2)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-warning mb-3" style="max-width: 18rem;">
                    <div><img class="card-img-top" src="Pictures/Blood_donation/Donate640-3.jpg" alt="Card image cap"></div>
                    <div class="card-body text-warning">
                        <p class="card-text h5">The blood type most often requested by hospitals is type O. Someone needs blood every two seconds.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-danger mb-3" style="max-width: 18rem;">
                    <div><img class="card-img-top" src="Pictures/Blood_donation/Donate%20Blood%20Day-new.jpg" alt="Card image cap"></div>
                    <div class="card-body text-danger">
                        <p class="card-text h5">Blood donation may lower the risk of heart disease and heart attack. This is bcz it reduces viscosity of Blood.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ================================================================ -->
    </div>
    <!-- ===================END-ABOUT US=========================== -->
    <div id="last">
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
                    <img src="Pictures/Blood_donation/me1.jpg" width="70" height="70" style="border-radius:50%;"><img src="Pictures/Blood_donation/sir.jpg" width="70" height="70" style="border-radius:50%;"><img src="Pictures/Blood_donation/all.jpg" width="70" height="70" style="border-radius:50%;"><br>
                    Best Blood Donation site<br> to start charity and<br>
                    give you hand for<br> good cause.<br>
                </div>
            </div>
        </div>
    </div>
    <!-- ====================COPYRIGHT============================== -->
    <div id="copy">
        <center>
            <span style="margin-top: 8px;">Copyright &#9400 Your Website 2018</span>
        </center>
    </div>
    <!-- =========================================================== -->
</body>

</html>
