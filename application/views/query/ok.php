<!--карточка была отправлена на подпись-->
<?php
if ((isset($ok)) && ($ok == 3)) {
    ?>
    <div class="container">
        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Успешно!</strong> Карточка отправлена на доработку.
        </div>

        <a href = "/ss/query/" > <button type = "button" class = "btn btn-warning">Назад</button></a>

    </div>

    <?php
} else {
    if ($this->session->userdata('level_id') == 2) {//авторизован  ОУМЧС
        ?>
        <div class="container">
            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Успешно!</strong> Карточка отправлена на подтверждение в РЦУРЧС.
            </div>
            <a href = "/ss/query/" > <button type = "button" class = "btn btn-warning">Назад</button></a>
        </div>
        <?php
    } elseif (($this->session->userdata('level_id') == 1)) {//авторизован РЦУ
        ?>

        <div class="container">
            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Успешно!</strong> Карточка подтверждена.
            </div>
            <a href = "/ss/query/" > <button type = "button" class = "btn btn-warning">Назад</button></a>
        </div>
        <?php
    }
}
?>

