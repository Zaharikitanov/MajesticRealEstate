<?php

function getUserName() {
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . "/globals.php";
    require_once dirname(dirname(dirname(__FILE__))) . "/databaseProtection.php";
    
    $userToken = $_COOKIE[COOKIE_NAME];

    $sql = "SELECT username FROM " . BROKERS_TABLE . " "
            . "WHERE token = '" . $userToken . "'";
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $userName = $row['username'];
    }
    $conn->close();
    
    return decrypt($userName, KEYWORD);
}
