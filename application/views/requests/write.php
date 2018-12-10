<div class="container">

    <div class="col-lg-12 col-lg-offset-2">

        <form class="form-horizontal" role="form" id="write" method="POST" action="/ss/query/complete/">




            <!-- остальное-->
            <div class="row">

                <label class="control-label col-sm-4 col-lg-3 col-xs-6" for="fio">Карточку подписал/отклонил (Ф.И.О)</label>
                <div class="col-sm-6 col-lg-5 col-md-7 col-xs-10">
                    <div class="form-group">
                        <textarea class="form-control" rows="1" name="fio" id="fio"></textarea>
                    </div>
                </div>
            </div>
            <input type="hidden" name="idCard" value="<?= $this->session->userdata('locorg_id') ?>">
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-3">
                        <button type="submit" class="btn btn-success" name="complete">Подписать</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-3">
                        <button type="submit" class="btn btn-danger" name="refuse">Отправить карточку на доработку</button>
                    </div>
                </div>
            </div>



        </form>
    </div>
</div>