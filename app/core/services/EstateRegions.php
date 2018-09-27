<?php

require_once dirname(dirname(dirname(__FILE__))).'/core/databaseLayer/retrieve/estateProperties.php';

class EstateRegions {
    
    function retrieveEstateRegions(){
        
        return retrieveEstateProperties(ESTATE_REGIONS_TABLE);
    }
    
    function editEstateRegion(){
        
    }
    
    function addEstateRegion() {
        
    }
    
    function removeEstateRegion() {
        
    }
}