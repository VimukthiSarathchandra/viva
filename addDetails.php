<?php
session_start();
require "connection.php";

$json = $_POST["json"];

$obj = json_decode($json);

$language = $obj->l;
$publisher = $obj->p;
$author = $obj->a;
$category = $obj->c;

if (empty($category)) {
} else {
    $category_rs = Database::search("SELECT * FROM `category` WHERE `category`='" . $category . "'");
    $category_num = $category_rs->num_rows;

    if ($category_num == 1) {
        echo ("Already have");
    } else {

        Database::iud("INSERT INTO `category`(`category`) VALUES ('" . $category . "')");
        echo ("added");
    }
}


if (empty($language)) {
} else {
    $language_rs = Database::search("SELECT * FROM `language` WHERE `language`='" . $language . "'");
    $language_num = $language_rs->num_rows;

    if ($language_num == 1) {
        echo ("Already have");
    } else {

        Database::iud("INSERT INTO `language`(`language`) VALUES ('" . $language . "')");
        echo ("added");
    }
}


if (empty($author)) {
} else {
    $author_rs = Database::search("SELECT * FROM `author` WHERE `author`='" . $author . "'");
    $author_num = $author_rs->num_rows;

    if ($author_num == 1) {
        echo ("Already have");
    } else {

        Database::iud("INSERT INTO `author`(`author`) VALUES ('" . $author . "')");
        echo ("added");
    }
}

if (empty($publisher)) {
} else {
    $publisher_rs = Database::search("SELECT * FROM `publisher` WHERE `publisher`='" . $publisher . "'");
    $publisher_num = $publisher_rs->num_rows;

    if ($publisher_num == 1) {
        echo ("Already have");
    } else {

        Database::iud("INSERT INTO `publisher`(`publisher`) VALUES ('" . $publisher . "')");
        echo ("added");
    }
}
