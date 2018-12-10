<?php
foreach ($radmin_region as $row) {

    $fio = $row->fio;
    $region = $row->name;
    $id=$row->id;
    $idAdmin=$row->id_admin;
   
}

//print_r($tech);
?>


<!-- информация о подразделении-->
<div class="container">
    <div class="col-lg-12">
        <form class="form-horizontal" role="form" id="form_radmin_region" method="POST" action="/ss/tables/edit/">

            <div class="row">
                
                 
                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="fio">Ф.И.О.</label>
                <div class="col-sm-3 col-lg-2 col-md-3 col-xs-4">
                        <div class="form-group">
                            <select class="form-control" name="fio">
                               
                                    <?php
                                    printf("<p><option value='%s' ><label>%s</label></option></p>", $idAdmin, $fio);
                                    ?>
                              
                                <?php
                                foreach ($radmins as $row) {
                                    printf("<p><option value='%s' ><label>%s</label></option></p>", $row->id_admin, $row->fio);
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                
           
                
                

                <label class="control-label col-sm-1 col-lg-1 col-md-1 col-xs-1" for="region">Область</label>
                <div class="col-sm-2 col-lg-2 col-md-3 col-xs-2">
                    <div class="form-group">
                        <input type="text" class="form-control" id="region" name="region" value="<?= $region ?>" disabled="disabled">
                    </div>
                </div>
            </div>
            <input type="hidden" class="form-control" id="id" name="id" value="<?= $id ?>">

 <div class="form-group">

                    <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-3">
                        <button type="submit" class="btn btn-success" name="radmin_region">Сохранить изменения</button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-3">
                        <a href="/ss/tables/radmin_region" >  <button type="button" class="btn btn-warning">Назад</button></a>
                    </div>
                </div>

          


        </form>
    </div>
</div>

