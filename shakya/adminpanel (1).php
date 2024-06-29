<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-panel</title>
     <link rel="icon" href="resources/logo.ico"/>
</head>

<body style="background-color: #fff5cc;">

    <?PHP



    include "connection.php";
    include "adminheader.php";
    if (isset($_SESSION["au"])) {

    ?>
        <div class="container-fluid">
            <div class="col-12 col-lg-11 mx-auto mt-4 mb-5  bg-white animated-division" id="target">
                <div class="row">
                    <div class="col-12 col-lg-6 pe-lg-5 ps-lg-5 pt-lg-5 pb-lg-2 p-4 mx-auto">
                        <img src="resources/cover1.png" style="max-width: 100%; max-height: 100%; width: auto; height: auto; border-radius: 20px;">
                    </div>
                    <div class="col-12 col-lg-6 p-3 pe-lg-5 ps-lg-5 pt-lg-5 mt-lg-5">
                        <div class="col-11 col-lg-10 mb-4 mx-auto" style="background-color: gold; border-radius: 20px;">
                            <div class="col-12 text-center p-3 mx-auto">
                                <h5 style="font-size: 25px; font-family: sans-serif;">Life Members</h5>
                            </div>
                            <div class="col-12 text-center p-3 mx-auto">

                                <?PHP

                                $lme_rs = Database::search("SELECT * FROM `members` WHERE `status` = '2'");
                                $lme_num = $lme_rs->num_rows;

                                ?>
                                <h5 style="font-size: 22px; font-family: sans-serif;"><?PHP echo $lme_num; ?></h5>
                            </div>
                        </div>
                        <div class="col-11 col-lg-10 mb-4 mx-auto" style="background-color: gold; border-radius: 20px;">

                            <div class="col-12 text-center p-3 mx-auto">
                                <h5 style="font-size: 25px; font-family: sans-serif;">Regular members</h5>
                            </div>
                            <div class="col-12 text-center p-3 mx-auto">
                                <?PHP

                                $rme_rs = Database::search("SELECT * FROM `members` WHERE `status` = '3'");
                                $rme_num = $rme_rs->num_rows;

                                ?>
                                <h5 style="font-size: 22px; font-family: sans-serif;"><?PHP echo $rme_num; ?></h5>
                            </div>
                        </div>
                        <div class=" col-lg-11 mx-auto row">
                            <div class="col-12 col-lg-6 text-end d-grid">
                                <button class="btn btn-danger" onclick="autoremovemember();">Remove expired members</button>
                            </div>
                            <div class="col-12 col-lg-6 text-start d-grid mt-3 mt-lg-0">
                                <?PHP
                                
                                $req_rs = Database::search("SELECT * FROM `members` WHERE `status` = '1'");

                                $req_num = $req_rs->num_rows;
                                
                                ?>
                                <button class="btn btn-success" onclick="window.location = 'memberrequest.php';;">Member Requests (<?PHP echo $req_num;?>)</button>
                            </div>
                        </div>
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

</body>

</html>