<?PHP

include "connection.php";
session_start();



$id = $_GET["i"];

Database::iud("DELETE FROM `event_images` WHERE `events_id` = '" . $id . "'");
Database::iud("DELETE FROM `events` WHERE `id` = '" . $id . "'");
echo ("success");
