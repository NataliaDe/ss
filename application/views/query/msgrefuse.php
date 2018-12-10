

<div class="container">
    <div class="alert alert-success">

        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Успешно!</strong> Запись отклонена.
    </div>

    <?php
    if ($this->session->userdata('level_id') == 3) {//рук
        ?>
        <a href="/ss/query/"><button type="button" class="btn btn-warning">Назад</button></a>
        <?php
    } else {//умчс, рцу
        ?>
        <a href="/ss/query/view/<?= $idCard ?>" >  <button type="button" class="btn btn-warning">Назад</button></a>
        <?php
    }
    ?>


</div>
