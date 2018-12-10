<?php
if ($delete == 1) {
    ?>
    <div class="container">
        <div class="alert alert-danger">

            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Внимание!</strong> Запись была удалена из БД.
        </div>
        <?php
        if (( $this->session->userdata('level_id') == 1) && ($this->session->userdata('role_id') == 3)) {//РЦУ admin
        } else {
            ?>

            <a href="/ss/edit/" >  <button type="button" class="btn btn-warning">Назад</button></a>
        <?php
    }
    ?>


    </div>
    <?php
} else {
    ?>
    <div class="container">
        <div class="alert alert-warning">

            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Внимание!</strong> Для удаления записи требуется подтверждение. Карточку необходимо отправить на подпись.
        </div>
        <a href="/ss/edit/" >  <button type="button" class="btn btn-warning">Назад</button></a>
    </div>
    <?php
}
