<?php ?>
<div class="container">
    <div class="col-lg-12 col-lg-offset-1">
         <br>
        <i> <b><u>Условия выборки:</u></b></i>
        <br>
        <div class="col-lg-3">
            <div class="row">

                <br>
                <i>
                <?php
                /*
                  $k = 0;
                  foreach ($report as $row) {
                  $k++;
                  if (isset($region) && !empty($region)) {
                  ?>
                  <br> Область:  <?= $row->regionn ?>
                  <?php
                  }
                  if (isset($local) && !empty($local)) {
                  ?>
                  <br> Район:  <?= $row->local_name ?>
                  <?php
                  }
                  if (isset($organ) && !empty($organ)) {
                  ?>
                  <br> Орган:  <?= $row->organ_name ?>
                  <?php
                  }
                  if (isset($divizionName) && !empty($divizionName)) {
                  ?>
                  <br> Район:  <?= $row->divizion_name ?>
                  <?php
                  }

                  if ($k == 1)
                  break;
                  }
                 */
                if (isset($ob) && !empty($ob)) {
                    foreach ($ob as $row) {
                        ?>
                        <br> Область:  <?= $row->name ?>
                        <?php
                    }
                } else
                    echo 'Область: все';
                if (isset($lo) && !empty($lo)) {
                    foreach ($lo as $row) {
                        ?>
                        <br> Район:  <?= $row->name ?>
                        <?php
                    }
                } else
                    echo '<br> Район: все';
                if (isset($or) && !empty($or)) {
                    foreach ($or as $row) {
                        ?>
                        <br> Орган:  <?= $row->name ?> <?= $row->t ?>
                        <?php
                    }
                } else
                    echo ' <br> Орган: все';
                if (isset($di) && !empty($di)) {
                    foreach ($di as $row) {
                        ?>
                        <br> Подразделение:  <?= $row->name ?>
                        <?php
                    }
                } else
                    echo '<br> Подразделение: все';
                ?>
                </i>
            </div>
        </div>
        <!--  Штатная численность  -->
        <?php
        if (!empty($countDivmin) || !empty($countDivmax) || !empty($countChange1min) || !empty($countChange1max) || !empty($countChange2min) ||
                !empty($countChange2max) || !empty($countChange3min) || !empty($countChange3max) || !empty($countDriverAllmin) || !empty($countDriverAllmax) || !empty($countDriverChangemin) || !empty($countDriverChangemax) || !empty($countDispAllmin) || !empty($countDispAllmax) ||
                !empty($countDispChangemin) || !empty($countDispChangemax)) {
            ?>

            <div class="col-lg-5">
                <div class="row">
                    <i>
                    Штатная численность:
                    <br>
                    <?php
                    if (((isset($countDivmin) && !empty($countDivmin)) || (isset($countDivmax) && !empty($countDivmax))) || ((isset($countDivmin) && !empty($countDivmin)) && (isset($countDivmax) && !empty($countDivmax)))) {

                        if (empty($countDivmin))
                            $countDivmin = '-';

                        if (empty($countDivmax))
                            $countDivmax = '-';
                        ?>
                        <br>  подразделения: от <?= $countDivmin ?> до <?= $countDivmax ?>
                        <?php
                    }

                    if (((isset($countChange1min) && !empty($countChange1min)) || (isset($countChange1max) && !empty($countChange1max))) || ((isset($countChange1min) && !empty($countChange1min)) && (isset($countChange1max) && !empty($countChange1max)))) {

                        if (empty($countChange1min))
                            $countChange1min = '-';

                        if (empty($countChange1max))
                            $countChange1max = '-';
                        ?>
                        <br>  Число л/с 1 деж. смены: от <?= $countChange1min ?> до <?= $countChange1max ?>
                        <?php
                    }

                    if (((isset($countChange2min) && !empty($countChange2min)) || (isset($countChange2max) && !empty($countChange2max))) || ((isset($countChange2min) && !empty($countChange2min)) && (isset($countChange2max) && !empty($countChange2max)))) {

                        if (empty($countChange2min))
                            $countChange2min = '-';

                        if (empty($countChange2max))
                            $countChange2max = '-';
                        ?>
                        <br>  Число л/с 2 деж. смены: от <?= $countChange2min ?> до <?= $countChange2max ?>
                        <?php
                    }

                    if (((isset($countChange3min) && !empty($countChange3min)) || (isset($countChange3max) && !empty($countChange3max))) || ((isset($countChange3min) && !empty($countChange3min)) && (isset($countChange3max) && !empty($countChange3max)))) {

                        if (empty($countChange3min))
                            $countChange3min = '-';

                        if (empty($countChange3max))
                            $countChange3max = '-';
                        ?>
                        <br>  Число л/с 3 деж. смены: от <?= $countChange3min ?> до <?= $countChange3max ?>
                        <?php
                    }

                    if (((isset($countDriverAllmin) && !empty($countDriverAllmin)) || (isset($countDriverAllmax) && !empty($countDriverAllmax))) || ((isset($countDriverAllmin) && !empty($countDriverAllmin)) && (isset($countDriverAllmax) && !empty($countDriverAllmax)))) {

                        if (empty($countDriverAllmin))
                            $countDriverAllmin = '-';

                        if (empty($countDriverAllmax))
                            $countDriverAllmax = '-';
                        ?>
                        <br>  Количество водителей всего: от <?= $countDriverAllmin ?> до <?= $countDriverAllmax ?>
                        <?php
                    }

                    if (((isset($countDriverChangemin) && !empty($countDriverChangemin)) || (isset($countDriverChangemax) && !empty($countDriverChangemax))) || ((isset($countDriverChangemin) && !empty($countDriverChangemin)) && (isset($countDriverChangemax) && !empty($countDriverChangemax)))) {

                        if (empty($countDriverChangemin))
                            $countDriverChangemin = '-';

                        if (empty($countDriverChangemax))
                            $countDriverChangemax = '-';
                        ?>
                        <br>  Количество водителей в смене: от <?= $countDriverChangemin ?> до <?= $countDriverChangemax ?>
                        <?php
                    }

                    if (((isset($countDispAllmin) && !empty($countDispAllmin)) || (isset($countDispAllmax) && !empty($countDispAllmax))) || ((isset($countDispAllmin) && !empty($countDispAllmin)) && (isset($countDispAllmax) && !empty($countDispAllmax)))) {

                        if (empty($countDispAllmin))
                            $countDispAllmin = '-';

                        if (empty($countDispAllmax))
                            $countDispAllmax = '-';
                        ?>
                        <br>  Количество диспетчеров, радиотелефонистов всего: от <?= $countDispAllmin ?> до <?= $countDispAllmax ?>
                        <?php
                    }


                    if (((isset($countDispChangemin) && !empty($countDispChangemin)) || (isset($countDispChangemax) && !empty($countDispChangemax))) || ((isset($countDispChangemin) && !empty($countDispChangemin)) && (isset($countDispChangemax) && !empty($countDispChangemax)))) {

                        if (empty($countDispChangemin))
                            $countDispChangemin = '-';

                        if (empty($countDispChangemax))
                            $countDispChangemax = '-';
                        ?>
                        <br>  Количество диспетчеров, радиотелефонистов в смене: от <?= $countDispChangemin ?> до <?= $countDispChangemax ?>
                        <?php
                    }
                    ?>
                    </i>
                </div>
            </div>
            <?php
        }
        ?>

        <!-- Техника  -->
        <?php
        if (!empty($te) || !empty($mark) || !empty($ty) || !empty($vmin) || !empty($vmax) || !empty($calculationmin) || !empty($calculationmax)) {
            ?>
            <div class="col-lg-4">
                <div class="row">
                    <i>
                    Техника:
                    <br>
                    <?php
                    if (isset($te) && !empty($te)) {
                        foreach ($te as $row) {
                            ?>
                            <br> Наименование:  <?= $row->name ?>
                            <?php
                        }
                    } else
                        echo '<br> Наименование: все';


                    if (isset($mark) && !empty($mark)) {

                        if (empty($mark))
                            $mark = '-';

                        if (empty($mark))
                            $mark = '-';
                        ?>
                        <br>  Марка: <?= $mark ?>
                        <?php
                    }

                    if (isset($ty) && !empty($ty)) {
                        foreach ($ty as $row) {
                            ?>
                            <br> Тип:  <?= $row->name ?>
                            <?php
                        }
                    } else
                        echo '<br> Тип: все';

                    if (((isset($vmin) && !empty($vmin)) || (isset($vmax) && !empty($vmax))) || ((isset($vmin) && !empty($vmin)) && (isset($vmax) && !empty($vmax)))) {

                        if (empty($vmin))
                            $vmin = '-';

                        if (empty($vmax))
                            $vmax = '-';
                        ?>
                        <br>  Объем цистерны,л: от <?= $vmin ?> до <?= $vmax ?>
                        <?php
                    }

                    if (((isset($calculationmin) && !empty($calculationmin)) || (isset($calculationmax) && !empty($calculationmax))) || ((isset($calculationmin) && !empty($calculationmin)) && (isset($calculationmax) && !empty($calculationmax)))) {

                        if (empty($calculationmin))
                            $calculationmin = '-';

                        if (empty($calculationmax))
                            $calculationmax = '-';
                        ?>
                        <br>  Мин.боевой расчет: от <?= $calculationmin ?> до <?= $calculationmax ?>
                        <?php
                    }
                    ?>
                    </i>
                </div>
            </div>
            <?php
        }
        ?>
    
    </div>
</div>





