<?php

include_once "../../includes/db_connect.php";
include_once "../../includes/functions.php";

function __autoLoad($className) {
    require_once '../' . $className . '.php';
}
$db;
//WaarIsMijnDatabase 
define("dev_mode", TRUE);

IF (defined(dev_mode)) {
    $db = new DB("localhost", "i249513_admin", "secret", "i249513_db");
} else {
    $db = new DB("localhost", "root", "secret", "lorber");
}
//if (login_check($mysqli) == true) {
//    $ids = $_SESSION['user_id'];
//     echo 'dit is ids ->' . $ids . '<-';
//    $rollenspeler = mysqli_query($mysqli, "SELECT roles.members AS roles FROM members WHERE id.members = $ids");
//
//    while ($rollenspel = mysqli_fetch_array($rollenspeler)) {
//        $rollenspel['roles'] = $rolo;
//        echo 'dit is rolo -' . $rolo . '<-';
//    }
//}
?> 


