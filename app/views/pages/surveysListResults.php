<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/app/globals.php';
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/app/core/databaseProtection.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$searchParameters = $_REQUEST['object'];
$object = json_decode($searchParameters);
$sql = "SELECT * FROM " . SURVEYS_TABLE . " WHERE broker = '" . encrypt($object->Broker, KEYWORD) . "' ";
if (strlen($object->Date)) {
    $sql .= "AND surveyDate = '" . $object->Date . "'";
}

$conn->query("SET NAMES utf8");
$result = $conn->query($sql);
$conn->close();
?>

<h1 class="page-header">Резултати</h1>
<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
    <thead>
        <tr>
            <th></th>
            <th>Дата/час</th>
            <th>Брокер</th>
            <th>Клиент</th>
            <th>Имот</th>
            <th>Бележка</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($item = $result->fetch_assoc()) {

            echo '<tr>';
            echo '<td><a href="#" navigate-page="singleSurvey" item-id="' . $item['id'] . '"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>';
            echo '<td>' . $item['surveyDate'] . '</td>';
            echo '<td>' . decrypt($item['broker'], $keyword) . '</td>';
            echo '<td><a href="#" navigate-page="singleClient" item-id="' . $item['clientId'] . '">' . decrypt($item['client'], $keyword) . '</a></td>';
            echo '<td><a href="#" navigate-page="singleEstate" item-id="' . $item['estateId'] . '">' . decrypt($item['estate'], $keyword) . '</a></td>';
            echo '<td>' . $item['note'] . '</td>';
            echo '<td><a href="#" class="deleteRecord" type="survey" item-id="' . $item['id'] . '"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
