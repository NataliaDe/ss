<?php
if (isset($status)) {
    foreach ($status as $row) {
        $status = $row->status;
        $work = $row->work;
    }


    if ((($status) == 0) || (($status == 2) && ($work == 0)) || (($status == 3) && ($work == 0)) || (($status == 3) && ($work == 1)) || ($status == 4) || (($status == 1) && ($work == 0))) {
        ?>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <table class="table table-condensed " >

                <tr class="success"><td>подтверждена</td></tr>
                <tr class="notok"><td>ожидает подтверждения</td></tr>
                <tr class="newrec"><td>новая запись</td></tr>
                <tr class="warning"><td>обновленная запись</td></tr>
                <tr class="danger"><td>запись отклонена</td></tr>
                <tr class="info"><td>запись удалена</td></tr>

            </table>
        </div>
        <?php
    }
} else {
    // if (($this->session->userdata('level_id') == 2) || ($this->session->userdata('level_id') == 1)) {//авторизован РЦУ либо ОУМЧС
    ?>

    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 noprint">
        <table class="table table-condensed " >

            <tr class="success"><td>подтверждена</td></tr>
            <tr class="notok"><td>ожидает подтверждения</td></tr>
            <tr class="newrec"><td>новая запись</td></tr>
            <tr class="warning"><td>обновленная запись</td></tr>
            <tr class="danger"><td>запись отклонена</td></tr>
            <tr class="info"><td>запись удалена</td></tr>

        </table>
    </div>

    <?php
    // }
}
?>