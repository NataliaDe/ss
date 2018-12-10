<?php
//print_r($delete);
//echo $delete;
?>
<div class="container">
   За одной областью может быть закреплен 1 ответственный. 1 ответстенный может быть закреплен за несколькими областями.
    <div class="table-responsive col-lg-8 col-lg-offset-2 " id="conttabl">
        <table id="tbl3" class="table table-condensed   table-bordered table-hover" >
            <!-- строка 1 -->
            <thead>
                <tr >
                    <th>id</th>
                   
                      <th>Область</th>
                       <th>Ф.И.О.</th>

                    <th class="deleteth"  rowspan="3">Ред.</th>
                   


                </tr>

            </thead>
            <tbody>

                <?php
                foreach ($radmin_region as $row) {
                    ?>
                    <tr>
                        <td><?= $row->id ?></td>
                        
                            <td><?= $row->name ?></td>
                            <td><?= $row->fio ?></td>

                        <td><a href='/ss/tables/edit/radmin_region/<?= $row->id ?>' > <span class='glyphicon glyphicon-pencil'></span></a></td>
                       

                    </tr>
    <?php
}
?>

            </tbody>
        </table>
        <br>
    </div>
</div>




