<!DOCTYPE html>
<html lang="en">


<head>
    <?php
    // Define keywords for the current page
    $page_keywords = "srishakyasinhesarasavi, srishakyasinhesarasavi, srishakyasinhesarasavi.com, sri shakyasinhe sarasavi, sri shakyasinhe sarasaviya, sri shakyasinghe sarasavi, sri shakyasinghe sarasaviya";
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sri shakyasinhe sarasaviya</title>
    <meta name="keywords" content="<?php echo $page_keywords; ?>">
    <meta name="description" content="Welcome to our Buddhist Association, where we champion the spread of Buddhist philosophy, education, and culture. Our mission is to foster religious harmony, preserve heritage, and promote social welfare inspired by Buddhist principles. Join us on a journey of enlightenment and compassion.">

    <meta name="robots" content="index, follow">

    <link rel="icon" href="resources/logo.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="resources/logo.ico">
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
                /* Start slightly below */
            }

            to {
                opacity: 1;
                transform: translateY(0);
                /* Move back to original position */
            }
        }

        .animated-division {
            opacity: 0;
            /* Initially invisible */
            animation: fadeIn 1s ease-in-out forwards;
            /* Run the animation only once */
        }

        /* Additional styling for visibility */
        #target {
            min-height: auto;
            /* Ensure the section fills the viewport height */
        }


        .team-member {
            background-color: gold;
            border-radius: 20px;
            transition: transform 0.3s ease-in-out;

        }

        .team-member:hover {
            transform: scale(1.05);
        }

        .team-member img {
            border: 4px solid white;
            border-radius: 50%;
            transition: border-color 0.3s ease-in-out;
        }

        .team-member:hover img {
            border-color: #8b4513;
        }

        .team-member h5 {
            transition: color 0.3s ease-in-out;
        }

        .team-member p {
            transition: color 0.2s ease-in-out;
        }

        .team-member:hover p {
            color: black;
        }

        .team-member:hover h5 {
            color: #8b4513;
        }

        .header-title {
            font-family: 'Arial', sans-serif;
            color: #8b4513;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            margin: 0;
            /* Remove default margin */
        }



        .team-member2 {
            background-color: gold;
            border-radius: 20px;
            transition: transform 0.3s ease-in-out;
            height: 410px;

        }

        .team-member2:hover {
            transform: scale(1.05);
        }

        .team-member2 img {
            border: 4px solid white;
            border-radius: 50%;
            transition: border-color 0.3s ease-in-out;
        }

        .team-member2:hover img {
            border-color: #8b4513;
        }

        .team-member2 h5 {
            transition: color 0.3s ease-in-out;
        }

        .team-member2 p {
            transition: color 0.2s ease-in-out;
        }

        .team-member2:hover p {
            color: black;
        }

        .team-member2:hover h5 {
            color: #8b4513;
        }


        .bg-section {
    padding: 200px 0;
    width: auto;
    height: auto;
    background-position: center;
    background-size: cover;
    background-image: url("resources/two.jpg");
    background-attachment: fixed;
}


.bg-section2 {
    padding: 200px 0;
    width: auto;
    height: auto;
    background-position: center;
    background-size: cover;
    background-image: url("resources/2.jpg");
    background-attachment: fixed;
}

.attractive-image {
    max-width: 100%;
    max-height: 100%;
    width: 100%;
    margin-bottom: 30px;
    height: auto;
    filter: grayscale(40%) brightness(90%) contrast(110%);
    transition: transform 0.3s ease-in-out, filter 0.3s ease-in-out;
}

.attractive-image:hover {
    transform: scale(1.01); /* Scale up on hover for a subtle zoom effect */
    filter: grayscale(0%) brightness(100%) contrast(100%); /* Remove grayscale and adjust brightness/contrast on hover */
}


    </style>
</head>
<?PHP
session_start();

include "connection.php";
if (isset($_SESSION["u"])) {
    $prof_rs = Database::search("SELECT * FROM `profile_images` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
    $prof_num = $prof_rs->num_rows;
    $prod_data = $prof_rs->fetch_assoc();
}
?>

<body style="background-color: #fff5cc;">


    <div class="modal" tabindex="-1" id="modal1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <?PHP

                    if ($prof_num == 1) {
                    ?> <h5 class="modal-title" style="font-size: 18px; font-family: sans-serif;">Update Profile Image</h5><?PHP
                                                                                                                        } else {
                                                                                                                            ?> <h5 class="modal-title" style="font-size: 18px; font-family: sans-serif;">Upload Profile Image</h5><?PHP
                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                    ?>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 text-center">
                        <?PHP



                        if ($prof_num == 1) {
                        ?><img src="<?PHP echo $prod_data["img_path"]; ?>" width="140px" height="140px" style="border-radius: 50%; border: 2px solid gold;" id="profimage" /><?PHP
                                                                                                                                                                            } else {
                                                                                                                                                                                ?><img src="resources/user.png" width="140px" height="140px" style="border-radius: 50%;" id="profimage" /><?PHP
                                                                                                                                                                                                                                                                                        }

                                                                                                                                                                                                                                                                                            ?>

                    </div>
                    <div class="col-12 text-center mt-1">
                        <input type="file" class="d-none" id="profileimage" />
                        <label for="profileimage" class="btn mt-2" style="border: 1px solid #ff0000; color: #ff0000;" onclick="change();">Upload Image</label>

                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" onclick="saveprofimage();">Save changes</button>
                </div>
                <div class="spinner-grow text-warning d-none" id="spinner" role="status" style="position:absolute; top: 80%; bottom: 0%; right: 0%; left: 0%; margin: auto; width: 40px; height: 40px;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>




    <nav class="navbar navbar-expand-lg p-3 fixed-top bg-danger ">
        <div class="container-fluid">
            <img src="resources/logo.png" width="60px" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mt-4 mt-lg-0" style="font-size: 20px; font-family: sans-serif;">
                    <li class="nav-item mx-lg-4">
                        <a class="nav-link text-white" onclick="scrolldown();" style="cursor: pointer; ">Purpose</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="nav-link text-white" onclick="scrolldown1();" style="cursor: pointer;">Team</a>
                    </li>

                 
                    <li class="nav-item mx-lg-4">
                        <a class="nav-link text-white" onclick="scrolldown4();" style="cursor: pointer;">Events</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="nav-link text-white" onclick="scrolldown2();" style="cursor: pointer;">Congrats</a>
                    </li>
                </ul>

                <?PHP

                if (isset($_SESSION["u"])) {
                ?><div class="btn-group dropstart d-none d-lg-block">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="border: none;">
                            <?PHP
                            if (isset($_SESSION["u"])) {

                                $member_rs = Database::search("SELECT * FROM `members` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
                                $member_data = $member_rs->fetch_assoc();
                            }

                            if ($prof_num == 1) {
                            ?> <img src="<?PHP echo $prod_data["img_path"]; ?>" width="50px" height="50px" style="border-radius: 50%; border: 2px solid gold;" /><?PHP
                                                                                                                                                                } else {
                                                                                                                                                                    ?> <img src="resources/user.png" width="40px" /><?PHP
                                                                                                                                                                                                                }

                                                                                                                                                                                                                    ?>

                        </button>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                            <div class="col-12 d-grid text-center">
                                <button class="p-2" style="background-color: white; color: blue; font-family: sans-serif; font-size: 17px; border: none;">Hi <?php echo $_SESSION["u"]["fname"]; ?></button>
                            </div>
                            <?PHP

                            if (isset($member_data["status"])) {
                                if ($member_data["status"] == 2) {
                            ?><li><button class="dropdown-item mt-2" type="button" onclick="scrolldown3();">ID : <?PHP echo $member_data["member_id"]; ?></button></li><?PHP
                                                                                                                                                                    } else if ($member_data["status"] == 3) {
                                                                                                                                                                        ?><li><button class="dropdown-item mt-2" type="button" onclick="scrolldown3();">ID : <?PHP echo $member_data["member_id"]; ?></button></li><?PHP
                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                                    ?><li><button class="dropdown-item mt-2" type="button" onclick="scrolldown3();">Get Membership</button></li><?PHP
                                                                                                                                                                                                                                                                                                                                                                                                                                }





                                                                                                                                                                                                                                                                                                                                                                                                                                if ($prof_num == 1) {
                                                                                                                                                                                                                                                                                                                                                                                                                                    ?><li><button class="dropdown-item" type="button" onclick="viewmodal1();">Update profile image</button></li><?PHP
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ?><li><button class="dropdown-item" type="button" onclick="viewmodal1();">Upload profile image</button></li><?PHP
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ?>


                            <li><button class="dropdown-item text-danger" type="button" onclick="logout();">Logout</button></li>
                        </ul>
                    </div><?PHP
                        } else {
                            ?><button class="btn d-none d-lg-block" style="background-color: gold;" onclick="window.location = 'login.php';">Login | Register</button><?PHP
                                                                                                                                                                    }

                                                                                                                                                                        ?>

            </div>
        </div>

    </nav>
    <br><br><br><br class="d-lg-none">

    <div class="col-12 text-end d-block d-lg-none mt-2 pe-2 ps-2 pt-2">

        <?PHP

        if (isset($_SESSION["u"])) {
        ?>
            <div class="row" style="background-color: #ff0000;">
                <div class="col-6">
                    <button class="btn d-block d-lg-none mt-3" style="background-color: gold;">Hi <?php echo $_SESSION["u"]["fname"]; ?></button>
                </div>
                <div class="col-6 text-end">
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="border: none;">
                            <?PHP
                            if (isset($_SESSION["u"])) {

                                $member_rs = Database::search("SELECT * FROM `members` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
                                $member_data = $member_rs->fetch_assoc();
                            }

                            if ($prof_num == 1) {
                            ?> <img src="<?PHP echo $prod_data["img_path"]; ?>" width="60px" height="60px" style="border-radius: 50%; border: 2px solid gold;" /><?PHP
                                                                                                                                                                } else {
                                                                                                                                                                    ?> <img src="resources/user.png" width="60px" height="60px" /><?PHP
                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                    ?>

                        </button>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                            <?PHP

                            if (isset($member_data["status"])) {
                                if ($member_data["status"] == 2) {
                            ?><li><button class="dropdown-item" type="button">ID : <?PHP echo $member_data["member_id"]; ?></button></li><?PHP
                                                                                                                                        } else if ($member_data["status"] == 3) {
                                                                                                                                            ?><li><button class="dropdown-item" type="button">ID : <?PHP echo $member_data["member_id"]; ?></button></li><?PHP
                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                            ?> <li><button class="dropdown-item" type="button" onclick="scrolldown3();">Get Membership</button></li><?PHP
                                                                                                                                                                                                                                                                                                                                                                    }


                                                                                                                                                                                                                                                                                                                                                                        ?>

                            <?PHP

                            if ($prof_num == 1) {
                            ?><li><button class="dropdown-item" type="button" onclick="viewmodal1();">Update profile image</button></li><?PHP
                                                                                                                                    } else {
                                                                                                                                        ?><li><button class="dropdown-item" type="button" onclick="viewmodal1();">Upload profile image</button></li><?PHP
                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                    ?>
                            <li><button class="dropdown-item text-danger" type="button" onclick="logout();">Logout</button></li>
                        </ul>
                    </div>
                </div>
            </div>



        <?PHP
        } else {
        ?><button class="btn d-block d-lg-none" style="background-color: gold;" onclick="window.location = 'login.php';">Login | Register</button><?PHP
                                                                                                                                                }

                                                                                                                                                    ?>
    </div>


    <div class="container-fluid animated-division overflow-hidden mt-lg-0 mt-4" id="target" style="background: linear-gradient(to right, #fff5cc, #ffffff);">
        <div class="row mb-4 overflow-hidden ">
            <div class="col-12 col-lg-6 pe-lg-5 ps-lg-5 pt-lg-5 pb-lg-0 p-4 text-center  align-items-center justify-content-center">
                <img src="resources/logo.png" style="max-width: 100%; max-height: 100%; width: 450px; height: auto; border-radius: 20px;" class="img-fluid feature">
            </div>
            <div class="col-12 col-lg-6 p-3 pb-lg-0 pe-lg-5 ps-lg-5 pt-lg-5 justify-content-center align-self-center feature">
                <div class="col-12 text-center mt-lg-0 mt-1 pt-lg-5 ">
                    <h1 style="font-family: sans-serif; font-size: 45px; color: #8b4513;">Enlightening Minds, Empowering Communities</h1>

                </div>
                <div class="col-12 text-center mt-3 p-2 p-lg-0">
                    <p class="web-description" style="font-size: 20px; color: #2e2e2e;">Welcome to our Buddhist Association, where we champion the spread of Buddhist philosophy, education, and culture. Our mission is to foster religious harmony, preserve heritage, and promote social welfare inspired by Buddhist principles. Join us on a journey of enlightenment and compassion.</p>
                </div>
                <div class=" col-12 text-center">
                    <button type="button" class="btn btn-danger" style="height:40px;" onclick="viewmemmodal();">Get Your Membership</button>
                </div>
            </div>
            <!-- use later 
        <div class="col-12 text-center mt-lg-5">
            <img src="resources/newcover.png" style="max-width:100%; max-height:100%; width:100vw; height:auto; border-radius: 20px;">
        </div>
        -->
        </div>
    </div>




    <div class="container-fluid header-design mt-3 overflow-hidden" id="target1">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12 p-5 feature3 overflow-hidden">
                <h1 class="header-title" style="font-size: 40px;">Our Team</h1>
            </div>
        </div>

        <div class="row justify-content-center gap-5 pb-5">
            <div class="col-10 col-lg-3 mb-4 ">
                <div class="team-member feature overflow-hidden">
                    <div class="text-center p-3">
                        <img src="resources/1234.png" class="img-fluid rounded-circle" alt="Chief Patron" style="width: 200px; height:200px">
                    </div>
                    <div class="text-center p-3">
                        <h5>Chief Patron</h5>
                    </div>
                </div>
            </div>
            <div class="col-10 col-lg-3 mb-4">
                <div class="team-member feature overflow-hidden">
                    <div class="text-center p-3">
                        <img src="resources/123.png" class="img-fluid rounded-circle" alt="Chairman" style="width: 200px; height:200px">
                    </div>
                    <div class="text-center p-3">
                        <h5>Chairman</h5>
                    </div>
                </div>
            </div>
            <div class="col-10 col-lg-3 mb-4">
                <div class="team-member feature overflow-hidden">
                    <div class="text-center p-3">
                        <img src="resources/12.png" class="img-fluid rounded-circle" alt="Director" style="width: 200px; height:200px">
                    </div>
                    <div class="text-center p-3">
                        <h5>Director</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" id="memmodal">
        <div class="modal-dialog">
            <div class="modal-content">


                <button type="button" class="btn-close p-2" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="modal-body">
                    <?PHP



                    if (isset($member_data["status"])) {
                        if ($member_data["status"] == 1) {

                    ?>
                            <div class="col-12 col-lg-11 mx-auto m-5 bg-white  animated-division overflow-hidden" id="target3">

                                <div class="col-12 text-center p-5">
                                    <h1 style="font-family: sans-serif; font-size: 30px;">Membership</h1>
                                </div>

                                <div class="col-12 text-center pe-5 ps-5 pb-3 ">
                                    <img src="resources/true.png" width="200px" />
                                </div>
                                <div class="col-12 text-center pe-5 ps-5 pb-5">
                                    <h1 style="font-family: sans-serif; font-size: 30px;" class="text-success">Your request has been under reviewing</h1>
                                </div>





                            </div>

                        <?PHP

                        } else if ($member_data["status"] == 2) {

                        ?>
                            <div class="col-12 col-lg-11 mx-auto m-5 bg-white  animated-division overflow-hidden" id="target3">

                                <div class="col-12 text-center pe-5 ps-5 pb-2 pt-5">
                                    <h1 style="font-family: sans-serif; font-size: 30px;">Membership</h1>
                                </div>

                                <div class="col-12 text-center pe-5 ps-5 pb-3 ">
                                    <?PHP

                                    if ($prof_num > 0) {
                                    ?> <img src="<?PHP echo $prod_data["img_path"]; ?>" width="200px" height="200px" style="border-radius: 50%;" /><?PHP
                                                                                                                                                } else {
                                                                                                                                                    ?> <img src="resources/user.png" width="200px" /><?PHP
                                                                                                                                                                                                    }



                                                                                                                                                                                                        ?>

                                </div>
                                <div class="col-12 text-center pe-5 ps-5 pb-5">
                                    <h1 style="font-family: sans-serif; font-size: 20px;" class="text-danger">Your membership will be expires on <?PHP echo $member_data["expier_date"]; ?></h1>
                                </div>





                            </div>
                        <?PHP



                        } else if ($member_data["status"] == 3) {
                        ?>
                            <div class="col-12 col-lg-11 mx-auto m-5 bg-white  animated-division overflow-hidden" id="target3">

                                <div class="col-12 text-center pe-5 ps-5 pb-2 pt-5">
                                    <h1 style="font-family: sans-serif; font-size: 30px;">Membership</h1>
                                </div>

                                <div class="col-12 text-center pe-5 ps-5 pb-3 ">
                                    <?PHP

                                    if ($prof_num > 0) {
                                    ?> <img src="<?PHP echo $prod_data["img_path"]; ?>" width="200px" height="200px" style="border-radius: 50%; border: 2px solid gold;" /><?PHP
                                                                                                                                                                        } else {
                                                                                                                                                                            ?> <img src="resources/user.png" width="200px" /><?PHP
                                                                                                                                                                                                                            }



                                                                                                                                                                                                                                ?>

                                </div>
                                <div class="col-12 text-center pe-5 ps-5 pb-5">
                                    <h1 style="font-family: sans-serif; font-size: 20px;" class="text-danger"><?PHP echo  $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></h1>
                                    <h1 style="font-family: sans-serif; font-size: 17px;" class="text-dark">Member Id : <?PHP echo $member_data["member_id"]; ?></h1>
                                </div>





                            </div>
                        <?PHP

                        } else if ($member_data["status"] == 4) {

                        ?>
                            <div class="col-12 col-lg-11 mx-auto m-5 bg-white pb-5 animated-division overflow-hidden" id="target3">

                                <div class="col-12 text-center p-5">
                                    <h1 style="font-family: sans-serif; font-size: 30px;">Get Your Membership Today</h1>
                                </div>
                                <div class="col-12 row p-3 p-lg-5 mx-auto mb-5" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">

                                    <div class="col-12 text-center">
                                        <h1 style="font-family: sans-serif; font-size: 25px; color: red;">Something went wrong please resubmit form</h1>
                                    </div>

                                    <div class="col-12 col-lg-6 mt-3 pt-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="flname">
                                    </div>

                                    <div class="col-12 col-lg-6 mt-lg-3 pt-lg-3">
                                        <label class="form-label">Surname</label>
                                        <input type="text" class="form-control" id="srname">
                                    </div>

                                    <div class="col-12 mt-4">
                                        <label class="form-label">Permanent Address</label>
                                        <input type="text" class="form-control" id="address">
                                    </div>


                                    <div class="col-12 col-lg-4 mt-4">
                                        <label class="form-label">Province</label>
                                        <select class="form-select" aria-label="Default select example" id="province">

                                            <option value="0" selected>Select Province</option>
                                            <?PHP

                                            $p_rs = Database::search("SELECT * FROM `province`");
                                            $p_num = $p_rs->num_rows;

                                            for ($x = 0; $x < $p_num; $x++) {

                                                $p_data = $p_rs->fetch_assoc();

                                            ?> <option value="<?PHP echo $p_data["id"]; ?>"><?PHP echo $p_data["province_name"]; ?></option><?PHP

                                                                                                                                        }


                                                                                                                                            ?>


                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-4 d-grid mt-4">
                                        <label class="form-label">District</label>
                                        <select class="form-select" aria-label="Default select example" id="district">
                                            <option value="0" selected>Select District</option>
                                            <?PHP

                                            $d_rs = Database::search("SELECT * FROM `district`");
                                            $d_num = $d_rs->num_rows;

                                            for ($x = 0; $x < $d_num; $x++) {

                                                $d_data = $d_rs->fetch_assoc();

                                            ?> <option value="<?PHP echo $d_data["id"]; ?>"><?PHP echo $d_data["district_name"]; ?></option><?PHP

                                                                                                                                        }


                                                                                                                                            ?>


                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-4 mt-4">
                                        <label class="form-label">Division</label>
                                        <input type="text" class="form-control" id="division">
                                    </div>

                                    <div class="col-12 col-lg-6 mt-4">
                                        <label class="form-label">NIC</label>
                                        <input type="text" class="form-control" id="nic">
                                    </div>

                                    <div class="col-12 col-lg-6 mt-4">
                                        <label class="form-label">Date Of Birth</label>
                                        <input type="text" class="form-control" id="bday" placeholder="YYYY-MM-DD">
                                    </div>

                                    <div class="col-12 col-lg-6 mt-4">
                                        <label class="form-label">Place Of Birth</label>
                                        <input type="text" class="form-control" id="bplace">
                                    </div>

                                    <div class="col-12 col-lg-6 mt-4">
                                        <label class="form-label">Profession/Occupation/Job</label>
                                        <input type="text" class="form-control" id="job">
                                    </div>

                                    <div class="col-12 col-lg-6 mt-4">
                                        <label class="form-label">Mobile/Phone Number</label>
                                        <input type="text" class="form-control" id="mobile">
                                    </div>

                                    <div class="col-12 col-lg-6 mt-4">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1" value="<?PHP if (isset($_SESSION["u"])) {
                                                                                                                            echo $_SESSION["u"]["email"];
                                                                                                                        } ?>" <?PHP if (isset($_SESSION["u"])) {
                                                                                                                                    echo "disabled";
                                                                                                                                } ?>>
                                    </div>
                                    <div class="col-12 col-lg-6">

                                        <div class="col-12  d-grid mt-4">
                                            <label class="form-label">Gender</label>
                                            <select class="form-select" aria-label="Default select example" id="gender">
                                                <?PHP

                                                $g_rs = Database::search("SELECT * FROM `gender`");
                                                $g_num = $g_rs->num_rows;

                                                for ($x = 0; $x < $g_num; $x++) {

                                                    $g_data = $g_rs->fetch_assoc();

                                                ?> <option value="<?PHP echo $g_data["id"]; ?>"><?PHP echo $g_data["gender_name"]; ?></option><?PHP

                                                                                                                                            }


                                                                                                                                                ?>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label mt-4">Payment receipt :</label><br>
                                        <div class="row">
                                            <div class="col-7 col-lg-4">
                                                <input type="file" class="d-none" id="receipt" />
                                                <label for="receipt" class="btn" style="border: 1px solid black; color: gray;" onclick="viewreceipt();">Upload Image</label>
                                            </div>
                                            <div class="col-5">
                                                <img src="resources/noimage.png" width="100px" id="receiptimage" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="spinner-grow text-warning d-none" id="spinner1" role="status" style="position:absolute; top: 50%; bottom: 0%; right: 0%; left: 0%; margin: auto; width: 40px; height: 40px;">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <label class="form-label mt-4">Choose Membership :</label><br>
                                    <div class="col-12 col-lg-10 row mx-auto mb-2  mt-4">
                                        <div class="col-12 col-lg-5  p-lg-4 p-3 mx-auto" style="border-radius: 10px; border: 2px solid gold;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="membership" id="membership1" value="1">
                                                <label class="form-check-label">
                                                    <h4 style="font-size: 20px;">Life member : Rs.3000.00</h4>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-12 col-lg-5 p-lg-4 p-3 mx-auto mt-3 mt-lg-0" style="border-radius: 10px; border: 2px solid gold;">

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="membership" id="membership2" value="2">
                                                <label class="form-check-label">
                                                    <h4 style="font-size: 20px;">Regular member : Rs.5000.00</h4>
                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-12 mt-3 d-none" id="erorbox">
                                        <h5 style="font-size: 17px; font-family: sans-serif;" class="text-danger" id="eror"></h5>
                                    </div>
                                    <div class="col-12 col-lg-12 mx-auto d-grid mt-3">
                                        <button class="btn" style="background-color: gold;" onclick="updatenow('<?PHP echo $member_data['member_id']; ?>');">Get Now</button>
                                    </div>

                                </div>
                            </div>
                        <?PHP
                        }
                    } else {
                        ?>
                        <div class="col-12 col-lg-11 mx-auto m-5 bg-white pb-5 animated-division overflow-hidden" id="target3">

                            <div class="col-12 text-center p-2 mb-5">
                                <h1 style="font-family: sans-serif; font-size: 30px;">Get Your Membership Today</h1>
                            </div>
                            <div class="col-12 row p-1 mx-auto mb-5" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">


                                <div class="col-12 col-lg-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="flname">
                                </div>

                                <div class="col-12 col-lg-6">
                                    <label class="form-label">Surname</label>
                                    <input type="text" class="form-control" id="srname">
                                </div>

                                <div class="col-12 mt-4">
                                    <label class="form-label">Permanent Address</label>
                                    <input type="text" class="form-control" id="address">
                                </div>


                                <div class="col-12 col-lg-4 mt-4">
                                    <label class="form-label">Province</label>
                                    <select class="form-select" aria-label="Default select example" id="province">
                                        <option value="0" selected>Select Province</option>
                                        <?PHP

                                        $p_rs = Database::search("SELECT * FROM `province`");
                                        $p_num = $p_rs->num_rows;

                                        for ($x = 0; $x < $p_num; $x++) {

                                            $p_data = $p_rs->fetch_assoc();

                                        ?> <option value="<?PHP echo $p_data["id"]; ?>"><?PHP echo $p_data["province_name"]; ?></option><?PHP

                                                                                                                                    }


                                                                                                                                        ?>


                                    </select>
                                </div>

                                <div class="col-12 col-lg-4 d-grid mt-4">
                                    <label class="form-label">District</label>
                                    <select class="form-select" aria-label="Default select example" id="district">
                                        <option value="0" selected>Select District</option>
                                        <?PHP

                                        $d_rs = Database::search("SELECT * FROM `district`");
                                        $d_num = $d_rs->num_rows;

                                        for ($x = 0; $x < $d_num; $x++) {

                                            $d_data = $d_rs->fetch_assoc();

                                        ?> <option value="<?PHP echo $d_data["id"]; ?>"><?PHP echo $d_data["district_name"]; ?></option><?PHP

                                                                                                                                    }


                                                                                                                                        ?>


                                    </select>
                                </div>

                                <div class="col-12 col-lg-4 mt-4">
                                    <label class="form-label">Division</label>
                                    <input type="text" class="form-control" id="division">
                                </div>

                                <div class="col-12 col-lg-6 mt-4">
                                    <label class="form-label">NIC</label>
                                    <input type="text" class="form-control" id="nic">
                                </div>

                                <div class="col-12 col-lg-6 mt-4">
                                    <label class="form-label">Date Of Birth</label>
                                    <input type="text" class="form-control" id="bday" placeholder="YYYY-MM-DD">
                                </div>

                                <div class="col-12 col-lg-6 mt-4">
                                    <label class="form-label">Place Of Birth</label>
                                    <input type="text" class="form-control" id="bplace">
                                </div>

                                <div class="col-12 col-lg-6 mt-4">
                                    <label class="form-label">Profession/Occupation/Job</label>
                                    <input type="text" class="form-control" id="job">
                                </div>

                                <div class="col-12 col-lg-6 mt-4">
                                    <label class="form-label">Mobile/Phone Number</label>
                                    <input type="text" class="form-control" id="mobile">
                                </div>

                                <div class="col-12 col-lg-6 mt-4">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" value="<?PHP if (isset($_SESSION["u"])) {
                                                                                                                        echo $_SESSION["u"]["email"];
                                                                                                                    } ?>" <?PHP if (isset($_SESSION["u"])) {
                                                                                                                                echo "disabled";
                                                                                                                            } ?>>
                                </div>
                                <div class="col-12 col-lg-6">

                                    <div class="col-12  d-grid mt-4">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" aria-label="Default select example" id="gender">
                                            <?PHP

                                            $g_rs = Database::search("SELECT * FROM `gender`");
                                            $g_num = $g_rs->num_rows;

                                            for ($x = 0; $x < $g_num; $x++) {

                                                $g_data = $g_rs->fetch_assoc();

                                            ?> <option value="<?PHP echo $g_data["id"]; ?>"><?PHP echo $g_data["gender_name"]; ?></option><?PHP

                                                                                                                                        }


                                                                                                                                            ?>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <label class="form-label mt-4">Payment receipt :</label><br>
                                    <div class="row">
                                        <div class="col-7 col-lg-4">
                                            <input type="file" class="d-none" id="receipt" />
                                            <label for="receipt" class="btn" style="border: 1px solid black; color: gray;" onclick="viewreceipt();">Upload Image</label>
                                        </div>
                                        <div class="col-5">
                                            <img src="resources/noimage.png" width="100px" id="receiptimage" />
                                        </div>
                                    </div>

                                </div>
                                <div class="spinner-grow text-warning d-none" id="spinner2" role="status" style="position:absolute; top: 50%; bottom: 0%; right: 0%; left: 0%; margin: auto; width: 40px; height: 40px;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <label class="form-label mt-4">Choose Membership :</label><br>
                                <div class="col-12 col-lg-10 row mx-auto mb-2  mt-4">
                                    <div class="col-12  p-lg-4 p-3 mx-auto" style="border-radius: 10px; border: 2px solid gold;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="membership" id="membership1" value="1">
                                            <label class="form-check-label">
                                                <h4 style="font-size: 20px;">Life member : Rs.3000.00</h4>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-12 p-lg-4 p-3 mx-auto mt-3 mt-lg-2" style="border-radius: 10px; border: 2px solid gold;">

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="membership" id="membership2" value="2">
                                            <label class="form-check-label">
                                                <h4 style="font-size: 20px;">Regular member : Rs.5000.00</h4>
                                            </label>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-12 mt-3 d-none" id="erorbox">
                                    <h5 style="font-size: 17px; font-family: sans-serif;" class="text-danger" id="eror"></h5>
                                </div>
                                <div class="col-12 col-lg-12 mx-auto d-grid mt-3">
                                    <button class="btn" style="background-color: gold;" onclick="getnow();">Get Now</button>
                                </div>

                            </div>
                        </div>


                    <?PHP
                    }


                    ?>
                </div>

            </div>
        </div>
    </div>





    <div class="container-fluid mt-3 overflow-hidden" id="blog" style="background: linear-gradient(to right, #ffffff, #fff5cc);">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 d-lg-none d-block feature overflow-hidden">
                <img src="resources/bg2.png" alt="" class="img-fluid ">
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 text-center overflow-hidden">
                <div class="container pt-2 d-flex flex-column align-items-center justify-content-center h-100 feature1 mb-5">
                    <h2 class="mt-4 mb-4" style="font-family: sans-serif; font-size: 40px; color: #8b4513; ">What We Give</h2>
                    <p1 style="font-size: 18px;">
                        Explore our Buddhist Association website for seamless membership tailored to your preferences. Stay connected with our vibrant community through timely event updates, ensuring you never miss a moment of enlightenment. Customize your engagement level, immerse yourself in resources, and join us on a journey of personal growth and communal enrichment.
                    </p1>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 d-none d-lg-block feature">
                <img src="resources/bg2.png" alt="" class="img-fluid">
            </div>

        </div>
    </div>











    <?PHP

    $eve_rs = Database::search("SELECT * FROM `events`");
    $eve_num = $eve_rs->num_rows;


    if ($eve_num == 0) {
    } else {

    ?>

        <div class="col-12 col-lg-11 mx-auto m-5 bg-white animated-division overflow-hidden" style="font-family: sans-serif;" id="target4">

            <div class="col-12 text-center p-5">
                <h1 style="font-family: sans-serif; font-size: 30px;">Events</h1>
            </div>

            <div class="row justify-content-center pe-lg-5 ps-lg-5 pb-5">

                <?PHP




                for ($x = 0; $x < $eve_num; $x++) {

                    $eve_data = $eve_rs->fetch_assoc();

                ?>

                    <div class="col-10 col-lg-6 mb-4" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; border-radius: 10px;">
                        <div class="col-12 text-center p-3">
                            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?PHP

                                    $image_rs = Database::search("SELECT * FROM `event_images` WHERE `events_id` = '" . $eve_data["id"] . "'");
                                    $image_num = $image_rs->num_rows;
                                    $img = array();
                                    $image = array();


                                    for ($y = 0; $y < $image_num; $y++) {
                                        $img_data = $image_rs->fetch_assoc();
                                        $image[$y] = $img_data["img_path"];
                                    }


                                    ?>


                                    <div class="carousel-item active">
                                        <img src="<?PHP echo $image[0]; ?>" class="d-block w-100" style="height: 330px; border-radius: 10px;" alt="...">
                                    </div>
                                    <?PHP

                                    if (isset($image[1])) {
                                    ?>
                                        <div class="carousel-item">
                                            <img src="<?PHP echo $image[1]; ?>" class="d-block w-100" style="height: 330px; border-radius: 10px;" alt="...">
                                        </div>
                                    <?PHP
                                    } else if (isset($image[2])) {
                                    ?>
                                        <div class="carousel-item">
                                            <img src="<?PHP echo $image[2]; ?>" class="d-block w-100" style="height: 330px; border-radius: 10px;" alt="...">
                                        </div>

                                    <?PHP
                                    }

                                    ?>



                                </div>

                            </div>
                        </div>
                        <div class="col-12 text-center p-3 mx-auto">
                            <h5 style="font-size: 23px; color:red;"><?PHP echo $eve_data["header"]; ?> </h5>
                        </div>
                        <div class="col-12 text-center pe-3 ps-3 pb-3">

                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" style="font-size: 17px; border: none; background-color: white;" disabled><?PHP echo $eve_data["description"]; ?></textarea>
                        </div>
                    </div>

                <?PHP

                }



                ?>



            </div>

        </div>
        </div>
    <?PHP

    }

    ?>



    <div class="bg-section d-none d-lg-block" style="margin-top: 80px;">
        <h1 class="d-none " style="padding: 50px;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae soluta possimus rerum magnam et maiores dolore asperiores odit ratione, inventore nesciunt autem ut voluptatibus est numquam dolores veritatis nemo dignissimos.</h1>
    </div>


    <div class="bg-section2 d-lg-none d-block" style="margin-top: 80px;">
        <h1 class="d-none " style="padding: 50px;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae soluta possimus rerum magnam et maiores dolore asperiores odit ratione, inventore nesciunt autem ut voluptatibus est numquam dolores veritatis nemo dignissimos.</h1>
    </div>






    <div class="container-fluid header-design mt-3 overflow-hidden" id="target2">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12 p-5 feature3">
                <h1 class="header-title" style="font-size: 40px;">Congrats</h1>
            </div>
        </div>

        <div class="row justify-content-center gap-5 pb-5">
            <div class="col-10 col-lg-3 mb-4">
                <div class="team-member2 feature">
                    <div class="text-center p-3">
                        <img src="resources/123456.png" class="img-fluid rounded-circle" alt="Chief Patron" style="width: 200px; height:200px">
                    </div>
                    <div class="text-center p-3">
                        <h5>Mahanayake Thero of the Malvathu faction</h5>
                        <p>I appreciate your dedication for the perpetuation of Sri Sambuddha Sasana</p>
                    </div>
                </div>
            </div>
            <div class="col-10 col-lg-3 mb-4">
                <div class="team-member2 feature">
                    <div class="text-center p-3">
                        <img src="resources/1234567.png" class="img-fluid rounded-circle" alt="Chairman" style="width: 200px; height:200px">
                    </div>
                    <div class="text-center p-3">
                        <h5>Anunayake Thero of the Malvathu faction</h5>
                        <p>I bless Sri Dalada Samidu for your actions, may they increase manifold.</p>
                    </div>
                </div>
            </div>
            <div class="col-10 col-lg-3 mb-4">
                <div class="team-member2 feature">
                    <div class="text-center p-3">
                        <img src="resources/12345.png" class="img-fluid rounded-circle" alt="Director" style="width: 200px; height:200px">
                    </div>
                    <div class="text-center p-3">
                        <h5>Anunayake Thero of the Malvathu faction</h5>
                        <p>A program implemented for the perpetuation of Sambuddha Sasana to suit today's world</p>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="col-12 text-center mt-lg-5">
    <img src="resources/newcover.png" class="attractive-image" alt="Cover Image">
</div>














    <script>
        // Function to check if an element is in the viewport
        function isInViewport(element) {
            var rect = element.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        // Function to add animation class when element is in viewport
        function addAnimationOnScroll() {
            var target = document.getElementById('target');
            if (isInViewport(target)) {
                target.classList.add('animated-division');
                window.removeEventListener('scroll', addAnimationOnScroll); // Remove the event listener once animation has been triggered
            }
        }

        // Add event listener to trigger animation on scroll
        window.addEventListener('scroll', addAnimationOnScroll);
        // Check if element is in viewport on page load
        addAnimationOnScroll();


        var mm;

        function viewmemmodal() {
            var Modal1 = document.getElementById("memmodal");
            mm = new bootstrap.Modal(Modal1);
            mm.show();


        }
    </script>









    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <script src="script.js"></script>

    <script>
    ScrollReveal().reveal('.feature', {
        delay: 200,
        distance: '50px',
        origin: 'right',
        easing: 'ease-in-out',
        interval: 300
    });
</script>

<script>
    ScrollReveal().reveal('.feature1',   {
       delay:200,
       distance: '60px',
       origin: 'left',
       easing: 'ease-in-out',
       interval: 300
    });
    </script>

<script>
    ScrollReveal().reveal('.feature2', {
        delay: 200,
        distance: '50px',
        origin: 'top',
        easing: 'ease-in-out',
        interval: 200
    });
</script>

<script>
    ScrollReveal().reveal('.feature3', {
        delay: 200,
        distance: '50px',
        origin: 'bottom',
        easing: 'ease-in-out',
        interval: 200
    });
</script>



</body>
</div>
<?PHP include "footer.php"; ?>

</html>