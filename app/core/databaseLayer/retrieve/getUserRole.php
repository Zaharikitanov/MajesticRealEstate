<?php

function getUserRole() {
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . "/globals.php";
    require_once dirname(dirname(dirname(__FILE__))) . "/databaseProtection.php";

    $userToken = $_COOKIE[COOKIE_NAME];

    $sql = "SELECT userRole FROM " . BROKERS_TABLE . " "
            . "WHERE token = '" . $userToken . "'";

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $result = $conn->query($sql);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $userRole = $row['userRole'];
        }
    } else {
        header("Location: " . ROOT . "/unautorized.php");
        die();
    }
    $conn->close();

    return decrypt($userRole, KEYWORD);
}
