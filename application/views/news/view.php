<?php

foreach ($status as $row) {

    if (($row->work) == 1)
        $work = 'в работе';
    else
        $work = 'ожидает исполнения';
    //printf("<p><option value='%s' ><label>%s</label></option></p>", $row->id, $row->name);
    if (($row->status) == 3) {
        ?>

        <div class="container">
            <div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php
                if (($this->session->userdata('role_id')) == 1) {
                    ?>
                    <strong>Внимание!</strong> Карточка была отправлена на доработку.
                    <?php
                } else {
                    ?>
                    <strong>Внимание!</strong> Карточка была отклонена. Требуется устранить недочеты.
                    <?php
                }
                ?>

            </div>
        </div>


        <?php
    } elseif ((($row->status) == 2) && (($this->session->userdata('level_id')) != 2)) {
        ?>


        <div class="container">
            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Успех!</strong> Карточка отправлена на подтверждение в УМЧС. Статус:<?= $work ?>
            </div>
        </div>
        <?php
    } elseif (($row->status) == 1) {
        ?>

        <div class="container">
            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Успех!</strong> Карточка отправлена на подтверждение в РЦУРЧС. Статус:<?= $work ?>
            </div>
        </div>
        <?php
    } elseif ($row->status == 4) {
        ?>

        <div class="container">
            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Успех!</strong> Карточка подтверждена.
            </div>
        </div>

        <?php
    } elseif (($this->session->userdata('role_id')) == 2) {
        ?>
        <div class="container">
            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Успех!</strong> Карточка отправлена на подпись руководителю.
            </div>
        </div>
        <?php
    }
}
