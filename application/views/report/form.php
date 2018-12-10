<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container">
    <div class="form-group">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="button" id="collapseButtonReport" class="btn col-lg-12 col-md-12 col-sm-12 col-xs-12" name="send" data-toggle="collapse" data-target="#collapseF"><span class="glyphicon glyphicon-menu-down" data-toggle="tooltip" data-placement="left" title="Развернуть/Свернуть"></span></button><br>
        </div>
    </div>

    <div id="collapseF" class="panel-collapse in collapse">
        <div class="col-lg-12">
            <form class="form-horizontal" role="form" id="report" method="POST" action="/ss/report#result_page">

                <div class="row col-lg-offset-1">
                    <div class="row col-lg-5" id="reportblock1">

                        <!-- Область  -->
                        <div class="row">
                            <label class="control-label col-sm-4 col-lg-4 col-xs-4" for="region">Область</label>
                            <div class="col-sm-3 col-lg-3 col-md-3 col-xs-4">
                                <div class="form-group">
                                    <select class="form-control" name="region" id="reg">
                                        <option value="">все</option>
                                        <?php
                                        /* if(isset($region)&& !empty($region)){//не очищать форму
                                          foreach ($regions as $row) {
                                          if($region == $row->id)
                                          printf("<p><option value='%s' selected><label>%s</label></option></p>", $row->id, $row->name);
                                          else
                                          printf("<p><option value='%s' ><label>%s</label></option></p>", $row->id, $row->name);
                                          }
                                          } */
                                        foreach ($regions as $row) {
                                            if (isset($region) && !empty($region) && ($region == $row->id)) {//не очищать форму
                                                printf("<p><option value='%s' selected><label>%s</label></option></p>", $row->id, $row->name);
                                            } else
                                                printf("<p><option value='%s' ><label>%s</label></option></p>", $row->id, $row->name);
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="control-label col-sm-4 col-lg-4 col-xs-4" for="local">Район</label>
                            <div class="col-sm-3 col-lg-3 col-md-3 col-xs-4">
                                <div class="form-group">
                                    <select class="form-control" name="local" id="loc" >
                                        <option value="">все</option>
                                        <?php
                                        foreach ($locals as $row) {
                                            if (isset($local) && !empty($local) && ($local == $row->id)) {//не очищать форму
                                                printf("<p><option value='%s' class='%s' selected><label>%s</label></option></p>", $row->id, $row->id_region, $row->name);
                                            } else
                                                printf("<p><option value='%s' class='%s'><label>%s</label></option></p>", $row->id, $row->id_region, $row->name);
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- конец область  -->

                        <div class="row">
                            <label class="control-label col-sm-4 col-lg-4 col-xs-4"  for="org">Орган</label>
                            <div class="col-sm-3 col-lg-3 col-md-3 col-xs-4">
                                <div class="form-group">
                                    <select class="form-control" name="org" id="org">
                                        <option value="">все</option>
                                        <?php
                                        foreach ($organs as $row) {
                                            if (isset($organ) && !empty($organ) && ($organ == $row->id)) {//не очищать форму
                                                printf("<p><option value='%s' selected><label>%s %s</label></option></p>", $row->id, $row->name, $row->t);
                                            } else
                                                printf("<p><option value='%s'><label>%s %s</label></option></p>", $row->id, $row->name, $row->t);
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <label class="control-label col-sm-4 col-lg-4 col-xs-4" for="divizionName">Подразделение</label>
                            <div class="col-sm-3 col-lg-3 col-md-3 col-xs-4">
                                <div class="form-group">
                                    <select class="form-control" name="divizionName">
                                        <option value="">все</option>
                                        <?php
                                        foreach ($divizions as $row) {
                                            if (isset($divizionName) && !empty($divizionName) && ($divizionName == $row->id)) {//не очищать форму
                                                printf("<p><option value='%s' selected ><label>%s</label></option></p>", $row->id, $row->name);
                                            }
                                            printf("<p><option value='%s' ><label>%s</label></option></p>", $row->id, $row->name);
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="row col-lg-7" id="reportblock2">
                        <!-- Штатная численность-->
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-5 col-lg-6 col-xs-7 col-lg-offset-1 col-md-5 col-sm-offset-1 col-xs-offset-1">
                                    <p id="part">Штатная численность:</p>

                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <label class="control-label col-sm-4 col-lg-3 col-xs-6" for="countDiv">подразделения</label>
                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countDivmin) && !empty($countDivmin)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countDivmin" placeholder="от" name="countDivmin" value="<?= $countDivmin ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countDivmin" placeholder="от" name="countDivmin">
                                        <?php
                                    }
                                    ?>

                                </div>

                            </div>

                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countDivmax) && !empty($countDivmax)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countDivmax" placeholder="до" name="countDivmax" value="<?= $countDivmax ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countDivmax" placeholder="до" name="countDivmax">
                                        <?php
                                    }
                                    ?>

                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-sm-4 col-lg-3 col-xs-7 col-xs-offset-1">Число л/с дежурной смены</label>
                            </div>
                        </div>

                        <div class="row">

                            <label class="control-label col-sm-4 col-lg-3 col-xs-6" for="countChange1">1см.</label>
                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countChange1min) && !empty($countChange1min)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countChange1min" placeholder="от" name="countChange1min" value="<?= $countChange1min ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countChange1min" placeholder="от" name="countChange1min">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countChange1max) && !empty($countChange1max)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countChange1max" placeholder="до" name="countChange1max" value="<?= $countChange1max ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countChange1max" placeholder="до" name="countChange1max">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <label class="control-label col-sm-1 col-lg-1 col-xs-6 col-md-1" for="countChange2">2см.</label>
                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countChange2min) && !empty($countChange2min)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countChange2min" placeholder="от" name="countChange2min" value="<?= $countChange2min ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countChange2min" placeholder="от" name="countChange2min">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countChange2max) && !empty($countChange2max)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countChange2max" placeholder="до" name="countChange2max" value="<?= $countChange2max ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countChange2max" placeholder="до" name="countChange2max">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>


                            <label class="control-label col-sm-1 col-lg-1 col-xs-6 col-md-1" for="countChange3">3см.</label>
                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countChange3min) && !empty($countChange3min)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countChange3min" placeholder="от" name="countChange3min" value="<?= $countChange3min ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countChange3min" placeholder="от" name="countChange3min">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countChange3max) && !empty($countChange3max)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countChange3max" placeholder="до" name="countChange3max" value="<?= $countChange3max ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countChange3max" placeholder="до" name="countChange3max">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                        <!-- Число водителей-->
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-sm-4 col-lg-4 col-xs-7 col-xs-offset-1">Количество водителей</label>
                            </div>
                        </div>
                        <div class="row">

                            <label class="control-label col-sm-4 col-lg-3 col-xs-6" for="countDriverAll">всего</label>
                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countDriverAllmin) && !empty($countDriverAllmin)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countDriverAllmin" placeholder="от" name="countDriverAllmin" value="<?= $countDriverAllmin ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countDriverAllmin" placeholder="от" name="countDriverAllmin">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countDriverAllmax) && !empty($countDriverAllmax)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countDriverAllmax" placeholder="до" name="countDriverAllmax" value="<?= $countDriverAllmax ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countDriverAllmax" placeholder="до" name="countDriverAllmax">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <label class="control-label col-sm-1 col-lg-2 col-md-1 col-xs-6" for="countDriverChange">в см.</label>
                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countDriverChangemin) && !empty($countDriverChangemin)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countDriverChangemin" placeholder="от" name="countDriverChangemin" value="<?= $countDriverChangemin ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countDriverChangemin" placeholder="от" name="countDriverChangemin">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countDriverChangemax) && !empty($countDriverChangemax)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countDriverChangemax" placeholder="до" name="countDriverChangemax" value="<?= $countDriverChangemax ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countDriverChangemax" placeholder="до" name="countDriverChangemax">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                        <!-- Число диспетчеров-->
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-sm-5 col-lg-4 col-xs-7 col-xs-offset-1" >Количество диспетчеров, радиотелефонистов</label>
                            </div>
                        </div>
                        <div class="row">

                            <label class="control-label col-sm-4 col-lg-3 col-xs-6 " for="countDispAll">всего</label>
                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countDispAllmin) && !empty($countDispAllmin)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countDispAllmin" placeholder="от" name="countDispAllmin" value="<?= $countDispAllmin ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countDispAllmin" placeholder="от" name="countDispAllmin">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countDispAllmax) && !empty($countDispAllmax)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countDispAllmax" placeholder="до" name="countDispAllmax" value="<?= $countDispAllmax ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countDispAllmax" placeholder="до" name="countDispAllmax">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <label class="control-label col-sm-1 col-lg-2 col-md-1 col-xs-6" for="countDispChange">в см.</label>
                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countDispChangemin) && !empty($countDispChangemin)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countDispChangemin" placeholder="от" name="countDispChangemin" value="<?= $countDispChangemin ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countDispChangemin" placeholder="от" name="countDispChangemin">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                                <div class="form-group">
                                    <?php
                                    if (isset($countDispChangemax) && !empty($countDispChangemax)) {//не очищать форму
                                        ?>
                                        <input type="text" class="form-control" id="countDispChangemax" placeholder="до" name="countDispChangemax" value="<?= $countDispChangemax ?>">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="text" class="form-control" id="countDispChangemax" placeholder="до" name="countDispChangemax">
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <hr>

                <div id="reportblock3">
                    <!-- Техника-->
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-2 col-lg-6 col-xs-7 col-lg-offset-1 col-md-5 col-sm-offset-1 col-xs-offset-1">

                                <p id="part">Техника:</p>
                            </div>
                        </div>
                    </div>
                    <?php ?>
                    <div class="row">
                        <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="technicName">Наименование</label>
                        <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                            <div class="form-group">

                                <select class="form-control chosen-select-deselect " name="technicName" id="technicName" tabindex="2" data-placeholder="вся техника">
                                    <option></option>
                                    <?php
                                    foreach ($views as $row) {
                                        if (isset($technicName) && !empty($technicName) && ($technicName == $row->id)) {//не очищать форму
                                            printf("<p><option value='%s' selected ><label>%s(%s)</label></option></p>", $row->id, $row->name, $row->description);
                                        } else
                                            printf("<p><option value='%s' ><label>%s(%s)</label></option></p>", $row->id, $row->name, $row->description);
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="mark">Марка</label>
                        <div class="col-sm-6 col-lg-2 col-md-6 col-xs-7">
                            <div class="form-group">
                                <?php
                                if (isset($mark) && !empty($mark)) {//не очищать форму
                                    ?>
                                    <input type="text" class="form-control" id="mark" name="mark" placeholder="Марка"  data-toggle="tooltip" data-placement="left" title="Русск/англ. заглавные буквы - , ( )"  value="<?= $mark ?>">
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" class="form-control" id="mark" name="mark" placeholder="Марка"  data-toggle="tooltip" data-placement="left" title="Русск/англ. заглавные буквы - , ( )" >
                                    <?php
                                }
                                ?>

                            </div>
                        </div>


                        <label class="control-label col-sm-4 col-lg-1 col-xs-4" for="v">Объем цистерны,л</label>
                        <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                            <div class="form-group">
                                <?php
                                if (isset($vmin) && !empty($vmin)) {//не очищать форму
                                    ?>
                                    <input type="text" class="form-control" id="vmin" placeholder="от" name="vmin" value="<?= $vmin ?>">
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" class="form-control" id="vmin" placeholder="от" name="vmin">
                                    <?php
                                }
                                ?>

                            </div>
                        </div>

                        <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                            <div class="form-group">
                                <?php
                                if (isset($vmax) && !empty($vmax)) {//не очищать форму
                                    ?>
                                    <input type="text" class="form-control" id="vmax" placeholder="до" name="vmax" value="<?= $vmax ?>">
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" class="form-control" id="vmax" placeholder="до" name="vmax">
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="control-label col-sm-4 col-lg-3 col-xs-4"  for="type">Тип</label>
                        <div class="col-sm-2 col-lg-2 col-md-2 col-xs-7">

                            <div class="form-group">
                                <select class="form-control" name="type" id="type" >
                                    <option></option>
                                    <?php
                                    foreach ($types as $row) {
                                        if (isset($type) && !empty($type) && ($type == $row->id)) {//не очищать форму
                                            printf("<p><option value='%s' selected ><label>%s</label></option></p>", $row->id, $row->name);
                                        }
                                        printf("<p><option value='%s' ><label>%s</label></option></p>", $row->id, $row->name);
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>

                        <label class="control-label col-sm-2 col-lg-1 col-xs-4 col-md-2" for="calculation">Мин.б.р.</label>
                        <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                            <div class="form-group">
                                <?php
                                if (isset($calculationmin) && !empty($calculationmin)) {//не очищать форму
                                    ?>
                                    <input type="text" class="form-control" id="calculationmin" placeholder="от" name="calculationmin" value="<?= $calculationmin ?>">
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" class="form-control" id="calculationmin" placeholder="от" name="calculationmin" >
                                    <?php
                                }
                                ?>

                            </div>
                        </div>

                        <div class="col-sm-1 col-lg-1 col-md-1 col-xs-2">
                            <div class="form-group">
                                <?php
                                if (isset($calculationmax) && !empty($calculationmax)) {//не очищать форму
                                    ?>
                                    <input type="text" class="form-control" id="calculationmax" placeholder="до" name="calculationmax" value="<?= $calculationmax ?>">
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" class="form-control" id="calculationmax" placeholder="до" name="calculationmax" >
                                    <?php
                                }
                                ?>

                            </div>
                        </div>

                    </div>


                </div>


                <br>





                <div class="row">

                    <div class="form-group">

                        <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-3">
                            <button type="submit" class="btn btn-success" name="onScreen">Сформировать отчет</button>
                            <button type="submit" class="btn btn-warning" name="exportToExcel">Экспорт в Excel</button>
                        </div>
                    </div>


                </div>



            </form>
        </div>

    </div>

</div>
