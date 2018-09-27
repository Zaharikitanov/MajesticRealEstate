<?php

function retrieveEstate($estateId) {

    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/globals.php';
    require_once dirname(dirname(dirname(__FILE__))) . '/databaseProtection.php';

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $sql = "SELECT * FROM " . REALESTATES_TABLE . " "
            . "WHERE id = " . $estateId . " ";
    $conn->query("SET NAMES utf8");
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $estateArray = array (
            "estateRegion" => decrypt($row['estateRegion'], KEYWORD),
            "estateNeighborhood" => decrypt($row['estateNeighborhood'], KEYWORD),
            "address" => decrypt($row['address'], KEYWORD),
            "estateBlockOrNumber" => $row['estateBlockOrNumber'],
            "entrance" => $row['entrance'],
            "floor" => $row['floor'],
            "buildingType" => $row['buildingType'],
            "estateType" => $row['estateType'],
            "estateArea" => $row['estateArea'],
            "furnishing" => $row['furnishing'],
            "price" => $row['price'],
            "heatingType" => $row['heatingType'],
            "status" => $row['status'],
            "pictures" => json_decode($row['pictures'], true),
            "ownerName" => decrypt($row['ownerName'], KEYWORD),
            "ownerPhone" => decrypt($row['ownerPhone'], KEYWORD),
            "ownerPhone2" => decrypt($row['ownerPhone2'], KEYWORD),
            "ownerPhone3" => decrypt($row['ownerPhone3'], KEYWORD),
            "infoFromOwner" => $row['infoFromOwner'],
            "infoAboutOwner" => $row['infoAboutOwner'],
            "broker" => decrypt($row['broker'], KEYWORD)
        );
    }
    $conn->close();

    return $estateArray;
}
