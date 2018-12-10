
<?php
if ($this->session->userdata('level_id') == 2) {//УМЧС
    ?>
    <div class="col-lg-8 col-lg-offset-2 col-sm-12 col-md-11 col-md-offset-1 col-xs-12" >
        <div class="table-responsive" id="conttabl">

            <table class="table table-condensed   table-bordered " id="tblreq">
                <thead>
                    <tr>
                        <th>Наименование органа</th>
                        <th>Статус</th>
                    </tr>
                </thead>

<tfoot>
                <tr>
                    <th>Наименование органа</th>
                    <th></th>
                </tr>
            </tfoot>


                <tbody>

                    <?php
                    foreach ($list as $row) {
                        ?>
                        <tr>
                            <?php
                            if ($row->w == 1) {//если взята в работу
                                ?>
                                <td><a href="/ss/query/view/<?= $row->id_card ?>" target="_blank"><?= $row->organ ?></a></td>
                                <td> в работе </td>
                                <?php
                            } else {
                                ?>
                                <td><?= $row->organ ?></td>
                                <td>  <a href="/ss/query/work/<?= $row->id_card ?>"><button  class="btn btn-sm btn-primary" type="button" name="work">Взять в работу</button></a> </td>

                                <?php
                            }
                            ?>

                        </tr>
                        <?php
                        //echo $row->organ;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}//end
elseif (($this->session->userdata('level_id') == 1)) {//РЦУ
    ?>

    <div class="col-lg-8 col-lg-offset-2 col-sm-12 col-md-11 col-md-offset-1 col-xs-12" >
        <div class="table-responsive " id="conttabl">
            <table class="table table-condensed   table-bordered " id="tblreqrcu">
                <thead>
                    <tr>
                        <th>Управление</th>
                        <th>Наименование органа</th>
                        <th>Статус</th>
                        <th>Ф.И.О.</th>


                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>Управление</th>
                        <th>Наименование органа</th>
                        <th></th>

                        <th>Ф.И.О.</th>

                    </tr>
                </tfoot>

                <tbody>

                    <?php
                    foreach ($list as $row) {
                        ?>
                        <tr>
                            <td><?= $row->head ?></td>

                            <?php
                            if ($row->w == 1) {//если взята в работу-вывести Ф.И.О.(РЦУ)
                                ?>
                                <td><a href="/ss/query/view/<?= $row->id_card ?>" target="_blank"><?= $row->organ ?></a></td>
                                <td> в работе </td>
                                <?php
                                $k = 0;
                                foreach ($workfio as $workf) {
                                    if (($workf->id_card) == ($row->id_card)) {
                                        $k++;
                                        ?>
                                        <td>  <?= $workf->fio ?> </td>
                                        <?php
                                    }
                                }
                                if ($k == 0) {
                                    ?>
                                    <td> </td>
                                    <?php
                                }
                            } else {
                                ?>
                                <td><?= $row->organ ?></td>
                                <td>  <a href="/ss/query/work/<?= $row->id_card ?>"><button  class="btn btn-sm btn-primary" type="button" name="work">Взять в работу</button></a> </td>

                                <td> </td>
                                <?php
                            }
                            ?>

                        </tr>
                        <?php
                        //echo $row->organ;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
?>


