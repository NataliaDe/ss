<!-- Меню для неавторизованных пользователей -->
<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" id="button-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/ss"><img src="/ss/assets/images/logo.png" class="navbar-brand" id="imglogo" data-toggle="tooltip" data-placement="left" title="Сведения"></a>
            <a href="/ss" class="navbar-brand"  id="logo" >Учет сил и средств ОПЧС</a>

        </div>
        <div class="navbar-collapse collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">

                <li><a href="/ss/auth" id="btnauth"><button type="button" class="btn btn-primary btn-lg" >Авторизация</button></a></li>

                <li><a href="/ss/report" id="section">Сформировать<br>отчет</a></li>
                <li><a href="#" id="newsa"><span  data-toggle="modal" data-target="#myModal" >Справка</span></a></li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>




<!--Modal-->
<div id="myModal" class="modal fade">
    <div class="modal-dialog " id="modalinst">
        <div class="modal-content instruct">
            <div class="modal-header"><button class="close danger" type="button" data-dismiss="modal">×</button>
                <h4 class="modal-title">Справка</h4>
            </div>
            <div class="modal-body">
                <b>Краткое описание:</b><br>
                Основное назначение АРМ «Учет сил и средств ОПЧС»  – учет и систематизация данных о силах и средствах, находящихся на вооружении подразделений
                МЧС Республики Беларусь.
				  <br> <br> <b> <a href="/ss/assets/images/shema.pdf" target="_blank">Схема работы</a></b><br>
                <p class="modal-header"></p>
                <b>Контактная информация:</b><br>
                разработчик - Дещеня Наталья Александровна, 8(017) 209 27 48<br>
                Шилько Сергей Чеславович 8(017) 209 27 11<br>
                Яцукович Александр Феликсович 8(017) 209 27 03<br>

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




