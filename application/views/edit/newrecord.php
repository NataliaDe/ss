<?php
if (empty($status)) {
    ?>

    <div class="container">
        <div class="col-lg-12">

            <form class="form-horizontal" role="form" id="newrecord" method="POST" action="/ss/edit/create">

                <div class="row">
                    <div class="form-group">
                        <center>
                            <button type="submit" class="btn btn-success" name="newrecord">Добавить новое подразделение</button>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
} else {
    foreach ($status as $row) {

        //редактирование доступно
        if ((($row->status) == 0) || (($row->status == 2) && ($row->work == 0)) || (($row->status == 3) && ($row->work == 1)) || ($row->status == 4) || (($row->status == 1) && ($row->work == 0))) {
            ?>

            <div class="container">
                <div class="col-lg-12">

                    <form class="form-horizontal" role="form" id="newrecord" method="POST" action="/ss/edit/create">

                        <div class="row">
                            <div class="form-group">
                                  <center>
                                    <button type="submit" class="btn btn-success" name="newrecord">Добавить новое подразделение</button>
                                  </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
    }
}
