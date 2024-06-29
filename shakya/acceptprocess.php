<?PHP

include "connection.php";
session_start();



$email = $_GET["e"];



$re_rs = Database::search("SELECT * FROM `members` WHERE `user_email` = '".$email."' ");
$re_data = $re_rs->fetch_assoc();

if($re_data["type"] == 1){

    Database::iud("UPDATE `members` SET `status` = '2' WHERE `user_email` = '".$email."'");
    echo("success");
}else if($re_data["type"] == 2){

    Database::iud("UPDATE `members` SET `status` = '3' WHERE `user_email` = '".$email."'");
    echo("success");

}


?>