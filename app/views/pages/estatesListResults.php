<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/app/globals.php';
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/app/core/databaseProtection.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$searchParameters = $_REQUEST['object'];
$object = json_decode($searchParameters);

$sql = "SELECT * FROM " . REALESTATES_TABLE . " WHERE estateNeighborhood = '" . encrypt($object->Neighborhood, KEYWORD) . "' ";

if ($object->Region != "Избери") {
    $sql .= "OR estateRegion = '" . encrypt($object->Region, KEYWORD) . "'";
}

if ($object->EstateType != "Избери") {
    $sql .= "OR estateType = '" . $object->EstateType . "'";
}

if (strlen($object->ConstructionType)){
    $sql .= "OR buildingType = '" . $object->ConstructionType . "'";
}

if (strlen($object->Decoration)){
    $sql .= "OR furnishing = '" . $object->Decoration . "'";
}

if (strlen($object->OwnerPhone)){
    $sql .= "OR ownerPhone = '" . $object->OwnerPhone . "'";
}

if (strlen($object->AreaFrom) && strlen($object->AreaTo)){
    $sql .= "OR estateArea BETWEEN '" . $object->AreaFrom . "' AND '" . $object->AreaTo . "'";
}

if (strlen($object->FloorFrom) && strlen($object->FloorTo)){
    $sql .= "OR floor BETWEEN '" . $object->FloorFrom . "' AND '" . $object->FloorTo . "'";
}

if (strlen($object->PriceFrom) && strlen($object->PriceTo)){
    $sql .= "OR price BETWEEN '" . $object->PriceFrom . "' AND '" . $object->PriceTo . "'";
}

$conn->query("SET NAMES utf8");
$result = $conn->query($sql);
$conn->close();

?>


<div class="col-lg-12">
    <h1 class="page-header">Резултати</h1>
</div>
<table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
            <thead>
                <tr role="row">
                    <th></th>
                    <th>Собственик</th>
                    <th>Телефон</th>
                    <th>Квартал</th>
                    <th>Адрес</th>
                    <th>Блок / №</th>
                    <th>Площ</th>
                    <th>Цена</th>
                    <th>Тип</th>
                    <th>Строителство</th>
                    <th>Обзавеждане</th>
                    <th>Брокер</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($item = $result->fetch_assoc()) {

                    echo '<tr>';
                    echo '<td><a href="#" navigate-page="singleEstate" item-id="' . $item['id'] . '"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>';
                    echo '<td>' . decrypt($item['ownerName'], $keyword) . '</td>';
                    echo '<td>' . decrypt($item['ownerPhone'], $keyword) . '</td>';
                    echo '<td>' . decrypt($item['estateNeighborhood'], $keyword) . '</td>';
                    echo '<td>' . decrypt($item['address'], $keyword) . '</td>';
                    echo '<td>' . $item['estateBlockOrNumber'] . '</td>';
                    echo '<td>' . $item['estateArea'] . '</td>';
                    echo '<td>' . $item['price'] . '</td>';
                    echo '<td>' . $item['estateType'] . '</td>';
                    echo '<td>' . $item['buildingType'] . '</td>';
                    echo '<td>' . $item['furnishing'] . '</td>';
                    echo '<td>' . decrypt($item['broker'], $keyword) . '</td>';
                    echo '<td><a href="#" class="deleteRecord" type="estate" item-id="' . $item['id'] . '"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>';
                    echo '</tr>';
                }
                ?>

            </tbody>
        </table>
		
