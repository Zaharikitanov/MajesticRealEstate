<?php
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/app/core/estateServicesInit.php';
require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseLayer/retrieve/landingPageData.php';
require_once dirname(dirname(dirname(__FILE__))) . "/core/databaseProtection.php";
require_once dirname(dirname(dirname(__FILE__))) . "/globals.php";
$keyword = KEYWORD;
?>
<script>
    var estates = new Array();
    var regions = new Array();
    var neighborhoods = new Array();
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Списък клиенти</h1>

        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Име</label>
                    <input class="form-control" name="clientName">
                </div>
            </div>
            <div class="col-lg-1">
                <label>Бюджет от</label>
                <input type="text" class="form-control priceFrom">
            </div>
            <div class="col-lg-1">
                <label>Бюджет до</label>
                <input type="text" class="form-control priceTo">
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Телефон</label>
                    <input class="form-control" name="phone">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Сем. положение</label>
                    <select class="form-control familyStatus">
                        <option></option>
                        <option>Само момче</option>
                        <option>Само момиче</option>
                        <option>Млада двойка</option>
                        <option>Възрастна двойка</option>
                        <option>Семейство с деца</option>
                        <option>Семейство без деца</option>
                        <option>Съквартиранти (група &gt; 4)</option>
                        <option>Бизнес</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Обзавеждане</label>
                    <select class="form-control furnishing">
                        <option></option>
                        <option value="0">Не</option>
                        <option value="1">Да</option>
                        <option value="2">Полуобзавеждане</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-1">
                <label>Спешен</label>
                <select class="form-control urgent">
                    <option></option>
                    <option>Не</option>
                    <option>Да</option>
                </select>
            </div>
            <div class="col-lg-1">
                <label>Дом. любимец</label>
                <select class="form-control pet">
                    <option></option>
                    <option>Не</option>
                    <option>Да</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Квартал</label>
                    <button class="btn dropdown-toggle estateNeighborhoodBtn" id="menu3" type="button" data-toggle="dropdown">Избери
                    </button>
                    <ul class="dropdown-menu estate" role="menu" aria-labelledby="menu3">
                        <?php
                        foreach ($EstateMeighborhoods->retrieveEstateNeighborhoods() as $estateNeighborhood) {
                            ?>
                            <li role="presentation" ><input type="checkbox" value="<?php echo $estateNeighborhood; ?>"><?php echo $estateNeighborhood; ?></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Региони</label>
                    <button class="btn dropdown-toggle estateRegionBtn" id="menu2" type="button" data-toggle="dropdown">Избери
                    </button>
                    <ul class="dropdown-menu estate" role="menu" aria-labelledby="menu2">
                        <?php
                        foreach ($EstateRegions->retrieveEstateRegions() as $estateRegion) {
                            ?>
                            <li role="presentation" ><input type="checkbox" value="<?php echo $estateRegion; ?>"><?php echo $estateRegion; ?></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Тип жилище</label><br>
                    <button class="btn dropdown-toggle estateTypeBtn" id="menu1" type="button" data-toggle="dropdown">Избери
                    </button>
                    <ul class="dropdown-menu estate" role="menu" aria-labelledby="menu1">
                        <?php
                        foreach ($EstateTypes->retrieveEstateTypes() as $estateType) {
                            ?>
                            <li role="presentation" ><input type="checkbox" value="<?php echo $estateType; ?>"><?php echo $estateType; ?></li>
                            <?php
                        }
                        ?>
                    </ul>					
                </div>
            </div>

        </div>
        <div class="col-lg-12 horizontal-divider">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <button type="button" result-page="clientsListResults" class="btn btn-primary btn-block resultsBtn">Търсене</button>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="col-lg-12 horizontal-divider"></div>
        <div class="row resultsList panel-body">
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
                    $getClients = landingPageData(CLIENTS_TABLE);

                    while ($item = $getClients->fetch_assoc()) {

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
        </div>
    </div>
    <!-- /.row -->
</div>