<?php

function addClient($Object){
    
    require_once dirname(dirname(dirname(dirname(__FILE__)))).'/globals.php';
    require_once dirname(dirname(dirname(__FILE__))).'/databaseProtection.php';
    
    $estateType = json_encode($Object->EstateType, JSON_UNESCAPED_UNICODE);
    $estateRegion = json_encode($Object->EstateRegion, JSON_UNESCAPED_UNICODE);
    $estateNeighborhood = json_encode($Object->EstateNeighborhood, JSON_UNESCAPED_UNICODE);
    

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $broker = encrypt($Object->Broker, KEYWORD);
    $clientName = encrypt($Object->Name, KEYWORD);
    $clientPhone = encrypt($Object->Phone, KEYWORD);
    $clientSecondaryPhone = encrypt($Object->SecondaryPhone, KEYWORD);
    
    $date = date('Y-m-d H:i:s');
    // prepare and bind
    $stmt = $conn->prepare(
            "INSERT INTO " . CLIENTS_TABLE . " ("
            . "name, "
            . "phone, "
            . "secondPhone, "
            . "budget,"
            . "familyStatus, "
            . "furnishing, "
            . "emergency, "
            . "pet, "
            . "estateType, "
            . "estateRegion, "
            . "estateNeighborhood, "
            . "note,"
            . "created,"
            . "broker) "
            . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssissssssssss", 
            $clientName,
            $clientPhone,
            $clientSecondaryPhone,
            $Object->Budget,
            $Object->FamilyStatus,
            $Object->Furnishing,
            $Object->Urgent,
            $Object->Pet,
            $estateType,
            $estateRegion,
            $estateNeighborhood,
            $Object->Notes,
            $date,
            $broker );
    $conn->query("SET NAMES utf8");
    $stmt->execute();
    
    $stmt->close();
    $conn->close();  
}
