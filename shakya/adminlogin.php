<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login</title>

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


            <div class="col-12 col-lg-6 pb-2" style="height: 510px; ">
                <div class="col-12 text-center mt-3">
                    <img src="resources/logo.png" width="50px" onclick="window.location = 'index.php';" />
                </div>
                <div class="" id="signinbox">
                    <div class="col-12 p-4 mt-2">
                        <h3 style="font-size: 23px; font-family: sans-serif;">Admin login</h3>
                    </div>

                    <div class="col-12 ps-4 pe-4 pb-4 pt-4">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="" style="background-color: transparent; color: white;">
                    </div>

                    <div class="col-12 ps-4 pe-4 pb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="" style="background-color: transparent; color: white;">
                    </div>

                    
                    <div class="col-12 ps-4 pe-4 d-none" id="warningbox1">
                        <p style="color:gold;" id="warningtext1">Invalid email</p>
                    </div>
                    <div class="col-12 d-grid ps-4 pe-4 pb-2 mt-3">
                        <button class="btn btn-warning" onclick="adminlogin();">Login</button>
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
                    adminlogin();
                    
                }
            });
        }

        // Call the function when the page is fully loaded
        document.addEventListener("DOMContentLoaded", callSignupOnEnter);


    </script>

    <script src="script.js"></script>
</body>

</html>