<br><br>
<?php
foreach ($status as $row) {

    if ((($row->status == 2) && ($row->work == 0)) || (($row->status == 3) && ($row->work == 1)) || ($row->status == 4) || (($row->status == 1) && ($row->work == 0))) {
        //echo 'кнопка на подпись';
        ?>
        <div class="container">

            <div class="col-lg-12 col-lg-offset-2">

                <form class="form-horizontal" role="form" id="editsend" method="POST" action="/ss/edit/complete">



                    <!-- остальное-->
                    <div class="row">

                        <label class="control-label col-sm-4 col-lg-3 col-xs-6" for="fio">Обновления внес (Ф.И.О)</label>
                        <div class="col-sm-6 col-lg-5 col-md-7 col-xs-10">
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
        <?php
    }
}