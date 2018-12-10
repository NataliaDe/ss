<?php
//$cardId = $this->session->userdata('locorg_id');
//echo 'форма заполнения';
//echo $idCard;

if ($complete == 1) {//карточка была заполнена
    ?>
    <div class="container">
        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Успешно!</strong> Карточка отправлена на подпись руководителю.
        </div>
    </div>
    <?php
}
?>