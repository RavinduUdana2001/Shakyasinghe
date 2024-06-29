<?PHP

include "connection.php";
session_start();



$email = $_GET["e"];





    Database::iud("UPDATE `members` SET `status` = '4' WHERE `user_email` = '".$email."'");
    echo("success");



?>