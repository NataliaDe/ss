<?php
foreach ($technics as $row) {
    $name = $row->name;
}
?>

<div class="container">
    <div class="alert alert-danger">

        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Внимание!</strong> Вид техники <strong><?= $name ?></strong> будет удален из БД.
    </div>
</div>
<br><br>
<div class="container">

    <div class="col-lg-12 col-lg-offset-5 col-md-12 col-md-offset-4 col-sm-offset-4">

        <form class="form-inline" role="form" id="deleteTech" method="POST" action="/ss/classif/">
            <input type="hidden" class="form-control " name="id" id="id" value="<?= $idTechnic ?>">
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-0 col-md-offset-0 col-lg-offset-5">
                        <button type="submit" class="btn btn-danger" name="delete">Удалить</button>
                    </div>

                </div>
            </div>
        </form>
    </div>

</div>
<br>




