<?php
require_once dirname(dirname(dirname(__FILE__))) . "/globals.php";
require_once dirname(dirname(dirname(__FILE__))) . "/core/databaseProtection.php";
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/app/core/estateServicesInit.php';
require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseLayer/retrieve/landingPageData.php';


$keyword = KEYWORD;
?>
<script>
    var estates = new Array();
    var regions = new Array();
    var neighborhoods = new Array();
</script>
<div class="container-fluid">
    <h1 class="page-header">Списък имоти</h1>
    <div class="row panel-body">
        <div class="col-md-2">
            <label>Квартал</label>
            <select class="form-control estateNeighborhood">
                <option>Избери</option>
                <?php
                foreach ($EstateMeighborhoods->retrieveEstateNeighborhoods() as $estateNeighborhood) {
                    ?>
                    <option><?php echo $estateNeighborhood; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label>Район</label>
            <select class="form-control estateRegion">
                <option>Избери</option>
                <?php
                foreach ($EstateRegions->retrieveEstateRegions() as $estateRegion) {
                    ?>
                    <option><?php echo $estateRegion; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label>Тип на имота</label>
            <select class="form-control estateType">
                <option>Избери</option>
                <?php
                foreach ($EstateTypes->retrieveEstateTypes() as $estateType) {
                    ?>
                    <option><?php echo $estateType; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <label>Вид строителство</label>
            <select name="construction" id="construction" class="form-control constructionType">
                <option></option>
                <option value="ТУХЛА">ТУХЛА</option>
                <option value="ПАНЕЛ">ПАНЕЛ</option>
                <option value="ЕПК">ЕПК</option>
                <option>Ново строителство</option>
            </select>
        </div>
        <div class="col-md-2">
            <label>Обзавеждане</label>
            <select class="form-control decoration" id="decoration" name="decoration">
                <option></option>
                <option>Да</option>
                <option>Не</option>
                <option>Частично</option>
            </select>
        </div>
        <div class="col-md-2">
            <label>Телефон</label>
            <input type="number" class="form-control ownerPhone" id="phone"> 
        </div>
    </div>
    <div class="row panel-body">
        <div class="col-md-2">
            <label>Квадратура</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-arrows"></i>
                </span>
                <input type="number" class="form-control areaFrom" name="start" id="areaFrom">
                <span class="input-group-addon">до</span>
                <input type="number" class="form-control areaTo" name="end" id="areaTo">
            </div>
        </div>
        <div class="col-md-2">
            <label>Етаж</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-align-justify"></i>
                </span>
                <input type="number" class="form-control floorFrom" name="start" id="floorFrom">
                <span class="input-group-addon">до</span>
                <input type="number" class="form-control floorTo" name="end" id="floorTo">
            </div>
        </div>
        <!--        <div class="col-md-3">
                    <label>Дата</label>
                    <div class="input-daterange input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" class="form-control" name="start" id="dateFrom">
                        <span class="input-group-addon">до</span>
                        <input type="text" class="form-control" name="end" id="dateTo">
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Обаждане </label>
                    <div class="input-daterange input-group" data-plugin-datepicker="">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="text" class="form-control" name="start" id="callFrom" >
                        <span class="input-group-addon">до</span>
                        <input type="text" class="form-control" name="end" id="callTo" >
                    </div>
                </div>-->
        <div class="col-md-2">
            <label>Цена</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                </span>
                <input type="number" class="form-control priceFrom" id="priceFrom">
                <span class="input-group-addon">до</span>
                <input type="number" class="form-control priceTo" id="priceTo">
            </div>
        </div>
    </div>
    <div class="col-lg-12 horizontal-divider">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <button type="button" result-page="estatesListResults" class="btn btn-primary btn-block resultsBtn">Търсене</button>
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="col-lg-12 horizontal-divider"></div>
    <div class="row resultsList panel-body">
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
                $getEstates = landingPageData(REALESTATES_TABLE);

                while ($item = $getEstates->fetch_assoc()) {

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

    </div>

</div>