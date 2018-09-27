<?php

//TODO all functions must be working with the Database

class ClientService {
    
    function retrieveClient () {
        
    }
    
    function addClient ($clientObject) {
        require_once dirname(dirname(__FILE__)).'/databaseLayer/add/client.php';
        addClient($clientObject);
    }
    
    function editClient ($clientObject) {
        require_once dirname(dirname(__FILE__)).'/databaseLayer/edit/client.php';
        editClient($clientObject);
    }
    
    function removeClient () {
        
    }
}

