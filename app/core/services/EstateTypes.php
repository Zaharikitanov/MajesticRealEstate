<?php

require_once dirname(dirname(dirname(__FILE__))).'/core/databaseLayer/retrieve/estateProperties.php';

class EstateTypes {
    
    function retrieveEstateTypes (){
        
        return retrieveEstateProperties(ESTATE_TYPES_TABLE);
    }
    
    function editEstateType(){
        
    }
    
    function addEstateType() {
        
    }
    
    function removeEstateType() {
        
    }
}

