<?php
if($this->session->userdata('level_id') == 3) { //начальник РОЧС
?>

<div class="container">
    <div class="alert alert-warning">

        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Внимание!</strong> Требуется проверить и подписать карточку.
    </div>
</div>
<?php
}
 else {//УМЧС, РЦУ 
?>
<div class="container">
    <div class="alert alert-warning">

        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Внимание!</strong> Требуется проверить и подтвердить следующие карточки.
    </div>
</div>

<?php
 }
 ?>