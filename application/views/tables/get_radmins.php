<?php
//print_r($delete);
//echo $delete;
?>
<div class="container">
    <!-- Форма добавления radmins -->
    <div class="col-lg-10 col-lg-offset-3">
        <form class="form-inline" role="form" id="newradmins" method="POST" action="/ss/tables/newrecord">
            <div class="row">
                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="fio">Ф.И.О.</label>
                <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control " name="fio" id="fio" placeholder="Ф.И.О.">
                    </div>
                    <div class="form-group">

                        <button type="submit" class="btn btn-success" name="radmins">Добавить</button>

                    </div>
                </div>
            </div>
            <div class="row">

                <label class="control-label col-sm-4 col-lg-3 col-xs-4"  for="psw">Пароль</label>
                <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                    <div class="form-group">
                        <input type="password" class="form-control "  id="psw" name="psw" placeholder="Пароль">
                    </div>
                </div>

            </div>
        </form>
        <br>
    </div>
    Функция удаления доступна только в том случае, если администратор не закреплен ответственным за область.<br>
    <div class="table-responsive col-lg-8 col-lg-offset-2 " id="conttabl">
        <table id="tbl3" class="table table-condensed   table-bordered table-hover" >
            <!-- строка 1 -->
            <thead>
                <tr >
                    <th>idAdmin</th>
                    <th>Ф.И.О.</th>

                    <th class="deleteth"  rowspan="3">Ред.</th>
                    <th class="deleteth" rowspan="3">Уд.</th>


                </tr>

            </thead>
            <tbody>

                <?php
                foreach ($radmins as $row) {
                    ?>
                    <tr>
                        <td><?= $row->id_admin ?></td>
                        <td><?= $row->fio ?></td>

                        <td><a href='/ss/tables/edit/radmins/<?= $row->id_admin ?>' > <span class='glyphicon glyphicon-pencil'></span></a></td>
                        <td>
                            <?php
                            $k = 0;
                            if (isset($delete)) {
                                foreach ($delete as $myrow) {
                                    
                                    
                                    if ($myrow->id_admin == $row->id_admin) {
                                        $k++;
                                    }
                                    else {
                                        
                                    }
                                        
                                }
                                ?>
                                <?php
                            }
                            else {
                                ?>
                                <a href='/ss/tables/remove/radmins/<?= $row->id_admin ?>' > <span class='glyphicon glyphicon-trash'></span></a>
                                <?php
                            }
                            if ($k != 0) {
                                
                            } else {
                                ?>
                                <a href='/ss/tables/remove/radmins/<?= $row->id_admin ?>' > <span class='glyphicon glyphicon-trash'></span></a>
                                <?php
                            }
                            ?>


                        </td>

                    </tr>
    <?php
}
?>

            </tbody>
        </table>
        <br>
    </div>
</div>




