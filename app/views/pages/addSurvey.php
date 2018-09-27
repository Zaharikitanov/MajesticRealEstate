<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/app/globals.php';
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/app/core/databaseProtection.php';
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/app/core/databaseLayer/retrieve/userName.php';

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
            <h1 class="page-header">Добави оглед</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-1">
            <div class="form-group">
                <label>Дата</label>
                <input type="text" id="datepicker" class="form-control surveyDate">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label>Час</label>
                <select class="form-control surveyHour">
                    <option>07:00</option>
                    <option>07:30</option>
                    <option>08:00</option>
                    <option>08:30</option>
                    <option>09:00</option>
                    <option>09:30</option>
                    <option>10:00</option>
                    <option>10:30</option>
                    <option>11:00</option>
                    <option>11:30</option>
                    <option>12:00</option>
                    <option>12:30</option>
                    <option>13:00</option>
                    <option>13:30</option>
                    <option>14:00</option>
                    <option>14:30</option>
                    <option>15:00</option>
                    <option>15:30</option>
                    <option>16:00</option>
                    <option>16:30</option>
                    <option>17:00</option>
                    <option>17:30</option>
                    <option>18:00</option>
                    <option>18:30</option>
                    <option>19:00</option>
                    <option>19:30</option>
                    <option>20:00</option>
                    <option>20:30</option>
                    <option>21:00</option>
                </select>
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
        <div class="col-md-4">
            <div class="form-group clientResults">
                <label>Клиент</label>
                <input type="text" id="client" class="form-control search-query">
                <input type="hidden" class="clientId"> 
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group estateResults">
                <label>Имот</label>
                <input type="text" id="estate" class="form-control search-query">
                <input type="hidden" class="estateId"> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <label>Бележка</label>
            <textarea class="form-control surveyNote"></textarea>
        </div>
    </div>
    <div class="row horizontal-divider">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <button type="button" class="btn btn-primary btn-block addSurvey">Добави 
                <img src="<?php echo IMAGES_DIR."/spinner-icon-0.gif" ?>"  class="loading" width="28" height="28" alt="spinner-icon-12091"/>
            </button>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>