<?php
include "connection.php";

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d");

$u_rs = Database::search("SELECT * FROM `members` WHERE `type` = '1'");

while ($u_data = $u_rs->fetch_assoc()) {
    if ($date == $u_data["expier_date"]) {
        Database::iud("DELETE FROM `members_has_receipt` WHERE `members_user_email` = '" . $u_data["user_email"] . "'");
        Database::iud("DELETE FROM `members` WHERE `member_id` = '" . $u_data["member_id"] . "'");
        echo "success";
    } else if ($date > $u_data["expier_date"]) {
        Database::iud("DELETE FROM `members_has_receipt` WHERE `members_user_email` = '" . $u_data["user_email"] . "'");
        Database::iud("DELETE FROM `members` WHERE `member_id` = '" . $u_data["member_id"] . "'");
        echo "success";
    }
}
