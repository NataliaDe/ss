<div class="container">
    <!-- Форма добавления техники -->
    <div class="col-lg-10 col-lg-offset-3">

        <form class="form-inline" role="form" id="newTech" method="POST" action="/ss/classif/">

            <div class="row">
                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="technicName">Наименование техники</label>
                <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control " name="technicName" id="technicName" placeholder="наименование">
                    </div>
                    <div class="form-group">

                        <button type="submit" class="btn btn-success" name="ok">Добавить</button>

                    </div>
                </div>
            </div>
            <div class="row">

                <label class="control-label col-sm-4 col-lg-3 col-xs-4"  for="descTech">Полное наименование техники</label>
                <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control " name="descTech" id="descTech" placeholder="полное наименование">
                    </div>
                </div>

            </div>
        </form>
    </div>
    <br><br>   <br><br>
    <hr>
    <!-- Таблица техники из БД  -->
    <?php
    foreach ($nodelete as $myrow) {//no delete technics
        $no[] = $myrow->id_view;
    }
    ?>
    <div class="table-responsive col-lg-8 col-lg-offset-2 " id="conttabl">
        <table id="tbl3" class="table table-condensed   table-bordered table-hover" >
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Ред.</th>
                    <th>Уд.</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Наименование</th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>

            <tbody>
                <?php
                foreach ($technics as $row) {
                    ?>
                    <tr>

                        <td><?= $row->name ?><br>(<?= $row->description ?>)</td>

                        <td><a href='/ss/classif/<?= $row->id ?>' > <span class='glyphicon glyphicon-pencil'></span></a></td>

                        <?php
                         if (!empty($no)) {
                            if (in_array($row->id, $no)) {//no delete technics
                                ?>
                                <td></td>
                                <?php
                            } else {
                                ?>
                                <td><a href='/ss/classif/remove/<?= $row->id ?>' > <span class='glyphicon glyphicon-trash'></span></a></td>
                                <?php
                            }
                        } else {
                            ?>
                            <td><a href='/ss/classif/remove/<?= $row->id ?>' > <span class='glyphicon glyphicon-trash'></span></a></td>
                                    <?php
                                }
                                ?>

                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</div>