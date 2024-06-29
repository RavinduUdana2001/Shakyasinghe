<?php
session_start();

include "connection.php";

$email = $_SESSION["u"]["email"];

if (sizeof($_FILES) == 1) {
    $image = $_FILES["i"];
    $image_extension = $image["type"];
    $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

    if (in_array($image_extension, $allowed_image_extensions)) {
        $new_img_extension = '';

        if ($image_extension == "image/jpeg") {
            $new_img_extension = ".jpeg";
        } else if ($image_extension == "image/png") {
            $new_img_extension = ".png";
        } else if ($image_extension == "image/svg+xml") {
            $new_img_extension = ".svg";
        }

        $file_name = "resources/profile_images/" . $email . "_" . uniqid() . $new_img_extension;
        move_uploaded_file($image["tmp_name"], $file_name);

        $profile_img_rs = Database::search("SELECT * FROM `profile_images` WHERE `user_email`='" . $email . "'");

        if ($profile_img_rs->num_rows == 1) {
            Database::iud("UPDATE `profile_images` SET `img_path`='" . $file_name . "' WHERE `user_email`='" . $email . "'");
            echo "Success";
        } else {
            Database::iud("INSERT INTO `profile_images`(`img_path`,`user_email`) VALUES ('" . $file_name . "','" . $email . "')");
            echo "Success";
        }
    } else {
        echo "Invalid file type.";
    }
} else if (sizeof($_FILES) == 0) {
    echo "You have not selected any image.";
} else {
    echo "You must select only 01 profile image.";
}
?>
