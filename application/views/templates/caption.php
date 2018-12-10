<?php

foreach ($datecaption as $row) {
    $datte = $row->dat;
}

foreach ($caption as $row) {
    $name = $row->auth;
    $organ = $row->orgid;
}

echo '<center>Карточка учета сил и средств подразделений <u>' . $name . '</u>';
echo '<br>по состоянию на <u>' . $datte . '</u></center>';







