<div class="tabbable">
    <ul class="nav nav-tabs noprint" id="tabs">
        <!-- <li class="active"><a href="#tab1" data-toggle="tab">Информация<br>по карточкам</a></li>
         <li><a href="/ss/card/rb">Карточка<br>по республике</a></li>-->
        <li ><a href="/ss/" >Общие<br>сведения</a></li>
        <li class="active"><a href="/ss/pages">Информация<br>по карточкам</a></li>
        <li><a href="/ss/card/rb">Карточка<br>по республике</a></li>
    </ul>
    <div class="tab-content">


        <!-- -----------------------------------Информация по карточкам----------------------------------------->
        <div class="tab-pane active" id="tab1">

		<!--конец-->
            <div class="table-responsive" id="conttabl">
                <table id="tbl" class="table table-condensed   table-bordered table-hover" >
                    <thead>
                        <tr>
                            <th>Управление</th>
                            <th>Карточка<br>области</th>
                            <th>Наименование<br>органа</th>
                            <th>Описание</th>
                            <th>Текущий<br>статус</th>
                            <th>Последние<br>действия</th>
                            <th>Ответственный<br>в РЦУРЧС</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Управление</th>
                            <th></th>
                            <th>Наименование органа</th>
                            <th>Описание</th>
                            <th>Текущий<br>статус</th>
                            <th>Последние действия</th>
                            <th>Ответственный<br>в РЦУРЧС</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php
                        foreach ($main as $row) {
                            if ($row->st == NULL) {
                                ?>
                                <tr class="notok">
                                    <?php
                                } elseif (($row->st == 0) || ($row->st == 2)) {//у рук либо в УМЧС
                                    ?>
                                <tr class="warning">
                                    <?php
                                } elseif ($row->st == 1) {//в РЦУ
                                    ?>
                                <tr class="info">
                                    <?php
                                } elseif ($row->st == 3) {//отклонена
                                    ?>
                                <tr class="danger">
                                    <?php
                                } else {
                                    ?>
                                <tr class="success">
                                    <?php
                                }
                                ?>

                                <td><?= $row->head ?></td>
                                <?php
                                
                                if (($row->orgid == 8)|| ($row->orgid == 9)|| ($row->orgid == 10)|| ($row->orgid == 11)|| ($row->orgid == 12)) {//кроме РОСН, УГЗ, ИППК,ГИИ, Авиация
                             ?>
                                    <td></td>
                                <?php        
                                }
                                else{
                                         $k = 0;
                                    foreach ($main as $my) {//можно ли просмотреть карточку по области
                                        if (($my->st != NULL) && ($row->region == $my->region))
                                            $k++;
                                    }

                                    if ($k != 0) {//можно просмотреть карточку по области, т.к. есть заполненные карточки
                                        ?>
                                        <td><button type="button" class="btn-default"><a href="/ss/card/<?= $row->region ?>" target="_blank"> <span class='glyphicon glyphicon-th-list' data-toggle="tooltip" data-placement="left" title="Просмотреть"></span></a></button></td>
                                                    <?php
                                                } else {//нельзя
                                                    ?>
                                        <td></td>
                                        <?php
                                    }
                                }
                            
                                if ($row->st != NULL) {//ссылка на карточку р-на, если она заполнена
                                    ?>
                                    <td><a href="/ss/card/<?= $row->region ?>/<?= $row->id_card ?>" target="_blank">
                                            <?php
                                          
                                               echo $row->organ;  
                                          
                                            ?>
                                            </a></td>
                                    <?php
                                } else {
                                    ?>
                                    <td><?= $row->organ ?></td>
                                    <?php
                                }
                                ?>



                                <?php
                                /*
                                  foreach ($c as $key => $value) {//количество подразделений органа
                                  if ($row->idCard == $key) {
                                  // echo $key . '=';
                                  foreach ($value as $key => $val) {
                                  echo $key . ':' . $val . '<br>';
                                  }
                                  }
                                  } */

                                if ($row->st == 3) {//отклонена
                                    // $d = 0;
                                    foreach ($whorefuse as $my) {
                                        if ($my->id_card == $row->id_card) {
                                            // $d++;
                                            ?>
                                            <td><?= $row->statuss . $my->who ?></td>
                                            <?php
                                            break;
                                        }
                                    }
                                } else {
                                    ?>
                                    <td><?= $row->statuss ?></td>
                                    <?php
                                }
                                ?>



                                <td><?= $row->workk ?></td>
                                <td>
                                    <?php
                                    $r = 0;
                                    foreach ($dat as $key => $value) {//дата последнего действия
                                        if ($row->id_card == $key) {
                                            echo $value;
                                            $r++;
                                        }
                                    }
                                    if ($r == 0)
                                        echo 'информация отсутствует';
                                    ?>
                                </td>
                                <td><?= $row->fio ?></td>

                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
