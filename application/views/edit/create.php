<?php
//$cardId = $this->session->userdata('locorg_id');
//echo 'форма заполнения';
//echo $idCard;
?>

<!-- информация о подразделении-->
<div class="container">
    <div class="col-lg-12">
        <form class="form-horizontal" role="form" id="create" method="POST" action="/ss/edit/create">
            <div class="row">
                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="divizionName">Подразделение</label>
                <div class="col-sm-3 col-lg-2 col-md-3 col-xs-4">
                    <div class="form-group">
                        <select class="form-control" name="divizionName"  id="div_name">
                            <option></option>
                            <?php
                            foreach ($divizions as $row) {
                                printf("<p><option value='%s' ><label>%s</label></option></p>", $row->id, $row->name);
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <?php
                //ПАСО, РОСН, УГЗ,ИППК,ГИИ, Авиация
                if (($this->session->userdata('orgid') != 6) && ($this->session->userdata('orgid') != 8) && ($this->session->userdata('orgid') != 9) && ($this->session->userdata('orgid') != 10) && ($this->session->userdata('orgid') != 11) && ($this->session->userdata('orgid') != 12)) {
                    ?>
                    <label class="control-label col-sm-1 col-lg-1 col-md-1 col-xs-1" for="divizionNum">№</label>
                    <div class="col-sm-2 col-lg-2 col-md-3 col-xs-2">
                        <div class="form-group">
                            <input type="text" class="form-control" id="divizionNum" placeholder="№" name="divizionNum" >
							*если нет номера - ставим 0
                        </div>
                    </div>
                    <?php
                }
                if ($this->session->userdata('orgid') == 8) {// РОСН
                    ?>
                    <label class="control-label col-sm-1 col-lg-1 col-md-1 col-xs-1" for="locrosn">Район</label>
                    <div class="col-sm-2 col-lg-2 col-md-3 col-xs-2">
                        <div class="form-group">
                            <select class="form-control" name="locrosn">
                                <option></option>
                                <?php
                                foreach ($locrosn as $row) {
                                    printf("<p><option value='%s' ><label>%s</label></option></p>", $row->id, $row->name);
                                }
                                ?>

                            </select>

                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>

            <!--cou with slhs-->
            <div class="row" style="display: none;" id="div-cou_with_slhs">
                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="cou_with_slhs"></label>
                <div class="checkbox col-sm-3 col-lg-2 col-md-3 col-xs-4">
                    <div class="form-group">
                        <label><input type="checkbox" name="cou_with_slhs" id="cou_with_slhs" value="1" >ЦОУ с ШЛЧС</label>
                    </div>
                </div>
            </div>

            <div class="row">

                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="disloc">Место дислокации</label>
                <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="disloc" id="disloc"></textarea>
                    </div>
                </div>

            </div>
            <hr>

            <!-- Географические координаты-->
            <!--            <div class="row">
                            <div class="form-group">
                                <div class="col-sm-4 col-lg-6 col-xs-6 col-lg-offset-1 col-md-offset-1">

                                    <p id="part"> Географические координаты:</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="latitude">Широта</label>
                            <div class="col-sm-6 col-lg-2 col-md-3 col-xs-7">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="latitude" placeholder="__.______" name="latitude" >
                                </div>
                            </div>

                            <label class="control-label col-sm-4 col-lg-1 col-md-1 col-xs-4" for="longitude">Долгота</label>
                            <div class="col-sm-6 col-lg-2 col-md-3 col-xs-7">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="longitude" placeholder="__.______" name="longitude">
                                </div>
                            </div>

                        </div>-->



            <!-- Географические координаты-->
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-4 col-lg-6 col-xs-6 col-lg-offset-1 col-md-offset-1">

                        <p id="part"> Географические координаты:</p>
                        <div style="cursor:pointer;color:blue;padding-bottom:5px;" onclick="$('#map').dialog('open');" id="map_for_coord">Выбрать на карте</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="latitude">Широта</label>
                <div class="col-sm-6 col-lg-2 col-md-3 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="__.______" name="latitude" id="coord_lat" >
                    </div>
                </div>

                <label class="control-label col-sm-4 col-lg-1 col-md-1 col-xs-4" for="longitude">Долгота</label>
                <div class="col-sm-6 col-lg-2 col-md-3 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="__.______" name="longitude"  id="coord_lon" >
                    </div>
                </div>

                <!-----------------------------------Диалог с картой---------------------------------->
                <div id="map" title="Изменение координат">
                    <div class="belgis_scale belgis_box" style="display:none;">
                        <img id="belgis_scale_ch" src=""/>
                        <div id="viewCoord"></div>
                    </div>
                    <div id="belgis_main" style="width: 520px; height: 480px;">
                        <div class="belgis_circle" style="display:none;">
                            <a class="belgis_circle_left" href="#" onClick="onClickMove('left');"></a>
                            <a class="belgis_circle_top" href="#" onClick="onClickMove('top');"></a>
                            <a class="belgis_circle_right" href="#" onClick="onClickMove('right');"></a>
                            <a class="belgis_circle_bottom" href="#" onClick="onClickMove('bottom');"></a>
                            <a class="belgis_circle_center" href="#" onClick="onClickMove('center');"><img src="/ss/assets/map_api/images/belarus.png"/></a>
                        </div>
                        <div class="belgis_control_scale" style="display:none;">
                            <div class="belgis_drag" id="belgis_drag"></div>
                            <div class="belgis_maximize" id="belgis_maximize" onClick="onClickDrag('maximize');">+</div>
                            <div class="belgis_drag_line" onClick="onClickMove('drag_line');"></div>
                            <div class="belgis_minimize" id="belgis_minimize" onClick="onClickDrag('minimize');">-</div>
                        </div>
                        <div id="belgis_wait" style="position: absolute; z-index: 100;"><strong><img src="/ss/assets/map_api/images/35-0.gif" /></strong></div>
                        <canvas id="belgis_map" style="position: absolute;">Your browser does not support the HTML5 canvas tag.</canvas>
                        <canvas id="belgis_overlay" style="position: absolute;">Your browser does not support the HTML5 canvas tag.</canvas>
                        <canvas id="belgis_vector" style="position: absolute;">Your browser does not support the HTML5 canvas tag.</canvas>
                        <div id="belgis_bubbles" style="position: absolute;"></div>
                        <div id="belgis_poi" style="position: absolute;"></div>
                    </div>
                </div>
                <!-----------------------------------Диалог с картой---------------------------------->


            </div>


            <hr>


            <!-- Штатная численность-->
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-4 col-lg-6 col-xs-6 col-lg-offset-1 col-md-offset-1">
                        <p id="part">Штатная численность:</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="countDiv">подразделения</label>
                <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control" id="countDiv" placeholder="штатная численность подразделения" name="countDiv">
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-4 col-lg-3 col-xs-7">Число л/с дежурной смены</label>
                </div>
            </div>

            <div class="row">

                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="countChange1">1</label>
                <div class="col-sm-6 col-lg-1 col-md-7 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control" id="countChange1" placeholder="смена 1" name="countChange1">
                    </div>
                </div>

                <label class="control-label col-sm-4 col-lg-1 col-xs-4" for="countChange2">2</label>
                <div class="col-sm-6 col-lg-1 col-md-7 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control" id="countChange2" placeholder="смена 2" name="countChange2">
                    </div>
                </div>

                <label class="control-label col-sm-4 col-lg-1 col-xs-4" for="countChange3">3</label>
                <div class="col-sm-6 col-lg-1 col-md-7 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control" id="countChange3" placeholder="смена 3" name="countChange3">
                    </div>
                </div>
            </div>

            <!-- Число водителей-->
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-4 col-lg-3 col-xs-7">Количество водителей</label>
                </div>
            </div>
            <div class="row">

                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="countDriverAll">всего</label>
                <div class="col-sm-6 col-lg-2 col-md-7 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control" id="countDriverAll" placeholder="всего" name="countDriverAll">
                    </div>
                </div>

                <label class="control-label col-sm-4 col-lg-1 col-md-4 col-xs-4" for="countDriverChange">в смене</label>
                <div class="col-sm-6 col-lg-2 col-md-7 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control" id="countDriverChange" placeholder="в смене" name="countDriverChange">
                    </div>
                </div>
            </div>

            <!-- Число диспетчеров-->
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-4 col-lg-3 col-xs-7">Количество диспетчеров, радиотелефонистов</label>
                </div>
            </div>
            <div class="row">

                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="countDispAll">всего</label>
                <div class="col-sm-6 col-lg-2 col-md-7 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control" id="countDispAll" placeholder="всего" name="countDispAll">
                    </div>
                </div>

                <label class="control-label col-sm-4 col-lg-1 col-md-4 col-xs-4" for="countDispChange">в смене</label>
                <div class="col-sm-6 col-lg-2 col-md-7 col-xs-7">
                    <div class="form-group">
                        <input type="text" class="form-control" id="countDispChange" placeholder="в смене" name="countDispChange">
                    </div>
                </div>

            </div>
            <hr>

            <!-- Техника-->
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-4 col-lg-6 col-xs-6 col-lg-offset-1 col-md-offset-1">

                        <p id="part">Техника:</p>
                    </div>
                </div>
            </div>

            <?php
            for ($i = 0; $i <= 10; $i++) {
                ?>
                <div id="add_field_area">

                    <?php
                    echo $i + 1;
                    ?>
                    <div class="row">
                        <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="technicName">Наименование</label>
                        <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                            <div class="form-group">
                                <select class="form-control chosen-select-deselect" data-placeholder="Выбрать" name="technicName<?= $i ?>" id="technicName<?= $i ?>" onchange="getMark(<?= $i ?>);" onblur="focOnTechnic(<?= $i ?>);" onclick="colorWhite(<?= $i ?>);" onfocus="gh(<?= $i - 1 ?>);">
                                    <option></option>
                                    <?php
                                    foreach ($views as $row) {
                                        printf("<p><option value='%s' ><label>%s(%s)</label></option></p>", $row->id, $row->name, $row->description);
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="mark">Марка</label>
                        <div class="col-sm-6 col-lg-2 col-md-7 col-xs-7">
                            <div class="form-group">
                                <input type="text" class="form-control" id="mark<?= $i ?>" placeholder="Марка" name="mark<?= $i ?>" data-toggle="tooltip" data-placement="left" title="Русск/англ. заглавные буквы - , ( )" onblur="focOnTechnic(<?= $i ?>);">
                            </div>
                        </div>


                        <label class="control-label col-sm-4 col-lg-1 col-xs-4" for="v">Объем цистерны,л</label>
                        <div class="col-sm-6 col-lg-2 col-md-7 col-xs-7">
                            <div class="form-group">
                                <input type="text" class="form-control" id="v<?= $i ?>" placeholder="Объем цистерны" name="v<?= $i ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="control-label col-sm-4 col-lg-3 col-xs-4"  for="type">Тип</label>
                        <div class="col-sm-6 col-lg-2 col-md-7 col-xs-7">

                            <div class="form-group">
                                <select class="form-control" name="type<?= $i ?>" id="type<?= $i ?>" onblur="gh(<?= $i ?>);" onclick="colorWhiteType(<?= $i ?>)">
                                    <option></option>
                                    <?php
                                    foreach ($types as $row) {
                                        printf("<p><option value='%s' ><label>%s</label></option></p>", $row->id, $row->name);
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>

                        <label class="control-label col-sm-4 col-lg-2 col-xs-4" for="calculation">Минимальный боевой расчет</label>
                        <div class="col-sm-6 col-lg-1 col-md-7 col-xs-7">
                            <div class="form-group">
                                <input type="text" class="form-control" id="calculation<?= $i ?>" placeholder="Минимальный боевой расчет" name="calculation<?= $i ?>" >
                            </div>
                        </div>
                    </div>


                </div>


                <hr>
                <?php
            }
            ?>
            <div class="form-group">

                <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-3">
                    <button type="button" class="btn btn-info" name="send" data-toggle="collapse" data-target="#collapseOne">Дополнительные единицы техники</button><br>
                </div>
            </div>

            <div id="collapseOne" class="panel-collapse collapse">
                <?php
                for ($i = 11; $i <= 30; $i++) {
                    ?>
                    <div id="add_field_area">

                        <?php
                        echo $i + 1;
                        ?>
                        <div class="row">
                            <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="technicName">Наименование</label>
                            <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                                <div class="form-group">
                                    <select class="form-control"  name="technicName<?= $i ?>" id="technicName<?= $i ?>" onchange="getMark(<?= $i ?>);" onblur="focOnTechnic(<?= $i ?>);" onclick="colorWhite(<?= $i ?>);"  onfocus="gh(<?= $i - 1 ?>);">
                                        <option></option>
                                        <?php
                                        foreach ($views as $row) {
                                            printf("<p><option value='%s' ><label>%s(%s)</label></option></p>", $row->id, $row->name, $row->description);
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="mark">Марка</label>
                            <div class="col-sm-6 col-lg-2 col-md-7 col-xs-7">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="mark<?= $i ?>" placeholder="Марка" name="mark<?= $i ?>" data-toggle="tooltip" data-placement="left" title="Русск/англ. заглавные буквы - , ( )" onblur="focOnTechnic(<?= $i ?>);">
                                </div>
                            </div>


                            <label class="control-label col-sm-4 col-lg-1 col-xs-4" for="v">Объем цистерны,л</label>
                            <div class="col-sm-6 col-lg-2 col-md-7 col-xs-7">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="v<?= $i ?>" placeholder="Объем цистерны" name="v<?= $i ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="control-label col-sm-4 col-lg-3 col-xs-4"  for="type">Тип</label>
                            <div class="col-sm-6 col-lg-2 col-md-7 col-xs-7">

                                <div class="form-group">
                                    <select class="form-control" name="type<?= $i ?>" id="type<?= $i ?>" onblur="gh(<?= $i ?>);" onclick="colorWhiteType(<?= $i ?>)">
                                        <option></option>
                                        <?php
                                        foreach ($types as $row) {
                                            printf("<p><option value='%s' ><label>%s</label></option></p>", $row->id, $row->name);
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>

                            <label class="control-label col-sm-4 col-lg-2 col-xs-4" for="calculation">Минимальный боевой расчет</label>
                            <div class="col-sm-6 col-lg-1 col-md-7 col-xs-7">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="calculation<?= $i ?>" placeholder="Минимальный боевой расчет" name="calculation<?= $i ?>" >
                                </div>
                            </div>
                        </div>


                    </div>


                    <hr>
                    <?php
                }
                ?>
                <input type="hidden" value="<?= $i - 1 ?>" name="countTech" >
            </div>




            <!-- остальное-->
            <div class="row">

                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="phone">Телефон ЦОУ</label>
                <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                    <div class="form-group">
                        <textarea class="form-control" rows="4" name="phone" id="phone"></textarea>
                    </div>
                </div>
            </div>


            <br>
            <br>

            <div class="row">

                <label class="control-label col-sm-4 col-lg-3 col-xs-4" for="localExit">Район выезда</label>
                <div class="col-sm-6 col-lg-5 col-md-7 col-xs-7">
                    <div class="form-group">
                        <textarea class="form-control" rows="6" name="localExit" id="localExit"></textarea>
                    </div>
                </div>

            </div>


            <b>*</b> - поле "район выезда" обязательно для заполнения в текстовом виде
            <hr>

            <b>  * </b>- данный функционал предназначен для работы Гео-портала МЧС <span style="color:red">(необязательно для заполнения)</span><br><br>

            <!--------------------------------------------------------------------  полигон ----------------------------------------------------------------------->

            <div style="cursor:pointer;color:blue;padding-bottom:5px; float: right"  onclick=" $('#map').dialog('open');
                 "  id="check_poligon">Выбрать район выезда карте</div>
            <div id="map_example_div" style="display:none; float: right">
                <br>
                <div style="cursor:pointer;color:blue;padding-bottom:5px;" onclick="deletePolygon();">Очистить</div>
                <div style="cursor:pointer;color:blue;padding-bottom:5px;" onclick="addPolygon();">Загрузить полигон</div>
                <!--                    <div style="cursor:pointer;color:blue;padding-bottom:5px;" onclick="getPolygon();">Получить координаты</div>-->
                <!--     Выбрать указанный район выезда - Координаты в геометрию-->
                <div style="cursor:pointer;color:blue;padding-bottom:5px;" onclick="convertPolygon();">Выбрать указанный район выезда</div>
                <!--                    <div id="conv_g" style="cursor:pointer;color:blue;padding-bottom:5px;display:none" onclick="convertGeometry();">Геометрию в координаты</div>-->
                <div id="conv_g" style="cursor:pointer;color:white;padding-bottom:5px;display:none" onclick="convertGeometry();">Геометрию в координаты</div>
                <!--                    <label for="coord">Polygon: </label>-->
                <textarea id="coords" name="polygon" style="display:none;"></textarea>
            </div>

            <b> Для выбора района выезда на карте: &nbsp;<br>
                1. Выбрать район выезда на карте &nbsp;<br>
                2. Нажать на кнопку "Выбрать указанный район выезда" &nbsp;<br> 3. Закрыть карту</b><br>


            <div class="row">
                <br>
                <div class="form-group">

                    <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-3">
                        <button type="submit" class="btn btn-success" name="create" id="createAdd">Добавить</button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-3">
                        <a href="/ss/edit/" >  <button type="button" class="btn btn-warning">Назад</button></a>
                    </div>
                </div>
            </div>


            <script language="javascript1.2" type="text/javascript">
                var polyArr = new Array();
                var polyPoint = {
                    'fill': true,
                    'stroke': true,
                    'id': "ruler_point",
                    'radius': 4,
                    'stroke_width': '1',
                    'stroke_opacity': '0.5',
                    'stroke_color': '#085165',
                    'fill_opacity': '0.9',
                    'fill_color': '#085165',
                    'draggable': true
                }
                var polyLine = {
                    'stroke': true,
                    'id': "ruler_line",
                    'stroke_width': '4',
                    'stroke_opacity': '0.7',
                    'stroke_color': '#085165',
                    'fill_opacity': '0.5',
                    'fill_color': '#085165',
                    'draggable': false
                }
                var polyFlag = -1;
                var moveFlag = false;
                var flagCoords = true;
                $(window).load(function () {
                    map = new BelgeoMap(window.location.host);
                    map.init('1', 27.54946, 53.90082, 9, 6, "", 12, "osm_true", []);

                    var clickStart = function (evt, x, y) {
                        clickFlag = true;
                        if (!flagCoords) {
                            moveFlag = true;
                            polyFlag = map.getCircleByBL(y, x);
                        }
                    };
                    var clickEnd = function (evt, x, y) {
                        if (flagCoords && clickFlag) {
                            document.getElementById("coord_lat").value = x;
                            document.getElementById("coord_lon").value = y;
                        } else if (polyFlag != null) {
                            dragPolygonPoint(polyFlag.id, y, x);
                        } else if (clickFlag) {
                            addPointToPolygon(y, x);
                        }
                        clickFlag = false;
                        moveFlag = false;
                        polyFlag = -1;
                    };
                    map.MapObserve(2, "mousemove", function (evt, x, y) {
                        clickFlag = false;
                        if (!flagCoords && moveFlag && polyFlag != null) {
                            dragPolygonPoint(polyFlag.id, y, x);
                        }
                    });
                    map.MapObserve(2, "mousedown", clickStart);
                    map.MapObserve(2, "touchstart", clickStart);
                    map.MapObserve(2, "mouseup", clickEnd);
                    map.MapObserve(2, "touchend", clickEnd);
                });
                $("#map").dialog({
                    autoOpen: false,
                    width: 550,
                    height: 550,
                    resizable: false,
                    close: function (event, ui) {
                        document.getElementById("map_example_div").style.display = "none";
                    }
                });

                $("#map_for_coord").click(function () {
                    deletePolygon();
                    flagCoords = true;
                });

                $("#check_poligon").click(function () {
                    document.getElementById("map_example_div").style.display = "block";
                    flagCoords = false;
                });

                //перетаскивание точек полигона
                function dragPolygonPoint(id, B, L) {
                    if (typeof (id) == 'undefined')
                        return;
                    var pointNum = parseInt(id.replace(/poly_point/g, ""));
                    var len = polyArr.length;

                    if (pointNum == 0 && len == 1) {
                        polyArr[pointNum]['B'] = B;
                        polyArr[pointNum]['L'] = L;
                        return;
                    }

                    polyArr[0]['B'][pointNum] = B;
                    polyArr[0]['L'][pointNum] = L;
                    polyArr[pointNum + 1]['B'] = B;
                    polyArr[pointNum + 1]['L'] = L;
                    if (len == 3) {
                        map.changeLineBL(polyArr[0]['id'], polyArr[0]['B'], polyArr[0]['L']);
                        map.recalcLine(polyArr[0]['id']);
                    } else if (len > 3) {
                        map.changePolygonBL(polyArr[0]['id'], polyArr[0]['B'], polyArr[0]['L']);
                        map.recalcPolygon(polyArr[0]['id']);
                    }
                }
                ;
                //добавление новой точки в полигон по щелчку мыши
                function addPointToPolygon(B, L) {
                    var polyPoint1 = polyPoint;
                    var polyLine1 = polyLine;
                    var gParams;
                    var polyLen = polyArr.length;
                    var pointsCnt = 0;
                    //если в полигоне уже есть точки, сначала нарисуем линию
                    if (polyLen == 1) {
                        polyLine1['id'] = 'poly_line';
                        polyArr.unshift({"B": [polyArr[0]['B'], B], "L": [polyArr[0]['L'], L], "id": 'poly_line'});
                        map.addLine(polyArr[0].B, polyArr[0].L, polyLine1, true)
                    } else if (polyLen > 1) {
                        if (polyLen == 3) {
                            map.removeLine(polyArr[0].id);
                            polyArr[0].id = 'poly_poly';
                            polyLine1['id'] = 'poly_poly';
                        } else {
                            map.removePolygon(polyArr[0].id);
                        }
                        updateCanvas(0, 0);
                        polyArr[0].B.push(B);
                        polyArr[0].L.push(L);
                        map.addPolygon(polyArr[0].B, polyArr[0].L, polyLine1, true);
                    }
                    if (polyLen > 0)
                        pointsCnt = polyArr[0]['B'].length - 1;
                    polyPoint1['id'] = 'poly_point' + pointsCnt;
                    polyArr.push({"B": B, "L": L, "id": 'poly_point' + pointsCnt});
                    map.addCircle(B, L, polyPoint1, true);
                }
                //пример загрузки полигона по имеющимся координатам
                function addPolygon() {
                    var points = "27.16644 54.12543,27.61963 54.17047,27.64434 53.90272,27.2763 53.84118";
                    var pointsArray = points.split(",");
                    if (pointsArray.length < 3) {
                        return;
                    }

                    deletePolygon();
                    var bb = new Array(), ll = new Array();
                    for (var i = 0; i < pointsArray.length; i++) {
                        var currPoint = pointsArray[i].split(" ");
                        var polyPoint1 = polyPoint;
                        polyPoint1['id'] = 'poly_point' + i;
                        polyArr.push({"B": currPoint[0], "L": currPoint[1], "id": 'poly_point' + i});
                        map.addCircle(currPoint[0], currPoint[1], polyPoint1, true);
                        bb.push(currPoint[0]);
                        ll.push(currPoint[1]);
                    }
                    var polyLine1 = polyLine;
                    polyLine1['id'] = 'poly_poly';

                    polyArr.unshift({"B": bb, "L": ll, "id": 'poly_poly'});
                    map.addPolygon(polyArr[0].B, polyArr[0].L, polyLine1, true);

                    updateCanvas(0, 0);
                }
                //удаление полигона с карты
                function deletePolygon() {
                    var len = polyArr.length;
                    if (len > 3) {
                        map.removePolygon(polyArr[0].id);
                        polyArr.splice(0, 1);
                        len--;
                    } else if (len == 3) {
                        map.removeLine(polyArr[0].id);
                        polyArr.splice(0, 1);
                        len--;
                    }

                    for (var i = 0; i < len; i++) {
                        map.removeCircle(polyArr[i].id);
                    }
                    polyArr.splice(0, len);
                    polyArr = new Array();

                    updateCanvas(0, 0);

                    document.getElementById("conv_g").style.display = "none";

                    return false;
                }
                //получение точек из полигона в оговореном формате: долгота широта через запятую
                function getPolygon() {
                    var len = polyArr.length;
                    if (len <= 3) {
                       // document.getElementById("coords").value = "Необходим полигон";
                        alert("Сначала необходиом выбрать район выезда!");
                        return;
                    }
                    var coords = "";
                    for (var i = 1; i < len; i++) {
                        coords += polyArr[i].B + " " + polyArr[i].L + ",";
                    }
                    coords += polyArr[1].B + " " + polyArr[1].L; //замыкаем полигон
                    document.getElementById("coords").value = coords;
                    return coords;
                }


                var geometry;
                // преобразование точек полигона в геометрию
                function convertPolygon() {
                    coords = getPolygon();
                   if (typeof (coords) == 'undefined' || coords == ''  ){
						 return;
					}


                        jQuery.ajax({
                            type: "GET",
                            url: "http://80.94.170.137/geoportal_v/srv/convert_geometry.php",
                            data: "type=geometry&coords=" + coords,
                            dataType: "jsonp",
                            async: true,
                            success: function (response) {
                                if (response.res == "ok") {
                                    geometry = response.data;
                                    document.getElementById("coords").value = geometry;
                                    document.getElementById("conv_g").style.display = "block";
                                    alert("Район выезда успешно выбран!");
                                }
                            }
                        });



                }
                //преобразование геометрии в точки полигона
                function convertGeometry() {
                    if (typeof (geometry) == 'undefined' || geometry == '') {
                        //document.getElementById("coords").value = "Необходима геометрия";
                        return;
                    }
                    else {
                        jQuery.ajax({
                            type: "POST",
                            url: "http://80.94.170.137/geoportal_v/srv/convert_geometry.php",
                            data: "type=polygon&coords=" + geometry,
                            dataType: "jsonp",
                            async: true,
                            success: function (response) {
                                if (response.res == "ok") {
                                    document.getElementById("coords").value = response.data;
                                }
                            }
                        });
                    }

                }
            </script>


        </form>
    </div>
</div>
