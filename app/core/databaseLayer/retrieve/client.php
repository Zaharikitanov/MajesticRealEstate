<?php

function retrieveClient($clientId) {
    
    require_once dirname(dirname(dirname(dirname(__FILE__)))).'/globals.php';
    require_once dirname(dirname(dirname(__FILE__))).'/databaseProtection.php';

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $sql = "SELECT * FROM " . CLIENTS_TABLE . " "
            . "WHERE id = " . $clientId . " ";

    $conn->query("SET NAMES utf8");
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $clientArray = array(
            "name" => decrypt($row['name'], KEYWORD),
            "phone" => decrypt($row['phone'], KEYWORD),
            "secondPhone" => decrypt($row['secondPhone'], KEYWORD),
            "budget" => $row['budget'],
            "familyStatus" => $row['familyStatus'],
            "furnishing" => $row['furnishing'],
            "emergency" => $row['emergency'],
            "pet" => $row['pet'],
            "estateType" => json_decode($row['estateType'], true),
            "estateRegion" => json_decode($row['estateRegion'], true),
            "estateNeighborhood" => json_decode($row['estateNeighborhood'], true),
            "note" => $row['note'],
            "broker" => decrypt($row['broker'], KEYWORD)
        ); 
    }
    $conn->close();
    
    return $clientArray;
}
