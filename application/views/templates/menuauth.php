<?php
$roleId = $this->session->userdata('role_id');
$levelId = $this->session->userdata('level_id');
$auth = $this->session->userdata('auth');
$roleName = $this->session->userdata('role_name');
//$cardId = $this->session->userdata('locorg_id');
$fio = $this->session->userdata('fio');
?>
<div class="row">
    <div id="auth" class="col-lg-5 col-md-8 col-xs-11 col-sm-8">
        <?php
        if (isset($fio) && !empty($fio)) {
            ?>
            <span ><?= $auth ?> | <?= $roleName ?> | <?= $fio; ?><a href="/ss/query/logoff"><span class="glyphicon glyphicon-user" data-toggle="tooltip" data-placement="left" title="Выход из личного кабинета"></span></a> <a href="/ss/auth/logoff"><span class="glyphicon glyphicon-share" data-toggle="tooltip" data-placement="left" title="Выход"></span></a></span>
            <?php
        } else {
            ?>
            <span ><?= $auth ?> | <?= $roleName ?> <a href="/ss/auth/logoff"><span class="glyphicon glyphicon-share" data-toggle="tooltip" data-placement="left" title="Выход"></span></a></span>
            <?php
        }
        ?>


    </div>
</div>
<!-- Меню для авторизованных пользователей -->
<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation" id="navbar">
    <div class="container" >
        <div class="navbar-header" id="nav-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" id="button-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/ss">   <img src="/ss/assets/images/logo.png" class="navbar-brand" id="imglogo" data-toggle="tooltip" data-placement="left" title="Сведения"></a>
            <a class="navbar-brand" href="/ss" id="logo" >Учет сил и средств ОПЧС</a>

        </div>
        <div class="navbar-collapse collapse" id="navbar-collapse">
            <?php
            //район исполнитель
            if (($levelId == 3) && ($roleId == 2)) {
                ?>
                <ul class="nav navbar-nav">

                  <!--  <li id="instructli"> <a href="#" id="instructa"><span class='glyphicon glyphicon-info-sign' data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="left" title="Инструкция"></span></a></li>
                    <li><a href="/ss/news" id="newsa"><span class='glyphicon glyphicon-envelope' data-placement="left" title="Оповещения"></span></a></li>-->


                    <li><a href="/ss/news" id="newsa">Оповещения</a></li>
                    <li><a href="/ss/fill" id="section">Заполнить<br>карточку</a></li>
                    <li><a href="/ss/edit" id="section">Редактировать<br>карточку</a></li>
                    <li><a href="/ss/report" id="section">Сформировать<br>отчет</a></li>
                    <li><a href="#" id="newsa"><span  data-toggle="modal" data-target="#myModal" >Справка</span></a></li>
                </ul>
                <?php
            } elseif (($levelId == 3) && ($roleId == 1)) { //начальник РОЧС-ответственный
                ?>

                <ul class="nav navbar-nav">

                  <!--  <li id="instructli"> <a href="#" id="instructa"><span class='glyphicon glyphicon-info-sign' data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="left" title="Инструкция"></span></a></li> -->

                    <li><a href="/ss/query" id="newsa">Заявки</a></li>
                    <li><a href="/ss/report" id="section">Сформировать<br>отчет</a></li>


 <li><a href="#" id="newsa"><span  data-toggle="modal" data-target="#myModal" >Справка</span></a></li>


                </ul>
                <?php
            } elseif ((($levelId == 2) && ($roleId == 1)) || (($levelId == 1) && ($roleId == 1))) { //ОУМЧС-ответственный, РЦУ-ответственный
                ?>

                <ul class="nav navbar-nav">
                   <!-- <li id="instructli"> <a href="#" id="instructa"><span class='glyphicon glyphicon-info-sign' data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="left" title="Инструкция"></span></a></li> -->

                    <li><a href="/ss/query/" id="newsa">Заявки</a></li>
                    <li><a href="/ss/report" id="section">Сформировать<br>отчет</a></li>


                    <?php
                    if (($levelId == 1) && ($roleId == 1)) {
                        ?>

                        <li><a href="/ss/classif/" id="newsa">Классификаторы</a></li>



<li><a href="#" id="newsa"><span  data-toggle="modal" data-target="#myModal" >Справка</span></a></li>

                        <?php
                    }
                    ?>
                </ul>
                <?php
            }
            //ОУМЧС admin
            elseif (($levelId == 2) && ($roleId == 3)) {
                ?>
                <ul class="nav navbar-nav">
                    <li><a href="#about" id="section">Пользователи</a></li>
                </ul>

                <?php
            } elseif (($levelId == 1) && ($roleId == 3)) {//РЦУ admin
                ?>
                <ul class="nav navbar-nav">

                    <li><a href="/ss/classif/" id="newsa">Классификаторы</a></li>
<li><a href="/ss/report" id="section">Сформировать<br>отчет</a></li>

                    <li><a href="/ss/tables/" id="newsa">Таблицы</a></li>

                    <li><a href="#" id="newsa"><span  data-toggle="modal" data-target="#myModal" >Справка</span></a></li>

                </ul>

                <?php
            }
            ?>

        </div><!--/.nav-collapse -->
    </div>
</div>





<!--Modal-->
<div id="myModal" class="modal fade">
    <div class="modal-dialog" id="modalinst">
        <div class="modal-content instruct">
            <div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button>
                <h4 class="modal-title">Справка</h4>
            </div>
            <div class="modal-body">

                <?php
                if (isset($_GET["file"]))
                    $filename = $_GET["file"];
                else {
                    if (($levelId == 3) && ($roleId == 2)) {//РОЧС исполнитель
                        $filename = "user.doc";
                        $filename1 = "common.doc";
                    } elseif (($levelId == 3) && ($roleId == 1)) { //начальник РОЧС-ответственный
                        $filename = "N_user.doc";
                        $filename1 = "common.doc";
                    } elseif ((($levelId == 2) && ($roleId == 1)) || (($levelId == 1) && ($roleId == 1)) || (($levelId == 1) && ($roleId == 3))) { //ОУМЧС-ответственный, РЦУ-ответственный, РЦУ admin
                        $filename = "instruct.doc";
                        $filename1 = "common.doc";
                    }

                    /* if ($prior == 1)
                      $filename = "instruction1.doc"; //для РЦУ
                      else
                      $filename = "instruction.doc"; */
                }
                if (strpos($filename, "/") !== false)
                    die("Hack atempt detected!");
                if ($fileext = substr($filename, strrpos($filename, ".")) !== ".doc")
                    die("Поддерживается только чтение вордовских документов");
 
                $p = '/ss/assets/doc/';
                $path = $p . $filename;
                $path1 = $p . $filename1;
//echo $path;

                echo "Скачать <a href='$path'>инструкцию по использованию</a><br> ";
                echo "Скачать <a href='$path1'>инструкцию по заполнению</a><br><br> ";
                ?>
                <b>Краткое описание:</b><br>
                Основное назначение АРМ «Учет сил и средств ОПЧС»  – учет и систематизация данных о силах и средствах, находящихся на вооружении подразделений
                МЧС Республики Беларусь.
				  <br> <br> <b> <a href="/ss/assets/images/shema.pdf" target="_blank">Схема работы</a></b><br>
                <p class="modal-header"></p>
                <b>Контактная информация:</b><br>
                разработчик - Дещеня Наталья Александровна, 8(017) 209 27 48<br>
                Шилько Сергей Чеславович 8(017) 209 27 11<br>
                Яцукович Александр Феликсович 8(017) 209 27 03<br>
                <?php
//echo "<br>Скачать инструкцию  <a href=\"$filename\">$filename</a><br> ";


                /*  if (($levelId == 3) && ($roleId == 2)) {//РОЧС исполнитель
                  $mmax = 10;
                  } elseif (($levelId == 1) && ($roleId == 1)) { //РЦУ-ответственный
                  $mmax = 19;
                  } elseif (($levelId == 3) && ($roleId == 1)) { //начальник РОЧС-ответственный
                  $mmax = 8;
                  } elseif (($levelId == 2) && ($roleId == 1)) { //ОУМЧС-ответственный
                  $mmax = 9;
                  }

                for ($i = 1; $i <= $mmax; $i+=1) {
                    unset($t);
                    $t = $i . '.jpg';
                    if (($levelId == 1) && ($roleId == 1) || (($levelId == 1) && ($roleId == 3))) { //РЦУ-ответственный, admin
                        ?>
                        <img src = "/ss/assets/pdf/rcu/<?= $t ?>" class="imginstr">
                        <?php
                    } elseif (($levelId == 3) && ($roleId == 2)) {//РОЧС исполнитель
                        ?>
                        <img src = "/ss/assets/pdf/user/<?= $t ?>" class="imginstr">
                        <?php
                    } elseif (($levelId == 3) && ($roleId == 1)) { //начальник РОЧС-ответственный
                        ?>
                        <img src = "/ss/assets/pdf/N_user/<?= $t ?>" class="imginstr">
                        <?php
                    } elseif (($levelId == 2) && ($roleId == 1)) { //ОУМЧС-ответственный
                        ?>
                        <img src = "/ss/assets/pdf/umchs/<?= $t ?>" class="imginstr">
                        <?php
                    }
                }
                */


                ?>

            </div>
            <div class="modal-footer">

                <div class="copyright">
                    <span class='glyphicon glyphicon-copyright-mark'></span>«Республиканский центр управления и реагирования на чрезвычайные ситуации МЧС Республики Беларусь»
                </div>
                <br>

                <button class="btn btn-success" type="button" data-dismiss="modal">Закрыть</button></div>
        </div>
    </div>
</div>









