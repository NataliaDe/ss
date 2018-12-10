<div class="container">

    <div class="col-lg-12">
        <div class="row">
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10 col-md-offset-4 col-lg-offset-3">
                    <?php
                    if(($this->session->userdata('level_id') == 3) && ($this->session->userdata('role_id') == 2)) {//исполнитель
                     ?>
                     <a href="/ss/edit/" >    <button type="button" class="btn btn-warning">Назад</button></a>
                    <?php
                    }
                    elseif (($this->session->userdata('level_id') == 3) && ($this->session->userdata('role_id') == 1)) {// руководитель
                     ?>
                      <a href="/ss/query/" >    <button type="button" class="btn btn-warning">Назад</button></a>
                     <?php
                    }
                    elseif(($this->session->userdata('level_id') == 2) && ($this->session->userdata('role_id') == 1)) {//УМЧС
                        ?>
                        <a href="/ss/query/" >    <button type="button" class="btn btn-warning">Назад</button></a>
                      <?php
                    }
                    ?>
                   
                </div>
            </div>
        </div>
    </div>
</div>



