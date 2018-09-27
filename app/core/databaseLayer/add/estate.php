<?php

function addEstate($Object){
    
    require_once dirname(dirname(dirname(dirname(__FILE__)))).'/globals.php';
    require_once dirname(dirname(dirname(__FILE__))).'/databaseProtection.php';
    require_once dirname(dirname(__FILE__)).'/retrieve/userName.php';
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    $estatePictures = json_encode($Object->Pictures, JSON_UNESCAPED_UNICODE);
    
    $ownerName = encrypt($Object->OwnerName, KEYWORD);
    $ownerPhone = encrypt($Object->OwnerPhone, KEYWORD);
    $ownerPhone2 = encrypt($Object->OwnerPhone2, KEYWORD);
    $ownerPhone3 = encrypt($Object->OwnerPhone3, KEYWORD);
    $estateRegion = encrypt($Object->Region, KEYWORD);
    $estateNeighborhood = encrypt($Object->Neighborhood, KEYWORD);
    $estateAddress = encrypt($Object->Address, KEYWORD);
    $broker = encrypt($Object->Broker, KEYWORD);
    $date = date('Y-m-d H:i:s');
    // prepare and bind
    $stmt = $conn->prepare(
            "INSERT INTO " . REALESTATES_TABLE . " ("
            . "estateRegion, "
            . "estateNeighborhood, "
            . "address, "
            . "estateBlockOrNumber, "
            . "entrance, "
            . "floor, "
            . "buildingType, "
            . "estateType, "
            . "estateArea, "
            . "furnishing, "
            . "price, "
            . "heatingType, "
            . "status, "
            . "pictures, "
            . "ownerName, "
            . "ownerPhone, "
            . "ownerPhone2, "
            . "ownerPhone3, "
            . "infoFromOwner, "
            . "infoAboutOwner, "
            . "broker, "
            . "created)"
            
            . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssisisssssssss", 
            $estateRegion,
            $estateNeighborhood,
            $estateAddress,
            $Object->Number,
            $Object->Entry,
            $Object->Floor,
            $Object->ConstructionType,
            $Object->EstateType,
            $Object->Area,
            $Object->Decoration,
            $Object->Price,
            $Object->HeatingType,
            $Object->Status,
            $estatePictures,
            $ownerName,
            $ownerPhone,
            $ownerPhone2,
            $ownerPhone3,
            $Object->PropertyDescriptionFromOwner,
            $Object->PropertyDescriptionAboutOwner,
            $broker,
            $date);
    $conn->query("SET NAMES utf8");
    $stmt->execute();
    
    $stmt->close();
    $conn->close();   
}
