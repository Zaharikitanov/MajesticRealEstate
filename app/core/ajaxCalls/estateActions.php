<?php

require_once dirname(dirname(__FILE__)).'/services/Estate.php';

$Service = new EstateService();

$JSON = $_POST['estateObject'];
$action = $_POST['action'];

switch($action){
    case "add":
        $object = json_decode($JSON);
        $Service->addEstate($object);
        break;
    case "edit":
        $object = json_decode($JSON);
        $Service->editEstate($object);
        break;
}

