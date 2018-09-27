<?php

function editEstate($Object){
    
    require_once dirname(dirname(dirname(dirname(__FILE__)))).'/globals.php';
    require_once dirname(dirname(dirname(__FILE__))).'/databaseProtection.php';
    
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
    $estateArea = (int)$Object->Area;
    $estateId = (int)$Object->Id;
    
    // prepare and bind
    $stmt = $conn->prepare(
            "UPDATE " . REALESTATES_TABLE . " SET "
            . "estateRegion = ?, "
            . "estateNeighborhood = ?, "
            . "address = ?, "
            . "estateBlockOrNumber = ?, "
            . "entrance = ?, "
            . "floor = ?, "
            . "buildingType = ?, "
            . "estateType = ?, "
            . "estateArea = ?, "
            . "furnishing = ?, "
            . "price = ?, "
            . "heatingType = ?, "
            . "status = ?, "
            . "pictures = ?, "
            . "ownerName = ?, "
            . "ownerPhone = ?, "
            . "ownerPhone2 = ?, "
            . "ownerPhone3 = ?, "
            . "infoFromOwner = ?, "
            . "infoAboutOwner = ?, "
            . "broker = ? "
            . "WHERE id = ? ");
    $stmt->bind_param("ssssssssisisissssssssi", 
            $estateRegion,
            $estateNeighborhood,
            $estateAddress,
            $Object->Number,
            $Object->Entry,
            $Object->Floor,
            $Object->ConstructionType,
            $Object->EstateType,
            $estateArea,
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
            $estateId );
    $conn->query("SET NAMES utf8");
    $stmt->execute();
    
    $stmt->close();
    $conn->close();   
}
