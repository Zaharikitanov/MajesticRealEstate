<?php
require_once dirname(dirname(dirname(__FILE__))) . '/globals.php';
require_once dirname(dirname(dirname(__FILE__))) . '/core/databaseLayer/retrieve/estateProperties.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Региони</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="col-lg-8">
       
        <div class="panel-body">
             <h2 class="page-header">Списък</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Регион</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo retrieveEstatePropertiesRecords(ESTATE_REGIONS_TABLE, "region")
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel-body">
           <h2 class="page-header">Добави</h2> 
           <div class="form-group">
                <label>Регион</label>
                <input type="text" class="form-control newRecord" recordType="region">
            </div>
            <a href="#" class="btn btn-primary btn-block addEstateProperty">Добави 
                <img src="<?php echo IMAGES_DIR."/spinner-icon-0.gif" ?>"  class="loading" width="28" height="28" alt="spinner-icon-12091"/>
            </a>
        </div>
        
    </div>

    <!-- /.row -->
</div>

