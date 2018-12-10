<!-- tab2  по районам-->
<div class="tab-pane" id="tab3">

    <div class=" col-lg-6 col-lg-offset-3" >

        <table class="table table-condensed   table-bordered table-hover" id="tbl4" >
            <!--   строка 1 -->
            <thead>
                <tr >
                    <th rowspan="2">Область</th>
                    <th rowspan="2">Район</th>
                    <th rowspan="2">Орган<br>по ЧС</th>
                    <th colspan="4">Подразделение по ЧС</th>
                    <th rowspan="2">Всего</th>
                </tr>
                <!-- строка 2 -->
                <tr>

                    <th>ПАСП</th>
                    <th>ПАСЧ</th>
                    <th>ПАСО</th>
<th>ЦОУ</th>

                </tr>


            </thead>
            <tfoot>
            <th>Область</th>
            <th>Район</th>
            <th>Орган по ЧС</th>
<th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>

            </tfoot>


            <tbody>

                <?php
                foreach ($divizall as $d) {
                    ?>

                    <?php
                    if ($d->regid == NULL) {
                        ?>
                        <tr class="success">
                            <td>По республике</td>
                            <td></td>
                            <td></td>

                            <td><?= $d->paspp ?></td>
                            <td><?= $d->pasch ?></td>
                            <td><?= $d->paso ?></td>
                            <td class="warning"><?= $d->cou ?></td>
                            <td class="success"><?= $d->ss ?></td>
                        </tr>
                        <?php
                    } elseif ($d->orgid == NULL) {
                        if ($d->locid == NULL) {
                            ?>
                            <tr class="success">
                                <td><?= $d->regname ?></td>
                                <td></td>
                                <td></td>

                                <td><?= $d->paspp ?></td>
                                <td><?= $d->pasch ?></td>
                                <td><?= $d->paso ?></td>
                                <td class="warning"><?= $d->cou ?></td>
                                <td class="success"><?= $d->ss ?></td>
                            </tr>
                            <?php
                        } else {
                            continue;
                        }
                    } else {
                        ?>
                        <tr>
                            <td><?= $d->regname ?></td>
                            <td><?= $d->n1 ?></td>

                            <?php
                            if ($d->orgid == 7) {
                                ?>
                                <td><?= $d->orgname ?></td>
                                <?php
                            } else {
                                ?>
                                <td><?= $d->n2 ?></td>
                                <?php
                            }
                            ?>

                                                                                                                                                                         <!-- <td><?= $d->paso ?></td>-->
                            <td class="info"><?= $d->paspp ?></td>
                            <td class="info"><?= $d->pasch ?></td>
                            <td class="info"><?= $d->paso ?></td>
                            <td class="warning"><?= $d->cou ?></td>
                            <td class="success"><?= $d->ss ?></td>
                        </tr>
                        <?php
                    }
                    ?>

                    <?php
                }
                ?>

            </tbody>

        </table>
    </div>


</div>


