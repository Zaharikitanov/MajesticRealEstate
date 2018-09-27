<?php

require_once dirname(dirname(dirname(__FILE__))).'/core/databaseLayer/retrieve/estateProperties.php';

class EstateNeighborhoods {
    
    function retrieveEstateNeighborhoods(){
        
        return retrieveEstateProperties(NEIGHBORHOODS_TABLE);
    }
    
    
    function editEstateNeighborhood(){
        
    }
    
    function addEstateNeighborhood() {
        
    }
    
    function removeEstateNeighborhood() {
        
    }
}
