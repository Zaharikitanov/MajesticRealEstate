<?php

function addSurvey($Object){
    
    require_once dirname(dirname(dirname(dirname(__FILE__)))).'/globals.php';
    require_once dirname(dirname(dirname(__FILE__))).'/databaseProtection.php';
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    $broker = encrypt($Object->Broker, KEYWORD);
    $client = encrypt($Object->Client, KEYWORD);
    $estate = encrypt($Object->Estate, KEYWORD);
    $estateId = (int)$Object->EstateId;
    $clientId = (int)$Object->ClientId;
    $date = date('Y-m-d H:i:s');
    // prepare and bind
    $stmt = $conn->prepare(
            "INSERT INTO " . SURVEYS_TABLE . " ("
            . "surveyDate, "
            . "surveyHour, "
            . "broker, "
            . "client, "
            . "estate, "
            . "clientId, "
            . "estateId, "
            . "note, "
            . "created) "
            . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssiiss",
            $Object->Date,
            $Object->Hour,
            $broker,
            $client,
            $estate,
            $clientId,
            $estateId,
            $Object->Notes,
            $date );
    $conn->query("SET NAMES utf8");
    $stmt->execute();
    
    $stmt->close();
    $conn->close(); 
}
