<?php

function estateTemplate($estateId) {
    require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseProtection.php';
    require_once dirname(dirname(dirname(__FILE__))) . '/core/estateServicesInit.php';
    require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseLayer/retrieve/estate.php';
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

    if ($estateId){
        $estateArray = retrieveEstate($estateId);
    }
?>
    <div class="row panel-body">
        <div class="col-md-2">
            <label>Район</label>
            <select class="form-control estateRegion">
                <?php if($estateId) { ?>
                    <option><?php echo $estateArray["estateRegion"]; ?></option>
                    <?php
                    foreach ($EstateRegions->retrieveEstateRegions() as $region) {
                        if ($region != $estateArray["estateRegion"]) { 
                            ?>
                            <option><?php echo $region; ?></option>
                            <?php
                        }
                    }
                    ?>
                <?php } else { ?>
                    <option>Избери</option>
                    <?php
                    foreach ($EstateRegions->retrieveEstateRegions() as $estateRegion) {
                        ?>
                        <option><?php echo $estateRegion; ?></option>
                        <?php
                    }
                    ?>     
                <?php } ?>           
            </select>
        </div>
        <div class="col-md-2">
            <label>Квартал</label>
            <select class="form-control estateNeighborhood">
                <?php if($estateId) { ?>
                    <option><?php echo $estateArray["estateNeighborhood"]; ?></option>
                    <?php
                    foreach ($EstateMeighborhoods->retrieveEstateNeighborhoods() as $neighborhood) {
                        if ($neighborhood != $estateArray["estateNeighborhood"]) {
                        ?>
                        <option><?php echo $neighborhood; ?></option>
                        <?php }
                    }
                    ?>
                <?php } else { ?>
                    <option>Избери</option>
                    <?php
                    foreach ($EstateMeighborhoods->retrieveEstateNeighborhoods() as $estateNeighborhood) {
                        ?>
                        <option><?php echo $estateNeighborhood; ?></option>
                        <?php
                    }
                    ?>
                <?php } ?> 
            </select>
        </div>
        <div class="col-md-2">
            <label>Адрес</label>
            <?php if($estateId) { ?>
            <input type="text" class="form-control address" value="<?php echo $estateArray["address"]; ?>">
            <?php } else { ?>
            <input type="text" class="form-control address">
            <?php } ?> 
        </div>
        <div class="col-md-2">
            <label>Блок / Номер</label>
            <?php if($estateId) { ?>
            <input type="number" class="form-control number" value="<?php echo $estateArray["estateBlockOrNumber"]; ?>">
            <?php } else { ?>
            <input type="number" class="form-control number">
            <?php } ?> 
        </div>
        <div class="col-md-2">
            <label>Вход</label>
            <?php if($estateId) { ?>
            <input type="text" class="form-control entry" value="<?php echo $estateArray["entrance"]; ?>">
            <?php } else { ?>
            <input type="text" class="form-control entry">
            <?php } ?> 
        </div>
        <div class="col-md-2">
            <label>Етаж</label>
            <?php if($estateId) { ?>
            <input type="number" class="form-control floor" value="<?php echo $estateArray["floor"]; ?>">
            <?php } else { ?>
            <input type="number" class="form-control floor">
            <?php } ?> 
        </div>
    </div>
    <div class="row panel-body">
        <div class="col-md-2">
            <label for="construction">Вид строителство</label>
            <select class="form-control constructionType">
                <?php if($estateId) { ?>
                <option selected><?php echo $estateArray["buildingType"]; ?></option>
                <?php } else { ?>
                <option>Избери</option>
                <?php } ?>
                <option>ТУХЛА</option>
                <option>ПАНЕЛ</option>
                <option>ЕПК</option>
                <option>Ново строителство</option>
            </select>
        </div>
        <div class="col-md-2">
            <label>Тип на имота</label>
            <select class="form-control estateType">
                <?php if($estateId) { ?>
                    <option><?php echo $estateArray["estateType"]; ?></option>
                    <?php
                    foreach ($EstateTypes->retrieveEstateTypes() as $type) {
                        if ($type != $estateArray["estateType"] ) { 
                        ?>
                        <option><?php echo $type; ?></option>
                        <?php }
                    }
                    ?>
                <?php } else { ?>
                    <option>Избери</option>
                    <?php
                    foreach ($EstateTypes->retrieveEstateTypes() as $estateType) {
                        ?>
                        <option><?php echo $estateType; ?></option>
                        <?php
                    }
                    ?>  
                <?php } ?>
            </select>
        </div>

        <div class="col-md-2">
            <label>Площ</label>
            <?php if($estateId) { ?>
            <input type="number" class="form-control area" value="<?php echo $estateArray["estateArea"]; ?>">
            <?php } else { ?>
            <input type="number" class="form-control area">
            <?php } ?>
        </div>
        <div class="col-md-2">
            <label>Обзавеждане</label>
            <select class="form-control decoration">
                <?php if($estateId) { ?>
                <option selected><?php echo $estateArray["furnishing"]; ?></option>
                <?php } else { ?>
                <option>Избери</option>
                <?php } ?>
                <option>Да</option>
                <option>Не</option>
                <option>Частично</option>
            </select>
        </div>
        <div class="col-md-2">
            <label>Цена</label>	
            <input type="number" class="form-control price" value="<?php echo $estateArray["price"]; ?>"> 
        </div>
        <div class="col-md-2">
            <label>Отопление</label>		
            <select class="form-control heatingType">
                <?php if($estateId) { ?>
                <option selected><?php echo $estateArray["heatingType"]; ?></option>
                <?php } else { ?>
                <option>Избери</option>
                <?php } ?>
                <option>ТЕЦ</option>
                <option>Локално отопление</option>
                <option>Електричество</option>
                <option>Без отопление</option>
                <option>Климатик</option>
                <option>Газ</option>
            </select>
        </div>
    </div>
    <div class="row panel-body">
        <div class="col-md-2">
            <label for="status">Статус</label>
            <select class="form-control status">
                <?php if($estateId) { ?>
                <option selected><?php echo $estateStatus = ($estateArray["status"] == 1) ? "Активен" : "Неактивен"; ?></option>
                <?php } else { ?>
                <option>Избери</option>
                <?php } ?>
                <option>Активен</option>
                <option>Неактивен</option>
            </select>
        </div>
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
        <div class="col-md-2">
            <label>Добави снимки</label>
            <input type="file" multiple="" class="addPictures">
        </div>

    </div>
    <h1 class="page-header">Собственик</h1>
    <div class="row panel-body">
        <div class="col-md-2">
            <div class="row panel-body">
                <label for="ownerName">Име</label>
                <?php if($estateId) { ?>
                <input type="text" class="form-control ownerName" value="<?php echo $estateArray["ownerName"]; ?>" estateId="<?php echo $estateId; ?>">
                <?php } else { ?>
                <input type="text" class="form-control ownerName">
                <?php } ?>
            </div>
            <div class="row panel-body">
                <label for="ownerPhone">Телефон</label>
                <?php if($estateId) { ?>
                <input type="text" class="form-control ownerPhone" value="<?php echo $estateArray["ownerPhone"]; ?>">
                <?php } else { ?>
                <input type="text" class="form-control ownerPhone">
                <?php } ?>
            </div>
            <div class="row panel-body">
                <label for="ownerPhone2">Телефон</label>
                <?php if($estateId) { ?>
                <input type="text" class="form-control ownerPhone2" value="<?php echo $estateArray["ownerPhone2"]; ?>">
                <?php } else { ?>
                <input type="text" class="form-control ownerPhone2">
                <?php } ?>
            </div>
            <div class="row panel-body">
                <label for="ownerPhone3">Телефон</label>
                <?php if($estateId) { ?>
                <input type="text" class="form-control ownerPhone3" value="<?php echo $estateArray["ownerPhone3"]; ?>">
                <?php } else { ?>
                <input type="text" class="form-control ownerPhone3">
                <?php } ?>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row panel-body">
                <label for="propertyDescriptionFromOwner">Информация ОТ собственика</label>
                <?php if($estateId) { ?>
                <textarea class="form-control propertyDescriptionFromOwner"><?php echo $estateArray["infoFromOwner"]; ?></textarea>
                <?php } else { ?>
                <textarea class="form-control propertyDescriptionFromOwner"></textarea>
                <?php } ?>
            </div>
            <div class="row panel-body">
                <label for="ownerDescription">Информация ЗА собственика</label>
                <?php if($estateId) { ?>
                <textarea class="form-control propertyDescriptionAboutOwner"><?php echo $estateArray["infoAboutOwner"]; ?></textarea>
                <?php } else { ?>
                <textarea class="form-control propertyDescriptionAboutOwner"></textarea>
                <?php } ?>
            </div>

        </div>
    </div>

    <?php 
    
}

?>