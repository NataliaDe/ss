
<div class="container">
    <div class="alert alert-danger">
        <strong>Внимание!</strong> Удалить выбранную запись из БД?
    </div>
</div>



<div class="table-responsive" id="conttabl">
    <table class="table table-condensed   table-bordered" >
        <!-- строка 1 -->
        <thead>
            <tr >
                <th rowspan="3">Наименование подразделения,<br>место дислокации</th>
                <th colspan="2">Географические координаты,<br>подразделения</th>
                <th colspan="8">Штатная численность</th>
                <th colspan="5">Техника</th>
                <th rowspan="3">Телефон ЦОУ,<br>позывной радиостанции</th>
                <th rowspan="3">В какие нас.пункты р-на,<br>сеседних районов<br>привлекается на тушение<br>(район выезда)</th>



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
        // foreach ($recordkey as $row) {
        //  unset($recKey);
        $x = 0;
        // $recKey = $row->idRecord;

        foreach ($card as $row) {//количество единиц техники
            $x++;
        }


        foreach ($card as $row) {

            //  if ($row->idRecord == $recKey) {
            ?>
            <tr class="notok">
                <?php
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
                // }
            }
            $y = 0;
            foreach ($card as $row) {

                // if ($row->idRecord == $recKey) {
                $y++;
                ?>

                <td class="notok"><?= $row->name_teh ?></td>
                <td class="notok"><?= $row->mark ?></td>
                <td class="notok"><?= $row->v ?></td>
                <td class="notok"><?= $row->calculation ?></td>
                <td class="notok"><?= $row->type_name ?></td>
                <?php
                if ($y == 1) {
                    ?>
                    <td rowspan="<?= $x ?>"><?= $row->phone ?></td>
                    <td rowspan="<?= $x ?>"><?= $row->local_exit ?></td>


                    <?php
                }
                ?>
            </tr>
            <?php
            // }
        }
        ?>

        <?php
        //}
        ?>
    </table>
</div>

<div class="container">
    <div class="col-lg-12">

        <form class="form-horizontal" role="form" id="fill" method="POST" action="/ss/remove/delete/">

            <input type="hidden" class="form-control" id="idRecord" name="idRecord" value="<?= $idRecord ?>" >
            <div class="row">

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-3">
                        <button type="submit" class="btn btn-danger" name="remove">Удалить</button>
                    </div>
                </div>


                </div>


        

        </form>
    </div>
</div>