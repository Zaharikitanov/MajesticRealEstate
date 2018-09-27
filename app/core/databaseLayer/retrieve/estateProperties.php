<?php

function retrieveEstateProperties($table) {
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . "/globals.php";
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $sql = "SELECT * FROM " . $table . " ";
    $propertiesArray = array();
    $conn->query("SET NAMES utf8");
    $result = $conn->query($sql);
    while ($item = $result->fetch_assoc()) {
        array_push($propertiesArray, $item["name"]);
    }
    
    $conn->close();
    return $propertiesArray;
}

function retrieveEstatePropertiesRecords($table, $type) {
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . "/globals.php";
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $sql = "SELECT * FROM " . $table . " ORDER BY name";
    $conn->query("SET NAMES utf8");
    $result = $conn->query($sql);
    $html = "";
    while ($item = $result->fetch_assoc()) {
        $html .= '<tr>';
            $html .= '<td><a href="#" class="editRecord" type="' . $type . '" item-id="' . $item['id'] . '"><i class="fa fa-pencil-square-o editIcon" aria-hidden="true"></i></a></td>';
            $html .= '<td>'.$item["name"].'</td>';
            $html .= '<td><a href="#" class="deleteRecord" type="' . $type . '" item-id="' . $item['id'] . '" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>';
        $html .= '</tr>';
    }
    
    $conn->close();
    return $html;
}
