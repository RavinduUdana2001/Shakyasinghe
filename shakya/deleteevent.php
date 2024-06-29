<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete events</title>
     <link rel="icon" href="resources/logo.ico"/>
</head>

<body style="background-color: #fff5cc;">
    <?PHP include "adminheader.php";
    include "connection.php";

    if (isset($_SESSION["au"])) {

    ?>

        <div style="height: 80vh; width: auto; overflow: auto; background-color: white;" class="m-lg-5">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example p-3 rounded-2" tabindex="0">

                <div class="col-12 text-center p-5">
                    <h1 style="font-family: sans-serif; font-size: 30px;">Delete events</h1>
                </div>

                <div class="row justify-content-center gap-5 pb-5 mt-5">
                    <?PHP

                    $ev_rs = Database::search("SELECT * FROM `events`");
                    $ev_num = $ev_rs->num_rows;

                    for ($x = 0; $x < $ev_num; $x++) {

                        $ev_data = $ev_rs->fetch_assoc();

                    ?>

                        <div class="col-10 col-lg-3 mb-4" style="background-color: gold; border-radius: 20px;">
                            <div class="col-12 text-center p-3">
                                <?PHP

                                $img_rs = Database::search("SELECT * FROM `event_images` WHERE `events_id` = '" . $ev_data["id"] . "'");
                                $img_data = $img_rs->fetch_assoc();

                                if (isset($img_data["img_path"])) {

                                ?> <img src="<?PHP echo $img_data["img_path"]; ?>" style="max-width: 100%; max-height: 100%; width: 300px; height: 200px;" /><?PHP

                                                                                                                                                        } else {

                                                                                                                                                            ?> <img src="resources/user.png" width="90px" style="border: 4px solid white; border-radius: 50%;" /><?PHP
                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                ?>
                            </div>
                            <div class="col-12 text-center p-3 mx-auto">
                                <?PHP



                                ?>
                                <h5 style="font-family: sans-serif; font-size: 19px;"><?PHP echo  $ev_data["header"]; ?></h5>
                            </div>

                            <div class="col-11 mx-auto p-3 d-grid">
                                <button class="btn btn-danger" onclick="deleteevent('<?PHP echo $ev_data['id']; ?>');">Delete Event</button>
                            </div>
                        </div>





                    <?PHP

                    }




                    ?>





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