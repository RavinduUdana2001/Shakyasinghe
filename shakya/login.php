<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
     <link rel="icon" href="resources/logo.ico"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .form-control::-webkit-input-placeholder {
            color: black;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animated-division {
            animation: fadeIn 1s ease-in-out;
        }

        
    </style>
</head>

<body style="background-color:#ffe066;">

    <div style="position:absolute; top: 0%; bottom: 0%; right: 0%; left: 0%; margin: auto;" class="animated-division">
        <div class="col-12 d-block d-lg-none">
            <img id="dynamicImage" src="resources/cover.png" class="image1" style="max-width: 100%; max-height: 100%; width: 100vw; height: 300px;">
        </div>

        <div class="col-12 col-lg-10 row mt-lg-5 mb-5 mx-auto" style="height: 560px; background-color: #ff3333;">

            <div class="col-12 col-lg-6 d-none d-lg-block image" style="height: 560px; background-image: url('resources/cover.png'); background-size: cover;">

            </div>

            <?php
            $email = "";
            $password = "";

            if (isset($_COOKIE["email"])) {
                $email = $_COOKIE["email"];
            }

            if (isset($_COOKIE["password"])) {
                $password = $_COOKIE["password"];
            }
            ?>



            <div class="col-12 col-lg-6 pb-2" style="height: 510px; ">
                <div class="col-12 text-center mt-3">
                    <img src="resources/logo.png" width="50px" onclick="window.location = 'index.php';" />
                </div>
                <div class="" id="signinbox">
                    <div class="col-12 p-4 mt-2">
                        <h3 style="font-size: 23px; font-family: sans-serif;">Login</h3>
                    </div>

                    <div class="col-12 ps-4 pe-4 pb-4">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?PHP echo $email; ?>" id="email1" placeholder="" style="background-color: transparent; color: white;">
                    </div>

                    <div class="col-12 ps-4 pe-4 pb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password1" placeholder="" style="background-color: transparent; color: white;">
                    </div>

                    <div class="row ps-4 pe-4 pb-2">
                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="rememberme">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <div class="col-6 text-end">
                            <p style="cursor: pointer;" onclick="viewforgotmodal();">Forgot password?</p>
                        </div>

                    </div>
                    <div class="col-12 ps-4 pe-4 d-none" id="warningbox1">
                        <p style="color:gold;" id="warningtext1"></p>
                    </div>
                    <div class="col-12 d-grid ps-4 pe-4 pb-2 mt-3">
                        <button class="btn btn-warning" onclick="login();">Login</button>
                    </div>
                    <div class="col-12 d-grid ps-4 pe-4 pb-4 text-center">
                        <a style=" cursor: pointer; color: white;" onclick="registerview();">Don't have an account? Register Now</a>
                    </div>
                </div>

                <div class="modal" tabindex="-1" id="forgotmodal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h5 class="modal-title">Change Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="input-group mb-3">

                                            <input type="password" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="New password" id="np">
                                            <span class="input-group-text" onclick="showPassword1();"><i class="bi bi-eye-slash-fill" id="icon"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                                        <div class="input-group mb-3">

                                            <input type="password" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Retype new password" id="rnp">
                                            <span class="input-group-text" onclick="showPassword2();"><i class="bi bi-eye-slash-fill" id="icon1"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 mt-lg-0">
                                    <div class="input-group mb-3">

                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Verification Code" id="vcode">

                                    </div>
                                </div>

                                <div class="col-12">
                                    <p class="text-success">Please check verification code we sent to your email</p>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-primary" onclick="resetPassword();">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="d-none" id="signupbox">
                    <div class="col-12 ps-4 pt-2 pb-2 mt-2">
                        <h3 style="font-size: 23px; font-family: sans-serif;">Register</h3>
                    </div>
                    <div class="row ps-4 pe-4 mt-lg-3">
                        <div class="col-12 col-lg-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" placeholder="" style="background-color: transparent; color: white;">
                        </div>


                        <div class="col-12 col-lg-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" placeholder="" style="background-color: transparent; color: white;">
                        </div>
                    </div>

                    <div class="col-12 ps-4 pe-4 pb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="" style="background-color: transparent; color: white;">
                    </div>

                    <div class="col-12 ps-4 pe-4 pb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="" style="background-color: transparent; color: white;">
                    </div>

                    <div class="col-12 ps-4 pe-4 d-none" id="warningbox">
                        <p style="color: gold;" id="warningtext">Invalid email</p>
                    </div>
                    <div class="col-12 d-grid ps-4 pe-4 pb-2 mt-3">
                        <button class="btn btn-warning" onclick="register();">Register</button>
                    </div>
                    <div class="col-12 d-grid ps-4 pe-4 pb-4 text-center">
                        <p style=" cursor: pointer; color: white;" onclick="loginview();">Already have an account? Login Now</p>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <div class="spinner-grow text-warning d-none" id="spinner" role="status" style="position:absolute; top: 0%; bottom: 0%; right: 0%; left: 0%; margin: auto; width: 80px; height: 80px;">
        <span class="visually-hidden">Loading...</span>
    </div>


    <script>
        // JavaScript code to change background image automatically
        var images = ['resources//cover1.png', 'resources//cover3.png', 'resources//cover.png']; // Array of image URLs
        var currentIndex = 0; // Index to track the current image

        function changeBackgroundImage() {
            document.querySelector('.image').style.backgroundImage = "url('" + images[currentIndex] + "')";
            currentIndex = (currentIndex + 1) % images.length; // Move to the next image or loop back to the first
        }

        // Call changeBackgroundImage function every 5 seconds (5000 milliseconds)
        setInterval(changeBackgroundImage, 5000);


        // Define an array of image URLs that you want to cycle through
        var imageUrls = [
            "resources/cover1.png",
            "resources/cover3.png",
            "resources/cover.png"
        ];

        // Function to change the image automatically
        function changeImage() {
            var currentIndex = 0; // Initialize index
            var imageElement = document.getElementById("dynamicImage");

            // Function to update the image source
            function updateImage() {
                imageElement.src = imageUrls[currentIndex];
                currentIndex = (currentIndex + 1) % imageUrls.length; // Move to the next image URL
            }

            // Call the updateImage function at intervals (e.g., every 5 seconds)
            setInterval(updateImage, 5000); // Change image every 5 seconds
        }

        // Call the function to start changing the image automatically
        changeImage();


        function callSignupOnEnter() {
            document.addEventListener("keyup", function(event) {
                // Check if the pressed key is the 'Enter' key (key code 13)
                if (event.keyCode === 13) {
                    register();
                    login(); // Call the signup function
                }
            });
        }

        // Call the function when the page is fully loaded
        document.addEventListener("DOMContentLoaded", callSignupOnEnter);
    </script>

    <script src="script.js"></script>
</body>

</html>