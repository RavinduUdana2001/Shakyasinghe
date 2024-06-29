<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Request</title>
     <link rel="icon" href="resources/logo.ico"/>
</head>

<body style="background-color: #fff5cc;">
    <?PHP include "adminheader.php";

    if (isset($_SESSION["au"])) {
        include "connection.php";
    ?>

        <div class="container-fluid">
            <div style="height: 80vh; width: auto; overflow: auto; background-color: white;" class="m-lg-5">
                <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example p-3 rounded-2" tabindex="0">
                    <div class="col-12">
                        <h4 style="font-family: sans-serif; font-size: 20px;">Member Requests</h4>
                    </div>

                    <div class="row justify-content-center gap-5 pb-5 mt-5">
                        <?PHP


                        $req_rs = Database::search("SELECT * FROM `members` WHERE `status` = '1'");

                        $req_num = $req_rs->num_rows;


                        for ($x = 0; $x < $req_num; $x++) {

                            $req_data = $req_rs->fetch_assoc();

                        ?>
                            <div class="col-10 col-lg-3 mb-4" style="background-color: gold; border-radius: 20px;">
                                <div class="col-12 text-center p-3">

                                    <?PHP

                                    $prof_rs = Database::search("SELECT * FROM `profile_images` WHERE `user_email` = '" . $req_data["user_email"] . "'");
                                    $prof_data = $prof_rs->fetch_assoc();

                                    if (isset($prof_data["img_path"])) {

                                    ?> <img src="<?PHP echo $prof_data["img_path"]; ?>" width="90px" height="90px" style="border: 4px solid white; border-radius: 50%;" /><?PHP

                                                                                                                                                        } else {

                                                                                                                                                            ?> <img src="resources/user.png" width="90px" style="border: 4px solid white; border-radius: 50%;" /><?PHP

                                                                                                                                                                                                                                                                }


                                                                                                                                                                                                                                                                    ?>



                                </div>

                                <?PHP

                                $u_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $req_data["user_email"] . "'");
                                $u_data = $u_rs->fetch_assoc();

                                ?>

                                <div class="col-12 text-center p-3 mx-auto">
                                    <h5 style="font-family: sans-serif; font-size: 19px;"><?PHP echo  $u_data["fname"] . " " . $u_data["lname"]; ?></h5>
                                </div>
                                <div class="col-12 text-center pe-3 ps-3 mx-auto">

                                    <?PHP

                                    if ($req_data["type"] == 1) {

                                    ?><h5 style="font-family: sans-serif; font-size: 16px;">Life Member</h5><?PHP

                                                                                                        } else if ($req_data["type"] == 2) {

                                                                                                            ?><h5 style="font-family: sans-serif; font-size: 16px;">Regular Member</h5><?PHP

                                                                                                                                                                                    }

                                                                                                                                                                                        ?>

                                </div>
                                <div class="col-11 mx-auto p-3 d-grid">
                                    <button class="btn btn-danger" onclick="viewmodal('<?PHP echo $u_data['email']; ?>');">View Request</button>
                                </div>
                            </div>
                            <div class="modal" tabindex="-1" id="modal<?PHP echo $u_data["email"]; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <h5 class="modal-title">Member request</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <?PHP

                                        $gd_rs = Database::search("SELECT * FROM `gender` WHERE `id` = '" . $req_data["gender_id"] . "'");
                                        $gd_data = $gd_rs->fetch_assoc();

                                        $di_rs = Database::search("SELECT * FROM `district` WHERE `id` = '" . $req_data["district_id"] . "'");
                                        $di_data = $di_rs->fetch_assoc();

                                        $pr_rs = Database::search("SELECT * FROM `province` WHERE `id` = '" . $di_data["province_id"] . "'");
                                        $pr_data = $pr_rs->fetch_assoc();
                                        ?>

                                        <div class="modal-body" style="font-family: sans-serif; ">
                                            <ul>
                                                <li>
                                                    <h5>Member ID : <?PHP echo $req_data["member_id"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Full Name : <?PHP echo $req_data["full_name"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Surname : <?PHP echo $req_data["surname"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Address : <?PHP echo $req_data["address"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>NIC : <?PHP echo $req_data["nic"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Birthday : <?PHP echo $req_data["birthday"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Birth place : <?PHP echo $req_data["birth_place"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Emil : <?PHP echo $req_data["user_email"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Job : <?PHP echo $req_data["job"]; ?></h5>
                                                </li>
                                                <li>
                                                    <h5>Mobile : <?PHP echo $req_data["mobile"]; ?></h5>
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
                                                    <h5>Division : <?PHP echo $req_data["division"]; ?></h5>
                                                </li>
                                                <?PHP
                                                if ($req_data["type"] == 1) {

                                                ?>
                                                    <li>
                                                        <h5>Membership : Life member</h5>
                                                    </li><?PHP

                                                        } else if ($req_data["type"] == 2) {

                                                            ?>
                                                    <li>
                                                        <h5>Membership : Regular member</h5>
                                                    </li><?PHP

                                                        }

                                                            ?>

                                                <li>
                                                    <h5>Joine Date : <?PHP echo $req_data["join_date"]; ?></h5>
                                                </li>
                                            </ul>

                                            <div class="col-12">
                                                <?PHP

                                                $re_rs = Database::search("SELECT * FROM `members_has_receipt` WHERE `members_user_email` = '" . $req_data["user_email"] . "'");
                                                $re_data = $re_rs->fetch_assoc();

                                                $receipt_rs = Database::search("SELECT * FROM `receipt` WHERE `receipt_id` = '" . $re_data["receipt_receipt_id"] . "'");
                                                $receipt_data = $receipt_rs->fetch_assoc();
                                                ?>
                                                <img src="<?PHP echo $receipt_data["img_path"]; ?>" style="max-width: 100%; max-height: 100%; width: 100vw; height: auto;" id="image" class="mt-4" />
                                            </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" onclick="accept('<?PHP echo $req_data['user_email']; ?>');">Accept</button>
                                            <button type="button" class="btn btn-danger" onclick="reject('<?PHP echo $req_data['user_email']; ?>');">Reject</button>
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
        </div>
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

    <script src="script.js"></script>
</body>

</html>