<?php

function editClient($Object){
    
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
    $clientId = (int)$Object->Id;
    $clientBudget = (int)$Object->Budget;
    
    // prepare and bind
    $stmt = $conn->prepare(
            "UPDATE " . CLIENTS_TABLE . " SET "
            . "name = ?, "
            . "phone = ?, "
            . "secondPhone = ?, "
            . "budget = ?,"
            . "familyStatus = ?, "
            . "furnishing = ?, "
            . "emergency = ?, "
            . "pet = ?, "
            . "estateType = ?, "
            . "estateRegion = ?, "
            . "estateNeighborhood = ?, "
            . "note = ?, "
            . "broker = ? "
            . "WHERE id = ? ");
    $stmt->bind_param("sssisssssssssi", 
            $clientName,
            $clientPhone,
            $clientSecondaryPhone,
            $clientBudget,
            $Object->FamilyStatus,
            $Object->Furnishing,
            $Object->Urgent,
            $Object->Pet,
            $estateType,
            $estateRegion,
            $estateNeighborhood,
            $Object->Notes,
            $broker,
            $clientId );
    $conn->query("SET NAMES utf8");
    $stmt->execute();
    
    $stmt->close();
    $conn->close();  
}
