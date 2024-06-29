<?PHP
include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];

// Plain password
$password = $_POST["p"];







if (empty($fname)) {
    echo ("Please enter your first name");
} else if (empty($lname)) {
    echo ("Please enter your last name");
} else if (empty($email)) {
    echo ("Please enter your email address");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid email address");
} else if (empty($password)) {
    echo ("Please enter your password");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password Must Contain 5 to 20 Characters.");
} else {

    $u_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");
    $u_num = $u_rs->num_rows;


    if ($u_num > 0) {

        echo ("This email already use try another email!");
    } else {

        Database::iud("INSERT INTO `user` (`fname`,`lname`,`email`,`password`) VALUES ('" . $fname . "','" . $lname . "','" . $email . "','" . $password . "')");

        echo ("success");
    }
}
