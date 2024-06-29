<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
     <link rel="icon" href="resources/logo.ico"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <?PHP


    session_start();

    ?>

    <nav class="navbar navbar-expand-lg p-3" style="background-color: #ff3333;">
        <div class="container-fluid">
            <img src="resources/logo.png" width="60px" onclick="window.location = 'adminpanel.php';" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mt-4 mt-lg-0" style="font-size: 17px; font-family: sans-serif;">
                <li class="nav-item mx-lg-4">
                        <a class="nav-link text-white" href="adminpanel.php">Admin panel</a>
                    </li>    
                <li class="nav-item mx-lg-4">
                        <a class="nav-link text-white" href="memberrequest.php">Member requests</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="nav-link text-white" href="managemember.php">Manage members</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="nav-link text-white" href="addevents.php">Add events</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="nav-link text-white" href="deleteevent.php">Delete events</a>
                    </li>

                </ul>
                <?PHP

                if (isset($_SESSION["au"])) {

                ?><button class="btn d-none d-lg-block" style="background-color: gold;" onclick="adminsignout();">Hi <?PHP echo $_SESSION["au"]["fname"];?></button><?PHP

                                                                                                            } else {
                                                                                                                ?><button class="btn d-none d-lg-block" style="background-color: red;">Warning</button><?PHP
                                                                                                            }


                                                                                                                ?>

            </div>
        </div>

    </nav>

    <div class="col-12 text-end d-block d-lg-none mt-2 p-2">

    <?PHP
    
    if(isset($_SESSION["au"])){

        ?> <button class="btn" style="background-color: gold;" onclick="adminsignout();">Hi <?PHP echo $_SESSION["au"]["fname"];?></button><?PHP

    }else{

        ?> <button class="btn" style="background-color: red;">Warning</button><?PHP
    }
    
    
    
    ?>

       
    </div>


    <script src="bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>