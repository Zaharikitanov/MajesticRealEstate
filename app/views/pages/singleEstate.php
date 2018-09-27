<?php
    require_once dirname(dirname(dirname(__FILE__))) . '/globals.php';
    require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseProtection.php';
    require_once dirname(dirname(dirname(__FILE__))) . '/views/components/estateTemplate.php';
    
    $estateId = injectionCheck($_REQUEST['id']);
       
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Промени имот</h1>
        </div>
    </div>
    <?php estateTemplate($estateId); ?>
    <div class="row horizontal-divider">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <button type="button" class="btn btn-primary btn-block editEstate">Обнови 
                <img src="<?php echo IMAGES_DIR."/spinner-icon-0.gif" ?>"  class="loading" width="28" height="28" alt="spinner-icon-12091"/>
            </button>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>