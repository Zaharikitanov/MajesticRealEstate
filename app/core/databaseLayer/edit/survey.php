<?php

function editSurvey($Object){
    
    require_once dirname(dirname(dirname(dirname(__FILE__)))).'/globals.php';
    require_once dirname(dirname(dirname(__FILE__))).'/databaseProtection.php';
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    $broker = encrypt($Object->Broker, KEYWORD);
    $client = encrypt($Object->Client, KEYWORD);
    $estate = encrypt($Object->Estate, KEYWORD);
    $estateId = (int)$Object->EstateId;
    $clientId = (int)$Object->ClientId;
    $surveyId = (int)$Object->Id;
    // prepare and bind
    $stmt = $conn->prepare(
            "UPDATE " . SURVEYS_TABLE . " SET "
            . "surveyDate = ?, "
            . "surveyHour = ?, "
            . "broker = ?, "
            . "client = ?, "
            . "estate = ?, "
            . "clientId = ?, "
            . "estateId = ?, "
            . "note = ? "
            . "WHERE id = ? ");
    $stmt->bind_param("sssssiisi",
            $Object->Date,
            $Object->Hour,
            $broker,
            $client,
            $estate,
            $clientId,
            $estateId,
            $Object->Notes,
            $surveyId );
    $conn->query("SET NAMES utf8");
    $stmt->execute();
    
    $stmt->close();
    $conn->close(); 
}
