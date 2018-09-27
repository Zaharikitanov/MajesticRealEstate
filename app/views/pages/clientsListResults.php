<?php
require_once dirname(dirname(dirname(__FILE__))) . '/globals.php';
require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseProtection.php';
require_once dirname(dirname(dirname(__FILE__))) . '/views/components/clientTemplate.php';
require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseLayer/retrieve/userName.php';
require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseLayer/retrieve/getUserRole.php';

$broker = getUserName();

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$searchParameters = $_REQUEST['object'];
$object = json_decode($searchParameters);

//$sql = "SELECT * FROM " . CLIENTS_TABLE . " WHERE familyStatus = '" . $object->FamilyStatus . "' ";

$sql = "SELECT * FROM " . CLIENTS_TABLE . " WHERE broker = '" . encrypt($broker, KEYWORD) . "' ";

if (strlen($object->FamilyStatus)) {
    $sql .= "AND familyStatus = '" . $object->FamilyStatus . "'";
}

if (strlen($object->Name)) {
    $sql .= "AND name = '" . encrypt($object->Name, KEYWORD) . "'";
}

if (strlen($object->Phone)) {
    $sql .= "AND phone = '" . encrypt($object->Phone, KEYWORD) . "'";
}

if (strlen($object->PriceFrom) && strlen($object->PriceTo)) {
    $sql .= "OR budget BETWEEN '" . $object->PriceFrom . "' AND '" . $object->PriceTo . "'";
}

if (strlen($object->Furnishing)) {
    $sql .= "AND furnishing = '" . $object->Furnishing . "'";
}

if (strlen($object->Urgent)) {
    $sql .= "OR emergency = '" . $object->Urgent . "'";
}

if (strlen($object->Pet)) {
    $sql .= "OR pet = '" . $object->Pet . "'";
}

if ($object->EstateNeighborhood != "Избери") {
    $neighborhoods = explode(",", $object->EstateNeighborhood);

    foreach ($neighborhoods as $neighborhood) {
        $sql .= "OR estateNeighborhood LIKE '%" . trim($neighborhood) . "%'";
    }
}

if ($object->EstateRegion != "Избери") {
    $regions = explode(",", $object->EstateRegion);

    foreach ($regions as $region) {
        $sql .= "OR estateRegion LIKE '%" . trim($region) . "%'";
    }
}

if ($object->EstateType != "Избери") {
    $types = explode(",", $object->EstateType);

    foreach ($types as $type) {
        $sql .= "OR estateType LIKE '%" . trim($type) . "%'";
    }
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
            <th>Име</th>
            <th>Телефон</th>
            <th>Бюджет</th>
            <th>Спешен</th>
            <th>Обзавеждане</th>
            <th>Сем. Положение</th>
            <th>Дом. Любимец</th>
            <th>Регион</th>
            <th>Квартал</th>
            <th>Тип Жилище</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php
while ($item = $result->fetch_assoc()) {

    $estateRegion = json_decode($item['estateRegion'], true);
    $estateNeighborhood = json_decode($item['estateNeighborhood'], true);
    $estateType = json_decode($item['estateType'], true);

    echo '<tr>';
    echo '<td><a href="#" navigate-page="singleClient" item-id="' . $item['id'] . '"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>';
    echo '<td>' . decrypt($item['name'], $keyword) . '</td>';
    echo '<td>' . decrypt($item['phone'], $keyword) . '</td>';
    echo '<td>' . $item['budget'] . '</td>';
    echo '<td>' . $item['emergency'] . '</td>';
    echo '<td>' . $item['furnishing'] . '</td>';
    echo '<td>' . $item['familyStatus'] . '</td>';
    echo '<td>' . $item['pet'] . '</td>';
    echo '<td>' . implode(",", $estateRegion) . '</td>';
    echo '<td>' . implode(",", $estateNeighborhood) . '</td>';
    echo '<td>' . implode(",", $estateType) . '</td>';
    echo '<td><a href="#" class="deleteRecord" type="client" item-id="' . $item['id'] . '"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>';
    echo '</tr>';
}
?>

    </tbody>
</table>

