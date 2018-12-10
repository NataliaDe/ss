<?php
//$cardId = $this->session->userdata('locorg_id');
//echo 'форма заполнения';
//echo $idCard;

if ($success == 1) {//если было выполнено добавление записи
    ?>
    <div class="container">
        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Успешно!</strong> Запись была добавлена в БД.
        </div>
    </div>
    <?php
}
?>

<!-- информация о подразделении-->
<div class="container">
    <div class="col-lg-12">

        <form class="form-horizontal" role="form" id="exit" method="POST" action="/ss/fill/">



            <!-- остальное-->
            <div class="row">

                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="phone">Ф.И.О. заполнителя карточки</label>
                <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                    <div class="form-group">
                        <textarea class="form-control" rows="1" name="fio" id="fio"></textarea>
                    </div>
                </div>
            </div>



            <div class="row">



                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-3">
                        <button type="submit" class="btn btn-danger" name="complete">Отправить карточку на подпись<br>руководителю</button>
                    </div>
                </div>
            </div>



        </form>
    </div>
</div>