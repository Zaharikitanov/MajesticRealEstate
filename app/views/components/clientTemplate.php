<?php

function clientTemplate($clientId){

    require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseProtection.php';
    require_once dirname(dirname(dirname(__FILE__))) . '/core/estateServicesInit.php';
    require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseLayer/retrieve/client.php';
    require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseLayer/retrieve/userName.php';
    require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseLayer/retrieve/getUserRole.php';

    $broker = getUserName();
    $userRole = getUserRole();
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $getBrokers = "SELECT username FROM " . BROKERS_TABLE . " WHERE username NOT LIKE '%". encrypt($broker, KEYWORD). "%' ";
    $brokers = $conn->query($getBrokers);
    $brokersArray = array();

    while ($row = $brokers->fetch_assoc()) {
        array_push($brokersArray, decrypt($row['username'], KEYWORD));
    }

    $conn->close();

    if ($clientId){
        $clientArray = retrieveClient($clientId);
    }
    ?>
    <script>
        var estates = new Array();
        var regions = new Array();
        var neighborhoods = new Array();
        $(document).ready(function () {

            function checkSelectedValues(selector, array) {

                var getValues = $(selector).text();

                if (getValues !== "Избери") {
                    var valuesArray = getValues.split(",").map(item => item.trim());

                    $.each(valuesArray, function (key, value) {
                        array.push(value);
                        $("input[value='" + value + "']").replaceWith('<input type="checkbox" value="' + value + '" checked>');

                    });
                }
            }
            checkSelectedValues(".estateTypeBtn", estates);
            checkSelectedValues(".estateRegionBtn", regions);
            checkSelectedValues(".estateNeighborhoodBtn", neighborhoods);

        });

    </script>
        <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Име</label>
                    <?php if($clientId) { ?>
                    <input class="form-control" name="clientName" value="<?php echo $clientArray["name"]; ?>" clientId="<?php echo $clientId; ?>">
                    <?php } else { ?>
                    <input class="form-control" name="clientName">
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="form-group">
                    <label>Телефон</label>
                    <?php if($clientId) { ?>
                    <input class="form-control" name="phone" value="<?php echo $clientArray["phone"]; ?>">
                    <?php } else { ?>
                    <input class="form-control" name="phone">
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="form-group">
                    <label>Втори телефон</label>
                    <?php if($clientId) { ?>
                    <input class="form-control" name="secondaryPhone" value="<?php echo $clientArray["secondPhone"]; ?>">
                    <?php } else { ?>
                    <input class="form-control" name="secondaryPhone">
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="form-group">
                    <label>Бюджет</label>
                    <?php if($clientId) { ?>
                    <input class="form-control" name="budget" value="<?php echo $clientArray["budget"]; ?>">
                    <?php } else { ?>
                    <input class="form-control" name="budget">
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label>Сем. положение</label>
                    <select class="form-control familyStatus">
                        <?php if($clientId) { ?>
                        <option selected><?php echo $clientArray["familyStatus"]; ?></option>
                        <?php } else { ?>
                        <option>Избери</option>
                        <?php } ?>
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
                        <?php if($clientId) { ?>
                        <option selected><?php echo $clientArray["furnishing"]; ?></option>
                        <?php } else { ?>
                        <option>Избери</option>
                        <?php } ?>
                        <option>Не</option>
                        <option>Да</option>
                        <option>Полуобзавеждане</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-1">
                    <label>Спешен</label>
                    <select class="form-control urgent">
                        <?php if($clientId) { ?>
                        <option><?php echo $clientArray["emergency"]; ?></option>
                        <?php } else { ?>
                        <option></option>
                        <?php } ?>
                        <option>Не</option>
                        <option>Да</option>
                    </select>
                </div>
                <div class="col-lg-1">
                    <label>Дом. любимец</label>
                    <select class="form-control pet">
                        <?php if($clientId) { ?>
                        <option><?php echo $clientArray["pet"]; ?></option>
                        <?php } else { ?>
                         <option></option>
                         <?php } ?>
                        <option>Не</option>
                        <option>Да</option>
                    </select>
                </div>
        </div>      
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Тип жилище</label><br>
                    <?php if($clientId) { ?>
                    <button class="btn dropdown-toggle estateTypeBtn" id="menu1" type="button" data-toggle="dropdown"><?php echo $estates = implode(",", $clientArray["estateType"]); ?></button>
                    <?php } else { ?>
                    <button class="btn dropdown-toggle estateTypeBtn" id="menu1" type="button" data-toggle="dropdown">Избери</button>
                    <?php } ?>
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
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Региони</label>
                    <?php if($clientId) { ?>
                    <button class="btn dropdown-toggle estateRegionBtn" id="menu2" type="button" data-toggle="dropdown"><?php echo $regions = implode(",", $clientArray["estateRegion"]); ?></button>
                    <?php } else { ?>
                    <button class="btn dropdown-toggle estateRegionBtn" id="menu2" type="button" data-toggle="dropdown">Избери</button>
                    <?php } ?>
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
                    <label>Квартал</label>
                    <?php if($clientId) { ?>
                    <button class="btn dropdown-toggle estateNeighborhoodBtn" id="menu3" type="button" data-toggle="dropdown"><?php echo $neighborhoods = implode(",", $clientArray["estateNeighborhood"]); ?></button>
                    <?php } else { ?>
                    <button class="btn dropdown-toggle estateNeighborhoodBtn" id="menu3" type="button" data-toggle="dropdown">Избери</button>
                    <?php } ?>
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
        </div>
        <div class="row">
            <?php if($userRole == "owner") { ?>
                <div class="col-lg-2">
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
            <?php } else { ?>
                <input type="hidden" class="form-control brokerName" value="<?php echo $broker;?>">
            <?php } ?>
            <div class="col-lg-10">
                <div class="form-group">
                    <label>Бележка</label>
                    <?php if($clientId) { ?>
                    <textarea class="form-control notes" rows="3"><?php echo $clientArray["note"]; ?></textarea>
                    <?php } else { ?>
                    <textarea class="form-control notes" rows="3"></textarea>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php 

}

?>