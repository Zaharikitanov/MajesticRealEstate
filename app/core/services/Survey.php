<?php

class SurveyService {
    
    function retrieveSurvey () {
        
    }
    
    function addSurvey ($Object) {
        require_once dirname(dirname(__FILE__)).'/databaseLayer/add/survey.php';
        addSurvey($Object);
    }
    
    function editSurvey ($Object) {
        require_once dirname(dirname(__FILE__)).'/databaseLayer/edit/survey.php';
        editSurvey($Object);
    }
    
    function removeSurvey () {
        
    }
}
