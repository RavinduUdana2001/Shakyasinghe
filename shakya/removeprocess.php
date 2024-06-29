<?PHP

include "connection.php";
session_start();



$email = $_GET["e"];

Database::iud("DELETE FROM `members_has_receipt` WHERE `members_user_email` = '".$email."'");

Database::iud("DELETE FROM `members` WHERE `user_email` = '" . $email . "'");
echo ("success");

?>