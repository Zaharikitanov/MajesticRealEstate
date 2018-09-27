<?php

require_once dirname(dirname(dirname(dirname(__FILE__)))) . "/globals.php";
require_once dirname(dirname(dirname(__FILE__))) . "/databaseProtection.php";

function brokerSurveysForTheDayCount($userName) {

    $date = date('d/m/Y');

    $sql = "SELECT * FROM " . SURVEYS_TABLE . " "
            . "WHERE broker = '" . encrypt($userName, KEYWORD) . "' "
            . "AND surveyDate = '" . $date . "'";

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $result = $conn->query($sql);

    $conn->close();

    return $result->num_rows;
}

function brokerSurveysForTheDayList($userName) {
    
    $date = date('d/m/Y');

    $sql = "SELECT * FROM " . SURVEYS_TABLE . " "
            . "WHERE broker = '" . encrypt($userName, KEYWORD) . "' "
            . "AND surveyDate = '" . $date . "'";

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $result = $conn->query($sql);

    $conn->close();

    while ($item = $result->fetch_assoc()) {

        echo '<tr>';
        echo '<td><a href="#" navigate-page="singleSurvey" item-id="' . $item['id'] . '"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>';
        echo '<td>' . $item['surveyDate'] . '</td>';
        echo '<td>' . decrypt($item['broker'], KEYWORD) . '</td>';
        echo '<td><a href="#" navigate-page="singleClient" item-id="' . $item['clientId'] . '">' . decrypt($item['client'], KEYWORD) . '</a></td>';
        echo '<td><a href="#" navigate-page="singleEstate" item-id="' . $item['estateId'] . '">' . decrypt($item['estate'], KEYWORD) . '</a></td>';
        echo '<td>' . $item['note'] . '</td>';
        echo '</tr>';
    }
}
