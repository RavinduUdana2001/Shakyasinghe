<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add events</title>
     <link rel="icon" href="resources/logo.ico"/>
</head>

<body style="background-color: #fff5cc;">
    <?PHP include "adminheader.php";
    if (isset($_SESSION["au"])) {

    ?>

        <div class="col-12 col-lg-11 mx-auto m-5 bg-white animated-division" style="font-family: sans-serif;" id="target2">

            <div class="col-12 text-center p-5">
                <h1 style="font-family: sans-serif; font-size: 30px;">Add events</h1>
            </div>


            <div class="col-12 p-2">
                <div class="col-12 col-lg-6 mx-auto">
                    <div class="mb-3">
                        <label class="form-label">Event Header</label>
                        <input type="text" class="form-control" id="header">
                    </div>
                </div>
                <div class="col-12 col-lg-6 mx-auto">
                    <div class="mb-3">
                        <label class="form-label">Event Paregraph</label>
                        <textarea class="form-control" id="paregraph" rows="6"></textarea>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="offset-lg-3 col-11 mx-auto col-lg-6">
                        <div class="row">
                            <div class="col-4 ">
                                <img src="resources/noimage.png" class="img-fluid" style="width: 250px;" id="i0" />
                            </div>
                            <div class="col-4 ">
                                <img src="resources/noimage.png" class="img-fluid" style="width: 250px;" id="i1" />
                            </div>
                            <div class="col-4 ">
                                <img src="resources/noimage.png" class="img-fluid" style="width: 250px;" id="i2" />
                            </div>
                        </div>
                    </div>
                    <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                        <input type="file" class="d-none" multiple id="imageuploader" required />
                        <label for="imageuploader" class="col-12 btn btn-primary" onclick="changeeventImage();">Upload Images</label>
                    </div>
                </div>
                <hr>
                <div class="col-12 col-lg-6 d-grid mx-auto">
                    <button class="btn btn-warning" onclick="addnow();">Add Now</button>
                </div>
            </div>


        </div>
        
        <div class="spinner-grow text-warning d-none" id="spinner" role="status" style="position:absolute; top: 100%; bottom: 0%; right: 0%; left: 0%; margin: auto; width: 80px; height: 80px;">
            <span class="visually-hidden">Loading...</span>
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