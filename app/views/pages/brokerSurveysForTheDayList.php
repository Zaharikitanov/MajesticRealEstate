<?php
require_once dirname(dirname(dirname(__FILE__)))."/core/databaseLayer/retrieve/userName.php";
require_once dirname(dirname(dirname(__FILE__)))."/core/databaseLayer/retrieve/brokerSurveysForTheDay.php";
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Моите огледи за деня</h1>
        </div>
    </div>
</div>
<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
            <thead>
                <tr>
                    <th></th>
                    <th>Дата/час</th>
                    <th>Брокер</th>
                    <th>Клиент</th>
                    <th>Имот</th>
                    <th>Бележка</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    brokerSurveysForTheDayList(getUserName());
                ?>
            </tbody>
        </table>
    </div>
</div>