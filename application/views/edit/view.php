<?php
if (empty($status)) {//если карточка заполнена, но не отправлена на подпись(1 раз), нет записи статуса
    ?>
    <div class="table-responsive" id="conttabl">
        <table class="table table-condensed   table-bordered" >
            <!-- строка 1 -->
            <thead>
                <tr >
                    <th rowspan="3">Наименование подразделения,<br>место дислокации</th>
                    <th colspan="2">Географические координаты,<br>подразделения</th>
                    <th colspan="8">Штатная численность</th>
                    <th colspan="6">Техника</th>
                    <th rowspan="3">Телефон<br>ЦОУ</th>
                    <th rowspan="3">В какие нас.пункты р-на,<br>сеседних районов<br>привлекается на тушение<br>(район выезда)</th>

                    <th rowspan="3">Ред.</th>
                    <th rowspan="3">Уд.</th>

                </tr>
                <!-- строка 2 -->
                <tr>
                    <th rowspan="2">Широта</th>
                    <th rowspan="2">Долгота</th>
                    <th rowspan="2">Под-<br>разде-<br>ления</th>
                    <th colspan="3">Число л/с дежурной<br>смены</th>
                    <th colspan="2">Количество<br>водителей</th>
                    <th colspan="2">Количество<br>диспетчеров</th>
                    <th rowspan="2">Наименование</th>
                    <th rowspan="2">Марка</th>
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
                            <tr>
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

                                                            if($row->longitude >= $row->latitude ){//долгота д.б. <= широта
    ?>
                                    <td rowspan="<?= $x ?>" style="background-color: red">
                                     <span class='glyphicon glyphicon-exclamation-sign' data-toggle="tooltip" data-placement="left" title="Долгота не может быть больше, чем широта"></span>
                                    <?php
                                    }
                                    else{
                                        ?>
                                          <td rowspan="<?= $x ?>">
                                         <?php
                                    }
                                ?>



                                <?= $row->latitude ?>

                            </td>

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
                            ?>

                            <td class="notok"><?= $row->name_teh ?></td>
                            <td class="notok"><?= $row->mark ?></td>
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
                                ?>

                                <td rowspan="<?= $x ?>"><a href='/ss/edit/record/<?= $row->id_record ?>' > <span class='glyphicon glyphicon-pencil'></span></a></td>
                                <td rowspan="<?= $x ?>"><a href='/ss/remove/<?= $row->id_record ?>' > <span class='glyphicon glyphicon-trash'></span></a></td>

                                <?php
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
    <?php
}

foreach ($status as $row) {

    //редактирование доступно
    if ((($row->status) == 0) || (($row->status == 2) && ($row->work == 0)) || (($row->status == 3) && ($row->work == 1)) || ($row->status == 4) || (($row->status == 1) && ($row->work == 0))) {
        ?>
        <div class="table" id="conttabl">
            <table class="table table-condensed   table-bordered" >
                <!-- строка 1 -->
                <thead>
                    <tr >
                        <th rowspan="3">Наименование подразделения,<br>место дислокации</th>
                        <th colspan="2">Географические координаты,<br>подразделения</th>
                        <th colspan="8">Штатная численность</th>
                        <th colspan="6">Техника</th>
                        <th rowspan="3">Телефон<br>ЦОУ</th>
                        <th rowspan="3">В какие нас.пункты района,<br>сеседних районов<br>привлекается на тушение<br>(район выезда)</th>
                        <th rowspan="3">Недочеты</th>
                        <th  class="editth" rowspan="3">Ред.</th>
                        <th class="deleteth"  rowspan="3">Уд.</th>


                    </tr>
                    <!-- строка 2 -->
                    <tr>
                        <th rowspan="2">Широта</th>
                        <th rowspan="2">Долгота</th>
                        <th rowspan="2">Под-<br>разде-<br>ления</th>
                        <th colspan="3">Число л/с дежурной<br>смены</th>
                        <th colspan="2">Количество<br>водителей</th>
                        <th colspan="2">Количество<br>диспетчеров</th>
                        <th rowspan="2">Наименование</th>
                        <th rowspan="2">Марка</th>
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

                                if ($row->longitude >= $row->latitude) {//долгота д.б. <= широта
                                    ?>
                                    <td rowspan="<?= $x ?>" style="background-color: red">
                                        <span class='glyphicon glyphicon-exclamation-sign' data-toggle="tooltip" data-placement="left" title="Долгота не может быть больше, чем широта"></span>
                                        <?php
                                    } else {
                                        ?>
                                    <td rowspan="<?= $x ?>">
                                        <?php
                                    }
                                    ?>


                    <?= $row->latitude ?>

                                </td>
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
                                    <td class="notok"><?= $row->v ?></td>
                                    <td class="notok"><?= $row->calculation ?></td>
                                    <td class="notok"><?= $row->type_name ?></td>
                                    <?php
                                    if(empty($row->numbsign)){
                                      ?>
                                    <td style="background-color:red">
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <td class="notok">
                                        <?php
                                    }
                                    ?>
                                    <?= $row->numbsign ?></td>
                        <?php
                    } elseif ($row->state == 2) {
                        ?>
                                    <td class="warning"><?= $row->name_teh ?></td>
                                    <td class="warning"><?= $row->mark ?></td>
                                    <td class="warning"><?= $row->v ?></td>
                                    <td class="warning"><?= $row->calculation ?></td>
                                    <td class="warning"><?= $row->type_name ?></td>
                                                                        <?php
                                    if(empty($row->numbsign)){
                                      ?>
                                    <td style="background-color:red">
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <td class="warning">
                                        <?php
                                    }
                                    ?>
                                    <?= $row->numbsign ?></td>
                        <?php
                    } elseif ($row->state == 3) {
                        ?>
                                    <td class="newrec"><?= $row->name_teh ?></td>
                                    <td class="newrec"><?= $row->mark ?></td>
                                    <td class="newrec"><?= $row->v ?></td>
                                    <td class="newrec"><?= $row->calculation ?></td>
                                    <td class="newrec"><?= $row->type_name ?></td>
                                                                        <?php
                                    if(empty($row->numbsign)){
                                      ?>
                                    <td style="background-color:red">
                                    <?php
                                    }
                                    else{
                                        ?>
                                        <td class="newrec">
                                        <?php
                                    }
                                    ?>
                                    <?= $row->numbsign ?></td>
                        <?php
                    } elseif ($row->state == 4) {
                        ?>
                                    <td class="danger"><?= $row->name_teh ?></td>
                                    <td class="danger"><?= $row->mark ?></td>
                                    <td class="danger"><?= $row->v ?></td>
                                    <td class="danger"><?= $row->calculation ?></td>
                                    <td class="danger"><?= $row->type_name ?></td>
                                    <td class="danger"><?= $row->numbsign ?></td>
                        <?php
                    } elseif ($row->state == 5) {
                        ?>
                                    <td class="info"><?= $row->name_teh ?></td>
                                    <td class="info"><?= $row->mark ?></td>
                                    <td class="info"><?= $row->v ?></td>
                                    <td class="info"><?= $row->calculation ?></td>
                                    <td class="info"><?= $row->type_name ?></td>
                                    <td class="info"><?= $row->numbsign ?></td>
                        <?php
                    } else {
                        ?>
                                    <td class="success"><?= $row->name_teh ?></td>
                                    <td class="success"><?= $row->mark ?></td>
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

                                    <td rowspan="<?= $x ?>">
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
                                   <!-- <td rowspan="<?= $x ?>"><?= $row->mistake ?></td>-->

                                    <td class="editth"  rowspan="<?= $x ?>"><a href='/ss/edit/record/<?= $row->id_record ?>' > <span class='glyphicon glyphicon-pencil'></span></a></td>
                                    <td class="deleteth" rowspan="<?= $x ?>"><a href='/ss/remove/<?= $row->id_record ?>' > <span class='glyphicon glyphicon-trash'></span></a></td>

                        <?php
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
        <?php
    }
    //редактирование недоступно
    elseif (($row->status == 3) && ($row->work == 0)) {
        ?>
        <br><br>

        <div class="container">
            <div class="col-lg-12">

                <form class="form-horizontal" role="form" id="fill" method="POST" action="/ss/edit/work/">

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-5">
                                <button type="submit" class="btn btn-primary" name="work">Взять в работу</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="container">
            <div class="alert alert-warning">

                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Внимание!</strong> Карточка находится в работе. Редактирование недоступно.
            </div>
        </div>
        <?php
    }
}
?>


