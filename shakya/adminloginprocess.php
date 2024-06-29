<?PHP

session_start();
include "connection.php";

$email = $_POST["e"];
$pw = $_POST["p"];




if (empty($email)) {
    echo ("Please enter your Email address");
} else if (empty($pw)) {

    echo ("Please enter your Password");
} else {

    $rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "' AND `password`='" . $pw . "'");
    $n = $rs->num_rows;

    if ($n == 1) {
        
        echo ("success");
        $d = $rs->fetch_assoc();
        $_SESSION["au"] = $d;


    } else {
        echo ("Invalid Email or Password");
    }
}





?>