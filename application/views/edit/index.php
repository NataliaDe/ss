<div class="container">
    <div class="alert alert-warning">

        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Внимание!</strong> Карточка была заполнена, но не отправлена на подпись руководителю.
    </div>
</div>

<!-- информация о подразделении-->
<div class="container">
    <div class="col-lg-12">

        <form class="form-horizontal" role="form" id="exit" method="POST" action="/ss/fill/">



            <!-- остальное-->
            <div class="row">
                <center>
                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="fio">Ф.И.О. заполнителя карточки</label>
                <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                    <div class="form-group">
                        <textarea class="form-control" rows="1" name="fio" id="fio"></textarea>
                    </div>
                </div>
                </center>
            </div>



            <div class="row">

                <div class="form-group">
                    <center>
                        <button type="submit" class="btn btn-danger" name="complete">Отправить карточку на подпись<br>руководителю</button>
                    </center>
                </div>
            </div>



        </form>
    </div>
</div>

