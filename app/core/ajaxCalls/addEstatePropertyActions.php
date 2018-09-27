<?php

require_once dirname(dirname(dirname(__FILE__))) . "/core/databaseProtection.php";
require_once dirname(dirname(dirname(__FILE__))) . "/globals.php";

$property = $_REQUEST['property'];
$itemType = $_REQUEST['type'];

function addRecord($property, $tableName) {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $checkForExistingRecord = "SELECT * FROM " . $tableName . " WHERE name = '" . $property . "' ";
    $conn->query("SET NAMES utf8");
    $result = $conn->query($checkForExistingRecord);

    if ($result->num_rows > 0) {
        
    } else {
        $sql = "INSERT INTO " . $tableName . " (name) VALUES ('" . $property . "') ";
        $conn->query("SET NAMES utf8");
        $conn->query($sql);
    }
    $conn->close();
}

switch ($itemType) {
    case "neighborhood":
        addRecord($property, NEIGHBORHOODS_TABLE);
        break;
    case "region":
        addRecord($property, ESTATE_REGIONS_TABLE);
        break;
    case "estateType":
        addRecord($property, ESTATE_TYPES_TABLE);
        break;
}
