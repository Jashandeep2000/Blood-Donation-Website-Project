<html>

<head>
    <title>All Donors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="JS/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="JS/bootstrap.min.js"></script>
    <script src="angular.min.js" type="text/javascript"></script>
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
        #div{
            height: 850px;
            width: inherit;
        }
        select{
            width: 200px;
            height: 35px;
            border-radius: 6px;
            border: 1px lightgray solid;
        }
        body{
            background-image: url(Pictures/Blood_donation/back3.jpg);    
        }
    </style>

    <script>
        var module = angular.module("mymodule", []);
        module.controller("mycontroller", function($scope, $http) {
            //========================================
            $scope.jsonary;
            //========================================
            $scope.group;
            //========================================
            $scope.selCity; //=$scope.jsonCity[0].City;
            //========================================
            $scope.jsonCity;
            //========================================
            $scope.fetchall = function() {
                //alert($scope.selCity.City);
                var url = "Json-fetch-all.php?bg=" + $scope.group + "&city=" + $scope.selCity.City;
                $http.get(url).then(ok, notok);

                function ok(response) {
                    $scope.jsonary = response.data;
                }

                function notok(response) {
                    alert("ERROR");
                }
            }
            //========================================
            $scope.fetchallCity = function() {
                //alert($scope.group);
                var url = "Json-fetch-cities.php";
                $http.get(url).then(ok, notok);

                function ok(response) {
                    $scope.jsonCity = response.data;
                    //alert(JSON.stringify(response.data));
                }

                function notok(response) {
                    alert("ERROR");
                }
            }
            //========================================
            $scope.showDetails = function(txtid) {
                location.href = "Detail-page.php?txtid=" + txtid;
            }
        });

    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="fetchallCity();">
    <!-- =========================================================== -->
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
                    <!--<li class="nav-item active" style="margin-left: 500px;">
                        <a class="nav-link" href="Index.php">
                            <h4 id="btn">Home</h4><span class="sr-only">(current)</span>
                        </a>
                    </li>-->
                    <!--<li class="nav-item active">
                        <a class="nav-link" href="#">
                            <h4 id="btn">Features</h4>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <h4 id="btn">Pricing</h4>
                        </a>
                    </li>-->
                    <li class="nav-item active">
                        <a class="nav-link" href="#last">
                            <h4 id="btn">CONTACT US</h4>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ================================================== -->
    <div class="container" style="margin-top: 120px;">
        <!-- ============================================= -->
        <div id="div">
            <!-- ====LIMITS OF CITY AND GROUP=============== -->
            <h1>Search it!</h1>
            <center>
                <table class="table table-hover">
                    <tr>
                        <td>
                            <h5>City</h5>
                        </td>
                        <td><select ng-model="selCity" ng-options="obj.City for obj in jsonCity">
                            </select></td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Blood Group</h5>
                        </td>
                        <td>
                            <select ng-model="group">
                                <option value="Op">O+</option>
                                <option value="O-">O-</option>
                                <option value="Bp">B+</option>
                                <option value="B-">B-</option>
                                <option value="Ap">A+</option>
                                <option value="A-">A-</option>
                                <option value="ABp">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                       <td>
                            <div id="btn" class="btn btn-outline-danger btn-lg" style="margin-left: 200px;" ng-click="fetchall();">SEARCH</div>
                        </td>
                        <td>
                            <a href="Needy-Profile-Front.php" id="btn" class="btn btn-outline-danger btn-lg">BACK</a>
                        </td>
                    </tr>
                </table>
            </center>
            <!-- ==============CARDS========================== -->
            <div class="row mt-3">
                <div class="col-md-4" ng-repeat="record in jsonary">
                    <div class="card">
                        <img class="card-img-top" height="250" src="Uploads/{{record.Profile_Pic}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Name:&nbsp;&nbsp;{{record.User_Name}}</h5>
                            <h6 class="card-text">ID:&nbsp;&nbsp;{{record.User_ID}}</h6>
                            <h6 class="card-text">City:&nbsp;&nbsp;{{record.City}}</h6>
                            <h6 class="card-text">Blood Group:&nbsp;&nbsp;{{record.group1}}</h6>
                            <div id="btn" class="btn btn-outline-danger" ng-click="showDetails(record.User_ID);">Details</div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ======================================================== -->
        </div>
        <!-- ============================================================ -->
    </div>
    <!-- =============END ABOUT US============================ -->
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
                    Best Blood Donation site<br> to start charity and<br>
                    give you hand for<br> good cause.<br>
                </div>
            </div>
        </div>
    </div>
    <!-- ==============COPYRIGHT================================= -->
    <div id="copy">
        <center>
            <span style="margin-top: 8px;">Copyright &#9400 Your Website 2018</span>
        </center>
    </div>
    <!-- ================================================================ -->

</body>

</html>
