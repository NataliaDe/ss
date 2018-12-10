<!-- tab2  по областям, ПАСО объект, РОСН-->
<div class="tab-pane" id="tab2">

    <div class="tabbable">
        <ul class="nav nav-tabs noprint" id="tabs">
            <li class="active"><a href="#tab4" data-toggle="tab">По областям</a></li>
            <li><a href="#tab3" data-toggle="tab">По районам</a></li>
            <li><a href="#tab5" data-toggle="tab">ЦОУ</a></li>
        </ul>


        <div class="tab-content">

            <div class="tab-pane active" id="tab4">

                <div class="table-responsive col-lg-6 col-lg-offset-3" >
                    <!--   без учета ПАСЧ, ПАСП ПАСО объекта -->
                    <table class="table table-condensed   table-bordered table-hover" id="tbl5" >
                        <!--   строка 1 -->
                        <thead>
                            <tr >
                                <th rowspan="2">Область</th>

                                  <!--  <th rowspan="2">Орган<br>по ЧС</th>-->
                                <th colspan="2">Подразделение по ЧС</th>
                                <th rowspan="2">Всего</th>
                            </tr>
                            <!-- строка 2 -->
                            <tr>
                               <!-- <th>ПАСО</th>-->
                                <th>ПАСП</th>
                                <th>ПАСЧ</th>
                                <!-- <th>ПАСО</th> -->

                            </tr>


                        </thead>


                        <tbody>

                            <?php
                            foreach ($diviz as $d) {
                                ?>

                                <?php
                                if ($d->regid == NULL) {
                                    ?>
                                    <tr class="success">
                                        <td>По республике</td>
                                      <!--   <td></td>
                                        <td></td> -->

                                        <td><?= $d->paspp ?></td>
                                        <td><?= $d->pasch ?></td>

                                       <!--  <td><?= $d->paso ?></td> -->

                                        <td><?= $d->ss ?></td>
                                    </tr>
                                    <?php
                                } elseif ($d->orgid == NULL) {
                                    if ($d->locid == NULL) {
                                        ?>
                                        <tr class="notok">
                                            <td ><?= $d->regname ?></td>
                                          <!--   <td></td>
                                            <td></td> -->

                                            <td class="info"><?= $d->paspp ?></td>
                                            <td class="info"><?= $d->pasch ?></td>

                                            <!-- <td class="info"><?= $d->paso ?></td> -->

                                            <td class="success"><?= $d->ss ?></td>
                                        </tr>
                                        <?php
                                    } else {
                                        continue;
                                    }
                                } else {
                                    ?>
        <!--  <tr>
        <td><?= $d->regname ?></td>
        <td><?= $d->n1 ?></td>
        <td><?= $d->n2 ?></td>
        <td><?= $d->paso ?></td>
        <td><?= $d->paspp ?></td>
        <td><?= $d->pasch ?></td>
        <td><?= $d->ss ?></td>
        </tr>-->
                                    <?php
                                }
                                ?>

                                <?php
                            }
                            ?>

                        </tbody>

                    </table>
                </div>



                <!-- ПАСО объекта -->
                <div class="table-responsive col-lg-6 col-lg-offset-3" >

                    <table class="table table-condensed   table-bordered table-hover" id="tbl6" >
                        <!--   строка 1 -->
                        <thead>
                            <tr >
                                <th rowspan="2">Область</th>

                                <th rowspan="2">ПАСО<br>(объекта)</th>
                                <th colspan="2">Подразделение по ЧС</th>
                                <th rowspan="2">Всего</th>
                            </tr>
                            <!-- строка 2 -->
                            <tr>
                               <!-- <th>ПАСО</th>-->
                                <th>ПАСП</th>
                                <th>ПАСЧ</th>

                            </tr>


                        </thead>


                        <tbody>

                            <?php
                            foreach ($paspobject as $d) {
                                ?>

                                <?php
                                if ($d->regid == NULL) {
                                    ?>
                                    <tr class="success">
                                        <td>По республике</td>
                                      <!--   <td></td>
                                        <td></td> -->
                                        <td></td>
                                        <td ><?= $d->paspp ?></td>
                                        <td ><?= $d->pasch ?></td>
                                        <td><?= $d->ss ?></td>
                                    </tr>
                                    <?php
                                } elseif ($d->orgid == NULL) {
                                    if ($d->locid != NULL) {
                                        ?>
                                        <tr class="notok">
                                            <td><?= $d->regname ?></td>
                                          <!--   <td></td>
                                            <td></td> -->
                                            <td><?= $d->orgname ?></td>
                                            <td class="info"><?= $d->paspp ?></td>
                                            <td class="info"><?= $d->pasch ?></td>
                                            <td class="success"><?= $d->ss ?></td>
                                        </tr>
                                        <?php
                                    } else {
                                        continue;
                                    }
                                } else {
                                    ?>
        <!--  <tr>
        <td><?= $d->regname ?></td>
        <td><?= $d->n1 ?></td>
        <td><?= $d->n2 ?></td>
        <td><?= $d->paso ?></td>
        <td><?= $d->paspp ?></td>
        <td><?= $d->pasch ?></td>
        <td><?= $d->ss ?></td>
        </tr>-->
                                    <?php
                                }
                                ?>

                                <?php
                            }
                            ?>

                        </tbody>

                    </table>
                </div>



                <div class="table-responsive col-lg-6 col-lg-offset-3" >

                    <table class="table table-condensed   table-bordered table-hover" id="tbl6" >
                        <!--   строка 1 -->
                        <thead>
                            <tr >
                                <th colspan="2">РОСН</th>
                            </tr>
                            <!-- строка 2 -->
                            <tr>
                                <th>Область</th>
                                <th>Район</th>
                            </tr>
                        </thead>


                        <tbody>

                            <?php
                            foreach ($rosn as $d) {
                                ?>


                                <tr class="success">

                                    <td ><?= $d->regname ?></td>
                                    <td ><?= $d->name ?></td>

                                </tr>

                            <?php }
                            ?>


                        </tbody>

                    </table>
                </div>


            </div>
