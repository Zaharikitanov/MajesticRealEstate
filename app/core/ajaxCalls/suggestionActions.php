<?php

require_once dirname(dirname(dirname(__FILE__))) . '/globals.php';
require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseProtection.php';

$suggestedResultsType = $_REQUEST['type'];
$suggestedResults = $_REQUEST['data'];

function searchResultsClients($suggestedResults) {
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $resultListHTML = '';
    $request = encrypt($suggestedResults, KEYWORD);
    $sql = "SELECT * FROM " . CLIENTS_TABLE . " "
            . "WHERE phone LIKE '%" . $request . "%' "
            . "LIMIT 20";
    
    $conn->query("SET NAMES utf8");
    $results = $conn->query($sql);
    if ($results->num_rows > 0){
        $resultListHTML .= '<ul class="suggestions-list list-group" id="clients">';
        while ($row = $results->fetch_assoc()) {
                $resultListHTML .= '<li class="list-group-item" id="' . $row['id'] . '">'
                        . decrypt($row['name'], KEYWORD) . " тел."
                        . decrypt($row['phone'], KEYWORD) 
                    .'</li>';
        }
        $resultListHTML .= '</ul>';
    }
    $conn->close();
    return $resultListHTML;
}

function searchResultsEstates($suggestedResults){
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $resultListHTML = '';
    $request = encrypt($suggestedResults, KEYWORD);
    $sql = "SELECT * FROM " . REALESTATES_TABLE . " "
            . "WHERE ownerPhone LIKE '%" . $request . "%' "
            . "LIMIT 20";
    
    $conn->query("SET NAMES utf8");
    $results = $conn->query($sql);
    
    if ($results->num_rows > 0){
        $resultListHTML .= '<ul class="suggestions-list list-group" id="estates">';
        while ($row = $results->fetch_assoc()) {
                $resultListHTML .= 
                    '<li class="list-group-item" id="' . $row['id'] . '">'
                        . decrypt($row['estateNeighborhood'], KEYWORD) . ", "
                        . decrypt($row['address'], KEYWORD) . ", "
                        . "№" . $row['estateBlockOrNumber'] . ", "
                        . "вх. " . $row['entrance'] . ", "
                        . "ет. " . $row['floor'] . " "
                        . '</li>';
        }
        $resultListHTML .= '</ul>'; 
    }
    $conn->close();
    return $resultListHTML;
}


switch ($suggestedResultsType) {
    case "client":
        echo searchResultsClients($suggestedResults);
        break;
    case "estate":
        echo searchResultsEstates($suggestedResults);
        break;
}




