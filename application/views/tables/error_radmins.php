    <div class="container">
        <div class="alert alert-danger">

            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Ошибка!</strong> Такой пароль и(или) пользователь уже существут.
        </div>
        
        <?php
        if(isset($id)) {
            ?>
        <a href="/ss/tables/edit/radmins/<?= $id ?>" >  <button type="button" class="btn btn-warning">Назад</button></a>
        <?php
        }
 else {
     ?>
        <a href="/ss/tables/radmins/" >  <button type="button" class="btn btn-warning">Назад</button></a>
        <?php
 }
        ?>
             
    </div>

     