<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Member</title>
     <link rel="icon" href="resources/logo.ico"/>
</head>

<body style="background-color: #fff5cc;">
    <?PHP include "adminheader.php";
    if (isset($_SESSION["au"])) {
        include "connection.php";

    ?>
        <div class="container-fluid">

            <div class="row col-11 col-lg-10 p-4 mx-auto">

                <div class="col-10">
                    <input type="text" class="form-control" id="searcht" placeholder="Search member id">
                </div>
                <div class="col-2">
                    <button class="btn btn-primary" onclick="search();">Search</button>
                </div>
            </div>

            <div style="height: 80vh; width: auto; overflow: auto; background-color: white;" class="ms-lg-5 me-lg-5 mb-lg-5 mt-lg-3">
                <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example p-3 rounded-2" tabindex="0" id="basicSearchResult">
                    <div class="col-12">
                        <h4 style="font-family: sans-serif; font-size: 20px;">Manage Members</h4>
                    </div>

                    <div class="row justify-content-center gap-5 pb-5 mt-5">
                        <?PHP

                        $r_rs = Database::search("SELECT * FROM `members` WHERE `status` = '2' OR `status` = '3'");
                        $r_num = $r_rs->num_rows;

                        for ($x = 0; $x < $r_num; $x++) {

                            $r_data = $r_rs->fetch_assoc();

                        ?>

                            <div class="col-10 col-lg-3 mb-4" style="background-color: gold; border-radius: 20px;">
                                <div class="col-12 text-center p-3">
                                    <?PHP

                                    $prof_rs = Database::search("SELECT * FROM `profile_images` WHERE `user_email` = '" . $r_data["user_email"] . "'");
                                    $prof_data = $prof_rs->fetch_assoc();

                                    if (isset($prof_data["img_path"])) {

                                    ?> <img src="<?PHP echo $prof_data["img_path"]; ?>" width="90px" height="90px" style="border: 4px solid white; border-radius: 50%;" /><?PHP

                                                                                                                                                        } else {

                                                                                                                                                            ?> <img src="resources/user.png" width="90px" style="border: 4px solid white; border-radius: 50%;" /><?PHP
                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                    ?>
                                </div>
                                <div class="col-12 text-center p-3 mx-auto">
                                    <?PHP


                                    $u_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $r_data["user_email"] . "'");
                                    $u_data = $u_rs->fetch_assoc();

                                    ?>
                                    <h5 style="font-family: sans-serif; font-size: 19px;"><?PHP echo  $u_data["fname"] . " " . $u_data["lname"]; ?></h5>
                                </div>
                                <div class="col-12 text-center pe-3 ps-3 mx-auto">
                                    <h5 style="font-family: sans-serif; font-size: 16px; color: blue;">Member id : <?PHP echo $r_data["member_id"]; ?></h5>
                                </div>
                                <div class="col-12 text-center pe-3 ps-3 mx-auto">
                                    <?PHP if ($r_data["type"] == 1) {

                                    ?><h5 style="font-family: sans-serif; font-size: 16px;">Life Member</h5><?PHP

                                                                                                        } else if ($r_data["type"] == 2) {

                                                                                                            ?><h5 style="font-family: sans-serif; font-size: 16px;">Regular Member</h5><?PHP

                                                                                                                                                                                    }

                                                                                                                                                                                        ?>
                                </div>
                                <div class="col-11 mx-auto p-3 d-grid">
                                    <button class="btn btn-success" onclick="viewdetais('<?PHP echo $r_data['user_email']; ?>');">View Details</button>
                                </div>
                            </div>


                            <div class="modal" tabindex="-1" id="modal<?PHP echo $u_data["email"]; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h5 class="modal-title">Member Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <?PHP

                                        $gd_rs = Database::search("SELECT * FROM `gender` WHERE `id` = '" . $r_data["gender_id"] . "'");
                                        $gd_data = $gd_rs->fetch_assoc();

                                        $di_rs = Database::search("SELECT * FROM `district` WHERE `id` = '" . $r_data["district_id"] . "'");
                                        $di_data = $di_rs->fetch_assoc();

                                        $pr_rs = Database::search("SELECT * FROM `province` WHERE `id` = '" . $di_data["province_id"] . "'");
                                        $pr_data = $pr_rs->fetch_assoc();
                                        ?>

                                        <div class="col-12 text-center mt-2 mb-4">

                                            <?PHP


                                            if (isset($prof_data["img_path"])) {
                                            ?> <img src="<?PHP echo $prof_data["img_path"]; ?>" width="130px" height="130px" style="border-radius: 50%;" /><?PHP
                                                                                                                                                        } else {
                                                                                                                                                            ?> <img src="resources/user.png" width="130px" /><?PHP
                                                                                                                                                                                                            }

                                                                                                                                                                                                                ?>

                                        </div>

                                        <div class="modal-body" style="font-family: sans-serif; ">
                                            <ul>
                                                <li>
                                                    <h5>Member ID : <?PHP echo $r_data["member_id"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Full Name : <?PHP echo $r_data["full_name"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Surname : <?PHP echo $r_data["surname"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Address : <?PHP echo $r_data["address"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>NIC : <?PHP echo $r_data["nic"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Birthday : <?PHP echo $r_data["birthday"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Birth place : <?PHP echo $r_data["birth_place"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Email : <?PHP echo $r_data["user_email"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Job : <?PHP echo $r_data["job"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Mobile : <?PHP echo $r_data["mobile"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Gender : <?PHP echo $gd_data["gender_name"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Province : <?PHP echo $pr_data["province_name"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>District : <?PHP echo $di_data["district_name"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Division : <?PHP echo $r_data["division"]; ?></h5>
                                                </li>
                                                <?PHP
                                                if ($r_data["type"] == 1) {

                                                ?> <li>
                                                        <h5>Membership : Life member</h5>
                                                    </li><?PHP

                                                        } else if ($r_data["type"] == 2) {

                                                            ?> <li>
                                                        <h5>Membership : Regular member</h5>
                                                    </li><?PHP

                                                        }

                                                            ?>

                                                <li>
                                                    <h5>Joine Date : <?PHP echo $r_data["join_date"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Expier Date : <?PHP echo $r_data["expier_date"]; ?></h5>
                                                </li>


                                            </ul>


                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-danger" onclick="remove('<?PHP echo $r_data['user_email']; ?>');">Remove Member</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?PHP

                        }




                        ?>





                    </div>
                </div>
            </div>
            <script src="script.js"></script>
            <?PHP include "footer.php"; ?>

        <?PHP

    } else {
        ?>

            <script>
                window.location = "adminlogin.php";
            </script>

        <?PHP
    }


        ?>

</body>

</html>