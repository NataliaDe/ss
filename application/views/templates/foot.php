<?php
foreach ($datefoot as $row) {
    ?>
    <p id=foot>
        <?php
        if (($row->id_action == 3) || ($row->id_action == 5) || ($row->id_action == 6)) {
            ?>
            <span class='glyphicon glyphicon-ok-sign noprint' id="visa"></span>
            <?php
        } elseif (($row->id_action == 4) || ($row->id_action == 7) || ($row->id_action == 9)) {
            ?>
            <span class='glyphicon glyphicon-remove-sign noprint' id="novisa"></span>
            <?php
       } 
      elseif (($row->id_action == 8)) {
          ?>
           <span class='glyphicon glyphicon-eye-open noprint' id="inwork"></span>
 <?php
        }
        ?>

        <?= $row->foot ?>  </p>
    <?php
    //echo '<p id=foot>' . $row->foot . '</p>';
}

    //кто в РЦУ взял в работу карточку, если она в работе в РЦУ
/*if(isset($who_work)&& !empty($who_work)){
    foreach ($who_work as  $value) {
     ?>
    <p id=foot>
         <span class='glyphicon glyphicon-eye-open noprint' id="inwork"></span>    
        Взял в работу <?= $value->fio ?>  <?= $value->date ?> </p>
   <?php 
}
}*/
?>



