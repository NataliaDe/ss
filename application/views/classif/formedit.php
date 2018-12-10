<?php
foreach ($technics as $row) {
    $name = $row->name;
     $des = $row->description;
}
?>
<div class="container">
    <!-- Форма добавления техники -->
    <div class="col-lg-10 col-lg-offset-3">

        <form class="form-inline" role="form" id="updtTech" method="POST" action="/ss/classif/">
            <input type="hidden" class="form-control " name="id" id="id" value="<?= $idTechnic ?>">

            <div class="row">
                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="technicName">Новое наименование техники</label>
                <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control " name="technicName" id="technicName" value="<?= $name ?>">
                    </div>
                    
                    

                    <div class="form-group">

                        <button type="submit" class="btn btn-success" name="updateTech">Сохранить</button>

                    </div>
                </div>
            </div>
            <div class="row">

                <label class="control-label col-sm-4 col-lg-3 col-xs-4"  for="descTech">Полное наименование техники</label>
                <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                    <div class="form-group">
                          <input type="text" class="form-control " name="descTech" id="descTech" value="<?= $des ?>" placeholder="полное наименование">
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
<br>