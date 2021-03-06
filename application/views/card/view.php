<?php
$roleId = $this->session->userdata('role_id');
$levelId = $this->session->userdata('level_id');
$auth = $this->session->userdata('auth');
$roleName = $this->session->userdata('role_name');
//$cardId = $this->session->userdata('locorg_id');
$fio = $this->session->userdata('fio');
?>
<div class="table-responsive" id="conttabl">
    <table class="table table-condensed   table-bordered" id="tblcapt">
        <!-- строка 1 -->
        <thead>
            <tr >
                <th rowspan="3">Наименование<br>подразделения,<br>место дислокации</th>
                <th colspan="2">Географические координаты,<br>подразделения</th>
                <th colspan="8">Штатная численность</th>
                <th colspan="7">Техника</th>
                <th rowspan="3">Телефон<br>ЦОУ</th>
                <th rowspan="3">В какие нас.пункты района,<br>сеседних районов<br>привлекается на тушение<br>(район выезда)</th>
                <th rowspan="3" class="noprint">Недочеты</th>

                <?php
                if (($levelId == 1) && ($roleId == 3)) {//РЦУ admin
                    ?>

                    <th rowspan="3" class="noprint">Ред.</th>
                    <th rowspan="3" class="noprint">Уд.</th>
                    <?php
                }
                ?>


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
                <!-- строка 2 -->

                <th>1<br>смена</th>
                <th>2<br>смена</th>
                <th>3<br>смена</th>
                <th>всего</th>
                <th>в<br>смене</th>
                <th>всего</th>
                <th>в<br>смене</th>
            </tr>
        </thead>
        <?php
        $k = 0;
        foreach ($recordkey as $row) {

            unset($recKey);
            $x = 0;
            $recKey = $row->id_record;

            foreach ($card as $row) {//количество единиц техники
                if ($row->id_record == $recKey)
                    $x++;
            }

            foreach ($card as $row) {

                if ($row->id_record == $recKey) {
                    $k++;

                    if ($row->state == 0) {
                        ?>
                        <tr class="notok">
                            <?php
                        } elseif ($row->state == 2) {
                            ?>
                        <tr class="warning">
                            <?php
                        } elseif ($row->state == 3) {
                            ?>
                        <tr class="newrec">
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
                        <tr class="success">
                            <?php
                        }

                        if ($row->divizion_num == 0) {//ПАСО
                            if ($row->orgid == 8) {//ROSN
                                ?>
                                <td rowspan="<?= $x ?>"><?= $row->f ?><br><?= $row->disloc ?></td>
                                <?php
                            } else {
                                ?>
                                <td rowspan="<?= $x ?>"><?= $row->divizion_name ?><br><?= $row->disloc ?></td>
                                <?php
                            }
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
                foreach ($card as $row) {

                    if ($row->id_record == $recKey) {
                        $y++;

                        if ($row->state == 0) {
                            ?>

                            <td class="notok"><?= $row->name_teh ?></td>
                            <td class="notok"><?= $row->mark ?></td>
                            <td class="notok"><?= $row->vid ?></td>
                            <td class="notok"><?= $row->v ?></td>
                            <td class="notok"><?= $row->calculation ?></td>
                            <td class="notok"><?= $row->type_name ?></td>
                             <td class="notok"><?= $row->numbsign ?></td>
                            <?php
                        } elseif ($row->state == 2) {
                            ?>
                            <td class="warning"><?= $row->name_teh ?></td>
                            <td class="warning"><?= $row->mark ?></td>
                             <td class="warning"><?= $row->vid ?></td>
                            <td class="warning"><?= $row->v ?></td>
                            <td class="warning"><?= $row->calculation ?></td>
                            <td class="warning"><?= $row->type_name ?></td>
                             <td class="warning"><?= $row->numbsign ?></td>
                            <?php
                        } elseif ($row->state == 3) {
                            ?>
                            <td class="newrec"><?= $row->name_teh ?></td>
                            <td class="newrec"><?= $row->mark ?></td>
                             <td class="newrec"><?= $row->vid ?></td>
                            <td class="newrec"><?= $row->v ?></td>
                            <td class="newrec"><?= $row->calculation ?></td>
                            <td class="newrec"><?= $row->type_name ?></td>
                             <td class="newrec"><?= $row->numbsign ?></td>
                            <?php
                        } elseif ($row->state == 4) {
                            ?>
                            <td class="danger"><?= $row->name_teh ?></td>
                            <td class="danger"><?= $row->mark ?></td>
                            <td class="danger"><?= $row->vid ?></td>
                            <td class="danger"><?= $row->v ?></td>
                            <td class="danger"><?= $row->calculation ?></td>
                            <td class="danger"><?= $row->type_name ?></td>
                             <td class="danger"><?= $row->numbsign ?></td>
                            <?php
                        } elseif ($row->state == 5) {
                            ?>
                            <td class="info"><?= $row->name_teh ?></td>
                            <td class="info"><?= $row->mark ?></td>
                            <td class="info"><?= $row->vid ?></td>
                            <td class="info"><?= $row->v ?></td>
                            <td class="info"><?= $row->calculation ?></td>
                            <td class="info"><?= $row->type_name ?></td>
                             <td class="info"><?= $row->numbsign ?></td>
                            <?php
                        } else {
                            ?>
                            <td class="success"><?= $row->name_teh ?></td>
                            <td class="success"><?= $row->mark ?></td>
                             <td class="success"><?= $row->vid ?></td>
                            <td class="success"><?= $row->v ?></td>
                            <td class="success"><?= $row->calculation ?></td>
                            <td class="success"><?= $row->type_name ?></td>
                             <td class="success"><?= $row->numbsign ?></td>
                            <?php
                        }

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
                            ?>


                            <td rowspan="<?= $x ?>" class="noprint">
                                <?php
                                if (isset($mis) && (!empty($mis))) {
                                    foreach ($mis as $ms) {
                                        if ($ms->id_record == $row->id_record) {
                                            echo '<b>' . $ms->namelev . ': ' . '</b>' . $ms->descript . '<br>';
                                        }
                                    }
                                }
                                ?>
                            </td>
                            <?php
                            if (($levelId == 1) && ($roleId == 3)) {//РЦУ admin
                                ?>

                                <td rowspan="<?= $x ?>" class="noprint"><a href='/ss/edit/record/<?= $row->id_record ?>' target="_blank"> <span class='glyphicon glyphicon-pencil'></span></a></td>
                                <td rowspan="<?= $x ?>" class="noprint"><a href='/ss/remove/<?= $row->id_record ?>' target="_blank"> <span class='glyphicon glyphicon-trash'></span></a></td>
                                        <?php
                                    }
                                }
                                ?>
                    </tr>
                    <?php
                }
            }
            ?>

            <?php
        }
        ?>
    </table>
</div>

