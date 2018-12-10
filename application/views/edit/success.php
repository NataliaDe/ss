<!--запись отредактирована-->

<div class="container">
    <div class="alert alert-success">

        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Успешно!</strong> Информация в БД была обновлена.
    </div>
    <?php
    if (( $this->session->userdata('level_id') == 1) && ($this->session->userdata('role_id') == 3)) {//РЦУ admin
    } elseif (($this->session->userdata('level_id') == 3) && ($this->session->userdata('role_id') == 2)) {//исполнитель
        ?>
        <a href="/ss/edit/" >    <button type="button" class="btn btn-warning">Назад</button></a>
        <?php
    } elseif (($this->session->userdata('level_id') == 3) && ($this->session->userdata('role_id') == 1)) {// руководитель
        ?>
        <a href="/ss/query/" >    <button type="button" class="btn btn-warning">Назад</button></a>
        <?php
    } elseif (($this->session->userdata('level_id') == 2) && ($this->session->userdata('role_id') == 1)) {//УМЧС
        
        //вернуться на карточку, которую проверяем
        if (isset($id_card) && !empty($id_card)) {
            foreach ($id_card as $row) {
                $c = $row->id_card;
            }
            ?>
            <a href="/ss/query/view/<?= $c ?>" > 
                <?php
            } else {
                ?>
                <a href="/ss/query/" >  
                    <?php
                }
                ?>
                <button type="button" class="btn btn-warning">Назад</button></a>
                <?php
            }
            ?>
</div>

