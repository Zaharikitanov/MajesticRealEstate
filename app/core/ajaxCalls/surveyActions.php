<?php

require_once dirname(dirname(__FILE__)).'/services/Survey.php';

$Service = new SurveyService();

$JSON = $_POST['surveyObject'];
$action = $_POST['action'];

switch($action){
    case "add":
        $object = json_decode($JSON);
        $Service->addSurvey($object);
        break;
    case "edit":
        $object = json_decode($JSON);
        $Service->editSurvey($object);
        break;
}
