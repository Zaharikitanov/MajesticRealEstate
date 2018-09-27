<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseLayer/retrieve/userName.php';
require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseLayer/retrieve/landingPageData.php';
require_once dirname(dirname(dirname(__FILE__))) . "/core/databaseProtection.php";
require_once dirname(dirname(dirname(__FILE__))) . "/globals.php";
$keyword = KEYWORD;

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$broker = getUserName();
$getBrokers = "SELECT username FROM " . BROKERS_TABLE . " WHERE username NOT LIKE '%" . encrypt($broker, KEYWORD) . "%' ";
$brokers = $conn->query($getBrokers);
$brokersArray = array();

while ($row = $brokers->fetch_assoc()) {
    array_push($brokersArray, decrypt($row['username'], KEYWORD));
}

$conn->close();
?>

<script>
    $(function () {
        $("#datepicker").datepicker({
            dateFormat: 'dd/mm/yy',
            regional: 'bg'
        });
    });
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Огледи</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row panel-body">
        <div class="col-md-2">
            <div class="form-group">
                <label>Дата</label>
                <input type="text" id="datepicker" class="form-control surveyDate">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Брокер</label>
                <select class="form-control brokerName">
                    <option selected><?php echo $broker; ?></option>
                    <?php foreach ($brokersArray as $brokerName) { ?>
                        <option><?php echo $brokerName; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-lg-12 horizontal-divider">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <button type="button" result-page="surveysListResults" class="btn btn-primary btn-block resultsBtn">Търсене</button>
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="col-lg-12 horizontal-divider"></div>
    <div class="row resultsList panel-body">
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
                $getSurveys = landingPageData(SURVEYS_TABLE);

                while ($item = $getSurveys->fetch_assoc()) {

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
    </div>
</div>

<!-- /.row -->
</div>