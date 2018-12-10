<?php
foreach ($radmins as $row) {

    $fio = $row->fio;
    $psw = $row->pssw;
    $id=$row->id_admin;
   
}

//print_r($tech);
?>


<!-- информация о подразделении-->
<div class="container">
    <div class="col-lg-12">
        <form class="form-horizontal" role="form" id="form_radmins" method="POST" action="/ss/tables/edit/">

            <div class="row">
                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="fio">Ф.И.О.</label>
                <div class="col-sm-3 col-lg-2 col-md-3 col-xs-4">
                    <div class="form-group">
                       <input type="text" class="form-control" id="fio" name="fio" value="<?= $fio ?>">
                    </div>
                </div>

                <label class="control-label col-sm-1 col-lg-1 col-md-1 col-xs-1" for="psw">Пароль</label>
                <div class="col-sm-2 col-lg-2 col-md-3 col-xs-2">
                    <div class="form-group">
                        <input type="text" class="form-control" id="psw" name="psw" value="<?= $psw ?>">
                    </div>
                </div>
            </div>
            <input type="hidden" class="form-control" id="id" name="id" value="<?= $id ?>">

 <div class="form-group">

                    <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-3">
                        <button type="submit" class="btn btn-success" name="radmins">Сохранить изменения</button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-3">
                        <a href="/ss/tables/radmins" >  <button type="button" class="btn btn-warning">Назад</button></a>
                    </div>
                </div>

          


        </form>
    </div>
</div>

