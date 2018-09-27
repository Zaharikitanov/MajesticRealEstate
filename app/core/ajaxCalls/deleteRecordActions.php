<?php
require_once dirname(dirname(dirname(__FILE__))) . "/core/databaseProtection.php";
require_once dirname(dirname(dirname(__FILE__))) . "/globals.php";

$itemId = $_REQUEST['id'];
$itemType = $_REQUEST['type'];

function deleteRecord($itemId, $tableName){
    $sql = "DELETE FROM " . $tableName . " "
        . "WHERE id = " . injectionCheck($itemId) . " ";
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $conn->query($sql);
    $conn->close();
}

switch($itemType){
    case "client":
        deleteRecord($itemId, CLIENTS_TABLE);
        break;
    case "estate":
        deleteRecord($itemId, REALESTATES_TABLE);
        break;
    case "survey":
        deleteRecord($itemId, SURVEYS_TABLE);
        break;
    case "neighborhood":
        deleteRecord($itemId, NEIGHBORHOODS_TABLE);
        break;
    case "region":
        deleteRecord($itemId, ESTATE_REGIONS_TABLE);
        break;
    case "estateType":
        deleteRecord($itemId, ESTATE_TYPES_TABLE);
        break;
}