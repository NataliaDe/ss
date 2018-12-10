    <div class="container">
        <div class="alert alert-danger">

            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Ошибка!</strong> Такой запись уже существут.
        </div>
        
        <?php
        if(isset($id)) {
            ?>
        <a href="/ss/tables/edit/radmin_region/<?= $id ?>" >  <button type="button" class="btn btn-warning">Назад</button></a>
        <?php
        }
 else {
     ?>
        <a href="/ss/tables/radmin_region/" >  <button type="button" class="btn btn-warning">Назад</button></a>
        <?php
 }
        ?>
             
    </div>

     