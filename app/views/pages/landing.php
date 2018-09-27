<?php
require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseLayer/retrieve/landingPageData.php';
require_once dirname(dirname(dirname(__FILE__))) . "/core/databaseProtection.php";
require_once dirname(dirname(dirname(__FILE__))) . "/globals.php";

$keyword = KEYWORD;
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Начало</h1>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Последни огледи
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
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
                                $getSurveys = landingPageData(SURVEYS_TABLE);

                                while ($item = $getSurveys->fetch_assoc()) {
                                    
                                    echo '<tr>';
                                        echo '<td><a href="#" navigate-page="singleSurvey" item-id="' . $item['id'] . '"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>';
                                        echo '<td>' . $item['surveyDate'] . '</td>';
                                        echo '<td>' . decrypt($item['broker'], $keyword) . '</td>';
                                        echo '<td><a href="#" navigate-page="singleClient" item-id="' . $item['clientId'] . '">' . decrypt($item['client'], $keyword) . '</a></td>';
                                        echo '<td><a href="#" navigate-page="singleEstate" item-id="' . $item['estateId'] . '">' . decrypt($item['estate'], $keyword) . '</a></td>';
                                        echo '<td>' . $item['note'] . '</td>';
                                    echo '</tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Последни добавени клиенти
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Клиент</th>
                                    <th>Телефон</th>
                                    <th>Бюджет</th>
                                    <th>Спешен</th>
                                    <th>Обзавеждане</th>
                                    <th>Сем. Положение</th>
                                    <th>Дом. Любимец</th>
                                    <th>Дата на добавяне</th>
                                    <th>Добавен от</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $getClients = landingPageData(CLIENTS_TABLE);

                                while ($item = $getClients->fetch_assoc()) {
                                   
                                    echo '<tr>';
                                        echo '<td><a href="#" navigate-page="singleClient" item-id="' . $item['id'] . '"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>';
                                        echo '<td>' . decrypt($item['name'], $keyword) . '</td>';
                                        echo '<td>' . decrypt($item['phone'], $keyword) . '</td>';
                                        echo '<td>' . $item['budget'] . '</td>';
                                        echo '<td>' . $item['emergency'] . '</td>';
                                        echo '<td>' . $item['furnishing'] . '</td>';
                                        echo '<td>' . $item['familyStatus'] . '</td>';
                                        echo '<td>' . $item['pet'] . '</td>';
                                        echo '<td>' . $item['created'] . '</td>';
                                        echo '<td>' . decrypt($item['broker'], $keyword) . '</td>';
                                    echo '</tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Последно добавени имоти
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>   
                                    <th>Собственик</th>
                                    <th>Телефон</th>
                                    <th>Бюджет</th>
                                    <th>Адрес</th>
                                    <th>Обзавеждане</th>
                                    <th>Тип на имота</th>
                                    <th>Вид строителство</th>
                                    <th>Дата на добавяне</th>
                                    <th>Добавен от</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $getEstates = landingPageData(REALESTATES_TABLE);

                                while ($item = $getEstates->fetch_assoc()) {
                                    echo '<tr>';
                                        echo '<td><a href="#" navigate-page="singleEstate" item-id="' . $item['id'] . '"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>';
                                        echo '<td>' . decrypt($item['ownerName'], $keyword) . '</td>';
                                        echo '<td>' . decrypt($item['ownerPhone'], $keyword) . '</td>';
                                        echo '<td>' . $item['price'] . '</td>';
                                        echo '<td>' . decrypt($item['address'], $keyword) . '</td>';
                                        echo '<td>' . $item['furnishing'] . '</td>';
                                        echo '<td>' . $item['estateType'] . '</td>';
                                        echo '<td>' . $item['buildingType'] . '</td>';
                                        echo '<td>' . $item['created'] . '</td>';
                                        echo '<td>' . decrypt($item['broker'], $keyword) . '</td>';
                                    echo '</tr>';
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
