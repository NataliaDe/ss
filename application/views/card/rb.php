<div class="tabbable">
    <ul class="nav nav-tabs noprint" id="tabs">
        <li ><a href="/ss/" >Общие<br>сведения</a></li>
        <li ><a href="/ss/pages">Информация<br>по карточкам</a></li>
        <li class="active"><a href="/ss/card/rb">Карточка<br>по республике</a></li>
    </ul>




    <!-- -----------------------------------Карточка по республике----------------------------------------->
    <div class="tab-pane" >
        <div class="tabbable">
            <ul class="nav nav-tabs noprint" id="tabs">
                <li class="active"><a href="#tab3" data-toggle="tab">Общая информация</a></li>
                <li><a href="#tab4" data-toggle="tab">Техника</a></li>
            </ul>
            <div class="tab-content">
                <!--  Вкладка Общая информация ************************** -->
                <div class="tab-pane active" id="tab3">

                    <!-- условия для фильтрации данных -->
                    <div class="container noprint">
                        <div class="col-lg-12 col-lg-offset-2">
                            <table  class="table table-condensed   table-bordered" id="tablefilter">
                                <thead>
                                    <tr>
                                        <th colspan="8">Штатная численность</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">Подразде-<br>ления</th>
                                        <th colspan="3">Число л/с дежурной<br>смены</th>
                                        <th colspan="2">Количество<br>водителей</th>
                                        <th colspan="2">Количество<br>диспетчеров</th>
                                    </tr>
                                    <tr>
                                        <!-- строка 2 -->
                                        <th>1 смена</th>
                                        <th>2 смена</th>
                                        <th>3 смена</th>
                                        <th>всего</th>
                                        <th>в смене</th>
                                        <th>всего</th>
                                        <th>в смене</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>от:<input type="text" class="input-sm" id="minDiv" name="minDiv"></td>
                                        <td>от:<input type="text" class="input-sm" id="minOne" name="minOne"></td>
                                        <td>от:<input type="text" class="input-sm" id="minTwo" name="minTwo"></td>
                                        <td>от:<input type="text" class="input-sm" id="minThree" name="minThree"></td>
                                        <td>от:<input type="text" class="input-sm" id="minDrAll" name="minDrAll"></td>
                                        <td>от:<input type="text" class="input-sm" id="minDrChange" name="minDrChange"></td>
                                        <td>от:<input type="text" class="input-sm" id="minDispAll" name="minDispAll"></td>
                                        <td>от:<input type="text" class="input-sm" id="minDispChange" name="minDispChange"></td>

                                    </tr>
                                    <tr>

                                        <td>до:<input type="text" class="input-sm"  id="maxDiv" name="maxDiv"> </td>
                                        <td>до:<input type="text" class="input-sm"  id="maxOne" name="maxOne"> </td>
                                        <td>до:<input type="text" class="input-sm"  id="maxTwo" name="maxTwo"> </td>
                                        <td>до:<input type="text" class="input-sm"  id="maxThree" name="maxThree"> </td>
                                        <td>до:<input type="text" class="input-sm"  id="maxDrAll" name="maxDrAll"></td>
                                        <td>до:<input type="text" class="input-sm"   id="maxDrChange" name="maxDrChange"></td>
                                        <td> до:<input type="text" class="input-sm"  id="maxDispAll" name="maxDispAll"></td>
                                        <td> до:<input type="text" class="input-sm"  id="maxDispChange" name="maxDispChange"></td>


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- конец условия для фильтрации данных -->


                    <!-- таблица с общей инф tbl1-->
                    <div class="table-responsive" id="conttabl">
                        <table id="tbl1" class="table table-condensed   table-bordered table-hover " >

                            <thead>
                                <tr >
                                    <th rowspan="3">Управление</th>
                                    <th rowspan="3">Район</th>
                                    <th rowspan="3">Наиме-<br>нование<br>органа</th>
                                    <th rowspan="3">Наиме-<br>нование<br>подраз-<br>деления</th>

                                    <th>Географические<br>координаты<br>подразделения</th>
                                    <th colspan="8">Штатная численность</th>
                                    <th rowspan="3">Телефон ЦОУ,<br>позывной<br>радиостанции</th>
                                </tr>
                                <!-- строка 2 -->
                                <tr>
                                    <th rowspan="2">Широта<br>Долгота<br>Место<br>дислокации</th>

                                    <th rowspan="2">Под-<br>разде-<br>ления</th>
                                    <th colspan="3">Число л/с дежурной<br>смены</th>
                                    <th colspan="2">Количество<br>водителей</th>
                                    <th colspan="2">Количество<br>диспетчеров<br>(радиотелефонистов)</th>
                                </tr>
                                <tr>
                                    <!-- строка 2 -->
                                    <th>1<br>см</th>
                                    <th>2<br>см</th>
                                    <th>3<br>см</th>
                                    <th>все-<br>го</th>
                                    <th>в<br>см</th>
                                    <th>все-<br>го</th>
                                    <th>в<br>см</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th >Управление</th>
                                    <th>Район</th>
                                    <th>Наименование органа</th>
                                    <th >Наименование подразделения</th>

                                    <th>координаты</th>

                                    <th>Подразделения</th>
                                    <th>1<br>смена</th>
                                    <th>2<br>смена</th>
                                    <th>3<br>смена</th>
                                    <th>всего</th>
                                    <th>в<br>смене</th>
                                    <th>всего</th>
                                    <th>в<br>смене</th>

                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                foreach ($recordkey as $row) {

                                    unset($recKey);
                                    $x = 0;
                                    $recKey = $row->id_record;



                                    foreach ($card as $row) {

                                        if ($row->id_record == $recKey) {

                                            /*  if ($row->state == 0) {
                                              ?>
                                              <tr class="active">
                                              <?php
                                              } elseif ($row->state == 2) {
                                              ?>
                                              <tr class="warning">
                                              <?php
                                              } elseif ($row->state == 3) {
                                              ?>
                                              <tr class="success">
                                              <?php
                                              } elseif ($row->state == 4) {
                                              ?>
                                              <tr class="danger">
                                              <?php
                                              } elseif ($row->state == 5) {
                                              ?>
                                              <tr class="info">
                                              <?php
                                              } else {
                                              ?>
                                              <tr>
                                              <?php
                                              } */
                                            ?>
                                            <tr>
                                                <td><?= $row->region_name ?></td>
                                                <td><?= $row->local_name ?></td>
                                                <td><?= $row->organ_name ?></td>
                                                <?php
                                                if ($row->divizion_num == 0) {//ПАСО
                                                    ?>
                                                    <td><?= $row->divizion_name ?></td>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <td><?= $row->divizion_name ?> № <?= $row->divizion_num ?></td>
                                                    <?php
                                                }
                                                ?>


                                                <td><?= $row->latitude ?><br><?= $row->longitude ?><br><?= $row->disloc ?></td>

                                                <td><?= $row->count_div ?></td>
                                                <td><?= $row->change_one ?></td>
                                                <td><?= $row->change_two ?></td>
                                                <td><?= $row->change_three ?></td>
                                                <td><?= $row->driver_all ?></td>
                                                <td><?= $row->driver_change ?></td>
                                                <td><?= $row->disp_all ?></td>
                                                <td><?= $row->disp_change ?></td>
                                                <td><?= $row->phone ?></td>

                                            </tr>
                                            <?php
                                            break;
                                        }
                                    }
                                    ?>

                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--  Конец Вкладка Общая информация ************************** -->

                <!--  Вкладка Техника ****************************************  -->
                <div class="tab-pane" id="tab4">

                    <!-- условия для фильтрации данных для техники -->
                    <div class="container noprint">
                        <div class="col-lg-12 col-lg-offset-4">
                            <table  class="table table-condensed   table-bordered" id="tablefilter1">
                                <thead>
                                    <!-- строка 1 -->
                                    <tr>
                                        <th colspan="2">Техника</th>
                                    </tr>
                                    <!-- строка 2 -->
                                    <tr>
                                        <th>Объем<br>цистерны, л</th>
                                        <th>Мин.боевой<br>расчет</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>от:<input type="text" class="input-sm" id="minV" name="minV"></td>
                                        <td>от:<input type="text" class="input-sm" id="minCalc" name="minCalc"></td>
                                    </tr>
                                    <tr>
                                        <td>до:<input type="text" class="input-sm"  id="maxV" name="maxV"> </td>
                                        <td>до:<input type="text" class="input-sm"  id="maxCalc" name="maxCalc"> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Конец условия для фильтрации данных для техники -->

                    <!-- таблица техника tbl2-->
                    <div class="table-responsive" id="conttabl">
                        <table id="tbl2" class="table table-condensed   table-bordered table-hover" >
                            <thead>
                                <!-- строка 1 -->
                                <tr>
                                    <th colspan="5">Техника</th>
                                    <th rowspan="2">Наименование<br>подразделения</th>
                                    <th rowspan="2">Район</th>
                                    <th rowspan="2">Наименование<br>органа</th>
                                    <th rowspan="2">Управление</th>

                                </tr>
                                <!-- строка 2 -->
                                <tr>
                                    <th>Наименование</th>
                                    <th>Марка</th>
                                    <th>Объем<br>цистерны, л</th>
                                    <th>Мин.<br>боевой<br>расчет</th>
                                    <th>боевая/резерв</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Марка</th>
                                    <th>Объем цистерны</th>
                                    <th>Мин.боевой расчет</th>
                                    <th>боевая/резерв</th>
                                    <th>Наименование подразделения</th>
                                    <th>Район</th>
                                    <th>Наименование органа</th>
                                    <th>Управление</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                foreach ($card as $row) {

                                    /*  if ($row->state == 0) {
                                      ?>
                                      <tr class="active">
                                      <?php
                                      } elseif ($row->state == 2) {
                                      ?>
                                      <tr class="warning">
                                      <?php
                                      } elseif ($row->state == 3) {
                                      ?>
                                      <tr class="success">
                                      <?php
                                      } elseif ($row->state == 4) {
                                      ?>
                                      <tr class="danger">
                                      <?php
                                      } elseif ($row->state == 5) {
                                      ?>
                                      <tr class="info">
                                      <?php
                                      } else {
                                      ?>
                                      <tr>
                                      <?php
                                      } */
                                    ?>
                                    <tr>
                                        <td><?= $row->name_teh ?></td>
                                        <td><?= $row->mark ?></td>
                                        <td><?= $row->v ?></td>
                                        <td><?= $row->calculation ?></td>
                                        <td><?= $row->type_name ?></td>

                                        <?php
                                        if ($row->divizion_num == 0) {//ПАСО
                                            ?>
                                            <td><?= $row->divizion_name ?></td>
                                            <?php
                                        } else {
                                            ?>
                                            <td><?= $row->divizion_name ?> № <?= $row->divizion_num ?></td>
                                            <?php
                                        }
                                        ?>

                                        <td><?= $row->local_name ?></td>
                                        <td> <?= $row->organ_name ?></td>
                                        <td><?= $row->region_name ?></td>


                                        <?php
                                    }
                                    ?>
                                </tr>


                                <?php ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- конец таблица техника tbl2-->


                </div>
                <!--  Конец Вкладка Техника ****************************************  -->

            </div>

        </div>


    </div>
    <!-- -----------------------------------Конец Карточка по республике----------------------------------------->

</div>
