<?php

class EstateService {
    
    function retrieveEstate () {
        
    }
    
    function addEstate ($estateObject) {
        require_once dirname(dirname(__FILE__)).'/databaseLayer/add/estate.php';
        addEstate($estateObject);
    }
    
    function editEstate ($estateObject) {
        require_once dirname(dirname(__FILE__)).'/databaseLayer/edit/estate.php';
        editEstate($estateObject);
    }
    
    function removeEstate () {
        
    }
}