<div class="table-responsive" id="conttabl">
  <p class="pull-right noprint"><a href="#foot">Вниз</a></p>
    <table class="table table-condensed   table-bordered" id="tblcapt">
        <!--   строка 1 -->
        <thead>
            <tr >
                <th rowspan="3">№ п/п</th>
                <th rowspan="3">Область</th>
                <th rowspan="3">Наименование органа</th>
                <th rowspan="3">Наименование<br>подразделения,<br>место дислокации</th>
                <th colspan="2">Географические координаты,<br>подразделения</th>
                <th colspan="8">Штатная численность</th>
                <th colspan="7">Техника</th>
                <th rowspan="3">Телефон<br>ЦОУ</th>
                <th rowspan="3">В какие нас.пункты района,<br>сеседних районов<br>привлекается на тушение<br>(район выезда)</th>


            </tr>
            <!-- строка 2 -->
            <tr>
                <th rowspan="2">Широта</th>
                <th rowspan="2">Долгота</th>
                <th rowspan="2">Под-<br>разде-<br>ления</th>
                <th colspan="3">Число л/с дежурной<br>смены</th>
                <th colspan="2">Количество<br>водителей</th>
                <th colspan="2">Количество<br>диспетчеров<br>(радиотелефонистов)</th>
                <th rowspan="2">Наименование</th>
                <th rowspan="2">Марка</th>
                <th rowspan="2">Вид</th>
                <th rowspan="2">Объем цистер-<br>ны, л</th>
                <th rowspan="2">Мин.<br>боевой расчет</th>
                <th rowspan="2">боевая/резерв</th>
                 <th rowspan="2">Номерной<br>знак</th>

            </tr>

            <tr>
                <!-- строка 3 -->

                <th>1<br>смена</th>
                <th>2<br>смена</th>
                <th>3<br>смена</th>
                <th>всего</th>
                <th>в<br>смене</th>
                <th>всего</th>
                <th>в<br>смене</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $k = 0;
            $z = 0; //количество ед техники
            $p = 0; //количество подразделений
            $o = 0; //количество органов


            foreach ($recordkey as $row) {

                //$p++;
                unset($recKey);
                $x = 0; //количество единиц техники
                $recKey = $row->id_record;

                foreach ($report as $row) {//количество единиц техники
                    if ($row->id_record == $recKey)
                        $x++;
                }
                $z+=$x;
                foreach ($report as $row) {
                    if ($row->id_record == $recKey) {
                        $p++;
                        $k++;
                        ?>
                        <tr class="notok">
                            <td rowspan="<?= $x ?>"><?= $p ?></td>
                            <td rowspan="<?= $x ?>"><?= $row->regionn ?></td>


                            <?php
                            if ($row->orgid == 7) {//Объектовые ПАСО
                                ?>
                                <td rowspan="<?= $x ?>"><?= $row->f ?></td>
                                <?php
                            } else {
                                ?>
                                <td rowspan="<?= $x ?>"><?= $row->local_name ?><br><?= $row->organ_name ?></td>
                                <?php
                            }


                            if ($row->divizion_num == 0) {//ПАСО
                                ?>
                                <td rowspan="<?= $x ?>"><?= $row->divizion_name ?><br><?= $row->disloc ?></td>
                                <?php
                            } else {
                                ?>
                                <td rowspan="<?= $x ?>"><?= $row->divizion_name ?>№ <?= $row->divizion_num ?><br><?= $row->disloc ?></td>
                                <?php
                            }
                            ?>


                            <td rowspan="<?= $x ?>"><?= $row->latitude ?></td>
                            <td rowspan="<?= $x ?>"><?= $row->longitude ?></td>
                            <td rowspan="<?= $x ?>"><?= $row->count_div ?></td>
                            <td rowspan="<?= $x ?>"><?= $row->change_one ?></td>
                            <td rowspan="<?= $x ?>"><?= $row->change_two ?></td>
                            <td rowspan="<?= $x ?>"><?= $row->change_three ?></td>
                            <td rowspan="<?= $x ?>"><?= $row->driver_all ?></td>
                            <td rowspan="<?= $x ?>"><?= $row->driver_change ?></td>
                            <td rowspan="<?= $x ?>"><?= $row->disp_all ?></td>
                            <td rowspan="<?= $x ?>"><?= $row->disp_change ?></td>

                            <?php
                            break;
                        }
                    }
                    $y = 0;
                    foreach ($report as $row) {
                        if ($row->id_record == $recKey) {
                            $y++;
                            ?>

                            <td class="notok"><?= $row->name_teh ?></td>
                            <td class="notok"><?= $row->mark ?></td>
                             <td class="notok"><?= $row->vid ?></td>
                            <td class="notok"><?= $row->v ?></td>
                            <td class="notok"><?= $row->calculation ?></td>
                            <td class="notok"><?= $row->type_name ?></td>
                             <td class="notok"><?= $row->numbsign ?></td>
                            <?php
                            if ($y == 1) {
                                ?>
                                <td rowspan="<?= $x ?>"><?= $row->phone ?></td>


                                <?php
                                $mb_str_len = mb_strlen($row->local_exit, 'utf-8');
                                if ($mb_str_len >= 100) {// обрезать текст
                                    $locex = mb_substr($row->local_exit, 0, 100, 'utf-8');
                                    ?>

                                    <td rowspan="<?= $x ?>" ><span id="sp<?= $k ?>"><?= $locex ?>...</span>
                                        <p id="collapse<?= $k ?>" class="panel-collapse collapse">
                                            <?= $row->local_exit ?>
                                        </p>

                                        <button type="button" class="btn btn-info btn-xs noprint" name="see"  onclick="see(<?= $k ?>);" data-toggle="collapse" data-target="#collapse<?= $k ?>">Просмотр</button><br>


                                    </td>
                                    <?php
                                } else {// не обрезать
                                    ?>
                                    <td rowspan="<?= $x ?>" ><span id="sp<?= $k ?>"> <?= $row->local_exit ?></span> </td>
                                    <?php
                                }
                            }
                            ?>

                        </tr>

                        <?php
                    }
                }
            }

            $rosn = 0;
            unset($countOrgans);
            unset($idCard);

            foreach ($report as $row) {
                if ($row->orgid == 8) {//ROSN это 1 орган
                    $rosn = 1;
                } else
                    $idCard[] = $row->id_card;
            }

            if (!empty($idCard)) {
                $countOrgans = array_unique($idCard);
                $countOrgans = count($countOrgans) + $rosn;
            } else
                $countOrgans = $rosn;
            ?>
        </tbody>
    </table>
    <a name="foot"></a>
    <?php
    echo '<b>';
    echo 'Общее количество единиц техники: ' . $z;
    echo '<br>Общее количество органов: ' . $countOrgans;
    echo '<br>Общее количество подразделений: ' . $p;
    echo '</b>';
    ?>
</div>
