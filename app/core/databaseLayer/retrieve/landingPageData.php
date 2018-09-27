<?php

function landingPageData($table) {
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . "/globals.php";
    require_once dirname(dirname(dirname(__FILE__))) . "/databaseProtection.php";
    require_once 'userName.php';
    require_once 'getUserRole.php';

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    if (getUserRole() == "broker"){
        $checkForExistingRecord = "SELECT * FROM " . $table . " WHERE broker= '" . encrypt(getUserName(), KEYWORD) . "' ORDER BY id DESC LIMIT 10";
    } else {
        $checkForExistingRecord = "SELECT * FROM " . $table . " ORDER BY id DESC LIMIT 10";
    }
    
    $conn->query("SET NAMES utf8");
    $result = $conn->query($checkForExistingRecord);

    $conn->close();
    
    return $result;
}
