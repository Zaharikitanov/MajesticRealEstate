<?php

require_once dirname(dirname(__FILE__)).'/services/Client.php';

$Service = new ClientService();

$JSON = $_POST['clientObject'];
$action = $_POST['action'];

switch($action){
    case "add":
        $object = json_decode($JSON);
        $Service->addClient($object);
        break;
    case "edit":
        $object = json_decode($JSON);
        $Service->editClient($object);
        break;
}




