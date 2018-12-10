<!-- tab1 -->

<div class="table-responsive" id="conttabl">
    <table class="table table-condensed   table-bordered table-hover" id="countorg" >
        <!--   строка 1 -->
        <thead>
            <tr >
                <th rowspan="3">Управление</th>
                <th colspan="6">Отдел по ЧС</th>
                <th rowspan="3">Всего</th>
                <th colspan="4">Отряды</th>
                <th rowspan="3">Всего</th>
            </tr>
            <!-- строка 2 -->
            <tr>
                <th colspan="2">ГОЧС</th>
                <th colspan="2">ГРОЧС</th>
                <th colspan="2">РОЧС</th>
                <th colspan="2">ПАСО</th>
                <th colspan="2">ПАСО(объекта)</th>

            </tr>

            <tr>
                <!-- строка 3 -->

                <th>кол-во</th>
                <th>наим.</th>
                <th>кол-во</th>
                <th>наим.</th>
                <th>кол-во</th>
                <th>наим.</th>
                <th>кол-во</th>
                <th>наим.</th>
                <th>кол-во</th>
                <th>наим.</th>

            </tr>
        </thead>


        <tbody>
            <?php
            foreach ($result as $row) {

                if ($row->regid == NULL) {
                    ?>
                    <tr class="success">
                        <?php
                    } else {
                        ?>
                    <tr>
                        <?php
                    }
                    ?>

                    <?php
                    if ($row->regid == NULL) {
                        ?>
                        <td class="success">По республике</td>
                        <?php
                    } else {
                        ?>
                        <td><?= $row->region ?></td>
                        <?php
                    }
                    if ($row->regid == NULL) {
                        ?>
                        <td>
                            <?php
                        } else {
                            ?>
                        <td class="info">
                            <?php
                        }
                        ?>

                        <?= $row->pp1 ?></td>
                    <td>
                        <?php
                        // name organs
                        foreach ($orgname as $myrow) {
                            if (($myrow->regid == $row->regid) && ($myrow->orgid == 1)) //rochs
                                echo $myrow->loc . '<br>';
                        }
                        ?>
                    </td>
                    <?php
                    if ($row->regid == NULL) {
                        ?>
                        <td>
                            <?php
                        } else {
                            ?>
                        <td class="info">
                            <?php
                        }
                        ?>
                        <?= $row->pp2 ?></td>
                    <td>
                        <?php
                        // name organs
                        foreach ($orgname as $myrow) {
                            if (($myrow->regid == $row->regid) && ($myrow->orgid == 3)) //grochs
                                echo $myrow->loc . '<br>';
                        }
                        ?>
                    </td>
                    <?php
                    if ($row->regid == NULL) {
                        ?>
                        <td>
                            <?php
                        } else {
                            ?>
                        <td class="info">
                            <?php
                        }
                        ?>
                        <?= $row->pp3 ?></td>
                    <td>   </td>
                    <?php
                    if ($row->regid == NULL) {
                        ?>
                        <td>
                            <?php
                        } else {
                            ?>
                        <td class="success">
                            <?php
                        }
                        ?>
                        <?= $row->pp4 ?></td>

                    <?php
                    if ($row->regid == NULL) {
                        ?>
                        <td>
                            <?php
                        } else {
                            ?>
                        <td class="info">
                            <?php
                        }
                        ?>
                        <?= $row->pp5 ?></td>
                    <td>
                        <?php
                        // name organs
                        foreach ($orgname as $myrow) {
                            if (($myrow->regid == $row->regid) && ($myrow->orgid == 6)) //paso
                                echo $myrow->loc . '<br>';
                        }
                        ?>
                    </td>

                    <?php
                    if ($row->regid == NULL) {
                        ?>
                        <td>
                            <?php
                        } else {
                            ?>
                        <td class="info">
                            <?php
                        }
                        ?>
                        <?= $row->pp6 ?></td>
                    <td>
                        <?php
                        // name organs
                        foreach ($orgname as $myrow) {
                            if (($myrow->regid == $row->regid) && ($myrow->orgid == 7)) //paso object
                                echo $myrow->loc . '<br>';
                        }
                        ?>
                    </td>

                    <?php
                    if ($row->regid == NULL) {
                        ?>
                        <td>
                            <?php
                        } else {
                            ?>
                        <td class="success">
                            <?php
                        }
                        ?>
                        <?= $row->pp7 ?></td>

                </tr>
                <?php
            }
            ?>
        </tbody>

    </table>

</div>


<!--<div class="table-responsive" >
    <table class="table table-condensed   table-bordered table-hover" >
        <thead>
            <tr><th>РОСН</th></tr>
        </thead>
        <tbody>
<?php
/*
  foreach ($rosn as $row) {
  ?>
  <tr>
  <td><?= $row->name ?></td>
  </tr>
  <?php
  } */
?>


        </tbody>
    </table>
</div>-->


</div>  <!-- end tab1 -->

