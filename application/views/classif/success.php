<div class="container">
    <div class="alert alert-success">

        <button type="button" class="close" data-dismiss="alert">&times;</button>
        
        <?php
        if($ok==1) {// insert
        ?>
        <strong>Успешно!</strong> Запись была добавлена в БД.
        
        <?php
        }
        elseif ($ok==2) {//update
        ?>
           <strong>Успешно!</strong> Изменения сохранены в БД.
           <?php
           
    }
           elseif ($ok==3) {//delete
        ?>
           <strong>Успешно!</strong> Запись была удалена из БД.
           <?php
           
    }
        
        ?>
    </div>
</div>

