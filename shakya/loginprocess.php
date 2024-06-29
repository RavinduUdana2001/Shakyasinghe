<?PHP
session_start();
include "connection.php";

$email = $_POST["e"];
$pw = $_POST["p"];
$remember = $_POST["r"];



if (empty($email)) {
    echo ("Please enter your Email address");
} else if (empty($pw)) {

    echo ("Please enter your Password");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `password`='" . $pw . "'");
    $n = $rs->num_rows;

    if ($n == 1) {
        
        echo ("success");
        $d = $rs->fetch_assoc();
        $_SESSION["u"] = $d;


        if ($remember == "true") {


            setcookie("email", $email, time() + (60 * 60 * 24 * 365));
            setcookie("password", $pw, time() + (60 * 60 * 24 * 365));
        } else {

            setcookie("email", "", -1);
            setcookie("password", "", -1);
        }
    } else {
        echo ("Invalid Email or Password");
    }
}
