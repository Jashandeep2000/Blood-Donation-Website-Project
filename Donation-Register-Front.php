<?php
session_start();
if(isset($_SESSION["uid"])==false)
    header("location:Index.php");
?>
<html>

<head>
    <title>Donation Registeration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="JS/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="JS/bootstrap.min.js"></script>

    <script>
        function showphoto(file) {
            if (file.files && file.files[0]) 
            {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo').prop('src', e.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
        //----------------------------------------------------------------

        $(document).ready(function() {
            //-------------------------------------
            $(document).ajaxStart(function() {
                $("#wait").css("display", "inline");
            });
            $(document).ajaxStop(function() {
                $("#wait").css("display", "none");
            });

            $("#uid").keyup(function() {
                $uid = $("#uid").val();
                $.get("Ajax-Donar-Uid.php?uid=" + $uid, function(result) {
                    $("#errid").html(result);
                });
            });
            //--------------------------------------
            $("#btnFetch").click(function() {
                var uid = $("#uid").val();
                var url = "Json-Fetch-Donar.php?uid=" + $uid;
                $.getJSON(url, function(object) {
                   // alert(JSON.stringify(object));
                    if (object.length == 0) {
                        alert("No record found");
                        return;
                    }
                    var inString = JSON.stringify(object);
                    $("#uname").val(object[0].User_Name);
                    $("#address").val(object[0].User_Address);
                    $("#mobile").val(object[0].User_Mobile);
                    $("#city").val(object[0].City);
                    $("#gender").val(object[0].Gender);
                    $("#age").val(object[0].Age);
                    $("#group").val(object[0].Blood_Group);
                    $("#times").val(object[0].Blood_Donated);
                    $("#info").val(object[0].Other_Info);
                    $("#photo").prop("src", "uploads/" + object[0].Profile_Pic);
                });
            });
        });

    </script>
    <style>
        #gender,
        #group {
            width: 100px;
            height: 37px;
            border-radius: 4px;
            border-color: lightgray;
        }

        #wait {
            display: none;
            zoom: .6;
        }
        #btnFetch:active, #btn:active{
            transform: translate(2px, 2px);
        }
    </style>
</head>

<body>

    <form action="Donation-Register-Process.php" method="post" enctype="multipart/form-data">
        <div class="row" style="background-color: darkred; font-family: FontAwesome;">
            <div class="col-md-1"></div>
            <div class="col-md-10 display-4 font-weight-bold offset-1" style="color: white;">BLOOD DONATION REGISTRATION&nbsp;&nbsp;<img id="wait" src="Pictures/Logos/Animated%20Wait-4.gif"></div>
            <div class="col-md-1"></div>
        </div>
        <div class="container">
            <div class="form-row mt-3">
                <div class="form-group col-md-4">
                    <label class="h6">User ID:&nbsp;&nbsp;<span id="errid"></span></label>
                    <input type="text" required class="form-control" id="uid" name="uid" placeholder="Enter User ID" value="<?php  echo $_SESSION["uid"];?>" disabled>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-outline-danger btn-lg mt-3 offset-2 font-weight-bold" value="Fetch" id="btnFetch" name="btnFetch">Fetch</button>
                </div>
                <div class="form-group col-md-5">
                    <label class="h6">Set Profile Picture:</label>
                    <div>
                        <input type="file" id="pic" name="pic" onchange="showphoto(this);">
                    </div>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-md-4">
                    <label class="h6">User Name:</label>
                    <input type="text" required class="form-control" id="uname" name="uname" placeholder="Enter Name">
                </div>
                <div class="col-md-3"></div>
                <div class="form-group col-md-5">
                    <img width="150" height="100" id="photo" name="photo" style="border: 1px solid darkred; border-radius: 25px;">
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-md-6">
                    <label class="h6">Address:</label>
                    <input type="text" required class="form-control" id="address" name="address" placeholder="Enter Address">
                </div>
                <div class="form-group col-md-6">
                    <label class="h6">Phone Number:</label>
                    <input type="text" required class="form-control" id="mobile" name="mobile" placeholder="Enter Phone Number">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="h6">City:</label>
                    <input type="text" required class="form-control" id="city" name="city" placeholder="Your City">
                </div>
                <div class="form-group col-md-4">
                    <label class="offset-2 h6">Gender:</label>
                    <div class="offset-2"><select id="gender" required name="gender">
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="h6">Age:</label>
                    <input type="number" min="18" max="50" class="form-control" required id="age" name="age" placeholder="Enter Age">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="h6">Blood Group:</label>
                    <div><select id="group" required name="group">
                            <option value="Op">O+</option>
                            <option value="O-">O-</option>
                            <option value="Bp">B+</option>
                            <option value="B-">B-</option>
                            <option value="Ap">A+</option>
                            <option value="A-">A-</option>
                            <option value="ABp">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-8">
                    <label class="h6">How Many Times Blood Donated Earlier?</label>
                    <input type="number" min="0" required class="form-control" id="times" name="times">
                </div>
            </div>
            <div class="form-group">
                <label>Other Info:</label>
                <textarea type="textarea" class="form-control" required id="info" name="info" placeholder="Any Information related to the user which might be useful."></textarea>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-danger btn-lg font-weight-bold" value="submit" id="btn" name="btn">Submit</button>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-danger btn-lg font-weight-bold" value="update" id="btn" name="btn">Update</button>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-2">
                    <a href="Logout.php" class="btn btn-outline-danger btn-lg font-weight-bold float-left" id="btn">LOG OUT</a>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
