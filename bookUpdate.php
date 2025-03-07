<?php

require "connection.php";

$json = $_POST["json"];

$obj = json_decode($json);

$qty = $obj->qty;
$id = $obj->id;

// qrt price diliver oyamrhr

// if (empty($language)) {
// } else {
//     $language_rs = Database::search("SELECT * FROM `language` WHERE `language`='" . $language . "'");
//     $language_num = $language_rs->num_rows;

//     if ($language_num == 1) {
//         echo ("Already have");
//     } else {

//         Database::iud("INSERT INTO `language`(`language`) VALUES ('" . $language . "')");
//         echo ("added");
//     }
// }
echo ("df");

?>
