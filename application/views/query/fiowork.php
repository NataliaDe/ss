<?php
$fio = $this->session->userdata('fio');
if (!empty($fio)) {
    ?>
    <div class="row">
        <div id="authradmin" class="col-lg-5 col-md-8 col-xs-11 col-sm-8">
            <span id="authradminfio"><?= $fio; ?> <a href="/ss/query/logoff"><span class="glyphicon glyphicon-share" data-toggle="tooltip" data-placement="left" title="Выход"></span></a></span>
        </div>
    </div>
    <?php
}
/*if ((isset($yes)) && (!empty($yes))) {
    foreach ($yes as $my) {
        echo $my->foot;
    }
}*/
