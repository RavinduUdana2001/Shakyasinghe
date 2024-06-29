<?php
session_start();
if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];
    include "connection.php";

    if (isset($_POST["fl"], $_POST["sr"], $_POST["add"], $_POST["pro"], $_POST["dis"], $_POST["div"], $_POST["nic"], $_POST["dob"], $_POST["bp"], $_POST["j"], $_POST["m"], $_POST["g"], $_POST["ty"])) {

        $flname = $_POST["fl"];
        $srname = $_POST["sr"];
        $address = $_POST["add"];
        $province = $_POST["pro"];
        $district = $_POST["dis"];
        $division = $_POST["div"];
        $nic = $_POST["nic"];
        $dob = $_POST["dob"];
        $bp = $_POST["bp"];
        $job = $_POST["j"];
        $mobile = $_POST["m"];
        $gender = $_POST["g"];
        $type = $_POST["ty"];

       // Function to convert date to standard format if needed
        function convertToStandardDateFormat($dateString)
        {
            // Attempt to create a DateTime object from the input date string
            $date = DateTime::createFromFormat('Y-m-d', $dateString);

            // Check if the input date string matches the standard format
            if (!$date) {
                // If not in standard format, attempt to parse using other common formats
                $formats = array('m/d/Y', 'Y-m-d', 'd.m.Y' , 'Y.m.d' , 'd-m-Y' , 'd/m/Y' , 'Y/m/d');
                foreach ($formats as $format) {
                    $date = DateTime::createFromFormat($format, $dateString);
                    if ($date) {
                        return $date->format('Y-m-d');
                    }
                }
                // If unable to parse, return an error message or handle it as needed
                return "Invalid date format";
            }

            // If the date is already in standard format, return it as is
            return $dateString;
        }

        // Check if the date is provided via POST and process it
        if (isset($_POST["dob"])) {
            // Get the date of birth from POST
            $dob = $_POST["dob"];

            // Convert the date to standard format
            $standardDob = convertToStandardDateFormat($dob);

            // Use $standardDob for further processing
          
        }


        if (empty($flname)) {
            echo ("Please enter Full name");
        } else if (empty($srname)) {
            echo ("Please enter Surname");
        } else if (empty($address)) {
            echo ("Please enter address");
        } else if (empty($province)) {
            echo ("Please select Province");
        } else if (empty($district)) {
            echo ("Please select District");
        } else if (empty($division)) {
            echo ("Please enter Division");
        } else if (empty($nic)) {
            echo ("Please enter NIC");
        } else if (empty($dob)) {
            echo ("Please enter Date of birth");
        } else if (empty($bp)) {
            echo ("Please enter Birth Place");
        } else if (empty($job)) {
            echo ("Please enter Job/Profession");
        } else if (empty($mobile)) {
            echo ("Please enter Mobile Number");
        } else if (strlen($mobile) != 10) {
            echo ("Mobile Number Must Contain 10 characters.");
        } else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
            echo ("Invalid Mobile Number.");
        } else if (empty($gender)) {
            echo ("Please select Gender");
        } else if ($type == "0") {
            echo ("Please select Membershp type");
        } else {




            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d");
            // Modify the initial date by adding one year
            $d->modify('+1 year');
            $expier_date = $d->format("Y-m-d"); // Get the modified date



            $m_id = uniqid();


            // Insert member data into the database
            $insertResult = Database::iud("INSERT INTO `members` (`full_name`,`surname`,`address`,`division`,`nic`,`birthday`,`birth_place`,`job`,`mobile`,`type`,`user_email`,`district_id`,`gender_id`,`member_id`,`join_date`,`expier_date`,`status`) VALUES 
 ('" . $flname . "','" . $srname . "','" . $address . "','" . $division . "','" . $nic . "','" . $standardDob . "','" . $bp . "','" . $job . "','" . $mobile . "','" . $type . "','" . $_SESSION["u"]["email"] . "','" . $district . "','" . $gender . "','" . $m_id . "','" . $date . "','" . $expier_date . "','1')");







            if (isset($_FILES["i"])) {
                $image = $_FILES["i"];
                $image_extension = $image["type"];
                $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

                if (in_array($image_extension, $allowed_image_extensions)) {
                    $new_img_extension = '';
                    // Handle file extension
                    if ($image_extension == "image/jpeg") {
                        $new_img_extension = ".jpeg";
                    } else if ($image_extension == "image/png") {
                        $new_img_extension = ".png";
                    } else if ($image_extension == "image/svg+xml") {
                        $new_img_extension = ".svg";
                    }

                    $file_name = "resources/receipt/" . $email .  "_" . uniqid() . $new_img_extension;
                    // Move uploaded file
                    if (move_uploaded_file($image["tmp_name"], $file_name)) {
                        // Insert receipt data into the database





                        $receipt_id = uniqid();
                        Database::iud("INSERT INTO `receipt` (`img_path`,`receipt_id`) VALUES ('" . $file_name . "','" . $receipt_id . "')");

                        Database::iud("INSERT INTO `members_has_receipt`(`members_user_email`,`receipt_receipt_id`) VALUES ('" . $_SESSION["u"]["email"] . "','" . $receipt_id . "')");
                        echo "success";
                    } else {
                        echo "Failed to move uploaded file.";
                    }
                } else {
                    echo "Invalid file type.";
                }
            } else {
                echo "Please upload receipt image.";
            }
        }
    }
} else {

    echo ("please Login First");
}
