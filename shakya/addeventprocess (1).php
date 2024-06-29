<?PHP

session_start();
include "connection.php";


$header = $_POST["h"];
$para = $_POST["p"];

if (empty($header)) {

    echo ("Enter header");
} else if (empty($para)) {
    echo ("Enter description");
} else {

    $length = sizeof($_FILES);

    if ($length <= 3 && $length > 0) {

        Database::iud("INSERT INTO `events` (`header`,`description`) VALUES ('" . $header . "','" . $para . "')");
        $event_id = Database::$connection->insert_id;

        $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

        for ($x = 0; $x < $length; $x++) {
            if (isset($_FILES["image" . $x])) {

                $image_file = $_FILES["image" . $x];
                $file_extension = $image_file["type"];

                if (in_array($file_extension, $allowed_image_extensions)) {

                    $new_img_extension;

                    if ($file_extension == "image/jpeg") {
                        $new_img_extension = ".jpeg";
                    } else if ($file_extension == "image/png") {
                        $new_img_extension = ".png";
                    } else if ($file_extension == "image/svg+xml") {
                        $new_img_extension = ".svg";
                    }

                    $file_name = "resources//events//" . "_" . $x . "_" . uniqid() . $new_img_extension;
                    move_uploaded_file($image_file["tmp_name"], $file_name);


                    Database::iud("INSERT INTO `event_images`(`img_path`,`events_id`) VALUES 
                        ('" . $file_name . "','" . $event_id . "')");
                } else {
                    echo ("Inavid image type.");
                }
            }
        }

        echo ("success");
    } else {
        echo ("Invalid Image Count.");
    }
}
