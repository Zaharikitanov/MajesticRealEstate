<?php

require_once 'globals.php';

function executeQuery($con, $sql, $tableName) {

    $checkForExistingTable = "SELECT 1 FROM " . $tableName . " LIMIT 1";

    if ($con->query($checkForExistingTable)) {
        echo "<br>Table " . $tableName . " already exists.";
    } else {
        if ($con->query($sql)) {
            echo "<br>Table " . $tableName . " created successfully.";
        } else {
            echo "<br>Error creating table: " . $con->error;
            die();
        }
    }
}

function estatePropertyTable($con, $tableName) {
    $sql = "CREATE TABLE " . $tableName . " "
            . "(id INT NOT NULL AUTO_INCREMENT, "
            . "PRIMARY KEY(id), "
            . "name VARCHAR(100))";
    executeQuery($con, $sql, $tableName);
}

function connectionCheck($db_host, $db_user, $db_password) {

    $con = new mysqli($db_host, $db_user, $db_password);
    if ($con->connect_error) {
        echo "<br>Failed to connect to MySQL: " . $con->connect_error;
        die();
    } else {
        echo "<br>Successfully connected.";
    }
    return $con;
}

function databaseCreation($con, $db_name) {
    $sql = "CREATE DATABASE IF NOT EXISTS " . $db_name . " CHARACTER SET utf8 COLLATE utf8_general_ci";
    if ($con->query($sql)) {
        echo "<br>Database " . $db_name . " created successfully.";
    } else {
        echo "<br>Error creating database: " . $con->error;
        die();
    }
}

$con = connectionCheck(DB_HOST, DB_USER, DB_PASSWORD);

databaseCreation($con, DB_NAME);

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// TABLES CREATION
// 
// brokers 
$sql = "CREATE TABLE " . BROKERS_TABLE . " "
        . "(id INT NOT NULL AUTO_INCREMENT, "
        . "PRIMARY KEY(id), "
        . "username VARCHAR(100), "
        . "email VARCHAR(100), "
        . "password VARCHAR(100), "
        . "userRole VARCHAR(100), "
        . "token VARCHAR(100), "
        . "created DATETIME )";

executeQuery($conn, $sql, BROKERS_TABLE);

// clients 
$sql = "CREATE TABLE " . CLIENTS_TABLE . " "
        . "(id INT NOT NULL AUTO_INCREMENT, "
        . "PRIMARY KEY(id), "
        . "name VARCHAR(100), "
        . "phone VARCHAR(100), "
        . "secondPhone VARCHAR(100), "
        . "budget INT, "
        . "familyStatus VARCHAR(255), "
        . "furnishing VARCHAR(255), "
        . "emergency VARCHAR(5), "
        . "pet VARCHAR(5), "
        . "estateType VARCHAR(255), "
        . "estateRegion VARCHAR(255), "
        . "estateNeighborhood VARCHAR(255), "
        . "note VARCHAR(255), "
        . "broker VARCHAR(100), "
        . "created DATETIME)";

executeQuery($conn, $sql, CLIENTS_TABLE);

// real estates
$sql = "CREATE TABLE " . REALESTATES_TABLE . " "
        . "(id INT NOT NULL AUTO_INCREMENT, "
        . "PRIMARY KEY(id), "
        . "estateRegion VARCHAR(100), "
        . "estateNeighborhood VARCHAR(100), "
        . "address VARCHAR(100), "
        . "estateBlockOrNumber VARCHAR(30), "
        . "entrance VARCHAR(30), "
        . "floor INT, "
        . "buildingType VARCHAR(30), "
        . "estateType VARCHAR(30), "
        . "estateArea INT, "
        . "furnishing VARCHAR(30), "
        . "price INT, "
        . "heatingType VARCHAR(30), "
        . "status INT, "
        . "pictures VARCHAR(255), "
        . "ownerName VARCHAR(100), "
        . "ownerPhone VARCHAR(100), "
        . "ownerPhone2 VARCHAR(100), "
        . "ownerPhone3 VARCHAR(100), "
        . "infoFromOwner VARCHAR(255), "
        . "infoAboutOwner VARCHAR(255), "
        . "broker VARCHAR(100), "
        . "created DATETIME)";

executeQuery($conn, $sql, REALESTATES_TABLE);

// surveys
$sql = "CREATE TABLE " . SURVEYS_TABLE . " "
        . "(id INT NOT NULL AUTO_INCREMENT, "
        . "PRIMARY KEY(id), "
        . "surveyDate VARCHAR(12), "
        . "surveyHour VARCHAR(12), "
        . "broker VARCHAR(100), "
        . "client VARCHAR(100), "
        . "estate VARCHAR(100), "
        . "clientId INT, "
        . "estateId INT, "
        . "note VARCHAR(255), "
        . "created DATETIME)";

executeQuery($conn, $sql, SURVEYS_TABLE);

// real estate types
estatePropertyTable($conn, ESTATE_TYPES_TABLE);

// real estate regions
estatePropertyTable($conn, ESTATE_REGIONS_TABLE);

// real estate neighborhoods
estatePropertyTable($conn, NEIGHBORHOODS_TABLE);

// messages
$sql = "CREATE TABLE " . MESSAGES_TABLE . " "
        . "(id INT NOT NULL AUTO_INCREMENT, "
        . "PRIMARY KEY(id), "
        . "recepient VARCHAR(255), "
        . "subject VARCHAR(255), "
        . "createdBy VARCHAR(255), "
        . "note VARCHAR(255), "
        . "created DATETIME)";

executeQuery($conn, $sql, MESSAGES_TABLE);

// calendar events
$sql = "CREATE TABLE " . CALENDAR_TABLE . " "
        . "(id INT NOT NULL AUTO_INCREMENT, "
        . "PRIMARY KEY(id), "
        . "date_time DATETIME, "
        . "createdBy VARCHAR(255), "
        . "note VARCHAR(255))";

executeQuery($conn, $sql, CALENDAR_TABLE);

// tasks
$sql = "CREATE TABLE " . TASKS_TABLE . " "
        . "(id INT NOT NULL AUTO_INCREMENT, "
        . "PRIMARY KEY(id), "
        . "state INT, "
        . "date_time DATETIME, "
        . "createdBy VARCHAR(100), "
        . "note VARCHAR(255))";

executeQuery($conn, $sql, TASKS_TABLE);

$conn->close();
