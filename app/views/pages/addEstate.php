<?php
    require_once dirname(dirname(dirname(__FILE__))).'/globals.php';
    require_once dirname(dirname(dirname(__FILE__))).'/views/components/estateTemplate.php';

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Добави имот</h1>
        </div>
    </div>
    <?php estateTemplate(null);  ?>
    <div class="row horizontal-divider">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <button type="button" class="btn btn-primary btn-block addEstate">Добави 
                <img src="<?php echo IMAGES_DIR."/spinner-icon-0.gif" ?>"  class="loading" width="28" height="28" alt="spinner-icon-12091"/>
            </button>
        </div>
        <div class="col-lg-4"></div>
    </div>

</div>